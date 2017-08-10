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
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
		$response = response::all();
        return view('analise-cultura.results')->with('response', $response); 
    }

    	public function verresultado($id)
    	{
    		$response = response::find($id); 

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
    		
    		return view ('analise-cultura.results_final')->with(array
			('response'=>$response, 'atual_a'=>$atual_a, 'atual_b'=>$atual_b, 'atual_c'=>$atual_c, 'atual_d'=>$atual_d,
			'preferida_a'=>$preferida_a, 'preferida_b'=>$preferida_b, 'preferida_c'=>$preferida_c, 'preferida_d'=>$preferida_d, 	)); 
    	}

        public function verresultados_ids()
        {
            
            $ids = 'ids';
            $data = $this->response->by_ids($ids);

            $atual_a = $data->{'1_A_1'} + $data->{'2_A_1'} + $data->{'3_A_1'} + $data->{'4_A_1'} +
            $data->{'5_A_1'} + $data->{'6_A_1'};  

            $atual_b = $data->{'1_B_1'} + $data->{'2_B_1'} + $data->{'3_B_1'} + $data->{'4_B_1'} +
            $data->{'5_B_1'} + $data->{'6_B_1'};

            $atual_c = $data->{'1_C_1'} + $data->{'2_C_1'} + $data->{'3_C_1'} + $data->{'4_C_1'} +
            $data->{'5_C_1'} + $data->{'6_C_1'};

            $atual_d = $data->{'1_D_1'} + $data->{'2_D_1'} + $data->{'3_D_1'} + $data->{'4_D_1'} +
            $data->{'5_D_1'} + $data->{'6_D_1'};

            $preferida_a = $data->{'1_A_2'} + $data->{'2_A_2'} + $data->{'3_A_2'} + $data->{'4_A_2'} +
            $data->{'5_A_2'} + $data->{'6_A_2'};  

            $preferida_b = $data->{'1_B_2'} + $data->{'2_B_2'} + $data->{'3_B_2'} + $data->{'4_B_2'} +
            $data->{'5_B_2'} + $data->{'6_B_2'};

            $preferida_c = $data->{'1_C_2'} + $data->{'2_C_2'} + $data->{'3_C_2'} + $data->{'4_C_2'} +
            $data->{'5_C_2'} + $data->{'6_C_2'};

            $preferida_d = $data->{'1_D_2'} + $data->{'2_D_2'} + $data->{'3_D_2'} + $data->{'4_D_2'} +
            $data->{'5_D_2'} + $data->{'6_D_2'};


             $html = ' 
            <div class="row">
            <div class="col-lg-2 col-md-2"></div>
            <div class="col-lg-8 col-md-8">
                <h3>Pontuação</h3>
                <table width="100%" class="table">
                    <tr style="font-weight:bold;">
                         <td width="40%" align="left">Dimensão</td>
                         <td width="25%" align="center">Atual</td>
                         <td width="25%" align="center">Preferida</td>
                    </tr>
                    <tr>
                         <td width="10%" align="left">A (Clã)</td>
                         <td width="10%" align="center">'.round($atual_a/6).'%</td>
                         <td width="10%" align="center">'.round($preferida_a/6).'%</td>
                    </tr>
                    <tr>
                         <td width="10%" align="left">B (Adocracia)</td>
                         <td width="10%" align="center">'.round($atual_b/6).'%</td>
                         <td width="10%" align="center">'.round($preferida_b/6).'%</td>

                    </tr>
                    <tr>
                         <td width="10%" align="left">C (Mercado)</td>
                         <td width="10%" align="center">'.round($atual_c/6).'%</td>
                         <td width="10%" align="center">'.round($preferida_c/6).'%</td>
                    </tr>
                    <tr>
                         <td width="10%" align="left">D (Hierárquica)</td>
                         <td width="10%" align="center">'.round($atual_d/6).'%</td>
                         <td width="10%" align="center">'.round($preferida_d/6).'%</td>
                    </tr>
                   
                </table>
            </div>
            <div class="col-lg-2 col-md-2"></div>
            </div>';

                echo json_encode(array('html'=>$html,'atual'=>round($atual_a/6).",".round($atual_b/6).",".round($atual_c/6).",".round($atual_d/6),
                    'preferida'=>round($preferida_a/6).",".round($preferida_b/6).",".round($preferida_c/6).",".round($preferida_d/6)));
        }

        public function geraPDF(){
            $html = $this->load->view('resultado_pdf', $data, true);

            // instantiate and use the dompdf class
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html);

            $context = stream_context_create(array(
              'ssl' => array(
              'verify_peer' => FALSE, 
              'verify_peer_name' => FALSE,
              'allow_self_signed'=> TRUE,
              'dpi' => 300,
                'fontHeightRatio' => 1.2,
                'isPhpEnabled' => true,
                'isRemoteEnabled' => TRUE,
                'isJavascriptEnabled' => true,
                'isHtml5ParserEnabled' => true,
                'isFontSubsettingEnabled' => true,
              )
          ));
          
            $dompdf->setHttpContext($context);

            // (Optional) Setup the paper size and orientation
            $dompdf->setPaper('A4', 'landscape');

            // Render the HTML as PDF
            $dompdf->render();

            // Output the generated PDF to Browser
            //$dompdf->stream();
        }

    	public function resultado()
    	{
    		$post = $this->input->post();
            $data['email'] = $post['email'];
            $data['full_name'] = $post['full_name'];
            $data['class'] = $post['class'];

    		// Verifica se o email já respondeu
    		if(!empty($post['email']) && !$this->m_respostas->check_exist($post['email'])) {
    			     
                    // Salva no DB
                    $this->m_respostas->save($post);

                    // Envia email

                    $html = $this->load->view('email/meu_resultado', $data, true);
                    
                    $this -> load -> library('email');      
                    $this->email->initialize(array(
                          'protocol' => 'smtp',
                          'mailtype' => 'html',
                          'smtp_host' => 'smtp.sendgrid.net',
                          'smtp_user' => 'tectrain',
                          'smtp_pass' => 'tectrain2016',
                          'smtp_port' => 587,
                          'crlf' => "\r\n",
                          'newline' => "\r\n"
                    ));

                    $this->email->from('noreplay@tectrain.com.br', 'TecTrain');
                    $this->email->to($post['email']);
                    $this->email->subject('Resultado - Análise da Cultura Organizacional');
                    $this->email->message($html);
                    $this->email->send();

                 
    		}


    		$data['atual_a'] = (int) $post['1_A_1']+$post['2_A_1']+$post['3_A_1']+$post['4_A_1']+$post['5_A_1']+$post['6_A_1'];
    		$data['atual_b'] = (int) $post['1_B_1']+$post['2_B_1']+$post['3_B_1']+$post['4_B_1']+$post['5_B_1']+$post['6_B_1'];
    		$data['atual_c'] = (int) $post['1_C_1']+$post['2_C_1']+$post['3_C_1']+$post['4_C_1']+$post['5_C_1']+$post['6_C_1'];
    		$data['atual_d'] = (int) $post['1_D_1']+$post['2_D_1']+$post['3_D_1']+$post['4_D_1']+$post['5_D_1']+$post['6_D_1'];
    	
    		$data['preferida_a'] = (int) $post['1_A_2']+$post['2_A_2']+$post['3_A_2']+$post['4_A_2']+$post['5_A_2']+$post['6_A_2'];
    		$data['preferida_b'] = (int) $post['1_B_2']+$post['2_B_2']+$post['3_B_2']+$post['4_B_2']+$post['5_B_2']+$post['6_B_2'];
    		$data['preferida_c'] = (int) $post['1_C_2']+$post['2_C_2']+$post['3_C_2']+$post['4_C_2']+$post['5_C_2']+$post['6_C_2'];
    		$data['preferida_d'] = (int) $post['1_D_2']+$post['2_D_2']+$post['3_D_2']+$post['4_D_2']+$post['5_D_2']+$post['6_D_2'];
     
    		
    		$this->load->view('resultado',$data);
    		

    	}

        public function meuresultado($email)
        {
            
            // Verifica se o email já respondeu
            if(empty($email) && !$this->m_respostas->check_exist($email)) {
                return;
            }

            $post = $this->m_respostas->by_email(urldecode($email));
            $data['respostas'] = $post;
            $data['email'] = $post[0]['email'];
            $data['full_name'] = $post[0]['full_name'];
            $data['class'] = $post[0]['class'];


            $data['atual_a'] = (int) $post[0]['1_A_1']+$post[0]['2_A_1']+$post[0]['3_A_1']+$post[0]['4_A_1']+$post[0]['5_A_1']+$post[0]['6_A_1'];
            $data['atual_b'] = (int) $post[0]['1_B_1']+$post[0]['2_B_1']+$post[0]['3_B_1']+$post[0]['4_B_1']+$post[0]['5_B_1']+$post[0]['6_B_1'];
            $data['atual_c'] = (int) $post[0]['1_C_1']+$post[0]['2_C_1']+$post[0]['3_C_1']+$post[0]['4_C_1']+$post[0]['5_C_1']+$post[0]['6_C_1'];
            $data['atual_d'] = (int) $post[0]['1_D_1']+$post[0]['2_D_1']+$post[0]['3_D_1']+$post[0]['4_D_1']+$post[0]['5_D_1']+$post[0]['6_D_1'];
        
            $data['preferida_a'] = (int) $post[0]['1_A_2']+$post[0]['2_A_2']+$post[0]['3_A_2']+$post[0]['4_A_2']+$post[0]['5_A_2']+$post[0]['6_A_2'];
            $data['preferida_b'] = (int) $post[0]['1_B_2']+$post[0]['2_B_2']+$post[0]['3_B_2']+$post[0]['4_B_2']+$post[0]['5_B_2']+$post[0]['6_B_2'];
            $data['preferida_c'] = (int) $post[0]['1_C_2']+$post[0]['2_C_2']+$post[0]['3_C_2']+$post[0]['4_C_2']+$post[0]['5_C_2']+$post[0]['6_C_2'];
            $data['preferida_d'] = (int) $post[0]['1_D_2']+$post[0]['2_D_2']+$post[0]['3_D_2']+$post[0]['4_D_2']+$post[0]['5_D_2']+$post[0]['6_D_2'];
     

           
            $this->load->view('resultado',$data);
            

        }

}
