<x-app-layout>
    <main class="flex flex-col items-center justify-center bg-gray-100 dark:bg-gray-900 px-4 py-12">

        <!-- Saved Message -->
        @if(session('saved'))
            <div class="mb-4 p-2 rounded bg-emerald-200 text-emerald-800 text-sm">Antwoord opgeslagen.</div>
        @endif

        <!-- Completion Message -->
        @if(session('completed'))
            <div class="mb-4 p-4 rounded-lg bg-blue-100 border border-blue-400 text-blue-700">
                <strong>{{ session('message') }}</strong>
                <div class="mt-2">
                    <a href="{{ route('dashboard') }}" class="text-blue-600 underline">Terug naar dashboard</a>
                </div>
            </div>
        @endif

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
        <form method="POST" action="{{ route('toetsen.submit', ['category_id' => $category->id]) }}" class="w-full max-w-2xl text-center space-y-4">
            @csrf
            <input type="hidden" name="question_id" value="{{ $currentQuestion->id }}">
            
            @if($currentQuestion->choices->count() > 0)
                @php
                    $selections = session('quiz.category.' . $category->id . '.selections', []);
                    $selected = $selections[$currentQuestion->id] ?? null;
                @endphp
                <div class="space-y-3 text-left">
                    @foreach($currentQuestion->choices as $choice)
                        <label class="block cursor-pointer">
                            <input type="radio" name="answer" value="{{ $choice->id }}" class="hidden peer" @checked($selected == $choice->id) onchange="this.form.submit()">
                            <div class="w-full py-3 px-4 rounded-lg border transition shadow-sm
                                peer-checked:border-blue-600 peer-checked:ring-2 peer-checked:ring-blue-300
                                {{ $selected == $choice->id ? 'bg-blue-50 border-blue-600' : 'bg-white dark:bg-gray-700 border-gray-300 dark:border-gray-600 hover:border-blue-300' }}">
                                <span class="font-semibold mr-2">{{ $choice->identifier }}</span> {{ $choice->choice_text }}
                            </div>
                        </label>
                    @endforeach
                </div>
            @else
                <!-- Fallback voor waar/niet waar vragen -->
                <div class="flex justify-center gap-6">
                    @php
                        $selections = session('quiz.category.' . $category->id . '.selections', []);
                        $selected = $selections[$currentQuestion->id] ?? null;
                    @endphp
                    <label>
                        <input type="radio" name="answer" value="true" class="hidden peer" @checked($selected === 'true') onchange="this.form.submit()">
                        <div class="w-32 py-3 bg-green-500 text-white rounded-lg shadow hover:bg-green-600 peer-checked:ring-4 ring-green-300">Waar</div>
                    </label>
                    <label>
                        <input type="radio" name="answer" value="false" class="hidden peer" @checked($selected === 'false') onchange="this.form.submit()">
                        <div class="w-32 py-3 bg-red-500 text-white rounded-lg shadow hover:bg-red-600 peer-checked:ring-4 ring-red-300">Niet waar</div>
                    </label>
                </div>
            @endif
        </form>

        <!-- Navigation -->
        <div class="mt-8 flex justify-between items-center w-full max-w-2xl">
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
                <form method="POST" action="{{ route('toetsen.finish', ['category_id' => $category->id]) }}">
                    @csrf
                    <button type="submit" class="px-6 py-2 bg-emerald-600 text-white rounded hover:bg-emerald-700 shadow">Afronden &amp; Inleveren</button>
                </form>
            @endif
        </div>

    </main>
</x-app-layout>
