@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            <div>
                <nav class="nav flex-column nav-pills">
                    <a class="nav-link {{ request()->is('panel') ? 'active' : '' }}" href="{{route('dashboard.index')}}">Inicio</a>
                    <a class="nav-link {{ activeMenu('students') }}" href="{{route('students.index')}}">Estudiantes</a>
                    <a class="nav-link {{ activeMenu('books') }}" href="{{route('books.index')}}">Libros</a>
                    <a class="nav-link {{ activeMenu('reservations') }}" href="{{route('reservations.index')}}">Prestamos</a>
                </nav>
            </div>
        </div>
        <div class="col-md-10">
           <div>
               @yield('header_section')
           </div> 
            @include('components.flash-messages')
            @yield('content_main')
        </div>
    </div>
</div>
@endsection