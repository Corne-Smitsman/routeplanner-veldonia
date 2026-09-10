{{-- User story 0.3 — Footer --}}
<footer class="mt-auto border-t border-rail-200 bg-rail-50">
    <div class="mx-auto max-w-7xl px-6 py-12">
        <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-3">

            <div>
                <div class="flex items-center gap-3 text-rail-700">
                    @include('partials.logo', ['class' => 'h-8 w-8'])
                    <span class="text-[15px] font-semibold text-rail-900">Spoorwegen Veldonia</span>
                </div>
                <p class="mt-4 max-w-xs text-sm leading-relaxed text-rail-600">
                    Het spoornetwerk van Veldonia verbindt tien steden met elkaar,
                    van de kust bij Duinzicht tot het rivierdal van Rivierbeek.
                </p>
            </div>

            <div>
                <h2 class="text-sm font-semibold text-rail-900">Navigatie</h2>
                <ul class="mt-4 space-y-2.5 text-sm">
                    <li>
                        <a href="{{ route('home') }}" class="text-rail-600 transition-colors hover:text-rail-900">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}" class="text-rail-600 transition-colors hover:text-rail-900">Over Veldonia</a>
                    </li>
                    <li>
                        {{-- TODO 2.1 — vervang door route('stations.index') --}}
                        <span class="text-rail-400" title="Volgt in fase 2">Steden</span>
                    </li>
                    <li>
                        {{-- TODO 4.1 — vervang door route('planner.index') --}}
                        <span class="text-rail-400" title="Volgt in fase 4">Reisplanner</span>
                    </li>
                </ul>
            </div>

            <div>
                <h2 class="text-sm font-semibold text-rail-900">Het netwerk</h2>
                <dl class="mt-4 space-y-2.5 text-sm">
                    <div class="flex justify-between border-b border-rail-200 pb-2.5">
                        <dt class="text-rail-600">Steden</dt>
                        <dd class="font-medium text-rail-900">10</dd>
                    </div>
                    <div class="flex justify-between border-b border-rail-200 pb-2.5">
                        <dt class="text-rail-600">Spoorverbindingen</dt>
                        <dd class="font-medium text-rail-900">15</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="text-rail-600">Knooppunt</dt>
                        <dd class="font-medium text-rail-900">Velburg</dd>
                    </div>
                </dl>
            </div>
        </div>

        <div class="mt-10 flex flex-col gap-2 border-t border-rail-200 pt-6 text-xs text-rail-500 sm:flex-row sm:items-center sm:justify-between">
            <p>&copy; {{ date('Y') }} Spoorwegen Veldonia</p>
            <p>Veldonia is een fictief land — schoolopdracht Software Development 3</p>
        </div>
    </div>
</footer>
