<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        
       $clientes = Cliente::where('idcliente', '!=', 1)
        ->when($search, function ($query) use ($search) {
            return $query->where('nombre', 'LIKE', "%{$search}%")
                         ->orWhere('AP', 'LIKE', "%{$search}%");
        })
        ->orderBy('idcliente', 'desc')
        ->get();

        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|regex:/^[\pL\s\-]+$/u',
        ], ['nombre.regex' => 'El nombre no puede contener números.']);

        Cliente::create($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente guardado con éxito.');
    }

    public function registrarRapido(Request $request)
    {
        $request->validate([
            'nombre' => 'required|regex:/^[\pL\s\-]+$/u',
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

    // Función de edición
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|regex:/^[\pL\s\-]+$/u',
        ]);

        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());

        return back()->with('success', 'Datos del cliente actualizados.');
    }

    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete(); 

        return back()->with('success', 'Cliente eliminado correctamente.');
    }
}