@extends('Layout.plantilla')

@section('title', 'Lista de Cursos')

@section('content')
<div class="py-6 max-w-5xl mx-auto text-gray-800 px-4">
    
    <!-- Mensaje de Éxito Flotante -->
    @if(session('success'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-600 px-4 py-3 rounded-2xl mb-6 font-semibold shadow-sm text-sm">
            ✅ {{ session('success') }}
        </div>
    @endif

    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 gap-4">
        <h2 class="text-2xl font-bold text-gray-900 border-l-4 border-blue-500 pl-3">Catálogo de Cursos</h2>
        <a href="{{ route('cursos.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-5 py-2.5 rounded-2xl shadow-md transition text-sm text-center">
            ➕ Crear Nuevo Curso
        </a>
    </div>

    <!-- 🔍 SECCIÓN DE BÚSQUEDA Y FILTROS (Formulario conectado al Controlador) -->
    <form action="{{ route('cursos.index') }}" method="GET" class="bg-white border border-gray-200 rounded-3xl p-4 shadow-sm mb-6 flex flex-col sm:flex-row gap-3">
        <div class="flex-1">
            <input type="text" name="buscar" value="{{ request('buscar') }}" placeholder="Buscar curso por nombre..." class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2 text-sm focus:outline-none focus:border-blue-500 transition">
        </div>
        <div class="w-full sm:w-48">
            <select name="categoria_id" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:border-blue-500 transition">
                <option value="">Todas las Categorías</option>
                @foreach($categorias as $cat)
                    <option value="{{ $cat->id }}" {{ request('categoria_id') == $cat->id ? 'selected' : '' }}>{{ $cat->nombre }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="bg-gray-900 hover:bg-gray-800 text-white font-semibold px-5 py-2 rounded-xl text-sm transition">
            Filtrar
        </button>
        @if(request('buscar') || request('categoria_id'))
            <a href="{{ route('cursos.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-600 font-semibold px-4 py-2 rounded-xl text-sm transition text-center">
                Limpiar
            </a>
        @endif
    </form>

    <!-- 📊 Tabla de Cursos desde PostgreSQL -->
    <div class="bg-white border border-gray-200 rounded-3xl shadow-lg overflow-hidden mb-6">
        <table class="min-w-full divide-y divide-gray-200 text-left text-sm">
            <thead class="bg-gray-50 text-gray-500 uppercase tracking-wider text-xs font-bold">
                <tr>
                    <th class="px-6 py-4">Curso</th>
                    <th class="px-6 py-4">Categoría</th>
                    <th class="px-6 py-4">Instructor</th>
                    <th class="px-6 py-4">Horario</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                @forelse($cursos as $cur)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4">
                            <div class="font-semibold text-gray-900 text-base">{{ $cur->nombre }}</div>
                            <div class="text-xs text-gray-400 mt-0.5 line-clamp-1">{{ $cur->descripcion }}</div>
                        </td>
                        <td class="px-6 py-4"><span class="bg-gray-100 text-gray-700 px-2.5 py-1 rounded-lg text-xs font-medium">{{ $cur->categoria->nombre }}</span></td>
                        <td class="px-6 py-4 text-gray-600 font-medium">{{ $cur->instructor->apellido }}, {{ $cur->instructor->nombre }}</td>
                        <td class="px-6 py-4"><span class="text-blue-600 font-semibold text-xs bg-blue-50 px-2 py-1 rounded-md">{{ $cur->horario->turno }} ({{ $cur->horario->hora }})</span></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center text-gray-400 font-medium">❌ No se encontraron cursos con los filtros aplicados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- BOTONES DE PAGINACIÓN AUTOMÁTICA -->
    <div class="mt-4">
        {{ $cursos->links() }}
    </div>
</div>
@endsection
