@extends('layouts.app')

@section('content')
	<div class="container">
		<h3>Editar Acesso</h3>
	   <form action="{{ url('admin/criar-acesso') }}" method="post" enctype="multipart/form-data" id="form_creatacesso">
	    	{!! csrf_field() !!}
	    	<div class="row">
		    	<div class="form-group col-md-6">
					<label for="usr">Acesso</label>
					<input type="text" class="form-control" name="acesso" id="acesso" placeholder="Ex: 3456">
		    	</div>
		    	<div class="form-group col-md-12">
					<button type="submit" class="btn btn-default">Salvar</button>
				</div>
	    	</div>
		</form>
	</div>
@endsection

@section('scripts')
	<script>
	    $(function(){
	        $("#form_creatacesso").validate({
	            rules : {
	                nome:{
	                    required:true,
	                    minlength: 4
	                }
	            },
	            messages:{
	                nome:{
	                    required:"Por favor, informe o acesso",
	                    minlength:"o acesso deve ter pelo menos 4 caracteres"
	                }    
	               }
	        });
	    });
	</script>
@endsection