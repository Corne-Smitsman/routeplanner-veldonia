<div class="space-y-5 p-5">
    <div class="grid gap-5 sm:grid-cols-[8rem_1fr]">
        <div>
            <x-input-label for="code" value="Stationscode"/>
            <x-text-input id="code" name="code" type="text" class="mt-1.5 uppercase" maxlength="3"
                          :value="old('code', $station->code ?? '')" required autofocus/>
            <x-input-error :messages="$errors->get('code')"/>
        </div>
        <div>
            <x-input-label for="name" value="Naam"/>
            <x-text-input id="name" name="name" type="text" class="mt-1.5"
                          :value="old('name', $station->name ?? '')" required/>
            <x-input-error :messages="$errors->get('name')"/>
        </div>
    </div>

    <div>
        <x-input-label for="region" value="Regio"/>
        <x-text-input id="region" name="region" type="text" class="mt-1.5"
                      :value="old('region', $station->region ?? '')" required/>
        <x-input-error :messages="$errors->get('region')"/>
    </div>

    <div class="sm:max-w-xs">
        <x-input-label for="population" value="Inwoners"/>
        <x-text-input id="population" name="population" type="number" min="0" step="1" class="mt-1.5"
                      :value="old('population', $station->population ?? '')" required/>
        <x-input-error :messages="$errors->get('population')"/>
    </div>
</div>

<div class="flex items-center gap-3 border-t border-line px-5 py-4">
    <x-primary-button>{{ $submit }}</x-primary-button>
    <a href="{{ $cancel }}" class="text-sm text-ink-muted transition-colors hover:text-ink">Annuleren</a>
</div>
