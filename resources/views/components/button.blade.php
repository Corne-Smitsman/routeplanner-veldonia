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

    $basis = 'group relative inline-flex cursor-pointer items-center';

    if ($full) {
        $basis .= ' w-full';
    }
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $basis]) }}>
        @include('partials.knop-inhoud', ['pil' => $pil, 'bol' => $bol, 'full' => $full, 'inhoud' => $slot])
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $basis]) }}>
        @include('partials.knop-inhoud', ['pil' => $pil, 'bol' => $bol, 'full' => $full, 'inhoud' => $slot])
    </button>
@endif
