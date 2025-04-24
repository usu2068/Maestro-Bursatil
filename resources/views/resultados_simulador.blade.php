<?php 
	/*print_r($ids_preg);
	echo "<br>";
	print_r($corTem);
	echo "<br>";
	print_r($resp_corr);
	echo "<br>";
	print_r($resp_incorr);
	echo "<br>";
	print_r($preg_contest);
	echo "<br>";
	print_r($preg_not_contest);
	echo"<br>";
	print_r(count($prg_result));*/

	$show = 'active';

	//dd($nametems_bas);

?>




<div class="row row-sm mg-t-15 mg-sm-t-20">

	<div class="col-lg-12">

		<div class="row justify-content-md-center">
			<div class="col-lg-8" style="background-color: #fff; background-image: linear-gradient(to bottom, #fff 0%, #fff 100%); color: #000; font-size: 16px; font-weight: 100; text-align: center;">
				
				<h5 style="font-weight: 200; font-size: 30px;">Su prueba ha finalizado</h5>
				<p>A continuación se listan las respuestas a las preguntas que usted ha contestado. Una vez revisadas, puede revisar su resultado final haciendo click en "ver resultado". tambien puede consultarlo haciendo click en el menu principal.</p>

			</div>
		</div>
		

		<div id="caruselPreguntas" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
			
				@for($j=0; $j < count($prg_result); ++$j)

					<div class="carousel-item {{ $show }}" data-slide-to="{{ $j }}">

						<div class="card card-body">

					  		<div class="am-signin-box" style="width: 100%">
								<div class="row justify-content-md-center">
									
									<div class="col-lg-8" style="background-color: #fff; background-image: linear-gradient(to bottom, #fff 0%, #fff 100%); color: #000; font-size: 16px; font-weight: 100;">
										<div>
											<hr>
											<div id='divPrg'>
												<p>{{ $prg_result[$j] }}</p>											
											</div>
										</div>
									</div>

									<div class="col-lg-8" style="background-color: #fff; background-image: linear-gradient(to bottom, #fff 0%, #fff 100%); color: #000; font-size: 16px; font-weight: 100; text-align: center;">
										<h5 style="font-weight: 200;">Respuesta</h5>
										<p>{{ $corr_incorr[$j] }}</p>
										
										<br>

										<h5 style="font-weight: 200;">Explicación</h5>
										<p>{{ $expli_result[$j] }}</p>
									</div>

								</div><!-- row -->
							</div>
						</div>

					</div>

					<?php $show = ''; ?>

				@endfor	

			<a class="carousel-control-prev" href="#caruselPreguntas" role="button" data-slide="prev">
				<i class="fa fa-arrow-circle-left" style="color: #000; font-size: 30px;"></i>
				<span class="sr-only">Anterior</span>
			</a>
			<a class="carousel-control-next" href="#caruselPreguntas" role="button" data-slide="next">
			<i class="fa fa-arrow-circle-right" style="color: #000; font-size: 30px;"></i>
			<span class="sr-only">Siguente</span>
			</a>		
			</div>
		</div>
	</div>

	<a href="" class="btn btn-block btn-compose" data-toggle="modal" data-target="#modalResultados" style="border-radius: 50px; background-color: #FC663D; color: #fff; width: 300px; margin-left: 40%; text-transform: uppercase; font-weight: 100; letter-spacing: 5px;">Ver Resultados</a>
</div>

<div id="modalResultados" class="modal fade" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="width: 100%;" role="document">
    <div class="modal-content tx-size-sm">

      <div class="modal-header pd-x-20" style="background-color: #6ACCCB;">
        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse" style="font-weight: 100; font-size: 16px;">Resultados de esta Prueba</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">
          	<i class="fa fa-times-circle" style="color: #fff; opacity: 1; font-size: 30px;"></i>
          </span>
        </button>
      </div>

      <div class="modal-body pd-20" style="background-color: #fff;">

        <div class="col-lg-12">

			<div class="table-responsive">
				<table class="table mg-b-0" style="background-color: #fff;">
					<tbody>
						
					@for($i=0; $i<count($efec_tem); ++$i)
						<?php 
							if(!empty($nametems_bas)){
								if(!isset($nametems_bas[ ($i+1) ]) ){ 

									if( ( $i-count($nametems_bas) ) == 0){?>

										<tr>
											<td colspan="3">
												<h4 style="text-align: center; margin-bottom: 20px; margin-top: 10px; text-transform: uppercase; font-weight: 100; color: #000;     letter-spacing: 5px;"> Componente Especializado </h4><hr style="width: 60%; border-top: 1.5px solid rgba(0, 0, 0, 0.1);">
											</td>
										</tr>

										<tr>
											<th width="176px">Módulo</th>
											<th width="450px" >-</th>
											<th width="100px">Resultado</th>
										</tr>

									<?php } ?>
								
									<tr>
										<td style="font-weight: 100; color: #000;">{{ $nametems_esp[ ( ( $i-count($nametems_bas) )+1 ) ] }}</td>
										<td>

											<div class="progress mg-b-20" style="border-radius: 50px;">
												<div class="progress-bar progress-bar-striped wd-{{  intval($efec_tem[$i]) }}p" style="border-radius: 50px; background-color: #6ACB9A;" role="progressbar" aria-valuenow="{{ intval($efec_tem[$i]) }}" aria-valuemin="0" aria-valuemax="100"></div>
											</div>

										</td>
										<td style="font-weight: 500; color: #000;">{{ round($efec_tem[$i], 2) }}%</td>
									</tr>

								<?php }else{ 

									if($i == 0){?>

										<tr>
											<td colspan="3">
												<h4 style="text-align: center; margin-bottom: 20px; margin-top: 10px; text-transform: uppercase; font-weight: 100; color: #000;     letter-spacing: 5px;"> Componente Básico </h4><hr style="width: 60%; border-top: 1.5px solid rgba(0, 0, 0, 0.1);">
											</td>
										</tr>

										<tr>
											<th width="176px">Módulo</th>
											<th width="450px" >-</th>
											<th width="100px">Resultado</th>
										</tr>

									<?php } ?>

									<tr>
										<td style="font-weight: 100; color: #000;">{{ $nametems_bas[ ($i+1) ] }}</td>
										<td>

											<div class="progress mg-b-20" style="border-radius: 50px;">
												<div class="progress-bar progress-bar-striped wd-{{  intval($efec_tem[$i]) }}p" style="border-radius: 50px; background-color: #6ACB9A;" role="progressbar" aria-valuenow="{{ intval($efec_tem[$i]) }}" aria-valuemin="0" aria-valuemax="100"></div>
											</div>

										</td>
										<td style="font-weight: 500; color: #000;">{{ round($efec_tem[$i], 2) }}%</td>
									</tr>

							<?php }
							}else{
						?>
							<tr>
								<td style="font-weight: 100; color: #000;">{{ $nametems[ ($i+1) ] }}</td>
								<td>

									<div class="progress mg-b-20" style="border-radius: 50px;">
										<div class="progress-bar progress-bar-striped wd-{{  intval($efec_tem[$i]) }}p" style="border-radius: 50px; background-color: #6ACB9A;" role="progressbar" aria-valuenow="{{ intval($efec_tem[$i]) }}" aria-valuemin="0" aria-valuemax="100"></div>
									</div>

								</td>
								<td style="font-weight: 500; color: #000;">{{ round($efec_tem[$i], 2) }}%</td>
							</tr>

						<?php } ?>

					@endfor

						<tr>
							<td style="font-weight: 100; color: #000; font-size: 20px;">Efectividad Total</td>
							<td>
								<div class="progress mg-b-20" style="border-radius: 50px;">
									<div class="progress-bar progress-bar-striped wd-{{  intval($efec_tot) }}p" style="border-radius: 50px; background-color: #6ACB9A;" role="progressbar" aria-valuenow="{{ intval($efec_tot) }}" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</td>
							<td style="font-weight: 500; color: #000; font-size: 20px;">{{ round($efec_tot, 2) }}%</td>
						</tr>

					</tbody>
				</table>
			</div>


      </div><!-- modal-body -->

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div><!-- modal-dialog -->
</div>