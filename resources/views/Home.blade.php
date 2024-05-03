<x-app-layout>
    <x-principal-home>
        <main>
            <!-- Pantalla 1 -->
            <section class="dark:bg-blue-900 h-screen bg-green-50  flex justify-center items-center">

                <!-- Contenido de la sección -->
                <div class="container px-3 py-24 mx-auto ">
                    <div class="lg:w-4/5 mx-auto flex flex-wrap mt-2">
                        <div class="relative md:w-5/12 md:h-1/3 overflow-hidden">
                            <img src="{{ Storage::url($productoMasVendido->imagen) }}" alt="Imagen"
                                class="mt-2 ml-8 block w-400 h-400 z-10 relative">

                            <div
                                class="absolute top-2 md:top-0 left-0 w-full h-full bg-gradient-to-r from-green-50 via-green-100 to-green-300 dark:from-blue-300 dark:via-blue-700 dark:to-blue-800 rounded-t-full z-0">
                            </div>
                        </div>

                        <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0 order-last md:order-first ml-4">
                            <div
                                class="inline-block rounded-full py-1 px-3 max-w-full text-white md:mb-12 mb-3 bg-blue-900 dark:bg-white dark:text-blue-900 dark:font-bold ">
                                #transporteSostenible</div>
                            <h1
                                class="text-3xl md:text-4xl title-font font-extrabold md:mb-10 mb-3 text-blue-900 dark:text-white">
                                {{-- Segway Ninebot GT2P --}}{{ $productoMasVendido->nombre }}
                            </h1>
                            <p class="leading-relaxed md:w-3/4 w-full mr-4 text-blue-900 dark:text-white">
                                {{-- Fam locavore
                            kickstarter distillery. Mixtape chillwave tumeric
                            sriracha taximy chia microdosing tilde DIY. XOXO fam indxgo juiceramps cornhole raw
                            denim forage brooklyn. Everyday carry +1 seitan poutine tumeric. Gastropub blue bottle
                            austin listicle pour-over, neutra jean shorts keytar banjo tattooed umami cardigan. --}}
                                {{ $productoMasVendido->descripcion }}
                            </p>
                            @auth
                                <button onclick="aniadirCarrito({{ Auth::user()->id }}, {{ $productoMasVendido->id }})"
                                    class="inline-flex items-center rounded-full py-1 px-3 max-w-full text-black bg-white md:mt-10 mt-2 relative overflow-hidden">
                                    Añadir al carrito
                                    <span class="flex items-center justify-center rounded-full w-8 h-8 ml-2 bg-blue-900" s>
                                        <svg fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" class="w-4 h-4" viewBox="0 0 24 24">
                                            <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                        </svg>
                                    </span>
                                </button>
                            @else
                                <a href="{{ route('login') }}"
                                    class="inline-flex items-center rounded-full py-1 px-3 max-w-full text-black bg-white md:mt-10 mt-2 relative overflow-hidden">
                                    Añadir al carrito
                                    <span class="flex items-center justify-center rounded-full w-8 h-8 ml-2 bg-blue-900" s>
                                        <svg fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" class="w-4 h-4" viewBox="0 0 24 24">
                                            <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                        </svg>
                                    </span>
                                </a>
                            @endauth




                        </div>
                    </div>
                </div>

            </section>

            <!-- Seccion de fotos -->
            <section style="height: calc(100vh - 64px);" class="dark:bg-blue-900 h-screen bg-green-50 ">
                <div class="md:ml-96 ml-8">
                    <div
                        class="inline-block mt-12 rounded-full py-1 px-3 max-w-full text-white md:mb-12 mb-3 bg-blue-900 dark:bg-white dark:text-blue-900 dark:font-bold ">
                        Top Ventas</div>
                    <div id="animation-carousel" class="relative w-11/12 md:w-3/4 ">
                        <div class="relative h-72 overflow-hidden rounded-2xl md:h-96">
                            <div class="carousel-slide">
                                <img src="{{ Storage::url($productosTopVentas[0]->imagen) }}"
                                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                    alt="Slide 1">
                            </div>
                            <div class="carousel-slide hidden">
                                <img src="{{ Storage::url($productosTopVentas[1]->imagen) }}"
                                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                    alt="Slide 2">
                            </div>
                            <div class="carousel-slide hidden">
                                <img src="{{ Storage::url($productosTopVentas[2]->imagen) }}"
                                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                    alt="Slide 3">
                            </div>
                            <div class="carousel-slide hidden">
                                <img src="{{ Storage::url($productosTopVentas[3]->imagen) }}"
                                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                    alt="Slide 4">
                            </div>
                            <div class="carousel-slide hidden">
                                <img src="{{ Storage::url($productosTopVentas[4]->imagen) }}"
                                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                    alt="Slide 5">
                            </div>
                        </div>
                        <button type="button"
                            class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                            id="prevBtn">
                            <span
                                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M5 1 1 5l4 4" />
                                </svg>
                                <span class="sr-only">Previous</span>
                            </span>
                        </button>
                        <button type="button"
                            class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                            id="nextBtn">
                            <span
                                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <span class="sr-only">Next</span>
                            </span>
                        </button>
                    </div>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const carouselSlides = document.querySelectorAll('.carousel-slide');
                        const prevBtn = document.getElementById('prevBtn');
                        const nextBtn = document.getElementById('nextBtn');
                        let currentIndex = 0;

                        const showSlide = (index) => {
                            carouselSlides.forEach(slide => {
                                slide.classList.add('hidden');
                            });

                            carouselSlides[index].classList.remove('hidden');
                        };

                        showSlide(currentIndex);

                        prevBtn.addEventListener('click', () => {
                            currentIndex = (currentIndex - 1 + carouselSlides.length) % carouselSlides.length;
                            showSlide(currentIndex);
                        });

                        nextBtn.addEventListener('click', () => {
                            currentIndex = (currentIndex + 1) % carouselSlides.length;
                            showSlide(currentIndex);
                        });
                    });
                </script>
            </section>
        </main>
        <footer class="text-gray-600 rounded-t-3xl  px-2 bg-blue-900 dark:bg-green-100">
            <div
                class="container px-5 py-24 mx-auto flex md:items-center lg:items-start md:flex-row md:flex-nowrap flex-wrap flex-col">
                <div class="w-64 flex-shrink-0 md:mx-0 mx-auto text-center md:text-left ">
                    <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
                        <x-application-mark class="block h-9 w-auto" />
                        <span class="ml-3 text-xl text-blue-900">Two Wheels</span>
                    </a>
                    <p class="mt-2 text-sm text-gray-500">Apostando por un futuro mas sostenible.</p>
                </div>
                <div
                    class="flex-grow flex flex-wrap justify-between  md:pl-40 -mb-10 md:mt-0 mt-10 md:text-left text-center">
                    <div class="lg:w-1/4 md:w-1/2 w-full px-4 justify-center">
                        <h2 class="title-font font-bold dark:text-gray-900 text-white tracking-widest text-sm mb-3">
                            LEGAL</h2>
                        <nav class="list-none mb-10">
                            <li>
                                <a class="text-gray-600 hover:text-gray-800">Términos y Condiciones</a>
                            </li>
                            <li>
                                <a class="text-gray-600 hover:text-gray-800">Política de privacidad</a>
                            </li>
                        </nav>
                    </div>
                    <div class="lg:w-1/4 md:w-1/2 w-full px-4">
                        <h2 class="title-font font-bold dark:text-gray-900 text-white tracking-widest text-sm mb-3">
                            CONTÁCTANOS</h2>
                        <nav class="list-none flex flex-row mb-10">
                            <li>
                                <a target="_blanck" href="<?php echo (isset($_ENV['NUM_WHATSAPP']) != null ?  'https://wa.me/'.$_ENV['NUM_WHATSAPP'].
                                '?text=Hola,%20me%20pongo%20en%20contacto%20con%20vosotros%20para..': '')?>"
                                 onmouseenter="addAnimation('whatsapp')" onmouseleave="removeAnimation('whatsapp')"
                                    class="text-gray-600 hover:text-gray-800 mx-5 "><i id="whatsapp"
                                        class="fa-brands fa-whatsapp fa-2xl"></i></a><!-- Whatsapp -->
                            </li>
                            <li>
                                <a onmouseenter="addAnimation('email')" onmouseleave="removeAnimation('email')"
                                    class="text-gray-600 hover:text-gray-800"><i id="email"
                                        class="fa-regular fa-envelope fa-2xl"></i></a><!-- Email -->
                            </li>
                        </nav>
                    </div>
                    <div class="lg:w-1/4 md:w-1/2 w-full px-4">
                        <h2 class="title-font font-bold dark:text-gray-900 text-white tracking-widest text-sm mb-3">
                            SÍGUENOS</h2>
                        <nav class="list-none mb-10">
                            <li>
                                <a class="text-gray-600 hover:text-gray-800">Instagram</a>
                            </li>
                            <li>
                                <a class="text-gray-600 hover:text-gray-800">Second Link</a>
                            </li>
                            <li>
                                <a class="text-gray-600 hover:text-gray-800">Third Link</a>
                            </li>
                            <li>
                                <a class="text-gray-600 hover:text-gray-800">Fourth Link</a>
                            </li>
                        </nav>
                    </div>
                </div>
            </div>
        </footer>

        <script>
            function aniadirCarrito(idUsuario, idProducto) {
                const token = document.head.querySelector('meta[name="csrf-token"]').getAttribute('content');
                fetch('/api/carritoAdd', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': token
                        },
                        body: JSON.stringify({
                            user_id: idUsuario,
                            product_id: idProducto
                        })
                    })
                    .catch(error => {
                        console.error("Error al aniadir el producto en el carrito de dicho usuario: ",
                            error);
                    });
                Livewire.dispatch('rendCarrito');
            }

            function addAnimation(elemento) {
                miElemento = document.getElementById(elemento);
                miElemento.classList.add('fa-spin-pulse');
            }

            function removeAnimation(elemento) {
                miElemento = document.getElementById(elemento);
                miElemento.classList.remove('fa-spin-pulse');
            }
        </script>
    </x-principal-home>
</x-app-layout>
