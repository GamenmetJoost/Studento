<x-app-layout>
    <main class="max-w-5xl mx-auto px-4 py-10">
        <h1 class="text-3xl font-bold mb-2 text-gray-900 dark:text-gray-100">Toets ingeleverd</h1>
        <p class="text-gray-600 dark:text-gray-400 mb-6">Categorie: {{ $category->sector }} - {{ $category->category }}</p>

        <div class="mb-8 p-6 rounded-lg bg-white dark:bg-gray-800 shadow flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <p class="text-xl font-semibold text-gray-800 dark:text-gray-100">Score</p>
                <p class="text-4xl font-bold mt-1 text-emerald-600">{{ $score }} / {{ $total }}</p>
                <p class="mt-1 text-sm text-gray-500">{{ number_format(($score / max(1,$total)) * 100, 1) }}% juist</p>
            </div>
            <div class="text-sm text-gray-500 dark:text-gray-400">
                @php
                    $userTz = auth()->user()->timezone ?? 'Europe/Amsterdam';
                    $dt = \Carbon\Carbon::parse($completed_at, 'UTC')->timezone($userTz);
                @endphp
                Ingeleverd op: {{ $dt->format('d-m-Y H:i') }} <span class="text-xs">({{ $dt->timezone->getName() }})</span>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('toetsen.category', ['category_id' => $category->id]) }}" class="px-4 py-2 rounded bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-600">Opnieuw maken</a>
                <a href="{{ route('dashboard') }}" class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700">Terug naar dashboard</a>
            </div>
        </div>

        <h2 class="text-2xl font-semibold mb-4 text-gray-900 dark:text-gray-100">Overzicht antwoorden</h2>
        <div class="space-y-6">
            @foreach($review as $item)
                <div class="p-5 rounded-lg bg-white dark:bg-gray-800 shadow border {{ $item['user_answer_is_correct'] ? 'border-emerald-300' : 'border-red-300' }}">
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <p class="font-semibold text-gray-800 dark:text-gray-100 mb-2 whitespace-pre-line">Vraag {{ $loop->iteration }}: {{ $item['question_text'] }}</p>
                            <div class="space-y-1 text-sm">
                                @if($item['fallback_boolean'])
                                    <div class="flex items-center gap-2">
                                        <span class="inline-block px-2 py-1 rounded text-xs font-medium {{ $item['fallback_selected'] === 'true' ? 'bg-blue-600 text-white' : 'bg-gray-200 dark:bg-gray-700 dark:text-gray-300' }}">Waar</span>
                                        <span class="inline-block px-2 py-1 rounded text-xs font-medium {{ $item['fallback_selected'] === 'false' ? 'bg-blue-600 text-white' : 'bg-gray-200 dark:bg-gray-700 dark:text-gray-300' }}">Niet waar</span>
                                    </div>
                                    <div class="mt-2 text-sm">
                                        Juiste antwoord: <strong>{{ $item['correct_choice_text'] }}</strong>
                                    </div>
                                @else
                                    @foreach($item['choices'] as $choice)
                                        <div class="flex items-center gap-2">
                                            <span class="inline-block w-10 font-semibold">{{ $choice['identifier'] }}</span>
                                            <span class="flex-1 {{ $choice['is_selected'] ? 'font-semibold' : '' }}">{{ $choice['text'] }}</span>
                                            @if($choice['is_correct'])
                                                <span class="text-emerald-600 text-xs font-medium">JUIST</span>
                                            @endif
                                            @if(!$choice['is_correct'] && $choice['is_selected'])
                                                <span class="text-red-500 text-xs font-medium">GEKOZEN</span>
                                            @endif
                                        </div>
                                    @endforeach
                                    <div class="mt-2 text-sm">
                                        Juiste antwoord: <strong>
                                            @php
                                                $correct = collect($item['choices'])->firstWhere('is_correct', true);
                                            @endphp
                                            {{ $correct['identifier'] ?? '' }}
                                        </strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div>
                            @if($item['user_answer_is_correct'])
                                <span class="inline-block px-3 py-1 rounded bg-emerald-100 text-emerald-700 text-xs font-semibold">Goed</span>
                            @else
                                <span class="inline-block px-3 py-1 rounded bg-red-100 text-red-700 text-xs font-semibold">Fout</span>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
</x-app-layout>
