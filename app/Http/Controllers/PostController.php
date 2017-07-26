<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Posts;
use Redirect;
use App\Http\Requests; 
use App\Http\Controllers\Controller;

use File;
use Validator;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $posts = Posts::all();
        return view('post.index-post')->with('posts', $posts); 
    }


    public function create() {
        return view('post.creat-post');
    }

    public function store(Request $request) {
                $mensagens = [
                    'titulo.required' => "Você não cadastrou um Titulo.",
                    'conteudo.required' => "Você não cadastrou um Conteúdo.",
                    'acesso.required' => "Você não cadastrou um Código de Acesso.",
                ];

                $validator = validator::make(Input::all(),[
                        'titulo'=>"required",
                        'conteudo'=>"required",
                        'acesso'=>"required",
                    ]);

                if($validator->fails()){
                    return back()->withErrors($validator);
                }

                if(Input::file('imagem')){
                    $imagem = (Input::file('imagem'));
                    $extensao = $imagem->getClientOriginalExtension();
                    if($extensao != 'jpg'  && $extensao != 'png') {
                        return back()->with('erro', 'Erro: Este arquivo não é uma imagem');
                    }
                }
                $post = new Posts; 
                $post->titulo = Input::get('titulo');
                $post->conteudo = Input::get('conteudo');
                $post->acesso = Input::get('acesso');
                $post->ativo = Input::get('ativo');
                $post->imagem = "";
                $post->save();
                if(Input::file('imagem')){
                    File::move($imagem,public_path().'/imagem-post/post-id'.$post->id.'.'.$extensao);
                    $post->imagem = '/imagem-post/post-id'.$post->id.'.'.$extensao;
                    $post->save();
                }
                return redirect('admin/lista-documento');
            }

            public function edit($id) {
                $post = Posts::find($id); 
                return view('post.edit-post')->with('post',$post);
            }

            public function update(Request $request, $id) {
                $post = Posts::find($id); 

                if(Input::file('imagem')){
                    $imagem = (Input::file('imagem'));
                    $extensao = $imagem->getClientOriginalExtension();
                    if($extensao != 'jpg'  && $extensao != 'png') {
                        return back()->with('erro', 'Erro: Este arquivo não é uma imagem');
                    }
                }

                if($post->titulo!=Input::get('titulo')) {
                    $post->titulo = Input::get('titulo');
                }

                if($post->conteudo!=Input::get('conteudo')) {
                    $post->conteudo = Input::get('conteudo');
                }

                if($post->acesso!=Input::get('acesso')) {
                    $post->acesso = Input::get('acesso');
                }

                $post->save();

                if(Input::file('imagem')){
                    File::delete(public_path().$post->imagem);
                    File::move($imagem,public_path().'/imagem-post/post-id'.$post->id.'.'.$extensao);
                    $post->imagem = '/imagem-post/post-id'.$post->id.'.'.$extensao;
                    $post->save();
                }

                return redirect('admin/lista-documento');
    }

    public function destroy($id) {
        $post = Posts::find($id); 
        File::delete(public_path().$post->imagem);
        $post->delete();
        return redirect('admin/lista-documento');
    }

    


}
