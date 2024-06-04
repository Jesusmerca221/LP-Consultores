<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\Cuenta;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $clientes = Clientes::all();
        return view('admin.clientes.clientes', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Valida los datos del formulario
         $request->validate([
            'nombre' => 'required|string|max:255',
            'nit' => 'required|string|max:20|unique:clientes,nit',
            'estado' => 'required|string|max:50',
        ]);

        // Crea un nuevo cliente con los datos recibidos
        Clientes::create($request->all());

        // Redirecciona de vuelta al listado de clientes con un mensaje de éxito
        return redirect()->route('Clientes.index')->with('success', 'Cliente creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cliente = Clientes::findOrFail($id);
        return view('admin.clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Valida los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'nit' => 'required|string|max:20|unique:clientes,nit,'.$id,
            'estado' => 'required|string|max:50',
        ]);

        // Encuentra el cliente y actualiza sus datos
        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());

        // Redirecciona de vuelta al listado de clientes con un mensaje de éxito
        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Encuentra el cliente y lo elimina
        $cliente = Clientes::findOrFail($id);
        $cliente->delete();

        // Redirecciona de vuelta al listado de clientes con un mensaje de éxito
        return redirect()->route('Clientes.index')->with('success', 'Cliente eliminado correctamente.');
    }
        public function mostrarCliente($id)
    {
        $cliente = Clientes::find($id);
        $Cuenta = Cuentas::select('tipo')->distinct()->get();

        return view('cliente', compact('cliente', 'Cuentas'));
    }

    
    


}
