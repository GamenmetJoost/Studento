<x-app-layout>
    <x-page-title>
        Alle Vragen
    </x-page-title>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="md:col-span-2 bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Vragenlijst</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full border border-gray-200 dark:border-gray-700 bg-white">
                        <thead class="bg-white">
                            <tr>
                                <th class="py-2 px-4 border-b text-left">ID</th>
                                <th class="py-2 px-4 border-b text-left">Titel</th>
                                <th class="py-2 px-4 border-b text-left">Categorie</th>
                                <th class="py-2 px-4 border-b text-left">Subcategorie</th>
                                <th class="py-2 px-4 border-b text-left">Inzien</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($questions as $question)
                                <tr class="hover:bg-gray-100">
                                    <td class="py-2 px-4 border-b">{{ $question->id }}</td>
                                    <td class="py-2 px-4 border-b">{{ $question->title }}</td>
                                    <td class="py-2 px-4 border-b">
                                        {{ is_array($question->category) ? ($question->category['name'] ?? '') : (json_decode($question->category, true)['name'] ?? '') }}
                                    </td>
                                    <td class="py-2 px-4 border-b">
                                        {{ is_array($question->category) ? ($question->category['subcategory'] ?? '') : (json_decode($question->category, true)['subcategory'] ?? '') }}
                                    </td>
                                    <td class="py-2 px-4 border-b">
                                        <a href="{{ route('question.show', $question->id) }}" 
                                           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded">
                                           Bekijk
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="py-4 text-center text-gray-500 dark:text-gray-400">
                                        Geen vragen gevonden.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div class="mt-4">
                    {{ $questions->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
