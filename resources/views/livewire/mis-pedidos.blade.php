<x-principal-home>
    <div class="py-28 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white h-fit dark:bg-blue-800 overflow-hidden  shadow-xl sm:rounded-3xl">
            <div class="px-8 py-8">
                <h2 class="text-4xl font-extrabold dark:text-white text-blue-900">
                    Historial de pedidos</h2>
                <p class="my-4 text-lg text-gray-500 dark:text-white">Aquí podrás ver la información detallada de cada
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
                                    <dd>$160.00</dd>
                                </div>
                            </dl>
                        </div>
                        <div class="justify-end">
                            <!-- More... -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="w-8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z">
                                </path>
                            </svg>
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
                                            <svg class="icono" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                aria-hidden="true" class="w-8">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <p
                                                class="ml-4 text-gray-500 dark:text-white ultimoEstado_{{ $pedido->id }}">
                                            </p>
                                        </div>
                                        <div class="flex flex-row items-center justify-center">
                                            <div class="mr-4 dark:text-green-50">View product</div>
                                            <button
                                                onclick="aniadirCarrito({{ Auth::user()->id }}, {{ $producto->id }})"
                                                class="text-blue-900 dark:text-green-50 relative overflow-hidden">
                                                Buy Again
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
    </script>
</x-principal-home>
