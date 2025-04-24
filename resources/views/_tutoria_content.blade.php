<?php $cont=0; ?>
<div class="row row-sm mg-t-15 mg-sm-t-20" style="margin-top: 70px;">

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

</div>

<!--
<div class="row row-sm mg-t-15 mg-sm-t-20">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
        <div class="card-header bg-transparent pd-20">
            @foreach($tutorias as $tutoria)
                <h6 class="card-title tx-uppercase tx-12 mg-b-0">{{ $tutoria->nombre }}</h6>
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
    </div>

    <div class="col-lg-4">
        <div class="card-header bg-transparent pd-20">
            <h6 class="card-title tx-uppercase tx-12 mg-b-0">Avance</h6>
        </div>
        <div class="card pd-20">
            <input id="urlTimeTut" type="hidden" value="{{ url('/tutorial/timer') }}" >
            <div id="guardaAv"></div>
            @foreach($tutorias as $tutoria)
                <input id="idTut" type="hidden"  value="{{ $tutoria->id }}">
            @endforeach

            <div class="d-flex mg-b-10" id="timer">
                <div class="bd-r pd-r-10">
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

            <!--div class="progress mg-b-10">
                <div class="progress-bar wd-50p bg-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
            </div>
            <p class="tx-12 mg-b-0">Porcentaje cubierto de este Tema.</p->        

        </div><!-- card ->
        <a href="javascript:clockTut()" id="btn-comenzar" style="display: none">Comenzar</a>

        <div class="card-header bg-transparent pd-20">
            <h6 class="card-title tx-uppercase tx-12 mg-b-0">Presentacion</h6>
        </div>
        <div class="card bg-dark tx-white bd-0" style="background-color: #27496C !important;" id='presentacion'>
            <img width="65%" style="margin: 50px; align-self: center;" src="images/logo.png" />
        </div>

    </div>

    <div class="col-lg-12">
        <div class="card-header bg-transparent pd-20">
            <h6 class="card-title tx-uppercase tx-12 mg-b-0">Videos Relacionados</h6>
        </div>

        <div class="card" style="height: 350px; overflow: scroll;" >
            <div class="pd-10 bd rounded">
                <ul class="nav nav-gray-600 flex-column" role="tablist">

                    <input id="urlV" type="hidden" value="{{ url('/tutorial/video') }}" >
                    <input id="urlP" type="hidden" value="{{ url('/tutorial/poster') }}" >
                    
                    @foreach($tutorias as $tutoria)
                        @foreach( $tutoria->temsTuto as $tem )
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:next_tem('{{ $tem->id }}')">{{ $tem->nombre }} <br><span class="badge badge-pill badge-info">{{ $tem->duracion }} mins</span></a>
                        </li>
                        @endforeach
                    @endforeach

                </ul>
            </div>
        </div>
    </div>
</div>