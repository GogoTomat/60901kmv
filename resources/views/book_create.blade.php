@extends('layout')

@section('content')
    <div class="container mt-5 mb-5 d-flex flex-column align-items-stretch">
        <h2 class="mb-4">Добавление книги</h2>
        <form method="post" action="{{ url('book') }}" class="col g-5 gap-5">
            @csrf

            <div class="col-md-6">
                <label for="author_id" class="form-label">Автор</label>
                <input type="text" class="form-control @error('author_id') is-invalid @enderror"
                       id="author_id" name="author_id" value="{{ old('author_id') }}">
                @error('author_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="name" class="form-label">Название</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="col-md-6">
                <label for="genre_id" class="form-label">Жанр</label>
                <select id="genre_id" class="form-select @error('genre_id') is-invalid @enderror" name="genre_id">
                    <option selected disabled value="">Выберите жанр</option>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}" {{ old('genre_id') == $genre->id ? 'selected' : '' }}>
                            {{ $genre->genre }}
                        </option>
                    @endforeach
                </select>
                @error('genre_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Добавить</button>
            </div>
        </form>
    </div>
@endsection
