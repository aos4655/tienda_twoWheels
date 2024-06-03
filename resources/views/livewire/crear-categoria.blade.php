<div>
    <x-button wire:click="$set('abrirModalCrear', true)"><i class="fas fa-add mr-2"></i>Nuevo</x-button>
    <x-dialog-modal wire:model='abrirModalCrear'>
        <x-slot name="title">
            CREAR CATEGORIA
        </x-slot>
        <x-slot name="content">
            <!-- PINTO EL FORMULARIO -->
            <x-label for="nombre">Nombre</x-label>
            <x-input id="nombre" wire:model="nombre" class="w-full mb-2"></x-input>
            <x-input-error for="nombre"></x-input-error>

        </x-slot>
        <x-slot name="footer">
            <div class="flex flex-row-reverse">
                <button wire:click="guardar" wire:loading.attr='disabled'
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    <i class="fas fa-edit"></i> GUARDAR
                </button>
                <button wire:click="limpiarCerrarCrear"
                    class="mr-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    <i class="fas fa-xmark"></i> CANCELAR</button>
            </div>
        </x-slot>
    </x-dialog-modal>
</div>

