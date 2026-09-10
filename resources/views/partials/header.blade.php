@php
    $navigatie = [
        ['label' => 'Reisplanner',  'route' => null],
        ['label' => 'Steden',       'route' => null],
        ['label' => 'Verbindingen', 'route' => null],
        ['label' => 'Over Veldonia','route' => 'about'],
    ];
@endphp

<header class="sticky top-0 z-40">
    <div class="bg-primary">
        <div class="mx-auto flex h-16 max-w-7xl items-center justify-between gap-4 px-4 sm:px-6">
            <a href="{{ route('home') }}" class="shrink-0">
                <x-application-logo variant="light" class="h-9 sm:h-10"/>
            </a>

            <div class="flex items-center gap-4 text-sm">
                <span class="hidden text-primary-300 md:inline">{{ auth()->user()->name }}</span>
                <a href="{{ route('profile.edit') }}"
                   class="text-primary-200 transition-colors hover:text-ink-inverse">Profiel</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="rounded-lg border border-primary-600 px-3 py-1.5 text-primary-100 transition-colors hover:border-primary-400 hover:text-ink-inverse">
                        Uitloggen
                    </button>
                </form>
            </div>
        </div>
    </div>

        <nav class="border-b border-line bg-surface" aria-label="Hoofdnavigatie">
        <div class="mx-auto flex max-w-7xl gap-1 overflow-x-auto px-4 text-sm sm:px-6">
            <a href="{{ route('home') }}"
               @class([
                   'inline-flex shrink-0 items-center border-b-2 px-3 py-3 transition-colors',
                   'border-secondary font-medium text-ink' => request()->routeIs('home'),
                   'border-transparent text-ink-muted hover:text-ink' => ! request()->routeIs('home'),
               ])
               @if(request()->routeIs('home')) aria-current="page" @endif>Home</a>

            @foreach ($navigatie as $item)
                @if ($item['route'])
                    <a href="{{ route($item['route']) }}"
                       @class([
                           'inline-flex shrink-0 items-center border-b-2 px-3 py-3 transition-colors',
                           'border-secondary font-medium text-ink' => request()->routeIs($item['route']),
                           'border-transparent text-ink-muted hover:text-ink' => ! request()->routeIs($item['route']),
                       ])
                       @if(request()->routeIs($item['route'])) aria-current="page" @endif>{{ $item['label'] }}</a>
                @else
                    <span class="inline-flex shrink-0 cursor-not-allowed items-center border-b-2 border-transparent px-3 py-3 text-primary-300"
                          title="Binnenkort beschikbaar">{{ $item['label'] }}</span>
                @endif
            @endforeach
        </div>
    </nav>
</header>
