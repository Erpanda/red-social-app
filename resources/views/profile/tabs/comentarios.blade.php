<div class="flex flex-col gap-3">
    <div class="grid grid-cols-12 gap-3 items-start" style="height: 800px;">

        <div class="col-span-8 bg-gray-900 rounded-3xl overflow-y-auto scroll-custom h-full" id="feed-scroll">
            
            <div class="flex flex-col gap-4 p-2">
                @isset($comentarios)
                    @foreach ($comentarios as $comentario)
                        <div class="flex flex-col gap-3 w-full p-1 bg-gray-800/50 rounded-2xl hover:bg-gray-800 transition-all duration-200 border border-gray-700/50">
                                
                            <div class="flex gap-3 p-4 pb-2 opacity-75">
                                <div class="flex flex-col items-center gap-1">
                                    <div class="w-9 h-9 rounded-full bg-yellow-400 flex items-center justify-center text-gray-900 font-black text-sm shrink-0">
                                        {{ strtoupper(substr($comentario['post_user'], 0, 1)) }}
                                    </div>
                                    <div class="w-px flex-1 bg-gray-700 min-h-4"></div>
                                </div>
                                <div class="flex flex-col gap-1 w-full min-w-0">
                                    <div class="flex justify-between">
                                        <div class="flex items-center gap-2">
                                            <span class="text-white font-bold text-sm">{{ $comentario['post_user'] }}</span>
                                            <span class="text-gray-500 text-sm">{{ '@' . $comentario['post_user'] }}</span>
                                            <span class="text-gray-400 text-xs">·</span>
                                            <span class="text-gray-500 text-xs">{{ $comentario['post_tiempo'] }}</span>
                                        </div>
                                        <button class="text-gray-400 hover:text-white transition-colors duration-150">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                <circle cx="5" cy="12" r="2"/>
                                                <circle cx="12" cy="12" r="2"/>
                                                <circle cx="19" cy="12" r="2"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <p class="text-gray-300 text-sm leading-relaxed">{{ $comentario['post_user'] }}</p>
                                    <div class="flex gap-5 mt-2 pt-2 border-t border-gray-700/50">
                                        <button class="text-gray-500 hover:text-yellow-400 text-xs flex items-center gap-1.5 transition-colors duration-150">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                            </svg>
                                            <span>{{ $comentario['like_post'] }}</span>
                                        </button>
                                        <button class="text-gray-500 hover:text-yellow-400 text-xs flex items-center gap-1.5 transition-colors duration-150">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                            </svg>
                                            <span>{{ $comentario['nro_comentarios_post'] }}</span>
                                        </button>
                                        <button class="text-gray-500 hover:text-yellow-400 text-xs flex items-center gap-1.5 transition-colors duration-150 ml-auto">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="flex gap-3 p-4 pt-0">
                                <div class="w-9 h-9 rounded-full bg-yellow-400 flex items-center justify-center text-gray-900 font-black text-sm shrink-0">
                                    {{ strtoupper(substr( Auth::user()->fullname, 0, 1)) }}
                                </div>
                                <div class="flex flex-col gap-1 w-full min-w-0">
                                    <div class="flex justify-between">
                                        <div class="flex items-center gap-2">
                                            <span class="text-white font-bold text-sm">{{ $comentario['post_user'] }}</span>
                                            <span class="text-gray-500 text-sm">{{ '@' . $comentario['post_user'] }}</span>
                                            <span class="text-gray-400 text-xs">·</span>
                                            <span class="text-gray-500 text-xs">{{ $comentario['post_tiempo'] }}</span>
                                        </div>
                                        <button class="text-gray-400 hover:text-white transition-colors duration-150">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                <circle cx="5" cy="12" r="2"/>
                                                <circle cx="12" cy="12" r="2"/>
                                                <circle cx="19" cy="12" r="2"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <p class="text-gray-300 text-sm leading-relaxed">{{ $comentario['mi_comentario'] }}</p>
                                    <div class="flex gap-5 mt-2 pt-2 border-t border-gray-700/50">
                                        <button class="text-gray-500 hover:text-yellow-400 text-xs flex items-center gap-1.5 transition-colors duration-150">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                            </svg>
                                            <span>{{ $comentario['like_mi_comentario'] }}</span>
                                        </button>
                                        <button class="text-gray-500 hover:text-yellow-400 text-xs flex items-center gap-1.5 transition-colors duration-150">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                            </svg>
                                            <span>{{ $comentario['nro_coment_mi_comentario'] }}</span>
                                        </button>
                                        <button class="text-gray-500 hover:text-yellow-400 text-xs flex items-center gap-1.5 transition-colors duration-150 ml-auto">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                @else
                    <div class="flex flex-col items-center justify-center py-16 gap-3">
                        <svg class="w-12 h-12 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                        </svg>
                        <p class="text-gray-400 text-sm font-semibold">Sin comentarios</p>
                        <p class="text-gray-500 text-xs">Cuando comentes algún post, aparecerá aquí.</p>
                    </div>
                @endisset
            </div>

        </div>
        
        <div class="col-span-4 bg-gray-900 rounded-3xl p-5 flex flex-col gap-4 h-full">

            <h2 class="text-white font-bold text-xl">Actividad</h2>

            <div class="border-t border-gray-700"></div>

            {{-- Stat cards --}}
            <div class="grid grid-cols-2 gap-3">
                <div class="bg-gray-800 rounded-2xl p-4 flex flex-col gap-1">
                    <span class="text-yellow-400 font-black text-2xl">48</span>
                    <span class="text-gray-500 text-xs">Comentarios totales</span>
                </div>
                <div class="bg-gray-800 rounded-2xl p-4 flex flex-col gap-1">
                    <span class="text-yellow-400 font-black text-2xl">12</span>
                    <span class="text-gray-500 text-xs">Este mes</span>
                </div>
                <div class="bg-gray-800 rounded-2xl p-4 flex flex-col gap-1">
                    <span class="text-yellow-400 font-black text-2xl">5</span>
                    <span class="text-gray-500 text-xs">Esta semana</span>
                </div>
                <div class="bg-gray-800 rounded-2xl p-4 flex flex-col gap-1">
                    <span class="text-yellow-400 font-black text-2xl">3</span>
                    <span class="text-gray-500 text-xs">Hoy</span>
                </div>
            </div>

            <div class="border-t border-gray-700"></div>

            <h3 class="text-white font-bold text-sm">Temas frecuentes</h3>

            <div class="flex flex-wrap gap-2">
                @foreach ([
                    ['tema' => 'Tecnología', 'count' => 18],
                    ['tema' => 'Laravel',    'count' => 12],
                    ['tema' => 'Diseño',     'count' => 9],
                    ['tema' => 'Música',     'count' => 6],
                    ['tema' => 'Lima',       'count' => 3],
                ] as $tema)
                    <span class="bg-gray-800 text-gray-300 text-xs px-3 py-1.5 rounded-full flex items-center gap-1.5">
                        {{ $tema['tema'] }}
                        <span class="text-yellow-400 font-bold">{{ $tema['count'] }}</span>
                    </span>
                @endforeach
            </div>

        </div>
    
    </div>

</div>