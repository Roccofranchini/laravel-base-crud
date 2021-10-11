@extends('layouts.main')

@section('title', $comic->title)

@section('section-id', 'comic')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-title my-5">
            <h1 class="text-center">{{$comic->title}}</h1>
        </div>
        <div class="card-body row">
            <div class="col-3 text-center">
                <img class="shadow-lg bg-body rounded" src="{{$comic->thumb}}" alt="">
            </div>
            <div class="col-9">
                <ul>
                    <li><strong>Titolo:</strong> {{$comic->title}}</li>
                    <li><strong>Prezzo:</strong> {{$comic->price}}</li>
                    <li><strong>Serie:</strong> {{$comic->series}}</li>
                    <p class="py-4">{{$comic->description}}</p>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection