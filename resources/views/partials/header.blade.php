@php
    $navigatie = [
        ['label' => 'Home', 'url' => route('home'), 'actief' => request()->routeIs('home')],
        ['label' => 'Steden', 'url' => route('station'), 'actief' => request()->routeIs('station')],
        ['label' => 'Verbindingen', 'url' => route('connection'), 'actief' => request()->routeIs('connection')],
    ];
@endphp

<div class="sticky top-0 z-50" x-data="{ open: false }" x-on:keydown.escape.window="open = false">

    <header class="relative bg-transparent px-3 py-3 md:px-5">
        <div class="mx-auto flex max-w-7xl items-center justify-between gap-6 rounded-full border border-line bg-surface p-2 md:px-3">

            <a href="{{ route('home') }}" class="block flex-none">
                <img src="{{ asset('images/logo.png') }}"
                     srcset="{{ asset('images/logo.png') }} 1x, {{ asset('images/logo@2x.png') }} 2x"
                     alt="Spoorwegen Veldonia" class="block h-9 w-auto md:h-11">
            </a>

            <div class="flex flex-none items-center gap-x-7">
                <nav class="hidden items-center gap-x-7 text-sm lg:flex" aria-label="Hoofdmenu">
                    @foreach ($navigatie as $item)
                        <a href="{{ $item['url'] }}"
                           @class([
                               'relative whitespace-nowrap transition-colors',
                               'font-medium text-ink after:absolute after:-bottom-1.5 after:left-0 after:right-0 after:h-0.5 after:rounded-full after:bg-primary' => $item['actief'],
                               'text-ink-muted hover:text-ink' => ! $item['actief'],
                           ])
                           @if ($item['actief']) aria-current="page" @endif>
                            {{ $item['label'] }}
                        </a>
                    @endforeach
                </nav>

                <div class="hidden items-center gap-x-5 text-sm lg:flex">
                    @guest
                        <a href="{{ route('login') }}" class="text-ink-muted hover:text-ink">Inloggen</a>
                        <a href="{{ route('register') }}" class="text-ink-muted hover:text-ink">Registreren</a>
                    @endguest

                    @auth
                        <span class="text-ink-muted">
                            {{ auth()->user()->name }} ({{ auth()->user()->role->label() }})
                        </span>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-ink-muted hover:text-ink">Uitloggen</button>
                        </form>
                    @endauth
                </div>

                <div class="hidden lg:block">
                    <x-button :href="route('about')">Over Veldonia</x-button>
                </div>

                <button type="button"
                        x-on:click="open = ! open"
                        x-bind:aria-expanded="open"
                        aria-controls="mobiel-menu"
                        class="flex cursor-pointer flex-col gap-1.25 border-0 bg-transparent p-2 lg:hidden">
                    <span class="sr-only">Menu</span>
                    <span class="block h-0.5 w-6 bg-secondary" x-bind:class="open ? 'translate-y-1.75 rotate-45' : ''"></span>
                    <span class="block h-0.5 w-6 bg-secondary" x-bind:class="open ? 'opacity-0' : ''"></span>
                    <span class="block h-0.5 w-6 bg-secondary" x-bind:class="open ? '-translate-y-1.75 -rotate-45' : ''"></span>
                </button>
            </div>
        </div>

        <div id="mobiel-menu"
             x-show="open"
             x-cloak
             x-on:click.outside="open = false"
             class="absolute inset-x-3 top-full z-40 mt-1 overflow-hidden rounded-2xl border border-line bg-surface p-2 md:inset-x-5 lg:hidden">

            @foreach ($navigatie as $item)
                <a href="{{ $item['url'] }}"
                   @class([
                       'block rounded-xl px-4 py-3 text-sm transition-colors',
                       'bg-primary-50 font-medium text-primary' => $item['actief'],
                       'text-ink-muted hover:bg-surface-muted hover:text-ink' => ! $item['actief'],
                   ])>
                    {{ $item['label'] }}
                </a>
            @endforeach

            <div class="mt-2 border-t border-line pt-2">
                <x-button :href="route('about')" full>Over Veldonia</x-button>
            </div>
        </div>
    </header>
</div>
