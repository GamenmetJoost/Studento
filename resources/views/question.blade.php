<x-app-layout>
    <main class="flex flex-col items-center justify-center bg-gray-100 dark:bg-gray-900 px-4 py-12">

        <!-- Category Info -->
        <div class="mb-2 text-gray-600 dark:text-gray-400 text-sm">
            Categorie: {{ $category->sector }} - {{ $category->category }}
        </div>

        <!-- Vraag teller -->
        <div class="mb-4 text-gray-900 dark:text-white text-lg font-semibold">
            Vraag {{ $vraagNummer }}/{{ $questions->count() }}
        </div>

        <!-- Vraag -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 w-full max-w-2xl text-center mb-6">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white whitespace-pre-line">
                {{ $currentQuestion->question_text }}
            </h2>
        </div>

        <!-- Antwoorden -->
        <form method="POST" class="w-full max-w-2xl text-center">
            @csrf
            <input type="hidden" name="question_id" value="{{ $currentQuestion->id }}">
            
            @if($currentQuestion->choices->count() > 0)
                <div class="space-y-3">
                    @foreach($currentQuestion->choices as $choice)
                        <button type="submit" name="answer" value="{{ $choice->id }}" 
                            class="w-full py-3 px-4 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600 text-left">
                            {{ $choice->identifier }}: {{ $choice->choice_text }}
                        </button>
                    @endforeach
                </div>
            @else
                <!-- Fallback voor waar/niet waar vragen -->
                <div class="flex justify-center gap-6">
                    <button type="submit" name="answer" value="true" 
                        class="w-32 py-3 bg-green-500 text-white rounded-lg shadow hover:bg-green-600">
                        Waar
                    </button>
                    <button type="submit" name="answer" value="false" 
                        class="w-32 py-3 bg-red-500 text-white rounded-lg shadow hover:bg-red-600">
                        Niet waar
                    </button>
                </div>
            @endif
        </form>

        <!-- Navigation -->
        <div class="mt-6 flex justify-between w-full max-w-2xl">
            @if($vraagNummer > 1)
                <a href="{{ route('toetsen.category', ['category_id' => $category->id, 'vraag' => $vraagNummer - 1]) }}" 
                   class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                    ← Vorige vraag
                </a>
            @else
                <div></div>
            @endif

            @if($vraagNummer < $questions->count())
                <a href="{{ route('toetsen.category', ['category_id' => $category->id, 'vraag' => $vraagNummer + 1]) }}" 
                   class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                    Volgende vraag →
                </a>
            @else
                <div></div>
            @endif
        </div>

    </main>
</x-app-layout>
