@extends('layouts.guest-welcome')

@section('content')
    <div class="min-h-screen w-full flex flex-col items-center justify-center text-center px-6">
        <h1 class="text-6xl font-extrabold text-gray-900 dark:text-white mb-6">
            Welkom bij <span class="text-[#39B9EC]">Studento</span>!
        </h1>
        <p class="text-2xl text-gray-700 dark:text-gray-300 mb-12 leading-relaxed">
            Leren hoort niet vermoeiend te zijn, leer via ons op een leuke manier ookal is het kort!<br>
            Log in of registreer om te beginnen.
        </p>
        <div class="flex flex-col sm:flex-row gap-8 w-full max-w-xl justify-center">
            <a href="{{ route('login') }}" 
               class="flex-1 px-10 py-5 rounded-xl bg-[#39B9EC] text-white font-semibold text-xl text-center shadow-lg hover:bg-[#2ea6d6] transition">
                Inloggen
            </a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" 
                   class="flex-1 px-10 py-5 rounded-xl bg-[#E72B76] text-white font-semibold text-xl text-center shadow-lg hover:bg-[#c32363] transition">
                    Registreren
                </a>
            @endif
        </div>
    </div>
@endsection
