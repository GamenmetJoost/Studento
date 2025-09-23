<x-app-layout>
    <main class="flex flex-col items-center justify-center bg-gray-100 dark:bg-gray-900 px-4 py-12">

        <!-- Vraag teller -->
        <div class="mb-4 text-gray-900 dark:text-white text-lg font-semibold">
            Vraag 1/40
        </div>

        <!-- Vraag -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 w-full max-w-2xl text-center mb-6">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                Is zorg en onderwijs belangrijk voor de samenleving?
            </h2>
        </div>

        <!-- Antwoorden -->
        <form method="POST" class="w-full max-w-2xl text-center">
            @csrf
            <div class="flex justify-center gap-6">
                <button type="submit" name="answer" value="true" 
                    class="w-32 py-3 bg-green-500 text-white rounded-lg shadow hover:bg-green-600">
                    Waar
                </button>
                <button type="submit" name="answer" value="false" 
                    class="w-32 py-3 bg-red-500 text-white rounded-lg shadow hover:bg-red-600">
                    Niet waar
                </button>
            </div>
        </form>

    </main>
</x-app-layout>
