<div class="border-b border-line px-5 py-3.5">
    <h2 class="font-semibold text-ink">Wachtwoord</h2>
</div>

<div class="p-5">
    <form method="POST" action="{{ route('password.update') }}" class="space-y-5">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" value="Huidig wachtwoord"/>
            <x-text-input id="update_password_current_password" name="current_password"
                          type="password" class="mt-1.5" autocomplete="current-password"/>
            <x-input-error :messages="$errors->updatePassword->get('current_password')"/>
        </div>

        <div>
            <x-input-label for="update_password_password" value="Nieuw wachtwoord"/>
            <x-text-input id="update_password_password" name="password" type="password"
                          class="mt-1.5" autocomplete="new-password"/>
            <x-input-error :messages="$errors->updatePassword->get('password')"/>
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" value="Bevestig nieuw wachtwoord"/>
            <x-text-input id="update_password_password_confirmation" name="password_confirmation"
                          type="password" class="mt-1.5" autocomplete="new-password"/>
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')"/>
        </div>

        <div class="flex items-center gap-4">
            <x-button>Wachtwoord opslaan</x-button>

            @if (session('status') === 'password-updated')
                <p class="text-sm text-ink-muted">Opgeslagen.</p>
            @endif
        </div>
    </form>
</div>
