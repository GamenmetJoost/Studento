<x-app-layout>
    <div class="container mx-auto py-8">
        <x-page-title>Student statistieken</x-page-title>

        <!-- KPI's -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
                <h3 class="text-lg font-semibold mb-2 text-gray-800 dark:text-gray-200">Totaal pogingen</h3>
                <p class="text-3xl font-bold text-sky-600">{{ $totalAttempts }}</p>
            </div>
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
                <h3 class="text-lg font-semibold mb-2 text-gray-800 dark:text-gray-200">Gemiddelde score</h3>
                <p class="text-3xl font-bold text-pink-600">{{ number_format($avgScore,1) }}%</p>
            </div>
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
                <h3 class="text-lg font-semibold mb-2 text-gray-800 dark:text-gray-200">Gem. duur per poging</h3>
                <p class="text-3xl font-bold text-amber-500">~ {{ gmdate('i\m s\s', $avgDuration) }}</p>
            </div>
        </div>

        <!-- Filters -->
    <form method="GET" class="bg-white dark:bg-gray-800 p-4 rounded shadow mb-6 grid grid-cols-1 md:grid-cols-5 gap-4">
            <div>
                <label class="block text-xs mb-1 text-gray-900 dark:text-white">Zoek</label>
                <input class="border rounded px-3 py-2 w-full" type="text" name="q" value="{{ $filters['q'] }}" placeholder="Naam of e-mail">
            </div>
            <div>
                <label class="block text-xs mb-1 text-gray-900 dark:text-white">Onderwerp</label>
                <select class="border rounded px-3 py-2 w-full" name="category_id">
                    <option value="">Alle</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" @selected($filters['category_id']==$cat->id)>{{ $cat->category }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-xs mb-1 text-gray-900 dark:text-white">Vanaf</label>
                <input class="border rounded px-3 py-2 w-full" type="date" name="from" value="{{ $filters['from'] }}">
            </div>
            <div>
                <label class="block text-xs mb-1 text-gray-900 dark:text-white">Tot</label>
                <input class="border rounded px-3 py-2 w-full" type="date" name="to" value="{{ $filters['to'] }}">
            </div>
            <div class="flex items-end">
                <button class="bg-blue-600 text-white px-4 py-2 rounded">Filter</button>
            </div>
        </form>

        <!-- Overzicht -->
        <div class="bg-white dark:bg-gray-800 rounded shadow overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-700 dark:text-gray-100 uppercase">Student</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-700 dark:text-gray-100 uppercase">Pogingen</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-700 dark:text-gray-100 uppercase">Gem. score</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-700 dark:text-gray-100 uppercase">Goede antwoorden</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-700 dark:text-gray-100 uppercase">Totaal vragen</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-700 dark:text-gray-100 uppercase">Laatst voltooid</th>
                        <th class="px-4 py-2"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-gray-700 text-gray-800 dark:text-gray-100">
                    @forelse($rows as $row)
                        <tr>
                            <td class="px-4 py-2">{{ $row->name }}</td>
                            <td class="px-4 py-2">{{ $row->attempts_count }}</td>
                            <td class="px-4 py-2">{{ number_format($row->avg_score,1) }}%</td>
                            <td class="px-4 py-2">{{ $row->sum_correct }}</td>
                            <td class="px-4 py-2">{{ $row->sum_total }}</td>
                            <td class="px-4 py-2">{{ $row->last_finished ? \Carbon\Carbon::parse($row->last_finished)->timezone(Auth::user()->timezone ?? 'Europe/Amsterdam')->format('d-m-Y H:i') : '-' }}</td>
                            <td class="px-4 py-2 text-right">
                                <a href="{{ route('admin.stats.show', ['user' => $row->user_id] + request()->only('category_id','from','to')) }}" class="text-blue-600 dark:text-blue-400 hover:underline">Details</a>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="px-4 py-8 text-center text-gray-500 dark:text-gray-400">Geen resultaten</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">{{ $rows->links() }}</div>
    </div>
</x-app-layout>
