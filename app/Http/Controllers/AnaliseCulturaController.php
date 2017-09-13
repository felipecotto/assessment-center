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
        $response->save();
        return redirect('finalizada');
    }

    public function edit() {
        return view('analise-cultura.edit');
    }


}
