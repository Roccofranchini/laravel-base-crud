@extends('layouts.main')

@section('title', 'Comics')

@section('section-id', 'comics')

@section('content')
<div class="container">
  <table class="table">
      <thead>
        <tr>
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
            <td>{{ $comic->title }}</td>
            <td>{{ $comic->price }}</td>
            <td>{{ $comic->series }}</td>
            <td>{{ $comic->sale_date }}</td>
            <td> <a class="btn btn-primary" href="{{ route('comics.show', $comic->id) }}">Details</a> </td>
          </tr>
        @empty
            <tr>
                <td colspan="4">No comics availables</td>
            </tr>
        @endforelse
      </tbody>
    </table>
    <a class="btn btn-primary" href="{{ route('comics.create') }}">Aggiungi</a>
</div>
@endsection