<x-app-layout>
    <div class="container mx-auto py-8 max-w-xl">
        <x-page-title>Nieuwe gebruiker</x-page-title>

        <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-6 bg-white p-6 rounded shadow">
            @csrf
            <div>
                <label class="block text-sm font-medium mb-1" for="name">Naam</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full border rounded px-3 py-2" required>
                @error('name')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium mb-1" for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="w-full border rounded px-3 py-2" required>
                @error('email')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium mb-1" for="role">Rol</label>
                <select name="role" id="role" class="w-full border rounded px-3 py-2" required>
                    @foreach($roles as $r)
                        <option value="{{ $r }}" @selected(old('role')===$r)>{{ ucfirst($r) }}</option>
                    @endforeach
                </select>
                @error('role')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium mb-1" for="timezone">Timezone</label>
                <input type="text" name="timezone" id="timezone" value="{{ old('timezone') }}" placeholder="Europe/Amsterdam" class="w-full border rounded px-3 py-2">
                @error('timezone')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium mb-1" for="password">Wachtwoord</label>
                <input type="password" name="password" id="password" class="w-full border rounded px-3 py-2" required>
                @error('password')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="flex justify-between items-center">
                <a href="{{ route('admin.users.index') }}" class="text-gray-600 hover:underline">Annuleer</a>
                <button class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700">Opslaan</button>
            </div>
        </form>
    </div>
</x-app-layout>
