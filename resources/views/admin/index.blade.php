@extends('layouts.app')

@section('content')
    <header class="d-flex justify-content-between align-items-center">
        <h1>Tecnologie</h1>
        <div class="d-flex justify-content-end">
            <a class="btn btn-success me-2" href="{{ route('admin.projects.create') }}">Nuova tecnologia</a>
        </div>
    </header>
@endsection
