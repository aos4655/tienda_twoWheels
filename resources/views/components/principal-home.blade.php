    <div class="mt-5">
        <div class="max-w-8xl mx-auto ">
            <main class="dark:bg-blue-900  bg-[#EFFAEB]">
                {{ $slot }}
            </main>
            <footer class="text-white rounded-t-3xl  px-2 bg-blue-950 dark:bg-blue-950">
                <div
                    class="container px-5 py-24 mx-auto flex md:items-center lg:items-start md:flex-row md:flex-nowrap flex-wrap flex-col">
                    <div class="w-64 flex-shrink-0 md:mx-0 mx-auto text-center md:text-left ">
                        <a
                            class="flex title-font font-medium items-center md:justify-start justify-center ">
                            <x-application-mark class="block h-9 w-auto" />
                            <span class="ml-3 text-xl">Two Wheels</span>
                        </a>
                        <p class="mt-2 text-sm ">Apostando por un futuro mas sostenible.</p>
                    </div>
                    <div
                        class="flex-grow flex flex-wrap justify-between  md:pl-40 -mb-10 md:mt-0 mt-10 md:text-left text-center">
                        <div class="lg:w-1/4 md:w-1/2 w-full px-4 justify-center">
                            <h2 class="title-font font-bold  text-white tracking-widest text-sm mb-3">
                                LEGAL</h2>
                            <nav class="list-none mb-10">
                                <li>
                                    <a class="">Términos y Condiciones</a>
                                </li>
                                <li>
                                    <a class="">Política de privacidad</a>
                                </li>
                            </nav>
                        </div>
                        <div class="lg:w-1/4 md:w-1/2 w-full px-4">
                            <h2 class="title-font font-bold  text-white tracking-widest text-sm mb-3">
                                CONTÁCTANOS</h2>
                            <nav class="list-none flex flex-row mb-10">
                                <li>
                                    <a target="_blanck" href="<?php echo isset($_ENV['NUM_WHATSAPP']) != null ? 'https://wa.me/' . $_ENV['NUM_WHATSAPP'] . '?text=Hola,%20me%20pongo%20en%20contacto%20con%20vosotros%20para..' : ''; ?>"
                                        onmouseenter="addAnimation('whatsapp')"
                                        onmouseleave="removeAnimation('whatsapp')"
                                        class=" mx-5 "><i id="whatsapp"
                                            class="fa-brands fa-whatsapp fa-2xl"></i></a><!-- Whatsapp -->
                                </li>
                                <li>
                                    <a onmouseenter="addAnimation('email')" onmouseleave="removeAnimation('email')"
                                        class=""><i id="email"
                                            class="fa-regular fa-envelope fa-2xl"></i></a><!-- Email -->
                                </li>
                            </nav>
                        </div>
                        <div class="lg:w-1/4 md:w-1/2 w-full px-4">
                            <h2 class="title-font font-bold  text-white tracking-widest text-sm mb-3">
                                SÍGUENOS</h2>
                            <nav class="list-none mb-10">
                                <li>
                                    <a class="">Instagram</a>
                                </li>
                                <li>
                                    <a class="">Second Link</a>
                                </li>
                                <li>
                                    <a class="">Third Link</a>
                                </li>
                                <li>
                                    <a class="">Fourth Link</a>
                                </li>
                            </nav>
                        </div>
                    </div>
                </div>
            </footer>

            <script>
                function aniadirCarrito(idUsuario, idProducto) {
                    const token = document.head.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    fetch('/api/carritoAdd', {
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
                            console.error("Error al aniadir el producto en el carrito de dicho usuario: ",
                                error);
                        });
                    Livewire.dispatch('rendCarrito');
                }
                /* ANIMACION PARA ICONOS CONTACTO FOOTER*/
                function addAnimation(elemento) {
                    miElemento = document.getElementById(elemento);
                    miElemento.classList.add('fa-spin-pulse');
                }

                function removeAnimation(elemento) {
                    miElemento = document.getElementById(elemento);
                    miElemento.classList.remove('fa-spin-pulse');
                }
            </script>
            <!-- *************************
                    ANTIGUO CARRITO
                **************************** -->
            <!-- <script>
                function toggleDrawer() {
                    var drawer = document.getElementById('drawer-navigation');
                    var drawerStyle = window.getComputedStyle(drawer);
                    var drawerTransform = drawerStyle.getPropertyValue('transform');
                    inicializarCarrito()
                    if (drawerTransform === 'matrix(1, 0, 0, 1, 0, 0)') {
                        drawer.style.transform = 'translateX(100%)';
                    } else {
                        drawer.style.transform = 'translateX(0)';
                    }
                }

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
                                        <p class="ml-4">${product.precio} €</p>
                                    </div>
                                    <div class="flex flex-1 items-end justify-between text-sm">
                                        <div class="flex flex-1 flex-col">
                                        <label for="quantity-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Choose quantity:</label>
                                        <div class="relative flex items-center max-w-[6rem]">
                                            <button type="button" id="decrement-button" onclick="decrementar(<?php if (Auth::check()) {
                                                echo Auth::user()->id;
                                            } ?>, ${product.id})" data-input-counter-decrement="quantity-input" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-sm p-1.5 h-6 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-1.5 focus:outline-none">
                                            <svg class="w-1.5 h-1.5 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.25" d="M1 1h16" />
                                            </svg>
                                            </button>
                                            <input type="text" id="quantity-input-${product.id}" data-input-counter aria-describedby="helper-text-explanation" class="bg-gray-50 border-x-0 border-gray-300 h-6 text-center text-gray-900 text-xs focus:ring-blue-500 focus:border-blue-500 block w-12 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="999" value="${product.pivot.cantidad}" required />
                                            <button type="button" id="increment-button" onclick="incrementar(<?php if (Auth::check()) {
                                                echo Auth::user()->id;
                                            } ?>,${product.id})" data-input-counter-increment="quantity-input" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-sm p-1.5 h-6 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-1.5 focus:outline-none">
                                            <svg class="w-1.5 h-1.5 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.25" d="M9 1v16M1 9h16" />
                                            </svg>
                                            </button>
                                        </div>
                                        </div>
                                        <div class="flex">
                                        <button type="button" onclick="eliminar(<?php if (Auth::check()) {
                                            echo Auth::user()->id;
                                        } ?>,${product.id})"  class="font-medium text-indigo-600 hover:text-indigo-500">Remove</button>
                                        </div>
                                    </div>
                                    </div>
                                `;

                                listadoProductos.appendChild(listItem);
                            });
                            cant_cart.innerHTML = `${contador}`;

                            // Aplicar scroll si hay más de 5 productos en el carrito
                            const maxProductosSinScroll = 3;

                            const listaAltura = listadoProductos.scrollHeight;
                            if (contador > maxProductosSinScroll) {
                                listadoProductos.style.maxHeight = '80vh';
                                listadoProductos.style.overflowY = 'auto';
                            } else {
                                listadoProductos.style.maxHeight = 'none';
                                listadoProductos.style.overflowY = 'visible';
                            }
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
                    let subtotal = 0;
                    const checkboxes = document.querySelectorAll('#lista_productos_carrito input[type="checkbox"]');

                    checkboxes.forEach(checkbox => {
                        if (checkbox.checked) {
                            const listItem = checkbox.closest('li');
                            if (listItem) {
                                const precioElement = listItem.querySelector('p');
                                const cantidadInput = listItem.querySelector('input[type="text"]');

                                if (precioElement && cantidadInput) {
                                    const precioTexto = precioElement.innerText.replace('€', '');
                                    const precio = parseFloat(precioTexto);

                                    const cantidad = parseInt(cantidadInput.value);

                                    subtotal += precio * cantidad;
                                }
                            }
                        }
                    });

                    // Actualizar el subtotal
                    const subtotalElement = document.getElementById('subtotal');
                    if (subtotalElement) {
                        subtotalElement.innerText = subtotal.toFixed(2) + ' €';
                    }
                }


                document.querySelectorAll('#lista_productos_carrito input[type="checkbox"]').forEach(checkbox => {
                    checkbox.addEventListener('change', actualizarSubtotal);
                });

                document.querySelectorAll('#lista_productos_carrito input[type="text"]').forEach(input => {
                    input.addEventListener('input', actualizarSubtotal);
                });


                window.onload = inicializarCarrito;
            </script> -->
        </div>
    </div>
