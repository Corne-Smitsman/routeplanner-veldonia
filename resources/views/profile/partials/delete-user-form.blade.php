<div class="rounded-xl border border-danger">
    <div class="border-b border-danger px-5 py-4 sm:px-8">
        <h2 class="font-semibold text-danger-700">Account verwijderen</h2>
        <p class="mt-1 text-sm text-ink-muted">Al je gegevens worden dan definitief gewist.</p>
    </div>

    <form method="POST" action="{{ route('profile.destroy') }}">
        @csrf
        @method('delete')

        <div class="p-5 sm:p-8">
            <div class="sm:max-w-sm">
                <x-input-label for="password" value="Bevestig met je wachtwoord"/>
                <x-text-input id="password" name="password" type="password" class="mt-1.5"/>
                <x-input-error :messages="$errors->userDeletion->get('password')"/>
            </div>
        </div>

        <div class="border-t border-line px-5 py-4 sm:px-8">
            <x-danger-button>Account definitief verwijderen</x-danger-button>
        </div>
    </form>
</div>
