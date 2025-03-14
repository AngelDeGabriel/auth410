
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
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
