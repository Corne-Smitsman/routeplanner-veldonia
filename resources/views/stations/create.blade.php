@extends('layouts.app')

@section('title', 'Stad toevoegen')

@section('content')
    <div class="bg-surface">
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6">
            <x-breadcrumbs :items="[['label' => 'Steden', 'url' => route('stations.index')], ['label' => 'Stad toevoegen']]"/>

            <h1 class="text-2xl font-semibold text-ink">Stad toevoegen</h1>
            <p class="mt-1.5 text-ink-muted">Voeg een nieuwe stad toe aan het netwerk van Veldonia.</p>
        </div>
    </div>

    <div class="mx-auto max-w-7xl space-y-6 px-4 py-8 sm:px-6">
        <x-validation-errors/>

        <form method="POST" action="{{ route('stations.store') }}" class="rounded-xl border border-line bg-surface">
            @csrf
            @include('stations._form', ['submit' => 'Stad toevoegen', 'cancel' => route('stations.index')])
        </form>
    </div>
@endsection
