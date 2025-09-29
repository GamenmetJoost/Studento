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
                    <!-- Kaart 1 - Blauw -->
                    <a href="http://studento.test/stats" class="flex-1 bg-[#39B9EC] text-white p-6 rounded-lg shadow-md text-center font-semibold hover:opacity-90">
                        Dagelijkse Vragen
                    </a>
                    <!-- Kaart 2 - Roze -->
                    <a href="http://studento.test/stats" class="flex-1 bg-[#E72B76] text-white p-6 rounded-lg shadow-md text-center font-semibold hover:opacity-90">
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
                <!-- Thema’s lijst -->
                <div class="bg-white dark:bg-gray-800 dark:text-white p-4 rounded-lg shadow">
                    <div class="text-center mb-4 font-semibold">Thema’s</div>
                    <div class="flex flex-wrap gap-4 justify-center">
                        <!-- Onderwerp 1 & 2 - Blauw -->
                        <a href="http://studento.test/stats" class="flex-1 min-w-[120px] bg-[#39B9EC] text-white p-4 rounded text-center shadow hover:opacity-90">
                            Onderwerp 1
                        </a>
                        <a href="http://studento.test/stats" class="flex-1 min-w-[120px] bg-[#39B9EC] text-white p-4 rounded text-center shadow hover:opacity-90">
                            Onderwerp 2
                        </a>

                        <!-- Onderwerp 3 & 4 - Roze -->
                        <a href="http://studento.test/stats" class="flex-1 min-w-[120px] bg-[#E72B76] text-white p-4 rounded text-center shadow hover:opacity-90">
                            Onderwerp 3
                        </a>
                        <a href="http://studento.test/stats" class="flex-1 min-w-[120px] bg-[#E72B76] text-white p-4 rounded text-center shadow hover:opacity-90">
                            Onderwerp 4
                        </a>

                        <!-- Onderwerp 5 & 6 - Groen -->
                        <a href="http://studento.test/stats" class="flex-1 min-w-[120px] bg-[#CCD626] text-black p-4 rounded text-center shadow hover:opacity-90">
                            Onderwerp 5
                        </a>
                        <a href="http://studento.test/stats" class="flex-1 min-w-[120px] bg-[#CCD626] text-black p-4 rounded text-center shadow hover:opacity-90">
                            Onderwerp 6
                        </a>

                        <!-- Onderwerp 7 & 8 - Geel -->
                        <a href="http://studento.test/stats" class="flex-1 min-w-[120px] bg-[#F2B300] text-black p-4 rounded text-center shadow hover:opacity-90">
                            Onderwerp 7
                        </a>
                        <a href="http://studento.test/stats" class="flex-1 min-w-[120px] bg-[#F2B300] text-black p-4 rounded text-center shadow hover:opacity-90">
                            Onderwerp 8
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ✅ Popup alleen tonen bij first_login --}}
    @if(Auth::check() && Auth::user()->first_login)
        <div 
            x-data="{ open: true }" 
            x-show="open" 
            x-transition 
            x-cloak
            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
        >
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-96">
                <h2 class="text-xl font-bold mb-4 text-gray-900 dark:text-white">
                    Welkom {{ Auth::user()->name }}!
                </h2>
                <p class="mb-4 text-gray-700 dark:text-gray-300">
                    Kies de onderwerpen die je interessant vindt:
                </p>

                <div class="mb-4 flex flex-col gap-2">
                    <label class="flex items-center">
                        <input type="checkbox" class="form-checkbox h-4 w-4 text-[#E72B76]">
                        <span class="ml-2 text-gray-700 dark:text-gray-300">Onderwerp 1</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" class="form-checkbox h-4 w-4 text-[#E72B76]">
                        <span class="ml-2 text-gray-700 dark:text-gray-300">Onderwerp 2</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" class="form-checkbox h-4 w-4 text-[#E72B76]">
                        <span class="ml-2 text-gray-700 dark:text-gray-300">Onderwerp 3</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" class="form-checkbox h-4 w-4 text-[#E72B76]">
                        <span class="ml-2 text-gray-700 dark:text-gray-300">Onderwerp 4</span>
                    </label>
                </div>

                <div class="flex justify-end">
                    <form method="POST" action="{{ route('user.disableFirstLogin') }}">
                        @csrf
                        <button 
                            type="submit"
                            class="px-4 py-2 bg-[#39B9EC] text-white rounded hover:bg-[#E72B76]"
                        >
                            Sluiten
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endif
</x-app-layout>
