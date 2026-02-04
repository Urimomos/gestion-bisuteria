<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
   public function index()
    {
        $hoy = now()->format('Y-m-d');

        // 1. Contar ventas de hoy
        $ventasHoy = DB::table('ventas')
            ->whereDate('Fecha', $hoy)
            ->count();

        // 2. Calcular ganancias del día (opcional si quieres lucirte)
        // Unimos con productos para saber el precio de venta (preventa)
        $gananciaHoy = DB::table('ventas')
            ->join('productos', 'ventas.idproducto', '=', 'productos.idproducto')
            ->whereDate('ventas.Fecha', $hoy)
            ->sum(DB::raw('ventas.Cantidad * productos.preventa'));

        // 3. Productos con bajo stock
        $productosBajos = DB::table('productos')
            ->where('inventario', '<=', 5)
            ->count();

        $ventasSemanales = DB::table('ventas')
        ->select(DB::raw('DATE(Fecha) as fecha'), DB::raw('count(*) as total'))
        ->where('Fecha', '>=', now()->subDays(6))
        ->groupBy('fecha')
        ->orderBy('fecha', 'asc')
        ->get();

        return view('dashboard', compact('ventasHoy', 'gananciaHoy', 'productosBajos','ventasSemanales'));
    }
}