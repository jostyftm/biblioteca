@extends('layouts.dashboard')

@section('header_section')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Libros</h1>
        <a href="{{route('books.create')}}" class="btn btn-sm btn-primary">Nuevo libro</a>
    </div>
@endsection
@section('content_main')
    <div class="bg-white p-4 rounded shadow-sm">
        <div class="table-responsible">
            <table class="table">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Titulo</th>
                        <th>Editorial</th>
                        <th>Copias</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                    <tr>
                        <td>{{ $book->code}}</td>
                        <td>{{ $book->titel }}</td>
                        <td>{{ $book->editorial }}</td>
                        <td>{{ $book->copies }}</td>
                        <td>
                            <button class="btn btn-sm btn-primary">
                                Editar
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $books->links() }}
        </div>
    </div>
@endsection