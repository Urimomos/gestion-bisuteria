<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class VentaReporteController extends Controller
{
    public function index(Request $request)
{
    $fecha = $request->get('fecha', Carbon::today()->format('Y-m-d'));

    $ingresosHoy = DB::table('ventas')
        ->join('productos', 'ventas.idproducto', '=', 'productos.idproducto')
        ->whereDate('ventas.Fecha', $fecha)
        ->select(DB::raw('SUM(ventas.Cantidad * productos.preventa) as total'))
        ->first()->total ?? 0;

    $metodos = DB::table('ventas')
        ->join('productos', 'ventas.idproducto', '=', 'productos.idproducto')
        ->whereDate('ventas.Fecha', $fecha)
        ->select('mpago', DB::raw('SUM(ventas.Cantidad * productos.preventa) as total'))
        ->groupBy('mpago')
        ->get();

    $detalleVentas = DB::table('ventas')
        ->join('productos', 'ventas.idproducto', '=', 'productos.idproducto')
        ->join('clientes', 'ventas.idcliente', '=', 'clientes.idcliente')
        ->whereDate('ventas.Fecha', $fecha)
        ->select(
            'ventas.idventa',
            'ventas.Fecha',
            'ventas.idcliente',
            'productos.nombre as producto',
            'clientes.nombre as cliente',
            'ventas.Cantidad',
            'ventas.mpago',
            DB::raw('(ventas.Cantidad * productos.preventa) as subtotal'),
            'ventas.created_at'
        )
        ->orderBy('ventas.created_at', 'desc')
        ->get();

    return view('reportes.ventas_diarias', compact('ingresosHoy', 'metodos', 'detalleVentas', 'fecha'));
}

    public function generarTicket($fecha, $idcliente, $momento)
{
    $ventaDetalle = DB::table('ventas')
        ->join('productos', 'ventas.idproducto', '=', 'productos.idproducto')
        ->join('clientes', 'ventas.idcliente', '=', 'clientes.idcliente')
        ->where('ventas.Fecha', $fecha)
        ->where('ventas.idcliente', $idcliente)
        ->where('ventas.created_at', $momento) 
        ->select('ventas.*', 'productos.nombre as producto', 'productos.preventa', 'clientes.nombre as cliente')
        ->get();

    if ($ventaDetalle->isEmpty()) {
        return "No se encontró la venta.";
    }

    $pdf = Pdf::loadView('reportes.ticket_pdf', compact('ventaDetalle'));
    $pdf->setPaper([0, 0, 226, 500], 'portrait'); 

    return $pdf->stream('ticket_zacatelco.pdf');
}


}