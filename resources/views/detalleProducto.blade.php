<x-app-layout>
    <x-principal-home>
        <div class="py-28 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white h-fit dark:bg-blue-800 overflow-hidden shadow-xl sm:rounded-lg">
                <section class="text-gray-600 body-font overflow-hidden">
                    <div class="container px-5 py-24 mx-auto">
                        <div class="lg:w-4/5 mx-auto flex flex-wrap">
                            <img alt="{{ $producto->nombre }}"
                                class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded"
                                src="{{ Storage::url($producto->imagen) }}">
                            <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                                <h1 class="text-gray-900 text-3xl title-font font-medium mb-1 dark:text-white">
                                    {{ $producto->nombre }}
                                </h1>
                                <a href="#reseñas">
                                    <div class="flex mb-4">
                                        <span class="flex items-center">
                                            <?php
                                            
                                            $valoracionMedia = 0;
                                            foreach ($valoraciones as $valoracion) {
                                                $valoracionMedia += $valoracion->puntuacion;
                                            }
                                            $valoracionMedia = $valoracionMedia / $valoraciones->count();
                                            /* REDONDEAMOS */
                                            $parteDecimal = $valoracionMedia - floor($valoracionMedia);
                                            
                                            if ($parteDecimal > 0.5) {
                                                $numeroRedondeado = ceil($valoracionMedia);
                                            } else {
                                                $numeroRedondeado = floor($valoracionMedia);
                                            }
                                            for ($i = 0; $i < $numeroRedondeado; $i++) {
                                                echo `<svg fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                                     stroke-linejoin="round" stroke-width="2"
                                                     class="w-4 h-4 text-[#1D3AB6] dark:text-white" viewBox="0 0 24 24">
                                                     <path
                                                         d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                                     </path>
                                                 </svg>`;
                                            }
                                            
                                            for ($i = 0; $i < 5 - $valoracionMedia; $i++) {
                                                echo `<svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                     stroke-linejoin="round" stroke-width="2"
                                                     class="w-4 h-4 text-[#1D3AB6] dark:text-white" viewBox="0 0 24 24">
                                                     <path
                                                         d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                                     </path>
                                                 </svg>`;
                                            }
                                            
                                            ?>
                                            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                class="w-4 h-4 text-[#1D3AB6] dark:text-white" viewBox="0 0 24 24">
                                                <path
                                                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                                </path>
                                            </svg>
                                            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                class="w-4 h-4 text-[#1D3AB6] dark:text-white" viewBox="0 0 24 24">
                                                <path
                                                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                                </path>
                                            </svg>
                                            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                class="w-4 h-4 text-[#1D3AB6] dark:text-white" viewBox="0 0 24 24">
                                                <path
                                                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                                </path>
                                            </svg>
                                            <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                class="w-4 h-4 text-[#1D3AB6] dark:text-white" viewBox="0 0 24 24">
                                                <path
                                                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                                </path>
                                            </svg>
                                            <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                class="w-4 h-4 text-[#1D3AB6] dark:text-white" viewBox="0 0 24 24">
                                                <path
                                                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                                </path>
                                            </svg>
                                            <span class="text-gray-600 ml-3 dark:text-white">{{$valoraciones->count()}} reseñas</span>
                                        </span>
                                    </div>
                                </a>

                                <p class="leading-relaxed dark:text-white">{{ $producto->descripcion }}</p>
                                <hr class="my-5 border-blue-900 border-t-2 dark:border-white">
                                <div class="flex  justify-between">
                                    <span
                                        class="title-font font-medium text-2xl text-gray-900 md:mt-5 dark:text-white">{{ $producto->precio }}
                                        €</span>
                                    @auth
                                        <button onclick="aniadirCarrito({{ Auth::user()->id }}, {{ $producto->id }})"
                                            class="inline-flex items-center rounded-full py-1 px-3 max-w-full text-black bg-green-50 dark:bg-white md:mt-4  relative overflow-hidden">
                                            Añadir al carrito
                                            <span
                                                class="flex items-center justify-center rounded-full w-8 h-8 ml-2 bg-blue-900"
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
                                            <span
                                                class="flex items-center justify-center rounded-full w-8 h-8 ml-2 bg-blue-900">
                                                <svg fill="none" stroke="white" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" class="w-4 h-4"
                                                    viewBox="0 0 24 24">
                                                    <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                                </svg>
                                            </span>
                                        </a>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="reseñas" class="mb-8">
                    <br><br><br>
                    <h3 class="text-3xl font-bold text-blue-900 dark:text-white ml-4 md:ml-36 -mx-2 my-4">Reseñas</h3>
                    <hr class="w-11/12 mx-auto border-blue-900 border-t-2 dark:border-white">
                    @foreach ($valoraciones as $item)
                        <div class="flex flex-row  ml-4 md:ml-36 -mx-2 mt-7 justify-start items-center">
                            <p class="font-bold mr-5 max-w-40 text-[#083260] dark:text-white sm:max-w-none break-words">{{ $item->user->name }}</p>
                            <!-- Estrellas -->
                            <div class="flex ">
                                <span class="flex items-center">
                                    @for ($i = 0; $i < $item->puntuacion; $i++)
                                        <svg fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2"
                                            class="w-4 h-4 text-[#1D3AB6] dark:text-white" viewBox="0 0 24 24">
                                            <path
                                                d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                            </path>
                                        </svg>
                                    @endfor

                                    @for ($i = 0; $i < 5 - $item->puntuacion; $i++)
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2"
                                            class="w-4 h-4 text-[#1D3AB6] dark:text-white" viewBox="0 0 24 24">
                                            <path
                                                d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                            </path>
                                        </svg>
                                    @endfor


                                </span>
                            </div>
                        </div>
                        <div class="flex ml-4 md:ml-36 -mx-2 mt-3 w-3/4">
                            <blockquote>
                                <p class="text-lg font-semibold text-[#093564] dark:text-white max-w-96 sm:max-w-none break-words">
                                    "{{ $item->descripcion }}"</p>
                            </blockquote>
                        </div>
                    @endforeach

                </section>
            </div>
        </div>
    </x-principal-home>
</x-app-layout>
