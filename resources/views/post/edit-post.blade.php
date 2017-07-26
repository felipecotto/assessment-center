@extends('layouts.app')

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">Editar documento</div>
        <div class="panel-body">
        	<form action="{{ url('admin/editar-documento/'.$post->id) }}" method="post" enctype="multipart/form-data">
        	    {!! csrf_field() !!}
        	    @if (session('erro'))
        	        <div class="alert alert-danger">
        	            {{ session('erro') }}
        	        </div>
        	    @endif
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="titulo">Titulo</label>
                        <input name="titulo" type="text" class="form-control" id="titulo" placeholder="Titulo" value="{!! $post->titulo !!}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="titulo">Código de Acesso</label>
                        <input name="acesso" type="text" class="form-control" id="acesso" placeholder="Código de Acesso" value="{!! $post->acesso !!}">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="conteudo">Conteudo</label>
                        <textarea name="conteudo" id="conteudo" cols="30" rows="10" class="form-control">
                            {!! $post->conteudo !!}
                        </textarea>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-default">Salvar Alteração</button>
                    </div>
                </div>

    {{--             <div class="form-group">
                    <label for="imagem">Imagem</label>
                    <input type="file" id="imagem" name="imagem">
                </div> --}}
            
            </form>
        </div>
    </div>
</div>
@endsection