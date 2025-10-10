<x-app-layout>
    <div class="container mx-auto py-8 max-w-xl">
        <x-page-title>Bewerk gebruiker</x-page-title>

        @if(session('status'))
            <div class="mb-4 p-3 bg-green-100 border border-green-300 text-green-800 rounded">{{ session('status') }}</div>
        @endif

        <form action="{{ route('admin.users.update',$user) }}" method="POST" class="space-y-6 bg-white p-6 rounded shadow">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm font-medium mb-1 text-gray-900 dark:text-white" for="name">Naam</label>
                <input type="text" name="name" id="name" value="{{ old('name',$user->name) }}" class="w-full border rounded px-3 py-2" required>
                @error('name')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium mb-1 text-gray-900 dark:text-white" for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email',$user->email) }}" class="w-full border rounded px-3 py-2" required>
                @error('email')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium mb-1 text-gray-900 dark:text-white" for="role">Rol</label>
                <select name="role" id="role" class="w-full border rounded px-3 py-2" required>
                    @foreach($roles as $r)
                        <option value="{{ $r }}" @selected(old('role',$user->role)===$r)>{{ ucfirst($r) }}</option>
                    @endforeach
                </select>
                @error('role')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium mb-1 text-gray-900 dark:text-white" for="timezone">Timezone</label>
                <input type="text" name="timezone" id="timezone" value="{{ old('timezone',$user->timezone) }}" placeholder="Europe/Amsterdam" class="w-full border rounded px-3 py-2">
                @error('timezone')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium mb-1 text-gray-900 dark:text-white" for="password">Wachtwoord (laat leeg om niet te wijzigen)</label>
                <input type="password" name="password" id="password" class="w-full border rounded px-3 py-2">
                @error('password')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="flex justify-between items-center">
                <a href="{{ route('admin.users.index') }}" class="text-gray-600 hover:underline">Terug</a>
                <div class="space-x-2">
                    <button class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700">Opslaan</button>
                </div>
            </div>
        </form>

        <form action="{{ route('admin.users.destroy',$user) }}" method="POST" class="mt-6" onsubmit="return confirm('Weet je zeker dat je deze gebruiker wilt verwijderen?');">
            @csrf
            @method('DELETE')
            <button class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Verwijder gebruiker</button>
            @error('delete')<p class="text-sm text-red-600 mt-2">{{ $message }}</p>@enderror
        </form>
    </div>
</x-app-layout>
