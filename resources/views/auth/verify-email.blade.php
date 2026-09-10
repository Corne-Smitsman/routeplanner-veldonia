<x-guest-layout>
    @section('title', 'E-mailadres bevestigen')

    <h1 class="text-2xl font-semibold text-ink">Bevestig je e-mailadres</h1>
    <p class="mt-2 text-sm leading-relaxed text-ink-muted">
        We hebben je een link gestuurd. Niets ontvangen? Dan sturen we hem opnieuw.
    </p>

    @if (session('status') === 'verification-link-sent')
        <x-alert class="mt-6">Er is een nieuwe bevestigingslink verstuurd.</x-alert>
    @endif

    <div class="mt-8 flex items-center justify-between gap-4">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <x-button>Opnieuw versturen</x-button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-sm text-ink-muted underline transition-colors hover:text-ink">
                Uitloggen
            </button>
        </form>
    </div>
</x-guest-layout>
