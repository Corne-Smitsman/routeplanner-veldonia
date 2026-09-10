@extends('layouts.app')

@section('title', 'Verbinding verwijderen')

@section('content')
    <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6">
        <x-breadcrumbs :items="[['label' => 'Verbindingen', 'url' => route('connections.index')], ['label' => 'Verwijderen']]"/>

        <div class="mt-6 rounded-xl border border-danger">
            <div class="border-b border-danger px-5 py-3.5">
                <h1 class="font-semibold text-danger-700">Verbinding verwijderen</h1>
            </div>

            <div class="p-5">
                <p class="leading-relaxed text-ink">
                    Weet je zeker dat je de verbinding tussen
                    <span class="font-semibold">{{ $connection->fromStation->name }}</span> en
                    <span class="font-semibold">{{ $connection->toStation->name }}</span>
                    wilt verwijderen? Dit kan niet ongedaan worden gemaakt.
                </p>

                <div class="mt-6 flex items-center gap-3">
                    <form method="POST" action="{{ route('connections.destroy', $connection) }}">
                        @csrf
                        @method('delete')
                        <x-danger-button>Definitief verwijderen</x-danger-button>
                    </form>
                    <a href="{{ route('connections.index') }}"
                       class="text-sm text-ink-muted transition-colors hover:text-ink">Annuleren</a>
                </div>
            </div>
        </div>
    </div>
@endsection
