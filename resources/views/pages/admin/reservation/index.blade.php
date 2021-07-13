@extends('layouts.dashboard')

@section('header_section')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Prestamos</h1>
        <a href="{{route('reservations.create')}}" class="btn btn-sm btn-primary">Nuevo prestamo</a>
    </div>
@endsection
@section('content_main')
    <div class="bg-white p-4 rounded shadow-sm">
        <nav class="nav nav-pills mb-2">
            <a 
                class="nav-link @if($tab_active == null) active @endif" 
                href="/panel/reservations"
            >
                Todos ({{ $all_reservations }})
            </a>
        @foreach($states as $key => $state)
            <a 
                class="nav-link @if($tab_active == $state->state_id) active @endif" 
                href="/panel/reservations?sid={{$state->state_id}}"
            >
                {{ $state->name }} ({{ $state->total }})
            </a>
        @endforeach
        </nav>
        <div class="table-responsible">
            <table class="table">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Estudiante</th>
                        <th>Libro</th>
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
                        <td>{{ $reservation->book->title }}</td>
                        <td>
                            <span class="badge badge-{{ $reservation->state->bg_color}}">
                                {{ $reservation->state->name }}
                            </span>
                        </td>
                        <td>{{ $reservation->reservated_at }}</td>
                        <td>
                            <a 
                                class="btn btn-sm btn-primary"
                                href="{{ route('reservations.edit', [$reservation->id]) }}"    
                            >
                                Editar
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $reservations->links() }}
        </div>
    </div>
@endsection