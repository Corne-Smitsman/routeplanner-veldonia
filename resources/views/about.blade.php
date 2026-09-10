@extends('layouts.app')

@section('title', 'Over Veldonia')

@section('content')
    <div class="border-b border-line bg-surface-muted">
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6">
            <h1 class="text-2xl font-semibold text-ink">Over Veldonia</h1>
            <p class="mt-1.5 max-w-2xl text-ink-muted">
                Een fictief land met tien steden en een spoornetwerk dat bewust niet overal
                rechtstreeks is — net als in het echt.
            </p>
        </div>
    </div>

    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6">
        <div class="grid gap-8 lg:grid-cols-[1.4fr_1fr]">

            <div class="space-y-8">
                <section>
                    <h2 class="text-lg font-semibold text-ink">Het land</h2>
                    <p class="mt-3 leading-relaxed text-ink-muted">
                        In het midden van het land ligt Velburg, met 480.000 inwoners de hoofdstad en
                        veruit de grootste stad. Naar het noorden liggen Noorderwijk en het kustplaatsje
                        Duinzicht, in de heuvels in het noordoosten ligt Bergenrode. Het oosten wordt
                        gedomineerd door de havenstad Oosthaven, terwijl in het zuiden Zuiderburcht,
                        Zonnedal en het aan een meer gelegen Meerhoven liggen. Westdorp is de kleine
                        buitenpost in het westen en Rivierbeek ligt in het rivierdal in het zuidoosten.
                    </p>
                </section>

                <section>
                    <h2 class="text-lg font-semibold text-ink">Het spoornetwerk</h2>
                    <p class="mt-3 leading-relaxed text-ink-muted">
                        Vijftien rechtstreekse spoorlijnen verbinden de steden met elkaar, allemaal in
                        beide richtingen te berijden. Velburg is het knooppunt van het net: vanuit de
                        hoofdstad rijden treinen naar vijf verschillende steden.
                    </p>
                    <p class="mt-3 leading-relaxed text-ink-muted">
                        Lang niet elke stad heeft een rechtstreekse verbinding met elke andere stad. Wie
                        van Duinzicht naar Zonnedal wil, moet minstens twee keer overstappen. Daarom telt
                        niet alleen de rijtijd, maar ook hoe goed de treinen op elkaar aansluiten.
                    </p>
                </section>

                <section>
                    <h2 class="text-lg font-semibold text-ink">De dienstregeling</h2>
                    <p class="mt-3 leading-relaxed text-ink-muted">
                        Op de drukste lijnen rijdt elk half uur een trein tussen 06:00 en 23:00 uur.
                        Rustiger lijnen hebben een uurdienst tot 22:00 uur, en tussen Oosthaven en
                        Bergenrode rijdt maar eens in de twee uur een trein. Wie laat op de avond reist,
                        moet dus rekening houden met de laatste aansluiting.
                    </p>
                </section>
            </div>

            <aside>
                <div class="rounded border border-line">
                    <div class="border-b border-line px-5 py-3.5">
                        <h2 class="font-semibold text-ink">Veldonia in cijfers</h2>
                    </div>
                    <dl class="divide-y divide-line text-sm">
                        <div class="flex items-baseline justify-between px-5 py-3">
                            <dt class="text-ink-muted">Steden</dt>
                            <dd class="font-semibold text-ink">10</dd>
                        </div>
                        <div class="flex items-baseline justify-between px-5 py-3">
                            <dt class="text-ink-muted">Spoorverbindingen</dt>
                            <dd class="font-semibold text-ink">15</dd>
                        </div>
                        <div class="flex items-baseline justify-between px-5 py-3">
                            <dt class="text-ink-muted">Hoofdstad</dt>
                            <dd class="font-semibold text-ink">Velburg</dd>
                        </div>
                        <div class="flex items-baseline justify-between px-5 py-3">
                            <dt class="text-ink-muted">Inwoners hoofdstad</dt>
                            <dd class="font-semibold text-ink">480.000</dd>
                        </div>
                        <div class="flex items-baseline justify-between px-5 py-3">
                            <dt class="text-ink-muted">Langste lijn</dt>
                            <dd class="font-semibold text-ink">80 km</dd>
                        </div>
                    </dl>
                </div>
            </aside>
        </div>
    </div>
@endsection
