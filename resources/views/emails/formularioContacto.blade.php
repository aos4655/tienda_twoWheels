<x-app-layout>
    <x-principal-home>
        <div class="pt-10 bg-[#EFFAEB] dark:bg-blue-900">
            <div class="h-3/4 flex flex-col items-center pt-6 sm:pt-0">
                <div class="md:w-1/2 w-11/12 my-10 p-6 bg-white dark:bg-blue-800 shadow-md dark:text-white overflow-hidden sm:rounded-lg">
                    <h1 class="text-4xl font-medium">Contáctanos</h1>
                    <p class="my-3">Envíanos un email a twowheels.almeria@gmail.com o escribe tu mensaje aquí:</p>
                    <form method="POST" action="{{ route('contactanos.enviar') }}">
                        @csrf
                        <div class="mb-5">
                            <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                            <input type="text" id="nombre" value="{{ old('nombre') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-blue-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-600" placeholder="Nombre..." name="nombre">
                            <x-input-error for="nombre" class="italic mt-1" />
                        </div>
                        <div class="mb-5">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            @auth
                                <input type="email" id="email" value="{{ auth()->user()->email }}" readonly class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-blue-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-600" placeholder="Email..." name="email" />
                            @else
                                <input type="email" id="email" value="{{ old('email') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-blue-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-600" placeholder="Email..." name="email" />
                            @endauth
                            <x-input-error for="email" class="italic mt-1" />
                        </div>
                        <div class="mb-5">
                            <label for="contenido" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contenido</label>
                            <textarea id="contenido" rows="5" class="bg-gray-50 resize-none border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-blue-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-600" name="contenido">{{ old('contenido') }}</textarea>
                            <x-input-error for="contenido" class="italic mt-1" />
                        </div>
                        <div class="flex flex-row-reverse">
                            <button type="submit" class="ml-2 bg-green-400 hover:bg-green-500 text-white font-bold py-2 px-4 rounded transition duration-300">
                                <i class="fas fa-paper-plane"></i> ENVIAR
                            </button>
                            <button type="reset" class="ml-2 bg-blue-400 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded transition duration-300">
                                <i class="fas fa-paint-brush"></i> LIMPIAR
                            </button>
                            <a href="{{ route('home') }}" class="ml-2 bg-red-400 hover:bg-red-500 text-white font-bold py-2 px-4 rounded transition duration-300">
                                <i class="fas fa-times"></i> CANCELAR
                            </a>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-principal-home>
</x-app-layout>
