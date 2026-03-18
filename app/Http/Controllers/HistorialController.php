<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HistorialController extends Controller
{
    public function index()
    {
        $movimientos = DB::table('edita')
            ->join('users', 'edita.idusuario', '=', 'users.id')
            ->leftJoin('productos', 'edita.idproducto', '=', 'productos.idproducto')
            ->select(
                'edita.*', 
                'users.name as usuario_nombre', 
                'productos.nombre as producto_nombre'
            )
            ->orderBy('edita.fecha', 'desc') 
            ->get();
        return view('reports.index', compact('movimientos'));
    }

    public function destruir($id)
    {
        if (Auth::user()->rol !== 'maestro') {
            return back()->with('error', 'No autorizado');
        }
        DB::table('edita')->where('idedita', $id)->delete();
        return back()->with('success', 'Registro eliminado');
    }

    public function vaciar()
    {
        if (Auth::user()->rol !== 'maestro') {
            return back()->with('error', 'No autorizado');
        }
        DB::table('edita')->truncate();
        return back()->with('success', 'Historial vaciado');
    }
}