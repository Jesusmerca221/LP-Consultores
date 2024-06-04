<?php

namespace App\Http\Controllers;

use App\Models\Cursos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class cursosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('can:Cursos.index')->only('index', 'store', 'edit', 'update', 'destroy');
    }

    public function cursosApi(Request $request)
    {
        $cursos = Cursos::all();
        return response()->json($cursos);
    }


    public function index()
    {
        $cursos = Cursos::all();
        return view('admin.cursos.cursos', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cursos.add');
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
                'precio' => 'required',
                'duracion' => 'required'
            ],
            [
                'titulo.required' => 'El titulo es obligatorio',
                'descripcion.required' => 'La descripcion es obligatoria',
                'imagen.required' => 'La imagen es obligatoria',
                'precio.required' => 'El precio es obligatorio',
                'duracion.required' => 'La duracion es obligatoria'
            ]
        );

        $imagen = $request->file('imagen')->store('public/imagenes/cursos');
        $url = Storage::url($imagen);

        Cursos::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $url,
            'precio' => $request->precio,
            'duracion' => $request->duracion
        ]);
        return redirect()->route('Cursos.index')->with('agregar', 'Agregado Correctamente');
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
        $curso = Cursos::findOrFail($id);
        return view('admin.cursos.edit', compact('curso'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'titulo' => 'required',
                'descripcion' => 'required',
                'precio' => 'required',
                'duracion' => 'required'
            ],
            [
                'titulo.required' => 'El titulo es obligatorio',
                'descripcion.required' => 'La descripcion es obligatoria',
                'precio.required' => 'El precio es obligatorio',
                'duracion.required' => 'La duracion es obligatoria'
            ]
        );

        $curso = Cursos::findOrFail($id);

        if ($request->imagen == null) {
            $curso->update([
                'titulo' => $request->titulo,
                'descripcion' => $request->descripcion,
                'precio' => $request->precio,
                'duracion' => $request->duracion
            ]);
        } else {
            $imagen = $request->file('imagen')->store('public/imagenes/cursos');
            $url = Storage::url($imagen);

            $imagenEliminar = str_replace('storage', 'public', $curso->imagen);

            Storage::delete($imagenEliminar);

            $curso->update([
                'titulo' => $request->titulo,
                'descripcion' => $request->descripcion,
                'imagen' => $url,
                'precio' => $request->precio,
                'duracion' => $request->duracion
            ]);
        }
        return redirect()->route('Cursos.index')->with('actualizar', 'Agregado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $curso = Cursos::findOrFail($id);

        $imagenEliminar = str_replace('storage', 'public', $curso->imagen);
        Storage::delete($imagenEliminar);

        $curso->delete();
        return redirect()->route('Cursos.index')->with('eliminar', 'Eliminado Correctamente');
    }

}
