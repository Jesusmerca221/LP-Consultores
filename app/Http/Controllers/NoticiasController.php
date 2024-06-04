<?php

namespace App\Http\Controllers;

use App\Models\Noticias;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NoticiasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('can:Noticias.index')->only('index', 'store', 'show', 'edit', 'update', 'destroy');
    }

    public function noticiasApi()
    {
        $datos = Noticias::all();
        foreach ($datos as $registro) {
            $fechaNumerica = $registro->fecha;
            $fechaCadena = Carbon::parse($fechaNumerica)->format('d M, Y');
            $registro->fecha = $fechaCadena;
        }
        return response()->json($datos);
    }

    public function detalleNoticiasApi($id)
    {
        $datos = Noticias::findOrFail($id);
        $datos->fecha = Carbon::parse($datos->fecha)->format('d M, Y');
        return response()->json($datos);
    }

    public function index()
    {
        $datos = Noticias::all();
        foreach ($datos as $registro) {
            $fechaNumerica = $registro->fecha;
            $fechaCadena = Carbon::parse($fechaNumerica)->format('d M, Y');
            $registro->fecha = $fechaCadena;
        }
        return view('admin.noticias.noticias', compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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
                'imagen' => 'required|image',
                'fecha' => 'required'

            ],
            [
                'titulo.required' => 'El titulo es obligatorio',
                'descripcion.required' => 'La descripcion es obligatoria',
                'imagen.required' => 'La imagen es obligatoria',
                'imagen.image' => 'La imagen es obligatoria',
                'fecha.required' => 'La fecha es obligatoria'
            ]
        );

        $imagen = $request->file('imagen')->store('public/imagenes/noticias');
        $url = Storage::url($imagen);

        Noticias::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $url,
            'fecha' => $request->fecha
        ]);
        return redirect()->route('Noticias.index')->with('agregar', 'Agregado Correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $noticia = Noticias::find($id);
        return view('admin.noticias.detalle', compact('noticia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $datos = Noticias::findOrFail($id);
        return view('admin.noticias.edit', compact('datos'));
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
                'fecha' => 'required'
            ],
            [
                'titulo.required' => 'El titulo es obligatorio',
                'descripcion.required' => 'La descripcion es obligatoria',
                'fecha.required' => 'La fecha es obligatoria'
            ]
        );

        $noticias = Noticias::findOrFail($id);

        if ($request->imagen == null) {
            $noticias->update([
                'id' => $request->id,
                'titulo' => $request->titulo,
                'descripcion' => $request->descripcion,
                'fecha' => $request->fecha,
            ]);
        } else {
            $imagen = $request->file('imagen')->store('public/imagenes/noticias');
            $url = Storage::url($imagen);

            $imagenEliminar = str_replace('storage', 'public', $noticias->imagen);

            Storage::delete($imagenEliminar);

            $noticias->update([
                'id' => $request->id,
                'titulo' => $request->titulo,
                'descripcion' => $request->descripcion,
                'imagen' => $url,
                'fecha' => $request->fecha,
            ]);
        }
        return redirect()->route('Noticias.index')->with('actualizar', 'Agregado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $noticia = Noticias::findOrFail($id);

        $imagenEliminar = str_replace('storage', 'public', $noticia->imagen);
        Storage::delete($imagenEliminar);

        $noticia->delete();
        return redirect()->route('Noticias.index')->with('eliminar', 'Agregado Correctamente');
    }
}
