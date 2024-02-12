<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SportController;
use Faker\Guesser\Name;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('auth.login');
});
// este es el crud de deportes
// esta se ruta se encarga de listar todos los depotes
Route::get('/dashboard', [SportController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');
// Esta ruta se encarga de Agregar nuevos deportes
Route::post('/dashboard', [SportController::class, 'store'])->middleware(['auth', 'verified'])->name('dashboard.store');
// Esta se encarga de mostrar  el formulario para agregar los deportes
Route::get('dashboard/create', [SportController::class,'show'])->middleware(['auth', 'verified'])->name('dashboard.create');
// Esta ruta se encarga de eliminar los deportes
Route::delete('/dashboard/{deporte}', [SportController::class, 'destroy'])->middleware(['auth', 'verified'])->name('dashboard.destroy');
//Esta ruta siver para Ver la vista de editar deportes
Route::get('/dashboard/editarSport/{deporte}', [SportController::class, 'editarDeporte'])->middleware(['auth', 'verified'])->name('dashboard.editarDeporte');
//Esta ruta se encarga de editar el deporte
Route::put('/dashboard/editardeporte/{deporte}', [SportController::class, 'editsport'])->Middleware(['auth', 'verified'])->name('dashboard.editSport');
// este es el  crud de usuarios
///////////////////////////////////////////////////////////////////////////////////////
//Esta ruta se encarga de listar los usuarios
Route::get('dashboard/usuarios',[SportController::class, 'ListarUsuarios'])->middleware(['auth', 'verified'])->name('dashboard.usuarios');
//Esta ruta se encarga de mostrar el formulario para agregar a los usuarios
Route::get('dashboard/usuarios/form', [SportController::class, 'showUsuarios'])->middleware(['auth', 'verified'])->name('dashboard.storeUsuarios');
//Esta ruta se encarga de Insertar el usuario a la base de datos 
Route::post('dashboard/usuario/crear', [SportController::class, 'CrearUsuario'])->middleware(['auth', 'verified'])->name('dashboard.CrearUsuario');
// Esta ruta se encarga de eliminar a el usuario
Route::delete('/dashboardd/{usuario}', [SportController::class, 'destroyUsuario'])->middleware(['auth', 'verified'])->name('dashboard.destroyUsuarios');
//Esta ruta sirve para ir a la vista editar usuario
Route::get('dashboard/usuario/editar/{usuario}', [SportController::class, 'editar'])->middleware(['auth', 'verified'])->name('dashboard.editar');
//En esta ruta podras Editar un usuario
Route::put('/dashboard/editar/{usuario}', [SportController::class, 'updateusuario'])->middleware(['auth', 'verified'])->name('dashboard.editarUser');
// Route::get('/listar', [SportController::class,'index'])->name('deportes.show');

///////////////////////////Rutas para consumir un api///////////////////////////////////
Route::get('dashboard/api', [SportController::class, 'vistaApi'])->middleware(['auth', 'verified'])->name('dashboardApi');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//es requiere Se utiliza par incluir el archivo auth php un script de PHP
require __DIR__.'/auth.php';
