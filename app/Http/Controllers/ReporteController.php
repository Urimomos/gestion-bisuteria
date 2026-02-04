<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ReporteController extends Controller
{
    public function index()
    {
            $movimientos = DB::table('edita')
            ->join('users', 'edita.idusuario', '=', 'users.id')
            // Cambiamos join por leftJoin para que no desaparezcan al borrar el producto
            ->leftJoin('productos', 'edita.idproducto', '=', 'productos.idproducto')
            ->select(
                'edita.*', 
                'users.name as usuario_nombre', 
                'productos.nombre as producto_nombre'
            )
            ->orderBy('edita.created_at', 'desc')
            ->get();
    
        return view('reports.index', compact('movimientos'));
    }
}