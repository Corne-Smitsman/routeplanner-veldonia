@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="bg-surface">
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6">
            <x-breadcrumbs class="mb-4"/>

            <h1 class="text-2xl font-semibold text-ink">Goedendag {{ auth()->user()->name }}</h1>
            <p class="mt-1.5 text-ink-muted">Waar wil je vandaag naartoe?</p>
        </div>
    </div>

    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6">
        <div class="grid gap-8 lg:grid-cols-[2fr_1fr]">

            <section class="rounded-xl border border-line bg-surface">
                <div class="flex items-baseline justify-between border-b border-line bg-surface px-5 py-3.5">
                    <h2 class="font-semibold text-ink">Reis plannen</h2>
                    <span class="text-xs text-ink-soft">Binnenkort beschikbaar</span>
                </div>

                <div class="space-y-4 p-5">
                    <div class="grid gap-4 sm:grid-cols-2">
                        <div>
                            <label class="block text-sm font-medium text-ink" for="van">Van</label>
                            <select id="van" disabled
                                    class="mt-1.5 block w-full rounded-lg border border-line-strong bg-surface-muted px-3 py-2 text-ink-soft">
                                <option>Kies een station</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-ink" for="naar">Naar</label>
                            <select id="naar" disabled
                                    class="mt-1.5 block w-full rounded-lg border border-line-strong bg-surface-muted px-3 py-2 text-ink-soft">
                                <option>Kies een station</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-[1fr_auto] sm:items-end">
                        <div>
                            <label class="block text-sm font-medium text-ink" for="vertrek">Vertrektijd</label>
                            <input id="vertrek" type="time" disabled
                                   class="mt-1.5 block w-full rounded-lg border border-line-strong bg-surface-muted px-3 py-2 text-ink-soft">
                        </div>
                        <span class="inline-flex cursor-not-allowed items-center justify-center rounded-lg bg-line px-5 py-2 text-sm font-medium text-ink-soft">
                            Zoek verbinding
                        </span>
                    </div>
                </div>
            </section>

            <aside class="rounded-xl border border-line bg-surface">
                <div class="border-b border-line px-5 py-3.5">
                    <h2 class="font-semibold text-ink">Het net vandaag</h2>
                </div>
                <dl class="divide-y divide-line text-sm">
                    <div class="flex items-baseline justify-between px-5 py-3">
                        <dt class="text-ink-muted">Steden</dt>
                        <dd class="font-semibold text-ink">10</dd>
                    </div>
                    <div class="flex items-baseline justify-between px-5 py-3">
                        <dt class="text-ink-muted">Spoorlijnen</dt>
                        <dd class="font-semibold text-ink">15</dd>
                    </div>
                    <div class="flex items-baseline justify-between px-5 py-3">
                        <dt class="text-ink-muted">Knooppunt</dt>
                        <dd class="font-semibold text-ink">Velburg</dd>
                    </div>
                    <div class="flex items-baseline justify-between px-5 py-3">
                        <dt class="text-ink-muted">Eerste vertrek</dt>
                        <dd class="font-semibold text-ink">06:00</dd>
                    </div>
                    <div class="flex items-baseline justify-between px-5 py-3">
                        <dt class="text-ink-muted">Laatste vertrek</dt>
                        <dd class="font-semibold text-ink">23:00</dd>
                    </div>
                </dl>
            </aside>
        </div>

        <section class="mt-8 rounded-xl border border-line">
            <div class="flex flex-wrap items-baseline justify-between gap-2 border-b border-line px-5 py-3.5">
                <h2 class="font-semibold text-ink">Het spoornetwerk</h2>
                <p class="text-sm text-ink-soft">Tien steden, vijftien lijnen</p>
            </div>
            <div class="p-5 sm:p-8">
                <img src="{{ asset('images/netwerkkaart.png') }}"
                     srcset="{{ asset('images/netwerkkaart.png') }} 1x, {{ asset('images/netwerkkaart@2x.png') }} 2x"
                     alt="Kaart van het spoornetwerk van Veldonia met tien steden en vijftien verbindingen"
                     class="mx-auto h-auto w-full max-w-2xl">
                <p class="mx-auto mt-6 max-w-2xl border-t border-line pt-4 text-sm text-ink-muted">
                    Velburg is het knooppunt van het net. Steden zonder rechtstreekse verbinding
                    bereik je via een overstap.
                </p>
            </div>
        </section>
    </div>
@endsection
