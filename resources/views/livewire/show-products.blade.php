<div>

    <x-plantilla-admin>
        <h2 class="md:hidden  text-center font-semibold text-2xl text-blue-900 dark:text-white mb-5">
            PRODUCTOS
        </h2>
        <div class=" overflow-hidden shadow-xl sm:rounded-lg ">
            <div
                class="flex items-center  flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 py-4 bg-white dark:bg-gray-900">
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative mx-5">
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
                @livewire('crear-producto')
            </div>
            @if (!$productos->count())
                <h1
                    class="mb-4 text-4xl font-extrabold mt-6 text-center leading-none tracking-tight text-red-600 md:text-5xl lg:text-6xl dark:text-white">
                    No hay resultados 😭</h1>
            @else
                <table
                    class="min-w-full border-collapse block md:table text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead
                        class="block md:table-header-group text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr
                            class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                            <th class=" p-2  font-bold md:border md:border-none text-left block md:table-cell">
                                Imagen</th>
                            <th class=" p-2  font-bold md:border md:border-none text-left block md:table-cell">
                                Nombre</th>
                            <th class=" p-2  font-bold md:border md:border-none text-left block md:table-cell">
                                Descripcion</th>
                            <th class=" p-2  font-bold md:border md:border-none text-left block md:table-cell">
                                Stock</th>
                            <th class=" p-2  font-bold md:border md:border-none text-left block md:table-cell">
                                Precio</th>
                            <th class=" p-2  font-bold md:border md:border-none text-left block md:table-cell">
                                Categoria</th>
                            <th class=" p-2  font-bold md:border md:border-none text-left block md:table-cell">
                                QR</th>
                            <th class=" p-2  font-bold md:border md:border-none text-left block md:table-cell">
                                Acciones</th>

                        </tr>
                    </thead>
                    <tbody class="block md:table-row-group">
                        @foreach ($productos as $producto)
                            <tr class=" border-b-2 md:border-none block md:table-row">
                                <td class="p-2 ml-8 md:border md:border-none block md:table-cell">
                                    <span class="inline-block w-1/3 md:hidden font-bold">Imagen</span>
                                    <img class="w-10 h-10 rounded-full" src="{{ Storage::url($producto->imagen) }}"
                                        alt="{{ $producto->nombre }}" />
                                </td>
                                <td class="p-2 ml-8 md:border md:border-none text-left block md:table-cell">
                                    <span class="inline-block w-1/3 md:hidden font-bold">Nombre</span>
                                    {{ $producto->nombre }}
                                </td>
                                <td class="p-2 ml-8 md:border md:border-none text-left block md:table-cell">
                                    <span class="inline-block w-1/3 md:hidden font-bold">Descripcion</span>
                                    <!-- Modal toggle -->
                                    <button class="descripcion-btn font-medium text-blue-600 hover:underline ms-3"
                                        data-producto-descripcion="{{ $producto->descripcion }}">
                                        <i class="fa-sharp fa-solid fa-circle-info"></i>
                                    </button>
                                </td>
                                <td class="p-2 ml-8 md:border md:border-none text-left block md:table-cell">
                                    <span class="inline-block w-1/3 md:hidden font-bold">Stock</span>
                                    {{ $producto->stock }}
                                </td>
                                <td class="p-2 ml-8 md:border md:border-none text-left block md:table-cell">
                                    <span class="inline-block w-1/3 md:hidden font-bold">Precio</span>
                                    {{ $producto->precio }}
                                </td>
                                <td class="p-2 ml-8 md:border md:border-none text-left block md:table-cell">
                                    <span class="inline-block w-1/3 md:hidden font-bold">Categoria</span>
                                    {{ $producto->categoria->nombre }}
                                </td>
                                <td class="p-2 ml-8 md:border md:border-none text-left block md:table-cell">
                                    <span class="inline-block w-1/3 md:hidden font-bold">QR</span>
                                    <button wire:click="setDatosQR({{ $producto->id }})" class="mr-1 ">
                                        <i class="fa-solid fa-qrcode text-xl hover:text-red-500 "></i>
                                    </button>
                                </td>
                                <td class="p-2 ml-8 md:border md:border-none text-left block md:table-cell">
                                    <span class="inline-block w-1/3 md:hidden font-bold">Acciones</span>
                                    <!-- Menú desplegable -->
                                    <div class="dropdown-container">
                                        <!-- Botón para abrir el dropdown -->
                                        <button id="dropdownActionButton"
                                            onclick="toggleDropdown('{{ $producto->id }}')"
                                            class="text-gray-900 bg-white  hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-centerdark:bg-gray-800 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                                            type="button">
                                            Acción
                                            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                            </svg>
                                        </button>

                                        <!-- Menú desplegable -->
                                        <div id="dropdownAction_{{ $producto->id }}"
                                            class="dropdown-menu z-10 hidden bg-white  rounded-lg shadow dark:bg-gray-700">
                                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                                aria-labelledby="dropdownActionButton">
                                                <li>
                                                    <button wire:click="edit({{ $producto->id }})"
                                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                        <p class="text-red-800 ">Editar</p>
                                                    </button>
                                                </li>
                                                <li>
                                                    <button wire:click="pedirConfirmacion('{{ $producto->id }}')"
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
            <!-- Descripcion modal -->
            <div id="descripcion-modal" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed z-50 inset-0 justify-center items-center top-1/2 md:left-1/2 transform md;-translate-x-1/4 -translate-y-1/2">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div
                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Descripción Producto
                            </h3>
                            <button type="button" id="descripcion-modal-close-btn"
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
                            <p id="descripcion-contenido" class="dark:text-white">

                            </p>
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
                        <textarea id="descripcion" type="descripcion" rows="4"  wire:model="form.descripcion" class="resize-none w-full mb-2 rounded-lg dark:bg-[#111827]"></textarea>
                        <x-input-error for="form.descripcion"></x-input-error>
                        

                        <x-label for="stock">Stock</x-label>
                        <x-input id="stock" wire:model="form.stock" class="w-full mb-2"></x-input>
                        <x-input-error for="form.stock"></x-input-error>

                        <x-label for="precio">Precio</x-label>
                        <x-input id="precio" wire:model="form.precio" class="w-full mb-2"></x-input>
                        <x-input-error for="form.precio"></x-input-error>

                        <x-label for="categoria">Categoria</x-label>
                        <select id="categoria" wire:model="category_id"
                            class="w-full mb-2 rounded-lg dark:bg-[#111827] dark:text-white">
                            <option value="">Seleccione una categoría</option>
                            @foreach ($categorias as $cat)
                                <option @selected($cat->id == $form->producto->categoria_id) value="{{ $cat->id }}">{{ $cat->nombre }}</option>
                            @endforeach
                        </select>

                        <div class="flex flex-row justify-between ">
                            <div class="flex flex-col w-1/2  mx-2">
                                <x-label for="imagenU">Imagen</x-label>
                                <div id="dropzone-imagenU"
                                    class="w-full h-64 mb-2 border-dashed border-2 border-gray-400 p-4 text-center relative"
                                    ondragover="event.preventDefault();" ondrop="handleDrop(event, 'fileInput-imagenU');">
                                    @if ($form->imagenU)
                                        <img src="{{ $form->imagenU->temporaryUrl() }}"
                                            class="w-full my-auto h-60 object-contain absolute inset-0" />
                                    @elseif ($form->producto->imagen)
                                        <img src="{{ Storage::url($form->producto->imagen) }}"
                                            class="w-full my-auto h-60 object-contain absolute inset-0" />
                                    @endif
                                </div>
                                <input type="file" id="fileInput-imagenU" wire:model="form.imagenU" class="hidden" />
                                <x-input-error for="imagenU"></x-input-error>
                            </div>
                            <div class="flex flex-col w-1/2 mx-2">
                                <x-label for="imagenSFU">Imagen sin fondo</x-label>
                                <div id="dropzone-imagenSFU"
                                    class="w-full h-64 mb-2 border-dashed border-2 border-gray-400 p-4 text-center relative"
                                    ondragover="event.preventDefault();"
                                    ondrop="handleDrop(event, 'fileInput-imagenSFU');">
                                    @if ($form->imagenSFU)
                                        <img src="{{ $form->imagenSFU->temporaryUrl() }}"
                                            class="w-full my-auto h-60 object-contain absolute inset-0" />
                                    @else
                                        <img src="{{ Storage::url(str_replace('.jpg', '_SF.png', $form->producto->imagen)) }}"
                                            class="w-full my-auto h-60 object-contain absolute inset-0" />
                                    @endif
                                </div>
                                <input type="file" id="fileInput-imagenSFU" wire:model="form.imagenSFU"
                                    class="hidden" />
                                <x-input-error for="imagenSFU"></x-input-error>
                            </div>
                        </div>
                    </x-slot>
                    <x-slot name="footer">
                        <div class="flex flex-row-reverse">
                            <button wire:click="update" wire:loading.attr='disabled'
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                <i class="fas fa-edit"></i> EDITAR
                            </button>
                            <button wire:click="limpiarCerrarUpdate"
                                class="mr-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                <i class="fas fa-xmark"></i> CANCELAR</button>
                        </div>
                    </x-slot>
                </x-dialog-modal>
            @endisset
            <!-- MODAL QR  -->
            @isset($productoQR)
                <x-dialog-modal wire:model='abrirModalQR'>
                    <x-slot name="title">
                        Edita QR del producto: <span>{{ $nombre }}</span>
                    </x-slot>
                    <x-slot name="content">
                        <!-- Pinto el QR -->
                        <div class="flex flex-col items-center justify-center">
                            <div id="qr" style="background-color: {{ $backgroundColor }}"
                                class="w-72 mb-2 p-10 rounded-xl text-center flex flex-col items-center justify-center">
                                <h1 style="color: {{ $textColor }}" class="text-white text-3xl font-bold mb-2">
                                    {{ $titulo }}
                                </h1>
                                <div class="bg-green-500 p-2">
                                    {{ QrCode::size(150)->generate(route('home.show', $id)) }}
                                </div>
                                <p style="color: {{ $textColor }}" class=" mt-2 text-sm">{{ $descripcion }}</p>
                            </div>

                        </div>
                        <!-- FIN QR -->
                        <!-- Pinto el Formulario -->
                        <x-label for="bg">Color de fondo</x-label>
                        <input id="bg" type="color" wire:model.live="backgroundColor"
                            value="{{ $backgroundColor }}">

                        <x-label for="tc">Color del texto</x-label>
                        <input id="tc" type="color" wire:model.live="textColor" value="{{ $textColor }}">

                        <x-label for="titulo">Titulo</x-label>
                        <x-input id="titulo" placeholder="Título..." class="w-full mb-2" wire:model.live="titulo" />

                        <x-label for="descripcion">Descripcion</x-label>
                        <x-input id="descripcion" placeholder="Descripcion..." class="w-full mb-2"
                            wire:model.live="descripcion" />

                    </x-slot>
                    <x-slot name="footer">
                        <div class="flex flex-row-reverse">
                            <button id="descargar-btn" onclick="descargarqr()"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                data-producto-id = "{{ $id }}">
                                <i class="fas fa-save"></i> DESCARGAR
                            </button>

                            <button wire:click="cancelarQR"
                                class="mr-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                <i class="fas fa-xmark"></i> CANCELAR
                            </button>
                        </div>
                    </x-slot>
                    <script>
                        function descargarqr() {
                            var node = document.getElementById('qr');
                            const producto_id = document.getElementById('descargar-btn').getAttribute('data-producto-id')
                            htmlToImage.toPng(node)
                                .then(function(dataUrl) {
                                    function download(url, filename) {
                                        var a = document.createElement('a');
                                        a.href = url;
                                        a.download = filename;
                                        document.body.appendChild(a);
                                        a.click();
                                        document.body.removeChild(a);
                                    }
                                    download(dataUrl, 'qr_producto_' + producto_id + '.png');
                                    window.close();

                                })
                                .catch(function(error) {
                                    console.error('Error al convertir a PNG:', error);
                                });

                        }
                    </script>
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
                left: 0;
                z-index: 1000;
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
            function toggleDropdown(productoId) {
                closeAllDropdownsExcept(productoId);
                var dropdown = document.getElementById('dropdownAction_' + productoId);
                dropdown.classList.toggle('hidden');
            }

            document.addEventListener('DOMContentLoaded', function() {
                const modalDescripcion = document.getElementById('descripcion-modal');
                const descripcionButtons = document.querySelectorAll('.descripcion-btn');
                const descripcionModalCloseBtn = document.getElementById('descripcion-modal-close-btn');

                descripcionButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        modalDescripcion.classList.remove('hidden');
                        const descripcion = this.getAttribute('data-producto-descripcion');
                        const descripcionContenido = document.getElementById('descripcion-contenido');
                        descripcionContenido.innerText = descripcion

                    });
                });

                descripcionModalCloseBtn.addEventListener('click', function() {
                    modalDescripcion.classList.add('hidden');
                });

            });

            /* Drop de imagenes para el update */
            function handleDrop(event, inputId) {
                event.preventDefault();
                const files = event.dataTransfer.files;
                const input = document.getElementById(inputId);
                input.files = files;

                const changeEvent = new Event('change');
                input.dispatchEvent(changeEvent);
            }

            document.getElementById('dropzone-imagenU').addEventListener('click', () => {
                document.getElementById('fileInput-imagenU').click();
            });

            document.getElementById('dropzone-imagenSFU').addEventListener('click', () => {
                document.getElementById('fileInput-imagenSFU').click();
            });
        </script>
    </x-plantilla-admin>

</div>
