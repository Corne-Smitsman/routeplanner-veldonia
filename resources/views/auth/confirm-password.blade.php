<x-guest-layout>
    @section('title', 'Wachtwoord bevestigen')

    <h1 class="text-2xl font-semibold text-ink">Even bevestigen</h1>
    <p class="mt-2 text-sm leading-relaxed text-ink-muted">
        Dit is een beveiligd onderdeel. Bevestig je wachtwoord om verder te gaan.
    </p>

    <form method="POST" action="{{ route('password.confirm') }}" class="mt-8 space-y-5">
        @csrf

        <div>
            <x-input-label for="password" value="Wachtwoord"/>
            <x-text-input id="password" class="mt-1.5" type="password" name="password"
                          required autocomplete="current-password"/>
            <x-input-error :messages="$errors->get('password')"/>
        </div>

        <x-button class="w-full">Bevestigen</x-button>
    </form>
</x-guest-layout>
