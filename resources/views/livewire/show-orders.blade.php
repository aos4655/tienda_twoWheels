<div>
    <x-plantilla-admin>
        <h2 class="md:hidden  text-center font-semibold text-2xl text-blue-900 dark:text-white mb-5">
            PEDIDOS
        </h2>
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div
                class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 py-4 bg-white dark:bg-gray-900">
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative ms-5">
                    <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <x-input
                        class=" pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Buscar..." type="search" wire:model.live="search"></x-input>
                </div>
            </div>
            @if (!$pedidos->count())
                <h1
                    class="mb-4 text-4xl mt-6 font-extrabold text-center leading-none tracking-tight text-red-600 md:text-5xl lg:text-6xl dark:text-white">
                    No hay resultados 😭</h1>
            @else
                <table class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead
                        class="block md:table-header-group text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr
                            class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                            <th class="p-2  font-bold md:border md:border-none block md:table-cell cursor-pointer"
                                wire:click="ordenar('id')">
                                Num pedido
                            </th>
                            <th class="p-2  font-bold md:border md:border-none block md:table-cell">
                                Nombre Usuario
                            </th>
                            <th class="p-2  font-bold md:border md:border-none block md:table-cell">
                                Num Seguimiento
                            </th>
                            <th class="p-2  font-bold md:border md:border-none block md:table-cell">
                                Estado
                            </th>
                            <th class="p-2  font-bold md:border md:border-none block md:table-cell">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="block md:table-row-group">
                        @foreach ($pedidos as $pedido)
                            <tr class=" border-b-2 md:border-none block md:table-row ml-5">
                                <td
                                    class="p-2 ml-8 md:border md:border-none text-left md:text-center  block md:table-cell">
                                    <span class="inline-block w-1/3 md:hidden font-bold">Numero Pedido </span>
                                    {{ $pedido->id }}

                                </td>
                                <td
                                    class="p-2 ml-8 md:border md:border-none text-left md:text-center block md:table-cell">
                                    <span class="inline-block w-1/3 md:hidden font-bold">Nombre</span>
                                    {{ $pedido->user->name }}
                                </td>
                                <td
                                    class="p-2 ml-8 md:border md:border-none text-left md:text-center block md:table-cell">
                                    <span class="inline-block w-1/3 md:hidden font-bold">Numero Seguimiento</span>
                                    {{ $pedido->track_num }}

                                </td>
                                <td
                                    class="p-2 ml-8 md:border md:border-none text-left md:text-center block md:table-cell">
                                    <span class="inline-block w-1/3 md:hidden font-bold">Estado</span>
                                    <div class="font-normal inline-block text-gray-500"
                                        id="ult_estado_{{ $pedido->id }}">
                                        <!-- Modal toggle -->
                                        <button class="seguimiento-btn font-medium text-blue-600 hover:underline ms-3"
                                            data-pedido-track="{{ $pedido->track_num }}">
                                            <i class="fa-solid fa-location-arrow"></i>
                                        </button>
                                    </div>
                                </td>
                                <td
                                    class="p-2 ml-8 md:border md:border-none text-left md:text-center block md:table-cell">
                                    <span class="inline-block w-1/3 md:hidden font-bold">Acción</span>
                                    <!-- Menú desplegable -->
                                    <div class="dropdown-container">
                                        <!-- Botón para abrir el dropdown -->
                                        <button id="dropdownActionButton"
                                            onclick="toggleDropdown('{{ $pedido->id }}')"
                                            class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-centerdark:bg-gray-800 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                                            type="button">
                                            Acción
                                            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                            </svg>
                                        </button>

                                        <!-- Menú desplegable -->
                                        <div id="dropdownAction_{{ $pedido->id }}"
                                            class="dropdown-menu z-10 hidden bg-white  rounded-lg shadow dark:bg-gray-700">
                                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                                aria-labelledby="dropdownActionButton">
                                                <li>
                                                    <!-- Acción de editar usuario -->
                                                    <button wire:click="edit({{ $pedido->id }})"
                                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                        <p class="text-red-800 ">Editar</p>
                                                    </button>
                                                </li>
                                                <!-- Acción de eliminar usuario -->
                                                <li>
                                                    <button wire:click="pedirConfirmacion('{{ $pedido->id }}')"
                                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                        <p class="text-blue-800 ">Eliminar</p>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            @endif

            <!-- Seguimiento modal -->
            <div id="seguimiento-modal" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed z-50 inset-0  justify-center items-center top-1/2 md:left-1/2 transform md;-translate-x-1/4 -translate-y-1/2">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div
                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Seguimiento
                            </h3>
                            <button type="button" id="seguimiento-modal-close-btn"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5">
                            {{-- Aqui deberia ir icono de cargando dureante un par desegundos --}}
                            <div id="load_seguimiento"></div>

                            <ol id="lista_seguimiento"
                                class="relative border-s border-gray-200 dark:border-gray-600 ms-3.5 mb-4 md:mb-5"
                                hidden>
                                <li class="mb-10 ms-8" id="lista_entregado">
                                    <span
                                        class="absolute flex items-center justify-center w-6 h-6 bg-gray-100 rounded-full -start-3.5 ring-8 ring-white dark:ring-gray-700 dark:bg-gray-600">
                                        <svg class="h-4 w-4 text-gray-500" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <circle cx="7" cy="17" r="2" />
                                            <circle cx="17" cy="17" r="2" />
                                            <path d="M5 17h-2v-4m-1 -8h11v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5" />
                                            <line x1="3" y1="9" x2="7" y2="9" />
                                        </svg>
                                    </span>
                                    <h3
                                        class="flex items-start mb-1 text-lg font-semibold text-gray-900 dark:text-white">
                                        Entregado <span id="span_entregado"
                                            class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 ms-3">Latest</span>
                                    </h3>
                                    <time id="time_entregado"
                                        class="block mb-3 text-sm font-normal leading-none text-gray-500 dark:text-gray-400"></time>
                                </li>
                                <li class="mb-10 ms-8" id="lista_en_reparto">
                                    <span
                                        class="absolute flex items-center justify-center w-6 h-6 bg-gray-100 rounded-full -start-3.5 ring-8 ring-white dark:ring-gray-700 dark:bg-gray-600">

                                        <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1"
                                            viewBox="0 0 24 24" width="14" height="14" stroke="#747D8B"
                                            stroke-width="1.5" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path fill="#747D8B"
                                                d="M20.5,17c-.17,0-.337,.012-.5,.036V4.5c0-1.93,1.57-3.5,3.5-3.5,.276,0,.5-.224,.5-.5s-.224-.5-.5-.5c-2.481,0-4.5,2.019-4.5,4.5v12.634l-4.82,1.522c.198-.522,.223-1.114,.03-1.682l-1.63-5.231c-.418-1.312-1.824-2.04-3.141-1.624l-6.696,2.13c-1.295,.412-2.029,1.806-1.636,3.108l1.662,5.436c.176,.493,.495,.898,.893,1.184l-3.313,1.046c-.264,.083-.409,.364-.326,.627,.067,.213,.264,.35,.477,.35,.05,0,.101-.007,.15-.023l16.883-5.331c-.338,.538-.533,1.174-.533,1.855,0,1.93,1.57,3.5,3.5,3.5s3.5-1.57,3.5-3.5-1.57-3.5-3.5-3.5ZM3.719,20.479l-1.654-5.413c-.236-.781,.204-1.618,.981-1.865l6.696-2.13c.151-.048,.304-.071,.454-.071,.636,0,1.228,.407,1.43,1.042l1.631,5.234,.004,.012c.268,.783-.152,1.637-.928,1.901l-5.542,1.798-1.38,.436c-.714,.138-1.449-.263-1.692-.946Zm16.781,2.521c-1.379,0-2.5-1.122-2.5-2.5s1.121-2.5,2.5-2.5,2.5,1.122,2.5,2.5-1.121,2.5-2.5,2.5ZM6.148,15.748c-.05,.016-.102,.023-.151,.023-.212,0-.409-.136-.477-.349-.084-.263,.062-.544,.325-.628l2.465-.784c.262-.083,.545,.062,.628,.325,.084,.263-.062,.544-.325,.628l-2.465,.784Z" />
                                        </svg>


                                    </span>
                                    <h3 class="mb-1 text-lg font-semibold text-gray-900 dark:text-white">En Reparto
                                        <span id="span_en_reparto"
                                            class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 ms-3">Latest</span>
                                    </h3>
                                    <time id="time_en_reparto"
                                        class="block mb-3 text-sm font-normal leading-none text-gray-500 dark:text-gray-400"></time>
                                </li>
                                <li class="mb-10 ms-8" id="lista_enviado">
                                    <span
                                        class="absolute flex items-center justify-center w-6 h-6 bg-gray-100 rounded-full -start-3.5 ring-8 ring-white dark:ring-gray-700 dark:bg-gray-600">
                                        <svg class="h-4 w-4 text-gray-500" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <path d="M15 12h5a2 2 0 0 1 0 4h-15l-3 -6h3l2 2h3l-2 -7h3z"
                                                transform="rotate(-15 12 12) translate(0 -1)" />
                                            <line x1="3" y1="21" x2="21" y2="21" />
                                        </svg>
                                    </span>
                                    <h3 class="mb-1 text-lg font-semibold text-gray-900 dark:text-white">Enviado
                                        <span id="span_enviado"
                                            class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 ms-3">Latest</span>
                                    </h3>
                                    <time id="time_enviado"
                                        class="block mb-3 text-sm font-normal leading-none text-gray-500 dark:text-gray-400"></time>
                                </li>
                                <li class="ms-8" id="lista_pendiente_envio">
                                    <span
                                        class="absolute flex items-center justify-center w-6 h-6 bg-gray-100 rounded-full -start-3.5 ring-8 ring-white dark:ring-gray-700 dark:bg-gray-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 100 100"
                                            viewBox="0 0 100 100" id="food-delivery" width="17" height="17"
                                            stroke="#747D8B" stroke-width="2" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path fill="#747D8B"
                                                d="M38,41h24c3.3,0,6-2.7,6-6v-6V19c0-6.6-5.4-12-12-12H44c-6.6,0-12,5.4-12,12v10v6C32,38.3,34.7,41,38,41z M64,27H36v-6h28 V27z M64,35c0,1.1-0.9,2-2,2H38c-1.1,0-2-0.9-2-2v-4h28V35z M44,11h12c3.7,0,6.9,2.6,7.7,6H36.3C37.1,13.6,40.3,11,44,11z M91.8,48.2c-0.3-0.7-1-1.2-1.8-1.2H66c-0.6,0-1.2,0.3-1.5,0.7L55.1,59H44.9l-9.4-11.3C35.2,47.3,34.6,47,34,47H10 c-0.8,0-1.5,0.4-1.8,1.2c-0.3,0.7-0.2,1.5,0.3,2.1L18,61.7V91c0,1.1,0.9,2,2,2h36h24c1.1,0,2-0.9,2-2V61.7l9.5-11.4 C92,49.7,92.1,48.9,91.8,48.2z M33.1,51l6.7,8H20.9l-6.7-8H33.1z M22,63h22h10v26H22V63z M78,89H58V63h20V89z M79.1,59H60.3l6.7-8 h18.8L79.1,59z">
                                            </path>
                                        </svg>

                                    </span>
                                    <h3 class="mb-1 text-lg font-semibold text-gray-900 dark:text-white">Pendiente de
                                        envio
                                        <span id="span_pendiente_envio"
                                            class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 ms-3">Latest</span>
                                    </h3>
                                    <time id="time_pendiente_envio"
                                        class="block mb-3 text-sm font-normal leading-none text-gray-500 dark:text-gray-400"></time>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            @isset($form->producto)
                <x-dialog-modal wire:model='abrirModalUpdate'>
                    <x-slot name="title">
                        EDITAR PRODUCTO
                    </x-slot>
                    <x-slot name="content">
                        <!-- PINTO EL FORMULARIO -->
                        <x-label for="nombre">Nombre</x-label>
                        <x-input id="nombre" wire:model="form.nombre" class="w-full mb-2"></x-input>
                        <x-input-error for="form.nombre"></x-input-error>

                        <x-label for="descripcion">Descripcion</x-label>
                        <textarea id="descripcion" type="descripcion" rows="6" wire:model="form.descripcion" class="w-full mb-2"></textarea>
                        <x-input-error for="form.descripcion"></x-input-error>

                        <x-label for="stock">Stock</x-label>
                        <x-input id="stock" wire:model="form.stock" class="w-full mb-2"></x-input>
                        <x-input-error for="form.stock"></x-input-error>

                        <x-label for="precio">Precio</x-label>
                        <x-input id="precio" wire:model="form.precio" class="w-full mb-2"></x-input>
                        <x-input-error for="form.precio"></x-input-error>

                        <x-label for="categoria">Categoria</x-label>
                        <x-input id="categoria" wire:model="form.categoria" class="w-full mb-2"></x-input>
                        <x-input-error for="form.categoria"></x-input-error>

                    </x-slot>
                    <x-slot name="footer">
                        <div class="flex flex-row-reverse">
                            <button wire:click="update" wire:loading.attr='disabled'
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                <i class="fas fa-editar"></i> EDITAR
                            </button>
                            <button wire:click="limpiarCerrarUpdate"
                                class="mr-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                <i class="fas fa-xmark"></i> CANCELAR</button>
                        </div>
                    </x-slot>
                </x-dialog-modal>
            @endisset
        </div>
        <style>
            /* Estilo para el dropdown */
            .dropdown-container {
                position: relative;
                display: inline-block;
            }

            .dropdown-menu {
                position: absolute;
                top: calc(100% + 5px);
                /* Ajusta la posición del dropdown */
                left: 0;
                z-index: 1000;
                /* Asegura que el dropdown esté sobre otros elementos */
                background-color: #fff;
                border: 1px solid #e5e7eb;
                border-radius: 0.5rem;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
                padding: 0.5rem;
            }

            /* Estilos para el boton de cargando */
            #load_seguimiento {
                border: 8px solid #f3f3f3;
                border-top: 8px solid #3498db;
                border-radius: 50%;
                margin: auto;
                width: 30px;
                height: 30px;
                animation: spin 1s linear infinite;
            }

            @keyframes spin {
                0% {
                    transform: rotate(0deg);
                }

                100% {
                    transform: rotate(360deg);
                }
            }
        </style>
        <script>
            // Función para cerrar todos los dropdowns abiertos excepto el actual
            function closeAllDropdownsExcept(id) {
                var dropdowns = document.querySelectorAll('.dropdown-menu');
                dropdowns.forEach(function(dropdown) {
                    if (dropdown.id !== 'dropdownAction_' + id) {
                        dropdown.classList.add('hidden');
                    }
                });
            }

            // Función para mostrar u ocultar el dropdown correspondiente
            function toggleDropdown(pedidoId) {
                closeAllDropdownsExcept(pedidoId);
                var dropdown = document.getElementById('dropdownAction_' + pedidoId);
                dropdown.classList.toggle('hidden');
            }

            document.addEventListener('DOMContentLoaded', function() {
                const modalSeguimiento = document.getElementById('seguimiento-modal');
                const seguimientoButtons = document.querySelectorAll('.seguimiento-btn');
                const seguimientoModalCloseBtn = document.getElementById('seguimiento-modal-close-btn');

                seguimientoButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        modalSeguimiento.classList.remove('hidden');
                        const num_seguimiento = this.getAttribute('data-pedido-track');

                        cargando();
                        if (num_seguimiento !== null) {
                            fetch(`api/logistica/${num_seguimiento}`)
                                .then(response => response.json())
                                .then(seguimiento => {
                                    const lista_pendiente_envio = document
                                        .getElementById('lista_pendiente_envio');
                                    const lista_enviado = document.getElementById(
                                        'lista_enviado');
                                    const lista_en_reparto = document.getElementById(
                                        'lista_en_reparto');
                                    const lista_entregado = document.getElementById(
                                        'lista_entregado');

                                    const time_pendiente_envio = document
                                        .getElementById('time_pendiente_envio');
                                    const time_enviado = document.getElementById(
                                        'time_enviado');
                                    const time_en_reparto = document.getElementById(
                                        'time_en_reparto');
                                    const time_entregado = document.getElementById(
                                        'time_entregado');

                                    const span_entregado = document.getElementById(
                                        'span_entregado');
                                    const span_en_reparto = document.getElementById(
                                        'span_en_reparto');
                                    const span_enviado = document.getElementById('span_enviado');
                                    const span_pendiente_envio = document.getElementById(
                                        'span_pendiente_envio');

                                    if (seguimiento.ult_estado == "ENTREGADO") {
                                        span_entregado.hidden = false;
                                        span_en_reparto.hidden = true;
                                        span_enviado.hidden = true;
                                        span_pendiente_envio.hidden = true;

                                        lista_entregado.hidden = false;
                                        lista_en_reparto.hidden = false;
                                        lista_enviado.hidden = false;

                                        time_pendiente_envio.textContent =
                                            "Released on " + seguimiento
                                            .pendiente_fecha;
                                        time_enviado.textContent = "Released on " +
                                            seguimiento.enviado_fecha;
                                        time_en_reparto.textContent = "Released on " +
                                            seguimiento.en_reparto_fecha;
                                        time_entregado.textContent = "Released on " +
                                            seguimiento.entregado_fecha;
                                    } else if (seguimiento.ult_estado == "EN REPARTO") {
                                        span_entregado.hidden = true;
                                        span_en_reparto.hidden = false;
                                        span_enviado.hidden = true;
                                        span_pendiente_envio.hidden = true;

                                        lista_entregado.hidden = true;
                                        lista_en_reparto.hidden = false;
                                        lista_enviado.hidden = false;

                                        time_pendiente_envio.textContent =
                                            "Released on " + seguimiento
                                            .pendiente_fecha;
                                        time_enviado.textContent = "Released on " +
                                            seguimiento.enviado_fecha;
                                        time_en_reparto.textContent = "Released on " +
                                            seguimiento.en_reparto_fecha;
                                    } else if (seguimiento.ult_estado == "ENVIADO") {
                                        span_entregado.hidden = true;
                                        span_en_reparto.hidden = true;
                                        span_enviado.hidden = false;
                                        span_pendiente_envio.hidden = true;

                                        lista_entregado.hidden = true;
                                        lista_en_reparto.hidden = true;
                                        lista_enviado.hidden = false;

                                        time_enviado.textContent = "Released on " +
                                            seguimiento.enviado_fecha;
                                        time_pendiente_envio.textContent =
                                            "Released on " + seguimiento
                                            .pendiente_fecha;
                                    } else {
                                        span_entregado.hidden = true;
                                        span_en_reparto.hidden = true;
                                        span_enviado.hidden = true;
                                        span_pendiente_envio.hidden = false;

                                        lista_entregado.hidden = true;
                                        lista_en_reparto.hidden = true;
                                        lista_enviado.hidden = true;

                                        time_pendiente_envio.textContent =
                                            "Released on " + seguimiento
                                            .pendiente_fecha;
                                    }

                                })
                                .catch(error => console.error('Error al obtener seguimiento:', error));
                        } else {
                            console.error('El data-pedido-track no está definido en el botón.');
                        }
                    });
                });

                seguimientoModalCloseBtn.addEventListener('click', function() {
                    modalSeguimiento.classList.add('hidden');
                });

            });

            function cargando() {
                const load_seguimiento = document.getElementById('load_seguimiento');
                const lista_seguimiento = document.getElementById('lista_seguimiento');
                load_seguimiento.hidden = false;
                lista_seguimiento.hidden = true;

                setTimeout(function() {
                    load_seguimiento.hidden = true;
                    lista_seguimiento.hidden = false;
                }, 1500);
            }
        </script>
    </x-plantilla-admin>

</div>
