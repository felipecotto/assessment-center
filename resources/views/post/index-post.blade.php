@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="text-center show">Lista de documentos</span>
            </div>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr> 
                        {{-- <th class="text-center">ID</th> --}}
                        <th>Nome</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        {{-- <th class="text-center">{!! $value->id !!}</th> --}}
                        <th>Instrumento de Análise da Cultura Organizacional</th>
                        <th class="text-center">
                            <a href="{{ url('analise') }}" class="btn btn-success" role="button">Visualizar</a>
                            <a href="{{ url('admin/turma') }}" class="btn btn-primary" role="button">Turmas</a>
                            <a href="{{ url('admin/respostas') }}" class="btn btn-warning" role="button">Respostas</a>
                            {{-- <a href="" class="btn btn-danger" role="button"  onclick="return confirm('Deseja realmente deletar o registro? ')">Deletar</a> --}}
                        </th>
                    </tr>
                </tbody>
            </table>
            {{-- <span class="">{!! $value->created_at->diffForHumans() !!}</span> --}}
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="text-center show">Google Docs</span>
            </div>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr> 
                        {{-- <th class="text-center">ID</th> --}}
                        <th>Nome</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($posts as $key => $value)
                    <tr>
                        {{-- <th class="text-center">{!! $value->id !!}</th> --}}
                        <th>{!! $value->titulo !!}</th>
                        <th class="text-center">
                            <a href="{!! url('visualizar-documento/'.$value->id) !!}" class="btn btn-success" role="button">Visualizar</a>
                            <a href="{!! url('admin/editar-documento/'.$value->id) !!}" class="btn btn-primary" role="button">Editar</a>
                            {{-- <a href="{{ url('admin/respostas') }}" class="btn btn-warning" role="button">Respostas</a> --}}
                            <a href="{!! url('admin/deletar-documento/'.$value->id) !!}" class="btn btn-danger" role="button"  onclick="return confirm('Deseja realmente deletar o registro? ')">Deletar</a>
                        </th>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{-- <span class="">{!! $value->created_at->diffForHumans() !!}</span> --}}
        </div>
    </div>
@endsection