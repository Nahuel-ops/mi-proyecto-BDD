<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Http\Requests\CategoriaRequest;

class CategoriaController extends Controller
{
    public function index()
    {
        // Trae las categorías ordenadas alfabéticamente y paginadas de 5 en 5
        $categorias = Categoria::orderBy('nombre')->paginate(5);
        return view('categorias.index', compact('categorias'));
    }

    public function store(CategoriaRequest $request)
    {
        // Guarda en PostgreSQL usando los datos ya validados
        Categoria::create($request->validated());

        return redirect()->route('categorias.index')
            ->with('success', 'Categoría registrada correctamente.');
    }
}
