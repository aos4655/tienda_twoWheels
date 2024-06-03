<div>
    <x-button wire:click="$set('abrirModalCrear', true)"><i class="fas fa-add mr-2"></i>Nuevo</x-button>
    <x-dialog-modal wire:model='abrirModalCrear'>
        <x-slot name="title">
            CREAR PRODUCTO
        </x-slot>
        <x-slot name="content">
            <!-- PINTO EL FORMULARIO -->
            <x-label for="nombre">Nombre</x-label>
            <x-input id="nombre" wire:model="nombre" class="w-full mb-2"></x-input>
            <x-input-error for="nombre"></x-input-error>

            <x-label for="descripcion">Descripcion</x-label>
            <textarea id="descripcion" rows="4" wire:model="descripcion" class="resize-none  w-full mb-2 rounded-lg dark:bg-[#111827]"></textarea>
            <x-input-error for="descripcion"></x-input-error>

            <x-label for="stock">Stock</x-label>
            <x-input id="stock" wire:model="stock" class="w-full mb-2"></x-input>
            <x-input-error for="stock"></x-input-error>

            <x-label for="precio">Precio</x-label>
            <x-input id="precio" wire:model="precio" class="w-full mb-2"></x-input>
            <x-input-error for="precio"></x-input-error>

            <x-label for="categoria">Categoria</x-label>
            <select id="categoria" wire:model="category_id"
                class="w-full mb-2 rounded-lg dark:bg-[#111827] dark:text-white">
                <option value="">Seleccione una categoría</option>
                @foreach ($categorias as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->nombre }}</option>
                @endforeach
            </select>
            <x-input-error for="categoria"></x-input-error>
            <div class="flex flex-row justify-between ">
                <div class="flex flex-col w-1/2  mx-2">
                    <x-label for="imagen">Imagen</x-label>
                    <div id="dropzone-imagen"
                        class="w-full h-64 mb-2 border-dashed border-2 border-gray-400 p-4 text-center relative"
                        ondragover="event.preventDefault();" ondrop="handleDrop(event, 'fileInput-imagen');">
                        @if ($imagen)
                            <img src="{{ $imagen->temporaryUrl() }}"
                                class="w-full my-auto h-60 object-contain absolute inset-0" />
                        @else
                            <span class="absolute inset-0 flex items-center justify-center w-full h-full">
                                Arrastra y suelta una imagen aquí o haz click para seleccionarla.
                            </span>
                        @endif
                    </div>
                    <input type="file" id="fileInput-imagen" wire:model="imagen" class="hidden" />
                    <x-input-error for="imagen"></x-input-error>
                </div>
                <div  class="flex flex-col w-1/2 mx-2">
                    <x-label for="imagenSF">Imagen sin fondo</x-label>
                    <div id="dropzone-imagenSF"
                        class="w-full h-64 mb-2 border-dashed border-2 border-gray-400 p-4 text-center relative"
                        ondragover="event.preventDefault();" ondrop="handleDrop(event, 'fileInput-imagenSF');">
                        @if ($imagenSF)
                            <img src="{{ $imagenSF->temporaryUrl() }}"
                                class="w-full my-auto h-60 object-contain absolute inset-0" />
                        @else
                            <span class="absolute inset-0 flex items-center justify-center w-full h-full">
                                Arrastra y suelta una imagen aquí o haz click para seleccionarla.
                            </span>
                        @endif
                    </div>
                    <input type="file" id="fileInput-imagenSF" wire:model="imagenSF" class="hidden" />
                    <x-input-error for="imagenSF"></x-input-error>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <div class="flex flex-row-reverse">
                <button wire:click="guardar" wire:loading.attr='disabled'
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    <i class="fas fa-editar"></i> GUARDAR
                </button>
                <button wire:click="limpiarCerrarCrear"
                    class="mr-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    <i class="fas fa-xmark"></i> CANCELAR</button>
            </div>
        </x-slot>
    </x-dialog-modal>
</div>

<script>
    function handleDrop(event, inputId) {
        event.preventDefault();
        const files = event.dataTransfer.files;
        const input = document.getElementById(inputId);
        input.files = files;

        const changeEvent = new Event('change');
        input.dispatchEvent(changeEvent);
    }

    document.getElementById('dropzone-imagen').addEventListener('click', () => {
        document.getElementById('fileInput-imagen').click();
    });

    document.getElementById('dropzone-imagenSF').addEventListener('click', () => {
        document.getElementById('fileInput-imagenSF').click();
    });
</script>
