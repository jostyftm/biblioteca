@extends('layouts.dashboard')

@section('header_section')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Crear prestamo</h1>
    </div>
@endsection
@section('content_main')
    <div class="bg-white p-4 rounded shadow-sm">
        <form action="{{ route('reservations.store') }}" enctype="application/x-www-form-urlencoded" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Codigo estudiante</label>
                    <input 
                        type="text" 
                        name="student_code" 
                        class="form-control @error('student_code') is-invalid @enderror" 
                        value="{{ old('student_code') }}"
                    />
                    @error('student_code')
                    <div class="invalid-feedback">
                        {{ $errors->first('student_code') }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Codigo del libro</label>
                    <input 
                        type="text" 
                        name="book_code" 
                        class="form-control @error('book_code') is-invalid @enderror" 
                        value="{{ old('book_code') }}"
                    />
                    @error('book_code')
                    <div class="invalid-feedback">
                        {{ $errors->first('book_code') }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="">
                <button class="btn btn-primary" type="submit">Crear libro</button>
                <a href="{{ route('reservations.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection