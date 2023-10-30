@extends('layouts.app')

@section('title', 'Technologies')


@section('content')
    <header class="d-flex justify-content-between align-items-center">
        <h1>Tecnologie</h1>
        <div class="d-flex justify-content-end">
            <a class="btn btn-success me-2" href="{{ route('admin.projects.create') }}">Nuova tecnologia</a>
        </div>
    </header>
    <hr>
    <div class="technologies-section row justify-content-center">

        @forelse($technologies as $technology)
            <div class="col-3">

                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ $technology->label }}</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's
                            content.</p>
                        <a href="#" class="btn btn-primary">Vedi progetti dove ho utilizzato
                            {{ $technology->label }}</a>
                    </div>
                </div>
            </div>

        @empty
            Non ci sono tecnologie
        @endforelse

    </div>

@endsection
