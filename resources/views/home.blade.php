{{-- User story 0.2 — Homepage --}}
@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <section class="border-b border-rail-200 bg-rail-50">
        <div class="mx-auto max-w-7xl px-6 py-20 sm:py-24">
            <div class="max-w-2xl">
                <h1 class="text-4xl font-semibold leading-tight text-rail-900 sm:text-5xl">
                    Welkom bij Spoorwegen Veldonia
                </h1>
                <p class="mt-5 text-lg leading-relaxed text-rail-600">
                    Plan je reis door de tien steden van Veldonia. Van de hoofdstad Velburg
                    tot de kust bij Duinzicht — met of zonder overstap.
                </p>
                <div class="mt-8 flex flex-wrap gap-3">
                    {{-- TODO 4.1 — vervang door route('planner.index') --}}
                    <span class="inline-flex cursor-not-allowed items-center rounded-md bg-rail-300 px-4 py-2.5 text-sm font-medium text-white"
                          title="Volgt in fase 4">
                        Plan een reis
                    </span>
                    <a href="{{ route('about') }}"
                       class="inline-flex items-center rounded-md border border-rail-300 px-4 py-2.5 text-sm font-medium text-rail-700 transition-colors hover:border-rail-400 hover:text-rail-900">
                        Over Veldonia
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-6 py-16">
        <div class="grid gap-px overflow-hidden rounded-lg border border-rail-200 bg-rail-200 sm:grid-cols-3">
            <div class="bg-white p-6">
                <h2 class="text-base font-semibold text-rail-900">Tien steden</h2>
                <p class="mt-2 text-sm leading-relaxed text-rail-600">
                    Van Noorderwijk tot Zonnedal, verspreid over alle regio's van Veldonia.
                </p>
            </div>
            <div class="bg-white p-6">
                <h2 class="text-base font-semibold text-rail-900">Vijftien lijnen</h2>
                <p class="mt-2 text-sm leading-relaxed text-rail-600">
                    Rechtstreekse verbindingen, in beide richtingen te berijden.
                </p>
            </div>
            <div class="bg-white p-6">
                <h2 class="text-base font-semibold text-rail-900">Slimme overstappen</h2>
                <p class="mt-2 text-sm leading-relaxed text-rail-600">
                    Niet elke stad is rechtstreeks verbonden. De planner zoekt de snelste route.
                </p>
            </div>
        </div>
    </section>
@endsection
