@extends('layout')

@section('content')
    <div class="container mt-5 w-100 d-flex flex-column align-items-center">
        <h2>{{$genre ? "Список книг жанра ".$genre->genre : "Неверный Id жанра"}}</h2>
        @if($genre)
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Наименование</th>
                    <th scope="col">Автор</th>
                </tr>
                </thead>
                <tbody>
                @foreach($genre->books as $book)
                    <tr>
                        <td>{{$book->id}}</td>
                        <td>{{$book->name}}</td>
                        <td>{{$book->author->name}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
