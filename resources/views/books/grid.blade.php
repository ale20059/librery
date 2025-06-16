@extends('layouts.app_s')

@section('content')
    <div class="container">
        <h1 class="mb-4">📚 Todos los libros</h1>

        {{-- Input de búsqueda --}}
        <input type="text" id="searchInput" class="form-control mb-4" placeholder="🔍 Buscar libro por nombre...">

        {{-- Contenedor de los libros --}}
        <div class="row" id="booksContainer">
            @foreach ($books as $book)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 book-card" data-title="{{ strtolower($book->title) }}">
                    <a href="{{ route('books.show', $book->id) }}" class="text-decoration-none">
                        <div class="p-3 rounded text-white text-center shadow-sm" style="background-color: {{ randomColor() }};">
                            <h5 class="text-white">{{ $book->title }}</h5>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        {{-- Script para búsqueda en tiempo real --}}
        <script>
            const input = document.getElementById('searchInput');
            const cards = document.querySelectorAll('.book-card');

            input.addEventListener('input', function () {
                const search = input.value.toLowerCase();
                cards.forEach(card => {
                    const title = card.dataset.title;
                    card.style.display = title.includes(search) ? 'block' : 'none';
                });
            });
        </script>
    </div>
@endsection
