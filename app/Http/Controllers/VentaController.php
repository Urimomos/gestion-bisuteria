<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Cliente; // Usamos el modelo
use Illuminate\Support\Facades\DB;

class VentaController extends Controller
{
    public function store(Request $request) {
        $producto = Producto::findOrFail($request->idproducto);

        if ($producto->inventario < $request->cantidad) {
            return back()->with('error', 'No hay suficiente stock disponible.');
        }

        DB::beginTransaction();
        try {
            DB::table('ventas')->insert([
                'Fecha' => now(),
                'mpago' => $request->mpago,
                'idproducto' => $request->idproducto,
                'idcliente' => $request->idcliente,
                'Cantidad' => $request->cantidad,
                'created_at' => now(),
            ]);

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
        // Usamos el modelo para que respete el SoftDelete (no mostrará borrados)
        $clientes = Cliente::where('nombre', 'LIKE', "%{$query}%")
            ->orWhere('AP', 'LIKE', "%{$query}%")
            ->get();

        return view('ventas.buscar_cliente', compact('clientes'));
    }

    public function create($idcliente)
    {
        $cliente = Cliente::findOrFail($idcliente);
        $productos = Producto::where('inventario', '>', 0)->get();

        return view('ventas.create', compact('cliente', 'productos'));
    }
}