<x-app-layout>
    <div class="container mx-auto py-8">
        <x-page-title>Gebruikersbeheer</x-page-title>

        <div class="mb-6 flex flex-col md:flex-row md:items-end md:justify-between gap-4">
            <form method="GET" class="flex flex-wrap items-end gap-3">
                <div>
                    <label class="block text-sm font-medium mb-1" for="q">Zoek</label>
                    <input type="text" name="q" id="q" value="{{ request('q') }}" class="border rounded px-3 py-2" placeholder="Naam of email">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1" for="role">Rol</label>
                    <select name="role" id="role" class="border rounded px-3 py-2">
                        <option value="">Alle</option>
                        @foreach($roles as $r)
                            <option value="{{ $r }}" @selected(request('role')===$r)>{{ ucfirst($r) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="pt-5">
                    <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Filter</button>
                </div>
            </form>
            <a href="{{ route('admin.users.create') }}" class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Nieuwe gebruiker</a>
        </div>

        @if(session('status'))
            <div class="mb-4 p-3 bg-green-100 border border-green-300 text-green-800 rounded">{{ session('status') }}</div>
        @endif

        <div class="overflow-x-auto bg-white shadow rounded">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Naam</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Rol</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Timezone</th>
                        <th class="px-4 py-2"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                @forelse($users as $user)
                    <tr>
                        <td class="px-4 py-2">{{ $user->name }}</td>
                        <td class="px-4 py-2">{{ $user->email }}</td>
                        <td class="px-4 py-2"><span class="px-2 py-1 text-xs rounded bg-gray-200">{{ $user->role }}</span></td>
                        <td class="px-4 py-2 text-sm">{{ $user->timezone ?? '-' }}</td>
                        <td class="px-4 py-2 text-right space-x-2">
                            <a href="{{ route('admin.users.edit',$user) }}" class="text-blue-600 hover:underline">Bewerk</a>
                            <form action="{{ route('admin.users.destroy',$user) }}" method="POST" class="inline" onsubmit="return confirm('Verwijder deze gebruiker?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Verwijder</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-4 py-6 text-center text-gray-500">Geen gebruikers gevonden</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">{{ $users->links() }}</div>
    </div>
</x-app-layout>
