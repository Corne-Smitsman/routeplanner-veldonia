@props(['type' => 'success'])

@php
    $styles = [
        'success' => 'border-line-strong bg-surface-muted text-ink',
        'error'   => 'border-secondary-500 bg-secondary-50 text-secondary-700',
    ][$type] ?? 'border-line-strong bg-surface-muted text-ink';
@endphp

<div {{ $attributes->merge(['class' => "rounded border px-4 py-3 text-sm $styles"]) }} role="alert">
    {{ $slot }}
</div>
