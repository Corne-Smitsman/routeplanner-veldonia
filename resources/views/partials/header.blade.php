@php
    $navigatie = [
        ['label' => 'Home', 'route' => 'home', 'actief' => 'home'],
        ['label' => 'Steden', 'route' => 'stations.index', 'actief' => 'stations.*'],
        ['label' => 'Verbindingen', 'route' => 'connections.index', 'actief' => 'connections.*'],
        ['label' => 'Over Veldonia', 'route' => 'about', 'actief' => 'about'],
    ];
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

    <div class="border-b border-line bg-surface">
        <div class="mx-auto flex max-w-7xl flex-wrap items-center justify-between gap-x-8 gap-y-1 px-4 py-1 sm:px-6">
            <a href="{{ route('home') }}" class="shrink-0 py-1">
                <img src="{{ asset('images/logo.png') }}"
                     srcset="{{ asset('images/logo.png') }} 1x, {{ asset('images/logo@2x.png') }} 2x"
                     alt="Spoorwegen Veldonia" class="h-12 w-auto sm:h-14">
            </a>

            <nav class="flex flex-wrap gap-1 text-sm" aria-label="Hoofdnavigatie">
                @foreach ($navigatie as $item)
                    <a href="{{ route($item['route']) }}"
                       @class([
                           'inline-flex items-center border-b-2 px-3 py-3 transition-colors',
                           'border-primary font-medium text-ink' => request()->routeIs($item['actief']),
                           'border-transparent text-ink-muted hover:text-ink' => ! request()->routeIs($item['actief']),
                       ])
                       @if (request()->routeIs($item['actief'])) aria-current="page" @endif>
                        {{ $item['label'] }}
                    </a>
                @endforeach
            </nav>
        </div>
    </div>
</header>
