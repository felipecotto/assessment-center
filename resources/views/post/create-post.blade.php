@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Novo Documento</h2>
    <hr>
    <form action="{{ url('admin/criar-documento') }}" method="post" enctype="multipart/form-data" id="form_createdoc">
        {!! csrf_field() !!}
        
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
        <div class="row">
           <div class="form-group col-md-6">
               <label for="titulo">Título</label>
               <input name="titulo" type="text" class="form-control" id="titulo" placeholder="Ex. Mapeamenento de Perfil Psicológico" required>
           </div>
           <div class="form-group col-md-6">
               <label for="titulo">Código de Acesso</label>
               <input name="acesso" type="text" class="form-control" id="acesso" placeholder="Ex. 0039" required>
           </div>
          <div class="form-group col-md-6">
            <div class="checkbox">
              <label for="ativo">
                <input type="checkbox" class="check_d" name="ativo" id="ativo" value="1" checked="true">Ativo
              </label>
            </div>
          </div>
           <div class="form-group col-md-12">
               <label for="conteudo">Conteudo</label>
               <textarea name="conteudo" id="conteudo" cols="30" rows="10" class="form-control"></textarea>
           </div>
{{--                <div class="form-group">
               <label for="imagem">Imagem</label>
               <input type="file" id="imagem" name="imagem">
           </div> --}}
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
            $("#form_createdoc").validate({
                rules : {
                    titulo:{
                        required:true,
                        minlength:6
                    },
                    acesso:{
                        required:true,
                         minlength:4,
                         number: true
                    },
                },
                messages:{
                    titulo:{
                        required:"Por favor, informe um título",
                        minlength:"O título deve ter pelo menos 6 caracteres"
                    },
                    acesso:{
                        required:"É necessário informar um código de acesso",
                        minlength:"O código deve ter pelo menos 4 caracteres",
                        number: "Insira apenas números"
                    },
                    password:{
                        required:"A senha é obrigatória"
                    },
                    password_confirmation:{
                        required:"Por favor confirme a senha",
                        equalTo: "O campo confirmação de senha deve ser identico ao campo senha."
                        }      
                   }
            });
        });
    </script>
@endsection