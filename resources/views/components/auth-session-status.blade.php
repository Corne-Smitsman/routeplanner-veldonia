@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'rounded border border-line bg-surface-muted px-4 py-3 text-sm text-ink-muted']) }}>
        {{ $status }}
    </div>
@endif
