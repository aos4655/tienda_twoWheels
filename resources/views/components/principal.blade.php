    <div class="mt-10 py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            {{ $slot }}
            <!-- drawer component -->
            <div id="drawer-navigation"
                class="fixed mt-0 right-0 z-40 w-150 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white dark:bg-gray-800"
                tabindex="-1" aria-labelledby="drawer-navigation-label" style="transform: translateX(100%);">
                <h5 id="drawer-navigation-label"
                    class=" text-base font-semibold text-gray-500 uppercase dark:text-gray-400">
                    Shopping Cart</h5>
                <button type="button" onclick="toggleDrawer()"
                    class=" text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 end-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close menu</span>
                </button>
                <div class="mt-8" style="max-height: calc(100vh - 400px); overflow-y: auto;">
                    <div class="flow-root">
                        <ul role="list" id="lista_productos_carrito" class="-my-6 divide-y divide-gray-200">
                            
                        </ul>
                    </div>
                </div>
                <div class="border-t border-gray-200 px-4 py-6 sm:px-6">
                    <div class="flex justify-between text-base font-medium text-gray-900">
                        <p>Subtotal</p>
                        <p id="subtotal">$262.00</p>
                    </div>
                    <p class="mt-0.5 text-sm text-gray-500">Shipping and taxes calculated at checkout.
                    </p>
                    <div class="mt-6">
                        <a href="#"
                            class="flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Checkout</a>
                    </div>
                    <div class="mt-6 flex justify-center text-center text-sm text-gray-500">
                        <p>
                            or
                            <button type="button" class="font-medium text-indigo-600 hover:text-indigo-500">
                                Continue Shopping
                                <span aria-hidden="true"> &rarr;</span>
                            </button>
                        </p>
                        <input type="checkbox">
                    </div>
                </div>
            </div>

            <script>
                /* ANTIGUO CARRITO */
                /* function toggleDrawer() {
                    var drawer = document.getElementById('drawer-navigation');
                    var drawerStyle = window.getComputedStyle(drawer);
                    var drawerTransform = drawerStyle.getPropertyValue('transform');
                    inicializarCarrito()
                    if (drawerTransform === 'matrix(1, 0, 0, 1, 0, 0)') {
                        drawer.style.transform = 'translateX(100%)';
                    } else {
                        drawer.style.transform = 'translateX(0)';
                    }
                } */

                function inicializarCarrito() {
                    const btn_carrito = document.getElementById('btn-carrito');
                    if (btn_carrito) {
                        const user_id = btn_carrito.getAttribute('data-user-id')
                        obtenerProductosDeCarrito(user_id);
                    }
                }

                function obtenerProductosDeCarrito(user_id) {
                    fetch(`api/carrito?user_id=${user_id}`)
                        .then(response => response.json())
                        .then(data => {
                            const listadoProductos = document.getElementById('lista_productos_carrito');
                            const cant_cart = document.getElementById('cant_cart');
                            var contador = 0;
                            // Eliminar los elementos existentes de la lista si es necesario
                            while (listadoProductos.firstChild) {
                                listadoProductos.removeChild(listadoProductos.firstChild);
                            }
                            data.forEach(product => {
                                contador++;

                                const listItem = document.createElement('li');
                                listItem.classList.add('flex', 'py-6');
                                let imageUrl = "{{ Storage::url('product.imagen') }}";
                                listItem.innerHTML = `
                                    <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <input id="${product.id}" type="checkbox" onchange="actualizarSubtotal()" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    </div>    
                                    <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                    <img src="<?php echo Storage::url('${product.imagen}'); ?>" alt="${product.nombre}" class="h-full w-full object-cover object-center">
                                    </div>
                                    <div class="ml-4 flex flex-1 flex-col">
                                    <div class="flex justify-between text-base font-medium text-gray-900">
                                        <h3>${product.nombre}</h3>
                                        <p class="ml-4">$${product.precio}</p>
                                    </div>
                                    <div class="flex flex-1 items-end justify-between text-sm">
                                        <div class="flex flex-1 flex-col">
                                        <label for="quantity-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Choose quantity:</label>
                                        <div class="relative flex items-center max-w-[6rem]">
                                            <button type="button" id="decrement-button" onclick="decrementar(<?php if (Auth::check()) { echo Auth::user()->id; } ?>, ${product.id})" data-input-counter-decrement="quantity-input" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-sm p-1.5 h-6 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-1.5 focus:outline-none">
                                            <svg class="w-1.5 h-1.5 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.25" d="M1 1h16" />
                                            </svg>
                                            </button>
                                            <input type="text" id="quantity-input-${product.id}" data-input-counter aria-describedby="helper-text-explanation" class="bg-gray-50 border-x-0 border-gray-300 h-6 text-center text-gray-900 text-xs focus:ring-blue-500 focus:border-blue-500 block w-12 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="999" value="${product.pivot.cantidad}" required />
                                            <button type="button" id="increment-button" onclick="incrementar(<?php if (Auth::check()) { echo Auth::user()->id; } ?>,${product.id})" data-input-counter-increment="quantity-input" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-sm p-1.5 h-6 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-1.5 focus:outline-none">
                                            <svg class="w-1.5 h-1.5 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.25" d="M9 1v16M1 9h16" />
                                            </svg>
                                            </button>
                                        </div>
                                        </div>
                                        <div class="flex">
                                        <button type="button" onclick="eliminar(<?php if (Auth::check()) { echo Auth::user()->id; } ?>,${product.id})"  class="font-medium text-indigo-600 hover:text-indigo-500">Remove</button>
                                        </div>
                                    </div>
                                    </div>
                                `;

                                listadoProductos.appendChild(listItem);
                            });
                            cant_cart.innerHTML = `${contador}`;
                        })
                }

                function incrementar(idUsuario, idProducto) {
                    cambiarCantidadProductoCarrito(idUsuario, idProducto, "INCREMENTAR");
                }

                function decrementar(idUsuario, idProducto) {
                    cambiarCantidadProductoCarrito(idUsuario, idProducto, "DECREMENTAR");
                }

                function eliminar(idUsuario, idProducto) {
                    const token = document.head.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    fetch('/api/carritoDelete', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': token
                            },
                            body: JSON.stringify({
                                user_id: idUsuario,
                                product_id: idProducto
                            })
                        })
                        .catch(error => {
                            console.error("Error al eliminar el producto en el carrito de dicho usuario: ",
                                error);
                        });

                    //Para que los vuelva a cargar
                    obtenerProductosDeCarrito(idUsuario);
                }

                function cambiarCantidadProductoCarrito(idUsuario, idProducto, actualizacion) {
                    //Debemos enviar el token ya que si no no nos deja
                    const token = document.head.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    fetch('/api/carritoCantidad', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': token
                            },
                            body: JSON.stringify({
                                user_id: idUsuario,
                                product_id: idProducto,
                                actualizacion: actualizacion
                            })
                        })
                        .catch(error => {
                            console.error("Error al actualizar la cantidad del producto en el carrito de dicho usuario: ",
                                error);
                        });

                    //Para que los vuelva a cargar
                    obtenerProductosDeCarrito(idUsuario);

                }

                function actualizarSubtotal() {
                    console.log('Actualizando subtotal...');
                    let subtotal = 0;
                    document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
                        if (checkbox.checked) {
                            const precioElement = checkbox.closest('.flex').querySelector('p');
                            console.log('Precio Elemento:', precioElement);
                            const precioTexto = precioElement.innerText.replace('$', '');
                            console.log('Precio Texto:', precioTexto);
                            const precio = parseFloat(precioTexto);
                            console.log('Precio:', precio);
                            subtotal += precio;
                        }
                    });
                    document.getElementById('subtotal').innerText = '$' + subtotal.toFixed(2);
                }
                window.onload = inicializarCarrito;
            </script>
        </div>
    </div>
