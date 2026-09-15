@extends('layouts.app')

@section('title', $connection->fromStation->name . ' → ' . $connection->toStation->name)

@section('content')
    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6">
        <a href="{{ route('connection') }}" class="text-sm text-ink-muted hover:text-ink">← Terug naar steden</a>

        <h1 class="mt-4 text-2xl font-semibold text-ink">{{ $connection->fromStation->name }} → {{ $connection->toStation->name }}</h1>

        @auth
            @if (auth()->user()->role == \App\Enums\Role::ADMIN)
                <div class="mt-4 flex flex-wrap gap-3">
                    <x-button :href="route('connection.edit', $connection)">Bewerken</x-button>
                    <x-button variant="danger" :href="route('connection.delete', $connection)">Verwijderen</x-button>
                </div>
            @endif
        @endauth

        <dl class="mt-6 divide-y divide-line rounded-xl border border-line bg-surface text-sm">
            <div class="flex justify-between px-5 py-3">
                <dt class="text-ink-muted">Van</dt>
                <dd class="font-semibold text-ink">{{ $connection->fromStation->name }}</dd>
            </div>
            <div class="flex justify-between px-5 py-3">
                <dt class="text-ink-muted">Naar</dt>
                <dd class="font-semibold text-ink">{{ $connection->toStation->name}}</dd>
            </div>
            <div class="flex justify-between px-5 py-3">
                <dt class="text-ink-muted">Afstand</dt>
                <dd class="font-semibold text-ink">{{ $connection->distance_km }}</dd>
            </div>
            <div class="flex justify-between px-5 py-3">
                <dt class="text-ink-muted">Rijtijd</dt>
                <dd class="font-semibold text-ink">{{ $connection->duration_minutes }}</dd>
            </div>
        </dl>
    </div>
@endsection
