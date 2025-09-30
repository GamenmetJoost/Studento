<x-app-layout>
    <x-page-title>
        Welkom, {{ Auth::check() ? Auth::user()->name : 'Student' }}
    </x-page-title>

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @php
                $colors = ['#39B9EC', '#E72B76', '#CCD626', '#F2B300'];
                $userId = Auth::id();
                // Filter categorieën waarvoor de gebruiker een quiz attempt heeft
                $categoriesWithQuiz = $categories->filter(function($category) use ($userId) {
                    return $category->quizAttempts()->where('user_id', $userId)->exists();
                })->unique('category')->values();
            @endphp

            @if($categoriesWithQuiz->isEmpty())
                <div class="bg-gray-100 text-gray-700 p-6 rounded-lg shadow-md font-semibold text-center">
                    Je hebt nog geen toetsen gemaakt.
                </div>
            @else
                @foreach($categoriesWithQuiz as $index => $category)
                    @php
                        $color = $colors[$index % count($colors)];
                        $textColor = in_array($color, ['#CCD626', '#F2B300']) ? 'black' : 'white';
                    @endphp

                    <div class="text-white p-6 rounded-lg shadow-md font-semibold text-center mb-4"
                         style="background-color: {{ $color }}; color: {{ $textColor }};">
                        <div class="text-xl mb-2">{{ $category->category }}</div>
                        @if($category->user_quiz_attempts->isEmpty())
                            <div class="bg-gray-100 text-gray-700 p-2 rounded">Geen toetsen gemaakt voor dit onderwerp.</div>
                        @else
                            <table class="min-w-full bg-white border border-gray-200 text-gray-800 mt-4">
                                <thead>
                                    <tr>
                                        <th class="py-2 px-4 border-b">Datum</th>
                                        <th class="py-2 px-4 border-b">Score (%)</th>
                                        <th class="py-2 px-4 border-b">Goede antwoorden</th>
                                        <th class="py-2 px-4 border-b">Totaal vragen</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($category->user_quiz_attempts as $attempt)
                                        <tr>
                                            <td class="py-2 px-4 border-b">
                                                @php
                                                    $userTz = Auth::user()?->timezone ?? 'Europe/Amsterdam';
                                                    $dt = $attempt->finished_at ? $attempt->finished_at->timezone($userTz) : null;
                                                @endphp
                                                {{ $dt ? $dt->format('d-m-Y H:i') : '-' }}
                                                <span class="text-xs text-gray-500">{{ $dt ? '(' . $dt->timezone->getName() . ')' : '' }}</span>
                                            </td>
                                            <td class="py-2 px-4 border-b">{{ $attempt->score_percent }}%</td>
                                            <td class="py-2 px-4 border-b">{{ $attempt->correct_answers }}</td>
                                            <td class="py-2 px-4 border-b">{{ $attempt->total_questions }}</td>
                                            <td class="py-2 px-4 border-b">
                                                <a href="{{ route('quiz_attempt.result', ['attempt' => $attempt->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded">Inzien</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                @endforeach
            @endif

        </div>
    </div>
</x-app-layout>
