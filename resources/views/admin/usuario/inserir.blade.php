@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <h2>Usuários / Inserir</h2>
                 <hr>
            </div>
           
            <div style="clear:both; height: 25px"></div>

            @if ($errors->any())
                <ul class="alert alert-warning">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form name="frm" action="{{ route("usuario.store")}}" method="post" id="form_newuser">

                {{ csrf_field() }}

                <div class="form-group">

                    <label for="name" class="col-sm-2 control-label">Nome:</label>

                    <div class="col-sm-10">
                        <input name="name" type="text" value="" class="form-control" required/>
                    </div>

                </div>

                <div style="clear: both; height: 25px;"></div>

                <div class="form-group">

                    <label for="email" class="col-sm-2 control-label">E-mail:</label>

                    <div class="col-sm-10">
                        <input name="email" type="email" value="" class="form-control" required />
                    </div>

                </div>


                <div style="clear: both; height: 25px;"></div>

                <div class="form-group">

                    <label for="password" class="col-sm-2 control-label">Senha:</label>

                    <div class="col-sm-10">
                        <input name="password" id="password" type="password" value="" class="form-control" required />
                    </div>

                </div>


                <div style="clear: both; height: 25px;"></div>

                <div class="form-group">

                    <label for="passwordc" class="col-sm-2 control-label">Confirme a senha:</label>

                    <div class="col-sm-10">
                        <input name="password_confirmation" id="password_confirmation" type="password" value="" class="form-control" required />
                    </div>

                </div>

                <div style="clear: both; height: 25px;"></div>

                <div class="form-group">

                    <div class="col-sm-10  col-md-offset-2">

                        <button type="submit"  class="btn btn-primary">Salvar</button>

                        <a href="javascript:history.back(-1)">
                            <button type="button" class="btn btn-default">Voltar</button>
                        </a>

                    </div>


                </div>

            </form>

        </div>

    </div>
@endsection

@section('scripts')
    <script>
        $(function(){
            $("#form_newuser").validate({
                rules : {
                    name:{
                        required:true,
                        minlength:3
                    },
                    email:{
                        required:true
                    },
                    password:{
                        required:true
                    },
                    password_confirmation:{
                        required:true,
                        equalTo: "#password"
                    },

                },
                messages:{
                    name:{
                        required:"Por favor, informe seu nome",
                        minlength:"O nome deve ter pelo menos 3 caracteres"
                    },
                    email:{
                        required:"É necessário informar um email"
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