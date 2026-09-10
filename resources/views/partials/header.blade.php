@php
    $navigatie = [
        ['label' => 'Home', 'route' => 'home', 'actief' => 'home'],
        ['label' => 'Steden', 'route' => 'stations.index', 'actief' => 'stations.*'],
        ['label' => 'Verbindingen', 'route' => 'connections.index', 'actief' => 'connections.*'],
        ['label' => 'Over Veldonia', 'route' => 'about', 'actief' => 'about'],
    ];
@endphp

<header class="sticky top-0 z-40 bg-surface px-3 py-3 sm:px-6 sm:py-4">
    <div class="mx-auto w-full max-w-7xl rounded-2xl bg-secondary">

        <div class="flex flex-wrap items-center justify-between gap-3 px-5 py-4">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/logo-light.png') }}"
                     srcset="{{ asset('images/logo-light.png') }} 1x, {{ asset('images/logo-light@2x.png') }} 2x"
                     alt="Spoorwegen Veldonia" class="h-9 w-auto">
            </a>

            <div class="flex items-center gap-3 text-sm">
                <span class="hidden text-secondary-300 sm:inline">{{ auth()->user()->name }}</span>
                <a href="{{ route('profile.edit') }}" class="text-secondary-200 transition-colors hover:text-ink-inverse">
                    Profiel
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="rounded-lg border border-secondary-600 px-3 py-1.5 text-secondary-100 transition-colors hover:border-secondary-400 hover:text-ink-inverse">
                        Uitloggen
                    </button>
                </form>
            </div>
        </div>

        <nav class="border-t border-line-dark px-5" aria-label="Hoofdnavigatie">
            <div class="flex flex-wrap gap-1 text-sm">
                @foreach ($navigatie as $item)
                    <a href="{{ route($item['route']) }}"
                       @class([
                           'inline-flex items-center border-b-2 px-3 py-3 transition-colors',
                           'border-primary-400 font-medium text-ink-inverse' => request()->routeIs($item['actief']),
                           'border-transparent text-secondary-300 hover:text-ink-inverse' => ! request()->routeIs($item['actief']),
                       ])
                       @if (request()->routeIs($item['actief'])) aria-current="page" @endif>
                        {{ $item['label'] }}
                    </a>
                @endforeach
            </div>
        </nav>
    </div>
</header>
