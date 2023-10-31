@extends('layouts.app')

@section('title', 'Technologies')

@section('content')
    <header class="d-flex justify-content-between align-items-center">
        <h1>Progetti nei quali ho utilizzato {{ $technology->label }}</h1>
        <a href="{{ route('admin.technologies.index') }}" class="btn btn-secondary">Torna alle tecnologie</a>
    </header>
    <hr>

    @forelse ($projects as $project)
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">{{ $project->name }}</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">{{ $project->created_at }}</h6>
                <div class="clearfix">
                    <img class="float-start me-3" src="{{ $project->image }}" alt="{{ $project->name }}">
                    <p class="card-text">{{ $project->content }}</p>
                </div>
            </div>
        </div>
    @empty
        <h3 class="text-center">Non ci sono progetti</h3>
    @endforelse
@endsection
