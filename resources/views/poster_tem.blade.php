@foreach($c_tuto as $c_tut)
	@if($c_tut -> presentacion == '0')
	<img width="65%" style="margin: 50px; align-self: center;" src="images/logo.png" />
	@else

	<iframe 
		allowfullscreen allow="fullscreen" 
		style="border:none;width:100%;height:326px;" 
		src="//e.issuu.com/embed.html?backgroundColor=%2354bcf4&d={{$c_tut->presentacion}}&hideIssuuLogo=true&hideShareButton=true&pageLayout=singlePage&u=consultorias-riesgo">
	</iframe>


	<!--iframe allowfullscreen allow="fullscreen" style="border:none;width:100%;height:326px;" src="//e.issuu.com/embed.html?d={{ $c_tut -> presentacion }}&hideIssuuLogo=true&hideShareButton=true&pageLayout=singlePage&u=consultorias-riesgo"></iframe-->
    @endif
@endforeach