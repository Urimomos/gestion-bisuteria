<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validamos los datos (Como un try-catch en Java)
        $request->validate([
            'nombre' => 'required|max:40',
            'precompra' => 'required|numeric',
            'preventa' => 'required|numeric',
            'inventario' => 'required|integer',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Iniciamos una transacción (O todo se guarda o nada, para evitar errores)
        DB::beginTransaction();

        try {
            // 2. Manejo de la imagen
            $path = null;
            if ($request->hasFile('imagen')) {
                $path = $request->file('imagen')->store('productos', 'public');
            }

            // 3. Guardamos el producto
            $producto = Producto::create([
                'nombre' => $request->nombre,
                'precompra' => $request->precompra,
                'preventa' => $request->preventa,
                'inventario' => $request->inventario,
                'imagen' => $path,
            ]);

            // 4. Registramos en la tabla 'edita' (Historial)
            DB::table('edita')->insert([
                'idusuario' => Auth::id(),
                'idproducto' => $producto->idproducto,
                'accion' => 'Agrego',
                'cantidad_anterior' => 0,
                'cantidad_nueva' => $request->inventario,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::commit();
            return redirect()->route('dashboard')->with('success', '¡Producto registrado con éxito!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error al guardar: ' . $e->getMessage());
        }
    }

    public function index()
    {
    // Obtenemos todos los productos ordenados por el más reciente
        $productos = Producto::orderBy('idproducto', 'desc')->get();
    
        return view('inventory.index', compact('productos'));
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('inventory.edit', compact('producto'));
    }

    public function update(Request $request, $idproducto)
    {
        // 1. Buscamos el producto
        $producto = Producto::findOrFail($idproducto);
        $cantidadAnterior = $producto->inventario;

        // 2. Quitamos el dd() y usamos este bloque
        DB::beginTransaction();
        try {
            // Actualizamos los campos (asegúrate de que existan en el $fillable del Modelo)
            $producto->nombre = $request->nombre;
            $producto->preventa = $request->preventa;
            $producto->inventario = $request->inventario;
            // Si no envías precompra, asegúrate de que no sea obligatorio o mantenlo igual:
            // $producto->precompra = $request->precompra ?? $producto->precompra;

            $producto->save();

            // 3. Registro en la tabla 'edita' según el diagrama del cliente
            DB::table('edita')->insert([
                'idusuario' => Auth::id(),
                'idproducto' => $producto->idproducto,
                'accion' => 'Actualizo',
                // Quitamos 'fecha' porque la base de datos no la tiene
                'cantidad_anterior' => $cantidadAnterior,
                'cantidad_nueva' => $request->inventario,
                'created_at' => now(), // Laravel usará esto como la fecha del movimiento
                'updated_at' => now(),
            ]);

            DB::commit();
            return redirect()->route('inventory.index')->with('success', '¡Inventario actualizado!');

        } catch (\Exception $e) {
            DB::rollBack();
            // Esto te dirá exactamente QUÉ falló si algo sale mal
            return "Error detallado: " . $e->getMessage(); 
        }
    }

    public function destroy($idproducto)
    {
        $producto = Producto::findOrFail($idproducto);

        DB::beginTransaction();
        try {
            // Registramos el movimiento ANTES de borrar el producto
            DB::table('edita')->insert([
                'idusuario' => Auth::id(),
                'idproducto' => $producto->idproducto,
                'accion' => 'Elimino',
                'cantidad_anterior' => $producto->inventario,
                'cantidad_nueva' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $producto->delete();

            DB::commit();
            return redirect()->route('inventory.index')->with('success', 'Producto eliminado y movimiento registrado.');
        } catch (\Exception $e) {
            DB::rollBack();
            return "Error: " . $e->getMessage();
        }
    }

}