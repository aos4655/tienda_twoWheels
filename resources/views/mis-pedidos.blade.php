<x-app-layout>
    <x-principal-home>
        <div class="py-28 max-w-7xl md:min-h-[calc(100vh-280px)]  mx-auto sm:px-6 lg:px-8">
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
                                const iconosPendienteEnvio = document.querySelectorAll(`.icono-pendiente-envio-${pedidoId}`);
                                const iconosEntregado = document.querySelectorAll(`.icono-entregado-${pedidoId}`);
                                const iconosEnReparto = document.querySelectorAll(`.icono-en-reparto-${pedidoId}`);
                                const iconosEnviado = document.querySelectorAll(`.icono-enviado-${pedidoId}`);

                                const btnsCancelar = document.querySelectorAll(`.btn-cancelar-pedido-${pedidoId}`);
                                const btnsValorar = document.querySelectorAll(`.btn-pedido-${pedidoId}`);


                                elementos.forEach(elemento => {
                                    elemento.innerText = `${data.ult_estado} el día ${data[fecha[data.ult_estado]]}`;
                                });
                                if (data.ult_estado == "PENDIENTE DE ENVIO") {
                                    iconosPendienteEnvio.forEach(icono => {
                                        icono.removeAttribute('hidden');
                                    });
                                } else if (data.ult_estado == "ENVIADO") {
                                    btnsCancelar.forEach(btn => {
                                        btn.classList.remove('md:block');
                                        btn.classList.add('hidden');

                                    });

                                    iconosEnviado.forEach(icono => {
                                        icono.removeAttribute('hidden');
                                    });
                                } else if (data.ult_estado == "EN REPARTO") {
                                    btnsCancelar.forEach(btn => {
                                        btn.classList.remove('md:block');
                                        btn.classList.add('hidden');

                                    });

                                    iconosEnReparto.forEach(icono => {
                                        icono.removeAttribute('hidden');
                                    });
                                } else if (data.ult_estado == "ENTREGADO") {
                                    btnsCancelar.forEach(btn => {
                                        btn.classList.remove('md:block');
                                        btn.classList.add('hidden');

                                    });
                                    btnsValorar.forEach(btn => {
                                        btn.classList.remove('hidden');
                                        btn.classList.add('block');
                                    });
                                    iconosEntregado.forEach(icono => {
                                        icono.removeAttribute('hidden');
                                    });
                                }

                            }

                        } catch (error) {
                            console.error('Error al obtener el estado:', error);
                        }
                    };
                </script>

                @foreach ($pedidos as $pedido)
                    <div class="px-4 md:px-8 pb-8">
                        {{-- Para cada orden --}}
                        <div
                            class="flex flex-row justify-between border rounded-t-lg bg-[#EFFAEB] dark:bg-transparent   py-3">
                            <div class="flex flex-col md:w-3/4 w-11/12">
                                <dl class="flex flex-row text-blue-900 dark:text-green-50 ">
                                    <div class="md:mx-10 mx-auto">
                                        <dt class="font-extrabold"><span class="hidden md:block">Número</span> <span
                                                class="capitalize md:normal-case">pedido</span></dt>
                                        <dd class="text-gray-500 dark:text-white">{{ $pedido->id }}</dd>
                                    </div>
                                    <div class="mx-10 hidden md:block">
                                        <dt class="font-extrabold">Fecha</dt>
                                        <dd class="text-gray-500 dark:text-white">{{ $pedido->created_at }}</dd>
                                    </div>
                                    <div class="md:mx-10 mx-auto">
                                        <dt class="font-extrabold"><span class="hidden md:block">Total</span> <span
                                                class="capitalize  md:normal-case">pagado</span></dt>
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
                            <div class="justify-end md:mr-3 my-auto mx-8">
                                <div class="md:hidden flex flex-row space-x-2">
                                    <!-- BOTON DESCARGAR FACTURA -->
                                    <button class="flex flex-col  " onclick='descargarFactura({{ $pedido->id }})'>
                                        <i class="fa-solid fa-file-pdf fa-2xl text-[#093564] dark:text-white"></i>
                                    </button>
                                    <!-- BOTON CANCELAR PEDIDO -->
                                    @if ($pedido->estado === 'ACTIVO')
                                        <button class="flex flex-col btn-cancelar-pedido-{{ $pedido->id }}"
                                            onclick='cancelarPedido({{ $pedido->id }}, "{{ $pedido->track_num }}")'>
                                            <i class="fa-solid fa-xmark fa-2xl text-[#093564] dark:text-white"></i>
                                        </button>
                                    @endif
                                </div>
                                @if ($pedido->estado === 'ACTIVO')
                                    <!-- BOTON CANCELAR PEDIDO -->
                                    <button
                                        class="btn-cancelar-pedido-{{ $pedido->id }} text-white hidden md:block bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                                        onclick='cancelarPedido({{ $pedido->id }}, "{{ $pedido->track_num }}")'>
                                        Cancelar pedido
                                    </button>
                                @endif
                                <div class="button cursor-pointer hidden md:block"
                                    onclick='descargarFactura({{ $pedido->id }})'
                                    data-tooltip="Factura {{ $pedido->id }}">

                                    <div class="button-wrapper ">
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
                                                <img class="md:w-40 md:h-40 w-40 h-20"
                                                    src="{{ Storage::url($producto->imagen) }}"
                                                    alt="{{ $producto->nombre }}" class="rounded-lg">
                                            </div>
                                            <div class="ml-4 w-3/4">
                                                <div class="flex flex-col md:flex-row  justify-between">
                                                    <h5 class="font-extrabold text-lg text-blue-900 dark:text-green-50">
                                                        {{ $producto->nombre }}</h5>
                                                    <p class="dark:text-green-50">{{ $producto->precio }} €</p>
                                                </div>
                                                <p class="pt-3 text-gray-500 dark:text-white hidden md:block">
                                                    {{ $producto->descripcion }}
                                                </p>
                                            </div>
                                        </div>
                                        {{-- Parte2 --}}

                                        <div class="flex flex-col md:flex-row justify-between mt-3">
                                            <div class="flex flex-col md:flex-row items-center">
                                                <div class="flex flex-row ">

                                                    @if ($pedido->estado == 'CANCELADO')
                                                        <i class="fa-solid fa-ban text-red-700 dark:text-red-500"></i>
                                                        <p
                                                            class="mt-2 md:mt-0 ml-4 text-red-700 dark:text-red-500 font-bold">
                                                            CANCELADO el dia {{ $pedido->updated_at }}
                                                        </p>
                                                    @else
                                                        <i class="fa-solid my-auto fa-truck-ramp-box dark:text-white text-blue-900 icono-pendiente-envio-{{ $pedido->id }}"
                                                            hidden></i>
                                                        <i class="fa-solid my-auto fa-truck-fast dark:text-white text-blue-900  icono-enviado-{{ $pedido->id }}"
                                                            hidden></i>
                                                        <i class="fa-solid my-auto fa-dolly icono-en-reparto-{{ $pedido->id }} dark:text-white text-blue-900"
                                                            hidden></i>
                                                        <i class="fa-solid my-auto fa-circle-check dark:text-white text-blue-900 icono-entregado-{{ $pedido->id }}"
                                                            hidden></i>
                                                        <p
                                                            class="mt-2 md:mt-0 ml-4 text-gray-500 dark:text-white ultimoEstado_{{ $pedido->id }}">
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                            <hr class="md:hidden border-t-2 text-red-600 mt-2">
                                            <div class="flex flex-row items-center justify-center mt-2 md:mt-0">
                                                @php
                                                    $existeValoracion = App\Models\Valoracion::where(
                                                        'user_id',
                                                        '=',
                                                        $pedido->user_id,
                                                    )
                                                        ->where('pedido_id', '=', $pedido->id)
                                                        ->where('producto_id', '=', $producto->id)
                                                        ->first();
                                                @endphp
                                                @if (!$existeValoracion)
                                                    {{-- <script>
                                                        const puedeValorar = comprobarEstadoEntregado({{$pedido->id}}, {{$pedido->track_num}});
                                                        
                                                    </script> --}}

                                                    <!-- Modal toggle -->
                                                    <button
                                                        data-modal-target="modal-{{ $pedido->id }}-{{ $producto->id }}"
                                                        data-modal-toggle="modal-{{ $pedido->id }}-{{ $producto->id }}"
                                                        class="hidden text-blue-900 dark:text-white  
                                                        font-medium  text-base px-3 border-r-2 md:border-r-0 py-2.5 text-center btn-pedido-{{ $pedido->id }} "
                                                        type="button">
                                                        Valorar
                                                    </button>
                                                    <!-- Main modal -->
                                                    <div id="modal-{{ $pedido->id }}-{{ $producto->id }}"
                                                        tabindex="-1" aria-hidden="true" data-modal-backdrop="dynamic"
                                                        class="hidden overflow-y-scroll overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center 
                                                                items-center w-full md:inset-0 h-full max-h-full text-blue-900 dark:text-[#EFFAEB]">
                                                        <div class="relative p-4 w-full max-w-xl max-h-full">
                                                            <!-- Modal content -->
                                                            <div
                                                                class="relative  rounded-lg shadow dark:bg-blue-900 bg-[#EFFAEB]">
                                                                <!-- Modal header -->
                                                                <div
                                                                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                                    <h3 class="text-xl font-semibold ">
                                                                        Valoracion para {{ $producto->nombre }}
                                                                    </h3>
                                                                    <button type="button"
                                                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                                        data-modal-hide="modal-{{ $pedido->id }}-{{ $producto->id }}">
                                                                        <svg class="w-3 h-3" aria-hidden="true"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            fill="none" viewBox="0 0 14 14">
                                                                            <path stroke="currentColor"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                stroke-width="2"
                                                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                        </svg>
                                                                        <span class="sr-only">Cerrar modal</span>
                                                                    </button>
                                                                </div>
                                                                <!-- Modal body -->
                                                                <form action="{{ route('valorar.producto') }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="pedido_id"
                                                                        value="{{ $pedido->id }}">
                                                                    <input type="hidden" name="producto_id"
                                                                        value="{{ $producto->id }}">
                                                                    <div class="p-4 md:p-5 space-y-4 ">
                                                                        <div class="rating">
                                                                            <input value="5" name="rating"
                                                                                id="star5-{{ $pedido->id }}-{{ $producto->id }}"
                                                                                type="radio">
                                                                            <label
                                                                                for="star5-{{ $pedido->id }}-{{ $producto->id }}"></label>
                                                                            <input value="4" name="rating"
                                                                                id="star4-{{ $pedido->id }}-{{ $producto->id }}"
                                                                                type="radio">
                                                                            <label
                                                                                for="star4-{{ $pedido->id }}-{{ $producto->id }}"></label>
                                                                            <input value="3" name="rating"
                                                                                id="star3-{{ $pedido->id }}-{{ $producto->id }}"
                                                                                type="radio">
                                                                            <label
                                                                                for="star3-{{ $pedido->id }}-{{ $producto->id }}"></label>
                                                                            <input value="2" name="rating"
                                                                                id="star2-{{ $pedido->id }}-{{ $producto->id }}"
                                                                                type="radio">
                                                                            <label
                                                                                for="star2-{{ $pedido->id }}-{{ $producto->id }}"></label>
                                                                            <input value="1" name="rating"
                                                                                id="star1-{{ $pedido->id }}-{{ $producto->id }}"
                                                                                type="radio">
                                                                            <label
                                                                                for="star1-{{ $pedido->id }}-{{ $producto->id }}"></label>
                                                                        </div>
                                                                        <x-input-error for="rating"></x-input-error>
                                                                        <div class="flex flex-col">
                                                                            <label
                                                                                for="descripcion">Descripción:</label>
                                                                            <textarea class="resize-none rounded-lg  dark:bg-blue-800" name="descripcion" id="descripcion" cols="10"
                                                                                rows="4"></textarea>
                                                                        </div>
                                                                        <x-input-error
                                                                            for="descripcion"></x-input-error>

                                                                    </div>
                                                                    <!-- Modal footer -->
                                                                    <div
                                                                        class="flex flex-row-reverse items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                                        <button
                                                                            data-modal-hide="modal-{{ $pedido->id }}-{{ $producto->id }}"
                                                                            type="submit"
                                                                            class="text-white ml-2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                                            Enviar
                                                                        </button>
                                                                        <button
                                                                            data-modal-hide="modal-{{ $pedido->id }}-{{ $producto->id }}"
                                                                            type="button"
                                                                            class="py-2.5 px-5 ms-3 text-sm font-medium  focus:outline-none  rounded-lg border
                                                                           focus:z-10 focus:ring-4 
                                                                        focus:ring-red-700 bg-red-800 text-white  border-red-600 hover:text-white
                                                                        hover:bg-red-700">
                                                                            Cancelar
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif


                                                <a href="{{ route('productos.show', $producto->id) }}"
                                                    class="block text-blue-900 dark:text-white  
                                                    font-medium  text-base pr-3  py-2.5 text-center ">Ver
                                                    producto</a>
                                                <button
                                                    onclick="aniadirCarrito({{ Auth::user()->id }}, {{ $producto->id }})"
                                                    class="block text-blue-900 dark:text-white  
                                                    font-medium  text-base  border-l-2 md:border-l-0 text-center ">
                                                    Comprar de nuevo
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    @if ($pedido->estado == 'ACTIVO')
                        <script>
                            obtenerUltimoEstado('{{ $pedido->track_num }}', '{{ $pedido->id }}');
                        </script>
                    @endif
                @endforeach
            </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

            <script>
                function descargarFactura(id) {
                    fetch(`/pedido/pdf/${id}`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Error de conexion');
                            }
                            return response.blob();
                        })
                        .then(blob => {
                            const url = window.URL.createObjectURL(new Blob([blob]));
                            const a = document.createElement('a');
                            a.style.display = 'none';
                            a.href = url;
                            a.download = 'factura' + id + '.pdf';
                            document.body.appendChild(a);
                            a.click();
                            window.URL.revokeObjectURL(url);
                        })
                        .catch(error => {
                            console.error('Error al descargar PDF:', error);
                        });
                }
                const comprobarEstado = async (numTrack, pedidoId) => {
                    const url = `/api/logistica/${numTrack}`;
                    const response = await fetch(url);
                    const data = await response.json();
                    if (!data.ult_estado || data.ult_estado === undefined || data.ult_estado === "PENDIENTE DE ENVIO") {
                        return true;
                    }
                }
                const comprobarEstadoEntregado = async (numTrack, pedidoId) => {
                    const url = `/api/logistica/${numTrack}`;
                    const response = await fetch(url);
                    const data = await response.json();
                    if (data.ult_estado === "ENTREGADO") {
                        return true;
                    }
                }

                function cancelarPedido(id, numTrack) {
                    const puedeCancelar = comprobarEstado(id, numTrack);
                    if (!puedeCancelar) {
                        return;
                    }
                    Swal.fire({
                        title: "¿Estas seguro?",
                        text: "¡Este cambio no se podra revertir!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Si, ¡cancelalo!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch(`/cancelar-pedido/${id}`)
                                .then(response => {
                                    if (!response.ok) {
                                        throw new Error('Error de conexion');
                                    }
                                    location.reload();
                                })
                                .catch(error => {
                                    console.error('Error al cancelar pedido:', error);
                                });
                        }
                    });
                }
            </script>
        </div>
        <style>
            /* Estrellas valoracion */
            .rating {
                display: inline-block;
            }

            .rating input {
                display: none;
            }

            .rating label {
                float: right;
                cursor: pointer;
                color: #ccc;
                transition: color 0.3s;
            }
            .dark .rating label {
                float: right;
                cursor: pointer;
                color: #cccccc81;
                transition: color 0.3s;
            }

            .rating label:before {
                content: '\2605';
                font-size: 30px;
            }

            .rating input:checked~label,
            .rating label:hover,
            .rating label:hover~label {
                color: #093564;
                transition: color 0.3s;
            }

            .dark .rating input:checked~label,
            .dark .rating label:hover,
            .dark .rating label:hover~label {
                color: #ffffff;
                transition: color 0.3s;

            }

            /* ESTILOS BOTON DESCARGAR FACTURA */
            .button {
                --width: 100px;
                --height: 35px;
                --tooltip-height: 35px;
                --tooltip-width: 90px;
                --gap-between-tooltip-to-button: 18px;
                --button-color: #072342;
                --tooltip-color: #ffffff;
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


    </x-principal-home>
</x-app-layout>
