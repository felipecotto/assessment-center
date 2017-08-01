<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\UserRequest;
use App\Http\Requests;
use App\User;
use Alert; 

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $usuarios = User::paginate(env('LIMITE_PAGINAS'));
        return view("admin.usuario.listagem", [ "usuarios" => $usuarios]);
    }

    public function create () {
        return view("admin.usuario.inserir");
    }

    public function store ( UserRequest $request ) {
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);
        return redirect()->route('usuario.index');
    }

    public function edit ( $id ) {
        $usuario = User::find($id);
        return view('admin.usuario.editar')->with('usuario', $usuario);
    }

    public function update ( Request $request, $id ) {
        $usuario = User::find($id); 
        $usuario->name = $request->name; 
        $usuario->email = $request->email; 
        $usuario->password = bcrypt($request->password); 
        // $usuario->remember_token = bcrypt($request->remember_token); 
        $usuario->save(); 
        return redirect()->route('usuario.index')->with('success', 'Editado com sucesso!');
    }

    public function delete ( $id ) {
        User::find($id)->delete();
        return redirect()->route('usuario.index');
    }

    public function messages() {
        return [
            ' name.required' => 'O campo nome é obrigatório'
        ]; 
    }

}
