@extends('layouts.main')

@section('title', 'Create')

@section('section-id', 'create')

@section('content')

    <div class="container">
        <div class="row mt-4">
            <h1>Aggiungi fumetto</h1>
            <div class="col-2 offset-10 text-end">
                <a class="btn btn-primary" href="{{ url()->previous() }}">Indietro</a>
            </div>
        </div>
        @include('includes.comics.form')
    </div>




@endsection
