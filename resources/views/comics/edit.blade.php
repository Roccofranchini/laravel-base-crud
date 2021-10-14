@extends('layouts.main')

@section('title', 'Edit')

@section('section-id', 'edit')

@section('aggiungi-modifica', 'Modifica')

@section('content')

    <div class="container">
        <h1>Modifica fumetto</h1>
        <div class="col-2 offset-10 text-end">
            <a class="btn btn-primary" href="{{ url()->previous() }}">Indietro</a>
        </div>

        @include('includes.comics.form')
    </div>




@endsection
