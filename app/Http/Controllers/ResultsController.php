<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Response;
use Redirect;
use App\Http\Requests; 
use App\Http\Controllers\Controller;

use File;
use Validator;

class ResultsController extends Controller
{
    public function index()
    {
        return view('analise-cultura.results'); 
    }

}
