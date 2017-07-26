@extends('layouts.app')

@section('content')
<div class="container">
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                <a href="{{ url('/login') }}">Área Restrita</a>
                {{-- <a href="{{ url('/register') }}">Register</a> --}}
            </div>
        @endif

        <div class="content">
            <img src="{{ url('img/logott.png') }}" alt="Logo Tectrain" class="img-responsive m_0_auto">
             <div class="links">
                <a href="{{ url('instrumentos') }}" class="show">Assessment Center</a>
                <a href="{{ url('instrumentos') }}" class="btn_acessar">Acessar Instrumentos</a>
             </div>
        </div>
    </div>
</div>
@endsection
