<x-filament-panels::page.simple>
    @vite('resources/css/campus-market.css')
    <div class="flex min-h-screen items-center justify-center bg-dark-bg py-12 px-4 sm:px-6 lg:px-8" style="background-image: url('/img/priscilla-du-preez-ggeZ9oyI-PE-unsplash.jpg'); background-size: cover; background-position: center; background-attachment: fixed;">
        <div class="w-full max-w-md space-y-8">
            <div>
                <div class="mx-auto h-12 w-auto flex justify-center">
                    <svg class="h-12 w-12 text-amber-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443a55.381 55.381 0 0 1 5.25 2.882V15"/>
                    </svg>
                </div>
                <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-text-primary">
                    Iniciar sesión en Campus Market
                </h2>
                <p class="mt-2 text-center text-sm text-text-secondary">
                    Accede a tu cuenta de universidad
                </p>
            </div>

            <div class="space-y-6">
                <!-- Botón de Google OAuth -->
                <div>
                    <a href="{{ url('/auth/google') }}"
                       class="group relative flex w-full justify-center rounded-md border border-accent-teal bg-card-bg py-3 px-4 text-sm font-medium text-text-primary shadow-sm hover:bg-accent-teal focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2">
                        <svg class="h-5 w-5 mr-3" viewBox="0 0 24 24">
                            <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                            <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                            <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                            <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                        </svg>
                        Continuar con Google
                    </a>
                </div>

                <!-- Separador -->
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-accent-teal"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="bg-card-bg px-2 text-text-secondary">O</span>
                    </div>
                </div>

                <!-- Formulario de login tradicional -->
                <form class="space-y-6" action="{{ filament()->getLoginUrl() }}" method="POST">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-medium text-text-primary">
                            Correo electrónico
                        </label>
                        <div class="mt-1">
                            <input id="email" name="email" type="email" autocomplete="email" required
                                   class="block w-full appearance-none rounded-md border border-accent-teal px-3 py-2 placeholder-text-secondary shadow-sm focus:border-amber-500 focus:outline-none focus:ring-amber-500 sm:text-sm bg-card-bg text-text-primary"
                                   value="{{ old('email') }}">
                        </div>
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-text-primary">
                            Contraseña
                        </label>
                        <div class="mt-1">
                            <input id="password" name="password" type="password" autocomplete="current-password" required
                                   class="block w-full appearance-none rounded-md border border-accent-teal px-3 py-2 placeholder-text-secondary shadow-sm focus:border-amber-500 focus:outline-none focus:ring-amber-500 sm:text-sm bg-card-bg text-text-primary">
                        </div>
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <button type="submit"
                                class="group relative flex w-full justify-center rounded-md border border-transparent bg-amber-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2">
                            Iniciar sesión
                        </button>
                    </div>

                    @if(filament()->hasRegistration())
                        <div class="text-center">
                            <a href="{{ filament()->getRegistrationUrl() }}"
                               class="text-sm text-amber-600 hover:text-amber-500">
                                ¿No tienes cuenta? Regístrate
                            </a>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</x-filament-panels::page.simple>
