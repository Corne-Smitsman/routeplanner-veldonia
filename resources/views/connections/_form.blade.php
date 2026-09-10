<div class="space-y-5 p-5">
    <div class="grid gap-5 sm:grid-cols-2">
        <div>
            <x-input-label for="from_station_id" value="Van"/>
            <select id="from_station_id" name="from_station_id" required
                    class="mt-1.5 block w-full rounded-lg border border-line-strong bg-surface px-3 py-2 text-ink focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">
                <option value="">Kies een station</option>
                @foreach ($stations as $option)
                    <option value="{{ $option->id }}"
                        @selected(old('from_station_id', $connection->from_station_id ?? '') == $option->id)>
                        {{ $option->name }} ({{ $option->code }})
                    </option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('from_station_id')"/>
        </div>

        <div>
            <x-input-label for="to_station_id" value="Naar"/>
            <select id="to_station_id" name="to_station_id" required
                    class="mt-1.5 block w-full rounded-lg border border-line-strong bg-surface px-3 py-2 text-ink focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">
                <option value="">Kies een station</option>
                @foreach ($stations as $option)
                    <option value="{{ $option->id }}"
                        @selected(old('to_station_id', $connection->to_station_id ?? '') == $option->id)>
                        {{ $option->name }} ({{ $option->code }})
                    </option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('to_station_id')"/>
        </div>
    </div>

    <div class="grid gap-5 sm:grid-cols-2">
        <div>
            <x-input-label for="distance_km" value="Afstand in kilometers"/>
            <x-text-input id="distance_km" name="distance_km" type="number" min="1" step="1" class="mt-1.5"
                          :value="old('distance_km', $connection->distance_km ?? '')" required/>
            <x-input-error :messages="$errors->get('distance_km')"/>
        </div>

        <div>
            <x-input-label for="duration_minutes" value="Rijtijd in minuten"/>
            <x-text-input id="duration_minutes" name="duration_minutes" type="number" min="1" step="1" class="mt-1.5"
                          :value="old('duration_minutes', $connection->duration_minutes ?? '')" required/>
            <x-input-error :messages="$errors->get('duration_minutes')"/>
        </div>
    </div>
</div>

<div class="flex items-center gap-3 border-t border-line px-5 py-4">
    <x-button>{{ $submit }}</x-button>
    <a href="{{ $cancel }}" class="text-sm text-ink-muted transition-colors hover:text-ink">Annuleren</a>
</div>
