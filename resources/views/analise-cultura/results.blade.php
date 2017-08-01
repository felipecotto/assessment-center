@extends('layouts.app')

@section('content')

<div class="container m-b-30">
    <form method="post">
    	<div class="row">
            <h1>Respostas dos participantes</h1>
            <div class="col-lg-12">
                <table width="100%" id="table_results" class="table table-responsive table-hover">
                    <thead>
                    <tr  style="font-weight:bold;">
                        <td id="1">Id</td>
                         <td>Participante</td>
                         <td>Turma</td>
                         <td>Email</td>
                         <td>Resultado</td>
                         <td>Data</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($response as $key => $value)
                    <tr>
						<td>{{ $value->id }}</td>
						<td>{{ $value->full_name }}</td>
						<td>{{ $value->class }}</td>
						<td>{{ $value->email }}</td>
						<td>
							<a href="{{ url('admin/verresultados/'.$value->id) }}"  class="ver">Ver resultado</a>
						</td>
						<td>{{ $value->created_at }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
    	</div> 
	</form>
</div>
<div class="container">
	<div class="jumbotron">
		<div class="row">
	        <div class="col-md-12 text-center">
	            <h2>Visão geral</h2>
	            <div class="row">
	                <div class="col-lg-12 col-md-12" id="content_pontuacao" style="padding:2em 1em;">
	                    <div class="row">
	                        <div class="col-lg-7 col-md-7">
	                            <div id="content_table"></div>
	                        </div>
	                        <div class="col-lg-5 col-md-5">
	                            <canvas id="content_canvas"></canvas>
	                        </div>
	                    </div>
	                    <p>
	                    <button class="btn btn-primary" id="gerar">Gerar resultado</button>
	                    </p>
	                </div>
	            </div>
	        </div>
	    </div> 
	</div>
</div>

<div class="modal fade" id="modalResultado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                <h2 id="title_modal"></h2>
      </div>
      <div class="modal-body" id="content_modal">
            <div class="row">
                <div class="col-md-6">
                    <div id="table"></div>
                </div>
                <div class="col-md-6">
                    <canvas id="canvas" width="400" height="400"></canvas>
                </div>
            </div>
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')



<script>
	$(document).ready(function() {
		
	    $('#table_results').DataTable({
	    	"language": {
	            "lengthMenu": "Mostrando _MENU_ records por página",
	            "zeroRecords": "Nada encontrado",
	            "info": "Monstrando _PAGE_ of _PAGES_",
	            "infoEmpty": "Não há registros",
	            "infoFiltered": "(filtered from _MAX_ total records)",
	            "search": "Procurar:"
	        }
	    });
		
		$('#gerar').on('click',function(){

			var ids = Array();

			table.rows({filter: 'applied'}).every( function ( rowIdx, tableLoop, rowLoop ) {
				var data = this.data();
				ids.push(data[0]);

			} );

			$.ajax({
				type: 'POST',
				data:{ids:ids},
				url: '{{ url('admin/verresultados_ids') }}', 
				success: function (data) {
					
					data = JSON.parse(data);

					$('#content_table').html(data.html);

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
							data: data.atual.split(',')
						},
						{
							label: "Preferida",
							backgroundColor: "rgba(239,143,0,0.2)",
							borderColor: "rgba(239,143,0,1)",
							pointBackgroundColor: "rgba(239,143,0,1)",
							pointBorderColor: "#fff",
							pointHoverBackgroundColor: "#fff",
							pointHoverBorderColor: "rgba(239,143,0,1)",
							data: data.preferida.split(',')
						}
						]
					};
					var ctx = document.getElementById("content_canvas");

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

				},
				error: function (data) {

				}
			});

		});


	} );

	var myRadarChart = null;

	$('#modalResultado').on('shown.bs.modal',function(event){

		var link = $(event.relatedTarget);
		$('#title_modal').text(link.attr('data-title'));
		var id = link.attr('data-id');

		var modal = $(this);
		var canvas = modal.find('.modal-body canvas');

		var ctx = canvas[0].getContext("2d");
		var data = "";

		$.ajax({
			type: 'GET',
			url: '#',
			success: function (data) {
				data = JSON.parse(data);

				$('#table').html(data.html);

				var datachart = {
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
						data: data.atual.split(',')
					},
					{
						label: "Preferida",
						backgroundColor: "rgba(239,143,0,0.2)",
						borderColor: "rgba(239,143,0,1)",
						pointBackgroundColor: "rgba(239,143,0,1)",
						pointBorderColor: "#fff",
						pointHoverBackgroundColor: "#fff",
						pointHoverBorderColor: "rgba(239,143,0,1)",
						data: data.preferida.split(',')
					}
					]
				};

				myRadarChart = new Chart(ctx, {
					type: 'radar',
					data: datachart,
					options: {
						responsive: false,
						scale: {
							ticks: {
								fontSize: 14,
								beginAtZero: true
							},
							pointLabels: { fontSize:14 }
						}
					}
				},{});

			},
			error: function (data) {

			}
		});




	}).on('hidden.bs.modal',function(event){
// reset canvas size
var modal = $(this);
var canvas = modal.find('.modal-body canvas');
myRadarChart.destroy();

// destroy modal
$(this).data('bs.modal', null);
});

</script>
@endsection