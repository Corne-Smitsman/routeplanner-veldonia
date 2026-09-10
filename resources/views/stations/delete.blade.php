@extends('layouts.app')

@section('title', $station->name . ' verwijderen')

@section('content')
    <div class="mx-auto max-w-3xl px-4 py-10 sm:px-6">
        <x-breadcrumbs :items="[['label' => 'Steden', 'url' => route('stations.index')], ['label' => $station->name, 'url' => route('stations.show', $station)], ['label' => 'Verwijderen']]"/>

        <div class="mt-6 rounded-xl border border-danger">
            <div class="border-b border-danger px-5 py-3.5">
                <h1 class="font-semibold text-danger-700">Stad verwijderen</h1>
            </div>

            <div class="p-5">
                <p class="leading-relaxed text-ink">
                    Weet je zeker dat je <span class="font-semibold">{{ $station->name }}</span>
                    ({{ $station->code }}) wilt verwijderen? Dit kan niet ongedaan worden gemaakt.
                </p>
                <p class="mt-3 text-sm text-ink-muted">
                    Een stad die nog spoorverbindingen heeft, kan niet worden verwijderd.
                </p>

                <div class="mt-6 flex items-center gap-3">
                    <form method="POST" action="{{ route('stations.destroy', $station) }}">
                        @csrf
                        @method('delete')
                        <x-danger-button>Definitief verwijderen</x-danger-button>
                    </form>
                    <a href="{{ route('stations.show', $station) }}"
                       class="text-sm text-ink-muted transition-colors hover:text-ink">Annuleren</a>
                </div>
            </div>
        </div>
    </div>
@endsection
