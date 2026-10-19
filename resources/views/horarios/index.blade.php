@extends('Layout.plantilla')

@section('title', 'Gestión de Horarios')

@section('content')
<div class="py-6 max-w-5xl mx-auto text-gray-800 px-4">
    
    @if(session('success'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-600 px-4 py-3 rounded-2xl mb-6 font-semibold shadow-sm text-sm">
            ✅ {{ session('success') }}
        </div>
    @endif

    <h2 class="text-2xl font-bold text-gray-900 border-l-4 border-blue-500 pl-3 mb-6">Administrar Horarios Académicos</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- 📊 COLUMNA 1 y 2: Listado de Horarios desde PostgreSQL -->
        <div class="md:col-span-2">
            <div class="bg-white border border-gray-200 rounded-3xl shadow-lg overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200 text-left text-sm">
                    <thead class="bg-gray-50 text-gray-500 uppercase text-xs font-bold">
                        <tr>
                            <th class="px-6 py-4">Turno</th>
                            <th class="px-6 py-4">Horas Asignadas</th>
                            <th class="px-6 py-4">Fecha</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        @foreach($horarios as $hor)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4"><span class="text-blue-600 font-semibold text-xs bg-blue-50 px-2.5 py-1 rounded-full border border-blue-100">{{ $hor->turno }}</span></td>
                                <td class="px-6 py-4 font-medium text-gray-900">{{ $hor->hora }}</td>
                                <td class="px-6 py-4 text-gray-500 font-semibold">{{ \Carbon\Carbon::parse($hor->fecha)->format('d/m/Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="p-4 border-t border-gray-100">
                    {{ $horarios->links() }}
                </div>
            </div>
        </div>

        <!-- ➕ COLUMNA 3: Formulario Rápido de Registro -->
        <div>
            <div class="bg-white border border-gray-200 rounded-3xl p-5 shadow-md">
                <h3 class="text-sm font-bold text-gray-700 uppercase tracking-wider mb-4">Nuevo Horario</h3>
                <form action="{{ route('horarios.store') }}" method="POST" class="space-y-4">
                    @csrf
                    
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase mb-1">Turno</label>
                        <select name="turno" class="w-full bg-gray-50 border @error('turno') border-red-400 focus:border-red-400 @else border-gray-200 focus:border-blue-500 @enderror rounded-xl px-3 py-2 text-sm focus:outline-none transition">
                            <option value="">-- Seleccionar --</option>
                            <option value="Mañana" {{ old('turno') == 'Mañana' ? 'selected' : '' }}>Mañana</option>
                            <option value="Tarde" {{ old('turno') == 'Tarde' ? 'selected' : '' }}>Tarde</option>
                            <option value="Noche" {{ old('turno') == 'Noche' ? 'selected' : '' }}>Noche</option>
                        </select>
                        @error('turno') <span class="text-xs font-semibold text-red-500 mt-1 block">⚠️ {{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase mb-1">Rango de Horas</label>
                        <input type="text" name="hora" value="{{ old('hora') }}" placeholder="Ej: 07:30 - 09:30" class="w-full bg-gray-50 border @error('hora') border-red-400 focus:border-red-400 @else border-gray-200 focus:border-blue-500 @enderror rounded-xl px-3 py-2 text-sm focus:outline-none transition">
                        @error('hora') <span class="text-xs font-semibold text-red-500 mt-1 block">⚠️ {{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase mb-1">Fecha</label>
                        <input type="date" name="fecha" value="{{ old('fecha') }}" class="w-full bg-gray-50 border @error('fecha') border-red-400 focus:border-red-400 @else border-gray-200 focus:border-blue-500 @enderror rounded-xl px-3 py-2 text-sm focus:outline-none transition">
                        @error('fecha') <span class="text-xs font-semibold text-red-500 mt-1 block">⚠️ {{ $message }}</span> @enderror
                    </div>

                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 rounded-xl shadow-sm text-sm transition">
                        💾 Registrar Horario
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
