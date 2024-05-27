<x-form-section submit="updateAddressInformation">
    <x-slot name="title">
        Dirección
    </x-slot>

    <x-slot name="description">
        Actualiza tu dirección para recibir los pedidos.
    </x-slot>

    <x-slot name="form">
        <!-- Direccion -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="direccion" value="Direccion" />
            <x-input id="direccion" type="text" class="mt-1 block w-full" wire:model="direccion" required
                autocomplete="direccion" />
            <x-input-error for="direccion" class="mt-2" />
        </div>

        <!-- ZipCode -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="zipcode" value="ZipCode" />
            <x-input id="zipcode" type="text" class="mt-1 block w-full" wire:model="zipcode" required
                autocomplete="zipcode" />
            <x-input-error for="zipcode" class="mt-2" />
        </div>

        <!-- Ciudad -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="ciudad" value="Ciudad" />
            <x-input id="ciudad" type="text" class="mt-1 block w-full" wire:model="ciudad" required
                autocomplete="ciudad" />
            <x-input-error for="ciudad" class="mt-2" />
        </div>

        <!-- Comunidad Autonoma -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="comunidad_autonoma" value="Comunidad Autonoma" />
            <x-input id="comunidad_autonoma" type="text" class="mt-1 block w-full" wire:model="comunidad_autonoma"
                required autocomplete="comunidad_autonoma" />
            <x-input-error for="comunidad_autonoma" class="mt-2" />
        </div>

        <!-- Pais -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="pais" value="Pais" />
            <x-input id="pais" type="text" class="mt-1 block w-full" wire:model="pais" required
                autocomplete="pais" />
            <x-input-error for="pais" class="mt-2" />
        </div>
        <!-- Numero Telefono -->
        <div class="col-span-6 sm:col-span-4 relative">
            <x-label for="num_telefono" value="Numero de telefono" />
            <div class="relative">
                <div class="absolute inset-y-0 start-0 top-0 flex items-center ps-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 19 18">
                        <path
                            d="M18 13.446a3.02 3.02 0 0 0-.946-1.985l-1.4-1.4a3.054 3.054 0 0 0-4.218 0l-.7.7a.983.983 0 0 1-1.39 0l-2.1-2.1a.983.983 0 0 1 0-1.389l.7-.7a2.98 2.98 0 0 0 0-4.217l-1.4-1.4a2.824 2.824 0 0 0-4.218 0c-3.619 3.619-3 8.229 1.752 12.979C6.785 16.639 9.45 18 11.912 18a7.175 7.175 0 0 0 5.139-2.325A2.9 2.9 0 0 0 18 13.446Z" />
                    </svg>
                </div>
                <input type="text" id="num_telefono" wire:model="num_telefono"
                    aria-describedby="Introduzca el numero con el formato 111 111 111"
                    class=" border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-900 dark:border-gray-600  dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" placeholder="123-456-7890" required />
            </div>
            <x-input-error for="num_telefono" class="mt-2" />

        </div>

    </x-slot>

    <x-slot name="actions">
           <div id="mensajeMostrado"  class="text-sm text-gray-600 dark:text-gray-400 me-3">
           </div>  



        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
