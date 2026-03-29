<footer class="bg-gray-900 px-20 py-10">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-3 gap-12 mb-12">

            <div class="flex flex-col gap-4">
                <h3 class="text-2xl font-black text-white">Frank & Real</h3>
                <p class="text-sm text-gray-400 leading-relaxed max-w-xs">
                    Un espacio donde la gente comparte lo que vive,
                    sin filtros, sin pose. Solo vida real.
                </p>
            </div>

            <div class="flex flex-col gap-3">
                <h4 class="text-xs font-black uppercase tracking-widest text-yellow-300 mb-1">
                    Navegación
                </h4>
                @foreach ([
                    ['label' => 'Feed',           'href' => route('feed')],
                    ['label' => 'Categorías',     'href' => route('categorias.index')],
                    ['label' => 'Notificaciones', 'href' => route('notificaciones.index')],
                    ['label' => 'Mi perfil',      'href' => route('profile.show', Auth::user())],
                ] as $link)
                    <a href="{{ $link['href'] }}"
                    class="text-sm text-gray-400 hover:text-white transition-colors duration-150">
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </div>

            <div class="flex flex-col gap-3">
                <h4 class="text-xs font-black uppercase tracking-widest text-yellow-300 mb-1">
                    Contacto
                </h4>
                <p class="text-sm text-gray-400">frank.rojas.mori@gmail.com</p>
                <div class="flex gap-4 mt-2">
                    <a href="#" class="text-gray-400 hover:text-white transition-colors duration-150">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.477 2 2 6.484 2 12.021c0 4.428 2.865 8.184 6.839 9.504.5.092.682-.217.682-.482 0-.237-.009-.868-.014-1.703-2.782.605-3.369-1.342-3.369-1.342-.454-1.154-1.11-1.462-1.11-1.462-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0 1 12 6.844a9.59 9.59 0 0 1 2.504.337c1.909-1.296 2.747-1.026 2.747-1.026.546 1.378.202 2.397.1 2.65.64.7 1.028 1.595 1.028 2.688 0 3.847-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.579.688.481C19.138 20.2 22 16.447 22 12.021 22 6.484 17.523 2 12 2z"/>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors duration-150">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.744l7.737-8.835L2.25 2.25h6.865l4.264 5.633 5.865-5.633Zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-700 mb-6"></div>

        <div class="grid grid-cols-2 gap-3 items-center">
            <p class="text-xs text-gray-500">
                © {{ date('Y') }} Frank & Real. Todos los derechos reservados.
            </p>
            <p class="text-xs text-gray-500 text-right">
                Comparte lo que vives, conecta con quien lo entiende.
            </p>
        </div>
    </div>
</footer>