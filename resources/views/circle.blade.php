@extends('layout-videoteca')

@section('title', "categorias")

@section('content')

<div class="content-wrapper">
    <div class="container-fluid" style="margin-left: 50px; margin-right: 50px;">
        <div id="cont_gen" class="row">
            <div class="col-lg-12 v-categories side-menu">

                <!-- Popular Channels -->
                <div class="content-block">
                    <div class="cb-header">
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="list-inline">
                                    <li><a href="#" class="color-active">Todas las categorias</a></li>
                                    <li><a href="#">Lo más visto</a></li>
                                    <li class="hidden-xs"><a href="#">Lo Nuevo</a></li>
                                    <li class="hidden-xs"><a href="#">A - Z</a></li>
                                </ul>
                            </div>

                            <div class="col-lg-6 col-xs-12">
                                <h4 style="font-weight: 100;">Bienvenido al portal de educación financiera de {{ $entidad->nombre }}</h4>
                            </div>
                        </div>
                    </div>

                    <div class="cb-content">
                        <div class="row">

                            <div class="col-md-3 col-sm-3 col-xs-12" style="height: 0px;">
                    
                                <form action="search.html" method="post">
                                    <div class="topsearch">
                                        <i class="cv cvicon-cv-cancel topsearch-close"></i>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-search"></i></span>
                                            <input type="text" class="form-control" placeholder="Search" aria-describedby="sizing-addon2">
                                            <div class="input-group-btn">
                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="cv cvicon-cv-video-file"></i>&nbsp;&nbsp;&nbsp;<span class="caret"></span></button>/
                                                <ul class="dropdown-menu">
                                                    <li><a href="#"><i class="cv cvicon-cv-relevant"></i> Relevant</a></li>
                                                    <li><a href="#"><i class="cv cvicon-cv-calender"></i> Recent</a></li>
                                                    <li><a href="#"><i class="cv cvicon-cv-view-stats"></i> Viewed</a></li>
                                                    <li><a href="#"><i class="cv cvicon-cv-star"></i> Top Rated</a></li>
                                                    <li><a href="#"><i class="cv cvicon-cv-watch-later"></i> Longest</a></li>
                                                </ul>
                                            </div><!-- /btn-group -->
                                        </div>
                                    </div>
                                </form>
                                <br>    
                                <aside class="sidebar-menu">
                                    <ul>
                                        @foreach( $categos as $cat )
                                            <li><a href="javascript:carga_vid( {{$cat->id}} )">{{$cat->nombre}}</a></li>
                                        @endforeach
                                    </ul>
                                    <div class="bg-add"></div>
                                </aside>
                            </div>
                            
                            <div id="cont_list" class="col-md-9 col-sm-9 col-xs-12">
                                <div class="row">
                                    
                                    @foreach( $categos as $cat )
                                        <div class="col-lg-1-5 col-xs-6 col-sm-3">
                                            <div class="b-category">
                                                <a href="javascript:carga_vid( {{$cat->id}} )"><img src="circle/images/categories/channel-2.png" alt=""></a>
                                                <a href="javascript:carga_vid( {{$cat->id}} )" class="name">{{$cat->nombre}}</a>
                                                <p class="desc">{{$cat->descripcion}}</p>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="content-block head-div head-arrow mb-40">
                        <div class="head-arrow-icon">
                            <i class="cv cvicon-cv-next"></i>
                        </div>
                    </div>
                </div>
                <!-- /Popular Channels -->

            </div>
        </div>
    </div>
</div>

@endsection