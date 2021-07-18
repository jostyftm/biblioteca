@extends('layouts.dashboard')

@section('header_section')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Libros</h1>
        <a href="{{route('books.create')}}" class="btn btn-sm btn-primary">Nuevo libro</a>
    </div>
@endsection
@section('content_main')
    <div class="bg-white p-4 rounded shadow-sm">
        <div>
            <form class="form-inline" method="GET" enctype="application/x-www-form-urlencoded">
                <div class="form-group mb-3">
                    <input 
                        type="text" 
                        name="search_book" 
                        class="form-control mr-2" 
                        placeholder="codigo, titulo, editorial"
                        />
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </form>
        </div>
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
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->editorial }}</td>
                        <td>{{ $book->copies }}</td>
                        <td>
                            <a 
                                class="btn btn-sm btn-primary"
                                href="{{ route('books.edit', [$book->id])}}"
                            >
                                Editar
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $books->links() }}
        </div>
    </div>
@endsection