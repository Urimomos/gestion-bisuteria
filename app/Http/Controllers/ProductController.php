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
        // 1. Validamos los datos incluyendo los nuevos campos
        $request->validate([
            'nombre' => 'required|max:40',
            'categoria' => 'nullable|string|max:50', // Nuevo
            'ubicacion' => 'nullable|string|max:100', // Nuevo
            'precompra' => 'required|numeric',
            'preventa' => 'required|numeric',
            'inventario' => 'required|integer',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        DB::beginTransaction();

        try {
            // 2. Manejo de la imagen
            $path = null;
            if ($request->hasFile('imagen')) {
                $path = $request->file('imagen')->store('productos', 'public');
            }

            // 3. Guardamos el producto con los nuevos campos
            $producto = Producto::create([
                'nombre' => $request->nombre,
                'categoria' => $request->categoria, // Nuevo
                'ubicacion' => $request->ubicacion, // Nuevo
                'precompra' => $request->precompra,
                'preventa' => $request->preventa,
                'inventario' => $request->inventario,
                'imagen' => $path,
            ]);

            // 4. Registramos en el historial
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
            return redirect()->route('inventory.index')->with('success', '¡Producto registrado con éxito!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error al guardar: ' . $e->getMessage());
        }
    }

    public function index()
    {
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
        $producto = Producto::findOrFail($idproducto);
        $cantidadAnterior = $producto->inventario;

        $request->validate([
            'nombre' => 'required|max:40',
            'categoria' => 'nullable|string|max:50',
            'ubicacion' => 'nullable|string|max:100',
            'preventa' => 'required|numeric',
            'inventario' => 'required|integer',
        ]);

        DB::beginTransaction();
        try {
            // Actualización de campos existentes y nuevos
            $producto->nombre = $request->nombre;
            $producto->categoria = $request->categoria; // Nuevo
            $producto->ubicacion = $request->ubicacion; // Nuevo
            $producto->preventa = $request->preventa;
            $producto->inventario = $request->inventario;
            
            // Opcional: Manejo de nueva imagen en actualización si lo deseas añadir después
            $producto->save();

            // Registro en historial
            DB::table('edita')->insert([
                'idusuario' => Auth::id(),
                'idproducto' => $producto->idproducto,
                'accion' => 'Actualizo',
                'cantidad_anterior' => $cantidadAnterior,
                'cantidad_nueva' => $request->inventario,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::commit();
            return redirect()->route('inventory.index')->with('success', '¡Inventario actualizado!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error detallado: ' . $e->getMessage()); 
        }
    }

    public function destroy($idproducto)
    {
        $producto = Producto::findOrFail($idproducto);

        DB::beginTransaction();
        try {
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
            return redirect()->route('inventory.index')->with('success', 'Producto eliminado.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', "Error: " . $e->getMessage());
        }
    }
}   