<button {{ $attributes->merge(['type' => 'submit', 'class' =>
    'inline-flex items-center justify-center rounded-lg bg-danger-700 px-4 py-2 text-sm font-medium text-ink-inverse
     transition-colors hover:bg-danger focus:outline-none focus:ring-2 focus:ring-danger-700
     focus:ring-offset-2 disabled:opacity-50']) }}>
    {{ $slot }}
</button>
