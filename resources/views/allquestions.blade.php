<x-app-layout>
    <x-page-title>
        Alle vragen
    </x-page-title>

    <div class="py-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

                @foreach ($questions as $question)
                    <a href="{{ route('question.show', $question->id) }}" 
                       class="block overflow-hidden rounded-lg shadow-lg transform transition hover:scale-105">
                        <img src="{{ $question->image_url ?? 'https://preview.redd.it/yqq42zcysad61.jpg?width=640&crop=smart&auto=webp&s=5bcf36a1854041c65cd7a97aa339df8be5e09f68' }}" 
                             alt="{{ $question->identifier }}" 
                             class="w-full h-48 object-cover">
                        <div class="p-4 bg-white dark:bg-gray-800 dark:text-white text-center font-semibold">
                            {{ $question->question_text }}
                        </div>
                    </a>
                @endforeach

            </div>
        </div>
    </div>
</x-app-layout>
