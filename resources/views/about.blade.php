@extends('layouts.app')

@section('title', 'Over Veldonia')

@section('content')
    <x-page-header
        title="Over Veldonia"
        subtitle="Een fictief land met tien steden en een spoornetwerk dat niet overal rechtstreeks is."
        :breadcrumbs="[['label' => 'Over Veldonia']]"/>

    <div class="grid gap-6 lg:grid-cols-3">
        <div class="space-y-6 lg:col-span-2">
            <div class="rounded-xl border border-line p-5 sm:p-8">
                <h2 class="text-lg font-semibold text-ink">Het land</h2>
                <p class="mt-3 leading-relaxed text-ink-muted">
                    In het midden van het land ligt Velburg, met 480.000 inwoners de hoofdstad en
                    veruit de grootste stad. Naar het noorden liggen Noorderwijk en het kustplaatsje
                    Duinzicht, in de heuvels in het noordoosten ligt Bergenrode. Het oosten wordt
                    gedomineerd door de havenstad Oosthaven, terwijl in het zuiden Zuiderburcht,
                    Zonnedal en het aan een meer gelegen Meerhoven liggen. Westdorp is de kleine
                    buitenpost in het westen en Rivierbeek ligt in het rivierdal in het zuidoosten.
                </p>
            </div>

            <div class="rounded-xl border border-line p-5 sm:p-8">
                <h2 class="text-lg font-semibold text-ink">Het spoornetwerk</h2>
                <p class="mt-3 leading-relaxed text-ink-muted">
                    Vijftien rechtstreekse spoorlijnen verbinden de steden met elkaar, allemaal in
                    beide richtingen te berijden. Velburg is het knooppunt van het net: vanuit de
                    hoofdstad rijden treinen naar vijf verschillende steden.
                </p>
                <p class="mt-3 leading-relaxed text-ink-muted">
                    Lang niet elke stad heeft een rechtstreekse verbinding met elke andere stad. Wie
                    van Duinzicht naar Zonnedal wil, moet minstens twee keer overstappen.
                </p>

                <img src="{{ asset('images/netwerkkaart.png') }}"
                     srcset="{{ asset('images/netwerkkaart.png') }} 1x, {{ asset('images/netwerkkaart@2x.png') }} 2x"
                     alt="Kaart van het spoornetwerk van Veldonia"
                     class="mt-6 h-auto w-full">
            </div>

            <div class="rounded-xl border border-line p-5 sm:p-8">
                <h2 class="text-lg font-semibold text-ink">De dienstregeling</h2>
                <p class="mt-3 leading-relaxed text-ink-muted">
                    Op de drukste lijnen rijdt elk half uur een trein tussen 06:00 en 23:00 uur.
                    Rustiger lijnen hebben een uurdienst tot 22:00 uur, en tussen Oosthaven en
                    Bergenrode rijdt maar eens in de twee uur een trein.
                </p>
            </div>
        </div>

        <div class="rounded-xl border border-line p-5 sm:p-6">
            <h2 class="font-semibold text-ink">Veldonia in cijfers</h2>
            <dl class="mt-4 divide-y divide-line text-sm">
                <div class="flex items-baseline justify-between py-3">
                    <dt class="text-ink-muted">Steden</dt>
                    <dd class="font-semibold tabular-nums text-ink">10</dd>
                </div>
                <div class="flex items-baseline justify-between py-3">
                    <dt class="text-ink-muted">Spoorverbindingen</dt>
                    <dd class="font-semibold tabular-nums text-ink">15</dd>
                </div>
                <div class="flex items-baseline justify-between py-3">
                    <dt class="text-ink-muted">Hoofdstad</dt>
                    <dd class="font-semibold text-ink">Velburg</dd>
                </div>
                <div class="flex items-baseline justify-between py-3">
                    <dt class="text-ink-muted">Inwoners hoofdstad</dt>
                    <dd class="font-semibold tabular-nums text-ink">480.000</dd>
                </div>
                <div class="flex items-baseline justify-between py-3">
                    <dt class="text-ink-muted">Langste lijn</dt>
                    <dd class="font-semibold tabular-nums text-ink">80 km</dd>
                </div>
            </dl>
        </div>
    </div>
@endsection
