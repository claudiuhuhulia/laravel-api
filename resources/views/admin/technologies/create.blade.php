@extends('layouts.app')
@section('title', 'Crea Tecnologia')

@section('content')
    <header class="d-flex justify-content-between align-items center">
        <h1>Crea Tecnologia</h1>
        <a class="btn btn-secondary my-3" href="{{ route('admin.technologies.index') }}"><i
                class="fas fa-arrow-left me-2"></i>Torna alla lista tecnologie</a>
    </header>
    <hr>
    {{-- form --}}

    @include('includes.technologies.form')

@endsection
