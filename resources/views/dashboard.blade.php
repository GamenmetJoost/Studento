<x-app-layout>
    <x-page-title>
        Dashboard
    </x-page-title>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    {{-- Simpele pop up met checkboxes --}}
    <div 
        x-data="{ open: true }" 
        x-show="open" 
        x-transition 
        x-cloak
        class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 z-50"
    >
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-96">
            <h2 class="text-xl font-bold mb-4 text-gray-900 dark:text-white">Welkom {{ Auth::check() ? Auth::user()->name : 'Student' }}!</h2>
            <p class="mb-4 text-gray-700 dark:text-gray-300">
                Kies de onderwerpen die je interessant vindt:
            </p>

            <div class="mb-4">
                <label class="flex items-center mb-2">
                    <input type="checkbox" class="form-checkbox h-4 w-4 text-blue-600">
                    <span class="ml-2 text-gray-700 dark:text-gray-300">Onderwerp 1</span>
                </label>
                <label class="flex items-center mb-2">
                    <input type="checkbox" class="form-checkbox h-4 w-4 text-blue-600">
                    <span class="ml-2 text-gray-700 dark:text-gray-300">Onderwerp 2</span>
                </label>
                <label class="flex items-center mb-2">
                    <input type="checkbox" class="form-checkbox h-4 w-4 text-blue-600">
                    <span class="ml-2 text-gray-700 dark:text-gray-300">Onderwerp 3</span>
                </label>
                <label class="flex items-center mb-2">
                    <input type="checkbox" class="form-checkbox h-4 w-4 text-blue-600">
                    <span class="ml-2 text-gray-700 dark:text-gray-300">Onderwerp 4</span>
                </label>
            </div>

            <div class="flex justify-end">
                <button 
                    @click="open = false" 
                    class="px-4 py-2 bg-blue-600 text-white rounded"
                >
                    Sluiten
                </button>
            </div>
        </div>
    </div>
</x-app-layout>
