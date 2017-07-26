@extends('layouts.app')
 
@section('content')
 
<div class="container">
    <div class="row">
        <div class="col-lg-10">
            <h2>Usuários</h2>
            <hr>
        </div>
        
        <div class="col-lg-2">
            <BR>
            <a href="{{ route('usuario.create') }}" class="btn btn-default btn-success">Novo Usuário</a>
        </div>

        <div style="clear:both; height: 25px"></div>
            <table class="table table-striped">
                <thead>
                    <td>Nome</td>
                    <td>E-mail</td>
                    <td width="7%" class="text-center">Ação</td>
                </thead>
                @foreach ($usuarios as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="<?=route('usuario.edit', ['id' => $user->id]);?>">
                            <button type="button" class="btn btn-sm btn-primary">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar
                            </button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </table>

        {!! $usuarios->links() !!}

    </div>

</div>
 
@endsection



