<div>
    <x-plantilla-admin>
        <h2 class="md:hidden  text-center font-semibold text-2xl text-blue-900 dark:text-white mb-5">
            CATEGORIAS
        </h2>
        <div class=" overflow-hidden shadow-xl sm:rounded-lg">
            <div
                class="flex items-center flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 py-4 bg-white dark:bg-gray-900">
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative mx-5 ">
                    <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <x-input
                        class=" pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg md:w-80 w-56 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Buscar..." type="search" wire:model.live="search"></x-input>
                </div>
                @livewire('crear-categoria')
            </div>
            @if (!$categorias->count())
                <h1
                    class="mb-4 text-4xl font-extrabold leading-none text-center tracking-tight text-red-600 md:text-5xl lg:text-6xl dark:text-white">
                    No hay resultados 😭</h1>
            @else
                <table class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400 ">
                    <thead
                        class="block  md:table-header-group text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 ">
                        <tr
                            class="  border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                            <th class=" p-2 w-1/2 mx-auto font-bold md:border md:border-none  block md:table-cell">
                                Nombre</th>
                            <th class=" p-2 w-1/2 mx-auto font-bold md:border md:border-none  block md:table-cell">
                                Acción</th>

                        </tr>
                    </thead>
                    <tbody class="block md:table-row-group">
                        @foreach ($categorias as $item)
                            <tr class=" border-b-2 md:border-none block md:table-row ml-5">
                                <td
                                    class="p-2 ml-12 md:border md:border-none text-left md:text-center  block md:table-cell">
                                    <span class="inline-block w-1/3 md:hidden font-bold">Nombre</span>
                                    {{ $item->nombre }}
                                </td>

                                <td
                                    class="p-2 ml-12 md:border md:border-none text-left md:text-center  block md:table-cell">
                                    <span class="inline-block w-1/3 md:hidden font-bold">Acciones</span>
                                    <!-- Menú desplegable de acciones-->
                                    <div class="dropdown-container">
                                        <!-- Botón para abrir el dropdown -->
                                        <button id="dropdownActionButton"
                                            onclick="toggleDropdown('{{ $item->id }}')"
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
                                        <div id="dropdownAction_{{ $item->id }}"
                                            class="dropdown-menu z-10 hidden bg-white  rounded-lg shadow dark:bg-gray-700">
                                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                                aria-labelledby="dropdownActionButton">
                                                <li>
                                                    <!-- Acción de editar usuario -->
                                                    <button wire:click="edit({{ $item->id }})"
                                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                        <p class="text-red-800 ">Editar</p>
                                                    </button>
                                                </li>
                                                <!-- Acción de eliminar usuario -->
                                                <li>
                                                    <button wire:click="pedirConfirmacion('{{ $item->id }}')"
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
            <!-- MODAL UPDATE CATEGORY  -->
            @isset($form->category)
                <x-dialog-modal wire:model='abrirModalUpdate'>
                    <x-slot name="title">
                        EDITAR CATEGORIA
                    </x-slot>
                    <x-slot name="content">
                        <!-- PINTO EL FORMULARIO -->
                        <x-label for="name">Nombre</x-label>
                        <x-input id="name" wire:model="form.name" class="w-full mb-2"
                            placeholder="Tu nombre..."></x-input>
                        <x-input-error for="form.name"></x-input-error>

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
            function toggleDropdown(userId) {
                closeAllDropdownsExcept(userId);
                var dropdown = document.getElementById('dropdownAction_' + userId);
                dropdown.classList.toggle('hidden');
            }
        </script>
    </x-plantilla-admin>
    <!--MODAL PARA ACTUALIZAR UN USUARIO -->

</div>
