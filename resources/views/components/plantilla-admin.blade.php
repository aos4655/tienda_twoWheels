<x-principal>
    <div class="mt-0 py-0 ">

        {{-- Panel de administracion para el ADMINISTRADOR --}}
        <aside id="default-sidebar"
            class="fixed top-11 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
            aria-label="Sidebar">

            <div class="h-full mt-5 px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
                <ul class="space-y-2 font-medium">
                    <li>
                        <a href="{{ route('categories.index') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <i class="fa-solid fa-icons"></i>
                            <span class="ms-3">Category</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('users.index') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <i class="fa-solid fa-users"></i>
                            <span class="flex-1 ms-3 whitespace-nowrap">Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('todos-productos.index') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <i class="fa-solid fa-box"></i>
                            <span class="flex-1 ms-3 whitespace-nowrap">Products</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('todos-pedidos.index')}}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <i class="fa-solid fa-shop"></i>
                            <span class="flex-1 ms-3 whitespace-nowrap">Pedidos</span>
                        </a>
                    </li>

                </ul>
            </div>
        </aside>
    </div>
    <div class="p-0 m-0 sm:ml-64 min-h-screen ">
        {{ $slot }}
    </div>
</x-principal>
