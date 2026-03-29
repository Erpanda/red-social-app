<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 grid gap-6 py-8 items-start">

        <main class="overflow-hidden">
            <div class="flex flex-col gap-3">
                <div class="grid grid-cols-12 gap-3">
                    <div class="col-span-8 relative bg-gray-900 rounded-3xl">
                        @include('components.modals.photo')

                        <div class="w-full h-40 overflow-hidden rounded-t-3xl">
                            <img src="{{ $user->portada_photo ? $user->portada_photo : asset('img/portada.jpg') }}" alt="Portada" class="w-full h-full object-cover">
                            
                            @if($esMiPerfil)
                                <button onclick="abrirModal('Photo', 'portada')" class="absolute right-8 top-[7rem] text-white text-sm font-semibold px-4 py-2 rounded-full border border-gray-500 hover:bg-gray-700 transition-colors duration-200 flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    Cambiar portada
                                </button>
                            @endif
                            
                        </div>
                        <div class="flex px-4 -mt-10 mb-3">
                            <div class="relative group cursor-pointer w-52 h-52 shrink-0">
                                <img src="{{ $user->avatar ? $user->avatar : asset('img/perfil.jpg') }}" alt="Perfil"
                                    class="w-52 h-52 rounded-full border-8 border-gray-900 object-cover">

                                @if($esMiPerfil)
                                    <div class="absolute inset-0 rounded-full border-8 border-gray-900 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-200 flex items-end justify-center pb-5">
                                        <button onclick="abrirModal('Photo', 'perfil')" class="text-white text-xs font-semibold px-3 py-1.5 rounded-full border border-gray-400 hover:bg-gray-700 transition-colors duration-200 flex items-center gap-1.5">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            Cambiar
                                        </button>
                                    </div>
                                @endif
                            </div>

                            <div class="px-4 pt-16 flex justify-between items-start w-full">
                                <div>
                                    <h2 class="text-white font-bold text-3xl">{{ $user->fullname }}</h2>
                                    <p class="text-gray-500">{{ '@' . $user->username }}</p>

                                    <div class="flex items-center gap-1 mt-2 text-gray-500 text-sm">
                                        <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <span>Se unió en {{ $user->created_at->translatedFormat('F \d\e Y') }}</span>
                                    </div>

                                    <div class="flex gap-4 mt-2 text-sm">
                                        <p class="text-gray-400">
                                            <span class="text-white font-bold">{{ $user->seguidos_count ?? 0 }}</span> Siguiendo
                                        </p>
                                        <p class="text-gray-400">
                                            <span class="text-white font-bold">{{ $user->seguidores_count ?? 0 }}</span> Seguidores
                                        </p>
                                    </div>
                                </div>

                                @if($esMiPerfil)
                                    <a href="{{ route('profile.edit') }}"
                                        class="text-white text-sm font-semibold px-4 py-2 rounded-full border border-gray-500 hover:bg-gray-700 transition-colors duration-200 flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                        Editar perfil
                                    </a>
                                @else
                                    <button class="text-white text-sm font-semibold px-4 py-2 rounded-full border border-gray-500 hover:bg-gray-700 transition-colors duration-200 flex items-center gap-2"
                                    >Seguir</button>
                                @endif
                            </div>
                        </div>
                    </div>
                
                    <div class="col-span-4 flex flex-col gap-4 bg-gray-900 rounded-3xl text-white p-5">
                        <h2 class="text-white font-bold text-xl mx-3">A quién seguir</h2>

                        <div class="border-t border-gray-700"></div>

                        <div class="flex flex-col gap-1">
                            @foreach ([
                                ['nombre' => 'María López',  'username' => 'marialopez',  'seguidores' => 342],
                                ['nombre' => 'Carlos Dev',   'username' => 'carlosdev',   'seguidores' => 218],
                                ['nombre' => 'Lucía Ríos',   'username' => 'luciaarios',  'seguidores' => 190],
                            ] as $sugerido)
                                <div class="flex items-center gap-3 px-2 py-2.5 rounded-xl hover:bg-gray-800 transition-all duration-200">
                                    <div class="w-10 h-10 rounded-full bg-yellow-400 flex items-center justify-center text-gray-900 font-black text-sm shrink-0">
                                        {{ strtoupper(substr($sugerido['nombre'], 0, 1)) }}
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-white text-sm font-bold leading-tight truncate">{{ $sugerido['nombre'] }}</p>
                                        <p class="text-gray-500 text-xs truncate">{{ '@' . $sugerido['username'] }}</p>
                                    </div>
                                    <button class="shrink-0 font-bold bg-yellow-400 text-gray-900 text-xs px-4 py-1.5 rounded-full hover:bg-yellow-300 transition-colors duration-150">
                                        Seguir
                                    </button>
                                </div>
                            @endforeach
                        </div>

                        <div class="border-t border-gray-700"></div>

                        <a href="#"
                            class="text-yellow-400 text-sm mx-3 font-semibold hover:text-yellow-300 transition-colors duration-150">
                            Mostrar más
                        </a>
                    </div>
                </div>

                <div class="flex flex-col gap-3 bg-gray-900 rounded-3xl shadow-lg p-3">
                    <div class="items-center hidden space-x-1 sm:flex justify-center gap-2">

                        <button data-tab="posts"
                            class="tab-btn font-semibold py-2.5 px-12 rounded-lg transition-all duration-200 hover:bg-gray-800 border-b-2 border-yellow-400 text-yellow-400 rounded-b-none"
                            title="Feed">
                            Posts
                        </button>
                        <button data-tab="comentarios"
                            class="tab-btn font-semibold py-2.5 px-12 rounded-lg transition-all duration-200 hover:bg-gray-800 text-gray-400 hover:text-yellow-400' }}"
                            title="Explorador">
                            Comentarios
                        </button>
                        <button data-tab="destacado"
                            class="tab-btn font-semibold py-2.5 px-12 rounded-lg transition-all duration-200 hover:bg-gray-800 text-gray-400 hover:text-yellow-400' }}"
                            title="Categorías">
                            Destacado
                        </button>
                        <button data-tab="multimedia"
                            class="tab-btn font-semibold py-2.5 px-12 rounded-lg transition-all duration-200 hover:bg-gray-800 text-gray-400 hover:text-yellow-400' }}"
                            title="Notificaciones">
                            Multimedia
                        </button>

                        @if($esMiPerfil)
                            <button data-tab="megusta"
                                class="tab-btn font-semibold py-2.5 px-12 rounded-lg transition-all duration-200 hover:bg-gray-800 text-gray-400 hover:text-yellow-400' }}"
                                title="Notificaciones">
                                Me gusta
                            </button>
                            <button data-tab="guardado"
                                class="tab-btn font-semibold py-2.5 px-12 rounded-lg transition-all duration-200 hover:bg-gray-800 text-gray-400 hover:text-yellow-400' }}"
                                title="Notificaciones">
                                Guardado
                            </button>
                        @endif
                    </div>

                    <div class="border-t border-gray-700"></div>

                    <div id="tab-content" data-user-id="{{ $user->id }}">
                    </div>
                </div>

            </div>
        </main>

    </div>

    @include('components.modals.post')

    <script>

        document.addEventListener('DOMContentLoaded', () => {

            // Por defecto
            recargarTab('posts');

            // Al cambiar
            document.querySelectorAll('.tab-btn')?.forEach(btn => {
                btn.addEventListener('click', () => {
                    document.querySelectorAll('.tab-btn').forEach(b => {
                        b.classList.remove('border-b-2', 'border-yellow-400', 'text-yellow-400', 'rounded-b-none');
                        b.classList.add('text-gray-400');
                    });

                    btn.classList.add('border-b-2', 'border-yellow-400', 'text-yellow-400', 'rounded-b-none');
                    btn.classList.remove('text-gray-400');

                    recargarTab(btn.dataset.tab);
                });
            });

        });

    </script>
</x-app-layout>