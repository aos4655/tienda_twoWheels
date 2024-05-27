@props(['id' => null, 'maxWidth' => null])

<x-modal-cart :id="$id" :maxWidth="$maxWidth" class="mt-8" {{ $attributes}}>
    <div class="px-6 py-4 ">
        <div class="text-lg font-medium text-gray-900 text-center dark:text-gray-100">
            {{ $title }}
        </div>

        <div class="mt-4 text-sm text-gray-600 dark:text-gray-400 md:max-h-80 md:overflow-auto overflow-y-auto h-72 md:h-full"

        :style="'max-height: ' + (window.innerWidth >= 768 ? '60vh' : 'none')">
            {{ $content }}
        </div>
    </div>

    <div class="flex flex-col justify-end px-6 py-4 bg-gray-100 dark:bg-gray-800 text-end">
        {{ $footer }}
    </div>
</x-modal-cart>
