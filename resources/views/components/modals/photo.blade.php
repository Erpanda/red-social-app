<div id="modalPhoto"
    class="hidden fixed inset-0 z-50 flex items-center justify-center"
    style="background: rgba(0,0,0,0.65);"
    onclick="if(event.target===this) cerrarModal('Photo')">

    <div class="relative rounded-xl w-full max-w-md p-5"
        style="background: #1e2330; font-family: 'Segoe UI', sans-serif;">

        <div class="flex items-center justify-between mb-4">
            <h2 class="text-white font-semibold text-base tracking-wide">
                Elegir foto del perfil
            </h2>
            <button onclick="cerrarModal('Photo')"
                    class="text-gray-400 hover:text-white transition-colors text-xl leading-none">
                &times;
            </button>
        </div>

        <div class="flex gap-3 mb-5 flex-col">
            <form id="formPhoto" 
                method="POST" 
                enctype="multipart/form-data"
                data-action-avatar="{{ route('profile.imagenes', 'avatar') }}"
                data-action-portada="{{ route('profile.imagenes', 'portada_photo') }}">
                <!-- Indispensable -->
                @csrf

                <div class="flex gap-2" id="selectPhoto">
                    <button type="button" onclick="document.getElementById('inputPhoto').click()" class="flex-1 flex items-center justify-center bg-yellow-400 text-gray-900 font-semibold text-sm px-4 py-2 rounded-xl hover:bg-gray-700 hover:text-white transition-colors duration-150">
                        <span class="text-lg leading-none">+</span>
                        Subir foto
                    </button>
                    
                    <input type="file" id="inputPhoto" name="avatar" accept="image/*" class="hidden">

                    <button type="button" class="flex items-center justify-center bg-yellow-400 w-10 rounded-lg text-gray-900 hover:bg-gray-700 hover:text-white transition-colors duration-150">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.232 5.232l3.536 3.536M9 13l6.586-6.586a2 2 0 112.828 2.828L11.828 15.828a2 2 0 01-1.414.586H9v-1.414a2 2 0 01.586-1.414z"/>
                        </svg>
                    </button>
                </div>

                <div class="hidden gap-4" id="selectPhotoPreview">
                    <div id="sizePhoto" class="relative w-full aspect-square rounded-xl overflow-hidden bg-gray-800 flex items-center justify-center">

                        <img id="previewPhoto" class="w-full h-full object-cover">

                        <div class="hidden text-gray-600">
                            <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>

                        <div id="overlayCirculo" class="absolute inset-0 bg-black/50 flex items-center justify-center">
                            <div class="w-full h-full rounded-full border-2 border-white"></div>
                        </div>
                    </div>
                    
                    <button type="submit" id="btnSubmitAccion" data-type="photo" class="flex-1 flex gap-2 items-center justify-center font-semibold text-sm px-4 py-2 rounded-xl transition-all">
                        @include('components.spinner')
                        <span class="btn-text">Actualizar foto</span>
                    </button>
                </div>
            </form>
        </div>

        <div class="border-t border-gray-700"></div>

        <p class="text-white text-sm font-semibold my-3">Fotos sugeridas</p>

        <div id="fotosSugeridas" class="grid grid-cols-4 gap-2">
            <img data-tipo="perfil" src="{{ asset('img/perfil.jpg') }}" class="w-full aspect-square object-cover rounded-md cursor-pointer hover:ring-2 hover:ring-yellow-500 transition">
            <img data-tipo="perfil" src="{{ asset('img/perfil-2.jpg') }}" class="w-full aspect-square object-cover rounded-md cursor-pointer hover:ring-2 hover:ring-yellow-500 transition">
            <img data-tipo="portada" src="{{ asset('img/portada.jpg') }}" class="hidden w-full aspect-[3/1] object-cover rounded-lg cursor-pointer hover:ring-2 hover:ring-yellow-500 transition">
            <img data-tipo="portada" src="{{ asset('img/portada-2.webp') }}" class="hidden w-full aspect-[3/1] object-cover rounded-lg cursor-pointer hover:ring-2 hover:ring-yellow-500 transition">
        </div>

    </div>
</div>