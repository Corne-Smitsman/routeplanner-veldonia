<button {{ $attributes->merge(['type' => 'button', 'class' =>
    'inline-flex items-center justify-center rounded-lg border border-line-strong bg-surface px-4 py-2 text-sm
     font-medium text-ink-muted transition-colors hover:border-primary-400 hover:text-ink
     focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2']) }}>
    {{ $slot }}
</button>
