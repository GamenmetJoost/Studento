<x-app-layout>
    <x-page-title>
        Categorie: {{ $category->category }}
    </x-page-title>

    <div class="max-w-7xl mx-auto py-6">
        <h2 class="text-lg font-semibold mb-4">
            Vraag {{ $vraagNummer }} van {{ $questions->count() }}
        </h2>

        <div class="p-4 bg-white dark:bg-gray-800 rounded shadow mb-6">
            <p class="mb-4">{{ $currentQuestion->title }}</p>

            @if($currentQuestion->choices)
                <ul class="list-disc pl-6 space-y-1">
                    @foreach($currentQuestion->choices as $choice)
                        <li>{{ $choice->text }}</li>
                    @endforeach
                </ul>
            @endif
        </div>

        <div class="flex justify-between">
            @if($vraagNummer > 1)
                <a href="{{ route('toetsen.category', ['category' => $category->id, 'vraag' => $vraagNummer - 1]) }}"
                   class="px-4 py-2 bg-gray-300 rounded">Vorige</a>
            @endif

            @if($vraagNummer < $questions->count())
                <a href="{{ route('toetsen.category', ['category' => $category->id, 'vraag' => $vraagNummer + 1]) }}"
                   class="px-4 py-2 bg-blue-500 text-white rounded">Volgende</a>
            @endif
        </div>
    </div>
</x-app-layout>
