@extends('layouts.app')

@section('title', 'Verbindingen')

@section('content')
    <div class="bg-surface-muted">
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6">
            <x-breadcrumbs :items="[['label' => 'Verbindingen']]"/>

            <div class="mt-4 flex flex-wrap items-end justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-semibold text-ink">Verbindingen</h1>
                    <p class="mt-1.5 text-ink-muted">{{ $connections->count() }} rechtstreekse spoorlijnen, in beide richtingen te berijden</p>
                </div>
                <x-button :href="route('connections.create')">Verbinding toevoegen</x-button>
            </div>
        </div>
    </div>

    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6">
        @if ($connections->isEmpty())
            <div class="rounded-xl border border-line bg-surface px-5 py-12 text-center">
                <p class="text-ink-muted">Er zijn nog geen verbindingen.</p>
                <a href="{{ route('connections.create') }}" class="mt-3 inline-block text-primary underline">Voeg de eerste verbinding toe</a>
            </div>
        @else
            <div class="overflow-x-auto rounded-xl border border-line bg-surface">
                <table class="w-full text-left text-sm">
                    <thead class="border-b border-line bg-surface-muted text-ink">
                        <tr>
                            <th scope="col" class="px-5 py-3 font-semibold">Van</th>
                            <th scope="col" class="px-5 py-3 font-semibold">Naar</th>
                            <th scope="col" class="px-5 py-3 text-right font-semibold">Afstand</th>
                            <th scope="col" class="px-5 py-3 text-right font-semibold">Rijtijd</th>
                            <th scope="col" class="px-5 py-3 text-right font-semibold">Acties</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-line">
                        @foreach ($connections as $connection)
                            <tr class="transition-colors hover:bg-surface-muted">
                                <td class="px-5 py-3">
                                    <a href="{{ route('stations.show', $connection->fromStation) }}"
                                       class="font-medium text-ink underline decoration-line-strong underline-offset-2 transition-colors hover:decoration-ink">
                                        {{ $connection->fromStation->name }}
                                    </a>
                                </td>
                                <td class="px-5 py-3">
                                    <a href="{{ route('stations.show', $connection->toStation) }}"
                                       class="font-medium text-ink underline decoration-line-strong underline-offset-2 transition-colors hover:decoration-ink">
                                        {{ $connection->toStation->name }}
                                    </a>
                                </td>
                                <td class="px-5 py-3 text-right tabular-nums text-ink-muted">{{ $connection->distance_km }} km</td>
                                <td class="px-5 py-3 text-right tabular-nums text-ink-muted">{{ $connection->duration_minutes }} min</td>
                                <td class="px-5 py-3">
                                    <div class="flex justify-end gap-3">
                                        <a href="{{ route('connections.edit', $connection) }}"
                                           class="text-primary transition-colors hover:text-primary-800">Bewerken</a>
                                        <a href="{{ route('connections.confirm-destroy', $connection) }}"
                                           class="text-danger transition-colors hover:text-danger-700">Verwijderen</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
