<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('can:Usuarios.index')->only('index', 'store', 'edit', 'update', 'destroy');
    }

    public function index()
    {
        $datos = User::all();
        return view('admin.user.usuarios', compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nombres' => 'required',
                'apellidos' => 'required',
                'email' => 'required|unique:users',
                'password' => 'required',
                'telefono' => 'required'
            ],
            [
                'nombres.required' => 'El nombre es obligatorio',
                'apellidos.required' => 'Los apellidos es obligatorio',
                'email.required' => 'El email es obligatorio',
                'email.unique' => 'El email ya se encuentra registrado',
                'password.required' => 'El password es obligatorio',
                'telefono.required' => 'El telefono es obligatorio'
            ]
        );

        User::create(
            [
                'nombres' => $request->nombres,
                'apellidos' => $request->apellidos,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'telefono' => $request->telefono
            ]
        )->assignRole('Estudiante');

        return redirect()->route('Usuarios.index')->with('agregar', 'Agregado Correctamente');
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
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        if ($user->email == $request->email) {
            $request->validate(
                [
                    'nombres' => 'required',
                    'apellidos' => 'required',
                    'email' => 'required',
                    'telefono' => 'required'
                ],
                [
                    'nombres.required' => 'El nombre es obligatorio',
                    'apellidos.required' => 'Los apellidos es obligatorio',
                    'email.required' => 'El email es obligatorio',
                    'telefono.required' => 'El telefono es obligatorio'
                ]
            );
        } else {
            $request->validate(
                [
                    'nombres' => 'required',
                    'apellidos' => 'required',
                    'email' => 'required|unique:users',
                    'telefono' => 'required'
                ],
                [
                    'nombres.required' => 'El nombre es obligatorio',
                    'apellidos.required' => 'Los apellidos es obligatorio',
                    'email.required' => 'El email es obligatorio',
                    'email.unique' => 'El email ya se encuentra registrado',
                    'password.required' => 'El password es obligatorio',
                    'telefono.required' => 'El telefono es obligatorio'
                ]
            );
        }
        $user->update([
            'id' => $request->id,
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'telefono' => $request->telefono
        ]);

        return redirect()->route('Usuarios.index')->with('actualizar', 'Agregado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('id', '=', $id)->delete();
        return redirect()->route('Usuarios.index')->with('eliminar', 'Agregado Correctamente');
    }

    public function cursosEstudiante()
    {
        $user = User::find(2)->compras;
        return response()->json($user);
    }
}
