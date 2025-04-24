
<?php 
	$i = 0; 
	$lsbels_tem = array();
	$color = array();
	
	$colors = array('#E6E9DA', '#FB1200', '#FF7A00', '#FFCF3C', '#FFE700', '#4EAB2B', '#045B17', '#056B8B', '#0089CE', '#30C9F3', '#E2E5D5');
?>

@foreach($ult_resultados as $ult_resultado)

	<div class="col-md-12 mg-t-25 mg-sm-t-0">
		
		<h6 class="card-body-title">Resultado para el simulador {{ $simuladores[$i] }}</h6>

		<div class="row" style="margin-bottom: 30px;">
			<div class="card col-md-6">				
				<div id="estSim{{ $ult_resultado->id }}" class="ht-200 ht-sm-250"></div>
			</div>			

			<div class="card card-body tx-white-8 bg-info bd-0 col-md-6">
				<div class="card-body">
					<h6 class="card-title" style="color: #fff;" >Estadisticas Generales</h6>
					<hr>
					<p class="card-text">Efectividad Total: <span> {{ number_format( $ult_resultado->efectividadTotal, 2, ',', '' ) }} % </span> <br>
					<p class="card-text">Preguntas Contestadas:  <span> {{ $ult_resultado->preguntasContestadas }} </span> <br>
					<p class="card-text">Preguntas Correctas: <span> {{ $ult_resultado->PreguntasCorrectas }} </span> </p>
				</div>

				<div class="card-footer">	
					<p class="card-text">Fecha de Presentación: <span> {{ $ult_resultado->fechaPresentacion }} </span> </p>

				</div>
			</div>

		</div>

	</div>
	
	<?php 
		$result_tems = array_map( 'floatval', explode( ";;",  $ult_resultado->efectividadTema )); 

		for($k=0; $k<count($result_tems); ++$k){

			$lsbels_tem[$k] = [ 'label'=>$temas[$i][$k], 'value' => number_format($result_tems[$k], 2, '.', ' ') ];
			$color[$k] = $colors[$k];
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
			element: 'estSim{{ $ult_resultado->id }}',
			data: info,
			colors: colrs,
			resize: true
		});

	</script>

	<?php ++$i; ?>
@endforeach

		



