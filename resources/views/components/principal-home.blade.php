    <div class="mt-5">
        <div class="max-w-8xl mx-auto ">
            <main class="dark:bg-blue-900  bg-[#EFFAEB]">
                {{ $slot }}
            </main>
            <footer class="text-white rounded-t-3xl  px-2 bg-blue-950 dark:bg-blue-950">
                <div
                    class="container px-5 py-24 mx-auto flex md:items-center lg:items-start md:flex-row md:flex-nowrap flex-wrap flex-col">
                    <div class="w-64 flex-shrink-0 md:mx-0 mx-auto text-center md:text-left ">
                        <a class="flex title-font font-medium items-center md:justify-start justify-center ">
                            <x-application-mark class="block h-9 w-auto" />
                            <span class="ml-3 text-xl mx-auto">Two Wheels</span>
                        </a>
                        <p class="mt-2 text-sm ">Apostando por un futuro más sostenible.</p>
                    </div>
                    <div
                        class="flex-grow flex flex-wrap justify-between  md:pl-40 -mb-10 md:mt-0 mt-10 md:text-left text-center">
                        <div class="lg:w-1/4 md:w-1/2 w-full px-4 justify-center">
                            <h2 class="title-font font-bold  text-white tracking-widest text-sm mb-3">
                                LEGAL</h2>
                            <nav class="list-none mb-10">
                                <li>
                                    <a class="">Términos y Condiciones</a>
                                </li>
                                <li>
                                    <a class="">Política de privacidad</a>
                                </li>
                            </nav>
                        </div>
                        <div class="lg:w-1/4 md:w-1/2 w-full px-4">
                            <h2 class="title-font font-bold  text-white tracking-widest text-sm mb-3">
                                CONTÁCTANOS</h2>
                            <nav class="list-none flex flex-row mb-10 mt-4">
                                <!-- Whatsapp -->
                                <li class="mx-auto md:mx-5">
                                    <a target="_blanck" href="<?php echo isset($_ENV['NUM_WHATSAPP']) != null ? 'https://wa.me/' . $_ENV['NUM_WHATSAPP'] . '?text=Hola,%20me%20pongo%20en%20contacto%20con%20vosotros%20para..' : ''; ?>"
                                        onmouseenter="addAnimation('whatsapp')"
                                        onmouseleave="removeAnimation('whatsapp')"><i id="whatsapp"
                                            class="fa-brands fa-whatsapp fa-2xl"></i></a>
                                </li>
                                <!-- Email -->
                                <li class="mx-auto md:mx-0">
                                    <a onmouseenter="addAnimation('email')" onmouseleave="removeAnimation('email')"><i
                                            id="email" class="fa-regular fa-envelope fa-2xl"></i></a>
                                </li>
                            </nav>
                        </div>
                        <div class="lg:w-1/4 md:w-1/2 w-full px-4">
                            <h2 class="title-font font-bold  text-white tracking-widest text-sm text-center mb-3">
                                SÍGUENOS</h2>
                            <div class="card ml-10 md:ml-0">
                                <a href="https://www.instagram.com/antoniyoortiz/" target="_blank" class="social-link-instagram">
                                    <i class="fa-brands fa-instagram fa-lg" style="color: #ffffff;"></i>
                                </a>
                                <a href="https://github.com/aos4655" target="_blank" class="social-link-github">
                                    <i class="fa-brands fa-github fa-lg" style="color: #ffffff;"></i> </a>
                                <a href="https://discordapp.com/users/tono6058" target="_blank" class="social-link-discord">
                                    <i class="fa-brands fa-discord fa-lg" style="color: #ffffff;"></i>
                                </a>
                                <a href="https://t.me/Tono4655" target="_blank" class="social-link-telegram">
                                    <i class="fa-brands fa-telegram fa-lg" style="color: #ffffff;"></i>
                                </a>
                            </div>
                            {{-- <nav class="list-none mb-10">
                                <li>
                                    <a class="">Instagram</a>
                                </li>
                                <li>
                                    <a class="">Telegram</a>
                                </li>
                                <li>
                                    <a class="">Gitub</a>
                                </li>
                                <li>
                                    <a class="">Fourth Link</a>
                                </li>
                            </nav> --}}
                        </div>
                    </div>
                </div>
            </footer>
            <style>
                .card {
                    display: flex;
                    height: 50px;
                    width: 220px;
                }

                

                .card .social-link-instagram,
                .card .social-link-github,
                .card .social-link-discord,
                .card .social-link-telegram {
                    position: relative;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    width: 25%;
                    color: whitesmoke;
                    font-size: 24px;
                    text-decoration: none;
                    transition: 0.25s;
                    border-radius: 35px;
                }


                .card .social-link-instagram:hover {
                    background: #f09433;
                    background: -moz-linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
                    background: -webkit-linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
                    background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
                    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f09433', endColorstr='#bc1888', GradientType=1);
                    animation: bounce_613 0.4s linear;
                }

                .card .social-link-github:hover {
                    background-color: #000000;
                    animation: bounce_613 0.4s linear;
                }

                .card .social-link-discord:hover {
                    background-color: #5865f2;
                    animation: bounce_613 0.4s linear;
                }

                .card .social-link-telegram:hover {
                    background-color: #00ccff;
                    animation: bounce_613 0.4s linear;
                }

                @keyframes bounce_613 {
                    40% {
                        transform: scale(1.4);
                    }

                    60% {
                        transform: scale(0.8);
                    }

                    80% {
                        transform: scale(1.2);
                    }

                    100% {
                        transform: scale(1);
                    }
                }
            </style>
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
                /* ANIMACION PARA ICONOS CONTACTO FOOTER*/
                function addAnimation(elemento) {
                    miElemento = document.getElementById(elemento);
                    miElemento.classList.add('fa-spin-pulse');
                }

                function removeAnimation(elemento) {
                    miElemento = document.getElementById(elemento);
                    miElemento.classList.remove('fa-spin-pulse');
                }
            </script>
        </div>
    </div>
