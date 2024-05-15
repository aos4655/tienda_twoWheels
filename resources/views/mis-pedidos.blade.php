<x-app-layout>

    <x-principal-home>
        <div class="py-28 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white h-fit dark:bg-blue-800 overflow-hidden  shadow-xl sm:rounded-3xl">
                <div class="px-8 py-8">
                    <h2 class="text-4xl font-extrabold dark:text-white text-blue-900">
                        Historial de pedidos</h2>
                    <p class="my-4 text-lg text-gray-500 dark:text-white">Aquí podrás ver la información detallada de
                        cada
                        pedido</p>
                </div>
                <script>
                    const fecha = {
                        'PENDIENTE DE ENVIO': 'pendiente_fecha',
                        'ENVIADO': 'enviado_fecha',
                        'EN REPARTO': 'en_reparto_fecha',
                        'ENTREGADO': 'entregado_fecha'
                    };

                    const obtenerUltimoEstado = async (numTrack, pedidoId) => {
                        const url = `/api/logistica/${numTrack}`;

                        try {
                            const response = await fetch(url);
                            const data = await response.json();
                            if (!data.ult_estado || data.ult_estado === undefined) {
                                const elementos = document.querySelectorAll(`.ultimoEstado_${pedidoId}`);
                                elementos.forEach(elemento => {
                                    elemento.innerText = "Procesando su pedido..";
                                });
                            } else {
                                const elementos = document.querySelectorAll(`.ultimoEstado_${pedidoId}`);
                                elementos.forEach(elemento => {
                                    elemento.innerText = `${data.ult_estado} el día ${data[fecha[data.ult_estado]]}`;
                                });
                            }

                        } catch (error) {
                            console.error('Error al obtener el estado:', error);
                        }
                    };
                </script>

                @foreach ($pedidos as $pedido)
                    <div class="px-8 pb-8">
                        {{-- Para cada orden --}}
                        <div
                            class="flex flex-row justify-between border rounded-t-lg bg-green-50 dark:bg-transparent   py-3">
                            <div class="flex flex-col w-3/4 ">
                                <dl class="flex flex-row text-blue-900 dark:text-green-50 ">
                                    <div class="mx-10">
                                        <dt class="font-extrabold">Número pedido</dt>
                                        <dd class="text-gray-500 dark:text-white">{{ $pedido->id }}</dd>
                                    </div>
                                    <div class="mx-10">
                                        <dt class="font-extrabold">Fecha</dt>
                                        <dd class="text-gray-500 dark:text-white">{{ $pedido->created_at }}</dd>
                                    </div>
                                    <div class="mx-10">
                                        <dt class="font-extrabold">Total pagado</dt>
                                        <dd>
                                            <?php
                                            $precioTotal = 0;
                                            foreach ($pedido->productos as $producto) {
                                                $precio = str_replace('.', '', $producto->precio);
                                                $precio = str_replace(',', '.', $precio);
                                                $precioTotal += (float) $precio;
                                            }
                                            echo str_replace('.', ',', $precioTotal);
                                            
                                            ?>
                                            €
                                        </dd>
                                    </div>
                                </dl>
                            </div>
                            <div class="justify-end mr-3 my-auto">
                                <!-- BOTON DESCARGAR FACTURA -->
                                <div class="button" onclick='descargarFactura({{ $pedido->id }})'
                                    data-tooltip="Factura {{ $pedido->id }}">
                                    <div class="button-wrapper">
                                        <div class="text">Factura</div>
                                        <span class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img"
                                                width="2em" height="2em" preserveAspectRatio="xMidYMid meet"
                                                viewBox="0 0 24 24">
                                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M12 15V3m0 12l-4-4m4 4l4-4M2 17l.621 2.485A2 2 0 0 0 4.561 21h14.878a2 2 0 0 0 1.94-1.515L22 17">
                                                </path>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Lista de productos de una orden --}}
                        <ul role="list" class="border rounded-b-lg border-gray-200 divide-y divide-gray-200">
                            @foreach ($pedido->productos as $producto)
                                <li class="flex flex-col">
                                    {{-- Parte1 --}}
                                    <div class="flex-row m-3 p-4">
                                        <div class="flex flex-row items-start">
                                            <div class="w-1/4 pl-4">
                                                <img class="w-40 h-40" src="{{ Storage::url($producto->imagen) }}"
                                                    alt="{{ $producto->nombre }}" class="rounded-lg">
                                            </div>
                                            <div class="ml-4 w-3/4">
                                                <div class="flex justify-between">
                                                    <h5 class="font-extrabold text-lg text-blue-900 dark:text-green-50">
                                                        {{ $producto->nombre }}</h5>
                                                    <p class="dark:text-green-50">{{ $producto->precio }} €</p>
                                                </div>
                                                <p class="pt-3 text-gray-500 dark:text-white">
                                                    {{ $producto->descripcion }}
                                                </p>
                                            </div>
                                        </div>
                                        {{-- Parte2 --}}
                                        <div class="justify-between flex flex-row mt-3">
                                            <div class="flex flex-row items-center">
                                                <svg class="icono" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" aria-hidden="true" class="w-8">
                                                    <path fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <p
                                                    class="ml-4 text-gray-500 dark:text-white ultimoEstado_{{ $pedido->id }}">
                                                </p>
                                            </div>
                                            <div class="flex flex-row items-center justify-center">
                                                <a href="{{ route('productos.show', $producto->id) }}" class="mr-4 dark:text-green-50">Ver producto</a>
                                                <button
                                                    onclick="aniadirCarrito({{ Auth::user()->id }}, {{ $producto->id }})"
                                                    class="text-blue-900 dark:text-green-50 relative overflow-hidden">
                                                    Comprar de nuevo
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <script>
                        obtenerUltimoEstado('{{ $pedido->track_num }}', '{{ $pedido->id }}');
                    </script>
                @endforeach
            </div>
        </div>
        <style>
            /* ESTILOS BOTON DESCARGAR FACTURA */
            .button {
                --width: 100px;
                --height: 35px;
                --tooltip-height: 35px;
                --tooltip-width: 90px;
                --gap-between-tooltip-to-button: 18px;
                --button-color: #072342;
                --tooltip-color: #95F8A0;
                width: var(--width);
                height: var(--height);
                background: var(--button-color);
                position: relative;
                text-align: center;
                border-radius: 0.45em;
                font-family: "Arial";
                transition: background 0.3s;
            }

            .button::before {
                position: absolute;
                content: attr(data-tooltip);
                width: var(--tooltip-width);
                height: var(--tooltip-height);
                background-color: var(--tooltip-color);
                font-size: 0.9rem;
                color: #111;
                border-radius: .25em;
                line-height: var(--tooltip-height);
                bottom: calc(var(--height) + var(--gap-between-tooltip-to-button) + 10px);
                left: calc(50% - var(--tooltip-width) / 2);
            }

            .button::after {
                position: absolute;
                content: '';
                width: 0;
                height: 0;
                border: 10px solid transparent;
                border-top-color: var(--tooltip-color);
                left: calc(50% - 10px);
                bottom: calc(100% + var(--gap-between-tooltip-to-button) - 10px);
            }

            .button::after,
            .button::before {
                opacity: 0;
                visibility: hidden;
                transition: all 0.5s;
            }

            .text {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .button-wrapper,
            .text,
            .icon {
                overflow: hidden;
                position: absolute;
                width: 100%;
                height: 100%;
                left: 0;
                color: #fff;
            }

            .text {
                top: 0
            }

            .text,
            .icon {
                transition: top 0.5s;
            }

            .icon {
                color: #fff;
                top: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .icon svg {
                width: 24px;
                height: 24px;
            }

            .button:hover {
                background: #093564;
            }

            .button:hover .text {
                top: -100%;
            }

            .button:hover .icon {
                top: 0;
            }

            .button:hover:before,
            .button:hover:after {
                opacity: 1;
                visibility: visible;
            }

            .button:hover:after {
                bottom: calc(var(--height) + var(--gap-between-tooltip-to-button) - 20px);
            }

            .button:hover:before {
                bottom: calc(var(--height) + var(--gap-between-tooltip-to-button));
            }
        </style>
        <script>
            /* No me convence esto */
            function icono() {
                const modoVisualizacion = document.documentElement.classList.contains('dark');

                // Seleccionar todos los elementos SVG con la clase 'icono'
                const iconos = document.querySelectorAll('.icono');

                // Iterar sobre cada elemento SVG y actualizar el color según el modo de visualización
                iconos.forEach(iconSvg => {
                    if (modoVisualizacion) {
                        iconSvg.setAttribute('fill', '#EFFAEB'); // Modo oscuro
                    } else {
                        iconSvg.setAttribute('fill', '#093564'); // Modo claro
                    }
                });
            }

            // Llamar a la función 'icono()' cuando se carga completamente la página
            document.addEventListener('DOMContentLoaded', icono);

            // Observador de atributos para detectar cambios en las clases de 'documentElement' (html)
            const observer = new MutationObserver(icono);
            observer.observe(document.documentElement, {
                attributes: true, // Observar cambios en los atributos
                attributeFilter: ['class'] // Filtrar cambios solo en la clase
            });
            function descargarFactura(id){
                fetch(`/pedido/pdf/${id}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.blob();
                })
                .then(blob => {
                    const url = window.URL.createObjectURL(new Blob([blob]));
                    const a = document.createElement('a');
                    a.style.display = 'none';
                    a.href = url;
                    a.download = 'factura'+id+'.pdf';
                    document.body.appendChild(a);
                    a.click();
                    window.URL.revokeObjectURL(url);
                })
                .catch(error => {
                    console.error('Error al descargar PDF:', error);
                });
            }
            
        </script>
    </x-principal-home>
</x-app-layout>
