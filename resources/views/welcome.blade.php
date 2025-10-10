@extends('layouts.guest-welcome')

@section('content')
    <div class="min-h-screen w-full flex flex-col items-center justify-center text-center px-6">
        <div class="mb-6 flex items-center justify-center">
            <div class="bg-white rounded-2xl p-4 flex items-center justify-center" style="box-shadow: 0 2px 8px 0 rgba(0,0,0,0.04); width: 276px; height: 276px;">
                <img src="https://static.wixstatic.com/media/5df7e6_d98c513573524d6b9e5de1136f0cad49~mv2.jpg/v1/crop/x_0,y_73,w_1277,h_1140/fill/w_280,h_250,al_c,q_80,usm_0.66_1.00_0.01,enc_avif,quality_auto/Jubileumlogo_JPG_Wit.jpg" alt="Consortium Beroepsonderwijs Logo" class="w-full h-full object-contain">
            </div>
        </div>
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
