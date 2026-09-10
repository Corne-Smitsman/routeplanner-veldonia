@extends('layouts.app')

@section('title', 'Verbindingen')

@section('content')
    <x-page-header
        title="Verbindingen"
        subtitle="{{ $connections->count() }} rechtstreekse spoorlijnen, in beide richtingen te berijden"
        :breadcrumbs="[['label' => 'Verbindingen']]">
        <x-slot:actions>
            <a href="{{ route('connections.create') }}"
               class="inline-flex items-center rounded-lg bg-primary px-4 py-2.5 text-sm font-medium text-ink-inverse transition-colors hover:bg-primary-600">
                Verbinding toevoegen
            </a>
        </x-slot:actions>
    </x-page-header>

    <div class="overflow-hidden rounded-xl border border-line">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="border-b border-line text-ink">
                    <tr>
                        <th scope="col" class="px-3 py-4 font-semibold sm:px-5">Van</th>
                        <th scope="col" class="px-3 py-4 font-semibold sm:px-5">Naar</th>
                        <th scope="col" class="hidden px-3 py-4 text-right font-semibold sm:table-cell sm:px-5">Afstand</th>
                        <th scope="col" class="px-3 py-4 text-right font-semibold sm:px-5">Rijtijd</th>
                        <th scope="col" class="px-3 py-4 text-right font-semibold sm:px-5">Acties</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-line">
                    @forelse ($connections as $connection)
                        <tr class="transition-colors hover:bg-surface-muted">
                            <td class="px-3 py-3.5 sm:px-5">
                                <a href="{{ route('stations.show', $connection->fromStation) }}"
                                   class="font-medium text-ink underline decoration-line-strong underline-offset-2 transition-colors hover:decoration-ink">
                                    {{ $connection->fromStation->name }}
                                </a>
                            </td>
                            <td class="px-3 py-3.5 sm:px-5">
                                <a href="{{ route('stations.show', $connection->toStation) }}"
                                   class="font-medium text-ink underline decoration-line-strong underline-offset-2 transition-colors hover:decoration-ink">
                                    {{ $connection->toStation->name }}
                                </a>
                            </td>
                            <td class="hidden px-3 py-3.5 sm:px-5 text-right tabular-nums text-ink-muted sm:table-cell">{{ $connection->distance_km }} km</td>
                            <td class="px-3 py-3.5 sm:px-5 text-right tabular-nums text-ink-muted">{{ $connection->duration_minutes }} min</td>
                            <td class="px-3 py-3.5 sm:px-5">
                                <div class="flex justify-end gap-3 whitespace-nowrap">
                                    <a href="{{ route('connections.edit', $connection) }}"
                                       class="text-primary transition-colors hover:text-primary-800">Bewerken</a>
                                    <a href="{{ route('connections.confirm-destroy', $connection) }}"
                                       class="text-danger transition-colors hover:text-danger-700">Verwijderen</a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-3 py-12 text-center text-ink-muted sm:px-5">
                                Er zijn nog geen verbindingen.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
