@extends('layout')

@section('content')
    <div class="container mt-5 w-100 d-flex flex-column align-items-center">
        <h2>Список Жанров</h2>
        <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Жанр</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($genres as $genre)
                <tr>
                    <td>{{$genre->id}}</td>
                    <td>{{$genre->genre}}</td>
                    <td>
                        <a href="{{ url('genre/'.$genre->id) }}" class="btn btn-info btn-sm">К книгам</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
