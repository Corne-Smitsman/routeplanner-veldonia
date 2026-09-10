<x-guest-layout>
    @section('title', 'Wachtwoord vergeten')

    <h1 class="text-2xl font-semibold text-ink">Wachtwoord vergeten</h1>
    <p class="mt-2 text-sm leading-relaxed text-ink-muted">
        Vul je e-mailadres in, dan sturen we je een link om een nieuw wachtwoord in te stellen.
    </p>

    <x-auth-session-status class="mt-6" :status="session('status')"/>

    <form method="POST" action="{{ route('password.email') }}" class="mt-8 space-y-5">
        @csrf

        <div>
            <x-input-label for="email" value="E-mailadres"/>
            <x-text-input id="email" class="mt-1.5" type="email" name="email"
                          :value="old('email')" required autofocus/>
            <x-input-error :messages="$errors->get('email')"/>
        </div>

        <x-primary-button class="w-full">Herstellink versturen</x-primary-button>
    </form>

    <p class="mt-8 border-t border-line pt-6 text-sm text-ink-muted">
        <a href="{{ route('login') }}" class="font-medium text-ink underline">Terug naar inloggen</a>
    </p>
</x-guest-layout>
