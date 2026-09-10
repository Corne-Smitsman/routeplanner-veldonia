@extends('layouts.app')

@section('title', 'Verbinding bewerken')

@section('content')
    <div class="border-b border-line bg-surface-muted">
        <div class="mx-auto max-w-3xl px-4 py-8 sm:px-6">
            <x-breadcrumbs :items="[['label' => 'Verbindingen', 'url' => route('connections.index')], ['label' => 'Bewerken']]"/>

            <h1 class="text-2xl font-semibold text-ink">Verbinding bewerken</h1>
            <p class="mt-1.5 text-ink-muted">
                {{ $connection->fromStation->name }} — {{ $connection->toStation->name }}
            </p>
        </div>
    </div>

    <div class="mx-auto max-w-3xl space-y-6 px-4 py-8 sm:px-6">
        <x-validation-errors/>

        <form method="POST" action="{{ route('connections.update', $connection) }}" class="rounded-xl border border-line">
            @csrf
            @method('put')
            @include('connections._form', ['submit' => 'Wijzigingen opslaan', 'cancel' => route('connections.index')])
        </form>
    </div>
@endsection
