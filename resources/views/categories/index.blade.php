<x-app-layout>
    <x-page-title>
        Alle onderwerpen
    </x-page-title>

    <div class="py-8">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            @if($categories->isEmpty())
                <div class="bg-yellow-50 text-yellow-800 p-4 rounded border border-yellow-200">
                    Er zijn nog geen onderwerpen aangemaakt.
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($categories as $category)
                        <div class="p-5 rounded-lg bg-white dark:bg-gray-800 shadow border">
                            <div class="text-sm text-gray-500 dark:text-gray-400 mb-1">{{ $category->sector }}</div>
                            <div class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $category->category }}</div>
                            <div class="mt-4 flex flex-col gap-2">
                                <!-- Start toets knop (blauw corporate) -->
                                <a href="{{ route('toetsen.category', ['category_id' => $category->id]) }}" 
                                   class="px-3 py-2 rounded bg-[#39B9EC] hover:opacity-90 text-white text-sm w-full text-center">
                                    Start toets
                                </a>

                                @php
                                    $isFollowing = auth()->check() ? auth()->user()->categories->contains($category->id) : false;
                                @endphp

                                @if($isFollowing)
                                    <!-- Verwijder interesse knop (roze zorg & welzijn) -->
                                    <form method="POST" action="{{ route('categories.unfollow', $category) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                            class="px-3 py-2 rounded bg-[#E72B76] hover:opacity-90 text-white text-sm w-full">
                                            Verwijder interesse
                                        </button>
                                    </form>
                                @else
                                    <!-- Voeg toe aan interesses knop (groen techniek) -->
                                    <form method="POST" action="{{ route('categories.follow', $category) }}">
                                        @csrf
                                        <button type="submit" 
                                            class="px-3 py-2 rounded bg-[#CCD626] hover:opacity-90 text-black text-sm w-full">
                                            Voeg toe aan interesses
                                        </button>
                                    </form>
                                @endif

                                <!-- Extra knop voorbeeld (geel training & advies) -->
                                {{-- <button class="px-3 py-2 rounded bg-[#F2B300] hover:opacity-90 text-black text-sm w-full">
                                    Extra optie
                                </button> --}}
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
