<?php

use App\Http\Controllers\InstructorController;
use App\Http\Controllers\CursoController;
//se agrego la ruta de CategoriaController
use App\Http\Controllers\CategoriaController;
//se agrego la ruta de HorarioController
use App\Http\Controllers\HorarioController;
//1. IMPORTACION DEL LOGIN CONTROLLER
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

//parte publica
//  Redirecciona la página de inicio directamente a la lista de cursos
Route::get('/', fn () => redirect()->route('cursos.index'));

// Crea automáticamente todas las rutas CRUD para cursos
Route::resource('cursos', CursoController::class);

// Crea automáticamente todas las rutas CRUD para instructores
Route::resource('instructores', InstructorController::class)
    ->parameters(['instructores' => 'instructor']);
// Crea automáticamente todas las rutas CRUD para categorías
Route::resource('categorias', CategoriaController::class);
// Crea automáticamente todas las rutas CRUD para horarios

Route::resource('horarios', HorarioController::class);

//parte privada (esto se creo este dia de fecha 20 de octubre de 2026)
// Rutas de autenticación (login, registro, etc.)
Route::middleware('guest')->group(function () {
    //muestra ell formulario de login.
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    //procesa el inicio de sesion con limite de intentos (thottle)
    Route::post('/login', [LoginController::class, 'store'])->middleware('throttle:5,1');
});

//rutas protegidas para cursos solo admmin y con middleware de actividad
Route::middleware(['auth', 'rol:admin', 'actividad'])->group(function () {
//permite crear, editar y borrar cursos de forma segura.    
Route::post('cursos', CursoController::class)->except(['index', 'show']);
});

//rutas protegidas para Instructores (solo usuarios autenticados y administradores).
Route::resource('cursos', CursoController::class)->only(['index', 'show']);

Route::resource('instructores', InstructorController::class)
    ->parameters(['instructores' => 'instructor'])
    ->middleware(['auth', 'rol:admin']);
