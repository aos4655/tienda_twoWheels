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
        <div class="flex h-full flex-col justify-center">
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
                                                    <line stroke-width="4" stroke="white" y2="5"
                                                        x2="39" y1="5"></line>
                                                    <line stroke-width="3" stroke="white" y2="1.5"
                                                        x2="26.0357" y1="1.5" x1="12"></line>
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
                <div class="flex justify-end space-x-4 px-10 py-4 text-lg font-bold text-white">
                    <div>Total</div>
                    <div>{{ str_replace('.', ',', $subtotal) }} €</div>
                </div>

                <div class="flex justify-end">
                    <!-- Send this data to backend (note: use class 'hidden' to hide this input) -->
                    <input type="hidden" class="border border-black bg-gray-50" x-model="selected" />
                </div>
                <div class="flex flex-row-reverse text-white pb-3">
                    <form action="/session" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="rounded-full bg-blue-900 mx-6 p-2 w-20">Pagar</button>
                    </form>
                    <a href="{{ url()->previous() }}" class="rounded-full bg-red-600 p-2 w-20">Cancelar</a>
                </div>
            </div>
        </div>
    </section>

    @stack('modals')

    @livewireScripts
    <script>
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
