@extends('layouts.app')

@section('content')

    <div class="container">
    {{-- @include('flash::message') --}}
        <div class="row">
            <div class="col-md-7">
                <h2>Usuários / Editar</h2>
            </div>
            <div class="md-3 text-right">
                <a href="<?=route('usuario.delete', ['id' =>  $usuario->id]);?>">
                    <button type="button" class="btn btn-danger btn-sm confirm" onclick="return confirm('Deseja realmente deletar o Usuário? ')">
                        <span class="glyphicon glyphicon-remove " aria-hidden="true"></span> Deletar
                    </button>
                </a>
            </div>
        </div>
        <hr>
            <div class="row">

            <div style="clear:both; height: 25px"></div>

            @if ($errors->any())
                <ul class="alert alert-warning">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
            </ul>
            @endif

            <form name="frm" action="{{ route("usuario.update", ["id"=> $usuario->id ])}}" method="POST" >
                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                {{-- {{ csrf_field() }} --}}
                {{ method_field(is_null($usuario->id) ? 'POST' : 'PUT') }}

                <div class="form-group">

                    <label for="name" class="col-sm-2 control-label">Nome:</label>

                    <div class="col-sm-10">
                        <input name="name" type="text" value="{{ $usuario->name }}" class="form-control"/>
                    </div>

                </div>

                <div style="clear: both; height: 25px;"></div>

                <div class="form-group">

                    <label for="email" class="col-sm-2 control-label">E-mail:</label>

                    <div class="col-sm-10">
                        <input name="email" type="email" value="{{ $usuario->email }}" class="form-control"/>
                    </div>

                </div>

                <div style="clear: both; height: 25px;"></div>

                <div class="form-group">

                    <label for="password" class="col-sm-2 control-label">Senha:</label>

                    <div class="col-sm-10">
                        <input name="password" type="password" value="" class="form-control" />
                    </div>

                </div>

                <div style="clear: both; height: 25px;"></div>

                <div class="form-group">

                    <label for="passwordc" class="col-sm-2 control-label">Confirme a senha:</label>

                    <div class="col-sm-10">
                        <input name="remember_token" type="password" value="" class="form-control" />
                    </div>

                </div>
                
                <div style="clear: both; height: 25px;"></div>

                <div class="form-group">

                    <div class="col-sm-10  col-md-offset-2">

                        <button type="submit"  class="btn btn-primary">Salvar</button>

                        <a href="javascript:history.back(1)">
                            <button type="button" class="btn btn-default">Voltar</button>
                        </a>

                    </div>

                </div>

            </form>

        </div>

    </div>
@endsection