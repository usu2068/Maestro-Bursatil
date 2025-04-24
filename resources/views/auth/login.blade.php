@extends('layout-login')

@section('title', "logIn")

@section('login')

    
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <input id="email" placeholder="CORREO" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus 

                style="
                    background: transparent;
                    border: 0px;
                    border-bottom: solid 1px;
                    border-bottom-color: #fff;
                    padding-bottom: 25px;
                ">

                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <input id="password" placeholder="CONTRASEÑA" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required

                style="
                    background: transparent;
                    border: 0px;
                    border-bottom: solid 1px;
                    border-bottom-color: #fff;
                    padding-bottom: 25px;
                    margin-top: 20px;
                ">

                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif

            </div>           

            <button type="submit" class="btn btn-block"
            style="
                background-color: #282828 !important; 
                color: #fff; 
                letter-spacing: 3px;
                width: 200px;
                margin-left: 50px;
                margin-top: 60px;
                margin-bottom: 60px;
            ">
                {{ __('INGRESAR') }}
            </button>

            <div class="keep">
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Recordarme') }}
            </div>

            <!--a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Olvido su Contraseña?') }}
            </a-->

        </form>
    

@endsection
