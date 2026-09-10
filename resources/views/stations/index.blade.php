@extends('layouts.app')

@section('title', 'Steden')

@section('content')
    <div class="border-b border-line bg-surface-muted">
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6">
            <x-breadcrumbs :items="[['label' => 'Steden']]"/>

            <div class="mt-4 flex flex-wrap items-end justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-semibold text-ink">Steden</h1>
                    <p class="mt-1.5 text-ink-muted">{{ $stations->count() }} steden in Veldonia</p>
                </div>
                <a href="{{ route('stations.create') }}"
                   class="inline-flex items-center rounded-lg bg-primary px-4 py-2.5 text-sm font-medium text-ink-inverse transition-colors hover:bg-primary-600">
                    Stad toevoegen
                </a>
            </div>
        </div>
    </div>

    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6">
        @if ($stations->isEmpty())
            <div class="rounded-xl border border-line px-5 py-12 text-center">
                <p class="text-ink-muted">Er zijn nog geen steden.</p>
                <a href="{{ route('stations.create') }}" class="mt-3 inline-block text-primary underline">Voeg de eerste stad toe</a>
            </div>
        @else
            <div class="overflow-x-auto rounded-xl border border-line">
                <table class="w-full text-left text-sm">
                    <thead class="border-b border-line bg-surface-muted text-ink">
                        <tr>
                            <th scope="col" class="px-5 py-3 font-semibold">Code</th>
                            <th scope="col" class="px-5 py-3 font-semibold">Naam</th>
                            <th scope="col" class="px-5 py-3 font-semibold">Regio</th>
                            <th scope="col" class="px-5 py-3 text-right font-semibold">Inwoners</th>
                            <th scope="col" class="px-5 py-3 text-right font-semibold">Acties</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-line">
                        @foreach ($stations as $station)
                            <tr class="transition-colors hover:bg-surface-muted">
                                <td class="px-5 py-3 font-medium tabular-nums text-ink">{{ $station->code }}</td>
                                <td class="px-5 py-3">
                                    <a href="{{ route('stations.show', $station) }}"
                                       class="font-medium text-ink underline decoration-line-strong underline-offset-2 transition-colors hover:decoration-ink">
                                        {{ $station->name }}
                                    </a>
                                </td>
                                <td class="px-5 py-3 text-ink-muted">{{ $station->region }}</td>
                                <td class="px-5 py-3 text-right tabular-nums text-ink-muted">
                                    {{ number_format($station->population, 0, ',', '.') }}
                                </td>
                                <td class="px-5 py-3">
                                    <div class="flex justify-end gap-3">
                                        <a href="{{ route('stations.edit', $station) }}"
                                           class="text-primary transition-colors hover:text-primary-800">Bewerken</a>
                                        <a href="{{ route('stations.confirm-destroy', $station) }}"
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
