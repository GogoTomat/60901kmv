@extends('layout')

@section('content')
    <div class="container mt-5 w-100 d-flex flex-column align-items-center">
        <h2>Список книг</h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Автор</th>
                <th scope="col">Название</th>
                <th scope="col">Жанр</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($books as $book)
                <tr>
                    <th scope="row">{{ $book->id }}</th>
                    <td>{{ $book->author->name }}</td>
                    <td>{{ $book->name }}</td>
                    <td>{{ $book->genre->genre}}</td>
                    <td>
                        <a href="{{ url('book/'.$book->id) }}" class="btn btn-info btn-sm">Подробнее</a>
                        <a href="{{ url('book/edit/'.$book->id) }}" class="btn btn-primary btn-sm">Редактировать</a>
                        <a href="{{ url('book/destroy/'.$book->id) }}" class="btn btn-danger btn-sm">Удалить</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$books->links()}}
    </div>
@endsection
