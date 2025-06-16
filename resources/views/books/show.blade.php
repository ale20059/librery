@extends('layouts.app_s')

@section('content')
    <div class="container">
        <h1 class="mb-3">{{ $book->title }}</h1>
        <p class="text-muted">{{ $book->description }}</p>

        <div class="mt-4">
            <div class="ratio ratio-4x3">
                <embed src="{{ asset('storage/' . $book->pdf_path) }}" type="application/pdf" class="rounded shadow-sm" />
            </div>
        </div>
        <br>
        <a href="{{ asset('storage/' . $book->pdf_path) }}" target="_blank" class="btn btn-outline-primary">📄 Ver en otra
            página</a>

    </div>
@endsection
