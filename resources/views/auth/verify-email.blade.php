<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Bedankt voor je registratie! Voordat je van start gaat, willen we je vragen je e-mailadres te verifiëren door op de link te klikken die we zojuist naar je hebben gemaild. Heb je de e-mail niet ontvangen? Dan sturen we je graag een nieuwe.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ __('Er is een nieuwe verificatielink verzonden naar het e-mailadres dat je tijdens de registratie hebt opgegeven.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Verificatie-e-mail opnieuw versturen') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                {{ __('Uitloggen') }}
            </button>
        </form>
    </div>
</x-guest-layout>
