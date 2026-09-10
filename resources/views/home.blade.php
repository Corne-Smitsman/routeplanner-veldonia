@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <x-page-header
        title="Goedendag {{ auth()->user()->name }}"
        subtitle="Tien steden, vijftien spoorlijnen en één knooppunt."/>

    <div class="grid gap-6 lg:grid-cols-3">
        <a href="{{ route('stations.index') }}"
           class="rounded-xl border border-line p-6 transition-colors hover:bg-primary-50">
            <h2 class="font-semibold text-ink">Steden</h2>
            <p class="mt-2 text-sm leading-relaxed text-ink-muted">
                Bekijk alle tien steden van Veldonia en beheer hun gegevens.
            </p>
        </a>

        <a href="{{ route('connections.index') }}"
           class="rounded-xl border border-line p-6 transition-colors hover:bg-primary-50">
            <h2 class="font-semibold text-ink">Verbindingen</h2>
            <p class="mt-2 text-sm leading-relaxed text-ink-muted">
                Alle vijftien rechtstreekse spoorlijnen, met afstand en rijtijd.
            </p>
        </a>

        <a href="{{ route('about') }}"
           class="rounded-xl border border-line p-6 transition-colors hover:bg-primary-50">
            <h2 class="font-semibold text-ink">Over Veldonia</h2>
            <p class="mt-2 text-sm leading-relaxed text-ink-muted">
                Lees over het land, het spoornetwerk en de dienstregeling.
            </p>
        </a>
    </div>

    <div class="rounded-xl border border-line p-5 sm:p-8">
        <h2 class="font-semibold text-ink">Het spoornetwerk</h2>
        <img src="{{ asset('images/netwerkkaart.png') }}"
             srcset="{{ asset('images/netwerkkaart.png') }} 1x, {{ asset('images/netwerkkaart@2x.png') }} 2x"
             alt="Kaart van het spoornetwerk van Veldonia"
             class="mx-auto mt-4 h-auto w-full max-w-3xl">
    </div>
@endsection
