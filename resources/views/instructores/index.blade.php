@extends('Layout.plantilla')

@section('title', 'Lista de Instructores')

@section('content')
<div class="py-6 max-w-5xl mx-auto text-gray-800 px-4">
    <h2 class="text-2xl font-bold text-gray-900 border-l-4 border-blue-500 pl-3 mb-6">Lista de Instructoresss (Paginado de 5 en 5)</h2>

    <!-- Tabla de Instructores desde PostgreSQL -->
    <div class="bg-white border border-gray-200 rounded-3xl shadow-lg overflow-hidden mb-6">
        <table class="min-w-full divide-y divide-gray-200 text-left text-sm">
            <thead class="bg-gray-50 text-gray-500 uppercase tracking-wider text-xs font-bold">
                <tr>
                    <th class="px-6 py-4">Apellido y Nombre</th>
                    <th class="px-6 py-4">Email</th>
                    <th class="px-6 py-4">Especialidad</th>
                    <th class="px-6 py-4 text-center">Cursos Dictados</th>
                    <th class="px-6 py-4 text-center">prueb</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                @foreach($instructores as $instructor)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 font-semibold text-gray-900">{{ $instructor->apellido }}, {{ $instructor->nombre }}</td>
                        <td class="px-6 py-4 text-gray-500">{{ $instructor->email }}</td>
                        <td class="px-6 py-4 text-gray-600 font-medium">{{ $instructor->especialidad }}</td>
                        <td class="px-6 py-4 text-center">
                            <span class="bg-blue-50 text-blue-600 px-3 py-1 rounded-full text-xs font-bold border border-blue-100">
                                {{ $instructor->cursos_count }} cursos
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- 📑 BOTONES DE PAGINACIÓN AUTOMÁTICA -->
    <div class="mt-4">
        {{ $instructores->links() }}
    </div>
</div>
@endsection
