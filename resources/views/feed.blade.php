<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 grid grid-cols-12 gap-6 py-8 items-start">

        <aside class="col-span-3 lg:block sticky top-28">
            <div class="flex flex-col gap-1 bg-gray-900 rounded-2xl shadow-xl shadow-black/30 p-4 h-[50rem] max-h-[50rem] justify-between">

                <div>
                    <a href="{{ route('profile.show', Auth::user()) }}"
                        class="flex items-center gap-3 px-3 py-3 rounded-xl hover:bg-gray-700 transition-all duration-200 group mb-2">
                        <div class="w-12 h-12 rounded-full overflow-hidden flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform duration-200">
                            <img src="{{ Auth::user()->avatar ? Auth::user()->avatar : asset('img/perfil.jpg') }}" alt="Avatar" class="w-full h-full object-cover">
                        </div>

                        <div>
                            <p class="text-white font-bold text-sm">{{ Auth::user()->fullname }}</p>
                            <p class="text-gray-500 text-xs">{{ '@' . Auth::user()->username }}</p>
                        </div>
                    </a>

                    <div class="border-t border-gray-700 mb-2"></div>

                    <a href="{{ route('feed') }}"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all duration-200
                        {{ request()->routeIs('feed') ? 'bg-yellow-400/10 text-yellow-400' : 'text-gray-400 hover:bg-gray-700 hover:text-white' }}">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <span class="text-sm font-semibold">Feed</span>
                    </a>

                    <a href="#"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-400 hover:bg-gray-700 hover:text-white transition-all duration-200">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 00-5.356-3.765M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a4 4 0 015.356-3.765M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="text-sm font-semibold">Seguidores</span>
                    </a>

                    <a href="#"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-400 hover:bg-gray-700 hover:text-white transition-all duration-200">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                        <span class="text-sm font-semibold">Seguir personas</span>
                    </a>

                    <a href="{{ route('notificaciones.index') }}"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all duration-200
                        {{ request()->routeIs('notificaciones.index') ? 'bg-yellow-400/10 text-yellow-400' : 'text-gray-400 hover:bg-gray-700 hover:text-white' }}">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        <span class="text-sm font-semibold">Notificaciones</span>
                    </a>

                    <a href="#"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-400 hover:bg-gray-700 hover:text-white transition-all duration-200">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                        </svg>
                        <span class="text-sm font-semibold">Guardados</span>
                    </a>

                    <a href="#"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-400 hover:bg-gray-700 hover:text-white transition-all duration-200">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        <span class="text-sm font-semibold">Explorar</span>
                    </a>

                    <a href="#"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-400 hover:bg-gray-700 hover:text-white transition-all duration-200">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="text-sm font-semibold">Grupos</span>
                    </a>

                    <a href="#"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-400 hover:bg-gray-700 hover:text-white transition-all duration-200">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                        <span class="text-sm font-semibold">Mensajes</span>
                    </a>

                    <div class="border-t border-gray-700 my-2"></div>

                </div>

                <div>
                    <button type="button" onclick="abrirModal('Post')" class="w-full mt-2 bg-yellow-400 text-gray-900 font-black text-sm px-4 py-2.5 rounded-xl hover:bg-yellow-300 transition-colors duration-150">
                        Postear
                    </button>

                    <div class="border-t border-gray-700 mt-3 pt-3 flex flex-col gap-1">
                        <a href="{{ route('profile.edit') }}"
                            class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-400 hover:bg-gray-700 hover:text-white transition-all duration-200">
                            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="text-sm font-semibold">Configuración</span>
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-red-400 hover:bg-red-400/10 transition-all duration-200">
                                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                <span class="text-sm font-semibold">Cerrar sesión</span>
                            </a>
                        </form>
                    </div>
                </div>

            </div>
        </aside>

        <main class="col-span-6 col-start-4 overflow-hidden">
            <div class="flex flex-col gap-3">
                <div class="flex gap-3">
                    <div class="flex gap-3 w-full bg-gray-900 rounded-xl shadow-lg p-4">
                        <a href="{{ route('profile.show', Auth::user()) }}" class="w-10 h-10 rounded-full overflow-hidden shrink-0 group-hover:scale-110 transition-transform">
                            <img src="{{ Auth::user()->avatar ? Auth::user()->avatar : asset('img/perfil.jpg') }}" alt="Avatar" class="w-full h-full object-cover">
                        </a>

                        <button type="button"
                                onclick="abrirModal('Post')"
                                class="flex-1 flex items-center bg-gray-800 text-gray-400 rounded-xl px-4 py-2 text-sm hover:bg-gray-700 transition-colors duration-150 focus:outline-none">
                            <span id="textSpanPost" data-placeholder="¿Qué estás pensando, {{ explode(' ', Auth::user()->fullname)[0] }}?"  class="flex-1 text-left">
                                ¿Qué estás pensando, {{ explode(' ', Auth::user()->fullname)[0] }}?
                            </span>
                        </button>

                        <div class="flex items-center gap-4 text-gray-400">

                            <button type="button" 
                                    onclick="abrirSelectorMedia('multimedia')"
                                    class="hover:text-yellow-400 transition-colors duration-150 focus:outline-none"
                                    title="Añadir foto">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </button>

                            <button type="button" 
                                    onclick="abrirSelectorMedia('gif')" 
                                    class="hover:text-yellow-400 transition-colors duration-150 focus:outline-none"
                                    title="Añadir GIF">
                                <span class="w-4 h-4 flex items-center justify-center border-2 border-current rounded text-[0.5rem] font-black tracking-wider">
                                    G
                                </span>
                            </button>

                            <button type="button" 
                                    onclick="abrirSelectorMedia('file')"
                                    class="hover:text-yellow-400 transition-colors duration-150 focus:outline-none"
                                    title="Adjuntar archivo">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 3v4a1 1 0 001 1h4" /> <!-- hoja con clip -->
                                </svg>
                            </button>

                            <button type="button" 
                                    onclick="abrirSelectorUbicacion()" 
                                    class="hover:text-yellow-400 transition-colors duration-150 focus:outline-none"
                                    title="Añadir ubicación">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </button>

                        </div>

                    </div>
                </div>

                <div class="flex flex-col gap-3">
                    @foreach ([
                        ['user' => 'Frank', 'contenido' => 'Hoy me levanté temprano y la verdad que valió la pena. Lima en las mañanas tiene algo diferente.', 'tiempo' => '2m'],
                        ['user' => 'María', 'contenido' => 'Acabo de terminar mi primer proyecto en Laravel y me siento bien orgullosa. El camino fue largo pero llegué.', 'tiempo' => '15m'],
                        ['user' => 'Carlos', 'contenido' => 'El café de hoy estaba horrible. Hay días así nomás.', 'tiempo' => '32m'],
                        ['user' => 'Lucía', 'contenido' => 'Recordatorio de que no tienes que tenerlo todo resuelto para empezar. Solo empieza.', 'tiempo' => '1h'],
                        ['user' => 'Diego', 'contenido' => 'Tres horas debuggeando para darme cuenta que era un punto y coma. La vida del dev.', 'tiempo' => '2h'],
                        ['user' => 'Valeria', 'contenido' => 'Fui al parque hoy y me di cuenta que hace meses no salía sin el celular. Raro pero bonito.', 'tiempo' => '3h'],
                        ['user' => 'Andrés', 'contenido' => 'Tailwind CSS me cambió la vida. No hay vuelta atrás.', 'tiempo' => '4h'],
                        ['user' => 'Sofía', 'contenido' => 'No sé quién necesita escuchar esto pero está bien no saber qué hacer con tu vida a los 20.', 'tiempo' => '5h'],
                        ['user' => 'Rodrigo', 'contenido' => 'Primera vez cocinando ceviche solo. Quedó decente. Lima en la sangre.', 'tiempo' => '7h'],
                        ['user' => 'Camila', 'contenido' => 'Hay una diferencia enorme entre estar ocupado y ser productivo. Tardé años en entenderlo.', 'tiempo' => '9h'],
                    ] as $post)
                        <div class="flex gap-3 w-full bg-gray-900 rounded-xl shadow-lg p-4">
                            <div class="w-9 h-9 rounded-full bg-yellow-400 flex items-center justify-center text-gray-900 font-black text-sm shrink-0">
                                {{ strtoupper(substr($post['user'], 0, 1)) }}
                            </div>
                            <div class="flex flex-col gap-1 w-full">
                                <div class="flex items-center gap-2">
                                    <span class="text-white font-bold text-sm">{{ $post['user'] }}</span>
                                    <span class="text-gray-500 text-xs">· {{ $post['tiempo'] }}</span>
                                </div>
                                <p class="text-gray-300 text-sm leading-relaxed">{{ $post['contenido'] }}</p>
                                <div class="flex gap-4 mt-2">
                                    <button class="text-gray-500 hover:text-yellow-400 text-xs flex items-center gap-1 transition-colors duration-150">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                        </svg>
                                        <span>12</span>
                                    </button>
                                    <button class="text-gray-500 hover:text-yellow-400 text-xs flex items-center gap-1 transition-colors duration-150">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                        </svg>
                                        <span>3</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </main>

        <aside class="col-span-3 lg:block sticky top-28">
            <div class="flex flex-col gap-3 bg-gray-900 rounded-2xl shadow-xl shadow-black/30 p-4">

                <form action="{{ route('posts.index') }}" method="GET" class="flex items-center gap-3 w-full bg-gray-800 text-white rounded-xl px-4 py-2 border border-transparent focus-within:border-yellow-400 transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <input type="text" name="q"
                        class="flex-1 px-0 py-1 text-sm bg-transparent placeholder-gray-400 outline-none border-none focus:ring-0"
                        placeholder="Buscar">
                </form>

                <div class="border-t border-gray-700"></div>

                <div class="flex flex-col gap-2">
                    <h2 class="text-white text-base font-black px-1">Tendencias</h2>
                    @foreach ([
                        ['tag' => 'Laravel',    'posts' => 24],
                        ['tag' => 'Lima',       'posts' => 18],
                        ['tag' => 'Desarrollo', 'posts' => 15],
                        ['tag' => 'Vida real',  'posts' => 12],
                        ['tag' => 'Tailwind',   'posts' => 9],
                    ] as $tendencia)
                        <a href="#"
                            class="flex justify-between items-center px-3 py-2 rounded-xl hover:bg-gray-800 transition-all duration-200 group">
                            <div>
                                <p class="text-white text-sm font-bold group-hover:text-yellow-400 transition-colors">#{{ $tendencia['tag'] }}</p>
                                <p class="text-gray-500 text-xs">{{ $tendencia['posts'] }} posts</p>
                            </div>
                            <svg class="w-4 h-4 text-gray-600 group-hover:text-yellow-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    @endforeach
                </div>

                <div class="border-t border-gray-700"></div>

                <div class="flex flex-col gap-2">
                    <h2 class="text-white text-base font-black px-1">A quién seguir</h2>
                    @foreach ([
                        ['nombre' => 'María López',  'username' => 'marialopez',  'seguidores' => 342],
                        ['nombre' => 'Carlos Dev',   'username' => 'carlosdev',   'seguidores' => 218],
                        ['nombre' => 'Lucía Ríos',   'username' => 'luciaarios',  'seguidores' => 190],
                    ] as $sugerido)
                        <div class="flex items-center justify-between px-2 py-2 rounded-xl hover:bg-gray-800 transition-all duration-200">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-full bg-yellow-400 flex items-center justify-center text-gray-900 font-black text-xs shrink-0">
                                    {{ strtoupper(substr($sugerido['nombre'], 0, 1)) }}
                                </div>
                                <div>
                                    <p class="text-white text-xs font-bold leading-tight">{{ $sugerido['nombre'] }}</p>
                                    <p class="text-gray-500 text-xs">{{ '@' . $sugerido['username'] }}</p>
                                </div>
                            </div>
                            <button class="text-xs font-black bg-yellow-400 text-gray-900 px-3 py-1 rounded-xl hover:bg-yellow-300 transition-colors duration-150">
                                Seguir
                            </button>
                        </div>
                    @endforeach
                </div>

                <div class="border-t border-gray-700"></div>

                <div class="flex flex-col gap-2">
                    <h2 class="text-white text-base font-black px-1">Categorías populares</h2>
                    <div class="flex flex-wrap gap-2 px-1">
                        @foreach (['Tecnología', 'Vida', 'Lima', 'Trabajo', 'Dev', 'Música', 'Comida', 'Viajes'] as $cat)
                            <a href="#"
                                class="text-xs font-semibold text-gray-400 bg-gray-800 px-3 py-1 rounded-full hover:bg-yellow-400 hover:text-gray-900 transition-all duration-200">
                                #{{ $cat }}
                            </a>
                        @endforeach
                    </div>
                </div>

            </div>
        </aside>

    </div>
    
    @include('components.modals.post')


</x-app-layout>