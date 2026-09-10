<div class="border-b border-danger-500 px-5 py-3.5">
    <h2 class="font-semibold text-danger-700">Account verwijderen</h2>
</div>

<div class="p-5">
    <p class="max-w-xl text-sm leading-relaxed text-ink-muted">
        Als je je account verwijdert, worden al je gegevens definitief gewist.
        Bewaar wat je wilt houden voordat je doorgaat.
    </p>

    <form method="POST" action="{{ route('profile.destroy') }}" class="mt-5 space-y-5">
        @csrf
        @method('delete')

        <div class="max-w-sm">
            <x-input-label for="password" value="Bevestig met je wachtwoord"/>
            <x-text-input id="password" name="password" type="password" class="mt-1.5"/>
            <x-input-error :messages="$errors->userDeletion->get('password')"/>
        </div>

        <x-danger-button>Account definitief verwijderen</x-danger-button>
    </form>
</div>
