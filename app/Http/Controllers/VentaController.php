<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;

class VentaController extends Controller
{
    // Muestra la lista de productos disponibles para el cliente seleccionado
    public function create($idcliente)
    {
        $cliente = Cliente::findOrFail($idcliente);
        $productos = Producto::where('inventario', '>', 0)->get();

        return view('ventas.create', compact('cliente', 'productos'));
    }

    // Agrega un producto a la lista temporal (sesión)
    public function agregarAlCarrito(Request $request)
    {
        $request->validate([
            'idproducto' => 'required',
            'cantidad' => 'required|integer|min:1'
        ]);

        $producto = Producto::findOrFail($request->idproducto);

        // Validar stock antes de agregar a la lista
        if ($producto->inventario < $request->cantidad) {
            return back()->with('error', "Solo quedan {$producto->inventario} unidades de {$producto->nombre}");
        }

        $carrito = session()->get('carrito', []);

        // Estructura del item en la lista
        $carrito[] = [
            'idproducto' => $producto->idproducto,
            'nombre' => $producto->nombre,
            'precio' => $producto->preventa,
            'cantidad' => $request->cantidad,
            'subtotal' => $producto->preventa * $request->cantidad
        ];

        session()->put('carrito', $carrito);

        return back()->with('success', 'Producto añadido a la lista.');
    }

    // Quita un producto de la lista temporal
    public function quitarDelCarrito($indice)
    {
        $carrito = session()->get('carrito', []);

        if (isset($carrito[$indice])) {
            unset($carrito[$indice]);
            session()->put('carrito', array_values($carrito)); // Reindexar el arreglo
        }

        return back()->with('success', 'Producto quitado de la lista.');
    }

    // Guarda toda la venta en la base de datos
    public function store(Request $request) 
    {
        $carrito = session()->get('carrito', []);

        if (empty($carrito)) {
            return back()->with('error', 'La lista de venta está vacía.');
        }

        DB::beginTransaction();
        try {
            $ahora = now();
            foreach ($carrito as $item) {
                // 1. Verificar stock final por seguridad
                $producto = Producto::lockForUpdate()->find($item['idproducto']);
                if ($producto->inventario < $item['cantidad']) {
                    throw new \Exception("Stock insuficiente para: " . $item['nombre']);
                }

                // 2. Registrar en la tabla VENTAS
                DB::table('ventas')->insert([
                    'Fecha' => now()->format('Y-m-d'),
                    'mpago' => $request->mpago,
                    'idproducto' => $item['idproducto'],
                    'idcliente' => $request->idcliente,
                    'Cantidad' => $item['cantidad'],
                    'created_at' => $ahora, 
                    'updated_at' => $ahora,
                ]);

                // 3. Descontar del inventario
                $producto->decrement('inventario', $item['cantidad']);
            }

            DB::commit();
            session()->forget('carrito'); // Limpiar la lista después del éxito

            $momento = now()->format('Y-m-d H:i:s');

            return redirect()->route('ventas.buscar')->with([
                'success' => 'Venta completada con éxito.',
                'imprimir_ticket' => route('ticket.generar', [
                    'fecha' => now()->format('Y-m-d'),
                    'idcliente' => $request->idcliente,
                    'momento' => $momento
                ])
            ]);
            
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error en la venta: ' . $e->getMessage());
        }
    }

    public function seleccionarCliente(Request $request)
    {
        $query = $request->get('search');
        $clientes = Cliente::where('idcliente', '!=', 1)
        ->where(function($q) use ($query) {
            $q->where('nombre', 'LIKE', "%{$query}%")
              ->orWhere('AP', 'LIKE', "%{$query}%");
        })
        ->get();

        return view('ventas.buscar_cliente', compact('clientes'));
    }
}