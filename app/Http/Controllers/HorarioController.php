<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use App\Http\Requests\HorarioRequest;

class HorarioController extends Controller
{
    public function index()
    {
        // Lista los horarios ordenados por fecha y paginados de 5 en 5
        $horarios = Horario::orderBy('fecha', 'desc')->paginate(5);
        return view('horarios.index', compact('horarios'));
    }

    public function store(HorarioRequest $request)
    {
        // Almacena en PostgreSQL usando las columnas ya verificadas por el Request
        Horario::create($request->validated());

        return redirect()->route('horarios.index')
            ->with('success', 'Horario académico registrado con éxito.');
    }
}
