@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="text-center m-b-30">Instrumento de Análise da Cultura Organizacional</h2 class="text-center">
    <div class="row">
        <div class="col-md-12"  style="background-color:#FFF;">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Nome do respondente: </strong> {{ $response->full_name }}</p>
                    <p><strong>Email: </strong> {{ $response->email }}</p>
                    <p><strong>Turma: </strong> {{ $response->class }}</p>
                </div>
            </div>
            <br>
            <div class="row">
            <h2 class="text-center m-b-30">Resultado</h2>
                <div class="col-md-5">
                    <h3 class="m-b-30">Pontuação</h3>
                    <table width="100%" class="table table-responsive table-hover">
                        <tr style="font-weight:bold;">
                             <td>Dimensão</td>
                             <td class="text-center">Atual</td>
                             <td class="text-center">Preferida</td>
                        </tr>
                        <tr>
                             <td>A (Clã)</td>
                             <td class="text-center">{{ round($atual_a/6) }} %</td>
                             <td class="text-center">{{ round($preferida_a/6) }} %</td>
                        </tr>
                        <tr>
                             <td>B (Adocracia)</td>
                             <td class="text-center">{{ round($atual_b/6) }} %</td>
                             <td class="text-center">{{ round($preferida_b/6) }} %</td>
                        </tr>
                        <tr>
                             <td>C (Mercado)</td>
                             <td class="text-center">{{ round($atual_c/6) }} %</td>
                             <td class="text-center">{{ round($preferida_c/6) }} %</td>
                        </tr>
                        <tr>
                             <td>D (Hierárquica)</td>
                             <td class="text-center">{{ round($atual_d/6) }} %</td>
                             <td class="text-center">{{ round($preferida_d/6) }} %</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-offset-1 col-md-6">
                    <h3 class="text-center m-b-30">Representação gráfica</h3>
                    <canvas id="myChart" width="600" height="400"></canvas>
                </div>
            </div>    
        </div>
    </div> 
    <div class="row">
        <div class="col-md-12" style="background-color:#fff;padding: 20px 20px;">
           <h3 class="text-center m-b-30">Tipologia da Cultura Organizacional</h3>
           <p>Há quatro dimensões que nos permitem identificar e analisar a cultura organizacional:</p>
            <ul>
                <li style="padding:10px 0">Clã – são culturas que se assemelham a famílias, com foco na orientação e no desenvolvimento das pessoas e equipes, voltadas para o mentoring, acolhimento e com forte trabalho em equipes.</li>
                <li style="padding:10px 0">Adocracia – são as culturas orientadas pelo dinamismo empreendedor, com forte foco na assunção de riscos e na inovação. Ter os produtos e serviços mais avançados dá o tom das relações.</li>
                <li style="padding:10px 0"> Mercado – são culturas orientadas para o resultado, com forte foco na competição interna e externa e no atingimento de objetivos e metas. O importante é: “missão dada, missão cumprida”.</li>
                <li style="padding:10px 0">Hierárquica – são as culturas orientadas pela estrutura e o controle, com forte foco na eficiência operacional, na estabilidade e ne melhor forma de “fazer as coisas”.</li>
            </ul>
            <div class="text-center m-b-30">
                <button class="btn btn-success" onclick="window.print();return false;"><i class="fa fa-print"></i> Imprimir</button>
            </div>
        </div>
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