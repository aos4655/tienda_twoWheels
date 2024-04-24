<div>
    <x-plantilla-admin>
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
                        class="w-3/4 pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Buscar..." type="search" wire:model.live="search"></x-input>
                </div>
            </div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="ordenar('id')">
                            Num pedido
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nombre Usuario
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Num Seguimiento
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Estado
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedidos as $pedido)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4">
                                <div class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $pedido->id }}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $pedido->user->name }}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="font-normal text-gray-500">
                                        {{ $pedido->track_num }}
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="font-normal text-gray-500" id="ult_estado_{{ $pedido->id }}">
                                        {{-- ESTO PETA DE VEZ EN CUANDO POR TOO MANY REQUEST, SE DEBE BUSCAR ALTERNATIVA --}}
                                        <script>
                                            fetch('http://localhost:8000/api/logistica/{{ $pedido->track_num }}')
                                                .then(response => {
                                                    if (!response.ok) {
                                                        throw new Error('No se ha podido realizar la llamada a la API');
                                                    }
                                                    return response.json();
                                                })
                                                .then(data => {
                                                    if (data && data.ult_estado) {
                                                        document.getElementById('ult_estado_{{ $pedido->id }}').innerText = data.ult_estado;
                                                    } else {
                                                        document.getElementById('ult_estado_{{ $pedido->id }}').innerText =
                                                            'Seguimiento no disponible';
                                                    }
                                                })
                                                .catch(error => {
                                                    console.error('Error:', error.message);
                                                });
                                        </script>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <!-- Menú desplegable -->
                                <div class="dropdown-container">
                                    <!-- Botón para abrir el dropdown -->
                                    <button id="dropdownActionButton" onclick="toggleDropdown('{{ $pedido->id }}')"
                                        class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-centerdark:bg-gray-800 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                                        type="button">
                                        Action
                                        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 4 4 4-4" />
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
        </script>
    </x-plantilla-admin>

</div>
