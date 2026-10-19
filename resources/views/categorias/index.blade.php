@extends('Layout.plantilla')

@section('title', 'Gestión de Categorías')

@section('content')
<div class="py-6 max-w-5xl mx-auto text-gray-800 px-4">
    
    @if(session('success'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-600 px-4 py-3 rounded-2xl mb-6 font-semibold shadow-sm text-sm">
             {{ session('success') }}
        </div>
    @endif

    <h2 class="text-2xl font-bold text-gray-900 border-l-4 border-blue-500 pl-3 mb-6">Administrar Categorías</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- COLUMNA 1 y 2: Listado de Categorías de la BDD -->
        <div class="md:col-span-2">
            <div class="bg-white border border-gray-200 rounded-3xl shadow-lg overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200 text-left text-sm">
                    <thead class="bg-gray-50 text-gray-500 uppercase text-xs font-bold">
                        <tr>
                            <th class="px-6 py-4">ID</th>
                            <th class="px-6 py-4">Nombre de la Categoría</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        @foreach($categorias as $cat)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 text-gray-400 font-bold">#{{ $cat->id }}</td>
                                <td class="px-6 py-4 font-semibold text-gray-900">{{ $cat->nombre }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="p-4 border-t border-gray-100">
                    {{ $categorias->links() }}
                </div>
            </div>
        </div>

        <!--  COLUMNA 3: Formulario Rápido de Inserción -->
        <div>
            <div class="bg-white border border-gray-200 rounded-3xl p-5 shadow-md">
                <h3 class="text-sm font-bold text-gray-700 uppercase tracking-wider mb-4">Nueva Categoría</h3>
                <form action="{{ route('categorias.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase mb-1">Nombre</label>
                        <input type="text" name="nombre" value="{{ old('nombre') }}" placeholder="Ej: Programación Móvil" class="w-full bg-gray-50 border @error('nombre') border-red-400 focus:border-red-400 @else border-gray-200 focus:border-blue-500 @enderror rounded-xl px-3 py-2 text-sm focus:outline-none transition">
                        @error('nombre') <span class="text-xs font-semibold text-red-500 mt-1 block">⚠️ {{ $message }}</span> @enderror
                    </div>
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 rounded-xl shadow-sm text-sm transition">
                         Registrar Categoría
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
