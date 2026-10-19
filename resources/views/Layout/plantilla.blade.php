<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi Proyecto BDD')</title>
    <!-- Cargamos Tailwind CSS para el diseño visual limpio -->
    <!-- <script src="https://tailwindcss.com"></script> -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans antialiased text-gray-900">

    <!-- Barra de Navegación de la Universidad -->
    <nav class="bg-blue-600 shadow-md text-white">
        <div class="max-w-5xl mx-auto px-4 py-4 flex justify-between items-center">
            <span class="font-extrabold text-lg tracking-wider"> PRACTICA DE DISENO WEB I</span>
            <div class="space-x-4 text-sm font-medium">
                <a href="{{ route('instructores.index') }}" class="hover:text-blue-200 transition">Instructores</a>
                <span class="text-blue-300">|</span>
                <span class="text-blue-100">PostgreSQL + Laravel</span>
            </div>
        </div>
    </nav>

    <!-- Contenido Dinámico que cambiará en cada página -->
    <main class="min-h-screen">
        @yield('content')
    </main>

    <!-- Pie de página fijo -->
    <footer class="bg-white border-t border-gray-200 text-center py-4 text-xs text-gray-400 font-medium">
        &copy; {{ date('Y') }} - Desarrollado por Luis - Tecnología Web I
    </footer>

</body>
</html>
