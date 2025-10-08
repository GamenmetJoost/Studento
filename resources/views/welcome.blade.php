@extends('layouts.guest-welcome')

@section('content')
    <div class="min-h-screen w-full flex flex-col items-center justify-center text-center px-6">
        <h1 class="text-6xl font-extrabold text-gray-900 dark:text-white mb-6">
            Welkom bij <span class="text-primary_blue">Studento</span>!
        </h1>
        <p class="text-2xl text-gray-700 dark:text-gray-300 mb-12 leading-relaxed">
            Leren hoort niet vermoeiend te zijn, leer via ons op een leuke manier ookal is het kort!<br>
            Log in of registreer om te beginnen.
        </p>
        @guest
            <div class="flex flex-col sm:flex-row gap-8 w-full max-w-xl justify-center">
                <a href="{{ route('login') }}" 
                class="flex-1 px-10 py-5 rounded-xl bg-primary_blue text-white font-semibold text-xl text-center shadow-lg hover:bg-secondary_blue transition">
                    Inloggen
                </a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" 
                    class="flex-1 px-10 py-5 rounded-xl bg-primary_pink text-white font-semibold text-xl text-center shadow-lg hover:bg-secondary_pink transition">
                        Registreren
                    </a>
                @endif
            </div>
        @endguest
        @auth
            <div class="flex justify-center w-full max-w-xl mt-8">
                <a href="{{ route('dashboard') }}"
                   class="flex-1 px-10 py-5 rounded-xl bg-primary_blue text-white font-semibold text-xl text-center shadow-lg hover:bg-secondary_blue transition">
                    Ga naar je dashboard
                </a>
            </div>
        @endauth
    </div>
@endsection
