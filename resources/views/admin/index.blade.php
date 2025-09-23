<x-app-layout>
    <div class="container mx-auto py-8">
        <x-page-title>
            Admin Dashboard
        </x-page-title>
        
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

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <!-- Import QTI Form -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold mb-4">Import QTI Questions</h2>
                
                @if(session('success'))
                    <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                        {{ session('success') }}
                    </div>
                @endif
                
                @if(session('error'))
                    <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="qti_file" class="block text-sm font-medium text-gray-700 mb-2">
                            Upload QTI File (.xml)
                        </label>
                        <input type="file" 
                               name="qti_file" 
                               id="qti_file" 
                               accept=".xml,.qti"
                               class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        @error('qti_file')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="bg-blue-500 text-black px-4 py-2 rounded hover:bg-blue-600">
                        Import Questions
                    </button>
                </form>
            </div>

            <!-- Quick Links -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold mb-4">Snelkoppelingen</h2>
                <div class="space-y-2">
                    <a href="{{ route('admin.users.index') }}" class="block bg-blue-500 text-black px-4 py-2 rounded hover:bg-blue-600 text-center">
                        Beheer Gebruikers
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
