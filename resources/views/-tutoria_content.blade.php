<?php 
    $cont=0;
?>

<div class="row row-sm mg-t-15 mg-sm-t-20" style="margin-top: 70px;">


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
                              <a href="#" class="nav-link with-sub">
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
    $('.with-sub').on('click', function(e){
        e.preventDefault();
        $(this).next().slideToggle();
        $(this).toggleClass('show-sub');
    });    

</script>
