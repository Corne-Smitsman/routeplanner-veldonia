{{-- User story 0.3 — Sticky header met navigatie en active state --}}
<header class="sticky top-0 z-40 border-b border-rail-200 bg-white">
    <div class="mx-auto flex h-16 max-w-7xl items-center justify-between gap-6 px-6">

        {{-- Beeldmerk en woordmerk --}}
        <a href="{{ route('home') }}" class="flex shrink-0 items-center gap-3 text-rail-700">
            @include('partials.logo', ['class' => 'h-9 w-9'])
            <span class="hidden leading-tight sm:block">
                <span class="block text-[15px] font-semibold text-rail-900">Spoorwegen Veldonia</span>
                <span class="block text-xs text-rail-500">Routeplanner</span>
            </span>
        </a>

        {{-- Hoofdnavigatie --}}
        <nav class="flex h-full items-center gap-1 text-sm" aria-label="Hoofdnavigatie">
            <a href="{{ route('home') }}"
               @class([
                   'inline-flex h-full items-center border-b-2 px-3 transition-colors',
                   'border-rail-700 text-rail-900 font-medium' => request()->routeIs('home'),
                   'border-transparent text-rail-600 hover:text-rail-900' => ! request()->routeIs('home'),
               ])
               @if(request()->routeIs('home')) aria-current="page" @endif>
                Home
            </a>

            {{-- TODO 2.1 — vervang door route('stations.index') --}}
            <a href="#"
               class="inline-flex h-full items-center border-b-2 border-transparent px-3 text-rail-400 transition-colors hover:text-rail-600"
               title="Volgt in fase 2">
                Steden
            </a>

            <a href="{{ route('about') }}"
               @class([
                   'inline-flex h-full items-center border-b-2 px-3 transition-colors',
                   'border-rail-700 text-rail-900 font-medium' => request()->routeIs('about'),
                   'border-transparent text-rail-600 hover:text-rail-900' => ! request()->routeIs('about'),
               ])
               @if(request()->routeIs('about')) aria-current="page" @endif>
                Over Veldonia
            </a>
        </nav>

        {{-- TODO 5.1/5.2 — vervang door de auth-links van Breeze --}}
        <a href="#"
           class="hidden shrink-0 rounded-md border border-rail-300 px-3 py-1.5 text-sm text-rail-700 transition-colors hover:border-rail-400 hover:text-rail-900 sm:inline-block"
           title="Volgt in fase 5">
            Inloggen
        </a>
    </div>
</header>
