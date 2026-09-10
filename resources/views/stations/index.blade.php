@extends('layouts.app')

@section('title', 'Steden')

@section('content')
    <x-page-header
        title="Steden"
        subtitle="{{ $stations->count() }} steden in Veldonia"
        :breadcrumbs="[['label' => 'Steden']]">
        <x-slot:actions>
            <a href="{{ route('stations.create') }}"
               class="inline-flex items-center rounded-lg bg-primary px-4 py-2.5 text-sm font-medium text-ink-inverse transition-colors hover:bg-primary-600">
                Stad toevoegen
            </a>
        </x-slot:actions>
    </x-page-header>

    <div class="overflow-hidden rounded-xl border border-line">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="border-b border-line text-ink">
                    <tr>
                        <th scope="col" class="px-3 py-4 font-semibold sm:px-5">Code</th>
                        <th scope="col" class="px-3 py-4 font-semibold sm:px-5">Naam</th>
                        <th scope="col" class="hidden px-3 py-4 font-semibold sm:px-5 md:table-cell">Regio</th>
                        <th scope="col" class="hidden px-3 py-4 text-right font-semibold sm:table-cell sm:px-5">Inwoners</th>
                        <th scope="col" class="px-3 py-4 text-right font-semibold sm:px-5">Acties</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-line">
                    @forelse ($stations as $station)
                        <tr class="transition-colors hover:bg-surface-muted">
                            <td class="px-3 py-3.5 sm:px-5 font-medium tabular-nums text-ink">{{ $station->code }}</td>
                            <td class="px-3 py-3.5 sm:px-5">
                                <a href="{{ route('stations.show', $station) }}"
                                   class="font-medium text-ink underline decoration-line-strong underline-offset-2 transition-colors hover:decoration-ink">
                                    {{ $station->name }}
                                </a>
                            </td>
                            <td class="hidden px-3 py-3.5 sm:px-5 text-ink-muted md:table-cell">{{ $station->region }}</td>
                            <td class="hidden px-3 py-3.5 sm:px-5 text-right tabular-nums text-ink-muted sm:table-cell">
                                {{ number_format($station->population, 0, ',', '.') }}
                            </td>
                            <td class="px-3 py-3.5 sm:px-5">
                                <div class="flex justify-end gap-3 whitespace-nowrap">
                                    <a href="{{ route('stations.edit', $station) }}"
                                       class="text-primary transition-colors hover:text-primary-800">Bewerken</a>
                                    <a href="{{ route('stations.confirm-destroy', $station) }}"
                                       class="text-danger transition-colors hover:text-danger-700">Verwijderen</a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-3 py-12 text-center text-ink-muted sm:px-5">
                                Er zijn nog geen steden.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
