<?php

use App\Http\Controllers\InstructorController;
use App\Http\Controllers\CursoController;
//se agrego la ruta de CategoriaController
use App\Http\Controllers\CategoriaController;
//se agrego la ruta de HorarioController
use App\Http\Controllers\HorarioController;
use Illuminate\Support\Facades\Route;

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
