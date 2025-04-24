<div class="row row-sm mg-t-15 mg-sm-t-20">

    <div class="col-lg-12">
        <div class="card-header bg-transparent pd-20">
            <h6 class="card-title tx-uppercase tx-12 mg-b-0">{{ $InfoGuia->nombre }}</h6>
        </div>
        <div class="card bg-dark tx-white bd-0">

            @for($i=0; $i<count($ContGuia); ++$i)

                    <iframe style="width:100%; height: 850px;" src="//e.issuu.com/embed.html?d={{ $ContGuia[$i] }}&u=consultorias-riesgo"frameborder="0" allowfullscreen></iframe>

            @endfor
        </div>
    </div>

</div>