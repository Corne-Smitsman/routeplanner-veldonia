@extends('layouts.app')

@section('title', $station->name . ' bewerken')

@section('content')
    <div class="mx-auto max-w-7xl px-4 py-12">
        <a href="{{ route('station.detail', $station) }}" class="text-sm text-ink-muted hover:text-ink">← Terug naar {{ $station->name }}</a>

        <h1 class="mt-4 text-2xl font-semibold text-ink">{{ $station->name }} bewerken</h1>

        <form method="POST" action="{{ route('station.update', $station) }}" class="mt-8 space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label for="code" class="block text-sm font-medium text-ink">Code</label>
                <input id="code" type="text" name="code" value="{{ old('code', $station->code) }}"
                       class="mt-1.5 block w-full rounded-lg border border-line-strong bg-surface px-3 py-2">
                @error('code')
                <p class="mt-1.5 text-sm text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="name" class="block text-sm font-medium text-ink">Naam</label>
                <input id="name" type="text" name="name" value="{{ old('name', $station->name) }}"
                       class="mt-1.5 block w-full rounded-lg border border-line-strong bg-surface px-3 py-2">
                @error('name')
                <p class="mt-1.5 text-sm text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="region" class="block text-sm font-medium text-ink">Regio</label>
                <input id="region" type="text" name="region" value="{{ old('region', $station->region) }}"
                       class="mt-1.5 block w-full rounded-lg border border-line-strong bg-surface px-3 py-2">
                @error('region')
                <p class="mt-1.5 text-sm text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="population" class="block text-sm font-medium text-ink">Inwoners</label>
                <input id="population" type="number" name="population" value="{{ old('population', $station->population) }}"
                       class="mt-1.5 block w-full rounded-lg border border-line-strong bg-surface px-3 py-2">
                @error('population')
                <p class="mt-1.5 text-sm text-danger">{{ $message }}</p>
                @enderror
            </div>

            <x-button full>Wijzigingen opslaan</x-button>
        </form>
    </div>
@endsection
