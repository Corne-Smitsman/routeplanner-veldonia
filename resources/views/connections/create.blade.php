@extends('layouts.app')

@section('title', 'Verbinding toevoegen')

@section('content')
    <div class="bg-surface">
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6">
            <x-breadcrumbs :items="[['label' => 'Verbindingen', 'url' => route('connections.index')], ['label' => 'Verbinding toevoegen']]"/>

            <h1 class="text-2xl font-semibold text-ink">Verbinding toevoegen</h1>
            <p class="mt-1.5 text-ink-muted">Leg een nieuwe rechtstreekse spoorlijn vast.</p>
        </div>
    </div>

    <div class="mx-auto max-w-7xl space-y-6 px-4 py-8 sm:px-6">
        <x-validation-errors/>

        <form method="POST" action="{{ route('connections.store') }}" class="rounded-xl border border-line bg-surface">
            @csrf
            @include('connections._form', ['submit' => 'Verbinding toevoegen', 'cancel' => route('connections.index')])
        </form>
    </div>
@endsection
