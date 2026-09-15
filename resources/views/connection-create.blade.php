@extends('layouts.app')

@section('title', 'Verbinding toevoegen')

@section('content')
    <div class="mx-auto max-w-md px-4 py-12">
        <a href="{{ route('connection') }}" class="text-sm text-ink-muted hover:text-ink">← Terug naar verbindingen</a>

        <h1 class="mt-4 text-2xl font-semibold text-ink">Verbinding toevoegen</h1>

        <form method="POST" action="{{ route('connection.store') }}" class="mt-8 space-y-5">
            @csrf

            <div>
                <label for="from_station_id" class="block text-sm font-medium text-ink">Van</label>
                <select id="from_station_id" name="from_station_id"
                        class="mt-1.5 block w-full rounded-lg border border-line-strong bg-surface px-3 py-2">
                    <option value="">Kies een stad</option>
                    @foreach ($stations as $station)
                        <option value="{{ $station->id }}" @selected(old('from_station_id') == $station->id)>
                            {{ $station->name }}
                        </option>
                    @endforeach
                </select>
                @error('from_station_id')
                <p class="mt-1.5 text-sm text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="to_station_id" class="block text-sm font-medium text-ink">Naar</label>
                <select id="to_station_id" name="to_station_id"
                        class="mt-1.5 block w-full rounded-lg border border-line-strong bg-surface px-3 py-2">
                    <option value="">Kies een stad</option>
                    @foreach ($stations as $station)
                        <option value="{{ $station->id }}" @selected(old('to_station_id') == $station->id)>
                            {{ $station->name }}
                        </option>
                    @endforeach
                </select>
                @error('to_station_id')
                <p class="mt-1.5 text-sm text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="distance_km" class="block text-sm font-medium text-ink">Afstand (km)</label>
                <input id="distance_km" type="number" name="distance_km" value="{{ old('distance_km') }}"
                       class="mt-1.5 block w-full rounded-lg border border-line-strong bg-surface px-3 py-2">
                @error('distance_km')
                <p class="mt-1.5 text-sm text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="duration_minutes" class="block text-sm font-medium text-ink">Rijtijd (minuten)</label>
                <input id="duration_minutes" type="number" name="duration_minutes" value="{{ old('duration_minutes') }}"
                       class="mt-1.5 block w-full rounded-lg border border-line-strong bg-surface px-3 py-2">
                @error('duration_minutes')
                <p class="mt-1.5 text-sm text-danger">{{ $message }}</p>
                @enderror
            </div>

            <x-button full>Verbinding opslaan</x-button>
        </form>
    </div>
@endsection
