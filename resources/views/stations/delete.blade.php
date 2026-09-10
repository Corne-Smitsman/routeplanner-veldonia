@extends('layouts.app')

@section('title', $station->name . ' verwijderen')

@section('content')
    <x-page-header
        title="{{ $station->name }} verwijderen"
        :breadcrumbs="[
            ['label' => 'Steden', 'url' => route('stations.index')],
            ['label' => $station->name, 'url' => route('stations.show', $station)],
            ['label' => 'Verwijderen'],
        ]"/>

    <div class="rounded-xl border border-line p-5 sm:p-8">
        <p class="leading-relaxed text-ink">
            Weet je zeker dat je <span class="font-semibold">{{ $station->name }}</span>
            ({{ $station->code }}) wilt verwijderen? Dit kan niet ongedaan worden gemaakt.
        </p>
        <p class="mt-3 text-sm text-ink-muted">
            Een stad die nog spoorverbindingen heeft, kan niet worden verwijderd.
        </p>

        <div class="mt-6 flex flex-wrap items-center gap-3">
            <form method="POST" action="{{ route('stations.destroy', $station) }}">
                @csrf
                @method('delete')
                <x-danger-button>Definitief verwijderen</x-danger-button>
            </form>
            <a href="{{ route('stations.show', $station) }}"
               class="text-sm text-ink-muted transition-colors hover:text-ink">Annuleren</a>
        </div>
    </div>
@endsection
