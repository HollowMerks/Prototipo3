<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Market - Login Administrativo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
    </style>
</head>
<body>
    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="w-full max-w-md">
            <!-- Card -->
            <div class="bg-white rounded-lg shadow-xl p-8">
                <!-- Header -->
                <div class="text-center mb-8">
                    <h1 class="text-4xl font-bold text-gray-900">Campus Market</h1>
                    <p class="text-gray-500 mt-2 text-sm">Panel Administrativo</p>
                    <div class="mt-4 h-1 w-16 bg-blue-600 mx-auto rounded"></div>
                </div>

                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 rounded">
                        <p class="text-red-700 font-semibold text-sm">Error de autenticación</p>
                        <p class="text-red-600 text-sm mt-1">{{ $errors->first('error') ?? 'Ha ocurrido un error.' }}</p>
                    </div>
                @endif

                <!-- Success Messages -->
                @if (session('success'))
                    <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 rounded">
                        <p class="text-green-700 text-sm">{{ session('success') }}</p>
                    </div>
                @endif

                <!-- Login Form -->
                <form method="POST" action="{{ route('login.post') }}" class="space-y-6" novalidate>
                    @csrf

                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                            Correo Electrónico
                        </label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-200 transition"
                            placeholder="admin@ejemplo.com"
                        >
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                            Contraseña
                        </label>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            required
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-200 transition"
                            placeholder="••••••••"
                        >
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button
                        type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 active:bg-blue-800 text-white font-semibold py-2.5 px-4 rounded-lg transition duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                    >
                        Iniciar Sesión
                    </button>
                </form>

                <!-- Footer -->
                <div class="mt-8 pt-6 border-t border-gray-200">
                    <p class="text-center text-gray-500 text-xs">
                        © 2025 Campus Market. Todos los derechos reservados.
                    </p>
                </div>
            </div>

            <!-- Security Info -->
            <div class="mt-8 text-center text-white text-sm">
                <p>🔒 Este panel es solo para administradores autorizados</p>
            </div>
        </div>
    </div>
</body>
</html>
