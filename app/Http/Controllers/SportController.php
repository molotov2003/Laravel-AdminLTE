<?php

namespace App\Http\Controllers;

use App\Models\Deporte;
use App\Models\User;
use Illuminate\Http\Request;
use Psy\Readline\Hoa\Console;
use App\Http\Controllers\Log;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class SportController extends Controller
{
    public function index()
    {

        $deportes = Deporte::all();

        return view('dashboard', compact('deportes'));
    }
    public function show()
    {
        return view('deportes.crear');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:3'],
            'descripcion' => ['required', 'min:3'],
            'personas' => 'required'
        ]);
        $deportes = Deporte::paginate(100);
        $deporte = Deporte::create($request->all());

        return view('dashboard', compact('deportes'));
    }
    public function destroy(Deporte $deporte)
    {
        $deporte->delete();

        $deportes = Deporte::all();

        return view('dashboard', compact('deportes'));
    }
    //  estas funciones son para los usuarios
    public function ListarUsuarios()
    {
        $usuarios = User::all();

        return view('usuarios.index', compact('usuarios'));
    }
    public function showUsuarios(){

        return view('usuarios.crear');
    }
    public function CrearUsuario(Request $request){

        $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'min:3'],
            'password' => 'required'
        ]);
        $usuarios = User::paginate(100);
        $usuario = User::create($request->all());

        return view('usuarios.index', compact('usuarios'));
    }

    public function destroyUsuario(User $usuario)
    {
        $usuario->delete();
        $usuarios = User::all();
        return view('usuarios.index', compact('usuarios'));
    }
}
