@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="text-center show">Visualizar todas turmas</span>
            </div>
            <table class="table table-responsive table-hover">
                <thead>
                    <tr> 
                        {{-- <th class="text-center">ID</th> --}}
                        <th>Turmas</th>
                        <th class="text-center">Início</th>
                        <th class="text-center">Término</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($turma as $key => $value)
                    <tr>
                        {{-- <th class="text-center">{!! $value->id !!}</th> --}}
                        <th>{!! $value->nome !!}</th>
                        <th class="text-center">{!! date('d/m/Y', strtotime($value->data_inicio)) !!}</th>
                        <th class="text-center">{!! date('d/m/Y', strtotime($value->data_fim)) !!}</th>
                        <th class="text-center">
                            <a href="{!! url('admin/deletar-turma/'.$value->id) !!}" class="btn btn-danger" role="button"  onclick="return confirm('Deseja realmente deletar o registro? ')">Deletar</a>
                        </th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="text-center">
            <a href="{{ url('admin/criar-turma') }}" class="btn btn-primary">Nova Turma</a>
        </div>
    </div>

    
@endsection