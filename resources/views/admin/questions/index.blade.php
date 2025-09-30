<x-app-layout>
    <div class="max-w-7xl mx-auto py-8 px-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold">Vragen beheren</h1>
            <a href="{{ route('admin.questions.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Nieuwe vraag</a>
        </div>
        @if(session('status'))
            <div class="mb-4 p-3 rounded bg-emerald-100 text-emerald-800 text-sm">{{ session('status') }}</div>
        @endif
        <form method="GET" class="mb-4 grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
            <div>
                <label class="block text-sm font-medium mb-1">Zoek</label>
                <input type="text" name="q" value="{{ request('q') }}" class="w-full rounded border-gray-300" placeholder="Tekst...">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Categorie</label>
                <select name="category" class="w-full rounded border-gray-300">
                    <option value="">Alle</option>
                    @foreach($categories as $c)
                        <option value="{{ $c->id }}" @selected(request('category')==$c->id)>{{ $c->sector }} - {{ $c->category }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex gap-2">
                <button class="px-4 py-2 bg-gray-800 text-white rounded">Filter</button>
                <a href="{{ route('admin.questions.index') }}" class="px-4 py-2 bg-gray-200 rounded">Reset</a>
            </div>
        </form>
        <div class="overflow-x-auto bg-white rounded shadow divide-y">
            <table class="min-w-full text-sm">
                <thead class="bg-gray-50">
                    <tr class="text-left">
                        <th class="px-3 py-2">ID</th>
                        <th class="px-3 py-2">Categorie</th>
                        <th class="px-3 py-2 w-1/2">Vraag</th>
                        <th class="px-3 py-2">Antwoorden</th>
                        <th class="px-3 py-2">Acties</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($questions as $q)
                        <tr class="align-top">
                            <td class="px-3 py-2">{{ $q->id }}</td>
                            <td class="px-3 py-2 text-xs">{{ $q->category?->sector }}<br>{{ $q->category?->category }}</td>
                            <td class="px-3 py-2 whitespace-pre-line">{{ Str::limit($q->question_text, 160) }}</td>
                            <td class="px-3 py-2 text-center">{{ $q->choices()->count() }}</td>
                            <td class="px-3 py-2 space-y-1">
                                <a href="{{ route('admin.questions.edit', $q) }}" class="text-blue-600 hover:underline text-xs">Bewerken</a>
                                <form method="POST" action="{{ route('admin.questions.destroy', $q) }}" onsubmit="return confirm('Verwijderen?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600 hover:underline text-xs">Verwijderen</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">{{ $questions->links() }}</div>
    </div>
</x-app-layout>
