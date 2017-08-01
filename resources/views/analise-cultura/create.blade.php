@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row m-b-30">
        <div class="col-md-12">
            <h1 class="text-center m-b-30">Instrumento de Análise da Cultura Organizacional</h1>
            <p>O propósito deste instrumento é refletir e comparar a Cultura Organizacional percebida por meio de seis dimensões de análise. Ao terminar, poderemos obter uma fotografia de como o grupo percebe os traços culturais que moldam a forma como a organização opera e quais são os valores que a caracterizam.</p>
            <p>Não existem respostas certas ou erradas, assim como não há cultura certa ou errada. Cada organização tem seu próprio “jeito de ser”. Neste sentido, para assegurar a melhor análise, seja o mais preciso possível.</p>
            <p>Para esta avaliação, vamos refletir sobre a organização como um todo. Este instrumento pode também ser aplicado para entender divisões de negócios ou áreas especificas, guardadas as orientações específicas.</p>
            <p>O questionário é composto por 6 dimensões de análise. Cada dimensão é composta por 4 alternativas. Divida 100 pontos entre estas 4 alternativas de acordo com a similaridade que esta afirmativa tenha com a sua organização. Por exemplo, se em dada dimensão, você acredite que a alternativa mais próxima da sua realidade atual é B, alternativas A e C tem alguns pontos de similaridade e D não tem nenhuma ou pouca expressão com a realidade atual, você deve lançar 50 pontos para a alternativa B, 25 pontos para A e 15 pontos para C e 10 pontos para D. 50 pontos é o máximo e 10 é o mínimo. Assegure que a soma total em cada dimensão seja de 100 pontos. </p>
            <p>Note que há duas colunas de análise: A primeira refere-se a sua percepção da situação ATUAL, que define como a sua organização é hoje. Depois de completar a primeira coluna, você deverá preencher a segunda coluna, que diz respeito a como você acredita que deveria ser, ou seja, sua cultura PREFERIDA. Aqui você deverá gravar como você gostaria que fosse a cultura no futuro.</p>
        </div>
    </div> 
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <form method="post" id="frm_update" action="{{ url('nova-analise') }}">
            {!! csrf_field() !!}
                <div class="row m-b-30">
                    <div class="col-md-4 col-sm-4">
                        <label>Seu nome completo</label>
                        <input type="text" class="form-control" data-msg="Informe o seu nome completo" required name="full_name" />
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <label>Turma</label>
                        <select class="form-control" id="sel1" name="class">
                            @foreach($turmas as $turma)
                                <option value="{{ $turma->nome }}">{{ $turma->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <label>Seu email</label>
                        <input type="text" class="form-control" data-msg="Informe o seu email" id="email" required name="email"/>
                    </div>
                </div>
                <div class="row">
                    <table class="table">
                        <tr style="font-weight:bold;">
                             <td width="10%">1.</td>
                             <td width="70%" align="left">Características Dominantes</td>
                             <td width="10%">Atual</td>
                             <td width="10%">Preferida</td>
                        </tr>
                        <tr>
                             <td width="10%">A</td>
                             <td width="70%" align="left">A organização valoriza as relações pessoais. É como uma extensão da família. As pessoas tendem a expressar-se de forma aberta e franca.</td>
                             <td width="10%">
                                <input type="text" maxlength="2" data-msg="Obrigatório" required class="form-control atual atual_1" name="1_A_1" data-toggle="popover" data-trigger="hover" data-content="Insira um valor entre 10 e 50" data-placement="top"/>
                             </td>
                             <td width="10%">
                                <input type="text" maxlength="2" data-msg="Obrigatório"  required class="form-control preferida preferida_1" name="1_A_2" data-toggle="popover" data-trigger="hover" data-content="Insira um valor entre 10 e 50" data-placement="top"/>
                             </td>
                        </tr>
                        <tr>
                             <td width="10%">B</td>
                             <td width="70%" align="left">A organização é um ambiente dinâmico e empreendedor. As pessoas tendem a se expor e assumir riscos.</td>
                             <td width="10%">
                                <input type="text" maxlength="2" data-msg="Obrigatório"  required class="form-control atual atual_1" name="1_B_1" data-toggle="popover" data-trigger="hover" data-content="Insira um valor entre 10 e 50" data-placement="top"/>
                             </td>
                             <td width="10%">
                                <input type="text" maxlength="2" data-msg="Obrigatório"  required class="form-control preferida preferida_1" name="1_B_2" data-toggle="popover" data-trigger="hover" data-content="Insira um valor entre 10 e 50" data-placement="top"/>
                             </td>
                        </tr>
                        <tr>
                             <td width="10%">C</td>
                             <td width="70%" align="left">A organização é fortemente orientada a resultados. O foco principal é atingir os objetivos e metas. As pessoas são muito competitivas e orientadas para resultados concretos. </td>
                             <td width="10%">
                                <input type="text" maxlength="2" data-msg="Obrigatório"  required class="form-control atual atual_1" name="1_C_1" data-toggle="popover" data-trigger="hover" data-content="Insira um valor entre 10 e 50" data-placement="top"/>
                             </td>
                             <td width="10%">
                                <input type="text" maxlength="2" data-msg="Obrigatório"  required class="form-control preferida preferida_1" name="1_C_2" data-toggle="popover" data-trigger="hover" data-content="Insira um valor entre 10 e 50" data-placement="top"/>
                             </td>
                        </tr>
                        <tr>
                             <td width="10%">D</td>
                             <td width="70%" align="left">A organização é muito formal, estruturada e hierárquica, na qual o controle prevalece. Normas, regras e procedimentos moldam e definem como as pessoas agem.</td>
                             <td width="10%">
                                <input type="text" maxlength="2" data-msg="Obrigatório"  required class="form-control atual atual_1" name="1_D_1" data-toggle="popover" data-trigger="hover" data-content="Insira um valor entre 10 e 50" data-placement="top"/>
                             </td>
                             <td width="10%">
                                <input type="text" maxlength="2" data-msg="Obrigatório"  required class="form-control preferida preferida_1" name="1_D_2" data-toggle="popover" data-trigger="hover" data-content="Insira um valor entre 10 e 50" data-placement="top"/>
                             </td>
                        </tr>
                         <tr>
                             <td width="10%"></td>
                             <td width="70%" align="left"><strong>Total</strong></td>
                             <td width="10%">
                                <strong class="total_result"  id="total_1_1">0%</strong>
                             </td>
                             <td style="padding-bottom: 46px;" width="10%">
                                <strong class="total_result"  id="total_1_2">0%</strong>
                             </td>
                        </tr>
                        <!-- 2 -->
                         <tr style="font-weight:bold;">
                             <td width="10%">2.</td>
                             <td width="70%" align="left">Liderança Organizacional </td>
                             <td width="10%">Atual</td>
                             <td width="10%">Preferida</td>
                        </tr>
                        <tr>
                             <td width="10%">A</td>
                             <td width="70%" align="left">A liderança na organização é geralmente orientada para o mentoring, que incentiva relações francas e abertas e molda um ambiente acolhedor.</td>
                             <td width="10%">
                                <input type="text" maxlength="2" data-msg="Obrigatório"  required class="form-control atual atual_2" name="2_A_1" data-toggle="popover" data-trigger="hover" data-content="Insira um valor entre 10 e 50" data-placement="top"/>
                             </td>
                             <td width="10%">
                                <input type="text" maxlength="2" data-msg="Obrigatório"  required class="form-control preferida preferida_2" name="2_A_2" data-toggle="popover" data-trigger="hover" data-content="Insira um valor entre 10 e 50" data-placement="top"/>
                             </td>
                        </tr>
                        <tr>
                             <td width="10%">B</td>
                             <td width="70%" align="left">A liderança na organização é geralmente considerada um exemplo de empreendedorismo, inovação e assunção de riscos.</td>
                             <td width="10%">
                                <input type="text" maxlength="2" data-msg="Obrigatório"  required class="form-control atual atual_2" name="2_B_1" data-toggle="popover" data-trigger="hover" data-content="Insira um valor entre 10 e 50" data-placement="top"/>
                             </td>
                             <td width="10%">
                                <input type="text" maxlength="2" data-msg="Obrigatório"  required class="form-control preferida preferida_2" name="2_B_2" data-toggle="popover" data-trigger="hover" data-content="Insira um valor entre 10 e 50" data-placement="top"/>
                             </td>
                        </tr>
                        <tr>
                             <td width="10%">C</td>
                             <td width="70%" align="left">A liderança na organização geralmente tem muito baixa tolerância para novas ideias, agressiva e com estreito foco nos resultados.</td>
                             <td width="10%">
                                <input type="text" maxlength="2" data-msg="Obrigatório"  required class="form-control atual atual_2" name="2_C_1" data-toggle="popover" data-trigger="hover" data-content="Insira um valor entre 10 e 50" data-placement="top"/>
                             </td>
                             <td width="10%">
                                <input type="text" maxlength="2" data-msg="Obrigatório"  required class="form-control preferida preferida_2" name="2_C_2" data-toggle="popover" data-trigger="hover" data-content="Insira um valor entre 10 e 50" data-placement="top"/>
                             </td>
                        </tr>
                        <tr>
                             <td width="10%">D</td>
                             <td width="70%" align="left">A liderança na organização é geralmente considerada pela exemplar coordenação, organização e/ou foco e habilidade em gerar eficiência.</td>
                             <td width="10%">
                                <input type="text" maxlength="2" data-msg="Obrigatório"  required class="form-control atual atual_2" name="2_D_1" data-toggle="popover" data-trigger="hover" data-content="Insira um valor entre 10 e 50" data-placement="top"/>
                             </td>
                             <td width="10%">
                                <input type="text" maxlength="2" data-msg="Obrigatório"  required class="form-control preferida preferida_2" name="2_D_2" data-toggle="popover" data-trigger="hover" data-content="Insira um valor entre 10 e 50" data-placement="top"/>
                             </td>
                        </tr>
                         <tr>
                             <td width="10%"></td>
                             <td width="70%" align="left"><strong>Total</strong></td>
                             <td width="10%">
                                <strong class="total_result"  id="total_2_1">0%</strong>
                             </td>
                             <td style="padding-bottom: 46px;" width="10%">
                                <strong class="total_result"  id="total_2_2">0%</strong>
                             </td>
                        </tr>

                        <!-- 3 -->
                         <tr style="font-weight:bold;">
                             <td width="10%">3.</td>
                             <td width="70%" align="left">Estilo de Gestão</td>
                             <td width="10%">Atual</td>
                             <td width="10%">Preferida</td>
                        </tr>
                        <tr>
                             <td width="10%">A</td>
                             <td width="70%" align="left">O estilo de gestão da organização é caracterizado pelo trabalho em equipe, construção de consenso e participação.</td>
                             <td width="10%">
                                <input type="text" maxlength="2" data-msg="Obrigatório"  required class="form-control atual atual_3" name="3_A_1" data-toggle="popover" data-trigger="hover" data-content="Insira um valor entre 10 e 50" data-placement="top"/>
                             </td>
                             <td width="10%">
                                <input type="text" maxlength="2" data-msg="Obrigatório"  required class="form-control preferida preferida_3" name="3_A_2" data-toggle="popover" data-trigger="hover" data-content="Insira um valor entre 10 e 50" data-placement="top"/>
                             </td>
                        </tr>
                        <tr>
                             <td width="10%">B</td>
                             <td width="70%" align="left">O estilo de gestão é caracterizado pela personalização, tomada de riscos individuais, inovação, liberdade de ação e singularidade.</td>
                             <td width="10%">
                                <input type="text" maxlength="2" data-msg="Obrigatório"  required class="form-control atual atual_3" name="3_B_1" data-toggle="popover" data-trigger="hover" data-content="Insira um valor entre 10 e 50" data-placement="top"/>
                             </td>
                             <td width="10%">
                                <input type="text" maxlength="2" data-msg="Obrigatório"  required class="form-control preferida preferida_3" name="3_B_2" data-toggle="popover" data-trigger="hover" data-content="Insira um valor entre 10 e 50" data-placement="top"/>
                             </td>
                        </tr>
                        <tr>
                             <td width="10%">C</td>
                             <td width="70%" align="left">O estilo de gestão é caracterizado pela forte competição entre indivíduos e grupos, muita pressão e foco em resultados.</td>
                             <td width="10%">
                                <input type="text" maxlength="2" data-msg="Obrigatório"  required class="form-control atual atual_3" name="3_C_1" data-toggle="popover" data-trigger="hover" data-content="Insira um valor entre 10 e 50" data-placement="top"/>
                             </td>
                             <td width="10%">
                                <input type="text" maxlength="2" data-msg="Obrigatório"  required class="form-control preferida preferida_3" name="3_C_2" data-toggle="popover" data-trigger="hover" data-content="Insira um valor entre 10 e 50" data-placement="top"/>
                             </td>
                        </tr>
                        <tr>
                             <td width="10%">D</td>
                             <td width="70%" align="left">O estilo de gestão é caracterizado pelo senso de segurança dos colaboradores, conformidade, em um ambiente previsível e com relações estáveis.</td>
                             <td width="10%">
                                <input type="text" maxlength="2" data-msg="Obrigatório"  required class="form-control atual atual_3" name="3_D_1" data-toggle="popover" data-trigger="hover" data-content="Insira um valor entre 10 e 50" data-placement="top"/>
                             </td>
                             <td width="10%">
                                <input type="text" maxlength="2" data-msg="Obrigatório"  required class="form-control preferida preferida_3" name="3_D_2" data-toggle="popover" data-trigger="hover" data-content="Insira um valor entre 10 e 50" data-placement="top"/>
                             </td>
                        </tr>
                         <tr>
                             <td width="10%"></td>
                             <td width="70%" align="left"><strong>Total</strong></td>
                             <td width="10%">
                                <strong class="total_result"  id="total_3_1">0%</strong>
                             </td>
                             <td style="padding-bottom: 46px;" width="10%">
                                <strong class="total_result"  id="total_3_2">0%</strong>
                             </td>
                        </tr>

                        <!-- 4 -->
                         <tr style="font-weight:bold;">
                             <td width="10%">4.</td>
                             <td width="70%" align="left">Valores Organizacionais</td>
                             <td width="10%">Atual</td>
                             <td width="10%">Preferida</td>
                        </tr>
                        <tr>
                             <td width="10%">A</td>
                             <td width="70%" align="left">Os valores que prevalecem na organização são a lealdade e a confiança mútua. O alto compromisso com a empresa é resultado destes valores positivos.</td>
                             <td width="10%"> 
                                <input type="text" maxlength="2" data-msg="Obrigatório" required class="form-control atual atual_4" name="4_A_1" data-toggle="popover" data-trigger="hover" data-content="Insira um valor entre 10 e 50" data-placement="top"/>
                             </td>
                             <td width="10%">
                                <input type="text" maxlength="2" data-msg="Obrigatório"  required class="form-control preferida preferida_4" name="4_A_2" data-toggle="popover" data-trigger="hover" data-content="Insira um valor entre 10 e 50" data-placement="top"/>
                             </td>
                        </tr>
                        <tr>
                             <td width="10%">B</td>
                             <td width="70%" align="left">Os valores que prevalecem na organização é o compromisso com a inovação e com o desenvolvimento. Há uma importante ênfase no futuro e estar sempre buscando novas fronteiras.</td>
                             <td width="10%">
                                <input type="text" maxlength="2" data-msg="Obrigatório" required class="form-control atual atual_4" name="4_B_1" data-toggle="popover" data-trigger="hover" data-content="Insira um valor entre 10 e 50" data-placement="top"/>
                             </td>
                             <td width="10%">
                                <input type="text" maxlength="2" data-msg="Obrigatório" required class="form-control preferida preferida_4" name="4_B_2" data-toggle="popover" data-trigger="hover" data-content="Insira um valor entre 10 e 50" data-placement="top"/>
                             </td>
                        </tr>
                        <tr>
                             <td width="10%">C</td>
                             <td width="70%" align="left">Os valores que prevalecem na organização são a enorme ênfase no atingimento de objetivos e metas. Agressividade, competitividade e vencer sempre são lugar comum.</td>
                             <td width="10%">
                                <input type="text" maxlength="2" data-msg="Obrigatório" required class="form-control atual atual_4" name="4_C_1" data-toggle="popover" data-trigger="hover" data-content="Insira um valor entre 10 e 50" data-placement="top"/>
                             </td>
                             <td width="10%">
                                <input type="text" maxlength="2" data-msg="Obrigatório" required class="form-control preferida preferida_4" name="4_C_2" data-toggle="popover" data-trigger="hover" data-content="Insira um valor entre 10 e 50" data-placement="top"/>
                             </td>
                        </tr>
                        <tr>
                             <td width="10%">D</td>
                             <td width="70%" align="left">Os valores que prevalecem na organização são as políticas, regras, normas e procedimentos formais. Manter o bom funcionamento e um baixo nível de conflitos é importante.</td>
                             <td width="10%">
                                <input type="text" maxlength="2" data-msg="Obrigatório" required class="form-control atual atual_4" name="4_D_1" data-toggle="popover" data-trigger="hover" data-content="Insira um valor entre 10 e 50" data-placement="top"/>
                             </td>
                             <td width="10%">
                                <input type="text" maxlength="2" data-msg="Obrigatório" required class="form-control preferida preferida_4" name="4_D_2" data-toggle="popover" data-trigger="hover" data-content="Insira um valor entre 10 e 50" data-placement="top"/>
                             </td>
                        </tr>
                         <tr>
                             <td width="10%"></td>
                             <td width="70%" align="left"><strong>Total</strong></td>
                             <td width="10%">
                                <strong class="total_result"  id="total_4_1">0%</strong>
                             </td>
                             <td style="padding-bottom: 46px;" width="10%">
                                <strong class="total_result"  id="total_4_2">0%</strong>
                             </td>
                        </tr>

                        <!-- 5 -->
                         <tr style="font-weight:bold;">
                             <td width="10%">5.</td>
                             <td width="70%" align="left">Ênfase Estratégico</td>
                             <td width="10%">Atual</td>
                             <td width="10%">Preferida</td>
                        </tr>
                        <tr>
                             <td width="10%">A</td>
                             <td width="70%" align="left">A organização enfatiza o desenvolvimento humano. Confiança, abertura e participação são as tônicas das relações.</td>
                             <td width="10%">
                                <input type="text" maxlength="2" data-msg="Obrigatório" required class="form-control atual atual_5" name="5_A_1" data-toggle="popover" data-trigger="hover" data-content="Insira um valor entre 10 e 50" data-placement="top"/>
                             </td>
                             <td width="10%">
                                <input type="text" maxlength="2" data-msg="Obrigatório"  required class="form-control preferida preferida_5" name="5_A_2" data-toggle="popover" data-trigger="hover" data-content="Insira um valor entre 10 e 50" data-placement="top"/>
                             </td>
                        </tr>
                        <tr>
                             <td width="10%">B</td>
                             <td width="70%" align="left">A organização enfatiza a aquisição de novos recursos e a criação de novos desafios. Buscar novas perspectivas e oportunidades é um comportamento valorizado e incentivado.</td>
                             <td width="10%">
                                <input type="text" maxlength="2" data-msg="Obrigatório"  required class="form-control atual atual_5" name="5_B_1" data-toggle="popover" data-trigger="hover" data-content="Insira um valor entre 10 e 50" data-placement="top"/>
                             </td>
                             <td width="10%">
                                <input type="text" maxlength="2" data-msg="Obrigatório"  required class="form-control preferida preferida_5" name="5_B_2" data-toggle="popover" data-trigger="hover" data-content="Insira um valor entre 10 e 50" data-placement="top"/>
                             </td>
                        </tr>
                        <tr>
                             <td width="10%">C</td>
                             <td width="70%" align="left">A organização enfatiza a competitividade e o atingimento de resultados. Superar metas, fazer mais do que o esperado e vencer no mercado, são focos preponderantes.</td>
                             <td width="10%">
                                <input type="text" maxlength="2" data-msg="Obrigatório" required class="form-control atual atual_5" name="5_C_1" data-toggle="popover" data-trigger="hover" data-content="Insira um valor entre 10 e 50" data-placement="top"/>
                             </td>
                             <td width="10%">
                                <input type="text" maxlength="2" data-msg="Obrigatório" required class="form-control preferida preferida_5" name="5_C_2" data-toggle="popover" data-trigger="hover" data-content="Insira um valor entre 10 e 50" data-placement="top"/>
                             </td>
                        </tr>
                        <tr>
                             <td width="10%">D</td>
                             <td width="70%" align="left">A organização enfatiza o ambiente estável, a permanência das pessoas e a estabilidade. Eficiência, controle e pleno funcionamento operacional são importantes.</td>
                             <td width="10%">
                                <input type="text" maxlength="2" data-msg="Obrigatório" required class="form-control atual atual_5" name="5_D_1" data-toggle="popover" data-trigger="hover" data-content="Insira um valor entre 10 e 50" data-placement="top"/>
                             </td>
                             <td width="10%">
                                <input type="text" maxlength="2" data-msg="Obrigatório" required class="form-control preferida preferida_5" name="5_D_2" data-toggle="popover" data-trigger="hover" data-content="Insira um valor entre 10 e 50" data-placement="top"/>
                             </td>
                        </tr>
                         <tr>
                             <td width="10%"></td>
                             <td width="70%" align="left"><strong>Total</strong></td>
                             <td width="10%">
                                <strong class="total_result"  id="total_5_1">0%</strong>
                             </td>
                             <td style="padding-bottom: 46px;" width="10%">
                                <strong class="total_result"  id="total_5_2">0%</strong>
                             </td>
                        </tr>

                        <!-- 6 -->
                         <tr style="font-weight:bold;">
                             <td width="10%">6.</td>
                             <td width="70%" align="left">Critérios de Sucesso</td>
                             <td width="10%">Atual</td>
                             <td width="10%">Preferida</td>
                        </tr>
                        <tr>
                             <td width="10%">A</td>
                             <td width="70%" align="left">A organização define sucesso como a capacidade de desenvolver as pessoas, trabalho em equipe, compromisso e dedicação dos colaboradores e preocupação genuína com as pessoas.</td>
                             <td width="10%">
                                <input type="text" maxlength="2" data-msg="Obrigatório" required class="form-control atual atual_6" name="6_A_1" data-toggle="popover" data-trigger="hover" data-content="Insira um valor entre 10 e 50" data-placement="top"/>
                             </td>
                             <td width="10%">
                                <input type="text" maxlength="2" data-msg="Obrigatório" required class="form-control preferida preferida_6" name="6_A_2" data-toggle="popover" data-trigger="hover" data-content="Insira um valor entre 10 e 50" data-placement="top"/>
                             </td>
                        </tr>
                        <tr>
                             <td width="10%">B</td>
                             <td width="70%" align="left">A organização define sucesso como a partir da inovação e do orgulho de ter os mais novos e avançados produtos, serviços e soluções para o cliente. Esta empresa é líder em inovação.</td>
                             <td width="10%">
                                <input type="text" maxlength="2" data-msg="Obrigatório" required class="form-control atual atual_6" name="6_B_1" data-toggle="popover" data-trigger="hover" data-content="Insira um valor entre 10 e 50" data-placement="top"/>
                             </td>
                             <td width="10%">
                                <input type="text" maxlength="2" data-msg="Obrigatório" required class="form-control preferida preferida_6" name="6_B_2" data-toggle="popover" data-trigger="hover" data-content="Insira um valor entre 10 e 50" data-placement="top"/>
                             </td>
                        </tr>
                        <tr>
                             <td width="10%">C</td>
                             <td width="70%" align="left">A organização define sucesso como aquele que vence no mercado e supera seus concorrentes. Liderança competitiva no mercado é chave.</td>
                             <td width="10%">
                                <input type="text" maxlength="2" data-msg="Obrigatório" required class="form-control atual atual_6" name="6_C_1" data-toggle="popover" data-trigger="hover" data-content="Insira um valor entre 10 e 50" data-placement="top"/>
                             </td>
                             <td width="10%">
                                <input type="text" maxlength="2" data-msg="Obrigatório" required class="form-control preferida preferida_6" name="6_C_2" data-toggle="popover" data-trigger="hover" data-content="Insira um valor entre 10 e 50" data-placement="top"/>
                             </td>
                        </tr>
                        <tr>
                             <td width="10%">D</td>
                             <td width="70%" align="left">A organização define sucesso com base na eficiência. Entrega segura, logística perfeita e correndo tranquila e baixos custos são críticos.</td>
                             <td width="10%">
                                <input type="text" maxlength="2" data-msg="Obrigatório"  required class="form-control atual atual_6" name="6_D_1" data-toggle="popover" data-trigger="hover" data-content="Insira um valor entre 10 e 50" data-placement="top"/>
                             </td>
                             <td width="10%">
                                <input type="text" maxlength="2" data-msg="Obrigatório"  required class="form-control preferida preferida_6" name="6_D_2" data-toggle="popover" data-trigger="hover" data-content="Insira um valor entre 10 e 50" data-placement="top"/>
                             </td>
                        </tr>
                         <tr>
                             <td width="10%"></td>
                             <td width="70%" align="left"><strong>Total</strong></td>
                             <td width="10%">
                                <strong class="total_result"  id="total_6_1">0%</strong>
                             </td>
                             <td style="padding-bottom: 46px;" width="10%">
                                <strong class="total_result" id="total_6_2">0%</strong>
                             </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <div class="text-center">
                                    <input type="submit" id="btn_responder" value=" Enviar " class="btn btn-primary"/>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script>
$(document).ready(function () {

    $('[data-toggle="popover"]').popover();   

    $('.preferida').attr('disabled','disabled');
    
    $('.atual').on('change',function(){
        $('.atual').each(function(){
            
            if($(this).val() <= 0 || $(this).val() == ""){
                $('.preferida').attr('disabled','disabled');
            }else{
                $('.preferida').removeAttr('disabled');
            }
        });
    
    });
    

    $('#frm_update').validate({
             rules: {
                email: {
                  required: true,
                  email: true
                }
              },
            submitHandler: function(form) {
                var total_over = false;

                email = $('#email').val();

                // Verifica se há totais mais altos que 100
                $('.total_result').each(function(){
                    if(parseInt($(this).text()) > 100 || parseInt($(this).text()) < 100){
                        total_over = true;
                    }
                });

                if(total_over){
                    swal({
                        title: "Atenção!",
                        text: "Confira os totais. Eles precisam somar 100%",
                        type: "warning",
                        html: true,
                        showCancelButton: false,
                        closeOnConfirm: false
                    });
                    return false;
                }
        
                $.ajax({
                    type: 'POST',
                    data : {email:email},
                   
                    success: function (data) {

                        if(data == "true"){
                            swal({
                                title: "Atenção!",
                                text: "t",
                                type: "warning",
                                html: true,
                                showCancelButton: false,
                                closeOnConfirm: false
                            });
                            $('#btn_responder').attr('disabled','disabled')
                            return false;
                        } else {
                            $('#btn_responder').removeAttr('disabled');
                            return false;
                        }
                    },
                    error: function (data) {
                       return false;
                    }
                });
                form.submit();
            }
                
     });
    


    $('.atual_1').on('change', function(){
        var sum = 0;
        if(this.value <10 || this.value >50){
            this.value = '';
        }
         $(".atual_1").each(function() {
            if(!isNaN(this.value) && this.value.length!=0) {
                sum += parseFloat(this.value);
            }
        });

        $('#total_1_1').text(sum+"%");

    });

    $('.preferida_1').on('change', function(){
        if(this.value <10 || this.value >50){
            this.value = '';
        }
        var sum = 0;
         $(".preferida_1").each(function() {
            if(!isNaN(this.value) && this.value.length!=0) {
                sum += parseFloat(this.value);
            }
        });

        $('#total_1_2').text(sum+"%");

    });

    $('.atual_2').on('change', function(){
        if(this.value <10 || this.value >50){
            this.value = '';
        }
        var sum = 0;
         $(".atual_2").each(function() {
            if(!isNaN(this.value) && this.value.length!=0) {
                sum += parseFloat(this.value);
            }
        });

        $('#total_2_1').text(sum+"%");

    });

    $('.preferida_2').on('change', function(){
        var sum = 0;
        if(this.value <10 || this.value >50){
            this.value = '';
        }
         $(".preferida_2").each(function() {
            if(!isNaN(this.value) && this.value.length!=0) {
                sum += parseFloat(this.value);
            }
        });

        $('#total_2_2').text(sum+"%");

    });

     $('.atual_3').on('change', function(){
        var sum = 0;
        if(this.value <10 || this.value >50){
            this.value = '';
        }
         $(".atual_3").each(function() {
            if(!isNaN(this.value) && this.value.length!=0) {
                sum += parseFloat(this.value);
            }
        });

        $('#total_3_1').text(sum+"%");

    });

    $('.preferida_3').on('change', function(){
        var sum = 0;
        if(this.value <10 || this.value >50){
            this.value = '';
        }
         $(".preferida_3").each(function() {
            if(!isNaN(this.value) && this.value.length!=0) {
                sum += parseFloat(this.value);
            }
        });

        $('#total_3_2').text(sum+"%");

    });

     $('.atual_4').on('change', function(){
        var sum = 0;
        if(this.value <10 || this.value >50){
            this.value = '';
        }
         $(".atual_4").each(function() {
            if(!isNaN(this.value) && this.value.length!=0) {
                sum += parseFloat(this.value);
            }
        });

        $('#total_4_1').text(sum+"%");

    });

    $('.preferida_4').on('change', function(){
        var sum = 0;
        if(this.value <10 || this.value >50){
            this.value = '';
        }
         $(".preferida_4").each(function() {
            if(!isNaN(this.value) && this.value.length!=0) {
                sum += parseFloat(this.value);
            }
        });

        $('#total_4_2').text(sum+"%");

    });


     $('.atual_5').on('change', function(){
        var sum = 0;
        if(this.value <10 || this.value >50){
            this.value = '';
        }
         $(".atual_5").each(function() {
            if(!isNaN(this.value) && this.value.length!=0) {
                sum += parseFloat(this.value);
            }
        });

        $('#total_5_1').text(sum+"%");

    });

    $('.preferida_5').on('change', function(){
        var sum = 0;
        if(this.value <10 || this.value >50){
            this.value = '';
        }
         $(".preferida_5").each(function() {
            if(!isNaN(this.value) && this.value.length!=0) {
                sum += parseFloat(this.value);
            }
        });

        $('#total_5_2').text(sum+"%");

    });

    $('.atual_6').on('change', function(){
        var sum = 0;
        if(this.value <10 || this.value >50){
            this.value = '';
        }
         $(".atual_6").each(function() {
            if(!isNaN(this.value) && this.value.length!=0) {
                sum += parseFloat(this.value);
            }
        });

        $('#total_6_1').text(sum+"%");

    });

    $('.preferida_6').on('change', function(){
        var sum = 0;
        if(this.value <10 || this.value >50){
            this.value = '';
        }
         $(".preferida_6").each(function() {
            if(!isNaN(this.value) && this.value.length!=0) {
                sum += parseFloat(this.value);
            }
        });

        $('#total_6_2').text(sum+"%");

    });

    
});
</script>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
        
@endsection