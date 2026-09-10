@props(['title', 'subtitle' => null, 'breadcrumbs' => []])

<div class="rounded-xl border border-line px-5 py-6 sm:px-8 sm:py-8">
    <x-breadcrumbs :items="$breadcrumbs"/>

    <div class="mt-4 flex flex-wrap items-end justify-between gap-4">
        <div>
            <h1 class="text-2xl font-semibold text-ink">{{ $title }}</h1>

            @if ($subtitle)
                <p class="mt-1.5 text-ink-muted">{{ $subtitle }}</p>
            @endif
        </div>

        @if (isset($actions))
            <div class="flex flex-wrap gap-3">{{ $actions }}</div>
        @endif
    </div>
</div>
