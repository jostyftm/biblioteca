@extends('layouts.dashboard')

@section('header_section')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Prestamos</h1>
        <a href="{{route('reservations.create')}}" class="btn btn-sm btn-primary">Nuevo prestamo</a>
    </div>
@endsection
@section('content_main')
    <div class="bg-white p-4 rounded shadow-sm">
        <div class="table-responsible">
            <table class="table">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Estudiante</th>
                        <th>Estado</th>
                        <th>Fecha de prestamo</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->id}}</td>
                        <td>{{ $reservation->student->user->name }}</td>
                        <td>{{ $reservation->reservation_state }}</td>
                        <td>{{ $reservation->reservated_at }}</td>
                        <td>
                            <button class="btn btn-sm btn-primary">
                                Editar
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $reservations->links() }}
        </div>
    </div>
@endsection