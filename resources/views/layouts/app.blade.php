<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- CDN SWEETALERT2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- CDN FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CDN HTML-TO-IMAGE -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html-to-image/1.9.0/html-to-image.min.js"></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @if (!request()->is('checkout'))
            @livewire('navigation-menu')
        @endif
        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main class="dark:bg-blue-900  bg-[#EFFAEB]">
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts

    @if (session('mensaje-success'))
        <script>
            const modoOscuro = document.querySelector('html').classList.contains('dark');
            Swal.fire({
                icon: 'success',
                title: "{{ session('mensaje-success') }}",
                showConfirmButton: false,
                timer: 2500,
                toast: true,
                position: 'bottom-end',
                background: (modoOscuro ? '#072342' : '#EFFAEB'),
                color: (modoOscuro ? '#EFFAEB' : '#072342'),
                timerProgressBar: true,
                customClass: {
                    popup: 'rounded-lg shadow-lg',
                    icon: 'text-green-500 text-3xl',
                }
            });
        </script>
    @endif

    @if (session('mensaje-fail'))
        <script>
            const modoOscuro = document.querySelector('html').classList.contains('dark');
            Swal.fire({
                icon: 'error',
                title: "{{ session('mensaje-fail') }}",
                showConfirmButton: false,
                timer: 2500,
                toast: true,
                position: 'bottom-end',
                background: (modoOscuro ? '#072342' : '#EFFAEB'),
                color: (modoOscuro ? '#EFFAEB' : '#072342'),
                timerProgressBar: true,
                customClass: {
                    popup: 'rounded-lg shadow-lg',
                    icon: 'text-red-500 text-3xl',
                }
            });
        </script>
    @endif
    <script>
        function descargarqr() {
            var node = document.getElementById('qr');
            const producto_id = document.getElementById('descargar-btn').getAttribute('data-producto-id')
            htmlToImage.toPng(node)
                .then(function(dataUrl) {
                    function download(url, filename) {
                        var a = document.createElement('a');
                        a.href = url;
                        a.download = filename;
                        document.body.appendChild(a);
                        a.click();
                        document.body.removeChild(a);
                    }
                    download(dataUrl, 'qr_producto_' + producto_id + '.png');
                    window.close();

                })
                .catch(function(error) {
                    console.error('Error al convertir a PNG:', error);
                });

        }
        /* Hay dos setTimeOut para obligar al dom a que actualice */
        Livewire.on('mensajeMostrado', () => {
            var mensajeMostrado = document.getElementById('mensajeMostrado');
            setTimeout(() => {
                mensajeMostrado.innerText = "Guardado.";
            }, 1);
            setTimeout(() => {
                mensajeMostrado.innerText = "";
            }, 3000);

        });
        Livewire.on('mensaje-success', txt => {
            const modoOscuro = document.querySelector('html').classList.contains('dark');
            Swal.fire({
                icon: 'success',
                title: txt,
                showConfirmButton: false,
                timer: 2500,
                toast: true,
                position: 'bottom-end',
                background: (modoOscuro ? '#072342' : '#EFFAEB'),
                color: (modoOscuro ? '#EFFAEB' : '#072342'),
                timerProgressBar: true,
                customClass: {
                    popup: 'rounded-lg shadow-lg',
                    icon: 'text-green-500 text-3xl',
                }
            });
        });
        Livewire.on('confirmacionBorrarProducto', productId => {
            Swal.fire({
                title: "¿Estas seguro?",
                text: "¡Este cambio no se podra revertir!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, ¡elimínalo!"
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatchTo("show-products", "borrarOk", productId)
                }
            });
        });
        /* dark mode se debe inicializar aqui ya que si no en caso de duplicar pestania 
                o lo que sea no se aplica el tema bien  */
        function inicializarDarkMode() {
            //Guardamos en localStorage la variable theme e iremos cambiandola. 
            //Si no existe la pondremos en modo claro
            //Obtenemos los iconos para ir mostrando/ocultando segun interes
            let currentTheme = localStorage.getItem('theme');
            let iconoDarkMode = document.getElementById('ip-darkmode');

            if (window.location.pathname != '/checkout') {
                var iconoCarrito = document.getElementById('icon-cart');
            }

            if (currentTheme === null) {
                localStorage.setItem('theme', 'ligth');
            } else {
                if (currentTheme === 'dark') {
                    localStorage.setItem('theme', 'dark');
                    if (window.location.pathname !== '/checkout') {
                        iconoDarkMode.checked = true;
                        if (iconoCarrito) {
                            iconoCarrito.setAttribute('style', 'color: white');
                        }
                    }

                    document.documentElement.classList.add('dark');
                } else {
                    localStorage.setItem('theme', 'ligth');
                    if (window.location.pathname !== '/checkout') {
                        iconoDarkMode.checked = false;
                        if (iconoCarrito) {
                            iconoCarrito.setAttribute('style', 'color: black');
                        }
                    }

                    document.documentElement.classList.remove('dark');
                }
            }

        }

        window.onload = inicializarDarkMode;
    </script>

</body>

</html>
