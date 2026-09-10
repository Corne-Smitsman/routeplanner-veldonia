{{-- User story 0.4 — Statische informatiepagina over Veldonia --}}
@extends('layouts.app')

@section('title', 'Over Veldonia')
@section('description', 'Veldonia is een fictief land met tien steden en een spoornetwerk dat niet overal rechtstreeks verbonden is.')

@section('content')
    <section class="border-b border-rail-200 bg-rail-50">
        <div class="mx-auto max-w-7xl px-6 py-16 sm:py-20">
            <div class="max-w-2xl">
                <h1 class="text-4xl font-semibold leading-tight text-rail-900">Over Veldonia</h1>
                <p class="mt-5 text-lg leading-relaxed text-rail-600">
                    Veldonia is een fictief land met tien steden, verbonden door een spoornetwerk
                    dat bewust niet overal rechtstreeks is — net als in het echt.
                </p>
            </div>
        </div>
    </section>

    <div class="mx-auto max-w-7xl px-6 py-16">
        <div class="grid gap-12 lg:grid-cols-3">

            <div class="space-y-10 lg:col-span-2">
                <section>
                    <h2 class="text-xl font-semibold text-rail-900">Het land</h2>
                    <p class="mt-4 leading-relaxed text-rail-600">
                        In het midden van het land ligt Velburg, met 480.000 inwoners de hoofdstad
                        en veruit de grootste stad. Naar het noorden liggen Noorderwijk en het
                        kustplaatsje Duinzicht, in de heuvels in het noordoosten ligt Bergenrode.
                        Het oosten wordt gedomineerd door de havenstad Oosthaven, terwijl in het
                        zuiden Zuiderburcht, Zonnedal en het aan een meer gelegen Meerhoven liggen.
                        Westdorp is de kleine buitenpost in het westen en Rivierbeek ligt in het
                        rivierdal in het zuidoosten.
                    </p>
                </section>

                <section>
                    <h2 class="text-xl font-semibold text-rail-900">Het spoornetwerk</h2>
                    <p class="mt-4 leading-relaxed text-rail-600">
                        Vijftien rechtstreekse spoorlijnen verbinden de steden met elkaar, allemaal
                        in beide richtingen te berijden. Velburg is het knooppunt van het net: vanuit
                        de hoofdstad rijden treinen naar vijf verschillende steden.
                    </p>
                    <p class="mt-4 leading-relaxed text-rail-600">
                        Lang niet elke stad heeft een rechtstreekse verbinding met elke andere stad.
                        Wie van Duinzicht naar Zonnedal wil, moet minstens twee keer overstappen.
                        Precies daarom telt niet alleen de rijtijd, maar ook hoe goed de treinen op
                        elkaar aansluiten.
                    </p>
                </section>

                <section>
                    <h2 class="text-xl font-semibold text-rail-900">De dienstregeling</h2>
                    <p class="mt-4 leading-relaxed text-rail-600">
                        Op de drukste lijnen rijdt elk half uur een trein tussen 06:00 en 23:00 uur.
                        Rustiger lijnen hebben een uurdienst tot 22:00 uur, en op het traject tussen
                        Oosthaven en Bergenrode rijdt maar eens in de twee uur een trein. Wie laat op
                        de avond reist, moet dus rekening houden met de laatste aansluiting.
                    </p>
                </section>
            </div>

            <aside class="lg:col-span-1">
                <div class="rounded-lg border border-rail-200 p-6">
                    <h2 class="text-base font-semibold text-rail-900">Veldonia in cijfers</h2>
                    <dl class="mt-5 space-y-4 text-sm">
                        <div class="flex items-baseline justify-between border-b border-rail-100 pb-4">
                            <dt class="text-rail-600">Steden</dt>
                            <dd class="text-lg font-semibold text-rail-900">10</dd>
                        </div>
                        <div class="flex items-baseline justify-between border-b border-rail-100 pb-4">
                            <dt class="text-rail-600">Spoorverbindingen</dt>
                            <dd class="text-lg font-semibold text-rail-900">15</dd>
                        </div>
                        <div class="flex items-baseline justify-between border-b border-rail-100 pb-4">
                            <dt class="text-rail-600">Hoofdstad</dt>
                            <dd class="font-semibold text-rail-900">Velburg</dd>
                        </div>
                        <div class="flex items-baseline justify-between border-b border-rail-100 pb-4">
                            <dt class="text-rail-600">Inwoners hoofdstad</dt>
                            <dd class="font-semibold text-rail-900">480.000</dd>
                        </div>
                        <div class="flex items-baseline justify-between">
                            <dt class="text-rail-600">Langste lijn</dt>
                            <dd class="font-semibold text-rail-900">80 km</dd>
                        </div>
                    </dl>
                </div>
            </aside>
        </div>
    </div>
@endsection
