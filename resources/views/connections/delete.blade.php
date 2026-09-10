@extends('layouts.app')

@section('title', 'Verbinding verwijderen')

@section('content')
    <x-page-header
        title="Verbinding verwijderen"
        :breadcrumbs="[['label' => 'Verbindingen', 'url' => route('connections.index')], ['label' => 'Verwijderen']]"/>

    <div class="rounded-xl border border-line p-5 sm:p-8">
        <p class="leading-relaxed text-ink">
            Weet je zeker dat je de verbinding tussen
            <span class="font-semibold">{{ $connection->fromStation->name }}</span> en
            <span class="font-semibold">{{ $connection->toStation->name }}</span>
            wilt verwijderen? Dit kan niet ongedaan worden gemaakt.
        </p>

        <div class="mt-6 flex flex-wrap items-center gap-3">
            <form method="POST" action="{{ route('connections.destroy', $connection) }}">
                @csrf
                @method('delete')
                <x-danger-button>Definitief verwijderen</x-danger-button>
            </form>
            <a href="{{ route('connections.index') }}"
               class="text-sm text-ink-muted transition-colors hover:text-ink">Annuleren</a>
        </div>
    </div>
@endsection
