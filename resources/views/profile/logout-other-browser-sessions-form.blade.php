<x-action-section>
    <x-slot name="title">
        Sesiones del navegador
    </x-slot>

    <x-slot name="description">
        Administre y cierre la sesión de sus sesiones activas en otros navegadores y dispositivos.
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm ">
            Si es necesario, puede cerrar sesión en todas las otras sesiones de su navegador en todos sus dispositivos.
            A continuación se enumeran algunas de sus sesiones recientes; sin embargo, esta lista puede no ser
            exhaustiva. Si cree que su cuenta se ha visto comprometida, también debe actualizar su contraseña.
        </div>

        @if (count($this->sessions) > 0)
            <div class="mt-5 space-y-6">
                <!-- Other Browser Sessions -->
                @foreach ($this->sessions as $session)
                    <div class="flex items-center">
                        <div>
                            @if ($session->agent->isDesktop())
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-8 h-8 ">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-8 h-8 ">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                                </svg>
                            @endif
                        </div>

                        <div class="ms-3">
                            <div class="text-sm ">
                                {{ $session->agent->platform() ? $session->agent->platform() : __('Unknown') }} -
                                {{ $session->agent->browser() ? $session->agent->browser() : __('Unknown') }}
                            </div>

                            <div>
                                <div class="text-xs ">
                                    {{ $session->ip_address }},

                                    @if ($session->is_current_device)
                                        <span class="text-green-500 font-semibold">Este dispositivo</span>
                                    @else
                                        Ultimo activo {{ $session->last_active }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="flex items-center mt-5">
            <x-button wire:click="confirmLogout" wire:loading.attr="disabled">
                Cerrar sesión en otras sesiones del navegador.
            </x-button>

            <x-action-message class="ms-3" on="loggedOut">
                Hecho.
            </x-action-message>
        </div>

        <!-- Log Out Other Devices Confirmation Modal -->
        <x-dialog-modal wire:model.live="confirmingLogout">
            <x-slot name="title">
                Cerrar sesión en otras sesiones del navegador.
            </x-slot>

            <x-slot name="content">
                Ingrese su contraseña para confirmar que desea cerrar sesión en sus otras sesiones del navegador en
                todos sus dispositivos.

                <div class="mt-4" x-data="{}"
                    x-on:confirming-logout-other-browser-sessions.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-input type="password" class="mt-1 block w-3/4" autocomplete="current-password"
                        placeholder="Contraseña" x-ref="password" wire:model="password"
                        wire:keydown.enter="logoutOtherBrowserSessions" />

                    <x-input-error for="password" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('confirmingLogout')" wire:loading.attr="disabled">
                    Cancelar
                </x-secondary-button>

                <x-button class="ms-3" wire:click="logoutOtherBrowserSessions" wire:loading.attr="disabled">
                    Cerrar sesión en otras sesiones del navegador
                </x-button>
            </x-slot>
        </x-dialog-modal>
    </x-slot>
</x-action-section>
