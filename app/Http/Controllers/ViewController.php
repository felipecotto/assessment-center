<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\Middleware\Custom;
use App\Http\Controllers\view;
use Redirect;
use App\Http\Requests; 
use App\Http\Controllers\Controller;
use IlluminateDatabaseEloquentModelNotFoundException;

class ViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function show($id) { 

        if(!auth()->check())
            return view ('auth.validar-user');
        $post = Posts::find($id);
        return view('post.show-post')->with('post',$post);
    }

    public function attemptLogin()
    {
        $code = request()->get('acesso');
        $auth = Posts::whereAcesso($code)->firstOrFail();
       
       return view('post.show-post')->with('post',$auth);
        // $posts = Posts::all();
        // return view('post.index-post')->with('posts', $posts); 
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
