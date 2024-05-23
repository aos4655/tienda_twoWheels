<div>
    <button
        class="relative mt-1 justify-start inline-flex items-center p-3 text-sm font-medium text-center rounded-lg focus:ring-4 focus:outline-none"
        wire:click="$set('abrirModalCart', true)">
        <i id="icon-cart" class="fa-solid fa-cart-shopping fa-xl"></i>
        <div id="cant_cart"
            class="absolute inline-flex items-center justify-center w-5 h-5 text-xs font-bold text-white
                                 bg-red-500 border-2 border-white rounded-full -top-2 -end-2 dark:border-gray-900">
            {{ $cantidadProductos }}
        </div>
    </button>
    <x-cart-modal wire:model='abrirModalCart' maxWidth="sm">
        <x-slot name="title">
            <h5 id="drawer-navigation-label" class=" text-base font-semibold text-gray-500 uppercase dark:text-gray-400">
                Shopping Cart</h5>
            <button type="button" wire:click="$set('abrirModalCart', false)"
                class=" text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 end-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close menu</span>
            </button>
        </x-slot>
        <x-slot name="content">
            @foreach ($this->productosUsuario as $producto)
                <div class="my-3">
                    <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                        <img src="{{ Storage::url($producto->imagen) }}" alt="{{ $producto->nombre }}"
                            class="h-full w-full object-cover object-center">
                    </div>
                    <div class="ml-4 flex flex-1 flex-col">
                        <div class="flex justify-between text-base font-medium text-gray-900">
                            <h3>{{ $producto->nombre }}</h3>
                            <p class="ml-4">{{ $producto->precio }} €</p>
                        </div>
                        <div class="flex flex-1 items-end justify-between text-sm">
                            <div class="flex flex-1 flex-col">
                                <label for="quantity-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Choose
                                    quantity:</label>
                                <div class="relative flex items-center max-w-[6rem]">
                                    <button type="button" id="decrement-button"
                                        wire:click="decrementar({{ $producto->id }})"
                                        class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-sm p-1.5 h-6 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-1.5 focus:outline-none">
                                        <svg class="w-1.5 h-1.5 text-gray-900 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="1.25" d="M1 1h16" />
                                        </svg>
                                    </button>
                                    <input type="text"
                                        class="bg-gray-50 border-x-0 border-gray-300 h-6 text-center text-gray-900 text-xs focus:ring-blue-500 focus:border-blue-500 block w-12 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="999" value="{{ $producto->pivot->cantidad }}" required />
                                    <button type="button" id="increment-button"
                                        wire:click="incrementar({{ $producto->id }})"
                                        class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-sm p-1.5 h-6 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-1.5 focus:outline-none">
                                        <svg class="w-1.5 h-1.5 text-gray-900 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="1.25" d="M9 1v16M1 9h16" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="flex">
                                <button type="button" wire:click="eliminar({{ $producto->id }})"
                                    class="font-medium text-indigo-600 hover:text-indigo-500">Remove</button>
                            </div>
                        </div>
                    </div>
                    @if (!$loop->last)
                        <hr class="mt-3">
                    @endif
                </div>
            @endforeach
        </x-slot>
        <x-slot name="footer">
            <div>
                <div class="flex justify-between text-base font-medium text-gray-900">
                    <div class="flex flex-col text-left">
                        <p>Subtotal</p>
                        <p class="mt-0.5 text-sm text-gray-500">Los gastos de envio son gratuitos.
                        </p>
                    </div>
                    <p id="subtotal">{{ str_replace('.', ',', $subtotal)  }} €</p>

                </div>

            </div>

            <div class="mt-6">

                <a href="{{ route('checkout2') }}"
                    class="flex items-center justify-center rounded-md border border-transparent bg-blue-900 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-blue-900">Checkout</a>
            </div>

        </x-slot>
    </x-cart-modal>

</div>
