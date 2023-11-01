@if ($project->exists)
    {{-- form di modifica --}}
    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype='multipart/form-data' novalidate>
        @method('PUT')
    @else
        {{-- form di creazione --}}
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype='multipart/form-data' novalidate>
@endif

@csrf
<div class="row">
    <div class="col-6">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text"
                class="form-control @error('name') is-invalid @elseif(old('name')) is-valid @enderror"
                id="name" name="name" placeholder="Inserisci il nome del progetto"
                value="{{ old('name', $project->name) }}" maxlength="50" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-6">

        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" disabled
                value="{{ Str::slug(old('name', $project->name), '-') }}">
        </div>
    </div>

    <div class="col-12">
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control @error('content') is-invalid  @elseif(old('content')) is-valid @enderror"
                id="content" name="content" rows="10" required>{{ old('content', $project->content) }}</textarea>
            @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    {{-- Multiple images --}}
    <div class="col-6 text-start">
        <div class="mb-3">
            <label class="form-label" for="multiple_images">Immagini</label>
            @if (count($project->images) > 0)
                <div id="oldImages">
                    <div class="text-center py-2">Immagini attuali</div>
                    <div class="row gap-3">
                        @foreach ($project->images as $image)
                            <div class="col-12 col-md-2 p-2">
                                <img class="previewImages" src="{{ asset('storage/' . $image->url) }}" alt="">
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
            <input type="file" multiple id="multiple_images" name="multiple_images[]"
                class="form-control @error('multiple_images') is-invalid @elseif (old('multiple_images')) is-valid @enderror"
                value="{{ old('multiple_images', $project->images) }}">
            <div id="previewTitle" class="text-center py-2">Nessuna immagine attualmente selezionata</div>
            <div id="rowImages" class="row gap-3"></div>
            @error('multiple_images')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>



    <div class="col-6">
        <div class="mb-3 ">
            <label class="form-label" for="type">Tipo</label>
            <select
                class=" form-select form-select @error('type') is-invalid  @elseif(old('type')) is-valid @enderror"
                id="type" name="type_id">
                <option value="1">Nessuna</option>
                @foreach ($types as $type)
                    <option @if (old('type_id', $project->type_id) == $type->id) selected @endif value="{{ $type->id }}">
                        {{ $type->label }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-12">
        @foreach ($technologies as $technology)
            <div class="form-check form-check-inline">
                <input class="form-check-input" name="technologies[]" type="checkbox"
                    @if (in_array($technology->id, old('technologies', $project_technology_ids ?? []))) checked @endif id="technology-{{ $technology->id }}"
                    value="{{ $technology->id }}">
                <label class="form-check-label"
                    for="technology-{{ $technology->id }}">{{ $technology->label }}</label>
            </div>
            @error('technologies')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        @endforeach
    </div>
    <hr>
    <div class="d-flex justify-content-end mt-2">
        <button class="btn btn-success">
            <i class="fas fa-floppy-disk me-2"></i>Salva
        </button>
    </div>
</div>
</form>

{{-- Scritps --}}
@section('scripts')
    @Vite('resources/js/image-previewer.js')
@endsection
