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

<header class="border-b border-primary-700">
    <div class="mx-auto flex h-16 max-w-5xl items-center px-4 sm:px-6">
        <x-application-logo variant="light" class="h-9 sm:h-10"/>
    </div>
</header>

<main class="flex flex-1 items-center px-4 py-14 sm:px-6">
    <div class="mx-auto w-full max-w-5xl">
        <div class="grid gap-12 lg:grid-cols-[1.15fr_1fr] lg:items-center">

            <div>
                <p class="text-sm text-secondary-100">Nationale spoorwegen van Veldonia</p>
                <h1 class="mt-3 text-4xl font-semibold leading-tight text-ink-inverse sm:text-5xl">
                    Van deur tot perron,<br>door heel Veldonia
                </h1>
                <p class="mt-5 max-w-lg text-lg leading-relaxed text-primary-200">
                    Tien steden, vijftien spoorlijnen en één knooppunt. Log in om je reis
                    te plannen, je favoriete routes te bewaren en je zoekgeschiedenis terug te zien.
                </p>

                <div class="mt-9 flex flex-wrap gap-3">
                    <a href="{{ route('login') }}"
                       class="inline-flex items-center rounded bg-secondary px-5 py-2.5 text-sm font-medium text-ink-inverse transition-colors hover:bg-secondary-700">
                        Inloggen
                    </a>
                    <a href="{{ route('register') }}"
                       class="inline-flex items-center rounded border border-primary-500 px-5 py-2.5 text-sm font-medium text-primary-100 transition-colors hover:border-line-strong hover:text-ink-inverse">
                        Account aanmaken
                    </a>
                </div>

                <p class="mt-6 text-sm text-ink-soft">
                    Je hebt een account nodig om de reisplanner te gebruiken.
                </p>
            </div>

                        <div class="rounded border border-primary-700 bg-primary-800">
                <div class="border-b border-primary-700 px-6 py-4">
                    <h2 class="text-sm font-semibold text-ink-inverse">Het net van Veldonia</h2>
                </div>
                <dl class="divide-y divide-primary-700 text-sm">
                    <div class="flex items-baseline justify-between px-6 py-3.5">
                        <dt class="text-primary-300">Steden</dt>
                        <dd class="text-lg font-semibold text-ink-inverse">10</dd>
                    </div>
                    <div class="flex items-baseline justify-between px-6 py-3.5">
                        <dt class="text-primary-300">Spoorlijnen</dt>
                        <dd class="text-lg font-semibold text-ink-inverse">15</dd>
                    </div>
                    <div class="flex items-baseline justify-between px-6 py-3.5">
                        <dt class="text-primary-300">Knooppunt</dt>
                        <dd class="font-semibold text-ink-inverse">Velburg</dd>
                    </div>
                    <div class="flex items-baseline justify-between px-6 py-3.5">
                        <dt class="text-primary-300">Eerste vertrek</dt>
                        <dd class="font-semibold text-ink-inverse">06:00</dd>
                    </div>
                    <div class="flex items-baseline justify-between px-6 py-3.5">
                        <dt class="text-primary-300">Laatste vertrek</dt>
                        <dd class="font-semibold text-ink-inverse">23:00</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</main>

<footer class="border-t border-primary-700">
    <div class="mx-auto flex max-w-5xl flex-col gap-1.5 px-4 py-6 text-xs text-ink-soft sm:flex-row sm:justify-between sm:px-6">
        <p>&copy; {{ date('Y') }} Spoorwegen Veldonia</p>
        <p>Veldonia is een fictief land — schoolopdracht Software Development 3</p>
    </div>
</footer>

</body>
</html>
