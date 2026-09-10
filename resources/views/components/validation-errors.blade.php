@if ($errors->any())
    <div class="rounded-lg border border-danger-500 bg-danger-50 px-4 py-3" role="alert">
        <p class="text-sm font-medium text-danger-700">Controleer de volgende velden:</p>
        <ul class="mt-2 list-inside list-disc space-y-1 text-sm text-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
