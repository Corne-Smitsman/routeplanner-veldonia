@extends('layouts.app')

@section('title', $station->name . ' verwijderen')

@section('content')
    <div class="mx-auto max-w-7xl px-4 py-12">
        <a href="{{ route('station.detail', $station) }}" class="text-sm text-ink-muted hover:text-ink">← Terug naar {{ $station->name }}</a>

        <h1 class="mt-4 text-2xl font-semibold text-ink">{{ $station->name }} verwijderen</h1>

        <div class="mt-6 rounded-xl border border-danger-100 bg-danger-50 px-5 py-4 text-sm text-danger-700">
            Weet je zeker dat je <strong>{{ $station->name }} ({{ $station->code }})</strong> wilt verwijderen?
            Dit kun je niet ongedaan maken.
        </div>

        <form method="POST" action="{{ route('station.destroy', $station) }}" class="mt-6 flex flex-wrap gap-3">
            @csrf
            @method('DELETE')

            <x-button variant="danger">Ja, verwijderen</x-button>
            <x-button variant="outline" :href="route('station.detail', $station)">Annuleren</x-button>
        </form>
    </div>
@endsection
