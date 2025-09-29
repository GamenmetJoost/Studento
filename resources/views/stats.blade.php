<x-app-layout>
    <x-page-title>
        Welkom, {{ Auth::check() ? Auth::user()->name : 'Student' }}
    </x-page-title>

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @php
                $colors = ['#39B9EC', '#E72B76', '#CCD626', '#F2B300'];
                $uniqueCategories = $categories->unique('category')->values();
            @endphp

            @foreach($uniqueCategories as $index => $category)
                @php
                    $color = $colors[$index % count($colors)];
                    $textColor = in_array($color, ['#CCD626', '#F2B300']) ? 'black' : 'white';
                @endphp

                <div class="text-white p-6 rounded-lg shadow-md font-semibold text-center"
                     style="background-color: {{ $color }}; color: {{ $textColor }};">
                    {{ $category->category }}
                </div>
            @endforeach

        </div>
    </div>
</x-app-layout>
