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
        $request->validate([
            'nombre' => 'required|max:40',
            'categoria' => 'nullable|string|max:50', 
            'ubicacion' => 'nullable|string|max:100', 
            'precompra' => 'required|numeric',
            'preventa' => 'required|numeric',
            'inventario' => 'required|integer',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        DB::beginTransaction();

        try {
            $path = null;
            if ($request->hasFile('imagen')) {
                $path = $request->file('imagen')->store('productos', 'public');
            }
            $producto = Producto::create([
                'nombre' => $request->nombre,
                'categoria' => $request->categoria, 
                'ubicacion' => $request->ubicacion, 
                'precompra' => $request->precompra,
                'preventa' => $request->preventa,
                'inventario' => $request->inventario,
                'imagen' => $path,
            ]);

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

    public function index(Request $request)
    {
        $query = $request->get('search');

        $productos = Producto::when($query, function ($q) use ($query) {
            return $q->where('nombre', 'LIKE', "%{$query}%")
                     ->orWhere('categoria', 'LIKE', "%{$query}%");
        })
        ->orderBy('idproducto', 'desc')
        ->paginate(10) 
        ->withQueryString(); 

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
            'precompra' => 'required|numeric|min:0',
            'preventa' => 'required|numeric|min:0',
            'inventario' => 'required|integer|min:0',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        DB::beginTransaction();
        try {
            if ($request->hasFile('imagen')) {
                if ($producto->imagen) {
                    Storage::disk('public')->delete($producto->imagen);
                }
                $producto->imagen = $request->file('imagen')->store('productos', 'public');
            }
            $producto->nombre = $request->nombre;
            $producto->categoria = $request->categoria;
            $producto->ubicacion = $request->ubicacion;
            $producto->precompra = $request->precompra; 
            $producto->preventa = $request->preventa;
            $producto->inventario = $request->inventario;
            
            $producto->save();
    
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