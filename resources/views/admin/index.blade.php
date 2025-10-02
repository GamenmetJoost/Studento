<x-app-layout>
    <div class="container mx-auto py-8">
        <x-page-title>
            Admin Dashboard
        </x-page-title>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Totaal aantal gebruikers -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-lg font-semibold mb-2">Totaal aantal gebruikers</h3>
                <p class="text-3xl font-bold" style="color:#39B9EC;">
                    {{ $users->count() }}
                </p>
            </div>
            
            <!-- Admins -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-lg font-semibold mb-2">Admins</h3>
                <p class="text-3xl font-bold" style="color:#E72B76;">
                    {{ $users->where('role', 'admin')->count() }}
                </p>
            </div>
            
            <!-- Gebruikers -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-lg font-semibold mb-2">Gebruikers</h3>
                <p class="text-3xl font-bold" style="color:#F2B300;">
                    {{ $users->where('role', 'student')->count() }}
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <!-- Import QTI Formulier -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold mb-4">Importeer QTI-vragen</h2>
                
                @if(session('success'))
                    <div class="mb-4 p-4 border rounded" style="background:#D1FADF; color:#027A48; border-color:#A6F4C5;">
                        {{ session('success') }}
                    </div>
                @endif
                
                @if(session('error'))
                    <div class="mb-4 p-4 border rounded" style="background:#FEE4E2; color:#B42318; border-color:#FECDCA;">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="qti_file" class="block text-sm font-medium text-gray-700 mb-2">
                            Upload QTI-bestand (.xml of .zip)
                        </label>
                        <input type="file" 
                               name="qti_file" 
                               id="qti_file" 
                               accept=".xml,.zip,.qti"
                               class="block w-full text-sm text-gray-500 
                               file:mr-4 file:py-2 file:px-4 
                               file:rounded-full file:border-0 
                               file:text-sm file:font-semibold 
                               file:bg-[#39B9EC]/20 file:text-[#39B9EC] hover:file:bg-[#39B9EC]/30">
                        @error('qti_file')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="bg-blue-500 text-black px-4 py-2 rounded hover:bg-blue-600">
                        Importeren
                    </button>
                </form>
            </div>

            <!-- Quick Links -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold mb-4">Snelkoppelingen</h2>
                <div class="space-y-2">
                    <a href="{{ route('admin.users.index') }}" 
                       class="block px-4 py-2 rounded text-center font-semibold transition"
                       style="background:#39B9EC; color:#000;">
                        Beheer Gebruikers
                    </a>
                    <a href="{{ route('admin.questions.index') }}" 
                       class="block px-4 py-2 rounded text-center font-semibold transition"
                       style="background:#E72B76; color:#fff;">
                        Beheer Vragen
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
