@extends('layouts.app')

@section('content')
<div class="container">
	<img src="{{ url('img/logott.png') }}" alt="Logo Tectrain" class="img-responsive m_0_auto p_t_50">
	<div class="page-header">
		<h1>Instrumentos</h1>
	</div>
	<div class="row">
		@foreach ($posts as $key => $value)
		<div class="col-md-3 d_inativo">
			<div class="thumbnail thumbnail_height trans_3">
				<div class="caption text-center trans_3">
					<h3 class="m_b_25">{!! $value->titulo !!}</h3>
					<a href="{!! url('visualizar-documento/'.$value->id) !!}" class="btn_acessar" role="button">Visualizar</a>
				</div>
			</div>
		</div>
		@endforeach
	</div>	
</div>
@endsection