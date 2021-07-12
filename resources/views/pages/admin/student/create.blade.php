@extends('layouts.dashboard')

@section('header_section')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Crear estudiante</h1>
        <!-- <a href="{{route('students.create')}}" class="btn btn-sm btn-primary">Nuevo estudiante</a> -->
    </div>
@endsection
@section('content_main')
    <div class="bg-white p-4 rounded shadow-sm">
        <form action="{{ route('students.store') }}" enctype="application/x-www-form-urlencoded" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-2 mb-3">
                    <label class="form-label">Codigo</label>
                    <input 
                        type="text" 
                        name="code" 
                        class="form-control @error('code') is-invalid @enderror" 
                        value="{{ old('code') }}"
                    />
                    @error('code')
                    <div class="invalid-feedback">
                        {{ $errors->first('code') }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Nombre</label>
                    <input 
                        type="text" 
                        name="name" 
                        class="form-control @error('name') is-invalid @enderror" 
                        value="{{ old('name') }}"
                    />
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Apellidos</label>
                    <input 
                        type="text" 
                        name="last_name" 
                        class="form-control @error('last_name') is-invalid @enderror" 
                        value="{{ old('last_name') }}"
                    />
                    @error('last_name')
                    <div class="invalid-feedback">
                        {{ $errors->first('last_name') }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-2 mb-3">
                    <label class="form-label">Edad</label>
                    <input 
                        type="text" 
                        name="age" 
                        class="form-control @error('age') is-invalid @enderror" 
                        value="{{ old('age') }}"
                    />
                    @error('age')
                    <div class="invalid-feedback">
                        {{ $errors->first('age') }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Correo electróico</label>
                    <input 
                        type="email" 
                        name="email" 
                        class="form-control @error('email') is-invalid @enderror" 
                        value="{{ old('email') }}"
                    />
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="">
                <button class="btn btn-primary" type="submit">Crear estudiante</button>
                <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection