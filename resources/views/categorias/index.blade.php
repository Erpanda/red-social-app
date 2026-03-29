<x-app-layout>
    <x-slot name="header">Categorias</x-slot>
    <x-slot name="description">Organiza tu mundo según como lo piensas. Las categorías te ayudan a encontrar patrones en tus hábitos y pensamientos.</x-slot>
    <x-slot name="nuevoElemento">+ Nueva Categoria</x-slot>

    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">

        @if(session('exito'))
            <div class="bg-green-100 text-green-800 px-4 py-3 rounded-xl mb-6 text-sm font-medium">
                {{ session('exito') }}
            </div>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">

        </div>

        <div class="flex gap-8 items-center bg-white rounded-2xl border border-gray-100 shadow-sm p-8 mt-5">
            <div class="flex-1 flex flex-col gap-6">
                <span class="text-2xl font-bold tracking-widest text-yellow-500 uppercase">Tips</span>
                <div class="w-full h-1 bg-yellow-400 rounded-full"></div>

                <div class="flex flex-col gap-6">
                    <div class="flex gap-4 items-start">
                        <div class="w-8 h-8 rounded-xl bg-yellow-400 flex items-center justify-center shrink-0">
                            <span class="text-white font-black text-sm">1</span>
                        </div>
                        <div>
                            <h2 class="text-lg font-black text-gray-800 leading-tight mb-1">Dale forma a tus ideas</h2>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                Las categorías son el esqueleto de tu contenido. Agrupa tus posts por temas, proyectos o estados de ánimo — tú defines la lógica.
                            </p>
                            <p class="text-gray-400 text-xs leading-relaxed mt-1">
                                Cuantas más categorías tengas, más fácil será encontrar patrones en lo que escribes y piensas.
                            </p>
                        </div>
                    </div>

                    <div class="w-full h-px bg-gray-100"></div>

                    <div class="flex gap-4 items-start">
                        <div class="w-8 h-8 rounded-xl bg-yellow-400 flex items-center justify-center shrink-0">
                            <span class="text-white font-black text-sm">2</span>
                        </div>
                        <div>
                            <h2 class="text-lg font-black text-gray-800 leading-tight mb-1">Nombra lo que importa</h2>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                Un buen nombre de categoría vale más que mil etiquetas. Sé específico — tus categorías deben reflejar cómo piensas, no cómo piensan otros.
                            </p>
                            <p class="text-gray-400 text-xs leading-relaxed mt-1">
                                Evita categorías demasiado amplias. "Vida" lo contiene todo y no ayuda a nadie.
                            </p>
                        </div>
                    </div>

                    <div class="w-full h-px bg-gray-100"></div>

                    <div class="flex gap-4 items-start">
                        <div class="w-8 h-8 rounded-xl bg-yellow-400 flex items-center justify-center shrink-0">
                            <span class="text-white font-black text-sm">3</span>
                        </div>
                        <div>
                            <h2 class="text-lg font-black text-gray-800 leading-tight mb-1">Menos es más</h2>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                No necesitas una categoría para cada post. Empieza con pocas, bien definidas, y expande solo cuando sientas que algo no encaja en ninguna.
                            </p>
                            <p class="text-gray-400 text-xs leading-relaxed mt-1">
                                Un sistema simple que usas siempre supera a uno perfecto que abandonas a la semana.
                            </p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="hidden lg:flex w-100 shrink-0 items-center justify-center">
                <img src="{{ asset('img/img-categorias.png') }}" alt="Tipo de Post" class="w-full object-contain drop-shadow-md">
            </div>
        </div>

    </div>
</x-app-layout>