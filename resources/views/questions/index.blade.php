<x-app-layout>
    <x-page-title>
        Alle Vragen
    </x-page-title>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="md:col-span-2 bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th class="py-2 px-4 border-b text-left">ID</th>
                            <th class="py-2 px-4 border-b text-left">Titel</th>
                            <th class="py-2 px-4 border-b text-left">Categorie</th>
                            <th class="py-2 px-4 border-b text-left">Inzien</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($questions as $question)
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td class="py-2 px-4 border-b">{{ $question->id }}</td>
                                <td class="py-2 px-4 border-b">{{ $question->title }}</td>
                                <td class="py-2 px-4 border-b">{{ $question->category }}</td>
                                <td class="py-2 px-4 border-b">
                                    <a href="{{ route('question.show', $question->id) }}" 
                                       class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded">
                                       Bekijk
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
