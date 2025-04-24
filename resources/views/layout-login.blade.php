<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="csrf-token" content="{{ csrf_token() }}"> 

		<title>login - Maestro Bursátil</title>

		<!-- vendor css -->
		<link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
		<link href="lib/Ionicons/css/ionicons.css" rel="stylesheet">
		<link href="lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">

		<!-- Amanda CSS -->
		<link rel="stylesheet" href="css/amanda.css">
		
	</head>

	<body>

		<div class="am-signin-wrapper" 
			style="
				background-image: url('images/login.jpg');
				-webkit-background-size: cover;
				-moz-background-size: cover;
				-o-background-size: cover;
				background-size: cover;
			">
			<div class="am-signin-box">
				<div class="row no-gutters">
					<img alt="Logo Maestro" src="images/logo.png" style="margin-left: 73.5px;" /> 
					<div class="col-lg-12" style="background: transparent;">
		    				@yield('login')
		    		</div>

		    	</div>
		    </div>
		</div>

		<div id="modalMasterLg" class="modal fade">
			<div class="modal-dialog modal-lg modal-dialog-vertical-center" role="document">
				<div class="modal-content bd-0 tx-14" id="bodyEditLg">
					<div class="modal-header pd-y-20 pd-x-25">
					  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>
					<div class="modal-body pd-25" id="bodyModLg">
						
						<input id="urlNewPas" type="hidden" value="{{ url('/nuevo-pass') }}">

				        <div class="form-group">
				            <label class="form-control-label">Correo:</label>
				            <input id="emailNew" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

				            @if ($errors->has('email'))
				                <span class="invalid-feedback">
				                    <strong>{{ $errors->first('email') }}</strong>
				                </span>
				            @endif
				        </div>

				        <div class="row row-xs">
				            <div class="col">
				                <div class="form-group">
				                    <label class="form-control-label">{{ __('Nueva Contraseña') }}</label>
				                    <input id="passwordNew" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

				                    @if ($errors->has('password'))
				                        <span class="invalid-feedback">
				                            <strong>{{ $errors->first('password') }}</strong>
				                        </span>
				                    @endif

				                </div><!-- form-group -->
				            </div><!-- col -->
				            <div class="col">
				                <div class="form-group">
				                    <label class="form-control-label">{{ __('Confirmar Contraseña') }}</label>
				                    <input id="password-confirm-new" type="password" class="form-control" name="password_confirmation" required>            
				                </div>
				            </div><!-- col -->
				        </div><!-- row -->        

				        <a href="javascript:saveNewPass()" class="btn btn-primary btn-block" 
				        style="
				        	background-color: #282828 !important; 
				        	color: #fff; 
				        	letter-spacing: 3px;
				        ">
				            {{ __('Actualizar') }}
				        </a>
			    	</div>
				</div>
			</div><!-- modal-dialog -->
		</div><!-- modal -->  



	    <script src="lib/jquery/jquery.js"></script>
	    <script src="lib/popper.js/popper.js"></script>
	    <script src="lib/bootstrap/bootstrap.js"></script>
	    <script src="lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
	    <script type="text/javascript" src="js/template.js"></script>
	    <script src="js/amanda.js"></script>

	</body>
</html>