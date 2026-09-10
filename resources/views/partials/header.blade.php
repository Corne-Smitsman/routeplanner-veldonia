@php
    $navigatie = [
        ['label' => 'Home', 'route' => 'home', 'actief' => 'home'],
        ['label' => 'Steden', 'route' => 'stations.index', 'actief' => 'stations.*'],
        ['label' => 'Verbindingen', 'route' => 'connections.index', 'actief' => 'connections.*'],
    ];

    $cta = ['label' => 'Over Veldonia', 'route' => 'about', 'actief' => 'about'];
@endphp

<div class="sticky top-0 z-50"
     x-data="{ scrolled: false, open: false }"
     x-init="scrolled = window.scrollY > 10"
     x-on:scroll.window="scrolled = window.scrollY > 10"
     x-on:keydown.escape.window="open = false">

    <div class="bg-secondary text-[13.5px] text-secondary-300">
        <div class="mx-auto flex h-10 max-w-7xl items-center justify-between gap-4 px-5 md:px-8">
            <span class="min-w-0 truncate">{{ auth()->user()->name }}</span>

            <div class="flex flex-none items-center gap-x-6">
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

    <header class="relative transition-all duration-200"
            x-bind:class="scrolled ? 'bg-transparent px-3 py-2.5 md:px-5 md:py-3' : 'bg-surface'">
        <div class="mx-auto flex max-w-7xl items-center justify-between gap-6 px-5 py-3.5 transition-all duration-200 md:min-h-[88px] md:px-8"
             x-bind:class="scrolled ? 'rounded-full border border-line bg-surface/90 backdrop-blur-md md:min-h-[68px] md:px-6' : ''">

            <a href="{{ route('home') }}" class="block flex-none">
                <img src="{{ asset('images/logo.png') }}"
                     srcset="{{ asset('images/logo.png') }} 1x, {{ asset('images/logo@2x.png') }} 2x"
                     alt="Spoorwegen Veldonia"
                     class="block w-auto transition-all duration-200"
                     x-bind:class="scrolled ? 'h-8' : 'h-9 md:h-[46px]'">
            </a>

            <nav class="hidden min-w-0 flex-1 items-center justify-center gap-x-7 text-[15.5px] font-semibold lg:flex"
                 aria-label="Hoofdmenu">
                @foreach ($navigatie as $item)
                    <a href="{{ route($item['route']) }}"
                       @class([
                           'relative whitespace-nowrap transition-colors',
                           'text-ink after:absolute after:-bottom-1.5 after:left-0 after:right-0 after:h-0.5 after:rounded-full after:bg-primary' => request()->routeIs($item['actief']),
                           'text-ink-muted hover:text-primary' => ! request()->routeIs($item['actief']),
                       ])
                       @if (request()->routeIs($item['actief'])) aria-current="page" @endif>
                        {{ $item['label'] }}
                    </a>
                @endforeach
            </nav>

            <a href="{{ route($cta['route']) }}"
               @class([
                   'hidden flex-none items-center gap-3 whitespace-nowrap rounded-full px-6 py-3.5 text-[15px] font-semibold text-ink-inverse transition-colors lg:inline-flex',
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
                    class="flex flex-none cursor-pointer flex-col gap-[5px] border-0 bg-transparent p-2 lg:hidden">
                <span class="sr-only">Menu</span>
                <span class="block h-0.5 w-6 bg-secondary transition-transform duration-200"
                      x-bind:class="open ? 'translate-y-[7px] rotate-45' : ''"></span>
                <span class="block h-0.5 w-6 bg-secondary transition-opacity duration-200"
                      x-bind:class="open ? 'opacity-0' : ''"></span>
                <span class="block h-0.5 w-6 bg-secondary transition-transform duration-200"
                      x-bind:class="open ? '-translate-y-[7px] -rotate-45' : ''"></span>
            </button>
        </div>

        <div id="mobiel-menu"
             x-show="open"
             x-cloak
             x-transition.opacity.duration.200ms
             x-on:click.outside="open = false"
             class="absolute inset-x-3 top-full z-40 mt-2 overflow-hidden rounded-2xl border border-line bg-surface p-2 lg:hidden">

            @foreach ($navigatie as $item)
                <a href="{{ route($item['route']) }}"
                   @class([
                       'block rounded-xl px-4 py-3 font-semibold transition-colors',
                       'bg-primary-50 text-primary' => request()->routeIs($item['actief']),
                       'text-ink-muted hover:bg-surface-muted hover:text-ink' => ! request()->routeIs($item['actief']),
                   ])>
                    {{ $item['label'] }}
                </a>
            @endforeach

            <div class="mt-2 border-t border-line pt-2">
                <a href="{{ route($cta['route']) }}"
                   class="flex w-full items-center justify-center gap-3 rounded-full bg-primary px-6 py-3.5 font-semibold text-ink-inverse transition-colors hover:bg-primary-800">
                    {{ $cta['label'] }}
                    <span aria-hidden="true">&rarr;</span>
                </a>
            </div>
        </div>
    </header>
</div>
