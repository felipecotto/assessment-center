<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Acesso;
use Redirect;
use App\Http\Requests; 
use App\Http\Controllers\Controller;

use File;
use Validator;

class AcessoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $acesso = Acesso::all();
        return view('acesso.index')->with('acesso', $acesso); 
    }

    public function create() {
        return view('acesso.create');
    }

    public function store(Request $request) {
                $acesso = new acesso; 
                $acesso->acesso = Input::get('acesso');
                $acesso->save();
                return redirect('admin/acesso');
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
        $acesso = acesso::find($id); 
        $acesso->delete();
        return redirect('admin/acesso');
    }

    


}
