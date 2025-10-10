<x-app-layout>
    <main class="flex flex-col items-center justify-center bg-gray-100 dark:bg-gray-900 px-4 py-12">

        <!-- Saved Message -->
        @if(session('saved'))
            <div class="mb-4 p-2 rounded bg-emerald-200 text-emerald-800 dark:bg-emerald-900/40 dark:text-emerald-200 text-sm">Antwoord opgeslagen.</div>
        @endif

        <!-- Completion Message -->
        @if(session('completed'))
            <div class="mb-4 p-4 rounded-lg bg-blue-100 border border-blue-400 text-blue-700 dark:bg-blue-900/40 dark:border-blue-500 dark:text-blue-200">
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
            @php
                $marked = session('quiz.category.' . $category->id . '.marked', []);
                $isMarked = in_array($currentQuestion->id, $marked);
            @endphp
            <form method="POST" action="{{ route('toetsen.mark', ['category_id' => $category->id]) }}" class="mt-4 inline-block">
                @csrf
                <input type="hidden" name="question_id" value="{{ $currentQuestion->id }}">
                <input type="hidden" name="vraag" value="{{ $vraagNummer }}">
                <button type="submit" class="px-3 py-1 rounded text-sm font-medium transition
                    {{ $isMarked ? 'bg-amber-500 hover:bg-primary-orange text-white' : 'bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-600' }}">
                    {{ $isMarked ? 'Gemarkeerd ✱' : 'Markeren' }}
                </button>
            </form>
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
                                peer-checked:border-blue-600 peer-checked:ring-2 peer-checked:ring-blue-300 dark:peer-checked:ring-blue-500
                                {{ $selected == $choice->id ? 'bg-blue-200 dark:bg-blue-600/30 border-primary_blue dark:border-blue-400' : 'bg-white dark:bg-gray-700 border-gray-300 dark:border-gray-600 hover:border-blue-300 dark:hover:border-blue-400' }}
                                text-gray-900 dark:text-white">
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
                        <div class="w-32 py-3 bg-green-500 text-white rounded-lg shadow hover:bg-green-600 peer-checked:ring-4 ring-green-300 dark:ring-green-500">Waar</div>
                    </label>
                    <label>
                        <input type="radio" name="answer" value="false" class="hidden peer" @checked($selected === 'false') onchange="this.form.submit()">
                        <div class="w-32 py-3 bg-red-500 text-white rounded-lg shadow hover:bg-red-600 peer-checked:ring-4 ring-red-300 dark:ring-red-500">Niet waar</div>
                    </label>
                </div>
            @endif
        </form>

        <!-- Navigation -->
        <div class="mt-8 flex justify-between items-center w-full max-w-2xl">
            @if($vraagNummer > 1)
                <a href="{{ route('toetsen.category', ['category_id' => $category->id, 'vraag' => $vraagNummer - 1]) }}" 
                   class="px-4 py-2 bg-primary_pink text-white rounded hover:bg-gray-600">
                    ← Vorige vraag
                </a>
            @else
                <div></div>
            @endif

            @if($vraagNummer < $questions->count())
                <a href="{{ route('toetsen.category', ['category_id' => $category->id, 'vraag' => $vraagNummer + 1]) }}" 
                   class="px-4 py-2 bg-primary_blue text-white rounded hover:bg-gray-600">
                    Volgende vraag →
                </a>
            @else
                <form method="POST" action="{{ route('toetsen.finish', ['category_id' => $category->id]) }}">
                    @csrf
                    <button type="submit" class="px-6 py-2 bg-emerald-600 text-white rounded hover:bg-emerald-700 shadow">Afronden &amp; Inleveren</button>
                </form>
            @endif
        </div>

        <!-- Vragen overzicht -->
        <div class="mt-10 w-full max-w-4xl bg-white dark:bg-gray-800 rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold mb-4 text-gray-800 dark:text-gray-100">Vragenoverzicht</h3>
            @php
                $selections = session('quiz.category.' . $category->id . '.selections', []);
                $marked = session('quiz.category.' . $category->id . '.marked', []);
            @endphp
            <div class="grid grid-cols-8 sm:grid-cols-10 md:grid-cols-12 gap-2 text-sm">
                @foreach($questions as $idx => $q)
                    @php
                        $num = $idx + 1;
                        $answered = array_key_exists($q->id, $selections);
                        $isMarked = in_array($q->id, $marked);
                        $isCurrent = $num === (int)$vraagNummer;
                    @endphp
                    <a href="{{ route('toetsen.category', ['category_id' => $category->id, 'vraag' => $num]) }}"
                       class="relative flex items-center justify-center h-10 rounded border text-xs font-medium transition
                        {{ $isCurrent ? 'ring-2 ring-blue-500 border-blue-500' : 'border-gray-300 dark:border-gray-600' }}
                        {{ $answered ? 'bg-emerald-100 dark:bg-emerald-600/30 text-emerald-800 dark:text-emerald-200' : 'bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300' }}
                        hover:border-blue-400 hover:bg-blue-50 dark:hover:bg-blue-600/30">
                        {{ $num }}
                        @if($isMarked)
                            <span class="absolute -top-1 -right-1 w-3 h-3 rounded-full bg-amber-500 border border-white dark:border-gray-800"></span>
                        @endif
                    </a>
                @endforeach
            </div>
            <div class="mt-4 flex flex-wrap gap-4 text-xs text-gray-600 dark:text-gray-400">
                <div class="flex items-center gap-1"><span class="w-4 h-4 rounded bg-emerald-200 border border-emerald-400 dark:bg-emerald-600/30 dark:border-emerald-500 inline-block"></span> Beantwoord</div>
                <div class="flex items-center gap-1"><span class="w-4 h-4 rounded bg-gray-200 border border-gray-400 dark:bg-gray-700 dark:border-gray-600 inline-block"></span> Onbeantwoord</div>
                <div class="flex items-center gap-1 relative"><span class="w-4 h-4 rounded bg-gray-200 border border-gray-400 dark:bg-gray-700 dark:border-gray-600 inline-block relative"><span class="absolute -top-0.5 -right-0.5 w-2 h-2 rounded-full bg-amber-500 border border-white dark:border-gray-800"></span></span> Gemarkeerd</div>
                <div class="flex items-center gap-1"><span class="w-4 h-4 rounded bg-white dark:bg-transparent border-2 border-blue-500 dark:border-blue-400 inline-block"></span> Huidige</div>
            </div>
        </div>

    </main>
</x-app-layout>
