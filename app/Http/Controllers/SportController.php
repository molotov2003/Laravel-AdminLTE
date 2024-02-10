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
    //Este controlador se encarga de cagar la vista dashboard y listar todos los deportes
    public function index()
    {
        // Con el metodo all() Se encarga de traer todos los datos de la tabla deportes 
        $deportes = Deporte::all();
        // retorno la vista (dashboard, y el compact se encarga de obtener todos los datos de la variable y mandarlos en una arreglo a la vista)
        return view('dashboard', compact('deportes'));
    }
    //Esta funcion solo se encarga de retornar la vista crear deportes
    public function show()
    {
        //Retorno la vista para crear deportes
        return view('deportes.crear');
    }  
    //Esta funcion se encarga de agregar datos a la tabla deportes
    public function store(Request $request)
    {
        //Con el request hacemos todas la validaciones que queremos tener en los campos de la tabla deporte 
        $request->validate([
            'name' => ['required', 'min:3'],
            'descripcion' => ['required', 'min:3'],
            'personas' => 'required'
        ]);
        // Listamos todos los datos de la tabla deportes
        $deportes = Deporte::paginate(100);
        //Aqui creamos usamos el meotodo create para mandar la variable $request con todos los datos
        $deporte = Deporte::create($request->all());
        // Retornamos un json con succes y true para manipular la desicion en la vista y usar el sweet alert
        return response()->json(['success' => true]);
    }
    //Esta funcion Sirve para borrar un dato de la tabla deportes
    public function destroy(Deporte $deporte)
    {
        //El metodo delete sirve para hacer la consulta para borrar
        $deporte->delete();

        $deportes = Deporte::all();

        return response()->json(['success' => true]);
    }
    //Esta funcion sirve para listar los usuarios
    public function ListarUsuarios()
    {
        //Con esta funcion listamos todos los usuarios
        $usuarios = User::all();
        //E metodo view() Se encarga de ir a la carpeta vista y buscar la carpeta usuarios y buscar la vista index  con el compact mandamos todos los datos 
        return view('usuarios.index', compact('usuarios'));
    }
    //Esta funcion se encarga de  llevarnos a la vista de crear usuarios
    public function showUsuarios(){
        return view('usuarios.crear');
    }
    //Esta funcion se encargar de hacer la consulta SQL a la base de datos para crear un usuario
    public function CrearUsuario(Request $request){

        //Con el request hacemos las validaciones a los campos 
        $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'min:3'],
            'password' => 'required'
        ]);
        //Con este metodo paginate() se encarga de listar la cantidad de datos que quieres que aparezca
        $usuarios = User::paginate(100);
        // usamos el metodo create crear los usuarios
        $usuario = User::create($request->all());
        //retornamos el json para manipular el desicion de el sweet alert
        return response()->json(['success' => true]);
        }
    //Con esta funcion podemos borrar un usuario
    public function destroyUsuario(User $usuario)
    {
        //El metodo delete() Funcion para hacer la consulta SQL para borrar un registro
        $usuario->delete();
        //Con el metodo all() Traemos todos los registros de la base de datos
        $usuarios = User::all();
        //retornamos la vista index  y mandamos en un array con el metodo compact para listar en la vista
        return view('usuarios.index', compact('usuarios'));
    }
}
