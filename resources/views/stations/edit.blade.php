@extends('layouts.app')

@section('title', $station->name . ' bewerken')

@section('content')
    <div class="bg-surface-muted">
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6">
            <x-breadcrumbs :items="[['label' => 'Steden', 'url' => route('stations.index')], ['label' => $station->name, 'url' => route('stations.show', $station)], ['label' => 'Bewerken']]"/>

            <h1 class="text-2xl font-semibold text-ink">{{ $station->name }} bewerken</h1>
            <p class="mt-1.5 text-ink-muted">Pas de gegevens van deze stad aan.</p>
        </div>
    </div>

    <div class="mx-auto max-w-7xl space-y-6 px-4 py-8 sm:px-6">
        <x-validation-errors/>

        <form method="POST" action="{{ route('stations.update', $station) }}" class="rounded-xl border border-line bg-surface">
            @csrf
            @method('put')
            @include('stations._form', ['submit' => 'Wijzigingen opslaan', 'cancel' => route('stations.show', $station)])
        </form>
    </div>
@endsection
