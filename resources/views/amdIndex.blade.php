<?php 
	$pos = array();
	$pos[1] = 'Primer';
	$pos[2] = 'Segundo';
	$pos[3] = 'Tercer';
	$i = 1;
?>
@extends('layout-admin')

@section('title', "Admin")

@section('content')
	
	    <div class="row row-sm">
          
          @foreach($logs_ini as $log_ini)

	          <div class="col-lg-4">
	            <div class="card">
	              <div id="rs1" class="wd-100p ht-200"></div>
	              <div class="overlay-body pd-x-20 pd-t-20">
	                <div class="d-flex justify-content-between">
	                  <div>
	                    <h6 class="tx-12 tx-uppercase tx-inverse tx-bold mg-b-5">{{ $log_ini->usuarios->name }}</h6>
	                    <p class="tx-12">{{ $log_ini->simuladores->nombre }}</p>
	                  </div>
	                  <a href="" class="tx-gray-600 hover-info"><i class="icon ion-more tx-16 lh-0"></i></a>
	                </div><!-- d-flex -->
	                <h2 class="mg-b-5 tx-inverse tx-lato">{{ round($log_ini->efectividadTotal, 2) }} %</h2>
	                <p class="tx-12 mg-b-0">Este es el {{ $pos[$i] }} mejor resultado.</p>
	              </div>
	            </div><!-- card -->
	          </div><!-- col-4 -->
	          <?php ++$i; ?>
          @endforeach
        </div><!-- row -->

	<div class="row row-sm mg-t-15 mg-sm-t-20">

		<div class="col-lg-8">
			<div class="card">
              <div class="card-header bg-transparent pd-20">
                <h6 class="card-title tx-uppercase tx-12 mg-b-0">Ultimos Usuarios Registrados</h6>
              </div><!-- card-header -->

              <div class="table-responsive">
                <table class="table table-white mg-b-0 tx-12">
                  <tbody>

                  	@foreach($users as $user)
                    <tr>
                      <td class="pd-l-20 tx-center">
                        <img src="images/img4.jpg" class="wd-36 rounded-circle" alt="Image">
                      </td>
                      <td>
                        <a href="" class="tx-inverse tx-14 tx-medium d-block">{{$user->name}}</a>
                        <span class="tx-11 d-block">{{$user->email}}</span>
                      </td>
                      <td class="tx-12">
                      	@if($user->password == '')
                        	<span class="square-8 bg-danger mg-r-5 rounded-circle"></span> Perfil Desactualizado
                        @else
                        	<span class="square-8 bg-success mg-r-5 rounded-circle"></span> Perfil Actualizado
                        @endif
                      </td>
                      <td>{{$user->created_at}}</td>
                    </tr>
                    @endforeach

                  </tbody>
                </table>
              </div><!-- table-responsive -->
              <div class="card-footer tx-12 pd-y-15 bg-transparent bd-t bd-gray-200">
                <a href=""><i class="fa fa-angle-down mg-r-5"></i>View All Transaction History</a>
              </div><!-- card-footer -->
            </div><!-- card -->
		</div>

		<div class="col-lg-4">
			<div class="card pd-20">
              <h6 class="tx-12 tx-uppercase tx-inverse tx-bold mg-b-15">Tiempo de licencia</h6>
              <div class="d-flex mg-b-10">
                <div class="bd-r pd-r-40">
                  <label class="tx-12">Días</label>
                  <p class="tx-lato tx-inverse tx-bold">365</p>
                </div>
              </div><!-- d-flex -->
              <div class="progress mg-b-10">
                <div class="progress-bar wd-100p" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">100%</div>
              </div>
            </div><!-- card -->
		</div>

		<div class="col-lg-12">
		</div>

		<div class="col-lg-4">
		</div>

		<div class="col-lg-8">
		</div>

	</div>

@endsection