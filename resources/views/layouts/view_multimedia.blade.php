<div id="viewMultimedia" class="hidden fixed inset-0 z-40 flex items-center justify-center" style="background: rgba(0,0,0,0.65);"
    onclick="if(event.target===this) cerrarVistaMultimedia()">
    
    <div class="relative max-w-4xl w-full mx-4">
        
        {{-- Botón cerrar --}}
        <button onclick="cerrarVistaMultimedia()" 
                class="absolute -top-10 right-0 text-white hover:text-yellow-400 transition-colors duration-150">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        {{-- Contenido --}}
        <div id="viewMultimediaContent" class="flex items-center justify-center">
            {{-- imagen o video se inyecta aquí por JS --}}
        </div>

        {{-- Navegación --}}
        <button id="viewMultimediaPrev" onclick="navegarMultimedia(-1)"
                class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-12 text-white hover:text-yellow-400 transition-colors duration-150">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
        </button>

        <button id="viewMultimediaNext" onclick="navegarMultimedia(1)"
                class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-12 text-white hover:text-yellow-400 transition-colors duration-150">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
            </svg>
        </button>

    </div>
</div>