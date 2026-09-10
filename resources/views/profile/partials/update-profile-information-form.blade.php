<div class="border-b border-line px-5 py-3.5">
    <h2 class="font-semibold text-ink">Gegevens</h2>
</div>

<div class="p-5">
    <form id="send-verification" method="POST" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="POST" action="{{ route('profile.update') }}" class="space-y-5">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" value="Naam"/>
            <x-text-input id="name" name="name" type="text" class="mt-1.5"
                          :value="old('name', $user->name)" required autocomplete="name"/>
            <x-input-error :messages="$errors->get('name')"/>
        </div>

        <div>
            <x-input-label for="email" value="E-mailadres"/>
            <x-text-input id="email" name="email" type="email" class="mt-1.5"
                          :value="old('email', $user->email)" required autocomplete="username"/>
            <x-input-error :messages="$errors->get('email')"/>

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <p class="mt-2 text-sm text-ink-muted">
                    Je e-mailadres is nog niet bevestigd.
                    <button form="send-verification" class="underline transition-colors hover:text-ink">
                        Verstuur de bevestigingslink opnieuw
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                    <p class="mt-2 text-sm text-ink-muted">Er is een nieuwe bevestigingslink verstuurd.</p>
                @endif
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>Opslaan</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p class="text-sm text-ink-muted">Opgeslagen.</p>
            @endif
        </div>
    </form>
</div>
