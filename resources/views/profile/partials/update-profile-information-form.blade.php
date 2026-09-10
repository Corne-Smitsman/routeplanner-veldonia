<div class="rounded-xl border border-line">
    <div class="border-b border-line px-5 py-4 sm:px-8">
        <h2 class="font-semibold text-ink">Gegevens</h2>
        <p class="mt-1 text-sm text-ink-muted">Je naam en e-mailadres.</p>
    </div>

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <div class="grid gap-5 p-5 sm:grid-cols-2 sm:p-8">
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
            </div>
        </div>

        <div class="flex flex-wrap items-center gap-3 border-t border-line px-5 py-4 sm:px-8">
            <x-primary-button>Opslaan</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p class="text-sm text-ink-muted">Opgeslagen.</p>
            @endif
        </div>
    </form>
</div>
