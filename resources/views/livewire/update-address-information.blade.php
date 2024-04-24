<x-form-section submit="updateAddressInformation">
    <x-slot name="title">
        Address Information
    </x-slot>

    <x-slot name="description">
        Update your address to send the packages.
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
        <div class="col-span-6 sm:col-span-4">
            <x-label for="num_telefono" value="Numero de telefono" />
            <x-input id="num_telefono" type="text" class="mt-1 block w-full" wire:model="num_telefono" required
                autocomplete="num_telefono" />
            <x-input-error for="num_telefono" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        @if (session('mensaje'))
            <div id="mensaje_saved" class="me-3">{{ __('Saved.') }}</div>

            <script>
                console.log("Entro");
                setTimeout(function() {
                    document.getElementById('mensaje_saved').hidden = true; // Oculta el div
                    console.log("Salgo...");
                }, 2000);
            </script>
            @php
                session()->forget('mensaje');
            @endphp
        @endif

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
