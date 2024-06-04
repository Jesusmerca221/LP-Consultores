<?php

namespace App\Http\Controllers;

use App\Models\capacitaciones;
use Illuminate\Http\Request;

class CapacitacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('can:Capacitaciones.index')->only('index', 'store', 'edit', 'update', 'destroy');
        $this->middleware('can:Capacitaciones.index')->only('index', 'store', 'edit', 'update', 'destroy');
    }

    public function capacitacionesApi(){
        $capacitaciones = capacitaciones::all();
        return response()->json($capacitaciones);
    }

    public function index()
    {
        $capacitaciones = capacitaciones::all();
        return view('admin.capacitaciones.capacitaciones', compact('capacitaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.capacitaciones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'titulo' => 'required',
                'descripcion' => 'required',
                'precio' => 'required',
            ],
            [
                'titulo.required' => 'El titulo es obligatorio',
                'descripcion.required' => 'La descripcion es obligatoria',
                'precio.required' => 'El precio es obligatorio',
            ]
        );

        $res = capacitaciones::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio
        ]);

        if ($res) {
            return redirect()->route('Capacitaciones.index')->with('agregar', 'Agregado Correctamente');
        } else {
            return redirect()->route('Capacitaciones.create')->with('error', 'error');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(capacitaciones $capacitaciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $capacitacion = capacitaciones::find($id);
        return view('admin.capacitaciones.edit', compact('capacitacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'titulo' => 'required',
                'descripcion' => 'required',
                'precio' => 'required',
            ],
            [
                'titulo.required' => 'El titulo es obligatorio',
                'descripcion.required' => 'La descripcion es obligatoria',
                'precio.required' => 'El precio es obligatorio',
            ]
        );

        $capacitacion = capacitaciones::findOrFail($id);
        $capacitacion->update([
            'id' => $request->id,
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio
        ]);

        return redirect()->route('Capacitaciones.index')->with('actualizar', 'Agregado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        capacitaciones::where('id', '=', $id)->delete();
        return redirect()->route('Capacitaciones.index')->with('eliminar', 'Eliminado Correctamente');
    }
}
