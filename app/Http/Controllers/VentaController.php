<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;

class VentaController extends Controller
{
    public function store(Request $request) {
    $producto = Producto::findOrFail($request->idproducto);

    // Validar si hay suficiente stock
    if ($producto->inventario < $request->cantidad) {
        return back()->with('error', 'No hay suficiente stock disponible.');
    }

    DB::beginTransaction();
    try {
        // 1. Registrar la venta
        DB::table('ventas')->insert([
            'Fecha' => now(),
            'mpago' => $request->mpago,
            'idproducto' => $request->idproducto,
            'idcliente' => $request->idcliente,
            'Cantidad' => $request->cantidad,
            'created_at' => now(),
        ]);

        // 2. Descontar del inventario
        $producto->decrement('inventario', $request->cantidad);

        DB::commit();
        return redirect()->route('dashboard')->with('success', 'Venta realizada con éxito.');
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('error', $e->getMessage());
    }
}

   public function seleccionarCliente(Request $request)
    {
        $query = $request->get('search');
        
        // Buscamos en la tabla 'clientes' (con S)
        $clientes = DB::table('clientes')
            ->where('nombre', 'LIKE', "%{$query}%")
            ->orWhere('AP', 'LIKE', "%{$query}%")
            ->get();

        return view('ventas.buscar_cliente', compact('clientes'));
    }

    // 2. Registro rápido de cliente y salto a la venta
    public function registrarClienteRapido(Request $request)
    {
        $id = DB::table('clientes')->insertGetId([
            'nombre' => $request->nombre,
            'AP' => $request->ap,
            'AM' => $request->am,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'created_at' => now(),
        ]);

        return redirect()->route('ventas.create', ['idcliente' => $id]);
    }

    // 3. Formulario de Venta Final
    public function create($idcliente)
    {
        // Traemos los datos del cliente seleccionado
        $cliente = DB::table('clientes')->where('idcliente', $idcliente)->first();
        
        // Traemos solo productos que tengan stock disponible
        $productos = Producto::where('inventario', '>', 0)->get();

        return view('ventas.create', compact('cliente', 'productos'));
    }

}
