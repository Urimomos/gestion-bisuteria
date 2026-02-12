<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente; // Usamos el modelo que creamos
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    // Registro rápido (movido de VentaController y mejorado)
    public function registrarRapido(Request $request)
    {
        $request->validate([
            'nombre' => 'required|regex:/^[\pL\s\-]+$/u', // Solo letras y espacios
        ], ['nombre.regex' => 'El nombre no puede contener números.']);

        $cliente = Cliente::create([
            'nombre' => $request->nombre,
            'AP' => $request->ap,
            'AM' => $request->am,
            'telefono' => $request->telefono,
            'email' => $request->email,
        ]);

        return redirect()->route('ventas.create', ['idcliente' => $cliente->idcliente]);
    }

    // Actualizar datos (Nueva función pedida)
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|regex:/^[\pL\s\-]+$/u',
        ]);

        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());

        return back()->with('success', 'Datos del cliente actualizados.');
    }

    // Borrado Lógico (Nueva función pedida)
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete(); // Esto usa SoftDelete, no rompe ventas viejas

        return back()->with('success', 'Cliente eliminado correctamente.');
    }
}