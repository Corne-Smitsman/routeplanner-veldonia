<!doctype html>
<html lang="nl" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welkom · Spoorwegen Veldonia</title>
    <meta name="description" content="Welkom bij Spoorwegen Veldonia. Log in om je reis door Veldonia te plannen.">
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">
    <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}">
    @vite('resources/css/app.css')
</head>
<body class="flex h-full flex-col bg-surface text-ink antialiased">

<header class="border-b-4 border-primary bg-secondary">
    <div class="mx-auto flex h-16 max-w-6xl items-center justify-between px-4 sm:px-6">
        <img src="{{ asset('images/logo-light.png') }}"
             srcset="{{ asset('images/logo-light.png') }} 1x, {{ asset('images/logo-light@2x.png') }} 2x"
             alt="Spoorwegen Veldonia" class="h-9 w-auto sm:h-10">

        <div class="flex items-center gap-2 text-sm">
            <a href="{{ route('login') }}"
               class="rounded-lg px-3 py-2 text-secondary-200 transition-colors hover:text-ink-inverse">
                Inloggen
            </a>
            <a href="{{ route('register') }}"
               class="rounded-lg bg-primary px-4 py-2 font-medium text-ink-inverse transition-colors hover:bg-primary-600">
                Registreren
            </a>
        </div>
    </div>
</header>

<main class="flex flex-1 items-center">
    <div class="mx-auto w-full min-w-0 max-w-6xl px-4 py-12 sm:px-6 lg:py-16">
        <div class="grid items-center gap-10 lg:grid-cols-[1fr_1.05fr] lg:gap-16">

            <div class="min-w-0">
                <p class="text-sm font-medium text-primary">Nationale spoorwegen van Veldonia</p>
                <h1 class="mt-3 text-4xl font-semibold leading-[1.12] tracking-tight text-ink sm:text-5xl">
                    Welkom bij<br>Spoorwegen Veldonia
                </h1>
                <p class="mt-5 max-w-md text-lg leading-relaxed text-ink-muted">
                    Tien steden, vijftien spoorlijnen en één knooppunt. Log in om je reis te
                    plannen, je favoriete routes te bewaren en je zoekgeschiedenis terug te zien.
                </p>

                <div class="mt-8 flex flex-wrap gap-3">
                    <a href="{{ route('login') }}"
                       class="inline-flex items-center rounded-lg bg-primary px-6 py-3 text-sm font-medium text-ink-inverse transition-colors hover:bg-primary-600">
                        Inloggen
                    </a>
                    <a href="{{ route('register') }}"
                       class="inline-flex items-center rounded-lg border border-line-strong px-6 py-3 text-sm font-medium text-ink transition-colors hover:border-ink hover:bg-surface-muted">
                        Account aanmaken
                    </a>
                </div>

                <dl class="mt-10 grid max-w-md grid-cols-3 gap-6 border-t border-line pt-6">
                    <div>
                        <dt class="text-xs text-ink-soft">Steden</dt>
                        <dd class="mt-1 text-2xl font-semibold tabular-nums text-ink">10</dd>
                    </div>
                    <div>
                        <dt class="text-xs text-ink-soft">Spoorlijnen</dt>
                        <dd class="mt-1 text-2xl font-semibold tabular-nums text-ink">15</dd>
                    </div>
                    <div>
                        <dt class="text-xs text-ink-soft">Rijdt vanaf</dt>
                        <dd class="mt-1 text-2xl font-semibold tabular-nums text-ink">06:00</dd>
                    </div>
                </dl>
            </div>

            <figure class="min-w-0">
                <img src="{{ asset('images/netwerkkaart.png') }}"
                     srcset="{{ asset('images/netwerkkaart.png') }} 1x, {{ asset('images/netwerkkaart@2x.png') }} 2x"
                     alt="Kaart van het spoornetwerk van Veldonia met tien steden en vijftien verbindingen"
                     class="h-auto w-full max-w-full">
                <figcaption class="mt-4 flex flex-wrap items-center gap-x-6 gap-y-2 border-t border-line pt-4 text-xs text-ink-soft">
                    <span class="flex items-center gap-2">
                        <span class="inline-block h-2.5 w-2.5 rounded-full bg-primary"></span>
                        Velburg — knooppunt
                    </span>
                    <span class="flex items-center gap-2">
                        <span class="inline-block h-2.5 w-2.5 rounded-full bg-ink"></span>
                        Station
                    </span>
                    <span>Niet elke stad is rechtstreeks verbonden</span>
                </figcaption>
            </figure>
        </div>
    </div>
</main>

<footer class="border-t border-line bg-surface-muted">
    <div class="mx-auto flex max-w-6xl flex-col gap-1.5 px-4 py-6 text-xs text-ink-soft sm:flex-row sm:justify-between sm:px-6">
        <p>&copy; {{ date('Y') }} Spoorwegen Veldonia</p>
        <p>Veldonia is een fictief land — schoolopdracht Software Development 3</p>
    </div>
</footer>

</body>
</html>
