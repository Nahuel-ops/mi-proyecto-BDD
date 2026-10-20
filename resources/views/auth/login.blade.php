//libre de siseno
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Mi Proyecto BDD</title>
    <!-- Tailwind CSS CDN para un diseño rápido y profesional -->
    <script src="https://jsdelivr.net"></script>
</head>
<body class="bg-slate-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-2xl shadow-md w-full max-w-md">
        <!-- Encabezado -->
        <div class="text-center mb-6">
            <h2 class="text-3xl font-bold text-slate-800">¡Bienvenido!</h2>
            <p class="text-sm text-slate-500 mt-1">Ingresa tus credenciales para acceder al sistema</p>
        </div>

        <!-- Formulario que apunta al método login del controlador -->
        <form action="{{ route('login') }}" method="POST" class="space-y-4">

            <!-- Directiva de seguridad Token CSRF obligatoria en Laravel -->
            @csrf 

            <!-- Campo: Correo Electrónico -->
            <div>
                <label for="email" class="block text-sm font-medium text-slate-700 mb-1">Correo Electrónico</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                    class="w-full px-4 py-2 border rounded-xl bg-slate-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('email') border-red-500 @enderror"
                    placeholder="ejemplo@correo.com">
                
                <!-- Mensaje de error para el correo -->
                @error('email')
                    <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Campo: Contraseña -->
            <div>
                <label for="password" class="block text-sm font-medium text-slate-700 mb-1">Contraseña</label>
                <input type="password" name="password" id="password" required
                    class="w-full px-4 py-2 border rounded-xl bg-slate-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('password') border-red-500 @enderror"
                    placeholder="••••••••">

                <!-- Mensaje de error para la contraseña -->
                @error('password')
                    <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Botón de Ingreso -->
            <button type="submit" 
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 px-4 rounded-xl transition duration-200 shadow-sm mt-2 cursor-pointer">
                Iniciar Sesión
            </button>
        </form>

        <!-- Divisor visual -->
        <div class="relative flex py-4 items-center">
            <div class="flex-grow border-t border-slate-200"></div>
            <span class="flex-shrink mx-4 text-slate-400 text-xs uppercase">¿Nuevo en el sistema?</span>
            <div class="flex-grow border-t border-slate-200"></div>
        </div>

        <!-- Sección de Registro (Enlace para no registrados) -->
        <div class="text-center">
            <p class="text-sm text-slate-600">
                ¿No tienes una cuenta? 
                <a href="{{ route('registro.formulario') }}" class="text-blue-600 hover:text-blue-800 font-medium underline transition duration-150">
                    Regístrate aquí
                </a>
            </p>
        </div>
    </div>

</body>
</html>
