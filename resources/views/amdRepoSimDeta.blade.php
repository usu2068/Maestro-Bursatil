<div class="modal-header pd-y-20 pd-x-25">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body pd-25">

  <div class="col-lg-12">
  	@foreach($detLog as $deLog)
    <h5 class="tx-gray-800 mg-b-25">Detalles de la simulación para el examen {{ $deLog->simuladores->nombre }} </h5>

    <div class="row row-xs">
        <div class="col">
        	<table class="table">
			  <tbody>
			  	<tr>
			  		<th>Nombre Usuario:</th>
			  		<td>{{ $deLog->usuarios->name }}</td>
			  	</tr>
			  	<tr>
			  		<th>Efectividad Total:</th>
			  		<td>{{ round($deLog->efectividadTotal, 2) }} %</td>
			  	</tr>
			  	<tr>
			  		<th>Preguntas Contestadas:</th>
			  		<td>{{ $deLog->preguntasContestadas }}</td>
			  	</tr>
			  	<tr>
			  		<th>Preguntas Correctas:</th>
			  		<td>{{ $deLog->PreguntasCorrectas }}</td>
			  	</tr>
			  	<tr>
			  		<th>Tiempo Empleado:</th>
			  		<td>{{ $deLog->tiempo }}</td>
			  	</tr>			  				  				  	
			  </tbody>
			</table>
        </div>
        <div class="col">
        	
        	<div id="done" class="ht-200 ht-sm-250"></div>
	
			<?php 
				$i = 0; 
				$lsbels_tem = array();
				$color = array();
				
				$colors = array('#E6E9DA', '#FB1200', '#FF7A00', '#FFCF3C', '#FFE700', '#4EAB2B', '#045B17', '#056B8B', '#0089CE', '#30C9F3', '#E2E5D5');

				$result_tems = array_map( 'floatval', explode( ";;",  $deLog->efectividadTema )); 

				for($k=0; $k<count($result_tems); ++$k){

					$lsbels_tem[ $k ] = [ 'label'=>'Tema '.$k, 'value' => number_format($result_tems[$k], 2, '.', ' ') ];
					$color[ $k ] = $colors[ $k ];
				}
				
				$lsbels_temcode = json_encode($lsbels_tem);
				$colors_dona = json_encode($color);
			?>

			<script>

				var info = '{{$lsbels_temcode}}';
				var colrs = '{{$colors_dona}}';

				info = info.replace(/&quot;/g,'"');		
				colrs = colrs.replace(/&quot;/g, '"');

				info = JSON.parse(info);
				colrs = JSON.parse(colrs);

				new Morris.Donut({
					element: 'done',
					data: info,
					colors: colrs,
					resize: true
				});

			</script>

        </div>
    </div>
    @endforeach
  </div><!-- col-12 -->

</div>