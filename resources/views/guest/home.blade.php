@extends('layouts.app')
@section('content')
    <div class="jumbotron p-5 mb-4 bg-light rounded-3">
        <h1>I miei progetti</h1>
        <div class="row">
            @forelse ($projects as $project)
                <div class="col-4">

                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $project->name }}</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">{{ $project->created_at }}</h6>
                            @if (count($project->images))
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
                                                <img src="{{ asset('storage/' . $image->url) }}" class="d-block w-100"
                                                    alt="...">
                                            </div>
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            @endif



                            <p class="card-text">{{ $project->getAbstract($project->content) }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <h3 class="text-center">Non ci sono progetti</h3>
            @endforelse
        </div>
    </div>
@endsection
