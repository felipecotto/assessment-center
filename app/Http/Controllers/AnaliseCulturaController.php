<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Response;
use App\Turma;
use Redirect;
use App\Http\Requests; 
use App\Http\Controllers\Controller;

use File;
use Mail;
use Validator;
use Carbon\Carbon; 
use DateTime;

class AnaliseCulturaController extends Controller
{
    // public function index()
    // {
    //     $turmas = turma::all();
    //     return view('analise-cultura.create')->with('turmas', $turmas); 
    // }

    public function attemptLogin()
    {
        $code = request()->get('acesso');
        $auth = Acessos::whereAcesso($code)->firstOrFail();
       
       return view('post.show-post')->with('post',$auth);
        // $posts = Posts::all();
        // return view('post.index-post')->with('posts', $posts); 
    }

    public function index()
    {

        $now = new \DateTime();
        // $turmas = turma::all();
        $turmas = turma::whereDate('data_fim', '>=',  $now)->whereDate('data_inicio', '<=',  $now)->get();
        return view('analise-cultura.create')->with('turmas', $turmas); 
    }

    public function create() {
        return view('analise-cultura.creat');
    }

    public function store(Request $request) {
        $response = new Response; 
        $response->full_name = Input::get('full_name');
        $response->class = Input::get('class');
        $response->email = Input::get('email');
        $response->{'1_A_1'} = Input::get('1_A_1');
        $response->{'1_A_2'} = Input::get('1_A_2');
        $response->{'1_B_1'} = Input::get('1_B_1');
        $response->{'1_B_2'} = Input::get('1_B_2');
        $response->{'1_C_1'} = Input::get('1_C_1');
        $response->{'1_C_2'} = Input::get('1_C_2');
        $response->{'1_D_1'} = Input::get('1_D_1');
        $response->{'1_D_2'} = Input::get('1_D_2');
        $response->{'2_A_1'} = Input::get('2_A_1');
        $response->{'2_A_2'} = Input::get('2_A_2');
        $response->{'2_B_1'} = Input::get('2_B_1');
        $response->{'2_B_2'} = Input::get('2_B_2');
        $response->{'2_C_1'} = Input::get('2_C_1');
        $response->{'2_C_2'} = Input::get('2_C_2');
        $response->{'2_D_1'} = Input::get('2_D_1');
        $response->{'2_D_2'} = Input::get('2_D_2');
        $response->{'3_A_1'} = Input::get('3_A_1');
        $response->{'3_A_2'} = Input::get('3_A_2');
        $response->{'3_B_1'} = Input::get('3_B_1');
        $response->{'3_B_2'} = Input::get('3_B_2');
        $response->{'3_C_1'} = Input::get('3_C_1');
        $response->{'3_C_2'} = Input::get('3_C_2');
        $response->{'3_D_1'} = Input::get('3_D_1');
        $response->{'3_D_2'} = Input::get('3_D_2');
        $response->{'4_A_1'} = Input::get('4_A_1');
        $response->{'4_A_2'} = Input::get('4_A_2');
        $response->{'4_B_1'} = Input::get('4_B_1');
        $response->{'4_B_2'} = Input::get('4_B_2');
        $response->{'4_C_1'} = Input::get('4_C_1');
        $response->{'4_C_2'} = Input::get('4_C_2');
        $response->{'4_D_1'} = Input::get('4_D_1');
        $response->{'4_D_2'} = Input::get('4_D_2');
        $response->{'5_A_1'} = Input::get('5_A_1');
        $response->{'5_A_2'} = Input::get('5_A_2');
        $response->{'5_B_1'} = Input::get('5_B_1');
        $response->{'5_B_2'} = Input::get('5_B_2');
        $response->{'5_C_1'} = Input::get('5_C_1');
        $response->{'5_C_2'} = Input::get('5_C_2');
        $response->{'5_D_1'} = Input::get('5_D_1');
        $response->{'5_D_2'} = Input::get('5_D_2');
        $response->{'6_A_1'} = Input::get('6_A_1');
        $response->{'6_A_2'} = Input::get('6_A_2');
        $response->{'6_B_1'} = Input::get('6_B_1');
        $response->{'6_B_2'} = Input::get('6_B_2');
        $response->{'6_C_1'} = Input::get('6_C_1');
        $response->{'6_C_2'} = Input::get('6_C_2');
        $response->{'6_D_1'} = Input::get('6_D_1');
        $response->{'6_D_2'} = Input::get('6_D_2');
        $response->hash = md5($response->id . date('YmdHis') . str_random(20));
        $response->save();

        $this->sendEmail($response->email, $response->full_name, $response->hash);

        $atual_a = $response->{'1_A_1'} + $response->{'2_A_1'} + $response->{'3_A_1'} + $response->{'4_A_1'} +
        $response->{'5_A_1'} + $response->{'6_A_1'};  
         +
        $atual_b = $response->{'1_B_1'} + $response->{'2_B_1'} + $response->{'3_B_1'} + $response->{'4_B_1'} +
        $response->{'5_B_1'} + $response->{'6_B_1'};
         +
        $atual_c = $response->{'1_C_1'} + $response->{'2_C_1'} + $response->{'3_C_1'} + $response->{'4_C_1'} +
        $response->{'5_C_1'} + $response->{'6_C_1'};
         +
        $atual_d = $response->{'1_D_1'} + $response->{'2_D_1'} + $response->{'3_D_1'} + $response->{'4_D_1'} +
        $response->{'5_D_1'} + $response->{'6_D_1'};
         +
        $preferida_a = $response->{'1_A_2'} + $response->{'2_A_2'} + $response->{'3_A_2'} + $response->{'4_A_2'} +
        $response->{'5_A_2'} + $response->{'6_A_2'};  
         +
        $preferida_b = $response->{'1_B_2'} + $response->{'2_B_2'} + $response->{'3_B_2'} + $response->{'4_B_2'} +
        $response->{'5_B_2'} + $response->{'6_B_2'};
         +
        $preferida_c = $response->{'1_C_2'} + $response->{'2_C_2'} + $response->{'3_C_2'} + $response->{'4_C_2'} +
        $response->{'5_C_2'} + $response->{'6_C_2'};
         +
        $preferida_d = $response->{'1_D_2'} + $response->{'2_D_2'} + $response->{'3_D_2'} + $response->{'4_D_2'} +
        $response->{'5_D_2'} + $response->{'6_D_2'};
        
        return view('analise-cultura.results_final')
            ->with([
                'response'=>$response, 
                'atual_a'=>$atual_a, 
                'atual_b'=>$atual_b, 
                'atual_c'=>$atual_c, 
                'atual_d'=>$atual_d,
                'preferida_a'=>$preferida_a, 
                'preferida_b'=>$preferida_b, 
                'preferida_c'=>$preferida_c, 
                'preferida_d'=>$preferida_d
            ]); 

        // return redirect('finalizada');
    }

    public function edit() {
        return view('analise-cultura.edit');
    }

    public function sendEmail($email, $name, $hash)
    {
        $url = route('show.results', $hash);

        Mail::send('emails.results', ['url' => $url, 'name' => $name], function ($m) use ($email, $name) {
            $m->from('hello@app.com', 'Your Application');

            $m->to($email, $name)->subject('Veja seu resultado!');
        });

    }

    public function showResults($hash)
    {
        $response = Response::findByHash($hash);
        if(is_null($response))
            return 'Não foi encontrado.';

        $atual_a = $response->{'1_A_1'} + $response->{'2_A_1'} + $response->{'3_A_1'} + $response->{'4_A_1'} +
        $response->{'5_A_1'} + $response->{'6_A_1'};  

        $atual_b = $response->{'1_B_1'} + $response->{'2_B_1'} + $response->{'3_B_1'} + $response->{'4_B_1'} +
        $response->{'5_B_1'} + $response->{'6_B_1'};

        $atual_c = $response->{'1_C_1'} + $response->{'2_C_1'} + $response->{'3_C_1'} + $response->{'4_C_1'} +
        $response->{'5_C_1'} + $response->{'6_C_1'};

        $atual_d = $response->{'1_D_1'} + $response->{'2_D_1'} + $response->{'3_D_1'} + $response->{'4_D_1'} +
        $response->{'5_D_1'} + $response->{'6_D_1'};

        $preferida_a = $response->{'1_A_2'} + $response->{'2_A_2'} + $response->{'3_A_2'} + $response->{'4_A_2'} +
        $response->{'5_A_2'} + $response->{'6_A_2'};  

        $preferida_b = $response->{'1_B_2'} + $response->{'2_B_2'} + $response->{'3_B_2'} + $response->{'4_B_2'} +
        $response->{'5_B_2'} + $response->{'6_B_2'};

        $preferida_c = $response->{'1_C_2'} + $response->{'2_C_2'} + $response->{'3_C_2'} + $response->{'4_C_2'} +
        $response->{'5_C_2'} + $response->{'6_C_2'};

        $preferida_d = $response->{'1_D_2'} + $response->{'2_D_2'} + $response->{'3_D_2'} + $response->{'4_D_2'} +
        $response->{'5_D_2'} + $response->{'6_D_2'};
        
        return view ('analise-cultura.results_final')
            ->with([
                'response' => $response, 
                'atual_a' => $atual_a, 
                'atual_b' => $atual_b, 
                'atual_c' => $atual_c, 
                'atual_d' => $atual_d,
                'preferida_a' => $preferida_a, 
                'preferida_b' => $preferida_b, 
                'preferida_c' => $preferida_c, 
                'preferida_d' => $preferida_d
        ]); 
    }
}
