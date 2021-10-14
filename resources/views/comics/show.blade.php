@extends('layouts.main')

@section('title', $comic->title)

@section('section-id', 'comic')

@section('cdns')
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css'
        integrity='sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw=='
        crossorigin='anonymous' />
@endsection

@section('content')
    <div class="container d-flex justify-content-center flex-column">
        <div class="card">
            <div class="card-title d-flex justify-content-center align-items-baseline my-5">
                <h1 class="text-center">{{ $comic->title }}</h1>
                <small><a href="{{ route('comics.edit', $comic->id) }}"><i
                            class="fas fa-pen text-black ps-3"></i></a></small>
            </div>
            <div class="card-body row">
                <div class="col-3 text-center">
                    <img class="shadow-lg bg-body rounded" src="{{ $comic->thumb }}" alt="">
                </div>
                <div class="col-9">
                    <ul>
                        <li><strong>Titolo:</strong> {{ $comic->title }}</li>
                        <li><strong>Prezzo:</strong> {{ $comic->price }}</li>
                        <li><strong>Serie:</strong> {{ $comic->series }}</li>
                        <p class="py-4">{{ $comic->description }}</p>
                    </ul>
                </div>
            </div>
        </div>
        <form method="POST" action="{{ route('comics.destroy', $comic->id) }}" class="my-3 text-center delete-form"
            data-comic="{{ $comic->title }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger ms-2">Delete</button>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/delete_confirmation.js') }}"></script>
@endsection
