<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Aplicaremos una animacion de cambio de datos por cada uno de ellos ._. -->
    <div class="relative w-[800px] h-[600px] overflow-hidden grid grid-cols-2 rounded-3xl container" id="container">
        <div class="absolute inset-0 w-1/2 h-full bg-gray-800 text-white flex flex-col justify-center px-10 transition-all duration-700 {{ $tipo === 'login' ? 'z-20' : 'z-10'}}" 
                id="signIn-container" style="transform: translateX({{ $tipo === 'login' ? '0' : '100%' }})">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <h2 class="font-bold text-4xl text-center mb-10">Iniciar Sesión</h2>
                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" style="color: white;"/>
                    <x-text-input id="email" class="block mt-1 w-full text-gray-900" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" style="color: white;"/>

                    <x-text-input id="password" class="block mt-1 w-full text-gray-900"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-700 accent-black shadow-sm focus:ring-gray-800"
                            name="remember">
                        <span class="ms-2 text-sm text-gray-100">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-100 hover:text-yellow-300 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <div class="flex justify-center mt-4">
                    <x-primary-button
                        id="btn-login"
                        class="bg-yellow-500 hover:bg-yellow-400 active:bg-yellow-500
                            text-gray-900 font-semibold
                            px-6 py-2.5 rounded-xl
                            shadow-md hover:shadow-lg
                            transition-all duration-200 ease-out
                            focus:outline-none focus:ring-2 focus:ring-yellow-300 focus:ring-offset-2 focus:ring-offset-gray-900">
                        
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>

            </form>
        </div>

        <div class="absolute inset-0 w-1/2 h-full bg-gray-800 text-white flex flex-col justify-center px-10 transition-all duration-700 {{ $tipo === 'register' ? 'z-20' : 'z-10'}}" 
                id="signUp-container" style="transform: translateX({{ $tipo === 'register' ? '100%' : '0' }})">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h2 class="font-bold text-3xl text-center mb-10">Registrate</h2>

                <!-- Fullname -->
                <div>
                    <x-input-label for="fullname" :value="__('Fullname')" style="color: white;"/>
                    <x-text-input id="fullname" class="block mt-1 w-full text-gray-900" type="text" name="fullname" :value="old('fullname')" required autofocus autocomplete="fullname" />
                    <x-input-error :messages="$errors->get('fullname')" class="mt-2" />
                </div>

                <!-- Username -->
                <div class="mt-4">
                    <x-input-label for="Username" :value="__('Username')" style="color: white;"/>
                    <x-text-input id="username" class="block mt-1 w-full text-gray-900" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('username')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" style="color: white;"/>
                    <x-text-input id="email" class="block mt-1 w-full text-gray-900" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" style="color: white;"/>

                    <x-text-input id="password" class="block mt-1 w-full text-gray-900"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" style="color: white;"/>

                    <x-text-input id="password_confirmation" class="block mt-1 w-full text-gray-900"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center mt-6 justify-center">
                    <x-primary-button id="btn-register"
                        class="bg-yellow-500 hover:bg-yellow-400 active:bg-yellow-500
                            text-gray-900 font-semibold
                            px-6 py-2.5 rounded-xl
                            shadow-md hover:shadow-lg
                            transition-all duration-200 ease-out
                            focus:outline-none focus:ring-2 focus:ring-yellow-300 focus:ring-offset-2 focus:ring-offset-gray-900">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>

        <div class="absolute top-0 {{ $tipo === 'login' ? 'left-1/2' : 'left-0' }} w-1/2 h-full z-50 overflow-hidden transition-all duration-700 bg-gradient-to-br from-yellow-400 to-amber-500" id='overlay'>

            <div class="flex w-[200%] h-full transition-all duration-700" id="overlay-slider" style="transform: translateX({{ $tipo === 'login' ? '0' : '-50%' }});">
                <div id="panel-right" class="w-1/2 h-full flex flex-col items-center justify-center px-10 text-center">
                    <h1 class="text-5xl font-bold text-gray-800 tracking-tight mb-3 drop-shadow-sm">
                        Hola, amigo
                    </h1>
                    <p class="text-base font-semibold text-yellow-900/70 leading-relaxed mb-8 max-w-xs">
                        Ingresa tus datos personales y comienza tu aventura con nosotros.
                    </p>
                    <button id="signUp" class="px-8 py-2.5 rounded-full text-white text-sm font-semibold bg-gray-800 tracking-wide uppercase hover:bg-white hover:text-gray-800 transition-all duration-300 cursor-pointer">
                        Registrarse
                    </button>
                </div>

                <div id="panel-left" class="w-1/2 h-full flex flex-col items-center justify-center px-10 text-center">
                    <h1 class="text-5xl font-bold text-gray-800 tracking-tight mb-3 drop-shadow-sm">
                        Bienvenido de vuelta
                    </h1>
                    <p class="text-base font-semibold text-yellow-900/70 leading-relaxed mb-8 max-w-xs">
                        Para seguir conectado, inicia sesión con tus datos personales.
                    </p>
                    <button id="signIn" class="px-8 py-2.5 rounded-full text-white text-sm font-semibold bg-gray-800 tracking-wide uppercase hover:bg-white hover:text-gray-800 transition-all duration-300 cursor-pointer">
                        Iniciar sesión
                    </button>
                </div>
            </div>

        </div>

    </div>

</x-guest-layout>
