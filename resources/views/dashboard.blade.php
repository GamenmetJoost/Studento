<x-app-layout>
    <x-page-title>
        Welkom, {{ Auth::check() ? Auth::user()->name : 'Student' }}
    </x-page-title>

    <div class="py-8 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col lg:flex-row gap-8">

            <!-- Linker kolom -->
            <div class="flex-1 flex flex-col gap-6">

                <!-- Dagelijkse vragen + huidige vragenlijst -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <a href="{{ url('/stats') }}" 
                       class="bg-[#39B9EC] text-white p-8 rounded-xl shadow-md text-center font-semibold hover:opacity-90 transition">
                        Statistieken
                    </a>
                    <a href="{{ url('/leaderboard') }}" 
                       class="bg-[#E72B76] text-white p-8 rounded-xl shadow-md text-center font-semibold hover:opacity-90 transition">
                        Leaderboard
                    </a>
                </div>

                <!-- Welkomstbericht -->
                <div class="bg-white dark:bg-gray-800 dark:text-white p-6 rounded-xl shadow text-center">
                    <p class="text-lg font-semibold mb-2">Welkom bij studento!</p>
                    <p class="text-gray-600 dark:text-gray-300">
                        Begin met een vragenlijst zodat we je voortgang kunnen bijhouden en je de beste leerervaring kunnen bieden.
                    </p>
                </div>
            </div>

            <!-- Rechter kolom -->
            <div class="w-full lg:w-1/3 flex flex-col gap-6">
                <!-- Categories lijst -->
                <div class="bg-white dark:bg-gray-800 dark:text-white p-6 rounded-xl shadow">
                    <div class="text-center mb-6 font-semibold text-lg">Onderwerpen</div>
                    <div class="grid grid-cols-2 gap-4">
                        @php
                            $colors = ['#39B9EC', '#E72B76', '#CCD626', '#F2B300'];
                            $userCategories = Auth::check() ? Auth::user()->categories : collect([]);
                            // Als gebruiker nog geen categorieën heeft, toon alle categorieën
                            $displayCategories = $userCategories->isNotEmpty() ? $userCategories : $categories;
                        @endphp
                        @foreach($displayCategories as $index => $category)
                            @php
                                $color = $colors[intdiv($index, 2) % count($colors)];
                                $textColor = in_array($color, ['#CCD626', '#F2B300']) ? 'black' : 'white';
                            @endphp
                            <a href="{{ route('toetsen.category', $category->id) }}"
                               class="w-full p-6 rounded-lg text-center font-semibold shadow-md hover:opacity-90 transition flex items-center justify-center break-words text-base"
                               style="background-color: {{ $color }}; color: {{ $textColor }};">
                                {{ $category->category }}
                            </a>
                        @endforeach
                    </div>  
                </div>
            </div>
        </div>
    </div>

    {{-- Popup alleen tonen bij first_login --}}
    @if(Auth::check() && Auth::user()->first_login)
        <div 
            x-data="{ open: true }" 
            x-show="open" 
            x-transition 
            x-cloak
            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-60 z-50"
        >
            <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg w-96 max-h-[80vh] overflow-y-auto">
                <h2 class="text-xl font-bold mb-4 text-gray-900 dark:text-white">
                    Welkom {{ Auth::user()->name }}!
                </h2>
                <p class="mb-4 text-gray-700 dark:text-gray-300">
                    Kies de categorieën die je interessant vindt:
                </p>

                <form method="POST" action="{{ route('user.disableFirstLogin') }}">
                    @csrf
                    <div class="mb-6 grid grid-cols-1 gap-3">
                        @php
                            $uniqueCategories   = $categories->unique('category')->values();
                        @endphp
                        @foreach($uniqueCategories as $index => $category)
                            @php
                                $color = $colors[intdiv($index, 2) % count($colors)];
                            @endphp
                            <label class="flex items-center gap-3">
                                <input type="checkbox" 
                                       name="categories[]" 
                                       value="{{ $category->id }}" 
                                       class="form-checkbox h-5 w-5 rounded border-gray-300"
                                       style="accent-color: {{ $color }}">
                                <span class="text-gray-800 dark:text-gray-200">{{ $category->category }}</span>
                            </label>
                        @endforeach
                    </div>

                    <div class="flex justify-end">
                        <button 
                            type="submit"
                            class="px-5 py-2 bg-[#39B9EC] text-white rounded-lg hover:bg-[#E72B76] transition"
                        >
                            Opslaan & Sluiten
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</x-app-layout>
