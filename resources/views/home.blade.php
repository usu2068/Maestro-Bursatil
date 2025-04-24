@extends('layout-master')

@section('title', "Inicio")

@section('content')
    
    <div class="row row-sm mg-t-15 mg-sm-t-20" style="margin-top: 42px; padding: 10px;">
        <div class="col-lg-12" style="padding: 0px;">         
          <div class="card pd-20 pd-sm-40" style="padding: 0px">
    
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
              
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="images/rot-home-1.jpg" alt="First slide">
                </div>
              </div>

              <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>

            </div>

          </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style="padding: 0px;">
          <a href="https://maestrobursatil.com/cursos/" target="_blank">
            <img src="images/precios.jpg" alt="" style="width: 100%;">
          </a>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style="padding: 0px">
          <a href="#modal_uso_master" data-toggle="modal">
            <img src="images/como-user-mb.jpg" alt="" style="width: 100%;">
          </a>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style="padding: 0px">
          <a href="https://maestrobursatil.com/2019/07/16/nueva-certificacion-amv/" target="_blank">
            <img src="images/new-prog.jpg" alt="" style="width: 100%;">
          </a>
        </div>


        <!-- Modal Como Usar Maestro -->
        <div class="modal fade" id="modal_uso_master" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">

                <iframe src="https://player.vimeo.com/video/347617325?title=0&byline=0&portrait=0" width="640" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>

            </div>
          </div>
        </div>

    </div>

    
@endsection
