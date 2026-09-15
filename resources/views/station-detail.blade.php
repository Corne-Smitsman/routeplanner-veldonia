@extends('layouts.app')

@section('title', $station->name)

@section('content')
    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6">
        <a href="{{ route('station') }}" class="text-sm text-ink-muted hover:text-ink">← Terug naar steden</a>

        <h1 class="mt-4 text-2xl font-semibold text-ink">{{ $station->name }}</h1>

        @auth
            @if (auth()->user()->role == \App\Enums\Role::ADMIN)
                <div class="mt-4 flex flex-wrap gap-3">
                    <x-button :href="route('station.edit', $station)">Bewerken</x-button>
                    <x-button variant="danger" :href="route('station.delete', $station)">Verwijderen</x-button>
                </div>
            @endif
        @endauth

        <dl class="mt-6 divide-y divide-line rounded-xl border border-line bg-surface text-sm">
            <div class="flex justify-between px-5 py-3">
                <dt class="text-ink-muted">Code</dt>
                <dd class="font-semibold text-ink">{{ $station->code }}</dd>
            </div>
            <div class="flex justify-between px-5 py-3">
                <dt class="text-ink-muted">Regio</dt>
                <dd class="font-semibold text-ink">{{ $station->region }}</dd>
            </div>
            <div class="flex justify-between px-5 py-3">
                <dt class="text-ink-muted">Inwoners</dt>
                <dd class="font-semibold text-ink">{{ $station->population }}</dd>
            </div>
        </dl>
    </div>
@endsection
