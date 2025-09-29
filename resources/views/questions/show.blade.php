<x-app-layout>
    <x-page-title>
        Vraag Details
    </x-page-title>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6">

            <!-- Vraag titel -->
            <h2 class="text-lg font-semibold mb-4 text-gray-800 dark:text-gray-200">
                Vraag: {{ $question->question_text }}
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Linkerkant -->
                <div>
                    <p class="text-gray-700 dark:text-gray-300">
                        <span class="font-semibold">ID:</span> {{ $question->id }}
                    </p>
                    <p class="text-gray-700 dark:text-gray-300">
                        <span class="font-semibold">Sector:</span>
                        {{ $question->category?->sector ?? 'Geen sector' }}
                    </p>
                    <p class="text-gray-700 dark:text-gray-300">
                        <span class="font-semibold">Categorie:</span>
                        {{ $question->category?->category ?? 'Geen categorie' }}
                    </p>
                </div>

                <!-- Rechterkant -->
                <div>
                    <p class="text-gray-700 dark:text-gray-300 font-semibold mb-2">
                        Mogelijke antwoorden:
                    </p>
                    <ul class="list-disc pl-5 space-y-2">
                        @forelse($question->choices as $choice)
                            <li class="text-gray-800 dark:text-gray-200">
                                {{ $choice->choice_text }}
                                @if($choice->is_correct)
                                    <span class="ml-2 text-green-600 dark:text-green-400 font-semibold">
                                        ✔
                                    </span>
                                @endif
                            </li>
                        @empty
                            <li class="text-gray-500 dark:text-gray-400 italic">
                                Geen keuzes beschikbaar.
                            </li>
                        @endforelse
                    </ul>
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
