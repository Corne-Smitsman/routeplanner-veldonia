@extends('layouts.app')

@section('title', $station->name)

@section('content')
    <div class="border-b border-line bg-surface-muted">
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6">
            <x-breadcrumbs :items="[['label' => 'Steden', 'url' => route('stations.index')], ['label' => $station->name]]"/>

            <div class="mt-4 flex flex-wrap items-end justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-semibold text-ink">{{ $station->name }}</h1>
                    <p class="mt-1.5 text-ink-muted">{{ $station->region }}</p>
                </div>
                <div class="flex gap-3">
                    <a href="{{ route('stations.edit', $station) }}"
                       class="inline-flex items-center rounded-lg border border-line-strong px-4 py-2.5 text-sm font-medium text-ink transition-colors hover:border-ink">
                        Bewerken
                    </a>
                    <a href="{{ route('stations.confirm-destroy', $station) }}"
                       class="inline-flex items-center rounded-lg border border-danger px-4 py-2.5 text-sm font-medium text-danger transition-colors hover:bg-danger-50">
                        Verwijderen
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="mx-auto max-w-3xl px-4 py-8 sm:px-6">
        <div class="rounded-xl border border-line">
            <div class="border-b border-line px-5 py-3.5">
                <h2 class="font-semibold text-ink">Gegevens</h2>
            </div>
            <dl class="divide-y divide-line text-sm">
                <div class="flex items-baseline justify-between px-5 py-3.5">
                    <dt class="text-ink-muted">Stationscode</dt>
                    <dd class="font-medium tabular-nums text-ink">{{ $station->code }}</dd>
                </div>
                <div class="flex items-baseline justify-between px-5 py-3.5">
                    <dt class="text-ink-muted">Naam</dt>
                    <dd class="font-medium text-ink">{{ $station->name }}</dd>
                </div>
                <div class="flex items-baseline justify-between px-5 py-3.5">
                    <dt class="text-ink-muted">Regio</dt>
                    <dd class="font-medium text-ink">{{ $station->region }}</dd>
                </div>
                <div class="flex items-baseline justify-between px-5 py-3.5">
                    <dt class="text-ink-muted">Inwoners</dt>
                    <dd class="font-medium tabular-nums text-ink">{{ number_format($station->population, 0, ',', '.') }}</dd>
                </div>
            </dl>
        </div>
    </div>
@endsection
