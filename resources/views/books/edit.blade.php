@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">✏️ Editar libro</h1>

        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <form action="{{ route('books.update', $book) }}" method="POST" enctype="multipart/form-data"
                    class="p-4 border rounded shadow-sm bg-white">
                    @csrf @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label">Título:</label>
                        <input type="text" name="title" value="{{ $book->title }}" class="form-control" id="title"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Descripción:</label>
                        <textarea name="description" class="form-control" id="description" rows="4">{{ $book->description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">PDF actual:</label><br>
                        <a href="{{ asset('storage/' . $book->pdf_path) }}" target="_blank">📄 Ver archivo</a>
                    </div>

                    <div class="mb-3">
                        <label for="pdf" class="form-label">Nuevo archivo PDF (opcional):</label>
                        <input type="file" name="pdf" class="form-control" accept="application/pdf" id="pdf">
                    </div>

                    <div class="d-grid d-md-block">
                        <button type="submit" class="btn btn-primary w-100 w-md-auto">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
