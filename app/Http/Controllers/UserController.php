<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\UserRequest;
use App\Http\Requests;
use App\User;
use App\Role;
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
        $roles = Role::orderBy('name', 'asc')->get();
        return view("admin.usuario.inserir", compact('roles'));
    }

    public function store ( UserRequest $request ) {
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);
        $user->roles()->attach($request['role_id']);
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
        $usuario->save(); 
        return redirect()->route('usuario.index')->with('success', 'Editado com sucesso!');
    }

    public function delete ( $id ) {
        $user = User::find($id);
        $user->roles()->attach();
        $user->delete();
        return redirect()->route('usuario.index');
    }

    public function messages() {
        return [
            ' name.required' => 'O campo nome é obrigatório'
        ]; 
    }

}
