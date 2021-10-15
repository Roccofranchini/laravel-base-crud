@extends('layouts.main')

@section('title', 'Comics')

@section('section-id', 'comics')

@section('content')
    <div class="container">

        @if (session('delete'))
            <div class="alert alert-success" role="alert">
                {{ session('delete') }} eliminato con successo!
            </div>

        @endif

        <h1 class="text-center">Indice Fumetti</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">thumb</th>
                    <th scope="col">title</th>
                    <th scope="col">price</th>
                    <th scope="col">type</th>
                    <th scope="col">sale date</th>
                    <th scope="col">actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($comics as $comic)
                    <tr>
                        <td>
                            <img src="{{ $comic->thumb }}" height="60" alt="">
                        </td>
                        <td>{{ $comic->title }}</td>
                        <td>{{ $comic->price }}</td>
                        <td>{{ $comic->series }}</td>
                        <td>{{ $comic->sale_date }}</td>
                        <td class="text-end
                        ">
                            <a class="btn btn-primary me-2" href="{{ route('comics.show', $comic->id) }}">Details</a>
                            <a class="btn btn-secondary" href="{{ route('comics.edit', $comic->id) }}">Edit</a>
                            <form method="POST" action="{{ route('comics.destroy', $comic->id) }}"
                                class="delete-form d-inline-block" data-comic="{{ $comic->title }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger ms-2">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No comics availables</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="d-flex justify-content-between">
            <a class="btn btn-primary" href="{{ route('comics.create') }}">Aggiungi</a>
            <a class="btn btn-primary" href="{{ url()->previous() }}">Indietro</a>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/delete_confirmation.js') }}"></script>
@endsection
