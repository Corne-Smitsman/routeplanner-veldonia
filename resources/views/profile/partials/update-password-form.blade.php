<div class="rounded-xl border border-line">
    <div class="border-b border-line px-5 py-4 sm:px-8">
        <h2 class="font-semibold text-ink">Wachtwoord</h2>
        <p class="mt-1 text-sm text-ink-muted">Kies een nieuw wachtwoord voor je account.</p>
    </div>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <div class="grid gap-5 p-5 sm:grid-cols-2 sm:p-8">
            <div class="sm:col-span-2">
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
                <x-input-label for="update_password_password_confirmation" value="Bevestig wachtwoord"/>
                <x-text-input id="update_password_password_confirmation" name="password_confirmation"
                              type="password" class="mt-1.5" autocomplete="new-password"/>
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')"/>
            </div>
        </div>

        <div class="flex flex-wrap items-center gap-3 border-t border-line px-5 py-4 sm:px-8">
            <x-primary-button>Wachtwoord opslaan</x-primary-button>

            @if (session('status') === 'password-updated')
                <p class="text-sm text-ink-muted">Opgeslagen.</p>
            @endif
        </div>
    </form>
</div>
