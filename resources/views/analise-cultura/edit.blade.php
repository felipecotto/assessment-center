@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-offset-2 col-md-8">
				<form action="">
					<div class="row">
						<div class="form-group col-md-6">
							<label for="exampleInputEmail1">Código de Acesso</label>
							<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Ex: 8765">
						</div>
						<div class="form-group col-md-6">
							<label for="exampleInputEmail1">Cadastro de Turmas</label>
							<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Ex: TEC1234">
						</div>
						<div class="form-group col-md-6">
							<button type="submit" class="btn btn-default">Enviar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection