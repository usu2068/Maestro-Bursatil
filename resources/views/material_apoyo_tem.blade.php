<?php 
    $style_act = 'active'; 
    $num_pregs = 0;
?>

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



                                    <div id="carouselPregsQuiz" class="carousel slide carousel-fade" data-ride="carousel" data-interval="99999999">

                                        <div class="carousel-inner">
                                    
                                        
                                        @foreach ( $preguntasQ as $preg ) 
                                            
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
                                                $id_quiz = $preg->quiz->id;

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
                                    
                                   
            

        </div>
    </div><!-- modal-dialog -->
</div>
<!-- FIN MODAL -->   
