<x-app-layout>
    <x-page-title>
        Welkom, {{ Auth::check() ? Auth::user()->name : 'Student' }}
    </x-page-title>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-12 gap-6">

            <!-- Linker kolom -->
            <div class="col-span-8 space-y-6">

                <!-- Dagelijkse vragen + huidige vragenlijst -->
                <div class="grid grid-cols-2 gap-4">
                    <a href="http://studento.test/stats" class="bg-gray-200 dark:bg-gray-700 dark:text-white p-6 rounded-lg shadow block text-center">
                        Dagelijkse Vragen
                    </a>
                    <a href="http://studento.test/stats" class="bg-gray-200 dark:bg-gray-700 dark:text-white p-6 rounded-lg shadow block text-center">
                        Huidige Vragenlijst
                    </a>
                </div>

                <!-- Welkomstbericht i.p.v. Nog niet gedaan / Herhalen -->
                <div class="bg-gray-100 dark:bg-gray-800 dark:text-white p-6 rounded-lg shadow text-center">
                    <p class="text-lg font-semibold mb-2">Zo te zien ben je nog erg nieuw! 👋</p>
                    <p>Begin met een vragenlijst zodat ik je meer informatie kan tonen.</p>
                </div>
            </div>

            <!-- Rechter kolom -->
            <div class="col-span-4 space-y-6">
                <!-- Thema’s lijst -->
                <div class="bg-gray-100 dark:bg-gray-800 dark:text-white p-4 rounded-lg shadow">
                    <div class="text-center mb-4 font-semibold">Thema’s</div>
                    <div class="grid grid-cols-2 gap-4">
                        <a href="http://studento.test/stats" class="bg-gray-300 dark:bg-gray-600 p-4 rounded block text-center">Onderwerp 1</a>
                        <a href="http://studento.test/stats" class="bg-gray-300 dark:bg-gray-600 p-4 rounded block text-center">Onderwerp 2</a>
                        <a href="http://studento.test/stats" class="bg-gray-300 dark:bg-gray-600 p-4 rounded block text-center">Onderwerp 3</a>
                        <a href="http://studento.test/stats" class="bg-gray-300 dark:bg-gray-600 p-4 rounded block text-center">Onderwerp 4</a>
                        <a href="http://studento.test/stats" class="bg-gray-300 dark:bg-gray-600 p-4 rounded block text-center">Onderwerp 5</a>
                        <a href="http://studento.test/stats" class="bg-gray-300 dark:bg-gray-600 p-4 rounded block text-center">Onderwerp 6</a>
                        <a href="http://studento.test/stats" class="bg-gray-300 dark:bg-gray-600 p-4 rounded block text-center">Onderwerp 7</a>
                        <a href="http://studento.test/stats" class="bg-gray-300 dark:bg-gray-600 p-4 rounded block text-center">Onderwerp 8</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
