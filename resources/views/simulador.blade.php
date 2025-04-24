
<?php 
	$indi = 1;
	$show = 'active';
	$controls = '';
	$show_men_tem = 'show';
	$position = 0;
	$pregbtn = 0;

	$ids_prg = '';

	$temsSimEspeci = 0;
	$temsSimBasic = 0;

	foreach ($simuladores as $simulador){
		$dat_Sim = $simulador;
	}
?>

<div class="row row-sm mg-t-15 mg-sm-t-20">
		
	<div class="col-lg-12">
		<h4 style="float: right; margin-top: 50px; margin-right: 30px; color: #ffc107; font-weight: 100" >
			
			<p id="countdown" style="margin-bottom: 0px;">
				<i class="fa fa-clock-o"></i>
				{{ $dat_Sim->duracion }}
			</p>
			<span style="color: #000; font-size: 14px;">
				{{ date('Y-d-m') }}
			</span>
		</h4>
	</div>




<script>
	//var end = new Date('12/17/2100 9:30 AM');

	var hora1 = ("{{ $dat_Sim->duracion }}").split(":");

	var end = new Date();
    end.setHours(end.getHours()+parseInt(hora1[0], 10));
    end.setMinutes(end.getMinutes()+parseInt(hora1[1], 10));
    end.setSeconds(end.getSeconds()+parseInt(hora1[1], 10));


    console.log(hora1);

    var _second = 1000;
    var _minute = _second * 60;
    var _hour = _minute * 60;
    var _day = _hour * 24;
    var timer;

    function showRemaining() {
        var now = new Date();
        var distance = end - now;
        if (distance < 0) {

            clearInterval(timer);
            document.getElementById('countdown').innerHTML = 'TIEMPO LIMITE!';
            finish();

            return;
        }
        var days = Math.floor(distance / _day);
        var hours = Math.floor((distance % _day) / _hour);
        var minutes = Math.floor((distance % _hour) / _minute);
        var seconds = Math.floor((distance % _minute) / _second);

        document.getElementById('countdown').innerHTML = '<i class="fa fa-clock-o"></i>';
        document.getElementById('countdown').innerHTML += hours + ':';
        document.getElementById('countdown').innerHTML += minutes + ':';
        document.getElementById('countdown').innerHTML += seconds;
    }

    timer = setInterval(showRemaining, 1000);
</script>




	<div class="col-lg-12 justify-content-md-center" id="c_preg">

		<div id="caruselPreguntas" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				
				<div class="carousel-inner">
			
					@for($i=0; $i<count($preguntas_total); ++$i)
						@foreach ($preguntas_total[$i] as $pregTem )
							@for( $j=0; $j<count($pregTem); ++$j )

							<div class="carousel-item {{ $show }}" data-pause="true" data-slide-to="{{ $j }}">

								<div class="card card-body">

							  		<div class="am-signin-box" style="width: 100%">
										<div class="row justify-content-md-center">
											
											<div class="col-lg-12" style="background-color: #fff; background-image: linear-gradient(to bottom, #fff 0%, #fff 100%); color: #000; font-size: 16px; font-weight: 100;">
												<div>
													<div id='divPrg'>
														<p>{{ $pregTem[$j]->pregunta }}</p>-
													</div>
												</div>
											</div>
											

											<div class="col-lg-8">
												<h6 class="tx-gray-800 mg-b-25">
													<label class="ckbox" style="font-size: 14px;font-weight: 100;">
														<input type="checkbox" id="opcA{{ $pregTem[$j]->id }}" 
															onclick="if(this.checked){
																document.getElementById('opcB{{ $pregTem[$j]->id }}').checked = false; 
																document.getElementById('opcC{{ $pregTem[$j]->id }}').checked = false; 
																document.getElementById('opcD{{ $pregTem[$j]->id }}').checked = false;
																document.getElementById('BtnPreg{{ $pregbtn }}').style.background = '#17a2b8';
																document.getElementById('BtnPreg{{ $pregbtn }}').style.color = '#fff';
															}" value="1">
														<span>A. {{ $pregTem[$j]->r1 }}</span>
													</label>										
												</h6>
												
												<h6 class="tx-gray-800 mg-b-25">
													<label class="ckbox" style="font-size: 14px;font-weight: 100;">
														<input type="checkbox" id="opcB{{ $pregTem[$j]->id }}" 
														onclick="if(this.checked){
																document.getElementById('opcA{{ $pregTem[$j]->id }}').checked = false; 
																document.getElementById('opcC{{ $pregTem[$j]->id }}').checked = false; 
																document.getElementById('opcD{{ $pregTem[$j]->id }}').checked = false;
																document.getElementById('BtnPreg{{ $pregbtn }}').style.background = '#17a2b8';
																document.getElementById('BtnPreg{{ $pregbtn }}').style.color = '#fff';
														}"
														value="2">
														<span>B. {{ $pregTem[$j]->r2 }}</span>
													</label>
												</h6>
												
												<h6 class="tx-gray-800 mg-b-25">
													<label class="ckbox" style="font-size: 14px;font-weight: 100;">
														<input type="checkbox" id="opcC{{ $pregTem[$j]->id }}" 
														onclick="if(this.checked){
																document.getElementById('opcA{{ $pregTem[$j]->id }}').checked = false; 
																document.getElementById('opcB{{ $pregTem[$j]->id }}').checked = false; 
																document.getElementById('opcD{{ $pregTem[$j]->id }}').checked = false;
																document.getElementById('BtnPreg{{ $pregbtn }}').style.background = '#17a2b8';
																document.getElementById('BtnPreg{{ $pregbtn }}').style.color = '#fff';
														}"
														value="3">
														<span>C. {{ $pregTem[$j]->r3 }}</span>
													</label>
												</h6>

												<h6 class="tx-gray-800 mg-b-25">
													<label class="ckbox" style="font-size: 14px;font-weight: 100;">
														<input type="checkbox" id="opcD{{ $pregTem[$j]->id }}" 
														onclick="if(this.checked){
																document.getElementById('opcA{{ $pregTem[$j]->id }}').checked = false; 
																document.getElementById('opcB{{ $pregTem[$j]->id }}').checked = false; 
																document.getElementById('opcC{{ $pregTem[$j]->id }}').checked = false;
																document.getElementById('BtnPreg{{ $pregbtn }}').style.background = '#17a2b8';
																document.getElementById('BtnPreg{{ $pregbtn }}').style.color = '#fff';
														}"
														value="4">
														<span>D. {{ $pregTem[$j]->r4 }}</span>
													</label>
												</h6>
											</div><!-- col-7 -->

											
										</div><!-- row -->
									</div>
								</div>

							</div>
							
							<?php 
								$controls .= 'preg'.$pregTem[$j]->id.' ';
								$show = ' '; 
								$ids_prg .= $pregTem[$j]->id.';;';
								++ $pregbtn;
							?>

							@endfor			
						@endforeach
					@endfor

				</div>
				
			</div>

			<a class="carousel-control-prev" href="#caruselPreguntas" role="button" data-slide="prev">
			<i class="fa fa-arrow-circle-left" style="color: #ccc; font-size: 30px;"></i>
			<span class="sr-only">Anterior</span>
			</a>
			<a class="carousel-control-next" href="#caruselPreguntas" role="button" data-slide="next">
			<i class="fa fa-arrow-circle-right" style="color: #000; font-size: 30px;"></i>
			<span class="sr-only">Siguente</span>
			</a>

		</div>
		
		<input id="id_sim" type="hidden" value="{{ $id_sim }}">
		<input id="ids_preg" type="hidden" value="{{ $ids_prg }}">
		<input id="urlEstad" type="hidden" value="{{ url('/simulador/estadisticas') }}">
		<a href="javascript:finish();" class="btn btn-block btn-compose" style="border-radius: 50px; background-color: #6ACCCB; color: #fff; width: 300px; margin-left: 40%; text-transform: uppercase; font-weight: 100; letter-spacing: 5px;">Terminar Simulador</a>

	</div>


	<div class="col-lg-12">
		
		<div id="accordion" class="accordion" role="tablist" aria-multiselectable="true">

		<div class="row">
			@foreach($simuladores as $simulador)
				@foreach( $simulador->temsSimu as $tem )


					<?php
					if($tem->BasiEspe == 1){
						if($temsSimBasic == 0){
						
							$html_bas = '<div class="col-md-6">';
							$html_bas .= '<h4 style="text-align: center; margin-bottom: 20px; margin-top: 90px; text-transform: uppercase; font-weight: 100; color: #000;     letter-spacing: 5px;"> Componente Básico </h4><hr style="width: 60%; border-top: 1.5px solid rgba(0, 0, 0, 0.1);">';
							++$temsSimBasic; 
						}

						$html_bas .= '
						<div class="col-md-12 mg-t-10 mg-md-t-0">
							<div id="tem'.$tem->id.'" class="collapse '.$show_men_tem.'" role="tabpanel" aria-labelledby="tem'.$tem->id.'">
	      						<div class="card-block pd-20 row">
		      						<div class="col-md-3 mg-t-10 mg-md-t-0">
		      							<p style="font-weight: 100; color: #000;">'.$tem->nombre.'</p>
		      						</div>
		      						
		      						<div class="col-md-9">';
		      			?>

									@for($i=0; $i<count($preguntas_total); ++$i)
										@foreach ($preguntas_total[$i] as $pregTem )
											@for( $j=0; $j<count($pregTem); ++$j )
												@if($pregTem[$j]->id_tema == $tem->id)
												
													<?php 
														$html_bas .= '<a id="BtnPreg'.$position.'" class="btn btn-outline-info btn-icon mg-r-5 rounded-circle" style="margin-bottom: 5px; width: 10px; height: 10px;" href="#caruselPreguntas" data-slide-to="'.$position.'" ></a>';
														++ $indi; 
														++ $position;
													?>

												@endif

											@endfor

											<?php $indi = 1; ?>

										@endforeach
									@endfor
						<?php			
									$html_bas .= '</div>

								</div>
							</div>
						</div>';
						



					}else if($tem->BasiEspe == 2){
						if($temsSimEspeci == 0){
						
							$html_esp = '<div class="col-md-6">';
							$html_esp .= '<h4 style="text-align: center; margin-bottom: 20px; margin-top: 90px; text-transform: uppercase; font-weight: 100; color: #000;     letter-spacing: 5px;"> Componente Especializado </h4><hr style="width: 60%; border-top: 1.5px solid rgba(0, 0, 0, 0.1);">';
							++$temsSimEspeci; 
						}

						$html_esp .= '
						<div class="col-md-12 mg-t-10 mg-md-t-0">
							<div id="tem'.$tem->id.'" class="collapse '.$show_men_tem.'" role="tabpanel" aria-labelledby="tem'.$tem->id.'">
	      						<div class="card-block pd-20 row">
		      						<div class="col-md-3 mg-t-10 mg-md-t-0">
		      							<p style="font-weight: 100; color: #000;">'.$tem->nombre.'</p>
		      						</div>
		      						
		      						<div class="col-md-9">';
		      			?>

									@for($i=0; $i<count($preguntas_total); ++$i)
										@foreach ($preguntas_total[$i] as $pregTem )
											@for( $j=0; $j<count($pregTem); ++$j )
												@if($pregTem[$j]->id_tema == $tem->id)
												
													<?php 
														$html_esp .= '<a id="BtnPreg'.$position.'" class="btn btn-outline-info btn-icon mg-r-5 rounded-circle" style="margin-bottom: 5px; width: 10px; height: 10px;" href="#caruselPreguntas" data-slide-to="'.$position.'" ></a>';
														++ $indi; 
														++ $position;
													?>

												@endif

											@endfor

											<?php $indi = 1; ?>

										@endforeach
									@endfor
						<?php			
									$html_esp .= '</div>
								</div>
							</div>
						</div>';
						

					}
				?>
				@endforeach
			@endforeach

			<?php
				$html_bas .= '</div>';
				$html_esp .= '</div>';

				print_r($html_bas);
				print_r($html_esp);
			?>
		</div>
	</div>
</div>