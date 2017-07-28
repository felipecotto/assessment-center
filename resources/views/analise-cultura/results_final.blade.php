@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="text-center">Instrumento de Análise da Cultura Organizacional</h2 class="text-center">
    <div class="row">
        <div class="col-lg-8 text-center"  style="background-color:#FFF;">
            <a name="pontuacao"></a>
            <h2>Resultado</h2>
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <label style="font-weight:normal">Nome do respondente</label>
                    <h3>{{ $response->full_name }}</h3>
                </div>
                <div class="col-md-4 col-sm-4">
                    <label style="font-weight:normal">Email</label>
                    <h3>{{ $response->email }}</h3>
                </div>
                <div class="col-md-4 col-sm-4">
                    <label style="font-weight:normal">Turma</label>
                    <h3>{{ $response->class }}</h3>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4 col-sm-4"></div>
                <div class="col-md-4 col-sm-4">
                    <h3>Pontuação</h3>
                    <table width="100%" class="table">
                        <tr style="font-weight:bold;">
                             <td width="60%" align="left">Dimensão</td>
                             <td width="40%" align="left">Atual</td>
                             <td width="40%" align="left">Preferida</td>
                        </tr>
                        <tr>
                             <td width="10%" align="left">A (Clã)</td>
                             <td width="10%">{{ ($atual_a/6) }} %</td>
                             <td width="10%">{{ ($preferida_a/6) }} %</td>
                        </tr>
                        <tr>
                             <td width="10%" align="left">B (Adocracia)</td>
                             <td width="10%">{{ ($atual_b/6) }} %</td>
                             <td width="10%">{{ ($preferida_b/6) }} %</td>
                        </tr>
                        <tr>
                             <td width="10%" align="left">C (Mercado)</td>
                             <td width="10%">{{ ($atual_c/6) }} %</td>
                             <td width="10%">{{ ($preferida_c/6) }} %</td>
                        </tr>
                        <tr>
                             <td width="10%" align="left">D (Hierárquica)</td>
                             <td width="10%">{{ ($atual_d/6) }} %</td>
                             <td width="10%">{{ ($preferida_d/6) }} %</td>

                        </tr>
                       
                    </table>
                </div>
                <div class="col-md-4 col-sm-4"></div>
            </div>    
        </div>
        <div class="col-lg-2 text-center"></div>
    </div> 
    </br></br>
    <div class="row">
        <div class="col-lg-2 text-center"></div>
        <div class="col-lg-8 text-center"  style="background-color:#FFF;padding: 20px 0">
            <h3>Representação gráfica</h3></br>
            <canvas id="myChart" width="600" height="400"></canvas>
        </div>
        <div class="col-lg-2 text-center"></div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-lg-2 text-center"></div>
        <div class="col-lg-8" style="background-color:#fff;padding: 20px 20px;">
           <h3 class="text-center">Tipologia da Cultura Organizacional</h3>
            </br>
           <p>
                Há quatro dimensões que nos permitem identificar e analisar a cultura organizacional:
            </p>
        <ul>
            <li style="padding:10px 0">Clã – são culturas que se assemelham a famílias, com foco na orientação e no desenvolvimento das pessoas e equipes, voltadas para o mentoring, acolhimento e com forte trabalho em equipes.</li>
            <li style="padding:10px 0">Adocracia – são as culturas orientadas pelo dinamismo empreendedor, com forte foco na assunção de riscos e na inovação. Ter os produtos e serviços mais avançados dá o tom das relações.</li>
            <li style="padding:10px 0"> Mercado – são culturas orientadas para o resultado, com forte foco na competição interna e externa e no atingimento de objetivos e metas. O importante é: “missão dada, missão cumprida”.</li>
            <li style="padding:10px 0">Hierárquica – são as culturas orientadas pela estrutura e o controle, com forte foco na eficiência operacional, na estabilidade e ne melhor forma de “fazer as coisas”.</li>
        </ul>
        </div>
        <div class="col-lg-2 text-center"></div>
    </div> 
    <br></br>
    <div class="row">
        <div class="col-lg-2 text-center"></div>
        <div class="col-lg-8 text-center">
            <button class="btn btn-success" onclick="window.print();return false;"><i class="fa fa-print"></i> Imprimir</button>
        </div>
        <div class="col-lg-2 text-center"></div>
    </div>
    

</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
        var data = {
            labels: ["Clã", "Adocracia", "Mercado", "Hierarquia"],
            datasets: [
                {
                    label: "Atual",
                    backgroundColor: "rgba(1, 61, 150,0.2)",
                    borderColor: "rgba(1, 61, 150,1)",
                    pointBackgroundColor: "rgba(1, 61, 150,1)",
                    pointBorderColor: "#fff",
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: "rgba(1, 61, 150,1)",
                    data: [
                        {{ ($atual_a/6) }},
                        {{ ($atual_b/6) }},
                        {{ ($atual_c/6) }},
                        {{ ($atual_d/6) }}
                    ]
                },
                {
                    label: "Preferida",
                    backgroundColor: "rgba(239,143,0,0.2)",
                    borderColor: "rgba(239,143,0,1)",
                    pointBackgroundColor: "rgba(239,143,0,1)",
                    pointBorderColor: "#fff",
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: "rgba(239,143,0,1)",
                    data: [
                        {{ ($preferida_a/6) }},
                        {{ ($preferida_b/6) }},
                        {{ ($preferida_c/6) }},
                        {{ ($preferida_d/6) }}
                    ]
                }
            ]
        };
        var ctx = document.getElementById("myChart");

            var myRadarChart = new Chart(ctx, {
                type: 'radar',
                data: data,
                options: {
                    responsive: true,
                    scale: {
                        ticks: {
                            fontSize: 14,
                            beginAtZero: true
                        },
                        pointLabels: { fontSize:14 }
                    }
            }
                
                
            });
        });
    </script>


@endsection