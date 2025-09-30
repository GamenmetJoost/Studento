<x-app-layout>
    <div class="max-w-3xl mx-auto py-8 px-4">
        <h1 class="text-2xl font-semibold mb-6">Nieuwe vraag</h1>
        <form method="POST" action="{{ route('admin.questions.store') }}" class="space-y-6">
            @csrf
            <div>
                <label class="block text-sm font-medium mb-1">Categorie</label>
                <select name="category_id" class="w-full rounded border-gray-300" required>
                    <option value="">-- kies --</option>
                    @foreach($categories as $c)
                        <option value="{{ $c->id }}" @selected(old('category_id')==$c->id)>{{ $c->sector }} - {{ $c->category }}</option>
                    @endforeach
                </select>
                @error('category_id')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Identifier (optioneel)</label>
                <input type="text" name="identifier" value="{{ old('identifier') }}" class="w-full rounded border-gray-300" placeholder="Bijv. Q1">
                @error('identifier')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Vraagtekst</label>
                <textarea name="question_text" rows="6" class="w-full rounded border-gray-300" required>{{ old('question_text') }}</textarea>
                @error('question_text')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="flex gap-3">
                <a href="{{ route('admin.questions.index') }}" class="px-4 py-2 bg-gray-200 rounded">Annuleren</a>
                <button class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Opslaan</button>
            </div>
        </form>
    </div>
</x-app-layout>
