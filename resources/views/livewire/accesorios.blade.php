<x-principal-home>
    <div class="py-40 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white h-fit mx-4 dark:bg-blue-800 overflow-hidden shadow-xl sm:rounded-lg">

            <div class="flex justify-end items-center mt-4 mr-4">
                <p class="text-gray-500 dark:text-gray-300 mr-5">Sort</p>
                <select wire:model="valor" wire:change="ordenar" class="font-medium text-gray-700 bg-transparent dark:text-white focus:outline-none rounded-full">
{{--                     <option value="">Recomendado</option>
 --}}                    <option value="precio_asc">Precio Ascendente</option>
                    <option value="precio_desc">Precio Descendente</option>
                    <option value="stock_desc">Mayor disponibilidad</option>
                    <option value="stock_asc">Menor disponibilidad</option>
                    <option value="id_desc">Novedades</option>
{{-- 
                    <option value="">Mas valorados</option>
                    <option value="">Menos valorados</option> --}}
                </select>
            </div>
            <!-- Product List -->
            <div class="mx-auto grid max-w-6xl grid-cols-1 gap-6 p-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @foreach ($accesorios as $item)
                    <article
                        class="relative rounded-xl bg-white p-3 shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300">
                        <a href="#">
                            <div class="relative flex items-end overflow-hidden rounded-xl">
                                <img src="{{ Storage::url($item->imagen) }}" alt="{{ $item->nombre }}" class="w-full" />
                                <div
                                    class="absolute bottom-3 left-3 inline-flex items-center rounded-lg bg-white p-2 shadow-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <span class="ml-1 text-sm text-slate-400">{{ mt_rand(1, 50) / 10 }}</span>
                                </div>
                            </div>

                            <div class="mt-1 p-2 items-center justify-center text-center">
                                <h2 class="font-extrabold text-blue-900 text-lg">{{ $item->nombre }}</h2>
                                <p class="mt-4 text-md font-bold text-blue-900">{{ $item->precio }} €</p>

                                @auth
                                    <button onclick="aniadirCarrito({{ Auth::user()->id }}, {{ $item->id }})"
                                        class="inline-flex items-center rounded-full py-1 px-3 max-w-full text-black bg-green-50 dark:bg-white md:mt-4  relative overflow-hidden">
                                        Añadir al carrito
                                        <span class="flex items-center justify-center rounded-full w-8 h-8 ml-2 bg-blue-900"
                                            s>
                                            <svg fill="none" stroke="white" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" class="w-4 h-4"
                                                viewBox="0 0 24 24">
                                                <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                            </svg>
                                        </span>
                                    </button>
                                @else
                                    <a href="{{ route('login') }}"
                                        class="inline-flex items-center rounded-full py-1 px-3 max-w-full text-black bg-green-50 dark:bg-white md:mt-4  relative overflow-hidden">
                                        Añadir al carrito
                                        <span class="flex items-center justify-center rounded-full w-8 h-8 ml-2 bg-blue-900"
                                            s>
                                            <svg fill="none" stroke="white" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" class="w-4 h-4"
                                                viewBox="0 0 24 24">
                                                <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                            </svg>
                                        </span>
                                    </a>
                                @endauth
                            </div>
                        </a>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
</x-principal-home>
