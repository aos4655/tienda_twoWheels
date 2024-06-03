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
            <!-- <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>
        -->
            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">Recordarme</span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-4">
                <div class="flex flex-col my-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                            href="{{ route('password.request') }}">
                            Has olvidado tu contraseña?
                        </a>
                    @endif
                    <a href="{{ route('register') }}">Registrarme</a>
                </div>


                <x-button class="ms-4">
                    ACCEDER
                </x-button>
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
