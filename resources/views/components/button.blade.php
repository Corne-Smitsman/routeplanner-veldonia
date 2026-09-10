@props([
    'href' => null,
    'variant' => 'primary',
    'type' => 'submit',
    'full' => false,
])

@php
    $pil = [
        'primary' => 'border-primary bg-primary text-ink-inverse',
        'outline' => 'border-line-strong bg-surface text-ink',
        'danger' => 'border-danger bg-danger text-ink-inverse',
    ][$variant];

    $bol = [
        'primary' => 'bg-primary-800',
        'outline' => 'bg-primary',
        'danger' => 'bg-danger-700',
    ][$variant];

    $tag = $href ? 'a' : 'button';
@endphp

<{{ $tag }}
    @if ($href) href="{{ $href }}" @else type="{{ $type }}" @endif
    {{ $attributes->merge(['class' => 'group relative inline-flex cursor-pointer items-center ' . ($full ? 'w-full' : '')]) }}>

    <span class="relative flex h-12 items-center overflow-hidden rounded-full border {{ $pil }} {{ $full ? 'w-full justify-center' : '' }}">
        <span class="absolute right-0 flex h-12 w-12 items-center justify-center rounded-full {{ $bol }} transition-transform duration-500 ease-in-out group-hover:translate-x-full">
            <svg width="20" height="20" viewBox="0 0 26 26" fill="none" aria-hidden="true">
                <path d="M5 13H21M21 13L14 6M21 13L14 20" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </span>

        <span class="whitespace-nowrap pl-6 pr-16 text-sm font-medium transition-transform duration-500 ease-in-out group-hover:translate-x-12">
            {{ $slot }}
        </span>

        <span class="absolute left-0 flex h-12 w-12 -translate-x-full items-center justify-center rounded-full {{ $bol }} transition-transform duration-500 ease-in-out group-hover:translate-x-0">
            <svg width="20" height="20" viewBox="0 0 26 26" fill="none" aria-hidden="true">
                <path d="M5 13H21M21 13L14 6M21 13L14 20" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </span>
    </span>
</{{ $tag }}>
