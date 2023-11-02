@extends('layouts.app')
@section('title', 'Project')

@section('content')
    <header>
        <h1>{{ $project->name }}</h1>
    </header>
    <hr>
    <div class="row">

        @if (count($project->images))
            <div class="col-6">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        @foreach ($project->images as $index => $image)
                            <button type="button" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide-to="{{ $index }}"
                                @if ($index === 0) class="active" @endif
                                aria-label="Slide {{ $index + 1 }}"></button>
                        @endforeach
                    </div>
                    <div class="carousel-inner">
                        @foreach ($project->images as $index => $image)
                            <div class="carousel-item @if ($index === 0) active @endif">
                                <img src="{{ asset('storage/' . $image->url) }}" class="d-block w-100" alt="...">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        @endif
        <div class="col-6 d-flex flex-column justify-content-center align-items-center">
            <div class="category">
                <strong> Categoria: </strong>{{ $project->type ? $project->type->label : 'Nessuna' }}
            </div>
            <div class="d-flex align-items-center my-3">
                <strong> Tecnologie usate: </strong>
                @foreach ($project->technologies as $technology)
                    <i class=" {{ $technology->icon }} mx-2"></i>
                @endforeach

            </div>
        </div>

        <div class="col-12 mt-4">
            <strong>Descrizione</strong>
            <p>{{ $project->content }}</p>
        </div>

    </div>
    <hr>
    <footer class="d-flex justify-content-between">
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Torna alla lista</a>
        <div class="d-flex justify-content-end">

            <a class="btn btn-warning mx-2" href="{{ route('admin.projects.edit', $project) }}">
                <i class="fas fa-pencil me-2"></i>Modifica
            </a>
            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="delete-form">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger">
                    <i class="fas fa-trash me-2">
                    </i>
                    Elimina

                </button>
            </form>
        </div>
    </footer>
@endsection

@section('scripts')
    @vite('resources/js/delete-confirmation.js')
@endsection
