<x-guest-layout>
    @section('title', 'Inloggen')

    <h1 class="text-2xl font-semibold text-ink">Inloggen</h1>
    <p class="mt-2 text-sm text-ink-muted">Log in om je reis door Veldonia te plannen.</p>

    <x-auth-session-status class="mt-6" :status="session('status')"/>

    <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-5">
        @csrf

        <div>
            <x-input-label for="email" value="E-mailadres"/>
            <x-text-input id="email" class="mt-1.5" type="email" name="email"
                          :value="old('email')" required autofocus autocomplete="username"/>
            <x-input-error :messages="$errors->get('email')"/>
        </div>

        <div>
            <x-input-label for="password" value="Wachtwoord"/>
            <x-text-input id="password" class="mt-1.5" type="password" name="password"
                          required autocomplete="current-password"/>
            <x-input-error :messages="$errors->get('password')"/>
        </div>

        <div class="flex items-center justify-between">
            <label for="remember_me" class="flex items-center gap-2 text-sm text-ink-muted">
                <input id="remember_me" type="checkbox" name="remember"
                       class="rounded-lg border-line-strong text-primary focus:ring-primary">
                Ingelogd blijven
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}"
                   class="text-sm text-ink-muted underline transition-colors hover:text-ink">
                    Wachtwoord vergeten?
                </a>
            @endif
        </div>

        <x-button class="w-full">Inloggen</x-button>
    </form>

    <p class="mt-8 border-t border-line pt-6 text-sm text-ink-muted">
        Nog geen account?
        <a href="{{ route('register') }}" class="font-medium text-ink underline">Account aanmaken</a>
    </p>
</x-guest-layout>
