@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Acessar Conteúdo</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('validar-user') }}">
                     {{ csrf_field() }}
                        @if (session('erro'))
                            <div class="alert alert-danger">
                                {{ session('erro') }}
                            </div>
                        @endif

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li> {{$error}} </li>
                                    @endforeach
                                </ul>
                                {{ session('erro') }}
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="acesso" class="col-md-4 control-label">Insira seu Código
                                </label>
                            <div class="col-md-6">
                                <input id="acesso" type="text" class="form-control" name="acesso" value="" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Acesssar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
