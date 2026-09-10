<button {{ $attributes->merge(['type' => 'submit', 'class' =>
    'inline-flex items-center justify-center rounded bg-secondary-700 px-4 py-2 text-sm font-medium text-ink-inverse
     transition-colors hover:bg-secondary focus:outline-none focus:ring-2 focus:ring-secondary-700
     focus:ring-offset-2 disabled:opacity-50']) }}>
    {{ $slot }}
</button>
