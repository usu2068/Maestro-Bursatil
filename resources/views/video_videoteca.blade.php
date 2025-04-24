<div class="content-wrapper">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-xs-12 col-sm-12">
                <div class="sv-video">
                    <video poster="circle/images/single-video.png" style="width:100%;height:100%;" controls="controls" width="100%" height="100%">
                        <source src="circle/videos/video-1.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'></source>
                    </video>
                </div>
                <h1><a href="#">{{ $vid->name }}</a></h1>
                <div class="acide-panel acide-panel-top">
                    <a href="#"><i class="cv cvicon-cv-watch-later" data-toggle="tooltip" data-placement="top" title="Watch Later"></i></a>
                    <a href="#"><i class="cv cvicon-cv-liked" data-toggle="tooltip" data-placement="top" title="Liked"></i></a>
                    <a href="#"><i class="cv cvicon-cv-flag" data-toggle="tooltip" data-placement="top" title="Flag"></i></a>
                </div>
                <div class="author">
                    <div class="author-head">
                        <a href="#"><img src="circle/images/channel-user.png" alt="" class="sv-avatar"></a>
                        <div class="sv-name">
                            <div><a href="#">{{ $vid->categoria->nombre }}</a> . {{ $num_vids_cat }} Videos</div>
                            <div class="c-sub hidden-xs">
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <a href="#" class="author-btn-add"><i class="cv cvicon-cv-plus"></i></a>
                    </div>
                    <div class="author-border"></div>
                    <div class="sv-views">
                        <div class="sv-views-count">
                            {{ $vid->reproducciones }} vistas
                        </div>
                        <div class="sv-views-progress">
                            <div class="sv-views-progress-bar"></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="info">
                    <div class="custom-tabs">

                        <div class="clearfix"></div>

                        <!-- BEGIN tabs-content -->
                        <div class="tabs-content">
                            <!-- BEGIN tab-1 -->
                            <div class="tab-1">
                                <div>
                                    <h4>Cast:</h4>
                                    <p>Nathan Drake , Victor Sullivan , Sam Drake , Elena Fisher</p>

                                    <h4>Category :</h4>
                                    <p>Gaming , PS4 Exclusive , Gameplay , 1080p</p>

                                    <h4>About :</h4>
                                    <p>Three years after the events of Uncharted 3: Drake's Deception, Nathan Drake, now retired as a fortune hunter, has settled into a normal life with his wife Elena Fisher. His world is then turned upside down when his older brother Sam, long believed to be dead, suddenly reappears seeking Drake's help.</p>

                                    <h4>Tags :</h4>
                                    <p class="sv-tags">
                                        <span><a href="#">Uncharted 4</a></span>
                                        <span><a href="#">Playstation 4</a></span>
                                        <span><a href="#">Gameplay</a></span>
                                        <span><a href="#">1080P</a></span>
                                        <span><a href="#">ps4Share</a></span>
                                        <span><a href="#">+ 6</a></span>
                                    </p>

                                    <div class="row date-lic">
                                        <div class="col-xs-6">
                                            <h4>Release Date:</h4>
                                            <p>2 Days ago</p>
                                        </div>
                                        <div class="col-xs-6 ta-r">
                                            <h4>License:</h4>
                                            <p>Standard</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="hidden-xs">
                                    <h4>Game:</h4>
                                    <p>Uncharted 4</p>
                                    <a href="#">
                                        <img src="circle/images/tab-1-img-1.jpg" alt="image">
                                    </a>
                                    <a href="#" class="btn">Purchase</a>
                                </div>
                                <div class="clearfix"></div>
                                <div class="showless hidden-xs">
                                    <a href="#">Show Less</a>
                                </div>
                            </div>
                            <!-- END tab-1 -->

                            <!-- BEGIN tab-2 -->
                            <div class="tab-2">
                                <h4>Share:</h4>
                                <div class="social">
                                    <a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#" class="twitter"><i class="fa fa fa-twitter" aria-hidden="true"></i></a>
                                    <a href="#" class="google"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                    <a href="#" class="pinterest"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                                    <a href="#" class="btc"><i class="fa fa-btc" aria-hidden="true"></i></a>
                                    <a href="#" class="tumblr"><i class="fa fa-tumblr" aria-hidden="true"></i></a>
                                    <a href="#" class="vk"><i class="fa fa-vk" aria-hidden="true"></i></a>
                                    <a href="#" class="reddit"><i class="fa fa-reddit" aria-hidden="true"></i></a>
                                    <a href="#" class="stumbleupon"><i class="fa fa-stumbleupon" aria-hidden="true"></i></a>
                                    <a href="#" class="odnoklassniki"><i class="fa fa-odnoklassniki" aria-hidden="true"></i></a>
                                    <a href="#" class="pinterest"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                                    <a href="#" class="btc"><i class="fa fa-btc" aria-hidden="true"></i></a>
                                    <a href="#" class="tumblr"><i class="fa fa-tumblr" aria-hidden="true"></i></a>
                                    <a href="#" class="vk"><i class="fa fa-vk" aria-hidden="true"></i></a>
                                    <a href="#" class="reddit"><i class="fa fa-reddit" aria-hidden="true"></i></a>
                                    <a href="#" class="stumbleupon"><i class="fa fa-stumbleupon" aria-hidden="true"></i></a>
                                    <a href="#" class="odnoklassniki"><i class="fa fa-odnoklassniki" aria-hidden="true"></i></a>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        <h4>Link:</h4>
                                        <label class="clipboard">
                                            <input type="text" name="#" class="share-link" value="http://youtu.be/DwGgdfe-C6c" readonly>
                                            <div class="btn-copy" data-clipboard-target=".share-link">Copy</div>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <h4>Start at:</h4>
                                        <label class="checkbox">
                                            <input type="checkbox" name="#">
                                            <span class="arrow"></span>
                                        </label>
                                        <input type="text" name="#" value="3:20" readonly>
                                    </div>
                                    <div class="col-md-12">
                                        <h4>Embed:</h4>
                                        <textarea type="text" name="#" readonly><iframe width="560" height="315" src="https://www.circle.com/embed/ZocVTdsercgvsd3nA3JM?controls=0" frameborder="0" allowfullscreen></iframe></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <h4>Video Size:</h4>
                                        <div class="tags-type1">
                                            <a href="#">360P</a>
                                            <a href="#">480P</a>
                                            <a href="#">720P</a>
                                            <a href="#">1080P</a>
                                            <a href="#">Custom</a>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="checkbox-text">
                                            <label class="checkbox">
                                                <input type="checkbox" name="#">
                                                <span class="arrow"></span>
                                            </label>
                                            <p>Show suggested videos when the video finishes</p>
                                        </label>
                                        <label class="checkbox-text">
                                            <label class="checkbox">
                                                <input type="checkbox" name="#">
                                                <span class="arrow"></span>
                                            </label>
                                            <p>Show player controls</p>
                                        </label>
                                        <label class="checkbox-text">
                                            <label class="checkbox">
                                                <input type="checkbox" name="#">
                                                <span class="arrow"></span>
                                            </label>
                                            <p>Show video title and player actions</p>
                                        </label>
                                    </div>
                                </div>
                                <div class="tab-popup popup-share">
                                    <div class="tab-popup-head">
                                        <i class="cv cvicon-cv-share"></i>
                                        <span>Share this video</span>
                                        <a href="#" class="tab-popup-close"><i class="cv cvicon-cv-cancel"></i></a>
                                    </div>
                                    <div class="tab-popup-content">
                                        <h4>Copy Link:</h4>
                                        <label class="clipboard">
                                            <input type="text" name="#" class="share-link" value="http://youtu.be/DwGgdfe-C6c" readonly>
                                            <div class="btn-copy" data-clipboard-target=".share-link">Copy</div>
                                        </label>
                                    </div>
                                    <div class="tab-popup-content">
                                        <div class="popup-share-social">
                                            <a href="#" class="facebook">
                                                <i class="fa fa-facebook" aria-hidden="true"></i>
                                                <span>Facebook</span>
                                            </a>
                                            <a href="#" class="twitter">
                                                <i class="fa fa fa-twitter" aria-hidden="true"></i>
                                                <span>Twitter</span>
                                            </a>
                                            <a href="#" class="google">
                                                <i class="fa fa-google-plus" aria-hidden="true"></i>
                                                <span>Google Plus</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END tab-2 -->

                            <!-- BEGIN tab-3 -->
                            <div class="tab-3">
                                <h4>Download:</h4>
                                <div class="tags-type2">
                                    <a href="#"><i class="fa fa-long-arrow-down" aria-hidden="true"></i>360P</a>
                                    <a href="#"><i class="fa fa-long-arrow-down" aria-hidden="true"></i>480P</a>
                                    <a href="#"><i class="fa fa-long-arrow-down" aria-hidden="true"></i>720P</a>
                                    <a href="#"><i class="fa fa-long-arrow-down" aria-hidden="true"></i>1080P</a>
                                    <a href="#"><i class="fa fa-long-arrow-down" aria-hidden="true"></i>UHD4K</a>
                                    <a href="#"><i class="fa fa-long-arrow-down" aria-hidden="true"></i>Mobile</a>
                                </div>
                                <label class="checkbox-text">
                                    <label class="checkbox">
                                        <input type="checkbox" name="#">
                                        <span class="arrow"></span>
                                    </label>
                                    <p>By Downloading this video I agree that I will not upload this video anywhere else without proper permission from the creator.</p>
                                </label>
                                <div class="tab-popup popup-download">
                                    <div class="tab-popup-head">
                                        <i class="cv cvicon-cv-download"></i>
                                        <span>Download video</span>
                                        <a href="#" class="tab-popup-close"><i class="cv cvicon-cv-cancel"></i></a>
                                    </div>
                                    <div class="tab-popup-content">
                                        <div class="popup-download-load">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <a href="#">
                                                        <i class="cv cvicon-cv-next"></i>
                                                        <span>320P</span>
                                                        <span>20.3 mb</span>
                                                    </a>
                                                </div>
                                                <div class="col-xs-6">
                                                    <a href="#">
                                                        <i class="cv cvicon-cv-next"></i>
                                                        <span>480P</span>
                                                        <span>43.5 mb</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <a href="#">
                                                        <i class="cv cvicon-cv-next"></i>
                                                        <span>720P</span>
                                                        <span>120.9 mb</span>
                                                    </a>
                                                </div>
                                                <div class="col-xs-6">
                                                    <a href="#" class="premium">
                                                        <i class="cv cvicon-cv-next"></i>
                                                        <span>1080P</span>
                                                        <span>PREMIUM</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="popup-download-p">By Downloading this video I agree that I will not upload this video anywhere.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- END tab-3 -->

                            <!-- BEGIN tab-4 -->
                            <div class="tab-4">
                                <h4>Jump to:</h4>
                                <div class="block-list">
                                    <div>
                                        <span class="name">Introduction</span>
                                        <span class="time">0:00 - 2:16</span>
                                    </div>
                                    <div>
                                        <span class="name">Gameplay</span>
                                        <span class="time">2:17 - 3:19</span>
                                    </div>
                                    <div class="active">
                                        <span class="name">Cut Scene</span>
                                        <span class="time">3:20 - 8:33</span>
                                    </div>
                                    <div>
                                        <span class="name">Review</span>
                                        <span class="time">8:34 - 9:27</span>
                                    </div>
                                    <div>
                                        <span class="name">Overall Rating</span>
                                        <span class="time">9:28 - 11:06</span>
                                    </div>
                                </div>
                                <div class="tab-popup popup-jump">
                                    <div class="tab-popup-head">
                                        <i class="cv cv cvicon-cv-goto"></i>
                                        <span>Jump to</span>
                                        <a href="#" class="tab-popup-close"><i class="cv cvicon-cv-cancel"></i></a>
                                    </div>
                                    <div class="tab-popup-content">
                                        <div class="block-list">
                                            <div>
                                                <span class="name">Introduction</span>
                                                <span class="time">0:00 - 2:16</span>
                                            </div>
                                            <div>
                                                <span class="name">Gameplay</span>
                                                <span class="time">2:17 - 3:19</span>
                                            </div>
                                            <div class="active">
                                                <span class="name">Cut Scene</span>
                                                <span class="time">3:20 - 8:33</span>
                                            </div>
                                            <div>
                                                <span class="name">Review</span>
                                                <span class="time">8:34 - 9:27</span>
                                            </div>
                                            <div>
                                                <span class="name">Overall Rating</span>
                                                <span class="time">9:28 - 11:06</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END tab-4 -->

                            <!-- BEGIN tab-5 -->
                            <div class="tab-5">
                                <h4>Add to Playlist:</h4>
                                <div class="block-list">
                                    <div>
                                        <i class="cv cvicon-cv-watch-later" data-toggle="tooltip" data-placement="top" title="Watch Later"></i>
                                        <span class="name">Watch Later</span>
                                        <i class="cv cvicon-cv-plus" data-toggle="tooltip" data-placement="top" title="Add to Playlist"></i>
                                    </div>
                                    <div>
                                        <i class="cv cvicon-cv-playlist" data-toggle="tooltip" data-placement="top" title="Playlist"></i>
                                        <span class="name">Gameplay Playlist</span>
                                        <i class="cv cvicon-cv-plus" data-toggle="tooltip" data-placement="top" title="Add to Playlist"></i>
                                    </div>
                                    <div class="active">
                                        <i class="cv cvicon-cv-playlist" data-toggle="tooltip" data-placement="top" title="Playlist"></i>
                                        <span class="name">Review Videos</span>
                                        <i class="cv cvicon-cv-plus" data-toggle="tooltip" data-placement="top" title="Add to Playlist"></i>
                                    </div>
                                    <div>
                                        <i class="cv cvicon-cv-playlist" data-toggle="tooltip" data-placement="top" title="Playlist"></i>
                                        <span class="name">Tech Updates</span>
                                        <i class="cv cvicon-cv-plus" data-toggle="tooltip" data-placement="top" title="Add to Playlist"></i>
                                    </div>
                                    <div>
                                        <i class="cv cvicon-cv-add-to-playlist" data-toggle="tooltip" data-placement="top" title="Add to Playlist"></i>
                                        <span class="name">Create New Playlist</span>
                                    </div>
                                </div>
                                <div class="tab-popup popup-add">
                                    <div class="tab-popup-head">
                                        <i class="cv cvicon-cv-plus"></i>
                                        <span>Add to</span>
                                        <a href="#" class="tab-popup-close"><i class="cv cvicon-cv-cancel"></i></a>
                                    </div>
                                    <div class="tab-popup-content">
                                        <div class="block-list">
                                            <div>
                                                <i class="cv cvicon-cv-watch-later" data-toggle="tooltip" data-placement="top" title="Watch Later"></i>
                                                <span class="name">Watch Later</span>
                                                <i class="cv cvicon-cv-plus" data-toggle="tooltip" data-placement="top" title="Add to Playlist"></i>
                                            </div>
                                            <div>
                                                <i class="cv cvicon-cv-playlist" data-toggle="tooltip" data-placement="top" title="Playlist"></i>
                                                <span class="name">Gameplay Playlist</span>
                                                <i class="cv cvicon-cv-plus" data-toggle="tooltip" data-placement="top" title="Add to Playlist"></i>
                                            </div>
                                            <div class="active">
                                                <i class="cv cvicon-cv-playlist" data-toggle="tooltip" data-placement="top" title="Playlist"></i>
                                                <span class="name">Review Videos</span>
                                                <i class="cv cvicon-cv-plus" data-toggle="tooltip" data-placement="top" title="Add to Playlist"></i>
                                            </div>
                                            <div>
                                                <i class="cv cvicon-cv-playlist" data-toggle="tooltip" data-placement="top" title="Playlist"></i>
                                                <span class="name">Tech Updates</span>
                                                <i class="cv cvicon-cv-plus" data-toggle="tooltip" data-placement="top" title="Add to Playlist"></i>
                                            </div>
                                            <div>
                                                <i class="cv cvicon-cv-add-to-playlist" data-toggle="tooltip" data-placement="top" title="Add to Playlist"></i>
                                                <span class="name">Create New Playlist</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END tab-5 -->
                        </div>
                        <!-- END tabs-content -->
                    </div>

                    <div class="content-block head-div head-arrow head-arrow-top visible-xs">
                        <div class="head-arrow-icon">
                            <i class="cv cvicon-cv-next"></i>
                        </div>
                    </div>

                    <div class="adblock2">
                        <div class="img">
                            <span class="hidden-xs">
                                Google AdSense<br>728 x 90
                            </span>
                            <span class="visible-xs">
                                Google AdSense 320 x 50
                            </span>
                        </div>
                    </div>

                    <!-- similar videos -->
                    <div class="caption hidden-xs">
                        <div class="left">
                            <a href="#">Otras Categorias de Interes.</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="single-v-footer">

                        <div class="similar-v single-video video-mobile-02">
                            <div class="row">

                                @foreach($categos as $catego)

                                    <div class="col-lg-3 col-xs-6 col-sm-3">
                                        <div class="b-category">
                                            <a href="javascript:carga_vid( {{$catego->id}} )"><img src="circle/images/categories/channel-3.png" alt=""></a>
                                            <a href="javascript:carga_vid( {{$catego->id}} )" class="name">{{ $catego->nombre }}</a>
                                            <p class="desc">{{ $catego->descripcion }}</p>
                                        </div>
                                    </div>

                                @endforeach


                            </div>
                        </div>
                        <!-- END similar videos -->
                    </div>
                </div>


                <div class="content-block head-div head-arrow visible-xs">
                    <div class="head-arrow-icon">
                        <i class="cv cvicon-cv-next"></i>
                    </div>
                    <div class="adblock2 adblock2-v2">
                        <div class="img">
                            <span>Google AdSense 300 x 250</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- right column -->
            <div class="col-lg-4 col-xs-12 col-sm-12 hidden-xs">

                <!-- up next -->
                <div class="caption playlist">
                    <div class="left">
                        <a href="#">Más Videos de esta categoria</a>
                    </div>
                    <!--div class="right">
                        <i class="cv cvicon-cv-liked" data-toggle="tooltip" data-placement="top" title="" data-original-title="Liked"></i>
                        <i class="cv cvicon-cv-plus" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to"></i>
                    </div-->
                    <div class="clearfix"></div>
                </div>
                <div class="list">
                    <?php $cont = 1; ?>
                    @foreach($vids_cat as $vidc)

                        <div class="h-video playlist row">
                            <div class="col-lg-5 col-sm-5 col-xs-6">
                                <div class="v-number">
                                    <span>{{ $cont }}</span>
                                </div>
                                <div class="v-img">
                                    <a href="javascript:video_videoteca({{ $vidc->id }})"><img src="circle/images/sv-1.png" alt=""></a>
                                    <div class="time">{{ $vidc->duracion }}</div>
                                </div>
                            </div>
                            <div class="col-lg-7 col-sm-7 col-xs-6">
                                <div class="v-desc">
                                    <a href="javascript:video_videoteca({{ $vidc->id }})">{{ $vidc->name }}</a>
                                </div>
                                <div class="v-views">
                                    {{ $vidc->reproducciones }} vistas
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <?php ++$cont; ?>
                    @endforeach

                </div>
                <!-- END up next -->

                <div class="adblock">
                    <div class="img">
                        Google AdSense<br>
                        336 x 280
                    </div>
                </div>

                <!-- Recomended Videos ->
                <div class="caption">
                    <div class="left">
                        <a href="#">Recomended Videos</a>
                    </div>
                    <div class="right">
                        <a href="#">Autoplay <i class="cv cvicon-cv-btn-off"></i></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="list">
                    <div class="h-video row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-img">
                                <a href="single-video-tabs.html"><img src="circle/images/sv-4.png" alt=""></a>
                                <div class="time">15:19</div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-desc">
                                <a href="single-video-tabs.html">Cornfield Chase Outlast II Official Gameplay</a>
                            </div>
                            <div class="v-views">
                                2,729,347 views
                            </div>
                            <div class="v-percent"><span class="v-circle"></span> 55%</div>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="h-video row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-img">
                                <a href="single-video-tabs.html"><img src="circle/images/sv-5.png" alt=""></a>
                                <div class="time">4:23</div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-desc">
                                <a href="single-video-tabs.html">Amazing Facts About Nebulas ...</a>
                            </div>
                            <div class="v-views">
                                429,347 views
                            </div>
                            <div class="v-percent"><span class="v-circle"></span> 79%</div>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="h-video row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-img">
                                <a href="single-video-tabs.html"><img src="circle/images/sv-6.png" alt=""></a>
                                <div class="time">7:18</div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-desc">
                                <a href="single-video-tabs.html">3DS Games Of 2016 that blew our mind</a>
                            </div>
                            <div class="v-views">
                                630,347 views
                            </div>
                            <div class="v-percent"><span class="v-circle"></span> 83%</div>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="h-video row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-img">
                                <a href="single-video-tabs.html"><img src="circle/images/sv-7.png" alt=""></a>
                                <div class="time">27:18</div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-desc">
                                <a href="single-video-tabs.html">No Man's Sky: 21 Minutes of Gameplay</a>
                            </div>
                            <div class="v-views">
                                10,347 views
                            </div>
                            <div class="v-percent"><span class="v-circle"></span> 43%</div>
                        </div>
                        <div class="clearfix"></div>
                    </div>



                    <div class="h-video row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-img">
                                <a href="single-video-tabs.html"><img src="circle/images/sv-8.png" alt=""></a>
                                <div class="time">5:18</div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-desc">
                                <a href="single-video-tabs.html">There Can Only Be One! Introducing Tanc ...</a>
                            </div>
                            <div class="v-views">
                                453,347 views
                            </div>
                            <div class="v-percent"><span class="v-circle"></span> 79%</div>
                        </div>
                        <div class="clearfix"></div>
                    </div>



                    <div class="h-video row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-img">
                                <a href="single-video-tabs.html"><img src="circle/images/sv-9.png" alt=""></a>
                                <div class="time">34:18</div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-desc">
                                <a href="single-video-tabs.html">Game of Thrones Season 6: Event Promo</a>
                            </div>
                            <div class="v-views">
                                1,347 views
                            </div>
                            <div class="v-percent"><span class="v-circle"></span> 93%</div>
                        </div>
                        <div class="clearfix"></div>
                    </div>



                    <div class="h-video row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-img">
                                <a href="single-video-tabs.html"><img src="circle/images/sv-10.png" alt=""></a>
                                <div class="time">6:18</div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-desc">
                                <a href="single-video-tabs.html">Mirror's Edge Catalyst Beta: PS4 vs Xbox One</a>
                            </div>
                            <div class="v-views">
                                420,347 views
                            </div>
                            <div class="v-percent"><span class="v-circle"></span> 73%</div>
                        </div>
                        <div class="clearfix"></div>
                    </div>



                    <div class="h-video row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-img">
                                <a href="single-video-tabs.html"><img src="circle/images/sv-11.png" alt=""></a>
                                <div class="time">21:18</div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-desc">
                                <a href="single-video-tabs.html">Cornfield Chase Outlast II Official Gameplay</a>
                            </div>
                            <div class="v-views">
                                50,347 views
                            </div>
                            <div class="v-percent"><span class="v-circle"></span> 94%</div>
                        </div>
                        <div class="clearfix"></div>
                    </div>



                    <div class="h-video row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-img">
                                <a href="single-video-tabs.html"><img src="circle/images/sv-12.png" alt=""></a>
                                <div class="time">7:18</div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-desc">
                                <a href="single-video-tabs.html">3DS Games Of 2016 that blew our mind</a>
                            </div>
                            <div class="v-views">
                                630,347 views
                            </div>
                            <div class="v-percent"><span class="v-circle"></span> 83%</div>
                        </div>
                        <div class="clearfix"></div>
                    </div>



                    <div class="h-video row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-img">
                                <a href="single-video-tabs.html"><img src="circle/images/sv-13.png" alt=""></a>
                                <div class="time">23:18</div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-desc">
                                <a href="single-video-tabs.html">Cornfield Chase Outlast II Official Gameplay</a>
                            </div>
                            <div class="v-views">
                                2,630,347 views
                            </div>
                            <div class="v-percent"><span class="v-circle"></span> 96%</div>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="h-video row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-img">
                                <a href="single-video-tabs.html"><img src="circle/images/sv-14.png" alt=""></a>
                                <div class="time">15:36</div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-desc">
                                <a href="single-video-tabs.html">No Man's Sky: 21 Minutes of Gameplay</a>
                            </div>
                            <div class="v-views">
                                71,347 views
                            </div>
                            <div class="v-percent"><span class="v-circle"></span> 63%</div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <!- END Recomended Videos -->

                <!-- load more ->
                <div class="loadmore">
                    <a href="#">Show more videos</a>
                </div-->
            </div>

        </div>
    </div>
</div>