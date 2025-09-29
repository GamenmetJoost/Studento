<x-app-layout>
    <x-page-title>
        Vraag Details
    </x-page-title>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6">

            <!-- Vraag details -->
            <h2 class="text-lg font-semibold mb-4 text-gray-800 dark:text-gray-200">
                {{ $question->title }}
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <p class="text-gray-700 dark:text-gray-300">
                        <span class="font-semibold">ID:</span> {{ $question->id }}
                    </p>
                    <p class="text-gray-700 dark:text-gray-300">
                        <span class="font-semibold">Categorie:</span>
                        {{ $question->category?->name ?? 'Geen categorie' }}
                    </p>
                    <p class="text-gray-700 dark:text-gray-300">
                        <span class="font-semibold">Subcategorie:</span>
                        {{ $question->category?->subcategory ?? 'Geen subcategorie' }}
                    </p>
                </div>

                <div>
                    <p class="text-gray-700 dark:text-gray-300">
                        <span class="font-semibold">Beschrijving:</span>
                    </p>
                    <p class="text-gray-600 dark:text-gray-400 mt-1">
                        {{ $question->description ?? 'Geen beschrijving beschikbaar.' }}
                    </p>
                </div>
            </div>

            <!-- Terug knop -->
            <div class="mt-6">
                <a href="{{ route('questions.index') }}"
                   class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Terug naar alle vragen
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
