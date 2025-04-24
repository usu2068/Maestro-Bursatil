<?php 
    $cont=0;
    $aprov = 0;
    $activ = 1;

    $num_pregs = 0;
    $ids_preg = array();

    $btn_sim = '';
?>

<div class="row row-sm mg-t-15 mg-sm-t-20" style="margin-top: 70px; margin-left: 20px; margin-right: 20px; margin-bottom: 40px">


    @if($tipTuto === 'TUTCN')

        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" style="padding-left: 30px">
            <div class="card-header bg-transparent pd-20">
                <h6 class="card-title tx-uppercase tx-12 mg-b-0" style="text-transform: capitalize; font-size: 28px; font-weight: 100;">{{ $papTutos->nombre }}</h6>
            </div>

            <div class="card bg-dark tx-white bd-0" id="video">

                @for( $i = 0; $i<count($tutorias); ++$i)

                    @foreach($tutorias[$i] as $tutoria)
                        @foreach( $tutoria->temsTuto as $tem )
                            @if( $cont == 0)
                            <iframe src="https://player.vimeo.com/video/{{ $tem->video }}" width="100%" height="400" frameborder="0" allowfullscreen></iframe>
                            <?php $cont++; ?>
                            @endif
                        @endforeach
                    @endforeach

                @endfor
            </div>

            <a href="javascript:clockTut()" id="btn-comenzar" style="display: none">Comenzar</a>

            <div class="card-header bg-transparent pd-20">
                <h6 class="card-title tx-uppercase tx-12 mg-b-0" style="text-transform: capitalize; font-size: 20px; font-weight: 100;">Presentación de Apoyo</h6>
            </div>
            <div class="card bg-dark tx-white bd-0" style="background-color: #27496C !important;" id='presentacion'>

                <?php 
                    $cont = 0;
                ?> 

                @for( $i = 0; $i<count($tutorias); ++$i)

                    @foreach($tutorias[$i] as $tutoria)
                        @foreach( $tutoria->temsTuto as $tem )
                            @if( $cont == 0)

                                @if($tem->presentacion == '0')
                                    <img width="65%" style="margin: 50px; align-self: center;" src="images/logo.png" />
                                @else
                                    <iframe allowfullscreen allow="fullscreen" style="border:none;width:100%;height:326px;" src="//e.issuu.com/embed.html?d={{ $tem->presentacion }}&hideIssuuLogo=true&hideShareButton=true&pageLayout=singlePage&u=consultorias-riesgo"></iframe>
                                @endif
                                
                                <?php $cont++; ?>

                            @endif
                        @endforeach
                    @endforeach

                @endfor
            </div>

        </div>

        <!-- videos relacionados -->

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style="padding-right: 30px; border-left: 1px solid; border-left-color: #ccc;">
            
            <!-- Cronometro -->
            <div class="card pd-20" style="border-bottom: 1px solid; border-bottom-color: #ccc; ">
                <input id="urlTimeTut" type="hidden" value="{{ url('/tutorial/timer') }}" >
                <div id="guardaAv"></div>

                <?php 
                    $cont=0;
                ?>

                @for( $i = 0; $i<count($tutorias); ++$i)

                    @foreach($tutorias[$i] as $tutoria)    
                        @if( $cont == 0)                
                            <input id="idTut" type="hidden"  value="{{ $tutoria->id }}">

                            <div class="d-flex mg-b-10" id="timer">
                                <div class="bd-r pd-r-10" style="padding-left: 20%;">
                                    <label class="tx-12">Horas</label>
                                    <p class="tx-lato tx-inverse tx-bold" id="hour">{{ $time[$i][0][0] }}</p>
                                </div>
                                <div class="bd-r pd-x-10">
                                    <label class="tx-12">Minutos</label>
                                    <p class="tx-lato tx-inverse tx-bold" id="minute">{{ $time[$i][0][1] }}</p>
                                </div>
                                <div class="pd-l-10">
                                    <label class="tx-12">Segundos</label>
                                    <p class="tx-lato tx-inverse tx-bold" id="second">{{ $time[$i][0][2] }}</p>
                                </div>
                            </div><!-- d-flex -->

                            <?php $cont++; ?>
                        @endif
                    @endforeach

                @endfor
            </div>
            <a href="javascript:clockTut()" id="btn-comenzar" style="display: none">Comenzar</a>
            <!-- Final Cronometro -->


            <!-- Programas Relacionados -->
            <div class="card-header bg-transparent pd-20">
                <h6 class="card-title tx-uppercase tx-12 mg-b-0" style="font-size: 16px;font-weight: 100;text-align: center;">contenido del programa</h6>
            </div>

            <input id="urlV" type="hidden" value="{{ url('/tutorial/video') }}" >
            <input id="urlP" type="hidden" value="{{ url('/tutorial/poster') }}" >

            <div class="list-group list-group-chat">

                <?php 
                    $cont=0;

                    $image_url = parse_url('https://vimeo.com/video/'.$tem->video);
                    $refvideo = '263373143';

                    if($image_url['host'] == 'www.vimeo.com' || $image_url['host'] == 'vimeo.com'){
                        $url = 'https://vimeo.com/api/v2/video/'.$refvideo.'.json';

                        $curl = curl_init($url);
                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
                        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
                        $return = curl_exec($curl);
                        //dd($return);
                        curl_close($curl); 
                        $return = json_decode($return);

                    } else {
                        echo "<div id='not_supported'>Video Provider Not Supported. Please, check URL.</div>";
                    }
                    
                ?>

                @for( $i = 0; $i<count($tutorias); ++$i)

                    <h6 style="font-weight: 100">Componente Separador</h6>
                    
                    <ul class="nav am-sideleft-menu">

                        @foreach($tutorias[$i] as $tutoria)   
                            
                            <li class="nav-item">
                              <a href="#" class="nav-link with-sub wsub">
                                <i class="fa  fa-list-ul"></i>
                                <span>{{ $tutoria->nombre }}</span>
                              </a>
                              <ul class="nav-sub">

                                @foreach( $tutoria->temsTuto as $tem )

                                <li class="nav-item">
                                    <a href="javascript:next_tem('{{ $tem->id }}')" class="list-group-item" style="font-size: 12px; color:#000; font-weight: 100">
                                        <div class="d-flex align-items-center">

                                            <img src="{{ $return[0]->thumbnail_small }}" class="wd-42" alt="" style="background-color: #000">

                                            <div class="mg-l-10">
                                                <h6 style="font-weight: 100">{{ $tem->nombre }}</h6>
                                                <span>{{ $tem->duracion }}</span>
                                            </div>

                                        </div>
                                    </a>
                                </li>

                                @endforeach

                              </ul>
                            </li><!-- nav-item -->

                        @endforeach

                    </ul>

                    
                @endfor

        </div>

    @elseif($tipTuto === 'TUTE')

    <!-- VIDEO Y PRESENTACION INICIAL DEL  TUTORIAL -->
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" style="padding-left: 30px">
            <div class="card-header bg-transparent pd-20">
                @foreach($tutorias as $tutoria)
                    <h6 class="card-title tx-uppercase tx-12 mg-b-0" style="text-transform: capitalize; font-size: 28px; font-weight: 100;">{{ $tutoria->nombre }}</h6>
                @endforeach
            </div>
            <div class="card bg-dark tx-white bd-0" id="video">

                @foreach($tutorias as $tutoria)
                    @foreach( $tutoria->temsTuto as $tem )
                        @if( $cont == 0)
                        <iframe src="https://player.vimeo.com/video/{{ $tem->video }}" width="100%" height="400" frameborder="0" allowfullscreen></iframe>
                        <?php $cont++; ?>
                        @endif
                    @endforeach
                @endforeach
            </div>

            <a href="javascript:clockTut()" id="btn-comenzar" style="display: none">Comenzar</a>

            <div class="card-header bg-transparent pd-20">
                <h6 class="card-title tx-uppercase tx-12 mg-b-0" style="text-transform: capitalize; font-size: 20px; font-weight: 100;">Presentación de Apoyo</h6>
            </div>

            <?php $cont=0; ?>

            <div class="card bg-dark tx-white bd-0" style="background-color: #27496C !important;" id='presentacion'>
                @foreach($tutorias as $tutoria)
                    @foreach( $tutoria->temsTuto as $tem )
                        @if( $cont == 0)

                            @if($tem->presentacion == '0')
                                <img width="65%" style="margin: 50px; align-self: center;" src="images/logo.png" />
                            @else
                                <iframe 
                                    allowfullscreen allow="fullscreen" 
                                    style="border:none;width:100%;height:326px;" 
                                    src="//e.issuu.com/embed.html?backgroundColor=%2354bcf4&d={{$tem->presentacion}}&hideIssuuLogo=true&hideShareButton=true&pageLayout=singlePage&u=consultorias-riesgo">
                                </iframe>
                            @endif

                            <?php $cont++; ?>

                        @endif
                    @endforeach
                @endforeach
            </div>
        </div>
    <!-- FIN DE LA MAQUETACION DE PRESENTACIÓN Y VIDEO -->

    <!-- LISTADO DE VIDEOS QUE CONTIENE EL CURSO -->
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style="padding-right: 30px; border-left: 1px solid; border-left-color: #ccc;">

            <div class="card pd-20" style="border-bottom: 1px solid; border-bottom-color: #ccc; ">
                <input id="urlTimeTut" type="hidden" value="{{ url('/tutorial/timer') }}" >
                <div id="guardaAv"></div>
                @foreach($tutorias as $tutoria)
                    <input id="idTut" type="hidden"  value="{{ $tutoria->id }}">
                @endforeach

                <div class="d-flex mg-b-10" id="timer">
                    <div class="bd-r pd-r-10" style="padding-left: 20%;">
                        <label class="tx-12">Horas</label>
                        <p class="tx-lato tx-inverse tx-bold" id="hour">{{ $time[0] }}</p>
                    </div>
                    <div class="bd-r pd-x-10">
                        <label class="tx-12">Minutos</label>
                        <p class="tx-lato tx-inverse tx-bold" id="minute">{{ $time[1] }}</p>
                    </div>
                    <div class="pd-l-10">
                        <label class="tx-12">Segundos</label>
                        <p class="tx-lato tx-inverse tx-bold" id="second">{{ $time[2] }}</p>
                    </div>
                </div><!-- d-flex -->

            </div><!-- card -->

            <a href="javascript:clockTut()" id="btn-comenzar" style="display: none">Comenzar</a>

            <div class="card-header bg-transparent pd-20">
                <h6 class="card-title tx-uppercase tx-12 mg-b-0" style="font-size: 16px;font-weight: 100;text-align: center;">contenido del programa</h6>
            </div>

            <input id="urlV" type="hidden" value="{{ url('/tutorial/video') }}" >
            <input id="urlP" type="hidden" value="{{ url('/tutorial/poster') }}" >
            <input id="urlAP" type="hidden" value="{{ url('/tutorial/apoyo') }}" >

            <div class="list-group list-group-chat">
                @foreach($tutorias as $tutoria)
                    @foreach( $tutoria->temsTuto as $tem )


                    <?php
                        $image_url = parse_url('https://vimeo.com/video/'.$tem->video);
                        $refvideo = '263373143';

                        if($image_url['host'] == 'www.vimeo.com' || $image_url['host'] == 'vimeo.com'){
                            
                            $url = 'https://vimeo.com/api/v2/video/'.$refvideo.'.json';
                            $curl = curl_init($url);
                            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                            curl_setopt($curl, CURLOPT_TIMEOUT, 30);
                            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
                            $return = curl_exec($curl);
                            curl_close($curl); 
                            $return = json_decode($return);

                        } else {
                            echo "<div id='not_supported'>El navegador no soporta el video. Porfavor, revise la URL.</div>";
                        }
                    ?>


                    @if($activ == 1)

                        <a href="javascript:next_tem_esp('{{ $tem->id }}')" class="list-group-item" style="font-size: 12px; color:#000; font-weight: 100">
                          <div class="d-flex align-items-center">
                            <img src="{{ $return[0]->thumbnail_small }}" class="wd-42" alt="" style="background-color: #000">
                            <div class="mg-l-10">
                              <h6 style="font-weight: 100">{{ $tem->nombre }}</h6>
                              <span>{{ $tem->duracion }}</span>
                            </div>
                          </div><!-- d-flex -->
                        </a><!-- list-group-item -->  

                    @else

                        <a href="" class="list-group-item" style="font-size: 12px; color:#000; font-weight: 100" data-toggle="modal" data-target="#modalAlertQUIZ">
                          <div class="d-flex align-items-center">
                            <img src="{{ $return[0]->thumbnail_small }}" class="wd-42" alt="" style="background-color: #000">
                            <div class="mg-l-10">
                              <h6 style="font-weight: 100">{{ $tem->nombre }}</h6>
                              <span>{{ $tem->duracion }}</span>
                            </div>
                          </div><!-- d-flex -->
                        </a><!-- list-group-item -->

                    @endif               

                    <?php
                        
                        for($q=0; $q<count($quizsTuto); ++$q){

                            foreach ($quizsTuto[$q] as $quiz) {

                                $posultq = count($quizsTuto) - 1;                              

                                if($ids_quizs[$q]->id_contenido == $tem->id){
                                    
                                    //Si el quiz tiene resultados registrados para el usuario
                                    if(!empty($quizPres[$q][0])){
                                        //Recorre uno a uno los resultados de la prueba
                                        for($i = 0; $i<count($quizPres[$q]); ++$i){
                                            if(  ( intval( $quizPres[$q][$i]->resultado ) ) >= 3 ){
                                                $aprov ++;

                                                if($q === $posultq){
                                                    
                                                    $jsript = "javascript:carga_simu('SIM;;$tutoria->id_pap')";

                                                    $simulator = DB::table('mb04_simulador')->where(['id'=>$tutoria->id_pap])->first();

                                                    $btn_sim = '
                                                    <div class="card-header bg-transparent pd-20">
                                                        <h6 class="card-title tx-uppercase tx-12 mg-b-0" style="font-size: 16px;font-weight: 100;text-align: center;">examen final del programa</h6>
                                                    </div>

                                                    <a href="'.$jsript.'" class="list-group-item" style="font-size: 12px;color: #fff;font-weight: 100; background: #f9a134;">
                                                      <div class="d-flex align-items-center">
                                                        <i class="fa fa-check-square-o wd-72 tx-52 mg-r-20" style="text-align: center;"></i>
                                                        
                                                        <div class="mg-l-10">
                                                          <h6 style="font-weight: 400">'.$simulator->nombre.'</h6>
                                                          <span>'.$simulator->duracion.'</span>
                                                        </div>
                                                      </div><!-- d-flex -->
                                                    </a><!-- list-group-item -->  
                                                    ';   
                                                }

                                            }

                                        }

                                        if( $aprov != 0 ) $activ = 1;
                                        else $activ = 0;

                                        $aprov = 0;

                                    }else $activ = 0;
                                }
                            }
                        }

                    ?>
                  

                    @endforeach
                @endforeach

                <?php echo $btn_sim; ?>

                <!-- MODAL ALERTA EN CASO DE NO ESTAR HABILITADO AUN PARA INGRESAR AL MODULO -->
                <div id="modalAlertQUIZ" class="modal fade">
                  <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content bd-0 tx-14">
                      
                        <div class="alert alert-warning pd-y-20" role="alert" style="margin-bottom: 0px;">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                            <div class="d-sm-flex align-items-center justify-content-start">
                              <i class="icon ion-alert-circled alert-icon tx-52 tx-warning mg-r-20"></i>
                              <div class="mg-t-20 mg-sm-t-0">
                                <h5 class="mg-b-2 tx-warning">Upps! Algo ocurrio.</h5>
                                <p class="mg-b-0 tx-gray">Por favor presente y apruebe el quiz de la unidad anterior para que esta sea habilitada.</p>
                              </div>
                            </div><!-- d-flex -->
                        </div>

                    </div>
                  </div><!-- modal-dialog -->
                </div><!-- FIN MODAL -->

            </div>
        </div>
    <!-- FIN DE LA MAQUETACIÓN DEL LISTADO DE VIDEOS -->

        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"></div>

    <!-- CONTENEDOR DE EL QUIZ DEL TEMA -->
        <div id="divQuiz" class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style="border: 2px solid; border-color: #84DBDC; margin-top: 40px; padding: 50px;">
            <div class="media">
                <div class="d-flex mg-r-10 wd-50">
                    <i class="fa fa-pencil tx-info tx-40 tx" style="color: #FF1400;"></i>
                </div><!-- d-flex -->
                <div class="media-body">
                    <h6 class="tx-inverse">Quiz</h6>
                    <p class="mg-b-0">
                        Realice una prueba y evalue su desempeño en esta unidad. Pasar esta evaluación es necesaria para poder continuar con el curso.
                    </p>

                    <a href="" class="btn btn-block btn-compose" data-toggle="modal" data-target="#modalQUIZ" style="border-radius: 50px; color: #000; width: 300px; margin-top: 20px; text-transform: uppercase; font-weight: 100; letter-spacing: 5px; border: 1px solid; border-color: #FF1400;">Presentar Quiz</a>
   
                </div><!-- media-body -->
            </div>

            <!-- MODAL QUE CONTIENE EL QUIZ DEL TEMA -->
            <div id="modalQUIZ" class="modal fade">
                <div class="modal-dialog modal-md" role="document">
                    <div id="divQcont" class="modal-content bd-0 tx-14" style="background: transparent;">        

                        <?php 
                            $cont=0; 
                            $style_act='active';
                        ?>
                        
                        @foreach($tutorias as $tutoria)
                            @foreach( $tutoria->temsTuto as $tem )
                                @if( $cont == 0)
                                    <?php 
                                        for( $r = 0; $r < count($quizsTuto); ++$r ){
                                            if( $tem->id == $ids_quizs[$r]->id_contenido ){
                                                
                                                //print_r( $quizsTuto[$r][0]->name );

                                                $pregs = DB::table('mb04_preguntas_quizs')->where([
                                                    'id_quizs' => $quizsTuto[$r][0]->id
                                                ])->get(); ?>

                                                <div id="carouselPregsQuiz" class="carousel slide carousel-fade" data-ride="carousel" data-interval="99999999">
        
                                                    <div class="carousel-inner">
                                                
                                                
                                                    @foreach ( $pregs as $preg ) 

                                                        <div class="carousel-item {{ $style_act }}">

                                                            <div class="col-md mg-t-20 mg-md-t-0" style="padding: 0px;">
                                                                <div class="card bg-dark tx-white bd-0">
                                                                    <div class="card-body" style="padding: 40px;">
                                                                        <h5 class="card-body-title tx-white" style="font-size: 20px;">{{ $preg->pregunta }}</h5>
                                                                        <br><br>
                                                                          
                                                                        <div class="row">
                                                                            <div class="col-sm-1">
                                                                                <input id="opcA_{{$preg->id}}" name="rdio{{$preg->id}}" type="radio">
                                                                            </div>
                                                                            <div class="col-sm-11"> 
                                                                                <span class="card-subtitle tx-normal mg-b-15 tx-white-8" style="font-size: 16px; padding-left: 0px;">
                                                                                    A. {{ $preg->r1 }}
                                                                                </span>
                                                                            </div>
                                                                        </div>

                                                                        <br>

                                                                        <div class="row">
                                                                          <div class="col-sm-1">  
                                                                            <input id="opcB_{{$preg->id}}" name="rdio{{$preg->id}}" type="radio">
                                                                          </div>                                                                          
                                                                          <div class="col-sm-11">
                                                                              <span class="card-subtitle tx-normal mg-b-15 tx-white-8" style="font-size: 16px; padding-left: 0px;">
                                                                                B. {{ $preg->r2 }}
                                                                              </span>
                                                                          </div>
                                                                        </div>
                                                                        
                                                                        <br>

                                                                        <div class="row">
                                                                          <div class="col-sm-1">  
                                                                            <input id="opcC_{{$preg->id}}" name="rdio{{$preg->id}}" type="radio">
                                                                          </div>
                                                                          <div class="col-sm-11">
                                                                              <span class="card-subtitle tx-normal mg-b-15 tx-white-8" style="font-size: 16px; padding-left: 0px;">
                                                                                C. {{ $preg->r3 }}
                                                                              </span>
                                                                          </div>
                                                                        </div>

                                                                        <br>

                                                                        <div class="row">
                                                                          <div class="col-sm-1">
                                                                            <input id="opcD_{{$preg->id}}" name="rdio{{$preg->id}}" type="radio">
                                                                          </div>                                                                          
                                                                          <div class="col-sm-11">
                                                                              <span class="card-subtitle tx-normal mg-b-15 tx-white-8" style="font-size: 16px; padding-left: 0px;">
                                                                                D. {{ $preg->r4 }}
                                                                              </span>
                                                                          </div>    
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div><!-- card -->
                                                            </div>
                                                            
                                                        </div>

                                                        <?php 
                                                            $style_act = '';
                                                            $ids_preg[$num_pregs] = $preg->id;
                                                            $id_quiz = $quizsTuto[$r][0]->id;

                                                            ++ $num_pregs;
                                                        ?>

                                                    @endforeach 
                                                        
                                                        <?php 
                                                            $ids_preg = json_encode($ids_preg);
                                                        ?>

                                                        <!-- ULTIMO SLIDE -->
                                                        <div class="carousel-item">

                                                            <div class="col-md mg-t-20 mg-md-t-0" style="padding: 0px;">
                                                                <div class="card bg-dark tx-white bd-0">
                                                                    <div class="card-body" style="padding: 40px;">
                                                                        

                                                                        <div class="d-sm-flex align-items-center justify-content-start">
                                                                            <i class="icon ion-ios-information alert-icon tx-52 mg-r-20"></i>
                                                                            <div class="mg-t-20 mg-sm-t-0">
                                                                                <h5 class="mg-b-2">Bien! ya termino la prueba para este modulo del curso.</h5>
                                                                                <p class="mg-b-0 tx-gray">Acepte y envie susrespuestas para que el sistema califique su prueba.</p>

                                                                                <div id="msj_env_inf" style="margin-top: 20px;"></div>
                                                                                <input id="urlenvresp" type="hidden" value="{{ url('/tutorial/envquiz') }}" >

                                                                                <a href="javascript:env_respu({{ $id_quiz }}, {{ $ids_preg }} )" role="button" data-slide="prev" class="btn btn-block btn-compose" style="border-radius: 50px; color: #fff; width: 200px; margin-top: 20px; margin-left: 10px; text-transform: uppercase; font-weight: 100; letter-spacing: 2px; border: 1px solid; border-color: #FF1400; background: #FF1400;">Enviar Respuestas</a>
                                                                            </div>
                                                                        </div>

                                                                        
                                                                    </div>
                                                                </div><!-- card -->
                                                            </div>
                                                            
                                                        </div>
                                                    </div>

                                                    <div class="row">

                                                        <div class="col-md-6">
                                                            <a href="#carouselPregsQuiz" role="button" data-slide="prev" class="btn btn-block btn-compose" style="border-radius: 50px; color: #fff; width: 200px; margin-top: 20px; margin-left: 10px; text-transform: uppercase; font-weight: 100; letter-spacing: 2px; border: 1px solid; border-color: #f9a134; background: #f9a134;">Pregunta Anterior</a>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <a href="#carouselPregsQuiz" role="button" data-slide="next" class="btn btn-block btn-compose" style="border-radius: 50px; color: #fff; width: 200px; margin-top: 20px; margin-left: 10px; text-transform: uppercase; font-weight: 100; letter-spacing: 2px; border: 1px solid; border-color: #208637; background: #208637;">Siguiente Pregunta</a>
                                                        </div>

                                                    </div>

                                                </div>
                                                
                                                <?php 

                                                $cont++; 
                                            }
                                        }
                                    ?>
                                @endif
                            @endforeach
                        @endforeach
                        

                    </div>
                </div><!-- modal-dialog -->
            </div>
            <!-- FIN MODAL -->   
        </div>
    <!-- FIN DEL CONTENEDOR DEL QUIZ -->
        
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"></div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style="border: 2px solid;  border-color: #84DBDC; margin-top: 40px; padding: 50px;">

            <div class="media">
                <div class="d-flex mg-r-10 wd-50">
                    <i class="fa fa-file-text-o tx-info tx-40 tx" style="color: #FF1400;"></i>
                </div><!-- d-flex -->
                <div class="media-body">
                    <h6 class="tx-inverse">Material de apoyo</h6>
                    <p class="mg-b-0">A continuación encontrara el material de apoyo dispuesto para esta unidad:</p>
                    <br>
                    <ul>
                        <li>Doc 1</li>
                        <li>Docx 2</li>
                    </ul>

                </div><!-- media-body -->
            </div>

            <!--h5></h5>
            <p>A continuación encontrara el material de apoyo dispuesto para esta unidad:
                <ul>
                    <li>Doc 1</li>
                    <li>Docx 2</li>
                </ul-->
        </div>
        
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"></div>

    @else

        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" style="padding-left: 30px">
            <div class="card-header bg-transparent pd-20">
                @foreach($tutorias as $tutoria)
                    <h6 class="card-title tx-uppercase tx-12 mg-b-0" style="text-transform: capitalize; font-size: 28px; font-weight: 100;">{{ $tutoria->nombre }}</h6>
                @endforeach
            </div>
            <div class="card bg-dark tx-white bd-0" id="video">

                @foreach($tutorias as $tutoria)
                    @foreach( $tutoria->temsTuto as $tem )
                        @if( $cont == 0)
                        <iframe src="https://player.vimeo.com/video/{{ $tem->video }}" width="100%" height="400" frameborder="0" allowfullscreen></iframe>
                        <?php $cont++; ?>
                        @endif
                    @endforeach
                @endforeach
            </div>

            <a href="javascript:clockTut()" id="btn-comenzar" style="display: none">Comenzar</a>

            <div class="card-header bg-transparent pd-20">
                <h6 class="card-title tx-uppercase tx-12 mg-b-0" style="text-transform: capitalize; font-size: 20px; font-weight: 100;">Presentación de Apoyo</h6>
            </div>
            <div class="card bg-dark tx-white bd-0" style="background-color: #27496C !important;" id='presentacion'>
                <img width="65%" style="margin: 50px; align-self: center;" src="images/logo.png" />
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style="padding-right: 30px; border-left: 1px solid; border-left-color: #ccc;">

            <div class="card pd-20" style="border-bottom: 1px solid; border-bottom-color: #ccc; ">
                <input id="urlTimeTut" type="hidden" value="{{ url('/tutorial/timer') }}" >
                <div id="guardaAv"></div>
                @foreach($tutorias as $tutoria)
                    <input id="idTut" type="hidden"  value="{{ $tutoria->id }}">
                @endforeach

                <div class="d-flex mg-b-10" id="timer">
                    <div class="bd-r pd-r-10" style="padding-left: 20%;">
                        <label class="tx-12">Horas</label>
                        <p class="tx-lato tx-inverse tx-bold" id="hour">{{ $time[0] }}</p>
                    </div>
                    <div class="bd-r pd-x-10">
                        <label class="tx-12">Minutos</label>
                        <p class="tx-lato tx-inverse tx-bold" id="minute">{{ $time[1] }}</p>
                    </div>
                    <div class="pd-l-10">
                        <label class="tx-12">Segundos</label>
                        <p class="tx-lato tx-inverse tx-bold" id="second">{{ $time[2] }}</p>
                    </div>
                </div><!-- d-flex -->

            </div><!-- card -->
            <a href="javascript:clockTut()" id="btn-comenzar" style="display: none">Comenzar</a>

            <div class="card-header bg-transparent pd-20">
                <h6 class="card-title tx-uppercase tx-12 mg-b-0" style="font-size: 16px;font-weight: 100;text-align: center;">contenido del programa</h6>
            </div>

            <input id="urlV" type="hidden" value="{{ url('/tutorial/video') }}" >
            <input id="urlP" type="hidden" value="{{ url('/tutorial/poster') }}" >

            <div class="list-group list-group-chat">
                @foreach($tutorias as $tutoria)
                    @foreach( $tutoria->temsTuto as $tem )


                    <?php

                    $image_url = parse_url('https://vimeo.com/video/'.$tem->video);

                    //$imgid = 6271487;
                    //$hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$imgid.php"));
                    //echo $hash[0]['thumbnail_medium']; 


                    //if( $tem->video == 0 ) 
                    $refvideo = '263373143';
                    //else $refvideo = $tem->video;


                    if($image_url['host'] == 'www.vimeo.com' || $image_url['host'] == 'vimeo.com'){
                        $url = 'https://vimeo.com/api/v2/video/'.$refvideo.'.json';

                        $curl = curl_init($url);
                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
                        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
                        $return = curl_exec($curl);
                        //dd($return);
                        curl_close($curl); 
                        $return = json_decode($return);

                    } else {
                        echo "<div id='not_supported'>Video Provider Not Supported. Please, check URL.</div>";
                    }
                    ?>



                    <a href="javascript:next_tem('{{ $tem->id }}')" class="list-group-item" style="font-size: 12px; color:#000; font-weight: 100">
                      <div class="d-flex align-items-center">
                        <img src="{{ $return[0]->thumbnail_small }}" class="wd-42" alt="" style="background-color: #000">
                        <div class="mg-l-10">
                          <h6 style="font-weight: 100">{{ $tem->nombre }}</h6>
                          <span>{{ $tem->duracion }}</span>
                        </div>
                      </div><!-- d-flex -->
                    </a><!-- list-group-item -->
                    @endforeach
                @endforeach
            </div>
        </div>

    @endif

</div>

<script>

    // Show/hide sub navigation of sidebar menu
    $('.wsub').on('click', function(e){
        e.preventDefault();
        $(this).next().slideToggle();
        $(this).toggleClass('show-sub');
    });    

</script>
