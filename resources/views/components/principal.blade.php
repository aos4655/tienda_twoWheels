    <div class="mt-10 py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{ $slot }}
            <!-- drawer component -->
            <div id="drawer-navigation"
                class="fixed mt-0 right-0 z-40 w-150 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white dark:bg-gray-800"
                tabindex="-1" aria-labelledby="drawer-navigation-label" style="transform: translateX(100%);">
                <h5 id="drawer-navigation-label"
                    class="text-base font-semibold text-gray-500 uppercase dark:text-gray-400">
                    Shopping Cart</h5>
                <button type="button" onclick="toggleDrawer()"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 end-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close menu</span>
                </button>
                <div class="mt-8">
                    <div class="flow-root">
                        <ul role="list" class="-my-6 divide-y divide-gray-200">
                            <li class="flex py-6">
                                <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                    <img src="https://tailwindui.com/img/ecommerce-images/shopping-cart-page-04-product-01.jpg"
                                        alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt."
                                        class="h-full w-full object-cover object-center">
                                </div>

                                <div class="ml-4 flex flex-1 flex-col">
                                    <div>
                                        <div class="flex justify-between text-base font-medium text-gray-900">
                                            <h3>
                                                <a href="#">Throwback Hip Bag</a>
                                            </h3>
                                            <p class="ml-4">$90.00</p>
                                        </div>
                                        <p class="mt-1 text-sm text-gray-500">Salmon</p>
                                    </div>
                                    <div class="flex flex-1 items-end justify-between text-sm">
                                        <div class="flex flex-1 flex-col">
                                            <label for="quantity-input"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Choose
                                                quantity:</label>
                                            <div class="relative flex items-center max-w-[6rem]">
                                                <button type="button" id="decrement-button"
                                                    data-input-counter-decrement="quantity-input"
                                                    class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-sm p-1.5 h-6 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-1.5 focus:outline-none">
                                                    <svg class="w-1.5 h-1.5 text-gray-900 dark:text-white"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 18 2">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="1.25" d="M1 1h16" />
                                                    </svg>
                                                </button>
                                                <input type="text" id="quantity-input" data-input-counter
                                                    aria-describedby="helper-text-explanation"
                                                    class="bg-gray-50 border-x-0 border-gray-300 h-6 text-center text-gray-900 text-xs focus:ring-blue-500 focus:border-blue-500 block w-12 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="999" required />
                                                <button type="button" id="increment-button"
                                                    data-input-counter-increment="quantity-input"
                                                    class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-sm p-1.5 h-6 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-1.5 focus:outline-none">
                                                    <svg class="w-1.5 h-1.5 text-gray-900 dark:text-white"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 18 18">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="1.25"
                                                            d="M9 1v16M1 9h16" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="flex">
                                            <button type="button"
                                                class="font-medium text-indigo-600 hover:text-indigo-500">Remove</button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="flex py-6">
                                <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                    <img src="https://tailwindui.com/img/ecommerce-images/shopping-cart-page-04-product-02.jpg"
                                        alt="Front of satchel with blue canvas body, black straps and handle, drawstring top, and front zipper pouch."
                                        class="h-full w-full object-cover object-center">
                                </div>

                                <div class="ml-4 flex flex-1 flex-col">
                                    <div>
                                        <div class="flex justify-between text-base font-medium text-gray-900">
                                            <h3>
                                                <a href="#">Medium Stuff Satchel</a>
                                            </h3>
                                            <p class="ml-4">$32.00</p>
                                        </div>
                                        <p class="mt-1 text-sm text-gray-500">Blue</p>
                                    </div>
                                    <div class="flex flex-1 items-end justify-between text-sm mb-6">
                                        <div class="flex flex-1 flex-col">
                                            <div class="flex flex-1 flex-col">
                                                <label for="quantity-input"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Choose
                                                    quantity:</label>
                                                <div class="relative flex items-center max-w-[6rem]">
                                                    <button type="button" id="decrement-button"
                                                        data-input-counter-decrement="quantity-input"
                                                        class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-sm p-1.5 h-6 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-1.5 focus:outline-none">
                                                        <svg class="w-1.5 h-1.5 text-gray-900 dark:text-white"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 18 2">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="1.25"
                                                                d="M1 1h16" />
                                                        </svg>
                                                    </button>
                                                    <input type="text" id="quantity-input" data-input-counter
                                                        aria-describedby="helper-text-explanation"
                                                        class="bg-gray-50 border-x-0 border-gray-300 h-6 text-center text-gray-900 text-xs focus:ring-blue-500 focus:border-blue-500 block w-12 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        placeholder="999" required />
                                                    <button type="button" id="increment-button"
                                                        data-input-counter-increment="quantity-input"
                                                        class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-sm p-1.5 h-6 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-1.5 focus:outline-none">
                                                        <svg class="w-1.5 h-1.5 text-gray-900 dark:text-white"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 18 18">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="1.25"
                                                                d="M9 1v16M1 9h16" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="flex">
                                            <button type="button"
                                                class="font-medium text-indigo-600 hover:text-indigo-500">Remove</button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="flex py-6">
                                <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                    <img src="https://tailwindui.com/img/ecommerce-images/shopping-cart-page-04-product-02.jpg"
                                        alt="Front of satchel with blue canvas body, black straps and handle, drawstring top, and front zipper pouch."
                                        class="h-full w-full object-cover object-center">
                                </div>

                                <div class="ml-4 flex flex-1 flex-col">
                                    <div>
                                        <div class="flex justify-between text-base font-medium text-gray-900">
                                            <h3>
                                                <a href="#">Medium Stuff Satchel</a>
                                            </h3>
                                            <p class="ml-4">$32.00</p>
                                        </div>
                                        <p class="mt-1 text-sm text-gray-500">Blue</p>
                                    </div>
                                    <div class="flex flex-1 items-end justify-between text-sm mb-6">
                                        <div class="flex flex-1 flex-col">
                                            <div class="flex flex-1 flex-col">
                                                <label for="quantity-input"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Choose
                                                    quantity:</label>
                                                <div class="relative flex items-center max-w-[6rem]">
                                                    <button type="button" id="decrement-button"
                                                        data-input-counter-decrement="quantity-input"
                                                        class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-sm p-1.5 h-6 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-1.5 focus:outline-none">
                                                        <svg class="w-1.5 h-1.5 text-gray-900 dark:text-white"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 18 2">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="1.25"
                                                                d="M1 1h16" />
                                                        </svg>
                                                    </button>
                                                    <input type="text" id="quantity-input" data-input-counter
                                                        aria-describedby="helper-text-explanation"
                                                        class="bg-gray-50 border-x-0 border-gray-300 h-6 text-center text-gray-900 text-xs focus:ring-blue-500 focus:border-blue-500 block w-12 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        placeholder="999" required />
                                                    <button type="button" id="increment-button"
                                                        data-input-counter-increment="quantity-input"
                                                        class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-sm p-1.5 h-6 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-1.5 focus:outline-none">
                                                        <svg class="w-1.5 h-1.5 text-gray-900 dark:text-white"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 18 18">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="1.25"
                                                                d="M9 1v16M1 9h16" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="flex">
                                            <button type="button"
                                                class="font-medium text-indigo-600 hover:text-indigo-500">Remove</button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="border-t border-gray-200 px-4 py-6 sm:px-6">
                    <div class="flex justify-between text-base font-medium text-gray-900">
                        <p>Subtotal</p>
                        <p>$262.00</p>
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
                    </div>
                </div>
            </div>

            <script>
                function toggleDrawer() {
                    var drawer = document.getElementById('drawer-navigation');
                    var drawerStyle = window.getComputedStyle(drawer);
                    var drawerTransform = drawerStyle.getPropertyValue('transform');
                    if (drawerTransform === 'matrix(1, 0, 0, 1, 0, 0)') {
                        drawer.style.transform = 'translateX(100%)';
                    } else {
                        drawer.style.transform = 'translateX(0)';
                    }
                }
            </script>
        </div>
    </div>