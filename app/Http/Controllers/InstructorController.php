<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    public function index()
    {
        // Carga, cuenta cursos, ordena y pagina de 5 en 5
        $instructores = Instructor::withCount('cursos')
            ->orderBy('apellido')
            ->paginate(5);

        // Envía los datos a la vista instructores.index
        return view('instructores.index', compact('instructores'));
    }

    public function create()
    {
        // Espacio para el formulario de creación futura
    }
}

