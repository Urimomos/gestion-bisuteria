<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
                'productos.nombre as producto',
                'clientes.nombre as cliente',
                'ventas.Cantidad',
                'ventas.mpago',
                DB::raw('(ventas.Cantidad * productos.preventa) as subtotal'),
                'ventas.created_at'
            )
            ->orderBy('ventas.created_at', 'desc')
            ->get();

        return view('reportes.ventas_diarias', compact('ingresosHoy', 'metodos', 'detalleVentas'));
    }
}