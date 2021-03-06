@extends('layouts.dashboard')

@section('header_section')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Estudiantes</h1>
        <a href="{{route('students.create')}}" class="btn btn-sm btn-primary">Nuevo estudiante</a>
    </div>
@endsection
@section('content_main')
    <div class="bg-white p-4 rounded shadow-sm">
        <div>
            <form class="form-inline" method="GET" enctype="application/x-www-form-urlencoded">
                <div class="form-group mb-3">
                    <input 
                        type="text" 
                        name="search_student" 
                        class="form-control mr-2" 
                        placeholder="codigo, nombre, apellido, email"
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
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                    <tr>
                        <td>{{ $student->code}}</td>
                        <td>{{ $student->user->name}}</td>
                        <td>{{ $student->user->last_name}}</td>
                        <td>{{ $student->user->email}}</td>
                        <td>
                            <a 
                                class="btn btn-sm btn-primary"
                                href="{{ route('students.edit', [$student->id]) }}"
                            >
                                Editar
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $students->links() }}
        </div>
    </div>
@endsection