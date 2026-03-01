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

    // 1. Agregamos la validación de la imagen
    $request->validate([
        'nombre' => 'required|max:40',
        'categoria' => 'nullable|string|max:50',
        'ubicacion' => 'nullable|string|max:100',
        'preventa' => 'required|numeric|min:0',
        'inventario' => 'required|integer|min:0',
        'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validación de imagen
    ]);

    DB::beginTransaction();
    try {
        // 2. Manejo de la nueva imagen
        if ($request->hasFile('imagen')) {
            // Borrar la imagen anterior si existe para ahorrar espacio
            if ($producto->imagen) {
                Storage::disk('public')->delete($producto->imagen);
            }
            // Guardar la nueva y actualizar el path
            $producto->imagen = $request->file('imagen')->store('productos', 'public');
        }

        // 3. Actualización de campos
        $producto->nombre = $request->nombre;
        $producto->categoria = $request->categoria;
        $producto->ubicacion = $request->ubicacion;
        $producto->preventa = $request->preventa;
        $producto->inventario = $request->inventario;
        
        $producto->save();

        // 4. Registro en historial
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
        return redirect()->route('inventory.index')->with('success', '¡Inventario actualizado con éxito!');

    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('error', 'Error al actualizar: ' . $e->getMessage()); 
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