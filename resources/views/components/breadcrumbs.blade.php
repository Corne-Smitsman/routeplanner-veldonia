@props(['items' => []])

<nav aria-label="Kruimelpad" {{ $attributes }}>
    <ol class="flex flex-wrap items-center gap-2 text-sm text-ink-muted">
        <li>
            @if (count($items) === 0)
                <span class="font-medium text-ink" aria-current="page">Home</span>
            @else
                <a href="{{ route('home') }}" class="transition-colors hover:text-ink">Home</a>
            @endif
        </li>

        @foreach ($items as $item)
            <li aria-hidden="true" class="text-ink-soft">/</li>
            <li>
                @if (isset($item['url']))
                    <a href="{{ $item['url'] }}" class="transition-colors hover:text-ink">{{ $item['label'] }}</a>
                @else
                    <span class="font-medium text-ink" aria-current="page">{{ $item['label'] }}</span>
                @endif
            </li>
        @endforeach
    </ol>
</nav>
