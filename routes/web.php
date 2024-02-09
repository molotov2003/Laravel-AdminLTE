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

Route::get('/dashboard', [SportController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

// este es el crud de deportes
Route::get('/dashboard', [SportController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::post('/dashboard', [SportController::class, 'store'])->middleware(['auth', 'verified'])->name('dashboard.store');
Route::get('dashboard/create', [SportController::class,'show'])->middleware(['auth', 'verified'])->name('dashboard.create');
Route::delete('/dashboard/{deporte}', [SportController::class, 'destroy'])->middleware(['auth', 'verified'])->name('dashboard.destroy');

// este es el  crud de usuarios
Route::get('dashboard/usuarios',[SportController::class, 'ListarUsuarios'])->middleware(['auth', 'verified'])->name('dashboard.usuarios');
Route::get('dashboard/usuarios/form', [SportController::class, 'showUsuarios'])->middleware(['auth', 'verified'])->name('dashboard.storeUsuarios');
Route::post('dashboard/usuario/crear', [SportController::class, 'CrearUsuario'])->middleware(['auth', 'verified'])->name('dashboard.CrearUsuario');
Route::delete('/dashboardd/{usuario}', [SportController::class, 'destroyUsuario'])->middleware(['auth', 'verified'])->name('dashboard.destroyUsuarios');
// Route::get('/listar', [SportController::class,'index'])->name('deportes.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
