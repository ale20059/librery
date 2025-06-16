@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">📚 Lista de Libros</h1>

        <div class="row">
            @foreach ($books as $book)
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="border rounded p-3 h-100 d-flex flex-column justify-content-between shadow-sm">
                        <div>
                            <h4 class="text-primary">{{ $book->title }}</h4>
                            <p class="text-muted">{{ $book->description }}</p>
                        </div>

                        <div class="mt-3">
                            <a href="{{ route('books.show', $book) }}" class="btn btn-sm btn-primary me-1 mb-1">Ver</a>
                            <a href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-warning me-1 mb-1">Editar</a>
                            <form action="{{ route('books.destroy', $book) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger mb-1">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
