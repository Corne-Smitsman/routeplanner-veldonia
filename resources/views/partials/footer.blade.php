<footer class="px-3 pb-3 sm:px-6 sm:pb-6">
    <div class="mx-auto w-full max-w-7xl rounded-2xl bg-secondary px-5 py-8 sm:px-8">

        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
            <div class="sm:col-span-2 lg:col-span-1">
                <img src="{{ asset('images/logo-light.png') }}"
                     srcset="{{ asset('images/logo-light.png') }} 1x, {{ asset('images/logo-light@2x.png') }} 2x"
                     alt="Spoorwegen Veldonia" class="h-9 w-auto">
                <p class="mt-4 max-w-xs text-sm leading-relaxed text-secondary-300">
                    Tien steden, vijftien lijnen. Van de kust bij Duinzicht tot het
                    rivierdal van Rivierbeek.
                </p>
            </div>

            <div>
                <h2 class="text-sm font-semibold text-ink-inverse">Het netwerk</h2>
                <ul class="mt-3 space-y-2 text-sm">
                    <li>
                        <a href="{{ route('stations.index') }}" class="text-secondary-300 transition-colors hover:text-ink-inverse">Steden</a>
                    </li>
                    <li>
                        <a href="{{ route('connections.index') }}" class="text-secondary-300 transition-colors hover:text-ink-inverse">Verbindingen</a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}" class="text-secondary-300 transition-colors hover:text-ink-inverse">Over Veldonia</a>
                    </li>
                </ul>
            </div>

            <div>
                <h2 class="text-sm font-semibold text-ink-inverse">Account</h2>
                <ul class="mt-3 space-y-2 text-sm">
                    <li>
                        <a href="{{ route('profile.edit') }}" class="text-secondary-300 transition-colors hover:text-ink-inverse">Mijn profiel</a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-secondary-300 transition-colors hover:text-ink-inverse">Uitloggen</button>
                        </form>
                    </li>
                </ul>
            </div>

            <div>
                <h2 class="text-sm font-semibold text-ink-inverse">Dienstregeling</h2>
                <dl class="mt-3 space-y-2 text-sm text-secondary-300">
                    <div class="flex justify-between gap-4">
                        <dt>Eerste vertrek</dt>
                        <dd class="tabular-nums text-ink-inverse">06:00</dd>
                    </div>
                    <div class="flex justify-between gap-4">
                        <dt>Laatste vertrek</dt>
                        <dd class="tabular-nums text-ink-inverse">23:00</dd>
                    </div>
                    <div class="flex justify-between gap-4">
                        <dt>Knooppunt</dt>
                        <dd class="text-ink-inverse">Velburg</dd>
                    </div>
                </dl>
            </div>
        </div>

        <div class="mt-8 flex flex-col gap-1.5 border-t border-line-dark pt-6 text-xs text-secondary-400 sm:flex-row sm:justify-between">
            <p>&copy; {{ date('Y') }} Spoorwegen Veldonia</p>
            <p>Veldonia is een fictief land — schoolopdracht Software Development 3</p>
        </div>
    </div>
</footer>
