@extends('layouts.app')

@section('title', $connection->fromStation->name . ' → ' . $connection->toStation->name . ' verwijderen')

@section('content')
    <div class="mx-auto max-w-md px-4 py-12">
        <a href="{{ route('connection.detail', $connection) }}" class="text-sm text-ink-muted hover:text-ink">← Terug naar verbinding</a>

        <h1 class="mt-4 text-2xl font-semibold text-ink">
            {{ $connection->fromStation->name }} → {{ $connection->toStation->name }} verwijderen
        </h1>

        <div class="mt-6 rounded-xl border border-danger-100 bg-danger-50 px-5 py-4 text-sm text-danger-700">
            Weet je zeker dat je de verbinding tussen
            <strong>{{ $connection->fromStation->name }}</strong> en
            <strong>{{ $connection->toStation->name }}</strong>
            wilt verwijderen? Dit kun je niet ongedaan maken.
        </div>

        <form method="POST" action="{{ route('connection.destroy', $connection) }}" class="mt-6 flex flex-wrap gap-3">
            @csrf
            @method('DELETE')

            <x-button variant="danger">Ja, verwijderen</x-button>
            <x-button variant="outline" :href="route('connection.detail', $connection)">Annuleren</x-button>
        </form>
    </div>
@endsection
