<nav x-data="{ open: false }" style = "border-color: #093564"
    class="bg-white dark:bg-blue-950 border-b-2 dark:border-blue-950 fixed w-full top-0 z-20">
    {{-- AÑADIDO AL NAV fixed w-full top-0 z-10, La clase z-10 es opcional y se utiliza para garantizar que el nav esté 
        siempre por encima de otros elementos en la página. Puedes ajustar el valor según sea necesario  --}}
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-application-mark class="block h-9 w-auto" />
                    </a>
                </div>
                <!-- Hamburger -->
                <div class="md:hidden ml-4 flex items-center sm:hidden ">
                    <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': !open }"
                                class="inline-flex text-blue-900 dark:text-white" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ 'hidden': !open, 'inline-flex': open }"
                                class="hidden text-blue-900 dark:text-white" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home.*.')">
                        Home
                    </x-nav-link>
                    <x-nav-link href="{{ route('patinetes.index') }}" :active="request()->routeIs('patinetes.*')">
                        Patinetes
                    </x-nav-link><x-nav-link href="{{ route('bicicletas.index') }}" :active="request()->routeIs('bicicletas.*')">
                        Bicicletas
                    </x-nav-link><x-nav-link href="{{ route('accesorios.index') }}" :active="request()->routeIs('accesorios.*')">
                        Accesorios
                    </x-nav-link>
                    @auth
                        @if (Auth::user()->is_admin == 'SI')
                            <x-nav-link href="{{ route('users.index') }}" :active="request()->routeIs('users.*')">
                                Administracion
                            </x-nav-link>
                        @else
                            <x-nav-link href="{{ route('pedidos.index') }}" :active="request()->routeIs('pedidos.*')">
                                Mis pedidos
                            </x-nav-link>
                        @endif
                    @endauth

                </div>

            </div>
            <div class="flex items-center">
                <div class="flex flex-row justify-between w-20">
                    <!-- BOTON CARRITO -->
                    @auth
                        @livewire('cart')
                    @endauth
                    <!-- BOTON DARKMODE -->
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input id="theme" class="sr-only peer" value="" type="checkbox" onchange="toggleTheme()" />
                        <div
                            class="w-16 h-9 pt-1 rounded-full ring-0 peer duration-500 outline-none bg-[#fbedb6] overflow-hidden
                                   before:flex before:items-center before:justify-center
                                   after:flex after:items-center after:justify-center
                                   before:content-['☀️'] before:absolute before:h-7 before:w-7
                                   before:bg-[#f4ca25] before:rounded-full before:left-8
                                   before:-translate-x-full before:transition-all before:duration-700
                                   peer-checked:before:opacity-0 peer-checked:before:translate-x-0
                                   shadow-lg shadow-gray-400 peer-checked:shadow-lg peer-checked:shadow-gray-700
                                   peer-checked:bg-[#043449]
                                   after:content-['🌙'] after:text-white after:absolute after:bg-[#25b6f4]
                                   after:rounded-full after:right-1 after:-translate-x-full
                                   after:w-7 after:h-7 after:opacity-0
                                   after:transition-all after:duration-700 peer-checked:after:opacity-100
                                   peer-checked:after:translate-x-0">
                        </div>
                    </label>



                    {{-- <button onclick="toggleTheme()" class="ml-2 mr-4">
                        <div id="iconoLuna">
                            <i class="fa-regular fa-moon fa-xl"></i>
                        </div>
                        <div id="iconoSol" hidden>
                            <i class="fa-regular fa-sun fa-xl" style="color:white;"></i>
                        </div>
                    </button> --}}
                </div>
                <div class="hidden sm:block sm:items-center sm:ms-6">
                    @auth
                        @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                            <div class="ms-3 relative">
                                <x-dropdown align="right" width="60">
                                    <x-slot name="trigger">
                                        <span class="inline-flex rounded-md">
                                            <button type="button"
                                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">
                                                {{ Auth::user()->currentTeam->name }}

                                                <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                                </svg>
                                            </button>
                                        </span>
                                    </x-slot>

                                    <x-slot name="content">
                                        <div class="w-60">
                                            <!-- Team Management -->
                                            <div class="block px-4 py-2 text-xs text-gray-400">
                                                {{ __('Manage Team') }}
                                            </div>

                                            <!-- Team Settings -->
                                            <x-dropdown-link
                                                href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                                {{ __('Team Settings') }}
                                            </x-dropdown-link>

                                            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                                <x-dropdown-link href="{{ route('teams.create') }}">
                                                    {{ __('Create New Team') }}
                                                </x-dropdown-link>
                                            @endcan

                                            <!-- Team Switcher -->
                                            @if (Auth::user()->allTeams()->count() > 1)
                                                <div class="border-t border-gray-200 dark:border-gray-600"></div>

                                                <div class="block px-4 py-2 text-xs text-gray-400">
                                                    {{ __('Switch Teams') }}
                                                </div>

                                                @foreach (Auth::user()->allTeams() as $team)
                                                    <x-switchable-team :team="$team" />
                                                @endforeach
                                            @endif
                                        </div>
                                    </x-slot>
                                </x-dropdown>
                            </div>
                        @endif
                    @endauth
                    <!-- Teams Dropdown -->

                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        @auth
                            <!-- Settings Dropdown -->
                            <x-dropdown align="right" class="ms-3" width="48">
                                <x-slot name="trigger">
                                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                        <button
                                            class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                            <img class="h-8 w-8 rounded-full object-cover"
                                                src="{{ Auth::user()->profile_photo_url }}"
                                                alt="{{ Auth::user()->name }}" />
                                        </button>
                                    @else
                                        <span class="inline-flex rounded-md">
                                            <button type="button"
                                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">
                                                {{ Auth::user()->name }}

                                                <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                                </svg>
                                            </button>
                                        </span>
                                    @endif
                                </x-slot>

                                <x-slot name="content">
                                    <!-- Account Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Account') }}
                                    </div>

                                    <x-dropdown-link href="{{ route('profile.show') }}">
                                        {{ __('Profile') }}
                                    </x-dropdown-link>

                                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                        <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                            {{ __('API Tokens') }}
                                        </x-dropdown-link>
                                    @endif

                                    <div class="border-t border-gray-200 dark:border-gray-600"></div>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}" x-data>
                                        @csrf

                                        <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        @else
                            @if (Route::has('login'))
                                <a href="{{ route('login') }}"
                                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-white dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                                    in</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-white dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                                @endif
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('home') }}" :active="request()->routeIs('home.*')">
                Home
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('patinetes.index') }}" :active="request()->routeIs('patinetes.*')">
                Patinetes
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('bicicletas.index') }}" :active="request()->routeIs('bicicletas.*')">
                Bicicletas
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('accesorios.index') }}" :active="request()->routeIs('accesorios.*')">
                Accesorios
            </x-responsive-nav-link>
            @auth
                @if (Auth::user()->is_admin == 'SI')
                    <x-dropdown align='left'>
                        <x-slot name=trigger>
                            <button type="button"
                                class="inline-flex items-center px-3 py-2 border border-transparent leading-4 font-medium rounded-md text-gray-600 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">
                                Administracion

                                <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </button>
                        </x-slot>
                        <x-slot name=content>
                            <div class="w-30">
                                <x-dropdown-link href="{{ route('categories.index') }}">
                                    Category
                                </x-dropdown-link>
                                <x-dropdown-link href="{{ route('users.index') }}">
                                    Users
                                </x-dropdown-link>
                                <x-dropdown-link href="{{ route('todos-productos.index') }}">
                                    Products
                                </x-dropdown-link>
                                <x-dropdown-link href="{{ route('todos-pedidos.index') }}">
                                    Pedidos
                                </x-dropdown-link>
                            </div>
                        </x-slot>

                    </x-dropdown>
                @else
                    <x-responsive-nav-link href="{{ route('pedidos.index') }}" :active="request()->routeIs('pedidos.*')">
                        Mis Pedidos
                    </x-responsive-nav-link>
                @endif
                
            @endauth

        </div>
        @auth
            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                <div class="flex items-center px-4">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <div class="shrink-0 me-3">
                            <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                                alt="{{ Auth::user()->name }}" />
                        </div>
                    @endif

                    <div>
                        <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>

                <div class="mt-3 space-y-1">
                    <!-- Account Management -->
                    <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                            {{ __('API Tokens') }}
                        </x-responsive-nav-link>
                    @endif

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf

                        <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>

                    <!-- Team Management -->
                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                        <div class="border-t border-gray-200 dark:border-gray-600"></div>

                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Team') }}
                        </div>

                        <!-- Team Settings -->
                        <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}"
                            :active="request()->routeIs('teams.show')">
                            {{ __('Team Settings') }}
                        </x-responsive-nav-link>

                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                            <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                                {{ __('Create New Team') }}
                            </x-responsive-nav-link>
                        @endcan

                        <!-- Team Switcher -->
                        @if (Auth::user()->allTeams()->count() > 1)
                            <div class="border-t border-gray-200 dark:border-gray-600"></div>

                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Switch Teams') }}
                            </div>

                            @foreach (Auth::user()->allTeams() as $team)
                                <x-switchable-team :team="$team" component="responsive-nav-link" />
                            @endforeach
                        @endif
                    @endif
                </div>
            </div>
        @endauth

    </div>
</nav>
<script>
    function toggleTheme() {
        //Guardamos en localStorage la variable theme e iremos cambiandola. 
        //Si no existe la pondremos en modo claro
        //Obtenemos los iconos para ir mostrando/ocultando segun interes
        let currentTheme = localStorage.getItem('theme');
        /* var iconoSol = document.getElementById('iconoSol');
        var iconoLuna = document.getElementById('iconoLuna'); */
        var iconoCarrito = document.getElementById('icon-cart');
        let iconoDarkMode = document.getElementById('theme');

        if (currentTheme === 'dark') {
            localStorage.setItem('theme', 'ligth');
            /* iconoLuna.removeAttribute('hidden');
            iconoSol.setAttribute('hidden', true); */
            /* iconoDarkMode.checked = false; */
            if (iconoCarrito) {
                iconoCarrito.setAttribute('style', 'color: black');
            }
            document.documentElement.classList.remove('dark');
        } else {
            localStorage.setItem('theme', 'dark');
            /* iconoSol.removeAttribute('hidden');
            iconoLuna.setAttribute('hidden', true); */
            /* iconoDarkMode.checked = true; */
            if (iconoCarrito) {
                iconoCarrito.setAttribute('style', 'color: white');
            }
            document.documentElement.classList.add('dark');
        }
    }
</script>
