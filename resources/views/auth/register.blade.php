@extends('layout-login')

@section('title', "logIn")

@section('login')
    <h5 class="tx-gray-800 mg-b-25">Registro</h5>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group">
            <label class="form-control-label">{{ __('Nombre:') }}</label>

            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

            @if ($errors->has('name'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif

        </div>

        <div class="form-group">
            <label class="form-control-label">{{ __('Correo Electronico:') }}</label>

            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

            @if ($errors->has('email'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        
        <div class="row row-xs">
            <div class="col">
                <div class="form-group">
                    <label class="form-control-label">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif

                </div><!-- form-group -->
            </div><!-- col -->
            <div class="col">
                <div class="form-group">
                    <label class="form-control-label">{{ __('Confirmar Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>            
                </div>
            </div><!-- col -->
        </div><!-- row -->


        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                {{ __('Registrarme') }}
            </button>
        </div>
    </form>
@endsection
