<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                  {{--  {{ __("To DO form to posts") }} --}}
                   
                  <form method="POST" action="{{ route('posts.store') }}">
                    @csrf
                    <textarea name="message"
                    class="block w-full rounded-md border-gray-300 bg-white shadow-sm
                    @error('message') border-red-300 @enderror      
                    focus:border-red-900 focus:ring focus:ring-yellow-200 focus:ring-opacity-50
                    dark: border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-indigo-300 dark:focus:ring dark:focus:ring-indigo-200 dark:focus:ring-opacity-50"
                    placeholder="{{ __('What\'s do you think') }}"
                    >{{old('message') }}</textarea>
                   {{-- <inputtype="text"value="old('nombredelcampo') --}}
                   {{-- Metodo para ver errores con BLADE --}}
                    {{-- <divclass="mt-3">@error('message')$message  @enderror</div> --}} 
                         {{-- Metodo para ver errores con Tailwind --}}
                   <x-input-error :messages="$errors->get('message')"/> 
                    <x-primary-button>
                    {{__("posting") }}
                    </x-primary-button>
                  </form>
                </div>
            </div>
        </div>
    </div>

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex items-center justify-center">
        <div class="w-full max-w-md bg-white dark:bg-gray-800 rounded-lg shadow-xl p-8">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">Bienvenido a Tailwind CSS</h2>
            <p class="text-gray-600 dark:text-gray-300 mb-4">
                Tailwind CSS es un framework de CSS que facilita la creación de interfaces de usuario personalizadas con clases utilitarias.
            </p>
            <button class="mt-4 w-full px-6 py-3 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                Comienza ahora
            </button>
        </div>
        
    </div>

   
   

</x-app-layout>
