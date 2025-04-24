<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="favicon.png">

        <title>Educación Financiera | @yield('title')</title>

        <!-- Bootstrap core CSS -->
        <link href="circle/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Theme CSS -->
        <link href="circle/css/style.css" rel="stylesheet">
        <link href="circle/css/font-awesome.min.css" rel="stylesheet">
        <link href="circle/css/font-circle-video.css" rel="stylesheet">

        <!-- font-family: 'Hind', sans-serif; -->
        <link href='https://fonts.googleapis.com/css?family=Hind:400,300,500,600,700|Hind+Guntur:300,400,500,700' rel='stylesheet' type='text/css'>
        <!-- player -->
        <link rel="stylesheet" href="circle/js/vendor/player/johndyer-mediaelement-89793bc/build/mediaelementplayer.min.css" />
        <!-- Theme CSS -->
        <link href="circle/js/vendor/magnificPopup/dist/magnific-popup.css" rel="stylesheet">


    </head>

    <body class="single-video light">

        <div class="mobile-menu">
            <div class="mobile-menu-head">
                <a href="#" class="mobile-menu-close"></a>
                <a class="navbar-brand" href="index.html">
                    <img src="circle/images/logo.svg" alt="Project name" class="logo" />
                </a>
                <div class="mobile-menu-btn-color">
                    <img src="circle/images/icon_bulb_light.png" alt="">
                </div>
            </div>
            <div class="mobile-menu-content">
                <div class="mobile-menu-user">
                    <div class="mobile-menu-user-img">
                        <img src="circle/images/ava11.png" alt="">
                    </div>
                    <p>Bailey Fry </p>
                    <span class="caret"></span>
                </div>
                <a href="#" class="btn mobile-menu-upload">
                    <i class="cv cvicon-cv-upload-video"></i>
                    <span>Upload Video</span>
                </a>
                <div class="mobile-menu-list">
                    <ul>
                        <li>
                            <a href="#">
                                <i class="cv cvicon-cv-play-circle"></i>
                                <p>Popular Videos</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="cv cvicon-cv-playlist"></i>
                                <p>Browse Categories</p>
                                <span class="caret"></span>
                            </a>
                            <ul class="mobile-menu-categories">
                                <li class="color-active">
                                    <a href="#">Pages <span class="caret"></span></a>
                                    <ul>
                                        <li><a href="index.html">Home Page</a></li>
                                        <li><a href="single-video.html">Single Video Page</a></li>
                                        <li><a href="single-video-youtube.html">Single Video Youtube Embedded Page</a></li>
                                        <li><a href="single-video-vimeo.html">Single Video Vimeo Embedded Page</a></li>
                                        <li><a href="upload.html">Upload Video Page</a></li>
                                        <li><a href="upload-edit.html">Upload Video Edit Page</a></li>
                                        <li><a href="search.html">Searched Videos Page</a></li>
                                        <li><a href="channel.html">Single Channel Page</a></li>
                                        <li><a href="channels.html">Channels Page</a></li>
                                        <li><a href="single-video-tabs.html">Single Videos Page With Tabs</a></li>
                                        <li><a href="single-video-playlist.html">Single Videos Page With Playlist</a></li>
                                        <li><a href="history.html">History Page</a></li>
                                        <li><a href="categories.html">Browse Categories Page</a></li>
                                        <li><a href="categories_side_menu.html">Browse Categories Side Menu Page</a></li>
                                        <li><a href="subscription.html">Subscription Page</a></li>
                                        <li><a href="login.html">Login Page</a></li>
                                        <li><a href="signup.html">Signup Page</a></li>
                                    </ul>
                                </li>
                                <li><a href="categories.html">Categories</a></li>
                                <li><a href="channel.html">Channels</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="cv cvicon-cv-liked"></i>
                                <p>Liked Videos</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="cv cvicon-cv-history"></i>
                                <p>History</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="cv cvicon-cv-purchased"></i>
                                <p>Purchased Videos</p>
                            </a>
                        </li>
                    </ul>
                </div>
                <a href="#" class="btn mobile-menu-logout">Log out</a>
            </div>
        </div>

        @yield('content') 

        <!-- footer -->
        <footer>
            <div class="container-fluid">
                <div class="row">
                    <div class="container padding-def">
                        <div class="col-lg-7 col-sm-6 col-xs-12">
                            <div class="f-copy">
                                <ul class="list-inline">
                                    <li><a href="#">Politica de privacidad</a></li>
                                    <li>2019 power by <a href="nevadadigitalfactory.com" class="hidden-xs">Nevada Digital Factory</a></li>
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </footer>
        <!-- /footer -->



        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="circle/js/jquery.min.js"></script>
        <script src="circle/bootstrap/js/bootstrap.min.js"></script>
        <script src="circle/js/custom.js"></script>
        <script src="js/template.js"></script>
        <script src="circle/js/vendor/clipboard/dist/clipboard.min.js"></script>
        <script src="circle/js/vendor/player/johndyer-mediaelement-89793bc/build/mediaelement-and-player.min.js"></script>
        <script src="circle/js/vendor/magnificPopup/dist/jquery.magnific-popup.min.js"></script>


    </body>
</html>

