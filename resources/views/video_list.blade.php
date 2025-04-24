<div class="single-video video-mobile-02">
    <div class="row">

        @foreach( $vids_cat as $vid_cat )
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="h-video row">
                    <div class="col-sm-12 col-xs-6">
                        <div class="v-img">
                            <a href="single-video-tabs.html"><img src="circle/images/sv-12.png" alt=""></a>
                            <div class="time">{{ $vid_cat->duracion }}</div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xs-6">
                        <div class="v-desc">
                            <a href="javascript:video_videoteca({{ $vid_cat->id }})">{{ $vid_cat->name }}</a>
                        </div>
                        <div class="v-views">
                            {{ $vid_cat->reproducciones }} vistas
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>