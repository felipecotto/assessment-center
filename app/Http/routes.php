<?php

use App\Posts;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('visualizar-documento/{id}','ViewController@show');
Route::get('instrumentos','SiteThumbController@index');

Route::get('analise','AnaliseCulturaController@index');
Route::post('nova-analise', 'AnaliseCulturaController@create');
Route::post('nova-analise', 'AnaliseCulturaController@store');

Route::post('validar-user', 'ViewController@attemptLogin');

Route::get('/finalizada', function(){
    return view('site.finish'); 
});

Route::group(['middleware' => ['web']], function () {
 
	Route::get('/', function () {
	    return view('welcome');
	});

});
 
Route::group(['middleware' => 'web', 'prefix' => 'admin' ], function () {
    
    Route::auth();

    Route::get('criar-documento',function () {
           return view('post.create-post');
    });

    Route::post('criar-documento', 'PostController@create');
    Route::post('criar-documento', 'PostController@store');
    Route::get('lista-documento', 'PostController@index');
    Route::get('editar-documento/{id}','PostController@edit');
    Route::post('editar-documento/{id}','PostController@update');
    Route::get('deletar-documento/{id}','PostController@destroy');

    Route::get('respostas', 'ResultsController@index');
    Route::get('verresultados/{id}', 'ResultsController@verresultado');

    // $route['verresultados_ids'] = 'home/verresultados_ids';
    
    Route::get('register',function () {
           return view('welcome');
    });
    
    Route::get('/home', [ 'uses' => 'HomeController@index', 'as' => 'dashboard']);

    Route::group(['prefix'=> 'usuarios', 'where'=>['id'=>'[0-9]+'] ], function () {
    
        Route::get('', [ 'uses' => 'UserController@index', 'as' => 'usuario.index']);
        Route::get('inserir', ['uses'=> 'UserController@create' , 'as' => 'usuario.create']);
        Route::post('inserir', ['uses'=> 'UserController@store' , 'as' => 'usuario.store']);
        Route::get('editar/{id}', ['uses'=> 'UserController@edit' , 'as' => 'usuario.edit']);
        Route::put('editar/{id}', ['uses'=> 'UserController@update' , 'as' => 'usuario.update']);
        Route::get('deletar/{id}', ['uses'=> 'UserController@delete' , 'as' => 'usuario.delete']);
    
    });

});