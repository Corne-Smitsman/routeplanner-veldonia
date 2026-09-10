@php
    $navigatie = [
        ['label' => 'Home', 'route' => 'home', 'actief' => 'home'],
        ['label' => 'Steden', 'route' => 'stations.index', 'actief' => 'stations.*'],
        ['label' => 'Verbindingen', 'route' => 'connections.index', 'actief' => 'connections.*'],
    ];

    $cta = ['label' => 'Over Veldonia', 'route' => 'about', 'actief' => 'about'];
@endphp

<div class="sticky top-0 z-50" x-data="{ open: false }" x-on:keydown.escape.window="open = false">

    <div class="bg-secondary text-xs text-secondary-300">
        <div class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-5 py-1.5 md:px-8">
            <span class="min-w-0 truncate">{{ auth()->user()->name }}</span>

            <div class="flex flex-none items-center gap-x-5">
                <a href="{{ route('profile.edit') }}" class="text-secondary-200 transition-colors hover:text-ink-inverse">
                    Profiel
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-secondary-200 transition-colors hover:text-ink-inverse">
                        Uitloggen
                    </button>
                </form>
            </div>
        </div>
    </div>

    <header class="relative bg-surface-muted px-3 py-3 md:px-5">
        <div class="mx-auto flex max-w-7xl items-center justify-between gap-6 rounded-full border border-line bg-surface px-5 py-2.5 md:px-6">

            <a href="{{ route('home') }}" class="block flex-none">
                <img src="{{ asset('images/logo.png') }}"
                     srcset="{{ asset('images/logo.png') }} 1x, {{ asset('images/logo@2x.png') }} 2x"
                     alt="Spoorwegen Veldonia" class="block h-9 w-auto md:h-11">
            </a>

            <nav class="hidden min-w-0 flex-1 items-center justify-center gap-x-7 text-sm lg:flex" aria-label="Hoofdmenu">
                @foreach ($navigatie as $item)
                    <a href="{{ route($item['route']) }}"
                       @class([
                           'relative whitespace-nowrap transition-colors',
                           'font-medium text-ink after:absolute after:-bottom-1.5 after:left-0 after:right-0 after:h-0.5 after:rounded-full after:bg-primary' => request()->routeIs($item['actief']),
                           'text-ink-muted hover:text-ink' => ! request()->routeIs($item['actief']),
                       ])
                       @if (request()->routeIs($item['actief'])) aria-current="page" @endif>
                        {{ $item['label'] }}
                    </a>
                @endforeach
            </nav>

            <a href="{{ route($cta['route']) }}"
               @class([
                   'hidden flex-none items-center gap-2.5 whitespace-nowrap rounded-full px-5 py-2.5 text-sm font-medium text-ink-inverse transition-colors lg:inline-flex',
                   'bg-primary-800' => request()->routeIs($cta['actief']),
                   'bg-primary hover:bg-primary-800' => ! request()->routeIs($cta['actief']),
               ])>
                {{ $cta['label'] }}
                <span aria-hidden="true">&rarr;</span>
            </a>

            <button type="button"
                    x-on:click="open = ! open"
                    x-bind:aria-expanded="open"
                    aria-controls="mobiel-menu"
                    class="flex flex-none cursor-pointer flex-col gap-1.25 border-0 bg-transparent p-2 lg:hidden">
                <span class="sr-only">Menu</span>
                <span class="block h-0.5 w-6 bg-secondary" x-bind:class="open ? 'translate-y-1.75 rotate-45' : ''"></span>
                <span class="block h-0.5 w-6 bg-secondary" x-bind:class="open ? 'opacity-0' : ''"></span>
                <span class="block h-0.5 w-6 bg-secondary" x-bind:class="open ? '-translate-y-1.75 -rotate-45' : ''"></span>
            </button>
        </div>

        <div id="mobiel-menu"
             x-show="open"
             x-cloak
             x-on:click.outside="open = false"
             class="absolute inset-x-3 top-full z-40 mt-1 overflow-hidden rounded-2xl border border-line bg-surface p-2 md:inset-x-5 lg:hidden">

            @foreach ($navigatie as $item)
                <a href="{{ route($item['route']) }}"
                   @class([
                       'block rounded-xl px-4 py-3 text-sm transition-colors',
                       'bg-primary-50 font-medium text-primary' => request()->routeIs($item['actief']),
                       'text-ink-muted hover:bg-surface-muted hover:text-ink' => ! request()->routeIs($item['actief']),
                   ])>
                    {{ $item['label'] }}
                </a>
            @endforeach

            <div class="mt-2 border-t border-line pt-2">
                <a href="{{ route($cta['route']) }}"
                   class="flex w-full items-center justify-center gap-2.5 rounded-full bg-primary px-5 py-3 text-sm font-medium text-ink-inverse transition-colors hover:bg-primary-800">
                    {{ $cta['label'] }}
                    <span aria-hidden="true">&rarr;</span>
                </a>
            </div>
        </div>
    </header>
</div>
