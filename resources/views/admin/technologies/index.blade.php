@extends('layouts.app')

@section('title', 'Technologies')


@section('content')
    <header class="d-flex justify-content-between align-items-center">
        <h1>Tecnologie</h1>
        <div class="d-flex justify-content-end">
            <a class="btn btn-success me-2" href="{{ route('admin.technologies.create') }}">Nuova tecnologia</a>
        </div>
    </header>
    <hr>
    <div class="technologies-section row justify-content-center">

        @forelse($technologies as $technology)
            <div class="col-3">

                <div class="card " style="width: 18rem;">
                    <div class="card-body d-flex flex-column align-items-center">
                        <h5 class="card-title">{{ $technology->label }}</h5>
                        <p> <i class="{{ $technology->icon }}"></i>
                        </p>
                        <a href=" {{ route('admin.technologies.show', $technology) }}" class="btn btn-primary">Vedi progetti
                            dove ho utilizzato
                            {{ $technology->label }}</a>
                    </div>
                </div>
            </div>

        @empty
            Non ci sono tecnologie
        @endforelse

    </div>

@endsection
