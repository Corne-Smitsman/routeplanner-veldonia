<footer class="mt-auto bg-secondary">
    <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6">
        <div class="grid gap-8 sm:grid-cols-2">

            <div>
                <img src="{{ asset('images/logo-light.png') }}"
                     srcset="{{ asset('images/logo-light.png') }} 1x, {{ asset('images/logo-light@2x.png') }} 2x"
                     alt="Spoorwegen Veldonia" class="h-9 w-auto">
                <p class="mt-4 max-w-xs text-sm leading-relaxed text-secondary-300">
                    Tien steden, vijftien lijnen. Van de kust bij Duinzicht tot het
                    rivierdal van Rivierbeek.
                </p>
            </div>

            <div>
                <h2 class="text-sm font-semibold text-ink-inverse">Menu</h2>
                <ul class="mt-3 space-y-2 text-sm">
                    <li><a href="{{ route('home') }}" class="text-secondary-300 transition-colors hover:text-ink-inverse">Home</a></li>                    <li><a href="{{ route('about') }}" class="text-secondary-300 transition-colors hover:text-ink-inverse">Over Veldonia</a></li>
                </ul>
            </div>
        </div>

        <div class="mt-8 flex flex-col gap-1.5 border-t border-line-dark pt-5 text-xs text-secondary-400 sm:flex-row sm:justify-between">
            <p>&copy; {{ date('Y') }} Spoorwegen Veldonia</p>
            <p>Veldonia is een fictief land — schoolopdracht Software Development 3</p>
        </div>
    </div>
</footer>
