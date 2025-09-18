<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            <h1 class="dark:bg-gray-800 shadow p-6 text-3xl font-bold text-gray-900 dark:text-white text-center">
                Welkom, {{ Auth::check() ? Auth::user()->name : 'Student' }}
            </h1>

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
</body>
</html>
