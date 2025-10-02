<x-app-layout>
    <x-page-title>
        leaderboard & Badges
    </x-page-title>

    <div class="py-12" x-data="{ open: false, badge: null }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <!-- Leaderboard -->
                <div class="md:col-span-2 bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6">
                    <h3 class="text-lg font-semibold mb-4 text-gray-800 dark:text-gray-200">
                        Leaderboard
                    </h3>

                    <!-- Current user's score and placement at the top -->
                    @if($currentUserPlacement)
                        <div class="mb-6 bg-blue-100 dark:bg-blue-900 rounded-lg p-4 text-blue-900 dark:text-blue-100">
                            <strong>Jouw score:</strong>
                            <div>
                                <span>Plaats: <span class="font-bold">{{ $currentUserPlacement }}</span></span>
                                <span class="mx-2">|</span>
                                <span>Punten: <span class="font-bold">{{ $currentUserScore }}</span></span>
                            </div>
                        </div>
                    @else
                        <div class="mb-6 bg-gray-100 dark:bg-gray-900 rounded-lg p-4 text-gray-900 dark:text-gray-100">
                            Je staat nog niet op het leaderboard.
                        </div>
                    @endif

                    <!-- Leaderboard tabel -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">#</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Student</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Punten</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700 text-white">
                                @foreach($leaderboard as $index => $player)
                                    <tr @if($player->id === $currentUser->id) class="bg-blue-600" @endif>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $index + 1 }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $player->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $player->points }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Badges -->
                <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6">
                    <h3 class="text-lg font-semibold mb-4 text-gray-800 dark:text-gray-200">
                        Badges
                    </h3>

                    <div class="grid grid-cols-3 gap-4">
                        
                        <!-- 50 Correcte Vragen Badge -->
                        <div class="flex flex-col items-center cursor-pointer group"
                            @click="open = true; badge = { 
                                name: 'Answer Hero', 
                                description: 'Beantwoord 50 correcte vragen.', 
                                progress: {{ $correctAnswers }}, 
                                total: 50, 
                                unlocked: {{ $has50Badge ? 'true' : 'false' }} 
                            }">
                            <img src="https://via.placeholder.com/64/{{ $has50Badge ? '00FF00' : 'CCCCCC' }}" 
                                alt="Badge" 
                                class="w-16 h-16 rounded-full border-2 {{ $has50Badge ? 'border-green-500' : 'border-gray-400 opacity-60' }}">
                            <span class="mt-2 text-sm text-gray-700 dark:text-gray-300">Answer Hero</span>
                        </div>

                        <!-- Quiz Master Badge -->
                        <div class="flex flex-col items-center cursor-pointer group"
                            @click="open = true; badge = { 
                                name: 'Quiz Master', 
                                description: 'Maak 10 quizzes af.', 
                                progress: {{ $quizAttempts ?? 0 }}, 
                                total: 10, 
                                unlocked: {{ $hasQuizMasterBadge ? 'true' : 'false' }} 
                            }">
                            <img src="https://via.placeholder.com/64/{{ $hasQuizMasterBadge ? 'FFD700' : 'CCCCCC' }}" 
                                alt="Badge" 
                                class="w-16 h-16 rounded-full border-2 {{ $hasQuizMasterBadge ? 'border-yellow-400' : 'border-gray-400 opacity-60' }}">
                            <span class="mt-2 text-sm text-gray-700 dark:text-gray-300">Quiz Master</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Popup / Modal voor badges -->
        <div x-show="open" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
             x-cloak>
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg max-w-md w-full p-6 relative">
                <button @click="open = false" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">&times;</button>
                
                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200" x-text="badge?.name"></h3>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400" x-text="badge?.description"></p>

                <template x-if="badge && badge.total > 0">
                    <div class="mt-4">
                        <p class="text-sm text-gray-600 dark:text-gray-400" x-text="`Progressie: ${badge.progress}/${badge.total}`"></p>
                        <div class="w-full bg-gray-200 rounded-full h-3 dark:bg-gray-700 mt-1">
                            <div class="bg-blue-500 h-3 rounded-full" 
                                 :style="`width: ${(badge.progress / badge.total) * 100}%`"></div>
                        </div>
                    </div>
                </template>

                <!-- Add this block below the progress bar template -->
                <template x-if="badge?.name === 'Streak Master'">
                    <div class="mt-4">
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            Huidige streak: <span x-text="badge.currentStreak"></span>
                        </p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            Hoogste streak: <span x-text="badge.highestStreak"></span>
                        </p>
                    </div>
                </template>
            </div>
        </div>
    </div>
</x-app-layout>
