@extends('layout-videoteca')

@section('title', "categorias")

@section('content')

<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 upload-page">

                <div class="u-area">
                    <i class="fa fa-exclamation-triangle"></i>

                    <p class="u-text1">Acceso denegado!</p>
                    <p class="u-text2">Comuniquese con el administrador del sitio.</p>

                    <form action="#" method="post">
                        <button class="btn btn-primary u-btn">Reportar al administrador.</button>
                    </form>
                </div>

                <div class="u-terms">
                    <p>By submitting your videos to circle, you acknowledge that you agree to circle's <a href="#">Terms of Service</a> and <a href="#">Community Guidelines</a>.</p>
                    <p class="hidden-xs">Please be sure not to violate others' copyright or privacy rights. Learn more</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection