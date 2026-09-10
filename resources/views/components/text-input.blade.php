@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' =>
    'block w-full rounded border border-line-strong bg-surface px-3 py-2 text-ink placeholder-ink-soft
     focus:border-primary-600 focus:outline-none focus:ring-1 focus:ring-primary-600
     disabled:bg-surface-muted disabled:text-ink-soft']) }}>
