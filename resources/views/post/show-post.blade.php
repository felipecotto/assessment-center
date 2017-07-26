@section('title', $post->titulo)
@extends('layouts.app')

@section('content')
    <div class="container">
    	{{-- <img src="{{ url('img/logott.png') }}" alt="Logo Tectrain" class="img-responsive m_0_auto p_t_50 p_b_30"> --}}
		<div class="panel panel-default">
			<div class="panel-heading">
				<span class="text-center show">{!! $post->titulo !!}</span>
			</div>
			<div class="panel-body">
				<p>{!! $post->conteudo !!}</p>
			</div>
		</div>
    </div>
@endsection