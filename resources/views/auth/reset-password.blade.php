<x-guest-layout>
    @section('title', 'Nieuw wachtwoord')

    <h1 class="text-2xl font-semibold text-ink">Nieuw wachtwoord instellen</h1>

    <form method="POST" action="{{ route('password.store') }}" class="mt-8 space-y-5">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div>
            <x-input-label for="email" value="E-mailadres"/>
            <x-text-input id="email" class="mt-1.5" type="email" name="email"
                          :value="old('email', $request->email)" required autofocus autocomplete="username"/>
            <x-input-error :messages="$errors->get('email')"/>
        </div>

        <div>
            <x-input-label for="password" value="Nieuw wachtwoord"/>
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

        <x-button class="w-full">Wachtwoord opslaan</x-button>
    </form>
</x-guest-layout>
