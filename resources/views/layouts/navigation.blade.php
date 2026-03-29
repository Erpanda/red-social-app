<nav x-data="{ open: false }" class="bg-gray-900 sticky top-0 z-30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">

            <div class="flex items-center">
                <a href="{{ route('feed') }}" class="text-yellow-400 font-black text-xl tracking-tight uppercase shrink-0">
                    Daily Drop
                </a>
            </div>

            <div class="items-center hidden space-x-1 sm:ms-10 sm:flex">

                <a href="{{ route('feed') }}"
                    class="py-2.5 px-12 rounded-lg transition-all duration-200 hover:bg-gray-800
                    {{ request()->routeIs('feed') ? 'border-b-2 border-yellow-400 text-yellow-400 rounded-b-none' : 'text-gray-400 hover:text-yellow-400' }}"
                    title="Feed">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                </a>
                <a href="{{ route('explore') }}"
                    class="py-2.5 px-12 rounded-lg transition-all duration-200 hover:bg-gray-800
                    {{ request()->routeIs('explore') ? 'border-b-2 border-yellow-400 text-yellow-400 rounded-b-none' : 'text-gray-400 hover:text-yellow-400' }}"
                    title="Explorador">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </a>
                <a href="#"
                    class="py-2.5 px-12 rounded-lg transition-all duration-200 hover:bg-gray-800
                    {{-- {{ request()->routeIs('grupos.index') ? 'border-b-2 border-yellow-400 text-yellow-400 rounded-b-none hover:bg-gray-800' : 'text-gray-400 hover:text-yellow-400 hover:bg-gray-800' }}"--}}
                    {{ request()->routeIs('notificaciones.index') ? 'border-b-2 border-yellow-400 text-yellow-400 rounded-b-none' : 'text-gray-400 hover:text-yellow-400' }}"
                    title="Grupos">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </a>

                <a href="{{ route('notificaciones.index') }}"
                    class="py-2.5 px-12 rounded-lg transition-all duration-200 hover:bg-gray-800
                    {{ request()->routeIs('notificaciones.index') ? 'border-b-2 border-yellow-400 text-yellow-400 rounded-b-none' : 'text-gray-400 hover:text-yellow-400' }}"
                    title="Notificaciones">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                </a>

            </div>

            <div class="hidden sm:flex sm:items-center">
                <x-dropdown align="right" width="56" contentClasses="py-1 bg-gray-900 border border-gray-700">
                    
                    <x-slot name="trigger">
                        <button class="flex items-center gap-2 px-3 py-1.5 rounded-lg border border-gray-700 hover:border-yellow-400/50 transition-all duration-200">
                            <div class="w-7 h-7 rounded-full overflow-hidden">
                                <img src="{{ Auth::user()->avatar ? Auth::user()->avatar : asset('img/perfil.jpg') }}" alt="Avatar" class="w-full h-full object-cover">
                            </div>
                            <span class="text-sm font-semibold text-gray-300">{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="flex items-center gap-3 px-4 py-3 border-b border-gray-700">
                            <div class="w-9 h-9 rounded-full overflow-hidden shrink-0">
                                <img src="{{ Auth::user()->avatar ? Auth::user()->avatar : asset('img/perfil.jpg') }}" alt="Avatar" class="w-full h-full object-cover">
                            </div>
                            <div class="overflow-hidden">
                                <div class="font-bold text-gray-200 text-sm truncate">{{ Auth::user()->fullname }}</div>
                                <div class="text-xs text-gray-400 truncate">{{ Auth::user()->email }}</div>
                            </div>
                        </div>

                        <a href="{{ route('profile.show', Auth::user()) }}"
                            class="flex items-center gap-3 px-4 py-2.5 text-sm font-semibold text-gray-200 hover:text-yellow-400 hover:bg-gray-800 transition-all duration-200">
                            <svg class="w-4 h-4 text-gray-400 group-hover:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Mi perfil
                        </a>

                        <a href="{{ route('profile.edit') }}"
                            class="flex items-center gap-3 px-4 py-2.5 text-sm font-semibold text-gray-200 hover:text-yellow-400 hover:bg-gray-800 transition-all duration-200">
                            <svg class="w-4 h-4 text-gray-400 group-hover:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Configuración
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                                class="flex items-center gap-3 px-4 py-2.5 text-sm font-semibold text-red-400 hover:bg-red-400/10 transition-all duration-200">
                                <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                Cerrar sesión
                            </a>
                        </form>
                    </x-slot>

                </x-dropdown>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-yellow-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <!-- Responsive -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-gray-900 border-t border-yellow-400/20">
        <div class="pt-2 pb-3 space-y-1 px-4">
            <a href="{{ route('feed') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-bold uppercase tracking-wide transition-all duration-200
                {{ request()->routeIs('feed') ? 'bg-yellow-400 text-gray-900' : 'text-gray-400 hover:bg-gray-800 hover:text-yellow-400' }}">
                Feed
            </a>
            <a href="{{ route('notificaciones.index') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-bold uppercase tracking-wide transition-all duration-200
                {{ request()->routeIs('notificaciones.index') ? 'bg-yellow-400 text-gray-900' : 'text-gray-400 hover:bg-gray-800 hover:text-yellow-400' }}">
                Notificaciones
            </a>
        </div>

        <div class="pt-4 pb-4 border-t border-yellow-400/20 px-4">
            <div class="flex items-center gap-3 px-4 py-3 bg-gradient-to-r from-gray-800 to-gray-900 rounded-xl mb-3 border border-gray-700">
                <div class="w-10 h-10 rounded-full bg-yellow-400 flex items-center justify-center text-gray-900 font-black text-base shrink-0">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div class="overflow-hidden">
                    <div class="font-bold text-white text-sm truncate">{{ Auth::user()->name }}</div>
                    <div class="text-xs text-yellow-400/70 truncate">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="space-y-1">
                <a href="{{ route('profile.show', Auth::user()) }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-bold uppercase tracking-wide text-gray-400 hover:bg-gray-800 hover:text-yellow-400 transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    Mi perfil
                </a>
                <a href="{{ route('profile.edit') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-bold uppercase tracking-wide text-gray-400 hover:bg-gray-800 hover:text-yellow-400 transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Configuración
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                        class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-bold uppercase tracking-wide text-red-400 hover:bg-red-400/10 transition-all duration-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Cerrar sesión
                    </a>
                </form>
            </div>
        </div>
    </div>
</nav>