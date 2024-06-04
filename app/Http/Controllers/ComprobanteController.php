<?php

namespace App\Http\Controllers;

use App\Models\Comprobante;

use Illuminate\Http\Request;

class ComprobanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.comprobantes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validar los datos del formulario
    $request->validate([
        'tipo_comprobante' => 'required',
        'fecha_elaboracion' => 'required|date',
        'tipo_cuenta_contable' => 'required',
        'tercero' => 'required',
        'descripcion' => 'required',
        'debito' => 'required|numeric',
        'credito' => 'required|numeric',
        'observaciones' => 'nullable|string',
        'adjuntar_documento' => 'nullable|file',
    ]);

    // Crear un nuevo comprobante con los datos recibidos
    $comprobante = new Comprobante();
    $comprobante->tipo_comprobante = $request->tipo_comprobante;
    $comprobante->fecha_elaboracion = $request->fecha_elaboracion;
    $comprobante->tipo_cuenta_contable = $request->tipo_cuenta_contable;
    $comprobante->tercero = $request->tercero;
    $comprobante->descripcion = $request->descripcion;
    $comprobante->debito = $request->debito;
    $comprobante->credito = $request->credito;
    $comprobante->observaciones = $request->observaciones;

    // Si se adjuntó un documento, guardar el archivo
    if ($request->hasFile('adjuntar_documento')) {
        $archivo = $request->file('adjuntar_documento');
        $nombreArchivo = $archivo->getClientOriginalName();
        $ruta = $archivo->storeAs('documentos', $nombreArchivo);
        $comprobante->adjuntar_documento = $ruta;
    }

    // Guardar el comprobante en la base de datos
    $comprobante->save();

    // Redireccionar de vuelta al formulario con un mensaje de éxito
    return redirect()->back()->with('success', '¡Comprobante guardado exitosamente!');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
