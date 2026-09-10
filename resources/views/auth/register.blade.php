<x-guest-layout>
    @section('title', 'Account aanmaken')

    <h1 class="text-2xl font-semibold text-ink">Account aanmaken</h1>
    <p class="mt-2 text-sm text-ink-muted">Maak een account om reizen te plannen en te bewaren.</p>

    <form method="POST" action="{{ route('register') }}" class="mt-8 space-y-5">
        @csrf

        <div>
            <x-input-label for="name" value="Naam"/>
            <x-text-input id="name" class="mt-1.5" type="text" name="name"
                          :value="old('name')" required autofocus autocomplete="name"/>
            <x-input-error :messages="$errors->get('name')"/>
        </div>

        <div>
            <x-input-label for="email" value="E-mailadres"/>
            <x-text-input id="email" class="mt-1.5" type="email" name="email"
                          :value="old('email')" required autocomplete="username"/>
            <x-input-error :messages="$errors->get('email')"/>
        </div>

        <div>
            <x-input-label for="password" value="Wachtwoord"/>
            <x-text-input id="password" class="mt-1.5" type="password" name="password"
                          required autocomplete="new-password"/>
            <x-input-error :messages="$errors->get('password')"/>
        </div>

        <div>
            <x-input-label for="password_confirmation" value="Wachtwoord bevestigen"/>
            <x-text-input id="password_confirmation" class="mt-1.5" type="password"
                          name="password_confirmation" required autocomplete="new-password"/>
            <x-input-error :messages="$errors->get('password_confirmation')"/>
        </div>

        <x-button class="w-full">Account aanmaken</x-button>
    </form>

    <p class="mt-8 border-t border-line pt-6 text-sm text-ink-muted">
        Heb je al een account?
        <a href="{{ route('login') }}" class="font-medium text-ink underline">Inloggen</a>
    </p>
</x-guest-layout>
