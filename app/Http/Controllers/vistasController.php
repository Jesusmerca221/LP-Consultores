<?php

namespace App\Http\Controllers;

use App\Models\Capacitaciones;
use App\Models\Cursos;
use App\Models\Noticias;
use App\Models\User;
use Illuminate\Http\Request;

class vistasController extends Controller
{

    public function welcome()
    {
        return view('welcome');
    }

    public function dashboard()
    {
        $users = User::count();
        $noticias = Noticias::count();
        $cursos = Cursos::count();
        $capacitaciones = Capacitaciones::count();
        return view('dashboard', compact('users', 'noticias', 'cursos', 'capacitaciones'));
    }
}
