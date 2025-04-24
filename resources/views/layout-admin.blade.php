<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}"> 


    <title>@yield('title') - Maestro Bursátil</title>

    <!-- vendor css -->
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="lib/jquery-toggles/toggles-full.css" rel="stylesheet">
    <link href="lib/rickshaw/rickshaw.min.css" rel="stylesheet">
    <link href="lib/highlightjs/github.css" rel="stylesheet">
    <link href="lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="lib/select2/css/select2.min.css" rel="stylesheet">

    <!-- Amanda CSS -->
    <link rel="stylesheet" href="css/amanda.css">

    <script type="text/javascript" src="js/template.js"></script>

    <link href="lib/spectrum/spectrum.css" rel="stylesheet">

  </head>

  <body>

    <div class="am-header">
      <div class="am-header-left">
        <a id="naviconLeft" href="" class="am-navicon d-none d-lg-flex"><i class="icon ion-navicon-round"></i></a>
        <a id="naviconLeftMobile" href="" class="am-navicon d-lg-none"><i class="icon ion-navicon-round"></i></a>
        <a href="master"> <img alt="" src="images/m-logo.png" width="30px" /> </a>
      </div><!-- am-header-left -->
 
      <div class="am-header-right">
        <div class="dropdown dropdown-profile">
          <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
            <img src="images/img4.jpg" class="wd-32 rounded-circle" alt="">
            <span class="logged-name"><span class="hidden-xs-down">{{ Auth::user()->name }}</span> <i class="fa fa-angle-down mg-l-3"></i></span>
          </a>
          <div class="dropdown-menu wd-200">
            <ul class="list-unstyled user-profile-nav">
              <li>

                @if(Auth::user()->id_perfil == 1)
                    <a class="dropdown-item" href="">
                        {{ __('Administrar Mestro') }}
                    </a>
                @endif

                @if(Auth::user()->id_perfil == 2 )
                    <a class="dropdown-item" href="">
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
          </div><!-- dropdown-menu -->

        </div><!-- dropdown -->
      </div><!-- am-header-right -->

    </div><!-- am-header -->


    <div class="am-sideleft">
      <ul class="nav am-sideleft-tab">
        <li class="nav-item" style="width:  100%;">
            <a class="nav-link active" href="#menuTutorias"><i class="fa fa-sliders tx-24" style="margin-right: 10px;"></i> Administración</a></li>
      </ul>

      <!-- #menuTutorias -->
      <div class="tab-content">
        <div id="menuAMDOPC" class="tab-pane active">

            <ul class="nav am-sideleft-menu">
                <h6 class="am-title">Creación</h6>
                <input id="urlUsr" type="hidden" value="{{ url('/admin/users') }}">

                <li class="nav-item">
                    <a href="javascript:amdUser({{Auth::user()->id}})" class="nav-link">
                        <i class="fa fa-user tx-20"></i>
                        {{__('Usuarios')}}
                    </a>
                </li>

                @if(Auth::user()->id_perfil == 1)

                <input id="urlEnt" type="hidden" value="{{ url('/admin/entidad') }}">                

                <li class="nav-item">
                    <a href="javascript:amdEnt({{Auth::user()->id}})" class="nav-link">
                        <i class="fa fa-building tx-20"></i>
                        {{__('Entidades')}}
                    </a>
                </li>

                @endif

            </ul>

            <ul class="nav am-sideleft-menu">
                <h6 class="am-title">Asignación</h6>
                
                <input id="urlProduc" type="hidden" value="{{ url('/admin/activepr') }}">                

                <li class="nav-item">
                    <a href="javascript:activProductos()" class="nav-link">
                        <i class="fa fa-pencil tx-20"></i>
                        {{__('Activación de Productos')}}
                    </a>
                </li>
            </ul>

            <ul class="nav am-sideleft-menu">
                <h6 class="am-title">Reportes</h6>                
                <input id="urlRepoSim" type="hidden" value="{{ url('/admin/reportes/simulador') }}">                

                <li class="nav-item">
                    <a href="javascript:repoSims()" class="nav-link">
                        <i class="fa fa fa-pie-chart tx-20"></i>
                        {{__('Reportes Simuladores')}}
                    </a>
                </li>
          
                <input id="urlRepoTuto" type="hidden" value="{{ url('/admin/reportes/tutorias') }}">                

                <li class="nav-item">
                    <a href="javascript:repoTuts()" class="nav-link">
                        <i class="fa fa-tasks tx-20"></i>
                        {{__('Reportes Tutorias')}}
                    </a>
                </li>
                
                @if(Auth::user()->id_perfil == 1)

                <input id="urlRepoVents" type="hidden" value="{{ url('/admin/reportes/ventas') }}">

                <li class="nav-item">
                    <a href="javascript:repoVents()" class="nav-link">
                        <i class="fa fa-user tx-20"></i>
                        {{__('Reportes Ventas')}}
                    </a>
                </li>

                @endif
            </ul>

        </div><!-- #menuTutorias -->

      </div><!-- tab-content -->
    </div><!-- am-sideleft -->

    <div class="am-mainpanel">

      <div class="am-pagetitle">
        @if(Auth::user()->id_perfil == 1)
            <h5 class="am-title">Administrador Maestro</h5>
        @endif

        @if(Auth::user()->id_perfil == 2 )
            <h5 class="am-title">Administrador Entidad</h5>
        @endif        
      </div>

      <div class="am-pagebody" id="contentAMD">
        @yield('content')
      </div>

    <!-- BASIC MODAL -->
        <div id="modalAdmin" class="modal fade">
          <div class="modal-dialog modal-dialog-vertical-center" role="document">
            <div class="modal-content bd-0 tx-14" id="bodyEdit">

              Cargando..

            </div>
          </div><!-- modal-dialog -->
        </div><!-- modal -->    

        <div id="modalAdminLg" class="modal fade">
          <div class="modal-dialog modal-lg modal-dialog-vertical-center" role="document">
            <div class="modal-content bd-0 tx-14" id="bodyEditLg">

              Cargando..

            </div>
          </div><!-- modal-dialog -->
        </div><!-- modal -->  

      <div class="am-footer">
        <span>Copyright &copy;. Todos los Derechos Reservados.</span>
        <span>Power by: Ustáriz & Abogados.</span>
      </div>

    </div>

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

    <script src="lib/datatables/jquery.dataTables.js"></script>
    <script src="lib/datatables-responsive/dataTables.responsive.js"></script>
    <script src="lib/select2/js/select2.min.js"></script>
    <script src="lib/spectrum/spectrum.js"></script>

    <script src="js/amanda.js"></script>

  </body>
</html>