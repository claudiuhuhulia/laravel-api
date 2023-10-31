@if ($technology->exists)
    {{-- form di modifica --}}
    <form action="{{ route('admin.technologies.update', $technology) }}" method="POST" enctype='multipart/form-data'
        novalidate>
        @method('PUT')
    @else
        {{-- form di creazione --}}
        <form action="{{ route('admin.technologies.store') }}" method="POST" enctype='multipart/form-data' novalidate>
@endif

@csrf
<div class="row">
    <div class="col-6">
        <div class="mb-3">
            <label for="label" class="form-label">Label</label>
            <input type="text"
                class="form-control @error('label') is-invalid @elseif(old('label')) is-valid @enderror"
                id="label" name="label" placeholder="Inserisci il nome della tecnologia"
                value="{{ old('label', $technology->label) }}" maxlength="50" required>
            @error('label')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-6">

        <div class="mb-3">
            <label for="icon" class="form-label">Icona</label>
            <input type="text"
                class="form-control @error('icon') is-invalid @elseif(old('icon')) is-valid @enderror"
                id="icon" name="icon" placeholder="Inserisci l'icona fontawesome della tecnologia"
                value="{{ old('icon', $technology->icon) }}" maxlength="50" required>
            @error('icon')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-12">

        <div class="mb-3">
            <label for="color" class="form-label">Color</label>
            <input type="color"
                class="form-control @error('color') is-invalid @elseif(old('color')) is-valid @enderror"
                id="color" name="color" placeholder="Inserisci il colore della tecnologia"
                value="{{ old('color', $technology->color) }}" maxlength="50" required>
            @error('color')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<hr>
<div class="d-flex justify-content-end mt-2">
    <button class="btn btn-success">
        <i class="fas fa-floppy-disk me-2"></i>Salva
    </button>
</div>
</div>
</form>
