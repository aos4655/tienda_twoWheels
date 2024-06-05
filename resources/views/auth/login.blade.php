<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ session('status') }}
            </div>
        @endif


        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="input-container">
                <input required value="{{ old('email') }}" name="email" placeholder="Email" class="input-field"
                    type="email">
                <label for="input-field" class="input-label">Email</label>
                <span class="input-highlight"></span>
            </div>
            <div class="input-container">
                <input required name="password" placeholder="Contraseña" class="input-field" type="password">
                <label for="input-field" class="input-label">Contraseña</label>
                <span class="input-highlight"></span>
            </div>
            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">Recordarme</span>
                </label>
            </div>

            <div class="flex flex-col  justify-between mt-4">
                <div class="flex items-start">

                    <div class="flex flex-col my-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                href="{{ route('password.request') }}">
                                Has olvidado tu contraseña?
                            </a>
                        @endif
                        <a href="{{ route('register') }}">Registrarme</a>
                    </div>
                </div>
                <div class="flex  justify-start md:justify-between items-center mx-auto md:mx-0">
                    <a href="{{route('auth.google')}}"
                        class="text-white bg-[#4285F4] hover:bg-[#4285F4]/90 focus:ring-4 focus:outline-none focus:ring-[#4285F4]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#4285F4]/55 me-2 ">
                        <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 18 19">
                            <path fill-rule="evenodd"
                                d="M8.842 18.083a8.8 8.8 0 0 1-8.65-8.948 8.841 8.841 0 0 1 8.8-8.652h.153a8.464 8.464 0 0 1 5.7 2.257l-2.193 2.038A5.27 5.27 0 0 0 9.09 3.4a5.882 5.882 0 0 0-.2 11.76h.124a5.091 5.091 0 0 0 5.248-4.057L14.3 11H9V8h8.34c.066.543.095 1.09.088 1.636-.086 5.053-3.463 8.449-8.4 8.449l-.186-.002Z"
                                clip-rule="evenodd" />
                        </svg>
                        Sign in with Google
                    </a>
                    <x-button class="ms-4 py-2.5">
                        ACCEDER
                    </x-button>
                </div>
            </div>
        </form>
        <style>
            /* Input container */
            .input-container {
                position: relative;
                margin: 20px;
            }

            /* Input field */
            .input-field {
                display: block;
                width: 100%;
                padding: 10px;
                font-size: 16px;
                border: none;
                border-bottom: 2px solid #ccc;
                outline: none;
                background-color: transparent;
            }

            /* Input label */
            .input-label {
                position: absolute;
                top: 0;
                left: 0;
                font-size: 16px;
                color: rgba(204, 204, 204, 0);
                pointer-events: none;
                transition: all 0.3s ease;
                border-top: transparent;

            }

            /* Input highlight */
            .input-highlight {
                position: absolute;
                bottom: 0;
                left: 0;
                height: 2px;
                width: 0;
                background-color: #072342;
                transition: all 0.3s ease;
            }

            .input-highlight:focus {
                border-color: green;
            }

            /* Input field:focus styles */
            .input-field:focus+.input-label {
                top: -20px;
                font-size: 12px;
                color: #007bff;
                border-top: transparent;
            }

            .input-field:focus+.input-label+.input-highlight {
                width: 100%;
                border-top: transparent;

            }
        </style>
    </x-authentication-card>
</x-guest-layout>
