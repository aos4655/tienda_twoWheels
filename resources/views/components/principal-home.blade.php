    <div class="mt-5">
        <div class="max-w-8xl mx-auto ">
            <main class="dark:bg-blue-900  bg-[#EFFAEB]">
                {{ $slot }}
            </main>
            <footer class="text-white rounded-t-3xl w-full md:bottom-0 px-2 bg-blue-950 dark:bg-blue-950">
                <div
                    class="container px-5 py-24 mx-auto flex md:items-center lg:items-start  md:flex-nowrap flex-wrap flex-col">
                    <div class="md:flex w-full">
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
                                        <a class="cursor-pointer" href="{{route('terminos.show')}}">Aviso Legal y Terminos de uso</a>
                                    </li>
                                    <li>
                                        <a class="cursor-pointer" href="{{route('politica.show')}}">Política de privacidad</a>
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
                                        <a href="{{route('contactanos.index')}}" onmouseenter="addAnimation('email')" onmouseleave="removeAnimation('email')"><i
                                                id="email" class="fa-regular fa-envelope fa-2xl"></i></a>
                                    </li>
                                </nav>
                            </div>
                            <div class="lg:w-1/4 md:w-1/2 w-full px-4">
                                <h2 class="title-font font-bold  text-white tracking-widest text-sm text-center mb-3">
                                    SÍGUENOS</h2>
                                <div class="card ml-10 md:ml-0">
                                    <a href="https://www.instagram.com/antoniyoortiz/" target="_blank"
                                        class="social-link-instagram">
                                        <i class="fa-brands fa-instagram fa-lg" style="color: #ffffff;"></i>
                                    </a>
                                    <a href="https://github.com/aos4655" target="_blank" class="social-link-github">
                                        <i class="fa-brands fa-github fa-lg" style="color: #ffffff;"></i> </a>
                                    <a href="https://discordapp.com/users/tono6058" target="_blank"
                                        class="social-link-discord">
                                        <i class="fa-brands fa-discord fa-lg" style="color: #ffffff;"></i>
                                    </a>
                                    <a href="https://t.me/Tono4655" target="_blank" class="social-link-telegram">
                                        <i class="fa-brands fa-telegram fa-lg" style="color: #ffffff;"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex md:flex-row flex-col  w-full mb-4 translate-y-20 md:justify-between items-center">
                        <p>&copy; Copyright {{ now()->year }} <span class="font-bold"> Two Wheels</span></p>

                        <div class="flex justify-center space-x-4 mt-4 md:mt-0">
                            <div class="w-1/3  ">
                                <svg version="1.1"  width="60" height="40" xmlns="http://www.w3.org/2000/svg" class="bg-gray-800 p-1 rounded-lg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 32" fill="white">
                                    <path
                                        d="M10.781 7.688c-0.251-1.283-1.219-1.688-2.344-1.688h-8.376l-0.061 0.405c5.749 1.469 10.469 4.595 12.595 10.501l-1.813-9.219zM13.125 19.688l-0.531-2.781c-1.096-2.907-3.752-5.594-6.752-6.813l4.219 15.939h5.469l8.157-20.032h-5.501l-5.062 13.688zM27.72 26.061l3.248-20.061h-5.187l-3.251 20.061h5.189zM41.875 5.656c-5.125 0-8.717 2.72-8.749 6.624-0.032 2.877 2.563 4.469 4.531 5.439 2.032 0.968 2.688 1.624 2.688 2.499 0 1.344-1.624 1.939-3.093 1.939-2.093 0-3.219-0.251-4.875-1.032l-0.688-0.344-0.719 4.499c1.219 0.563 3.437 1.064 5.781 1.064 5.437 0.032 8.97-2.688 9.032-6.843 0-2.282-1.405-4-4.376-5.439-1.811-0.904-2.904-1.563-2.904-2.499 0-0.843 0.936-1.72 2.968-1.72 1.688-0.029 2.936 0.314 3.875 0.752l0.469 0.248 0.717-4.344c-1.032-0.406-2.656-0.844-4.656-0.844zM55.813 6c-1.251 0-2.189 0.376-2.72 1.688l-7.688 18.374h5.437c0.877-2.467 1.096-3 1.096-3 0.592 0 5.875 0 6.624 0 0 0 0.157 0.688 0.624 3h4.813l-4.187-20.061h-4zM53.405 18.938c0 0 0.437-1.157 2.064-5.594-0.032 0.032 0.437-1.157 0.688-1.907l0.374 1.72c0.968 4.781 1.189 5.781 1.189 5.781-0.813 0-3.283 0-4.315 0z">
                                    </path>
                                </svg>
                            </div>
                            <div class="w-1/3 ">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg"  width="60" height="40"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 32" class="bg-gray-800 p-1 rounded-lg" fill="white">
                                    <path
                                        d="M35.255 12.078h-2.396c-0.229 0-0.444 0.114-0.572 0.303l-3.306
                                                4.868-1.4-4.678c-0.088-0.292-0.358-0.493-0.663-0.493h-2.355c-0.284
                                                0-0.485 0.28-0.393 0.548l2.638 7.745-2.481 3.501c-0.195 0.275 0.002
                                                0.655 0.339 0.655h2.394c0.227 0 0.439-0.111 0.569-0.297l7.968-11.501c0.191-0.275-0.006-0.652-0.341-0.652zM19.237 16.718c-0.23 1.362-1.311 2.276-2.691 2.276-0.691 0-1.245-0.223-1.601-0.644-0.353-0.417-0.485-1.012-0.374-1.674 0.214-1.35 1.313-2.294 2.671-2.294 0.677 0 1.227 0.225 1.589 0.65 0.365 0.428 0.509 1.027 0.404 1.686zM22.559 12.078h-2.384c-0.204 0-0.378 0.148-0.41 0.351l-0.104 0.666-0.166-0.241c-0.517-0.749-1.667-1-2.817-1-2.634 0-4.883 1.996-5.321 4.796-0.228 1.396 0.095 2.731 0.888 3.662 0.727 0.856 1.765 1.212 3.002 1.212 2.123 0 3.3-1.363 3.3-1.363l-0.106 0.662c-0.040 0.252 0.155 0.479 0.41 0.479h2.147c0.341 0 0.63-0.247 0.684-0.584l1.289-8.161c0.040-0.251-0.155-0.479-0.41-0.479zM8.254 12.135c-0.272 1.787-1.636 1.787-2.957 1.787h-0.751l0.527-3.336c0.031-0.202 0.205-0.35 0.41-0.35h0.345c0.899 0 1.747 0 2.185 0.511 0.262 0.307 0.341 0.761 0.242 1.388zM7.68 7.473h-4.979c-0.341 0-0.63 0.248-0.684 0.584l-2.013 12.765c-0.040 0.252 0.155 0.479 0.41 0.479h2.378c0.34 0 0.63-0.248 0.683-0.584l0.543-3.444c0.053-0.337 0.343-0.584 0.683-0.584h1.575c3.279 0 5.172-1.587 5.666-4.732 0.223-1.375 0.009-2.456-0.635-3.212-0.707-0.832-1.962-1.272-3.628-1.272zM60.876 7.823l-2.043 12.998c-0.040 0.252 0.155 0.479 0.41 0.479h2.055c0.34 0 0.63-0.248 0.683-0.584l2.015-12.765c0.040-0.252-0.155-0.479-0.41-0.479h-2.299c-0.205 0.001-0.379 0.148-0.41 0.351zM54.744 16.718c-0.23 1.362-1.311 2.276-2.691 2.276-0.691 0-1.245-0.223-1.601-0.644-0.353-0.417-0.485-1.012-0.374-1.674 0.214-1.35 1.313-2.294 2.671-2.294 0.677 0 1.227 0.225 1.589 0.65 0.365 0.428 0.509 1.027 0.404 1.686zM58.066 12.078h-2.384c-0.204 0-0.378 0.148-0.41 0.351l-0.104 0.666-0.167-0.241c-0.516-0.749-1.667-1-2.816-1-2.634 0-4.883 1.996-5.321 4.796-0.228 1.396 0.095 2.731 0.888 3.662 0.727 0.856 1.765 1.212 3.002 1.212 2.123 0 3.3-1.363 3.3-1.363l-0.106 0.662c-0.040 0.252 0.155 0.479 0.41 0.479h2.147c0.341 0 0.63-0.247 0.684-0.584l1.289-8.161c0.040-0.252-0.156-0.479-0.41-0.479zM43.761 12.135c-0.272 1.787-1.636 1.787-2.957 1.787h-0.751l0.527-3.336c0.031-0.202 0.205-0.35 0.41-0.35h0.345c0.899 0 1.747 0 2.185 0.511 0.261 0.307 0.34 0.761 0.241 1.388zM43.187 7.473h-4.979c-0.341 0-0.63 0.248-0.684 0.584l-2.013 12.765c-0.040 0.252 0.156 0.479 0.41 0.479h2.554c0.238 0 0.441-0.173 0.478-0.408l0.572-3.619c0.053-0.337 0.343-0.584 0.683-0.584h1.575c3.279 0 5.172-1.587 5.666-4.732 0.223-1.375 0.009-2.456-0.635-3.212-0.707-0.832-1.962-1.272-3.627-1.272z">
                                    </path>
                                </svg>
                            </div>
                            <div class="w-1/3 ">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg"  width="60" height="40" class="bg-gray-800 p-1 rounded-lg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 32" fill="white">
                                    <path
                                        d="M42.667-0c-4.099 0-7.836 1.543-10.667 4.077-2.831-2.534-6.568-4.077-10.667-4.077-8.836 0-16 7.163-16 16s7.164 16 16 16c4.099 0 7.835-1.543 10.667-4.077 2.831 2.534 6.568 4.077 10.667 4.077 8.837 0 16-7.163 16-16s-7.163-16-16-16zM11.934 19.828l0.924-5.809-2.112 5.809h-1.188v-5.809l-1.056 5.809h-1.584l1.32-7.657h2.376v4.753l1.716-4.753h2.508l-1.32 7.657h-1.585zM19.327 18.244c-0.088 0.528-0.178 0.924-0.264 1.188v0.396h-1.32v-0.66c-0.353 0.528-0.924 0.792-1.716 0.792-0.442 0-0.792-0.132-1.056-0.396-0.264-0.351-0.396-0.792-0.396-1.32 0-0.792 0.218-1.364 0.66-1.716 0.614-0.44 1.364-0.66 2.244-0.66h0.66v-0.396c0-0.351-0.353-0.528-1.056-0.528-0.442 0-1.012 0.088-1.716 0.264 0.086-0.351 0.175-0.792 0.264-1.32 0.703-0.264 1.32-0.396 1.848-0.396 1.496 0 2.244 0.616 2.244 1.848 0 0.353-0.046 0.749-0.132 1.188-0.089 0.616-0.179 1.188-0.264 1.716zM24.079 15.076c-0.264-0.086-0.66-0.132-1.188-0.132s-0.792 0.177-0.792 0.528c0 0.177 0.044 0.31 0.132 0.396l0.528 0.264c0.792 0.442 1.188 1.012 1.188 1.716 0 1.409-0.838 2.112-2.508 2.112-0.792 0-1.366-0.044-1.716-0.132 0.086-0.351 0.175-0.836 0.264-1.452 0.703 0.177 1.188 0.264 1.452 0.264 0.614 0 0.924-0.175 0.924-0.528 0-0.175-0.046-0.308-0.132-0.396-0.178-0.175-0.396-0.308-0.66-0.396-0.792-0.351-1.188-0.924-1.188-1.716 0-1.407 0.792-2.112 2.376-2.112 0.792 0 1.32 0.045 1.584 0.132l-0.265 1.451zM27.512 15.208h-0.924c0 0.442-0.046 0.838-0.132 1.188 0 0.088-0.022 0.264-0.066 0.528-0.046 0.264-0.112 0.442-0.198 0.528v0.528c0 0.353 0.175 0.528 0.528 0.528 0.175 0 0.35-0.044 0.528-0.132l-0.264 1.452c-0.264 0.088-0.66 0.132-1.188 0.132-0.881 0-1.32-0.44-1.32-1.32 0-0.528 0.086-1.099 0.264-1.716l0.66-4.225h1.584l-0.132 0.924h0.792l-0.132 1.585zM32.66 17.32h-3.3c0 0.442 0.086 0.749 0.264 0.924 0.264 0.264 0.66 0.396 1.188 0.396s1.1-0.175 1.716-0.528l-0.264 1.584c-0.442 0.177-1.012 0.264-1.716 0.264-1.848 0-2.772-0.924-2.772-2.773 0-1.142 0.264-2.024 0.792-2.64 0.528-0.703 1.188-1.056 1.98-1.056 0.703 0 1.274 0.22 1.716 0.66 0.35 0.353 0.528 0.881 0.528 1.584 0.001 0.617-0.046 1.145-0.132 1.585zM35.3 16.132c-0.264 0.97-0.484 2.201-0.66 3.697h-1.716l0.132-0.396c0.35-2.463 0.614-4.4 0.792-5.809h1.584l-0.132 0.924c0.264-0.44 0.528-0.703 0.792-0.792 0.264-0.264 0.528-0.308 0.792-0.132-0.088 0.088-0.31 0.706-0.66 1.848-0.353-0.086-0.661 0.132-0.925 0.66zM41.241 19.697c-0.353 0.177-0.838 0.264-1.452 0.264-0.881 0-1.584-0.308-2.112-0.924-0.528-0.528-0.792-1.32-0.792-2.376 0-1.32 0.35-2.42 1.056-3.3 0.614-0.879 1.496-1.32 2.64-1.32 0.44 0 1.056 0.132 1.848 0.396l-0.264 1.584c-0.528-0.264-1.012-0.396-1.452-0.396-0.707 0-1.235 0.264-1.584 0.792-0.353 0.442-0.528 1.144-0.528 2.112 0 0.616 0.132 1.056 0.396 1.32 0.264 0.353 0.614 0.528 1.056 0.528 0.44 0 0.924-0.132 1.452-0.396l-0.264 1.717zM47.115 15.868c-0.046 0.264-0.066 0.484-0.066 0.66-0.088 0.442-0.178 1.035-0.264 1.782-0.088 0.749-0.178 1.254-0.264 1.518h-1.32v-0.66c-0.353 0.528-0.924 0.792-1.716 0.792-0.442 0-0.792-0.132-1.056-0.396-0.264-0.351-0.396-0.792-0.396-1.32 0-0.792 0.218-1.364 0.66-1.716 0.614-0.44 1.32-0.66 2.112-0.66h0.66c0.086-0.086 0.132-0.218 0.132-0.396 0-0.351-0.353-0.528-1.056-0.528-0.442 0-1.012 0.088-1.716 0.264 0-0.351 0.086-0.792 0.264-1.32 0.703-0.264 1.32-0.396 1.848-0.396 1.496 0 2.245 0.616 2.245 1.848 0.001 0.089-0.021 0.264-0.065 0.529zM49.69 16.132c-0.178 0.528-0.396 1.762-0.66 3.697h-1.716l0.132-0.396c0.35-1.935 0.614-3.872 0.792-5.809h1.584c0 0.353-0.046 0.66-0.132 0.924 0.264-0.44 0.528-0.703 0.792-0.792 0.35-0.175 0.614-0.218 0.792-0.132-0.353 0.442-0.574 1.056-0.66 1.848-0.353-0.086-0.66 0.132-0.925 0.66zM54.178 19.828l0.132-0.528c-0.353 0.442-0.838 0.66-1.452 0.66-0.707 0-1.188-0.218-1.452-0.66-0.442-0.614-0.66-1.232-0.66-1.848 0-1.142 0.308-2.067 0.924-2.773 0.44-0.703 1.056-1.056 1.848-1.056 0.528 0 1.056 0.264 1.584 0.792l0.264-2.244h1.716l-1.32 7.657h-1.585zM16.159 17.98c0 0.442 0.175 0.66 0.528 0.66 0.35 0 0.614-0.132 0.792-0.396 0.264-0.264 0.396-0.66 0.396-1.188h-0.397c-0.881 0-1.32 0.31-1.32 0.924zM31.076 15.076c-0.088 0-0.178-0.043-0.264-0.132h-0.264c-0.528 0-0.881 0.353-1.056 1.056h1.848v-0.396l-0.132-0.264c-0.001-0.086-0.047-0.175-0.133-0.264zM43.617 17.98c0 0.442 0.175 0.66 0.528 0.66 0.35 0 0.614-0.132 0.792-0.396 0.264-0.264 0.396-0.66 0.396-1.188h-0.396c-0.881 0-1.32 0.31-1.32 0.924zM53.782 15.076c-0.353 0-0.66 0.22-0.924 0.66-0.178 0.264-0.264 0.749-0.264 1.452 0 0.792 0.264 1.188 0.792 1.188 0.35 0 0.66-0.175 0.924-0.528 0.264-0.351 0.396-0.879 0.396-1.584-0.001-0.792-0.311-1.188-0.925-1.188z">
                                    </path>
                                </svg>
                            </div>
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
                    Livewire.dispatch('ponerShake');
                    setTimeout(() => {
                        Livewire.dispatch('quitarShake');
                    }, 3000);

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
        <style>
            .cart-icon {
                transition: transform 1.5s ease, opacity 0.5s ease-in-out;
                opacity: 0;
                position: absolute;
                left: 10px;
                top: 50%;
                transform: translateY(-50%);
            }

            .button-container.clicked .cart-icon {
                transform: translateX(140px) translateY(-50%);
                opacity: 1;
            }

            .button-container.clicked .cart-icon.hidden {
                opacity: 0;
            }

            .button-container.clicked .button-text,
            .button-container.clicked .button-span {
                opacity: 0;
                transition: opacity 0.5s ease;
            }

            .button-container.clicked .checkmark {
                opacity: 1;
                transition: opacity 0.5s ease 1.5s;
            }

            .checkmark {
                opacity: 0;
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
            }

            .button-text,
            .button-span {
                transition: opacity 0.5s ease;
            }
        </style>

        <!-- ANIMACION PARA AÑADIR AL CARRITO -->
        <script>
            const buttons = document.querySelectorAll('.button-container');

            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    const currentButton = this;
                    currentButton.classList.add('clicked');

                    setTimeout(() => {
                        currentButton.querySelector('.cart-icon').classList.add('hidden');
                    }, 1500); 

                    setTimeout(() => {
                        currentButton.classList.remove('clicked');
                        currentButton.querySelector('.cart-icon').classList.remove('hidden');
                    }, 3000); 
                });
            });
        </script>
    </div>
