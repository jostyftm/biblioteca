@extends('layouts.dashboard')

@section('header_section')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Crear libro</h1>
    </div>
@endsection
@section('content_main')
    <div class="bg-white p-4 rounded shadow-sm">
        <form action="{{ route('books.store') }}" enctype="application/x-www-form-urlencoded" method="POST">
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
                    <label class="form-label">Titulo</label>
                    <input 
                        type="text" 
                        name="title" 
                        class="form-control @error('title') is-invalid @enderror" 
                        value="{{ old('title') }}"
                    />
                    @error('title')
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Editorial</label>
                    <input 
                        type="text" 
                        name="editorial" 
                        class="form-control @error('editorial') is-invalid @enderror" 
                        value="{{ old('editorial') }}"
                    />
                    @error('editorial')
                    <div class="invalid-feedback">
                        {{ $errors->first('editorial') }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-2 mb-3">
                    <label class="form-label">Copias</label>
                    <input 
                        type="text" 
                        name="copies" 
                        class="form-control @error('copies') is-invalid @enderror" 
                        value="{{ old('copies') }}"
                    />
                    @error('copies')
                    <div class="invalid-feedback">
                        {{ $errors->first('copies') }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Descripción</label>
                    <textarea 
                        type="description" 
                        name="description" 
                        class="form-control @error('description') is-invalid @enderror" 
                        value="{{ old('description') }}"
                    ></textarea>
                    @error('description')
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="">
                <button class="btn btn-primary" type="submit">Crear libro</button>
                <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection