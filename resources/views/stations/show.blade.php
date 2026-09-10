@extends('layouts.app')

@section('title', $station->name)

@section('content')
    <x-page-header
        :title="$station->name"
        :subtitle="$station->region"
        :breadcrumbs="[['label' => 'Steden', 'url' => route('stations.index')], ['label' => $station->name]]">
        <x-slot:actions>
            <a href="{{ route('stations.edit', $station) }}"
               class="inline-flex items-center rounded-lg border border-line-strong px-4 py-2.5 text-sm font-medium text-ink transition-colors hover:border-ink">
                Bewerken
            </a>
            <a href="{{ route('stations.confirm-destroy', $station) }}"
               class="inline-flex items-center rounded-lg border border-danger px-4 py-2.5 text-sm font-medium text-danger transition-colors hover:bg-danger-50">
                Verwijderen
            </a>
        </x-slot:actions>
    </x-page-header>

    <div class="rounded-xl border border-line">
        <div class="border-b border-line px-5 py-4 sm:px-8">
            <h2 class="font-semibold text-ink">Gegevens</h2>
        </div>
        <dl class="divide-y divide-line text-sm">
            <div class="flex items-baseline justify-between gap-4 px-5 py-4 sm:px-8">
                <dt class="text-ink-muted">Stationscode</dt>
                <dd class="font-medium tabular-nums text-ink">{{ $station->code }}</dd>
            </div>
            <div class="flex items-baseline justify-between gap-4 px-5 py-4 sm:px-8">
                <dt class="text-ink-muted">Naam</dt>
                <dd class="font-medium text-ink">{{ $station->name }}</dd>
            </div>
            <div class="flex items-baseline justify-between gap-4 px-5 py-4 sm:px-8">
                <dt class="text-ink-muted">Regio</dt>
                <dd class="font-medium text-ink">{{ $station->region }}</dd>
            </div>
            <div class="flex items-baseline justify-between gap-4 px-5 py-4 sm:px-8">
                <dt class="text-ink-muted">Inwoners</dt>
                <dd class="font-medium tabular-nums text-ink">{{ number_format($station->population, 0, ',', '.') }}</dd>
            </div>
        </dl>
    </div>
@endsection
