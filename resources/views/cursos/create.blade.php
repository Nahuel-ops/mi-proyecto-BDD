@extends('Layout.plantilla')

@section('title', 'Crear Curso')

@section('content')
<div class="py-6 max-w-2xl mx-auto text-gray-800 px-4">
    <div class="mb-6">
        <a href="{{ route('cursos.index') }}" class="text-sm font-semibold text-blue-600 hover:text-blue-700">⬅️ Volver al catálogo</a>
        <h2 class="text-2xl font-bold text-gray-900 mt-2">Registrar Nuevo Curso</h2>
    </div>

    <!-- Tarjeta del Formulario -->
    <div class="bg-white border border-gray-200 rounded-3xl p-6 shadow-xl">
        <form action="{{ route('cursos.store') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Campo Nombre -->
            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase mb-2 tracking-wider">Nombre del Curso</label>
                <input type="text" name="nombre" value="{{ old('nombre') }}" class="w-full bg-gray-50 border @error('nombre') border-red-400 focus:border-red-400 @else border-gray-200 focus:border-blue-500 @enderror rounded-xl px-4 py-2.5 text-sm focus:outline-none transition">
                @error('nombre') <span class="text-xs font-semibold text-red-500 mt-1 block">⚠️ {{ $message }}</span> @enderror
            </div>

            <!-- Menú Desplegable de Categorías -->
            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase mb-2 tracking-wider">Categoría</label>
                <select name="categoria_id" class="w-full bg-gray-50 border @error('categoria_id') border-red-400 focus:border-red-400 @else border-gray-200 focus:border-blue-500 @enderror rounded-xl px-3 py-2.5 text-sm focus:outline-none transition">
                    <option value="">-- Seleccionar Categoría --</option>
                    @foreach($categorias as $cat)
                        <option value="{{ $cat->id }}" {{ old('categoria_id') == $cat->id ? 'selected' : '' }}>{{ $cat->nombre }}</option>
                    @endforeach
                </select>
                @error('categoria_id') <span class="text-xs font-semibold text-red-500 mt-1 block">⚠️ El campo categoría es obligatorio.</span> @enderror
            </div>

            <!-- Menú Desplegable de Instructores -->
            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase mb-2 tracking-wider">Instructor Asignado</label>
                <select name="instructor_id" class="w-full bg-gray-50 border @error('instructor_id') border-red-400 focus:border-red-400 @else border-gray-200 focus:border-blue-500 @enderror rounded-xl px-3 py-2.5 text-sm focus:outline-none transition">
                    <option value="">-- Seleccionar Instructor --</option>
                    @foreach($instructores as $ins)
                        <option value="{{ $ins->id }}" {{ old('instructor_id') == $ins->id ? 'selected' : '' }}>{{ $ins->apellido }}, {{ $ins->nombre }}</option>
                    @endforeach
                </select>
                @error('instructor_id') <span class="text-xs font-semibold text-red-500 mt-1 block">⚠️ El campo instructor es obligatorio.</span> @enderror
            </div>

            <!-- Menú Desplegable de Horarios -->
            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase mb-2 tracking-wider">Horario y Turno</label>
                <select name="horario_id" class="w-full bg-gray-50 border @error('horario_id') border-red-400 focus:border-red-400 @else border-gray-200 focus:border-blue-500 @enderror rounded-xl px-3 py-2.5 text-sm focus:outline-none transition">
                    <option value="">-- Seleccionar Horario --</option>
                    @foreach($horarios as $hor)
                        <option value="{{ $hor->id }}" {{ old('horario_id') == $hor->id ? 'selected' : '' }}>{{ $hor->turno }} — {{ $hor->hora }} ({{ $hor->fecha }})</option>
                    @endforeach
                </select>
                @error('horario_id') <span class="text-xs font-semibold text-red-500 mt-1 block">⚠️ El campo horario es obligatorio.</span> @enderror
            </div>

            <!-- Campo Descripción -->
            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase mb-2 tracking-wider">Descripción (Opcional)</label>
                <textarea name="descripcion" rows="3" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition">{{ old('descripcion') }}</textarea>
            </div>

            <!-- Botón de Envío -->
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-xl shadow-md transition text-sm mt-2">
                 Guardar Curso en PostgreSQL
            </button>
        </form>
    </div>
</div>
@endsection
