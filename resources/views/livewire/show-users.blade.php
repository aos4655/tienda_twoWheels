<div>
    <x-plantilla-admin>
        <div class=" overflow-hidden shadow-xl sm:rounded-lg">
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
            @if (!$users->count())
                No hay resultados!!
            @endif
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead
                    class="block md:table-header-group text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr
                        class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                        <th class=" p-2  font-bold md:border md:border-none text-left block md:table-cell">
                            Nombre</th>
                        <th class=" p-2  font-bold md:border md:border-none text-left block md:table-cell">
                            Email</th>
                        <th class=" p-2  font-bold md:border md:border-none text-left block md:table-cell">
                            Status</th>
                        <th class=" p-2  font-bold md:border md:border-none text-left block md:table-cell">
                            Action</th>

                    </tr>
                </thead>
                <tbody class="mt-8">
                    @foreach ($users as $user)
                        <tr class="bg-gray-300 py-4 border-b-2 md:border-none block md:table-row ">
                            <td class="p-2 ml-8 md:border md:border-none block md:table-cell">
                                <span class="inline-block w-1/3 md:hidden font-bold">Nombre</span>
                                {{ $user->name }}
                            </td>
                            <td class="p-2 ml-8 md:border md:border-none block md:table-cell">
                                <span class="inline-block w-1/3 md:hidden font-bold">Email</span>
                                {{ $user->email }}
                            </td>
                            <td class="p-2 ml-8 md:border md:border-none block md:table-cell">
                                <span class="inline-block w-1/3 md:hidden font-bold">Status</span>
                                {{ $user->is_admin == 'SI' ? 'Administrador' : 'Normal' }}
                            </td>
                            <td class="p-2 ml-8 md:border md:border-none block md:table-cell">
                                <span class="inline-block w-1/3 md:hidden font-bold">Action</span>

                                <!-- Menú desplegable -->
                                <div class="dropdown-container ">
                                    <!-- Botón para abrir el dropdown -->
                                    <button id="dropdownActionButton" onclick="toggleDropdown('{{ $user->id }}')"
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
                                    <div id="dropdownAction_{{ $user->id }}"
                                        class="dropdown-menu z-10 hidden bg-white  rounded-lg shadow dark:bg-gray-700">
                                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                            aria-labelledby="dropdownActionButton">
                                            <li>
                                                <!-- Acción de editar usuario -->
                                                <button wire:click="edit({{ $user->id }})"
                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                    <p class="text-red-800 ">Editar</p>
                                                </button>
                                            </li>
                                            <!-- Acción de eliminar usuario -->
                                            <li>
                                                <button wire:click="pedirConfirmacion('{{ $user->id }}')"
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

            @isset($form->user)
                <x-dialog-modal wire:model='abrirModalUpdate'>
                    <x-slot name="title">
                        EDITAR USUARIO
                    </x-slot>
                    <x-slot name="content">
                        <!-- PINTO EL FORMULARIO -->
                        <x-label for="name">Nombre</x-label>
                        <x-input id="name" wire:model="form.name" class="w-full mb-2"
                            placeholder="Tu nombre..."></x-input>
                        <x-input-error for="form.name"></x-input-error>

                        <x-label for="email">Email</x-label>
                        <x-input id="email" type="email" wire:model="form.email" class="w-full mb-2"
                            placeholder="Email..."></x-input>
                        <x-input-error for="form.email"></x-input-error>

                        <x-label for="address">Direccion</x-label>
                        <x-input id="address" wire:model="form.address" class="w-full mb-2"
                            placeholder="Direccion..."></x-input>
                        <x-input-error for="form.address"></x-input-error>

                        <x-label for="postal_code">Cod Postal</x-label>
                        <x-input id="postal_code" wire:model="form.postal_code" class="w-full mb-2"
                            placeholder="Codigo postal..."></x-input>
                        <x-input-error for="form.postal_code"></x-input-error>

                        <x-label for="city">Ciudad</x-label>
                        <x-input id="city" wire:model="form.city" class="w-full mb-2"
                            placeholder="Ciudad..."></x-input>
                        <x-input-error for="form.city"></x-input-error>

                        <x-label for="country">Comunidad Autonoma</x-label>
                        <x-input id="country" wire:model="form.postal_code" class="w-full mb-2"
                            placeholder="Comunidad Autonoma..."></x-input>
                        <x-input-error for="form.postal_code"></x-input-error>

                        <x-label for="state">Pais</x-label>
                        <x-input id="state" wire:model="form.state" class="w-full mb-2"
                            placeholder="Pais..."></x-input>
                        <x-input-error for="form.state"></x-input-error>

                        <x-label for="postal_code">Cod Postal</x-label>
                        <x-input id="postal_code" wire:model="form.postal_code" class="w-full mb-2"
                            placeholder="Codigo postal..."></x-input>
                        <x-input-error for="form.postal_code"></x-input-error>

                        <x-label for="phone_number">Telefono</x-label>
                        <x-input id="phone_number" wire:model="form.phone_number" class="w-full mb-2"
                            placeholder="Telefono..."></x-input>
                        <x-input-error for="form.phone_number"></x-input-error>

                        <x-label for="is_admin">Administrador</x-label>
                        <div class="flex items-center mb-2">
                            <input id="is_admin" type="checkbox" wire:model="form.is_admin" value="SI"
                                @checked($form->is_admin == 'SI')
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2" />
                            <label for="is_admin"
                                class="ms-2 dark:text-white text-sm font-medium text-gray-900">SI</label>
                        </div>
                        <x-input-error for="form.is_admin"></x-input-error>

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
{{-- OBTENER DATOS API --}}
{{-- <script>
    function getUserForModal(idCliente) {

        const data = await fetch('/api/user', {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                id: idCliente
            })
        }).then((response) =>
            return response);

        let dataResponse = data.body();

        console.log(dataResponse);


    }
</script> --}}
