@extends('layouts.dashboard')

@section('header_section')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Resumen</h1>
    </div>
@endsection

@section('content_main')

<div class="container-fluid">
    <div class="row">
        @foreach($states as $key => $state)
        <div class="col-md-2 bg-white text-center p-2 border-left border-{{ $state->bg_color }} shadow-sm rounded mb-2 mr-2">
            <h2 class="font-weight-bold">{{ $state->total }}</h2>
            <span>{{ ucfirst($state->name) }}</span>
        </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-md-12 bg-white rounded shadow-sm py-4">
            <h4 class="my-3">Ultimas reservaciones</h4>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Estudiante</th>
                            <th>Libro</th>
                            <th>Estado</th>
                            <th>Fecha de prestamo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lastReservations as $reservation)
                        <tr>
                            <td>{{ $reservation->id}}</td>
                            <td>{{ $reservation->student->user->name }}</td>
                            <td>{{ $reservation->book->title }}</td>
                            <td>
                                <span class="badge badge-{{ $reservation->state->bg_color}}">
                                    {{ $reservation->state->name }}
                                </span>
                            </td>
                            <td>{{ $reservation->reservated_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection