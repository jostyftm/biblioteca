@extends('layouts.dashboard')

@section('header_section')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Editar prestamo</h1>
    </div>
@endsection
@section('content_main')
    <div class="bg-white p-4 rounded shadow-sm">
        <div class="row">
            <!-- StudentData -->
            <div class="col-md-4 mb-3">
                <h3>Datos del usuario</h3>
                <div class="">
                    <span>Codigo: </span>
                    <span><b>{{ $reservation->student->code }}</b></span>
                </div>
                <div class="">
                    <span>Nombre: </span>
                    <span><b>{{ $reservation->student->user->fullName }}</b></span>
                </div>
                <div class="">
                    <span>Email: </span>
                    <span><b>{{ $reservation->student->user->email }}</b></span>
                </div>
            </div>
            <!-- Book Data -->
            <div class="col-md-4 mb-3">
                <h3>Datos del libro</h3>
                <div class="">
                    <span>Codigo: </span>
                    <span><b>{{ $reservation->book->code }}</b></span>
                </div>
                <div class="">
                    <span>Titulo: </span>
                    <span><b>{{ $reservation->book->title }}</b></span>
                </div>
                <div class="">
                    <span>Editorial: </span>
                    <span><b>{{ $reservation->book->editorial }}</b></span>
                </div>
            </div>
            <!-- Reservation Data -->
            <div class="col-md-4 mb-3">
                <h3>Datos del libro</h3>
                <div class="">
                    <span>Codigo prestamo: </span>
                    <span><b>{{ $reservation->id }}</b></span>
                </div>
                <div class="">
                    <span>Fecha de prestamo: </span>
                    <span><b>{{ $reservation->reservated_at }}</b></span>
                </div>
                <div class="">
                    <form action="{{ route('reservations.update', [$reservation->id]) }}" method="POST">
                        {{ method_field('PUT') }}
                        @csrf
                        <div class="d-flex align-items-center my-2">
                            <label class="form-label">Estado: </label>
                            <select class="form-control mx-3" name="reservation_state_id">
                                @foreach($states as $key => $state)
                                    @if($key == $reservation->reservation_state_id)
                                        <option value="{{$key}}" selected>{{ $state }}</option>
                                    @else
                                        <option value="{{$key}}">{{ $state }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <button class="btn btn-primary btn-block" type="submit">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection