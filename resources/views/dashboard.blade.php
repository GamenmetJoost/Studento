<x-app-layout>
    <x-page-title>
        Welkom, {{ Auth::check() ? Auth::user()->name : 'Student' }}
    </x-page-title>

    <div class="py-8 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col lg:flex-row gap-6">

            <!-- Linker kolom -->
            <div class="flex-1 flex flex-col gap-6">

                <!-- Dagelijkse vragen + huidige vragenlijst -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ url('/stats') }}" class="flex-1 bg-[#39B9EC] text-white p-6 rounded-lg shadow-md text-center font-semibold hover:opacity-90">
                        Dagelijkse Vragen
                    </a>
                    <a href="{{ url('/stats') }}" class="flex-1 bg-[#E72B76] text-white p-6 rounded-lg shadow-md text-center font-semibold hover:opacity-90">
                        Huidige Vragenlijst
                    </a>
                </div>

                <!-- Welkomstbericht -->
                <div class="bg-white dark:bg-gray-800 dark:text-white p-6 rounded-lg shadow text-center">
                    <p class="text-lg font-semibold mb-2">Zo te zien ben je nog erg nieuw!</p>
                    <p>Begin met een vragenlijst zodat ik je meer informatie kan tonen.</p>
                </div>
            </div>

            <!-- Rechter kolom -->
            <div class="w-full lg:w-1/3 flex flex-col gap-6">
                <!-- Categories lijst -->
                <div class="bg-white dark:bg-gray-800 dark:text-white p-4 rounded-lg shadow">
                    <div class="text-center mb-4 font-semibold">Categories</div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 justify-items-center">
                        @php
                            $colors = ['#39B9EC', '#E72B76', '#CCD626', '#F2B300'];
                            $uniqueCategories = $categories->unique('category')->values();
                        @endphp
                        @foreach($uniqueCategories as $index => $category)
                            @php
                                // Kleur per 2 toepassen
                                $color = $colors[intdiv($index, 2) % count($colors)];
                                $textColor = in_array($color, ['#CCD626', '#F2B300']) ? 'black' : 'white';
                            @endphp
                            <a href="{{ url('/stats') }}"
                               class="w-full sm:w-[160px] p-6 rounded-lg text-center font-semibold shadow-md hover:opacity-90 flex items-center justify-center break-words text-base"
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
            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
        >
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-96 max-h-[80vh] overflow-y-auto">
                <h2 class="text-xl font-bold mb-4 text-gray-900 dark:text-white">
                    Welkom {{ Auth::user()->name }}!
                </h2>
                <p class="mb-4 text-gray-700 dark:text-gray-300">
                    Kies de categories die je interessant vindt:
                </p>

                <form method="POST" action="{{ route('user.disableFirstLogin') }}">
                    @csrf
                    <div class="mb-4 grid grid-cols-1 gap-2">
                        @foreach($uniqueCategories as $index => $category)
                            @php
                                $color = $colors[intdiv($index, 2) % count($colors)];
                            @endphp
                            <label class="flex items-center gap-2">
                                <input type="checkbox" name="categories[]" value="{{ $category->id }}" class="form-checkbox h-4 w-4" style="accent-color: {{ $color }}">
                                <span class="text-gray-700 dark:text-gray-300">{{ $category->category }}</span>
                            </label>
                        @endforeach
                    </div>

                    <div class="flex justify-end">
                        <button 
                            type="submit"
                            class="px-4 py-2 bg-[#39B9EC] text-white rounded hover:bg-[#E72B76]"
                        >
                            Sluiten
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</x-app-layout>
