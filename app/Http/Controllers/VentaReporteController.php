<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class VentaReporteController extends Controller
{
    public function index()
    {
        $hoy = Carbon::today();

        // 1. Ingresos Totales de Hoy
        $ingresosHoy = DB::table('ventas')
            ->join('productos', 'ventas.idproducto', '=', 'productos.idproducto')
            ->whereDate('ventas.Fecha', $hoy)
            ->select(DB::raw('SUM(ventas.Cantidad * productos.preventa) as total'))
            ->first()->total ?? 0;

        // 2. Desglose por Método de Pago
        $metodos = DB::table('ventas')
            ->join('productos', 'ventas.idproducto', '=', 'productos.idproducto')
            ->whereDate('ventas.Fecha', $hoy)
            ->select('mpago', DB::raw('SUM(ventas.Cantidad * productos.preventa) as total'))
            ->groupBy('mpago')
            ->get();

        // 3. Listado detallado de ventas para la tabla
        $detalleVentas = DB::table('ventas')
            ->join('productos', 'ventas.idproducto', '=', 'productos.idproducto')
            ->join('clientes', 'ventas.idcliente', '=', 'clientes.idcliente')
            ->whereDate('ventas.Fecha', $hoy)
            ->select(
                'ventas.idventa',
                'ventas.Fecha',
                'ventas.idcliente',
                'productos.nombre as producto',
                'clientes.nombre as cliente',
                'ventas.Cantidad',
                'ventas.mpago',
                DB::raw('(ventas.Cantidad * productos.preventa) as subtotal'),
                'ventas.created_at' // <--- Este será nuestro "ID de transacción"
            )
            ->orderBy('ventas.created_at', 'desc')
            ->get();

        return view('reportes.ventas_diarias', compact('ingresosHoy', 'metodos', 'detalleVentas'));
    }

    public function generarTicket($fecha, $idcliente, $momento)
{
    $ventaDetalle = DB::table('ventas')
        ->join('productos', 'ventas.idproducto', '=', 'productos.idproducto')
        ->join('clientes', 'ventas.idcliente', '=', 'clientes.idcliente')
        ->where('ventas.Fecha', $fecha)
        ->where('ventas.idcliente', $idcliente)
        ->where('ventas.created_at', $momento) // <--- Filtro por el momento exacto
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