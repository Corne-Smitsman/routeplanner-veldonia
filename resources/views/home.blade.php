@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="mx-auto w-full min-w-0 max-w-7xl px-4 py-12 sm:px-6 lg:py-16">
        <div class="grid items-center gap-10 lg:grid-cols-[1fr_1.05fr] lg:gap-16">

            <div class="min-w-0">
                <p class="text-sm font-medium text-primary">Nationale spoorwegen van Veldonia</p>
                <h1 class="mt-3 text-4xl font-semibold leading-[1.12] tracking-tight text-ink sm:text-5xl">
                    Welkom bij Spoorwegen Veldonia
                </h1>
                <p class="mt-5 max-w-md text-lg leading-relaxed text-ink-muted">
                    Tien steden, vijftien spoorlijnen en één knooppunt.
                </p>

                <div class="mt-8">
                    <x-button :href="route('about')">Over Veldonia</x-button>
                </div>

                <dl class="mt-10 grid max-w-md grid-cols-3 gap-6 border-t border-line pt-6">
                    <div>
                        <dt class="text-xs text-ink-soft">Steden</dt>
                        <dd class="mt-1 text-2xl font-semibold tabular-nums text-ink">10</dd>
                    </div>
                    <div>
                        <dt class="text-xs text-ink-soft">Spoorlijnen</dt>
                        <dd class="mt-1 text-2xl font-semibold tabular-nums text-ink">15</dd>
                    </div>
                    <div>
                        <dt class="text-xs text-ink-soft">Rijdt vanaf</dt>
                        <dd class="mt-1 text-2xl font-semibold tabular-nums text-ink">06:00</dd>
                    </div>
                </dl>
            </div>

            <figure class="min-w-0">
                <img src="{{ asset('images/netwerkkaart.png') }}"
                     srcset="{{ asset('images/netwerkkaart.png') }} 1x, {{ asset('images/netwerkkaart@2x.png') }} 2x"
                     alt="Kaart van het spoornetwerk van Veldonia met tien steden en vijftien verbindingen"
                     class="h-auto w-full max-w-full">
                <figcaption class="mt-4 flex flex-wrap items-center gap-x-6 gap-y-2 border-t border-line pt-4 text-xs text-ink-soft">
                    <span class="flex items-center gap-2">
                        <span class="inline-block h-2.5 w-2.5 rounded-full bg-primary"></span>
                        Velburg — knooppunt
                    </span>
                    <span class="flex items-center gap-2">
                        <span class="inline-block h-2.5 w-2.5 rounded-full bg-ink"></span>
                        Station
                    </span>
                    <span>Niet elke stad is rechtstreeks verbonden</span>
                </figcaption>
            </figure>
        </div>
    </div>
@endsection
