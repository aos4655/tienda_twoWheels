@props(['id', 'maxWidth'])

@php
    $id = $id ?? md5($attributes->wire('model'));

    $maxWidth = [
        'sm' => 'sm:max-w-sm',
        'md' => 'sm:max-w-md',
        'lg' => 'sm:max-w-lg',
        'xl' => 'sm:max-w-xl',
        '2xl' => 'sm:max-w-2xl',
    ][$maxWidth ?? '2xl'];
@endphp

<div x-data="{ show: @entangle($attributes->wire('model')) }" x-on:close.stop="show = false" x-on:keydown.escape.window="show = false" x-show="show"
    id="{{ $id }}" class="fixed inset-0 px-4 py-6 sm:px-0 z-50 flex items-center justify-end m-4"
    style="display: none;">
    <!-- Fondo oscuro transparente al hacer clic fuera del modal -->
    <div x-show="show" class="fixed inset-0  opacity-75" x-on:click="show = false"
        x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"></div>

    <!-- Contenedor principal del modal -->
    <div x-show="show"
        class="justify-start bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:max-w-lg md:mt-10"
        style="max-height: calc(100vh - 100px);" 
        x-transition:enter="transition-transform ease-out duration-300"
        x-transition:enter-start=" translate-x-full sm:translate-x-full"
        x-transition:enter-end="translate-x-0 sm:translate-x-0"
        x-transition:leave="transition-transform ease-in duration-300"
        x-transition:leave-start="translate-x-0" 
        x-transition:leave-end="translate-x-full">
        {{ $slot }}
    </div>
</div>
