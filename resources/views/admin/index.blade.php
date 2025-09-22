<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Admin Dashboard</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-lg font-semibold mb-2">Totaal aantal gebruikers</h3>
                <p class="text-3xl font-bold text-blue-600">{{ $users->count() }}</p>
            </div>
            
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-lg font-semibold mb-2">Admins</h3>
                <p class="text-3xl font-bold text-green-600">{{ $users->where('role', 'admin')->count() }}</p>
            </div>
            
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-lg font-semibold mb-2">Gebruikers</h3>
                <p class="text-3xl font-bold text-purple-600">{{ $users->where('role', 'user')->count() }}</p>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-semibold mb-4">Snelkoppelingen</h2>
            <div class="space-x-4">
                <a href="{{ route('admin.users.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Beheer Gebruikers
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
