<span class="relative flex h-14 items-center overflow-hidden rounded-full border {{ $pil }} {{ $full ? 'w-full justify-center' : '' }}">
    <span class="absolute inset-y-2 right-2 flex w-10 items-center justify-center rounded-full {{ $bol }} transition-transform duration-500 ease-in-out group-hover:translate-x-12">
        <svg width="20" height="20" viewBox="0 0 26 26" fill="none" aria-hidden="true">
            <path d="M5 13H21M21 13L14 6M21 13L14 20" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </span>

    <span class="whitespace-nowrap pl-7 pr-16 text-sm font-medium transition-transform duration-500 ease-in-out group-hover:translate-x-12">
        {{ $inhoud }}
    </span>

    <span class="absolute inset-y-2 left-2 flex w-10 -translate-x-12 items-center justify-center rounded-full {{ $bol }} transition-transform duration-500 ease-in-out group-hover:translate-x-0">
        <svg width="20" height="20" viewBox="0 0 26 26" fill="none" aria-hidden="true">
            <path d="M5 13H21M21 13L14 6M21 13L14 20" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </span>
</span>
