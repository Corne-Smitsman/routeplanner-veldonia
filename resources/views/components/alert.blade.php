@props(['type' => 'success'])

@php
    $styles = [
        'success' => 'border-line-strong bg-surface-muted text-ink',
        'error'   => 'border-danger-500 bg-danger-50 text-danger-700',
    ][$type] ?? 'border-line-strong bg-surface-muted text-ink';
@endphp

<div {{ $attributes->merge(['class' => "rounded-lg border px-4 py-3 text-sm $styles"]) }} role="alert">
    {{ $slot }}
</div>
