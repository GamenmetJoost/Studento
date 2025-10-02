<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Admin Dashboard</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Totaal aantal gebruikers -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-lg font-semibold mb-2">Totaal aantal gebruikers</h3>
                <p class="text-3xl font-bold" style="color: #39B9EC;">
                    {{ $users->count() }}
                </p>
            </div>
            
            <!-- Admins -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-lg font-semibold mb-2">Admins</h3>
                <p class="text-3xl font-bold" style="color: #E72B76;">
                    {{ $users->where('role', 'admin')->count() }}
                </p>
            </div>
            
            <!-- Gebruikers -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-lg font-semibold mb-2">Gebruikers</h3>
                <p class="text-3xl font-bold" style="color: #F2B300;">
                    {{ $users->where('role', 'user')->count() }}
                </p>
            </div>
        </div>

        <!-- Snelkoppelingen -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-semibold mb-4">Snelkoppelingen</h2>
            <div class="space-x-4">
                <a href="{{ route('admin.users.index') }}" 
                   class="px-4 py-2 rounded font-bold transition"
                   style="background-color: #39B9EC; color: white;">
                    Beheer Gebruikers
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
