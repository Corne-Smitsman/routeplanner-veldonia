<!doctype html>
<html lang="nl" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welkom · Spoorwegen Veldonia</title>
    <meta name="description" content="Log in om je reis door Veldonia te plannen.">
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">
    <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}">
    @vite('resources/css/app.css')
</head>
<body class="flex h-full flex-col bg-primary text-primary-100 antialiased">

<header class="border-b border-line-dark">
    <div class="mx-auto flex h-16 max-w-6xl items-center justify-between px-4 sm:px-6">
        <img src="{{ asset('images/logo-light.png') }}"
             srcset="{{ asset('images/logo-light.png') }} 1x, {{ asset('images/logo-light@2x.png') }} 2x"
             alt="Spoorwegen Veldonia" class="h-9 w-auto sm:h-10">

        <a href="{{ route('login') }}"
           class="rounded-lg border border-primary-600 px-4 py-2 text-sm text-primary-100 transition-colors hover:border-primary-400 hover:text-ink-inverse">
            Inloggen
        </a>
    </div>
</header>

<main class="flex flex-1 items-center">
    <div class="mx-auto w-full min-w-0 max-w-6xl px-4 py-12 sm:px-6 lg:py-16">
        <div class="grid items-center gap-10 lg:grid-cols-[1fr_1.05fr] lg:gap-12">

            <div class="min-w-0">
                <p class="text-sm text-secondary-200">Nationale spoorwegen van Veldonia</p>
                <h1 class="mt-3 text-4xl font-semibold leading-[1.15] text-ink-inverse sm:text-5xl">
                    Van deur tot perron,<br>door heel Veldonia
                </h1>
                <p class="mt-5 max-w-md text-lg leading-relaxed text-primary-200">
                    Tien steden, vijftien spoorlijnen en één knooppunt. Log in om je reis te
                    plannen, je favoriete routes te bewaren en je zoekgeschiedenis terug te zien.
                </p>

                <div class="mt-8 flex flex-wrap gap-3">
                    <a href="{{ route('login') }}"
                       class="inline-flex items-center rounded-lg bg-secondary px-6 py-3 text-sm font-medium text-ink-inverse transition-colors hover:bg-secondary-700">
                        Inloggen
                    </a>
                    <a href="{{ route('register') }}"
                       class="inline-flex items-center rounded-lg border border-primary-500 px-6 py-3 text-sm font-medium text-primary-100 transition-colors hover:border-primary-300 hover:text-ink-inverse">
                        Account aanmaken
                    </a>
                </div>

                <dl class="mt-10 grid max-w-md grid-cols-3 gap-4 border-t border-line-dark pt-6">
                    <div>
                        <dt class="text-xs text-primary-300">Steden</dt>
                        <dd class="mt-1 text-2xl font-semibold text-ink-inverse">10</dd>
                    </div>
                    <div>
                        <dt class="text-xs text-primary-300">Spoorlijnen</dt>
                        <dd class="mt-1 text-2xl font-semibold text-ink-inverse">15</dd>
                    </div>
                    <div>
                        <dt class="text-xs text-primary-300">Rijdt vanaf</dt>
                        <dd class="mt-1 text-2xl font-semibold text-ink-inverse">06:00</dd>
                    </div>
                </dl>
            </div>

            <figure class="min-w-0 rounded-2xl border border-line-dark bg-surface-dark p-4 sm:p-7">
                <img src="{{ asset('images/netwerkkaart-light.png') }}"
                     srcset="{{ asset('images/netwerkkaart-light.png') }} 1x, {{ asset('images/netwerkkaart-light@2x.png') }} 2x"
                     alt="Kaart van het spoornetwerk van Veldonia met tien steden en vijftien verbindingen"
                     class="h-auto w-full max-w-full">
                <figcaption class="mt-4 flex flex-wrap items-center gap-x-5 gap-y-2 border-t border-line-dark pt-4 text-xs text-primary-300">
                    <span class="flex items-center gap-2">
                        <span class="inline-block h-2.5 w-2.5 rounded-full bg-secondary-500"></span>
                        Velburg — knooppunt
                    </span>
                    <span class="flex items-center gap-2">
                        <span class="inline-block h-2.5 w-2.5 rounded-full bg-primary-400"></span>
                        Station
                    </span>
                    <span>Niet elke stad is rechtstreeks verbonden</span>
                </figcaption>
            </figure>
        </div>
    </div>
</main>

<footer class="border-t border-line-dark">
    <div class="mx-auto flex max-w-6xl flex-col gap-1.5 px-4 py-6 text-xs text-primary-400 sm:flex-row sm:justify-between sm:px-6">
        <p>&copy; {{ date('Y') }} Spoorwegen Veldonia</p>
        <p>Veldonia is een fictief land — schoolopdracht Software Development 3</p>
    </div>
</footer>

</body>
</html>
