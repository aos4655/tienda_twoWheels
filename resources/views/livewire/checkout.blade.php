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
</head>

<body class="font-sans antialiased ">
    <!-- Page Content -->

    <section class="h-screen dark:bg-blue-900  bg-green-50 px-4 text-gray-600 antialiased">
        <div class="flex h-full flex-col justify-center">
            <!-- Table -->
            <div class="mx-auto py-7 w-full max-w-2xl rounded-3xl   dark:bg-blue-800 shadow-lg">
                <header class="px-9 py-4">
                    <div class="font-extrabold text-3xl text-white">Tu carrito</div>
                </header>

                <div class=" p-3">
                    <table class="w-11/12 mx-auto table-auto  ">
                        <thead class="bg-gray-50 text-xs font-semibold uppercase dark:text-blue-900-400">
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

                        <tbody class=" text-sm text-white">
                            <!-- record 1 -->
                            @foreach ($productosUsuario as $producto)
                                <tr>
                                    <td
                                        class="p-2 flex flex-row justify-start items-center border dark:border-green-50">
                                        <div>
                                            <img class="w-12 h-12" src="{{ Storage::url($producto->imagen) }}"
                                                alt="">
                                        </div>
                                        <div class="font-medium ml-4 ">{{ $producto->nombre }}</div>
                                    </td>
                                    <td class="p-2 border dark:border-green-50 ">
                                        <div class="text-center">{{ $producto->pivot->cantidad }}</div>
                                    </td>
                                    <td class="p-2 border dark:border-green-50">
                                        <div class="text-right w-24 font-medium "> {{ $producto->precio }} €</div>
                                    </td>
                                    <td class="p-2 border dark:border-green-50">
                                        <div class="flex justify-center">
                                            <button wire:click="eliminar({{ $producto->id }})">
                                                <svg class="h-8 w-8 rounded-full p-1 hover:bg-red-100 hover:text-purple-600 bg-gray-100 text-blue-600"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
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

                <!-- total amount -->
                <div class="flex justify-end space-x-4  px-10 py-4 text-lg font-bold text-white">
                    <div>Total</div>
                    <div>{{ $subtotal }} €</div>
                </div>

                <div class="flex justify-end">
                    <!-- send this data to backend (note: use class 'hidden' to hide this input) -->
                    <input type="hidden" class="border border-black bg-gray-50" x-model="selected" />
                </div>
                <div class="flex flex-row-reverse text-white pb-3">
                    <form action="/session" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="rounded-full bg-blue-900 mx-6 p-2 w-20 ">Pagar</button>
                    </form>
                    <a href="{{ url()->previous() }}" class="rounded-full bg-red-600 p-2 w-20">Cancelar</a>
                </div>
            </div>
        </div>
    </section>

    @stack('modals')

    @livewireScripts
    <script>
        /* dark mode se debe inicializar aqui ya que si no en caso de duplicar pestania 
                                                            o lo que sea no se aplica el tema bien  */
        function inicializarDarkMode() {
            //Guardamos en localStorage la variable theme e iremos cambiandola. 
            //Si no existe la pondremos en modo claro
            //Obtenemos los iconos para ir mostrando/ocultando segun interes
            let currentTheme = localStorage.getItem('theme');
            console.log(currentTheme);


            if (currentTheme === null) {
                localStorage.setItem('theme', 'ligth');
            } else {
                if (currentTheme === 'dark') {
                    localStorage.setItem('theme', 'dark');

                    document.documentElement.classList.add('dark');
                } else {
                    localStorage.setItem('theme', 'ligth');

                    document.documentElement.classList.remove('dark');
                }
            }

        }
        window.onload = inicializarDarkMode;
    </script>
</body>

</html>
