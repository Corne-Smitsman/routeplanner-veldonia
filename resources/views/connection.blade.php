@extends('layouts.app')

@section('title', 'Verbindingen')

@section('content')
    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6">
        <h1 class="text-2xl font-semibold text-ink">Verbindingen</h1>
        <p class="mt-1.5 text-ink-muted">Alle rechtstreekse spoorverbindingen van Veldonia.</p>

        @auth
            @if (auth()->user()->role == \App\Enums\Role::ADMIN)
                <div class="mt-4">
                    <x-button :href="route('connection.create')">Verbinding toevoegen</x-button>
                </div>
            @endif
        @endauth

        <table class="mt-6 w-full border border-line bg-surface text-left text-sm">
            <thead>
            <tr class="border-b border-line">
                <th class="px-4 py-3">Van</th>
                <th class="px-4 py-3">Naar</th>
                <th class="px-4 py-3">Afstand</th>
                <th class="px-4 py-3">Rijtijd</th>
                <th class="px-4 py-3">Acties</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($connections as $connection)
                <tr class="border-b border-line">
                    <td class="px-4 py-3">{{ $connection->fromStation->name }}</td>
                    <td class="px-4 py-3">{{ $connection->toStation->name }}</td>
                    <td class="px-4 py-3">{{ $connection->distance_km }} km</td>
                    <td class="px-4 py-3">{{ $connection->duration_minutes }} min</td>
                    <td class="px-4 py-3">
                        <a href="{{ route('connection.detail', $connection) }}"  class="font-medium text-primary hover:underline">
                            Bekijk
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
