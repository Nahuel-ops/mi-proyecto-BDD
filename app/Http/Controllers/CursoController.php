<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Categoria;
use App\Models\Instructor;
use App\Models\Horario;
use App\Http\Requests\CursoRequest;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    // IMÁGENES 1 y 2: Método para listar los cursos con buscador y filtros
    public function index(Request $request)
    {
        $cursos = Curso::with(['categoria', 'instructor', 'horario'])
            // Si el usuario escribe algo en el buscador de texto
            ->when($request->filled('buscar'), fn ($q) => 
                $q->where('nombre', 'ilike', '%' . $request->buscar . '%')
            )
            // Si el usuario selecciona un filtro por categoría
            ->when($request->filled('categoria_id'), fn ($q) => 
                $q->where('categoria_id', $request->categoria_id)
            )
            ->orderBy('nombre')
            ->paginate(10)
            ->withQueryString(); // Mantiene los filtros activos al cambiar de página

        // Carga las categorías ordenadas para el menú desplegable del buscador
        $categorias = Categoria::orderBy('nombre')->get();

        return view('cursos.index', compact('cursos', 'categorias'));
    }

    // IMAGEN 4: Envía un objeto Curso vacío y los datos que requiere el formulario
    public function create()
    {
        return view('cursos.create', $this->datosFormulario() + [
            'curso' => new Curso(),
        ]);
    }

    //  IMAGEN 3: Guarda el nuevo curso usando la validación de CursoRequest
    public function store(CursoRequest $request)
    {
        Curso::create($request->validated());

        return redirect()->route('cursos.index')
            ->with('success', 'Curso registrado correctamente.');
    }

    // Función auxiliar para agrupar los datos necesarios del formulario (Evita repetir código)
    private function datosFormulario()
    {
        return [
            'categorias'   => Categoria::orderBy('nombre')->get(),
            'instructores' => Instructor::orderBy('apellido')->get(),
            'horarios'     => Horario::orderBy('turno')->get(),
        ];
    }
}
