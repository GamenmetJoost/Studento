<x-app-layout>
    <div class="max-w-5xl mx-auto py-8 px-4">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-semibold">Vraag bewerken #{{ $question->id }}</h1>
            <a href="{{ route('admin.questions.index') }}" class="text-sm text-blue-600 hover:underline">Terug naar overzicht</a>
        </div>
        @if(session('status'))
            <div class="mb-4 p-3 rounded bg-emerald-100 text-emerald-800 text-sm">{{ session('status') }}</div>
        @endif
        @if ($errors->any())
            <div class="mb-4 p-3 rounded bg-red-100 text-red-800 text-sm">
                <p class="font-semibold mb-1">Er ging iets mis bij het opslaan:</p>
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('admin.questions.update', $question) }}" class="space-y-6">
            @csrf
            @method('PUT')
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium mb-1">Categorie</label>
                    <select name="category_id" class="w-full rounded border-gray-300" required>
                        @foreach($categories as $c)
                            <option value="{{ $c->id }}" @selected(old('category_id',$question->category_id)==$c->id)>{{ $c->sector }} - {{ $c->category }}</option>
                        @endforeach
                    </select>
                    @error('category_id')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Identifier (optioneel)</label>
                    <input type="text" name="identifier" value="{{ old('identifier',$question->identifier) }}" class="w-full rounded border-gray-300">
                    @error('identifier')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Vraagtekst</label>
                <textarea name="question_text" rows="6" class="w-full rounded border-gray-300" required>{{ old('question_text',$question->question_text) }}</textarea>
                @error('question_text')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="flex gap-3">
                <button class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Bijwerken</button>
            </div>
        </form>

        <hr class="my-10">

        <h2 class="text-xl font-semibold mb-4">Antwoordopties</h2>
        <div class="space-y-4">
            @forelse($question->choices as $choice)
                <div class="p-4 rounded border flex items-start justify-between gap-4 {{ $choice->is_correct ? 'border-emerald-500 bg-emerald-50' : 'border-gray-300' }}">
                    <div class="flex-1">
                        <p class="text-sm font-semibold mb-1">{{ $choice->identifier }} @if($choice->is_correct)<span class="text-emerald-600">(juist)</span>@endif</p>
                        <p class="text-sm whitespace-pre-line">{{ $choice->choice_text }}</p>
                    </div>
                    <form method="POST" action="{{ route('admin.choices.destroy', $choice) }}" onsubmit="return confirm('Verwijderen?');">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600 text-xs hover:underline">Verwijderen</button>
                    </form>
                </div>
            @empty
                <p class="text-sm text-gray-600">Nog geen antwoordopties.</p>
            @endforelse
        </div>

        <div class="mt-8">
            <h3 class="font-semibold mb-3">Nieuwe optie toevoegen</h3>
            <form method="POST" action="{{ route('admin.choices.store', $question) }}" class="space-y-4">
                @csrf
                <div class="grid md:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-xs font-medium mb-1">Identifier</label>
                        <input type="text" name="identifier" class="w-full rounded border-gray-300" placeholder="A1" required>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-medium mb-1">Tekst</label>
                        <input type="text" name="choice_text" class="w-full rounded border-gray-300" required>
                    </div>
                    <div class="flex items-center gap-2">
                        <input type="checkbox" name="is_correct" value="1" class="rounded border-gray-300">
                        <span class="text-xs">Juiste antwoord</span>
                    </div>
                </div>
                <div class="flex gap-3">
                    <button class="px-5 py-2 bg-green-600 text-white rounded hover:bg-green-700 text-sm">Toevoegen</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
