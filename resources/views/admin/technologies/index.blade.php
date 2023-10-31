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
                        <div class="btns d-flex">
                            <a href=" {{ route('admin.technologies.show', $technology) }}" class="btn btn-primary">Vedi
                                progetti
                                dove ho utilizzato
                                {{ $technology->label }}</a>
                            <a class="btn btn-sm btn-warning mx-2 d-flex align-items-center"
                                href="{{ route('admin.technologies.edit', $technology) }}">
                                <i class="fas fa-pencil"></i>
                            </a>
                            <form action="{{ route('admin.technologies.destroy', $technology) }}" method="POST"
                                class="delete-form">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-sm btn-danger h-100">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        @empty
            Non ci sono tecnologie
        @endforelse

    </div>

@endsection
