    <div class="h-screen justify-center content-center">
        <section class="flex justify-center items-center dark:bg-blue-900 bg-green-50 px-4 text-gray-600 antialiased">
            <div class="flex h-full md:w-3/4 w-11/12 py-7 flex-col justify-center">
                <!-- Table -->
                <div class="mx-auto max-w-2xl py-7 w-full  rounded-3xl bg-white dark:bg-blue-800 shadow-lg">
                    <header class="px-9 py-4">
                        <div class="font-extrabold text-3xl dark:text-white text-blue-900">Tu carrito</div>
                    </header>
                    <div class="block w-full overflow-x-auto">
                        <table class="items-center bg-transparent w-full border-collapse ">
                            <thead class="bg-green-50 text-xs font-semibold uppercase dark:text-blue-900-400 ">
                                <tr>
                                    <th
                                        class="md:px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-center">
                                        Producto
                                    </th>
                                    <th
                                        class="md:px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-center">
                                        Cantidad
                                    </th>
                                    <th
                                        class="md:px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-center">
                                        Precio
                                    </th>
                                    <th
                                        class="md:px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-center">
                                        Acción
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($productosUsuario as $producto)
                                    <tr class="dark:text-white">
                                        <th
                                            class="border-t-0 md:px-6 align-middle items-center border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left flex flex-row text-blueGray-700 ">
                                            <img class="w-12 h-12"
                                                src="https://ridenroll.es/wp-content/uploads/2024/04/2trottinette-electrique-bluetran-lightning-72v-35ah-lg-600x615.jpg"
                                                alt="">
                                            <span
                                                class="font-medium hidden sm:block dark:text-white flex-wrap ml-4">{{ $producto->nombre }}</span>
                                        </th>
                                        <td
                                            class="border-t-0 md:px-6 text-center border-l-0 border-r-0 text-xs whitespace-nowrap md:p-4 ">
                                            <div class="relative flex items-center max-w-[4rem] md:max-w-[6rem]">
                                                <!-- Botón para decrementar la cantidad -->
                                                <button type="button" wire:click="decrementar({{ $producto->id }})"
                                                    class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-1.5 h-8 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                                    <i class="fa-solid fa-minus" style="color: #ffffff;"></i>
                                                </button>

                                                <!-- Campo de entrada para mostrar la cantidad -->
                                                <input type="text" readonly
                                                    class="bg-gray-50 border-x-0 border-gray-300 h-8 font-medium text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    value="{{ $producto->pivot->cantidad }}" />

                                                <!-- Botón para incrementar la cantidad -->
                                                <button type="button" wire:click="incrementar({{ $producto->id }})"
                                                    class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-1.5 h-8 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                                    <i class="fa-solid fa-plus" style="color: #ffffff;"></i>
                                                </button>
                                            </div>


                                        </td>
                                        <td
                                            class="border-t-0 md:px-6 text-center border-l-0 border-r-0 text-xs whitespace-nowrap md:p-4">
                                            {{ $producto->precio }} €
                                        </td>
                                        <td
                                            class="border-t-0 md:px-6 justify-center items-center border-l-0 border-r-0 text-xs whitespace-nowrap md:p-4">
                                            <button class="bin-button ml-4 ">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 39 7" class="bin-top">
                                                    <line stroke-width="4" stroke="white" y2="5" x2="39"
                                                        y1="5"></line>
                                                    <line stroke-width="3" stroke="white" y2="1.5" x2="26.0357"
                                                        y1="1.5" x1="12"></line>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 33 39" class="bin-bottom">
                                                    <path mask="url(#path-1-inside-1_8_19)" fill="white"
                                                        d="M0 0H33H0ZM37 35C37 39.4183 33.4183 43 29 43H4C-0.418278 43 -4 39.4183 -4 35H4H29H37ZM4 43C-0.418278 43 -4 39.4183 -4 35V0H4V35V43ZM37 0V35C37 39.4183 33.4183 43 29 43V35V0H37Z">
                                                    </path>
                                                    <path stroke-width="4" stroke="white" d="M12 6L12 29"></path>
                                                    <path stroke-width="4" stroke="white" d="M21 6V29"></path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 89 80" class="garbage">
                                                    <path fill="white"
                                                        d="M20.5 10.5L37.5 15.5L42.5 11.5L51.5 12.5L68.75 0L72 11.5L79.5 12.5H88.5L87 22L68.75 31.5L75.5066 25L86 26L87 35.5L77.5 48L70.5 49.5L80 50L77.5 71.5L63.5 58.5L53.5 68.5L65.5 70.5L45.5 73L35.5 79.5L28 67L16 63L12 51.5L0 48L16 25L22.5 17L20.5 10.5Z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>

                        </table>
                    </div>

                    <!-- Total amount -->
                    <div
                        class="flex justify-end space-x-4 md:px-10 px-4 py-4 text-lg font-bold dark:text-white text-blue-900">
                        <div>Total</div>
                        <div>{{ str_replace('.', ',', $subtotal) }} €</div>
                    </div>

                    <div class="flex flex-col w-11/12 ml-4 dark:text-white text-blue-950">
                        <div class="flex flex-col md:flex-row w-full md:items-center md:ml-3 md:mb-0">
                            <span class="font-bold">Entregando a:</span>

                            <input id="user_nombre" type="text" disabled
                                class="h-3 w-full md:w-2/4 bg-transparent border-none overflow-wrap break-words"
                                value="{{ Auth::user()->name }}">
                        </div>
                        <div class="flex flex-col md:flex-row w-full md:items-center mb-4 md:mb-0">
                            <span class="font-bold md:hidden">Dirección:</span>
                            <textarea id="user_direccion" disabled name="text" rows="14" cols="10" wrap="soft" maxlength="40"
                                class="min-h-fit h-16 w-full mb-4 md:w-4/5 bg-transparent border-none md:mr-10 overflow-auto resize-none ">{{ Auth::user()->direccion }}</textarea>
                            <button id="boton_cambiar" onclick="editarNombreYDireccion()"
                                class="italic font-extrabold text-lg text-blue-800 dark:text-green-50 mt-4 md:-mt-8  ">Cambiar</button>
                        </div>
                    </div>

                    <div class="w-11/12 mx-auto my-4">
                        <hr class=" border-blue-800 dark:border-green-50">
                    </div>
                    <div class="w-11/12 mx-auto my-4 flex flex-row justify-center  items-center">
                        <!-- PAYPAL -->
                        <input id="paypal" onchange="cambiarLink('paypal')" name="pago" type="radio"
                            value="PagarCard" class="mr-2">
                        <div for="paypal"
                            class="flex rounded-full bg-green-50 px-auto p-2 px-4 w-24 justify-center items-center mr-2">
                            <img class="w-9 h-9 " src="{{ Storage::url('imgPago/paypal.png') }}" alt="foto">
                        </div>

                        <!-- STRIPE -->
                        <input id="card" onchange="cambiarLink('stripe')" name="pago" type="radio"
                            value="PagarCard" class="ml-2">
                        <div for="card"
                            class="flex rounded-full bg-green-50 px-auto p-2 px-4 w-24 justify-center items-center ml-2">
                            <img class="w-9 h-9 " src="{{ Storage::url('imgPago/card.png') }}" alt="foto">
                        </div>
                    </div>
                    <div class="flex flex-row-reverse text-white mt-8 pb-3">
                        <form id="form_pago" action="" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" id="direccion_envio" name="direccion_envio">
                            <input type="hidden" id="nombre_envio" name="nombre_envio">
                            <button disabled id="btn_pagar" type="submit"
                                class="rounded-full bg-blue-900 mx-6 p-2 w-20">Pagar</button>
                        </form>
                        <a href="{{ url()->previous() }}" class="rounded-full bg-red-600 p-2 w-20">Cancelar</a>
                    </div>
                </div>
            </div>
        </section>

        @stack('modals')
        <!-- Styles -->
        <style>
            .bin-button {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                width: 30px;
                height: 30px;
                border-radius: 50%;
                background-color: #093564;
                cursor: pointer;
                border: 2px solid #093564;
                transition-duration: 0.3s;
                position: relative;
                overflow: hidden;
            }

            .bin-bottom {
                width: 15px;
                z-index: 2;
            }

            .bin-top {
                width: 17px;
                transform-origin: right;
                transition-duration: 0.3s;
                z-index: 2;
            }

            .bin-button:hover .bin-top {
                transform: rotate(45deg);
            }

            .bin-button:hover {
                background-color: #093564;
            }

            .bin-button:active {
                transform: scale(0.9);
            }

            .garbage {
                position: absolute;
                width: 14px;
                height: auto;
                z-index: 1;
                opacity: 0;
                transition: all 0.3s;
            }

            .bin-button:hover .garbage {
                animation: throw 0.4s linear;
            }

            @keyframes throw {
                from {
                    transform: translate(-400%, -700%);
                    opacity: 0;
                }

                to {
                    transform: translate(0%, 0%);
                    opacity: 1;
                }
            }

            /* Estilos para modo oscuro */
            .dark .bin-button {
                background-color: #EFFAEB;
                border-color: #EFFAEB;
            }

            .dark .bin-top line,
            .dark .bin-bottom path,
            .dark .garbage path {
                stroke: #1B3AB6;
                fill: #1B3AB6;
            }
        </style>
        @livewireScripts
        <script>
            var btnPago = document.getElementById('btn_pagar');
            var formPago = document.getElementById('form_pago');


            btnPago.addEventListener('click', function(event) {
                var direccionEnvio = document.getElementById('direccion_envio');
                var userDireccion = document.getElementById('user_direccion');
                var nombre = document.getElementById('user_nombre');
                var nombre_envio = document.getElementById('nombre_envio');
                event.preventDefault();
                direccionEnvio.value = userDireccion.value;
                nombre_envio.value = nombre.value;
                formPago.submit();
            });

            function cambiarLink(metodo) {
                let paypal = document.getElementById('paypal');
                let card = document.getElementById('card');
                let btnPago = document.getElementById('btn_pagar');
                let formPago = document.getElementById('form_pago');

                if (paypal.checked) {
                    btnPago.removeAttribute('disabled');
                    formPago.action = "/paypal-session";
                } else if (card.checked) {
                    btnPago.removeAttribute('disabled');
                    formPago.action = "/stripe-session";
                } else {
                    btnPago.setAttribute('disabled', true);
                }
            }

            function editarNombreYDireccion() {
                const nombre = document.getElementById('user_nombre');
                const direccion = document.getElementById('user_direccion');
                const boton = document.getElementById('boton_cambiar');
                const habilitado = !(nombre.disabled && direccion.disabled);
                const direccion_envio = document.getElementById('direccion_envio');
                const modoOscuro = document.body.classList.contains('dark');
                if (habilitado) {
                    boton.innerText = "Cambiar";
                    nombre.disabled = true;
                    direccion.disabled = true;
                    direccion.classList.add('border-none');
                    nombre.classList.add('border-none');
                    if (modoOscuro) {
                        direccion.classList.remove('border-white');
                        nombre.classList.remove('border-white');
                    } else if (!modoOscuro) {
                        direccion.classList.remove('border-blue-900');
                        nombre.classList.remove('border-blue-900');
                    }


                } else {
                    boton.innerText = "Ok";
                    nombre.disabled = false;
                    direccion.disabled = false;
                    nombre.classList.remove('border-none');
                    direccion.classList.remove('border-none');
                    if (modoOscuro) {
                        direccion.classList.add('border-white');
                        nombre.classList.add('border-white');
                    } else if (!modoOscuro) {
                        direccion.classList.add('border-blue-900');
                        nombre.classList.add('border-blue-900');
                    }
                }

            }
            // Dark mode initialization
            function inicializarDarkMode() {
                let currentTheme = localStorage.getItem('theme');

                if (currentTheme === null) {
                    localStorage.setItem('theme', 'light');
                } else {
                    if (currentTheme === 'dark') {
                        localStorage.setItem('theme', 'dark');
                        document.documentElement.classList.add('dark');
                    } else {
                        localStorage.setItem('theme', 'light');
                        document.documentElement.classList.remove('dark');
                    }
                }
            }
            window.onload = inicializarDarkMode;
        </script>
    </div>
