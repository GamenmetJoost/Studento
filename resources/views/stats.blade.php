<x-app-layout>
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">

        <!-- Page Content -->
        <main>
            <x-page-title>
                Welkom, {{ Auth::check() ? Auth::user()->name : 'Student' }}
            </x-page-title>

            <!-- Onderwerpen lijst met dropdowns -->
            <div class="mt-10 flex justify-center">
                <ul class="w-full max-w-5xl grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 text-left">

                    <!-- Onderwerp 1 -->
                    <li x-data="{ open: false }" class="p-6 bg-gray-200 dark:bg-gray-700 rounded-lg shadow">
                        <div class="flex justify-between items-center cursor-pointer text-gray-900 dark:text-white" @click="open = !open">
                            Onderwerp 1
                            <span class="text-2xl transform transition-transform" :class="{'rotate-180': open}">▼</span>
                        </div>
                        <ul x-show="open" x-transition class="mt-4 pl-4 space-y-2 text-gray-900 dark:text-white">
                            <li class="p-2 rounded hover:bg-gray-300 dark:hover:bg-gray-600 cursor-pointer">Subonderwerp 1</li>
                            <li class="p-2 rounded hover:bg-gray-300 dark:hover:bg-gray-600 cursor-pointer">Subonderwerp 2</li>
                        </ul>
                    </li>

                    <!-- Onderwerp 2 -->
                    <li x-data="{ open: false }" class="p-6 bg-gray-200 dark:bg-gray-700 rounded-lg shadow">
                        <div class="flex justify-between items-center cursor-pointer text-gray-900 dark:text-white" @click="open = !open">
                            Onderwerp 2
                            <span class="text-2xl transform transition-transform" :class="{'rotate-180': open}">▼</span>
                        </div>
                        <ul x-show="open" x-transition class="mt-4 pl-4 space-y-2 text-gray-900 dark:text-white">
                            <li class="p-2 rounded hover:bg-gray-300 dark:hover:bg-gray-600 cursor-pointer">Subonderwerp A</li>
                            <li class="p-2 rounded hover:bg-gray-300 dark:hover:bg-gray-600 cursor-pointer">Subonderwerp B</li>
                        </ul>
                    </li>

                    <!-- Onderwerp 3 -->
                    <li x-data="{ open: false }" class="p-6 bg-gray-200 dark:bg-gray-700 rounded-lg shadow">
                        <div class="flex justify-between items-center cursor-pointer text-gray-900 dark:text-white" @click="open = !open">
                            Onderwerp 3
                            <span class="text-2xl transform transition-transform" :class="{'rotate-180': open}">▼</span>
                        </div>
                        <ul x-show="open" x-transition class="mt-4 pl-4 space-y-2 text-gray-900 dark:text-white">
                            <li class="p-2 rounded hover:bg-gray-300 dark:hover:bg-gray-600 cursor-pointer">Subonderwerp X</li>
                            <li class="p-2 rounded hover:bg-gray-300 dark:hover:bg-gray-600 cursor-pointer">Subonderwerp Y</li>
                        </ul>
                    </li>

                    <!-- Onderwerp 4 -->
                    <li x-data="{ open: false }" class="p-6 bg-gray-200 dark:bg-gray-700 rounded-lg shadow">
                        <div class="flex justify-between items-center cursor-pointer text-gray-900 dark:text-white" @click="open = !open">
                            Onderwerp 4
                            <span class="text-2xl transform transition-transform" :class="{'rotate-180': open}">▼</span>
                        </div>
                        <ul x-show="open" x-transition class="mt-4 pl-4 space-y-2 text-gray-900 dark:text-white">
                            <li class="p-2 rounded hover:bg-gray-300 dark:hover:bg-gray-600 cursor-pointer">Subonderwerp M</li>
                            <li class="p-2 rounded hover:bg-gray-300 dark:hover:bg-gray-600 cursor-pointer">Subonderwerp N</li>
                        </ul>
                    </li>

                </ul>
            </div>

        </main>
    </div>
</x-app-layout>
