<div class="flex flex-col gap-3">
    <!-- <div class="grid grid-cols-12 gap-3"> -->
    <div class="grid grid-cols-12 gap-3 items-start" style="height: 800px;">

        <!-- EL h-0 le dice a DOM que al altura inical es cero, pero que el minimo siempre sera el maixmo que alcance.
        de esa manera, cuando el col-4 crezca, el col-8 tome el valor de este al sea min-h-full, es decir, toma la
        altura maxima que peuda, osea, la del col-4 -->
        <!-- <div class="col-span-8 bg-gray-900 rounded-3xl overflow-y-auto scroll-custom h-0 min-h-full" id="feed-scroll"> -->
        <!-- <div class="col-span-8 bg-gray-900 rounded-3xl overflow-y-auto scroll-custom" style="height: 800px;" id="feed-scroll"> -->
        <div class="col-span-8 bg-gray-900 rounded-3xl overflow-y-auto scroll-custom h-full" id="feed-scroll">

            <div class="flex gap-3 w-full bg-gray-900 rounded-xl shadow-lg p-4">
                <a href="{{ route('profile.show', Auth::user()) }}">
                    <div class="w-10 h-10 rounded-full bg-yellow-400 flex items-center justify-center text-gray-900 font-black text-sm shrink-0 group-hover:scale-110 transition-transform duration-200">
                        {{ strtoupper(substr(Auth::user()->fullname, 0, 1)) }}
                    </div>
                </a>
                <form action="{{ route('posts.store') }}" method="POST" class="flex items-center gap-3 w-full">
                    @csrf

                    <input type="text" name="contenido"
                        class="flex-1 bg-gray-800 text-white rounded-xl px-4 py-2 text-sm focus:ring-0 placeholder-gray-100 outline-none hover:bg-gray-700"
                        placeholder="¿Qué estás pensando, {{ Auth::user()->fullname }}?">

                    <button type="button" class="text-gray-400 hover:text-white transition-colors duration-150">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </button>

                    <button type="submit" class="bg-yellow-400 text-gray-900 font-black text-sm px-4 py-2 rounded-xl hover:bg-gray-700 hover:text-white transition-colors duration-150">
                        Postear
                    </button>
                </form>
            </div>

            <div class="border-t mt-3 border-gray-700"></div>

            <div class="flex flex-col gap-4 p-4">
                @isset($posts)
                    @foreach ($posts as $post)
                        <div class="flex gap-3 w-full bg-gray-800/50 rounded-2xl p-4 hover:bg-gray-800 transition-all duration-200 border border-gray-700/50">
                            <div class="w-9 h-9 rounded-full bg-yellow-400 flex items-center justify-center text-gray-900 font-black text-sm shrink-0">
                                {{ strtoupper(substr($post['user'], 0, 1)) }}
                            </div>
                            <div class="flex flex-col gap-1 w-full min-w-0">
                                <div class="flex justify-between">
                                    <div class="flex items-center gap-2">
                                        <span class="text-white font-bold text-sm">{{ $post['user'] }}</span>
                                        <span class="text-gray-500 text-sm">{{ '@' . $post['user'] }}</span>
                                        <span class="text-gray-400 text-xs">·</span>
                                        <span class="text-gray-500 text-xs">{{ $post['tiempo'] }}</span>
                                    </div>
                                    <button class="text-gray-400 hover:text-white transition-colors duration-150">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <circle cx="5" cy="12" r="2"/>
                                            <circle cx="12" cy="12" r="2"/>
                                            <circle cx="19" cy="12" r="2"/>
                                        </svg>
                                    </button>
                                </div>
                                <p class="text-gray-300 text-sm leading-relaxed">{{ $post['contenido'] }}</p>
                                <div class="flex gap-5 mt-2 pt-2 border-t border-gray-700/50">
                                    <button class="text-gray-500 hover:text-yellow-400 text-xs flex items-center gap-1.5 transition-colors duration-150">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                        </svg>
                                        <span>12</span>
                                    </button>
                                    <button class="text-gray-500 hover:text-yellow-400 text-xs flex items-center gap-1.5 transition-colors duration-150">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                        </svg>
                                        <span>3</span>
                                    </button>
                                    <button class="text-gray-500 hover:text-yellow-400 text-xs flex items-center gap-1.5 transition-colors duration-150 ml-auto">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="flex flex-col items-center justify-center py-16 gap-3">
                        <svg class="w-12 h-12 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                        </svg>
                        <p class="text-gray-400 text-sm font-semibold">Aún no hay posts</p>
                        <p class="text-gray-500 text-xs">Cuando publiques algo, aparecerá aquí.</p>
                    </div>
                @endisset
            </div>

        </div>
        
        <!-- <div class="col-span-4 bg-gray-900 rounded-3xl p-5 flex flex-col gap-4"> -->
        <!-- <div class="col-span-4 bg-gray-900 rounded-3xl p-5 flex flex-col gap-4 overflow-y-auto scroll-custom" style="height: 800px;"> -->
        <div class="col-span-4 bg-gray-900 rounded-3xl p-5 flex flex-col gap-4 h-full">
            
            <h2 class="text-white font-bold text-xl">Sobre mí</h2>

            @if(Auth::user()->bio)
                <p class="text-gray-400 text-sm leading-relaxed">{{ Auth::user()->bio }}</p>
            @else
                <p class="text-gray-400 text-sm leading-relaxed">
                    Desarrollador apasionado por el código y el café. Lima, Perú. 
                    Entre bugs y algoritmos, construyo experiencias que conectan tecnología con personas.
                </p>
            @endif

            <div class="border-t border-gray-700"></div>

            <a href="{{ route('profile.edit') }}"
                class="text-white text-sm font-semibold px-4 py-2 rounded-full border border-gray-500 hover:bg-gray-700 transition-colors duration-200 flex items-center justify-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                </svg>
                Editar perfil
            </a>

            <div class="border-t border-gray-700"></div>

            <div class="flex justify-between items-center">
                <h2 class="text-white font-bold text-xl">Seguidores</h2>
                <span class="text-gray-500 text-xs">{{ Auth::user()->seguidores_count ?? 0 }} en total</span>
            </div>

            @isset($seguidores)
                <div class="grid grid-cols-3 gap-3">

                    @foreach ($seguidores as $seguidor)
                        <div class="flex flex-col items-center gap-2 bg-gray-800 rounded-xl p-3 hover:bg-gray-700 transition-all duration-200 cursor-pointer">
                            <div class="w-full aspect-square rounded-xl bg-yellow-400 flex items-center justify-center text-gray-900 font-black text-2xl">
                                {{ strtoupper(substr($seguidor['nombre'], 0, 1)) }}
                            </div>
                            <div class="w-full text-center">
                                <p class="text-white text-xs font-bold leading-tight truncate">{{ $seguidor['nombre'] }}</p>
                                <p class="text-gray-500 text-xs truncate">{{ '@' . $seguidor['username'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="flex flex-col items-center justify-center py-2 gap-3">
                    <svg class="w-12 h-12 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                    </svg>
                    <p class="text-gray-400 text-sm font-semibold">Aún no tienes seguidores</p>
                    <p class="text-gray-500 text-xs">Cuando alguien te siga, aparecerá aquí.</p>
                </div>
            @endisset

            <a href="#"
                class="text-center text-sm font-semibold text-yellow-400 hover:text-yellow-300 transition-colors duration-150">
                Ver todos los seguidores
            </a>

        </div>
    
    </div>

</div>