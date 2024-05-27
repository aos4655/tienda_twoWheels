<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- CDN FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

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
</head>

<body class="font-sans antialiased dark:bg-blue-950 bg-green-50 px-4 text-gray-600 ">
    <!-- Page Content -->

    <section
        class="h-screen flex justify-center items-center dark:bg-blue-900 bg-green-50 px-4 text-gray-600 antialiased">
        <div class="flex h-full w-3/4 flex-col justify-center">
            <!-- Table -->
            <div class="mx-auto py-7 w-full max-w-2xl rounded-3xl bg-white dark:bg-blue-800 shadow-lg">
                <header class="px-9 py-4">
                    <div class="font-extrabold text-3xl dark:text-white text-blue-900">Tu carrito</div>
                </header>

                <div class="p-3">
                    <table class="w-11/12 mx-auto table-auto">
                        <thead class="bg-green-50 text-xs font-semibold uppercase dark:text-blue-900-400">
                            <tr>
                                <th class="p-2">
                                    <div class="text-left font-semibold">Producto</div>
                                </th>
                                <th class="p-2">
                                    <div class="text-left font-semibold">Cantidad</div>
                                </th>
                                <th class="p-2">
                                    <div class="text-left font-semibold">Precio</div>
                                </th>
                                <th class="p-2">
                                    <div class="text-center font-semibold">Acción</div>
                                </th>
                            </tr>
                        </thead>

                        <tbody class="text-sm dark:text-white text-blue-900">
                            <!-- Loop through products -->
                            @foreach ($productosUsuario as $producto)
                                <tr>
                                    <td
                                        class="p-2 flex flex-row justify-start items-center border dark:border-green-50">
                                        <div>
                                            <img class="w-12 h-12" src="{{ Storage::url($producto->imagen) }}"
                                                alt="">
                                        </div>
                                        <div class="font-medium ml-4">{{ $producto->nombre }}</div>
                                    </td>
                                    <td class="p-2 border dark:border-green-50">
                                        <div class="text-center">{{ $producto->pivot->cantidad }}</div>
                                    </td>
                                    <td class="p-2 border dark:border-green-50">
                                        <div class="text-right w-24 font-medium">{{ $producto->precio }} €</div>
                                    </td>
                                    <td class="p-2 border dark:border-green-50">
                                        <div class="flex justify-center">
                                            <button class="bin-button" wire:click="eliminar({{ $producto->id }})">
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
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Total amount -->
                <div class="flex justify-end space-x-4 px-10 py-4 text-lg font-bold dark:text-white text-blue-900">
                    <div>Total</div>
                    <div>{{ str_replace('.', ',', $subtotal) }} €</div>
                </div>
                <div class="flex ml-9 w-full dark:text-white text-blue-950">
                    <div class="flex flex-col w-4/5">
                        <div class="flex justify-start ml-3 items-center">Entregando a
                            <input id="user_nombre" type="text" disabled class="ml-1 h-3 bg-transparent border-none"
                                value="{{ Auth::user()->name }}">
                        </div>
                        <div class="flex justify-start">
                            <input id="user_direccion" type="text" disabled
                                class="h-3 w-full bg-transparent border-none" value="{{ Auth::user()->direccion }}">
                        </div>
                    </div>
                    <div class="flex flex-col w-1/5 mr-10 mt-5 ">
                        <button id="boton_cambiar" onclick="editarNombreYDireccion()"
                            class=" italic font-extrabold text-lg text-blue-800 dark:text-green-50">Cambiar</button>
                    </div>
                </div>
                <div class="w-11/12 ml-7 my-4">
                    <hr class=" border-blue-800 dark:border-green-50">
                </div>
                <div class="w-11/12 ml-7 my-4 flex flex-row justify-center  items-center">
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
                } else if(!modoOscuro){
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
</body>

</html>
