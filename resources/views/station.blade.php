@extends('layouts.app')

@section('title', 'Steden')

    @section('content')
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6">
            <h1 class="text-2xl font-semibold text-ink">Steden</h1>
            <p class="mt-1.5 text-ink-muted">Alle steden van Veldonia.</p>

        @auth
                @if (auth()->user()->role == \App\Enums\Role::ADMIN)
                    <div class="mt-4">
                        <x-button :href="route('station.create')">Stad toevoegen</x-button>
                    </div>
                @endif
            @endauth

            <table class="mt-6 w-full border border-line bg-surface text-left text-sm">
                <thead>
                <tr class="border-b border-line">
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Code</th>
                    <th class="px-4 py-3">Naam</th>
                    <th class="px-4 py-3">Regio</th>
                    <th class="px-4 py-3">Inwoners</th>
                    <th class="px-4 py-3">Aangemaakt</th>
                    <th class="px-4 py-3">Bijgewerkt</th>
                    <th class="px-4 py-3">Acties</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($stations as $station)
                    <tr class="border-b border-line">
                        <td class="px-4 py-3">{{ $station->id }}</td>
                        <td class="px-4 py-3">{{ $station->code }}</td>
                        <td class="px-4 py-3">{{ $station->name }}</td>
                        <td class="px-4 py-3">{{ $station->region }}</td>
                        <td class="px-4 py-3">{{ $station->population }}</td>
                        <td class="px-4 py-3">{{ $station->created_at }}</td>
                        <td class="px-4 py-3">{{ $station->updated_at }}</td>
                        <td class="px-4 py-3">
                            <a href="{{ route('station.detail', $station) }}"  class="font-medium text-primary hover:underline">
                                Bekijk
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endsection
