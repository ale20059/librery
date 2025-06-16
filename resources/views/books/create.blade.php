@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">➕ Agregar nuevo libro</h1>

        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data" class="p-4 border rounded shadow-sm bg-white">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Título:</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Descripción:</label>
                        <textarea name="description" id="description" class="form-control" rows="4"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="pdf" class="form-label">Archivo PDF:</label>
                        <input type="file" name="pdf" id="pdf" class="form-control" accept="application/pdf" required>
                    </div>

                    <div class="d-grid d-md-block">
                        <button type="submit" class="btn btn-success w-100 w-md-auto">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
