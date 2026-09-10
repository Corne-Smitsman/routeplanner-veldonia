@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="border-b border-line bg-surface-muted">
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6">
            <h1 class="text-2xl font-semibold text-ink">Goedendag {{ auth()->user()->name }}</h1>
            <p class="mt-1.5 text-ink-muted">Waar wil je vandaag naartoe?</p>
        </div>
    </div>

    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6">
        <div class="grid gap-8 lg:grid-cols-[2fr_1fr]">

            <section class="rounded border border-line">
                <div class="flex items-baseline justify-between border-b border-line bg-surface px-5 py-3.5">
                    <h2 class="font-semibold text-ink">Reis plannen</h2>
                    <span class="text-xs text-ink-soft">Binnenkort beschikbaar</span>
                </div>

                <div class="space-y-4 p-5">
                    <div class="grid gap-4 sm:grid-cols-2">
                        <div>
                            <label class="block text-sm font-medium text-ink" for="van">Van</label>
                            <select id="van" disabled
                                    class="mt-1.5 block w-full rounded border border-line-strong bg-surface-muted px-3 py-2 text-ink-soft">
                                <option>Kies een station</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-ink" for="naar">Naar</label>
                            <select id="naar" disabled
                                    class="mt-1.5 block w-full rounded border border-line-strong bg-surface-muted px-3 py-2 text-ink-soft">
                                <option>Kies een station</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-[1fr_auto] sm:items-end">
                        <div>
                            <label class="block text-sm font-medium text-ink" for="vertrek">Vertrektijd</label>
                            <input id="vertrek" type="time" disabled
                                   class="mt-1.5 block w-full rounded border border-line-strong bg-surface-muted px-3 py-2 text-ink-soft">
                        </div>
                        <span class="inline-flex cursor-not-allowed items-center justify-center rounded bg-line px-5 py-2 text-sm font-medium text-ink-soft">
                            Zoek verbinding
                        </span>
                    </div>
                </div>
            </section>

            <aside class="rounded border border-line">
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
    </div>
@endsection
