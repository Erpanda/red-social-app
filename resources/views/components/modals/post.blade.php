<div id="modalPost"
    class="hidden fixed inset-0 z-50 flex items-center justify-center"
    style="background: rgba(0,0,0,0.65);"
    onclick="if(event.target===this) cerrarModal('Post')">

    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" id="formPost"
        class="w-full max-w-md bg-gray-900 rounded-2xl shadow-2xl border border-gray-700/50 transform transition-all duration-300 flex flex-col max-h-[90vh]">
        @csrf 

        <div class="relative px-5 py-4 border-b border-gray-700 shrink-0">
            <h2 class="text-xl font-bold text-white text-center">Crear publicación</h2>
            <button type="button" onclick="cerrarModal('Post')" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-white transition-colors">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <div class="p-5 space-y-5 overflow-y-auto flex-1 scroll-custom-post">
            <!-- Usuario y privacidad -->
            <div class="flex items-start gap-3">
                <div class="w-11 h-11 rounded-full bg-gray-700 overflow-hidden shrink-0">
                    <img src="{{ Auth::user()->avatar }}" alt="Avatar de Frank" class="w-full h-full object-cover">
                </div>
                <div class="flex justify-between w-full">
                    <div>
                        <p class="text-white font-bold">{{ Auth::user()->fullname }}</p>
                        <p class="text-gray-500 text-xs">{{ '@' . Auth::user()->username }}</p>
                    </div>
                    <select 
                        name="tipo_privacidad" 
                        id="tipo_privacidad"
                        class="bg-gray-800 text-white border border-gray-700 rounded-xl focus:outline-none focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500 appearance-none cursor-pointer"
                        >
                        <option value="publico">Público</option>
                        <option value="seguidores">Seguidores</option>
                        <option value="solo_yo">Solo yo</option>
                    </select>
                </div>
            </div>

            <div id="contentDataPost"
                class="grid gap-3 w-full max-h-[30rem] overflow-y-auto scroll-custom-post bg-gray-800/70 text-white placeholder-gray-500 border border-gray-700 rounded-xl px-3 pt-2 pb-3">

                <!--field-sizing: content => El tamaño lo define su contenido -->
                <!-- style="field-sizing: content;" -->
                <input type="hidden" id="hiddenContenido" name="contenido" class="hidden m-0 p-0">
                <div id="textContentPost"
                    contenteditable="true"
                    class="w-full min-h-12 overflow-hidden resize-none bg-transparent border-none outline-none focus:outline-none focus:ring-0 focus:border-none block"
                    rows="1" data-fillerd="true"
                ></div>

            </div>
            
            <div class="flex items-center text-gray-400">
                <div class="flex gap-4">

                    <button type="button" 
                            onclick="abrirSelectorMedia('multimedia')"
                            class="hover:text-yellow-400 transition-colors duration-150 focus:outline-none"
                            title="Añadir foto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </button>
                    <button type="button" 
                            onclick="abrirSelectorMedia('gif')" 
                            class="hover:text-yellow-400 transition-colors duration-150 focus:outline-none"
                            title="Añadir GIF">
                        <span class="w-6 h-6 flex items-center justify-center border-2 border-current rounded text-[0.5rem] font-black tracking-wider">
                            GIF
                        </span>
                    </button>
                    <button type="button" 
                            onclick="abrirSelectorMedia('file')"
                            class="hover:text-yellow-400 transition-colors duration-150 focus:outline-none"
                            title="Adjuntar archivo">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 3v4a1 1 0 001 1h4" /> <!-- hoja con clip -->
                        </svg>
                    </button>
                    <button type="button" 
                            onclick="abrirSelectorMedia('test')" 
                            class="hover:text-yellow-400 transition-colors duration-150 focus:outline-none"
                            title="Crear encuesta">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 20h16" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 16v-6" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 16v-10" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 16v-4" />
                        </svg>
                    </button>
                    <button type="button" 
                            onclick="abrirSelectorMedia('emoji')" 
                            class="hover:text-yellow-400 transition-colors duration-150 focus:outline-none"
                            title="Añadir emoji">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                    <button type="button" 
                            onclick="abrirSelectorMedia('address')" 
                            class="hover:text-yellow-400 transition-colors duration-150 focus:outline-none"
                            title="Añadir ubicación">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </button>

                </div>
            </div>
        </div>

        <div class="px-5 py-4 border-t border-gray-700 bg-gray-800/30 shrink-0">
            <button type="submit" id="btnSubmitAccion" data-type="post" class="flex items-center justify-center gap-2 w-full py-3.5 text-lg font-semibold rounded-xl transition-all">
                @include('components.spinner')
                <span class="btn-text">Publicar</span>
            </button>
        </div>
    </form>
</div>