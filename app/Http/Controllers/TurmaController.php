<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Turma;
use Redirect;
use App\Http\Requests; 
use App\Http\Controllers\Controller;

use Auth;
use File;
use Validator;

class TurmaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $turma = Turma::all();
        return view('turma.index')->with('turma', $turma); 
    }

    public function create() {
        return view('turma.create');
    }

    public function store(Request $request) {
        $turma = new turma; 
        $turma->nome = Input::get('nome');
        $turma->data_inicio = Input::get('data_inicio');
        $turma->data_fim = Input::get('data_fim');
        $turma->user_id = Auth::user()->id;
        $turma->save();
        return redirect('admin/turma');
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
        $turma = turma::find($id); 
        $turma->delete();
        return redirect('admin/turma');
    }

    


}
