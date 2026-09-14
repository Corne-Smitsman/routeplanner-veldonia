{{-- Pil h-12, pijlcirkel 32px op 8px van de rand. Tekst heeft 20px aan de vrije kant en 52px (8 + 32 + 12) aan de pijlkant; bij hover schuift de tekst 32px, zodat die ruimtes precies omdraaien. --}}
<span class="relative flex h-12 items-center overflow-hidden rounded-full border {{ $pil }} {{ $full ? 'w-full justify-center' : '' }}">
    <span class="absolute left-2 top-2 flex size-8 -translate-x-12 items-center justify-center rounded-full {{ $bol }} transition-transform duration-500 ease-in-out group-hover:translate-x-0">
        <svg width="15" height="15" viewBox="0 0 26 26" fill="none" aria-hidden="true">
            <path d="M5 13H21M21 13L14 6M21 13L14 20" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </span>

    <span class="whitespace-nowrap pl-5 pr-13 text-sm font-medium leading-none transition-transform duration-500 ease-in-out group-hover:translate-x-8">
        {{ $inhoud }}
    </span>

    <span class="absolute right-2 top-2 flex size-8 items-center justify-center rounded-full {{ $bol }} transition-transform duration-500 ease-in-out group-hover:translate-x-12">
        <svg width="15" height="15" viewBox="0 0 26 26" fill="none" aria-hidden="true">
            <path d="M5 13H21M21 13L14 6M21 13L14 20" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </span>
</span>
