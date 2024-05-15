<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="input-container">
                <input value="{{ old('name') }}" name="name" placeholder="Nombre" class="input-field"
                    type="text">
                <label for="input-field" class="input-label">Nombre</label>
                <span class="input-highlight"></span>
            </div>
            <div class="input-container  ">
                <input value="{{ old('email') }}" name="email" placeholder="Email" class="input-field"
                    type="email">
                <label for="input-field" class="input-label">Email</label>
                <span class="input-highlight"></span>
            </div>
            <div class="input-container  ">
                <input name="password" placeholder="Contraseña" class="input-field" type="password">
                <label for="input-field" class="input-label">Contraseña</label>
                <span class="input-highlight"></span>
            </div>
            <div class="input-container  ">
                <input name="password_confirmation"  placeholder="Contraseña" class="input-field" type="password">
                <label for="input-field" class="input-label">Confirmar Contraseña</label>
                <span class="input-highlight"></span>
            </div>
            {{-- <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div> --}}

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                    Ya tienes cuenta?
                </a>

                <x-button class="ms-4">
                    Registrarse
                </x-button>
            </div>
        </form>
        <style>

            /* Input container */
            .input-container {
                position: relative;
                margin: 20px;
                margin-top: 35px;
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
                background-color: #ff9900;
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
