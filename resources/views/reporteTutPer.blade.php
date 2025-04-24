@foreach($ult_resultados as $ult_resultado)

	<div class="col-md-12 mg-t-25 mg-sm-t-0">
		
		<h6 class="card-body-title">Avance del tutorial {{ $ult_resultado->tutoriales->nombre }}</h6>

		<div class="row" style="margin-bottom: 30px;">
			<div class="card card-body col-md-6" style="text-align: center;">
				<div class="card-body">
					<i class="fa fa-bar-chart tx-info mg-r-19" style="font-size: 100px"></i>
					<h2 class="mg-b-20 mg-sm-b-30">Porcentaje cubierto de este tema.<br><br>{{ round($porc, 2) }}%</h2>
					<div class="progress mg-b-20">

					  <div class="progress-bar progress-bar-striped bg-info wd-{{ round($porc) }}"
					  role="progressbar" aria-valuenow="{{ round($porc) }}" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
				</div>
			</div>			

			<div class="card card-body tx-white-8 bg-info bd-0 col-md-6">
				
				<div class="card-body">
					<h6 class="card-title" style="color: #fff;" >Estadisticas Generales</h6>
					<hr>
					<p class="card-text">Tiempo de Estudio: <span> {{ $ult_resultado->tiempoEstudio }} </span> <br>
					<p class="card-text">Temas Cubiertos:  <span> {{ $ult_resultado->temasVistos }} </span> <br>
					<p class="card-text">Ultimo Acceso: <span> {{ $ult_resultado->updated_at }} </span> </p>
				</div>

				<div class="card-footer">	
					<p class="card-text">Fecha de Presentación: <span> {{ $ult_resultado->updated_at }} </span> </p>
				</div>

			</div>

		</div>

	</div>
@endforeach