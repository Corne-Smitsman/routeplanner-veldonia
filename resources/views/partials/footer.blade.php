<footer class="mt-auto border-t-4 border-primary bg-surface-muted">
    <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6">
        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-4">

            <div class="sm:col-span-2 lg:col-span-1">
                <img src="{{ asset('images/logo.png') }}"
                     srcset="{{ asset('images/logo.png') }} 1x, {{ asset('images/logo@2x.png') }} 2x"
                     alt="Spoorwegen Veldonia" class="h-9 w-auto">
                <p class="mt-4 max-w-xs text-sm leading-relaxed text-ink-muted">
                    Tien steden, vijftien lijnen. Van de kust bij Duinzicht tot het
                    rivierdal van Rivierbeek.
                </p>
            </div>

            <div>
                <h2 class="text-sm font-semibold text-ink">Reizen</h2>
                <ul class="mt-3 space-y-2 text-sm">
                    <li><span class="text-ink-soft" title="Binnenkort beschikbaar">Reisplanner</span></li>
                    <li><span class="text-ink-soft" title="Binnenkort beschikbaar">Mijn favorieten</span></li>
                    <li><span class="text-ink-soft" title="Binnenkort beschikbaar">Zoekgeschiedenis</span></li>
                </ul>
            </div>

            <div>
                <h2 class="text-sm font-semibold text-ink">Het netwerk</h2>
                <ul class="mt-3 space-y-2 text-sm">
                    <li><a href="{{ route('stations.index') }}" class="text-ink-muted transition-colors hover:text-ink">Steden</a></li>
                    <li><a href="{{ route('connections.index') }}" class="text-ink-muted transition-colors hover:text-ink">Verbindingen</a></li>
                    <li><a href="{{ route('about') }}" class="text-ink-muted transition-colors hover:text-ink">Over Veldonia</a></li>
                </ul>
            </div>

            <div>
                <h2 class="text-sm font-semibold text-ink">Account</h2>
                <ul class="mt-3 space-y-2 text-sm">
                    <li><a href="{{ route('profile.edit') }}" class="text-ink-muted transition-colors hover:text-ink">Mijn profiel</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-ink-muted transition-colors hover:text-ink">Uitloggen</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        <div class="mt-8 flex flex-col gap-1.5 border-t border-line pt-5 text-xs text-ink-soft sm:flex-row sm:justify-between">
            <p>&copy; {{ date('Y') }} Spoorwegen Veldonia</p>
            <p>Veldonia is een fictief land — schoolopdracht Software Development 3</p>
        </div>
    </div>
</footer>
