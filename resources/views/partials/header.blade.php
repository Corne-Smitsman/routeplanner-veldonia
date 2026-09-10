@php
    $navigatie = [
        ['label' => 'Home', 'route' => 'home', 'actief' => 'home'],
        ['label' => 'Steden', 'route' => 'stations.index', 'actief' => 'stations.*'],
        ['label' => 'Verbindingen', 'route' => 'connections.index', 'actief' => 'connections.*'],
    ];

    $knop = ['label' => 'Over Veldonia', 'route' => 'about', 'actief' => 'about'];
@endphp

<header class="sticky top-0 z-40">
    <div class="bg-secondary">
        <div class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-4 py-1.5 text-xs sm:px-6">
            <span class="truncate text-secondary-300">{{ auth()->user()->name }}</span>

            <div class="flex shrink-0 items-center gap-3">
                <a href="{{ route('profile.edit') }}" class="text-secondary-200 transition-colors hover:text-ink-inverse">
                    Profiel
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="rounded border border-secondary-600 px-2 py-0.5 text-secondary-100 transition-colors hover:border-secondary-400 hover:text-ink-inverse">
                        Uitloggen
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="p-2" x-data="{ open: false }" x-on:keydown.escape.window="open = false">
        <div class="mx-auto max-w-7xl">
            <div class="flex items-center justify-between gap-4 rounded-full border border-line bg-white/70 p-1.5 pl-5 backdrop-blur-xl">
                <a href="{{ route('home') }}" class="shrink-0">
                    <img src="{{ asset('images/logo.png') }}"
                         srcset="{{ asset('images/logo.png') }} 1x, {{ asset('images/logo@2x.png') }} 2x"
                         alt="Spoorwegen Veldonia" class="h-12 w-auto sm:h-16">
                </a>

                <nav class="hidden items-center gap-1 text-sm lg:flex" aria-label="Hoofdnavigatie">
                    @foreach ($navigatie as $item)
                        <a href="{{ route($item['route']) }}"
                           @class([
                               'rounded-full px-4 py-2.5 transition-colors',
                               'bg-primary-50 font-medium text-primary' => request()->routeIs($item['actief']),
                               'text-ink-muted hover:text-ink' => ! request()->routeIs($item['actief']),
                           ])
                           @if (request()->routeIs($item['actief'])) aria-current="page" @endif>
                            {{ $item['label'] }}
                        </a>
                    @endforeach

                    <a href="{{ route($knop['route']) }}"
                       @class([
                           'rounded-full px-5 py-2.5 font-medium text-ink-inverse transition-colors',
                           'bg-primary-800' => request()->routeIs($knop['actief']),
                           'bg-primary hover:bg-primary-600' => ! request()->routeIs($knop['actief']),
                       ])
                       @if (request()->routeIs($knop['actief'])) aria-current="page" @endif>
                        {{ $knop['label'] }}
                    </a>
                </nav>

                <button type="button"
                        x-on:click="open = ! open"
                        x-bind:aria-expanded="open"
                        aria-label="Menu"
                        class="rounded-full bg-primary p-3 text-ink-inverse transition-colors hover:bg-primary-600 lg:hidden">
                    <svg x-show="! open" class="h-5 w-5" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                        <path d="M3 6h14"/>
                        <path d="M3 10h14"/>
                        <path d="M3 14h14"/>
                    </svg>
                    <svg x-show="open" x-cloak class="h-5 w-5" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                        <path d="M5 5l10 10"/>
                        <path d="M15 5L5 15"/>
                    </svg>
                </button>
            </div>

            <nav x-show="open" x-cloak x-on:click.outside="open = false"
                 class="mt-2 space-y-1 rounded-2xl border border-line bg-surface p-2 text-sm lg:hidden"
                 aria-label="Mobiele navigatie">
                @foreach ($navigatie as $item)
                    <a href="{{ route($item['route']) }}"
                       @class([
                           'block rounded-xl px-4 py-3 transition-colors',
                           'bg-primary-50 font-medium text-primary' => request()->routeIs($item['actief']),
                           'text-ink-muted hover:bg-surface-muted hover:text-ink' => ! request()->routeIs($item['actief']),
                       ])>
                        {{ $item['label'] }}
                    </a>
                @endforeach

                <a href="{{ route($knop['route']) }}"
                   @class([
                       'block rounded-full px-3 py-6 text-center font-medium text-ink-inverse transition-colors',
                       'bg-primary-800' => request()->routeIs($knop['actief']),
                       'bg-primary hover:bg-primary-600' => ! request()->routeIs($knop['actief']),
                   ])>
                    {{ $knop['label'] }}
                </a>
            </nav>
        </div>
    </div>
</header>
