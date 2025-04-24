<?php 
    $Ops = '';
    $Ase = '';
    $Dir = '';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">

    <title>@yield('title') - Maestro Bursátil</title>

    <!-- vendor css -->
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="lib/jquery-toggles/toggles-full.css" rel="stylesheet">
    <link href="lib/rickshaw/rickshaw.min.css" rel="stylesheet">
    <link href="lib/highlightjs/github.css" rel="stylesheet">

    <!-- Amanda CSS -->
    <link rel="stylesheet" href="css/amanda.css">

    <script type="text/javascript" src="js/template.js"></script>
  </head>

  <body>

    <div class="am-header">
      <div class="am-header-left">
        <a id="naviconLeft" href="" class="am-navicon d-none d-lg-flex"><i class="icon ion-navicon-round"></i></a>
        <a id="naviconLeftMobile" href="" class="am-navicon d-lg-none"><i class="icon ion-navicon-round"></i></a>
      </div><!-- am-header-left -->
        
        <a href="master"> <img alt="" src="images/logo.png" width="100px" /> </a>

      <div class="am-header-right">
        <!--div class="dropdown dropdown-profile">
          <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
            <img src="images/img4.jpg" class="wd-32 rounded-circle" alt="">
            <span class="logged-name"><span class="hidden-xs-down">{{ Auth::user()->name }}</span> <i class="fa fa-angle-down mg-l-3"></i></span>
          </a>
          <div class="dropdown-menu wd-200">
            <ul class="list-unstyled user-profile-nav">
              <li>
                @if(Auth::user()->id_perfil == 1)
                    <a class="dropdown-item" href="{{ url('/admin') }}">
                        {{ __('Administrar Mestro') }}
                    </a>
                @endif

                @if(Auth::user()->id_perfil == 2 )
                    <a class="dropdown-item" href="{{ url('/admin') }}">
                        {{ __('Administrar Mi Entidad') }}
                    </a>
                @endif

                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Salir') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </li>
            </ul>
          </div><!-- dropdown-menu ->

        </div><!-- dropdown -->
      </div><!-- am-header-right -->

    </div><!-- am-header -->


    <div class="am-sideleft" style="width: 300px;">
        <input id="urlShop" type="hidden" value="{{ url('/shop') }}">
        <input id="urlShopCar" type="hidden" value="{{ url('/shop/car') }}">
        <input id="CarShop" type="hidden" value="0">
        <!--ul class="nav am-sideleft-tab">

        <li class="nav-item"><a class="nav-link" href="#menuSimuladores"><i class="fa fa-pencil tx-24"></i></a></li>
        <li class="nav-item"><a class="nav-link" href="#menuTutorias"><i class="fa fa-desktop tx-24"></i></a></li>
        <li class="nav-item"><a class="nav-link" href="#menuGuias"><i class="fa fa-book tx-24"></i></a></li>
        <li class="nav-item">
        <a href="#settingMenu" class="nav-link"><i class="fa fa-bar-chart tx-24"></i></a>
        </li> back_profile.jpg
        </ul-->

        <div class="list-group list-group-chat" >

            <a href="#" class="list-group-item" style="background-image: url('images/back_profile.jpg')">
                <div class="d-flex align-items-center">
                    <img src="images/img4.jpg" class="wd-75" alt="" >
                    <div class="mg-l-10">
                        <h6 style="text-transform: capitalize;font-weight: 200;font-size: 16px;">{{ Auth::user()->name }}</h6>
                        <span style="font-weight: 100; margin-top: 15px;">Activo desde: {{ Auth::user()->created_at }}</span>
                    </div>
                </div><!-- d-flex -->
            </a>

        </div>



            <ul class="nav am-sideleft-menu">
                
                <input id="urlTuto" type="hidden" value="{{ url('/tutorial') }}">
                <input id="urlSimu" type="hidden" value="{{ url('/simulador') }}">
                <input id="urlGuia" type="hidden" value="{{ url('/guia') }}">

                <?php
                    $Ops = '';
                    $Ase = '';
                    $Dir = '';

                    $OpsSim = '';
                    $AseSim = '';
                    $DirSim = '';

                    $OpsGui = '';
                    $AseGui = '';
                    $DirGui = '';

                    $htmlMenu = '';

                    $otrsPrg = '';
                    $Mod = '';
                ?>
                @foreach($users as $user)
                    @if( $user->id == Auth::user()->id )
                        @foreach( $user->productsUser as $produc )

                            @if( strpos($produc->contenido, 'TUTC') !== false)

                                @if( strpos($produc->nombre, 'Operador') !== false)

                                    <?php 
                                        $href = "javascript:carga_tuto('$produc->contenido')";

                                        if($Ops == ''){
                                            $styleMen = 'border-top: 1px solid #e9ecef;';
                                        }else{
                                            $styleMen = '';
                                        }

                                        $Ops .= '
                                            <li class="nav-item" style="'.$styleMen.'">
                                                <a href="'.$href.'" class="nav-link">
                                                    '.$produc->nombre.'
                                                </a>
                                            </li>
                                        ';
                                    ?>

                                @endif

                                @if( strpos($produc->nombre, 'Asesor') !== false)

                                    <?php 
                                        $href = "javascript:carga_tuto('$produc->contenido')";

                                        if($Ase == ''){
                                            $styleMen = 'border-top: 1px solid #e9ecef;';
                                        }else{
                                            $styleMen = '';
                                        }

                                        $Ase .= '
                                            <li class="nav-item">
                                                <a href="'.$href.'" class="nav-link" style="'.$styleMen.'">
                                                    '.$produc->nombre.'
                                                </a>
                                            </li>
                                        ';
                                    ?>

                                @endif

                                @if( strpos($produc->nombre, 'Directivo') !== false)

                                    <?php 

                                        $href = "javascript:carga_tuto('$produc->contenido')";
                                        
                                        if($Dir == ''){
                                            $styleMen = 'border-top: 1px solid #e9ecef;';
                                        }else{
                                            $styleMen = '';
                                        }

                                        $Dir .= '
                                            <li class="nav-item" style="'.$styleMen.'">
                                                <a href="'.$href.'" class="nav-link">
                                                    '.$produc->nombre.'
                                                </a>
                                            </li>
                                        ';
                                    ?>

                                @endif
                            @endif

                            @if( strpos($produc->contenido, 'SIM') !== false)
                                
                                @if( strpos($produc->nombre, 'Operador') !== false)

                                    <?php 
                                        $href = "javascript:carga_simu('$produc->contenido')";

                                        if($OpsSim == ''){
                                            $styleMen = 'border-top: 1px solid #e9ecef;';
                                        }else{
                                            $styleMen = '';
                                        }

                                        $OpsSim .= '
                                            <li class="nav-item" style="'.$styleMen.'">
                                                <a href="'.$href.'" class="nav-link">
                                                    '.$produc->nombre.'
                                                </a>
                                            </li>
                                        ';
                                    ?>

                                @endif

                                @if( strpos($produc->nombre, 'Asesor') !== false)

                                    <?php 
                                        $href = "javascript:carga_simu('$produc->contenido')";

                                        if($AseSim == ''){
                                            $styleMen = 'border-top: 1px solid #e9ecef;';
                                        }else{
                                            $styleMen = '';
                                        }

                                        $AseSim .= '
                                            <li class="nav-item" style="'.$styleMen.'">
                                                <a href="'.$href.'" class="nav-link">
                                                    '.$produc->nombre.'
                                                </a>
                                            </li>
                                        ';
                                    ?>

                                @endif

                                @if( strpos($produc->nombre, 'Directivo') !== false)

                                    <?php 

                                        $href = "javascript:carga_simu('$produc->contenido')";

                                        if($DirSim == ''){
                                            $styleMen = 'border-top: 1px solid #e9ecef;';
                                        }else{
                                            $styleMen = '';
                                        }

                                        $DirSim .= '
                                            <li class="nav-item" style="'.$styleMen.'">
                                                <a href="'.$href.'" class="nav-link">
                                                    '.$produc->nombre.'
                                                </a>
                                            </li>
                                        ';
                                    ?>

                                @endif
                            @endif

                            @if( strpos($produc->contenido, 'GUI') !== false)

                                @if( strpos($produc->nombre, 'Operador') !== false)

                                    <?php 
                                        $href = "javascript:carga_guia('$produc->contenido')";

                                        if($OpsGui == ''){
                                            $styleMen = 'border-top: 1px solid #e9ecef;';
                                        }else{
                                            $styleMen = '';
                                        }

                                        $OpsGui .= '
                                            <li class="nav-item" style="'.$styleMen.'">
                                                <a href="'.$href.'" class="nav-link">
                                                    <span>'.$produc->nombre.'</span>
                                                </a>
                                            </li>
                                        ';
                                    ?>

                                @endif

                                @if( strpos($produc->nombre, 'Asesor') !== false)

                                    <?php 
                                        $href = "javascript:carga_guia('$produc->contenido')";

                                        if($AseGui == ''){
                                            $styleMen = 'border-top: 1px solid #e9ecef;';
                                        }else{
                                            $styleMen = '';
                                        }

                                        $AseGui .= '
                                            <li class="nav-item" style="'.$styleMen.'">
                                                <a href="'.$href.'" class="nav-link">
                                                    <span>'.$produc->nombre.'</span>
                                                </a>
                                            </li>
                                        ';
                                    ?>

                                @endif

                                @if( strpos($produc->nombre, 'Directivo') !== false)

                                    <?php 
                                        $href = "javascript:carga_guia('$produc->contenido')";

                                        if($DirGui == ''){
                                            $styleMen = 'border-top: 1px solid #e9ecef;';
                                        }else{
                                            $styleMen = '';
                                        }

                                        $DirGui .= '
                                            <li class="nav-item" style="'.$styleMen.'">
                                                <a href="'.$href.'" class="nav-link">
                                                    <span>'.$produc->nombre.'</span>
                                                </a>
                                            </li>
                                        ';
                                    ?>

                                @endif                                
                            @endif

                            @if( strpos($produc->contenido, 'TUTE') !== false)

                                <?php 
                                     $href = "javascript:carga_tuto('$produc->contenido')";

                                    if($otrsPrg == ''){
                                        $styleMen = 'border-top: 1px solid #e9ecef;';
                                    }else{
                                        $styleMen = '';
                                    }

                                    $otrsPrg .= '
                                        <li class="nav-item" style="'.$styleMen.'">
                                            <a href="'.$href.'" class="nav-link">
                                                <span>'.$produc->nombre.'</span>
                                            </a>
                                        </li>
                                    ';
                                ?>
                                   
                            @endif

                            @if( strpos($produc->contenido, 'TUTS') !== false)

                                <?php 
                                     $href = "javascript:carga_tuto('$produc->contenido')";

                                    if($Mod == ''){
                                        $styleMen = 'border-top: 1px solid #e9ecef;';
                                    }else{
                                        $styleMen = '';
                                    }

                                    $Mod .= '
                                        <li class="nav-item" style="'.$styleMen.'">
                                            <a href="'.$href.'" class="nav-link">
                                                <span>'.$produc->nombre.'</span>
                                            </a>
                                        </li>
                                    ';
                                ?>
                                   
                            @endif
                            
                            
                        @endforeach

                        @if($Ops ==! '' || $OpsSim ==! '')
                        <?php 
                            $htmlMenu .= '
                            <li class="nav-item">
                                <a href="" class="nav-link with-sub">
                                    <i class="fa fa-briefcase tx-20"></i>
                                    <span style="margin-left: 10px;">Operadores</span>
                                </a>
                                <ul class="nav-sub">
                                    '.$Ops.'
                                    '.$OpsSim.'
                                    '.$OpsGui.'
                                </ul>
                            </li>';
                        ?>
                        @endif

                        @if($Ase ==! '' || $AseSim ==! '')
                        <?php 
                            $htmlMenu .= '
                            <li class="nav-item">
                                <a href="" class="nav-link with-sub">
                                    <i class="fa fa-briefcase tx-20"></i>
                                    <span style="margin-left: 10px;">Asesores</span>
                                </a>
                                <ul class="nav-sub">
                                    '.$Ase.'
                                    '.$AseSim.'
                                    '.$AseGui.'
                                </ul>
                            </li>';
                        ?>
                        @endif

                        @if($Dir ==! '' || $DirSim ==! '')
                        <?php 
                            $htmlMenu .= '
                            <li class="nav-item">
                                <a href="" class="nav-link with-sub">
                                    <i class="fa fa-briefcase tx-20"></i>
                                    <span style="margin-left: 10px;" >Directivo</span>
                                </a>
                                <ul class="nav-sub">
                                    '.$Dir.'
                                    '.$DirSim.'
                                    '.$DirGui.'
                                </ul>
                            </li>';
                        ?>
                        @endif

                        <?php 
                            if($otrsPrg != ''){
                                $htmlMenu .= '
                                <li class="nav-item">
                                    <a href="" class="nav-link with-sub">
                                        <i class="fa fa-briefcase tx-20"></i>
                                        <span style="margin-left: 10px;" >Otros Programas</span>
                                    </a>
                                    <ul class="nav-sub">
                                        '.$otrsPrg.'
                                    </ul>
                                </li>';
                            }

                            if($Mod != ''){
                                $htmlMenu .= '
                                <li class="nav-item">
                                    <a href="" class="nav-link with-sub">
                                        <i class="fa fa-briefcase tx-20"></i>
                                        <span style="margin-left: 10px;" >Módulos</span>
                                    </a>
                                    <ul class="nav-sub">
                                        '.$Mod.'
                                    </ul>
                                </li>';
                            }
                        ?>

                    @endif
                @endforeach

            </ul>


        <ul class="nav am-sideleft-menu" style="text-transform: uppercase; font-weight: 100; font-size: 18px;">
            <li class="nav-item " style="padding-top: 10px; margin-bottom: 10px;">
                <a href="" class="nav-link with-sub">
                    <i class="fa fa-clipboard" style="color: #60CDFF;"></i>
                    <span style="margin-left: 10px; color: #000;">Mis Programas</span>
                </a>
                <ul class="nav-sub">
                    <?php echo  $htmlMenu ?>
                </ul>
            </li><!-- nav-item -->


            <li class="nav-item" style="padding-top: 10px; margin-bottom: 10px;">
              <a href="" class="nav-link with-sub">
                <i class="fa fa-flag-o" style="color: #60CDFF;"></i>
                <span style="margin-left: 10px; color: #000;">Resultados</span>
              </a>
              <ul class="nav-sub">
                <input id="urlRepoSim" type="hidden" value="{{ url('/reportes/simper') }}">
                <input id="urlRepoTut" type="hidden" value="{{ url('/reportes/tutper') }}">
                
                <li class="nav-item">

                    <a href="javascript:repoTuto();" class="nav-link">
                        <span>Tutorias</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="javascript:repoSimu();" class="nav-link">
                        <span>Simuladores</span>
                    </a>
                </li><!-- nav-item -->
              </ul>
            </li><!-- nav-item -->

            @if(Auth::user()->id_perfil == 1)

            <li class="nav-item" style="padding-top: 10px; margin-bottom: 10px;">
              <a href="{{ url('/admin') }}" class="nav-link">
                <i class="fa fa-id-card" style="color: #60CDFF;"></i>
                <span style="margin-left: 10px; color: #000;">Administrar Maestro</span>
              </a>
            </li><!-- nav-item -->

            @endif

            @if(Auth::user()->id_perfil == 2)

            <li class="nav-item" style="padding-top: 10px; margin-bottom: 10px;">
              <a href="{{ url('/admin') }}" class="nav-link">
                <i class="fa fa-id-card" style="color: #60CDFF;"></i>
                <span style="margin-left: 10px; color: #000;">Administrar mi Entidad</span>
              </a>
            </li><!-- nav-item -->

            @endif

            <li class="nav-item" style="padding-top: 10px; margin-bottom: 10px;">
              <a href="mailto:soporte@maestrobursatil.com" class="nav-link">
                <i class="fa fa-comments-o" style="color: #60CDFF;"></i>
                <span style="margin-left: 10px; color: #000;">Soporte</span>
              </a>
            </li><!-- nav-item -->
            <li class="nav-item" style="padding-top: 10px; margin-bottom: 10px;">
              <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="nav-link">
                <i class="fa fa-power-off" style="color: #60CDFF;"></i>
                <span style="margin-left: 10px; color: #000;">Salir</span>
              </a>
            </li><!-- nav-item -->
        </ul>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

    </div>
      

    <div class="am-mainpanel">

      <div class="am-pagebody" id="content" style="padding: 0px;">
        @yield('content')
      </div><!-- am-pagebody -->

        <div id="modalMasterLg" class="modal fade">
          <div class="modal-dialog modal-lg modal-dialog-vertical-center" role="document">
            <div class="modal-content bd-0 tx-14" id="bodyModLg">

              Cargando..

            </div>
          </div><!-- modal-dialog -->
        </div><!-- modal -->  

      <div class="am-footer">
        <span>Copyright &copy;. Todos los Derechos Reservados.</span>
        <span>Power by: Ustáriz & Abogados.</span>
      </div><!-- am-footer -->

    </div><!-- am-mainpanel -->

    <script src="lib/jquery/jquery.js"></script>
    <script src="lib/popper.js/popper.js"></script>
    <script src="lib/bootstrap/bootstrap.js"></script>
    <script src="lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="lib/jquery-toggles/toggles.min.js"></script>
    <script src="lib/d3/d3.js"></script>
    <script src="lib/rickshaw/rickshaw.min.js"></script>
    <script src="lib/gmaps/gmaps.js"></script>

    <script src="lib/Flot/jquery.flot.js"></script>
    <script src="lib/Flot/jquery.flot.pie.js"></script>
    <script src="lib/Flot/jquery.flot.resize.js"></script>
    <script src="lib/flot-spline/jquery.flot.spline.js"></script>
    <script src="lib/raphael/raphael.min.js"></script>
    <script src="lib/morris.js/morris.js"></script>
    
    <script src="lib/highlightjs/highlight.pack.js"></script>
    <script src="lib/chart.js/Chart.js"></script>    

    <script src="js/amanda.js"></script>
    <script src="js/ResizeSensor.js"></script>
    <script src="js/dashboard.js"></script>

    @if( !empty($ult_resultados) )
        @foreach($ult_resultados as $ult_resultado)

        <?php $result_tems = array_map('floatval', explode(";;",  $ult_resultado->efectividadTema )); ?>

        <script>
            var ctx1 = document.getElementById('chartBar1').getContext('2d');
            
            var myChart1 = new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: {{ json_encode($result_tems) }},
                    datasets: [{
                        label: '# of Votes',
                        data: {{ json_encode($result_tems) }},
                        backgroundColor: '#17A2B8'
                    }]
                },
                options: {
                    legend: {
                        display: false,
                    labels: {
                        display: false
                    }
                },
                scales: {
                    yAxes: [{
                        ticks: {
                        beginAtZero:true,
                        fontSize: 10,
                        max: 100
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            beginAtZero:true,
                            fontSize: 11
                        }
                    }]
                }
                }
            });
        </script>

        @endforeach
    @endif

  </body>
</html>