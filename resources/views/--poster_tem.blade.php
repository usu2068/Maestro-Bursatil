@foreach($c_tuto as $c_tut)
	@if($c_tut -> presentacion == '0')
	<img width="65%" style="margin: 50px; align-self: center;" src="images/logo.png" />
	@else
    <iframe width="100%" height="225px" src="//e.issuu.com/embed.html#11025439/{{ $c_tut -> presentacion }}" frameborder="0" allowfullscreen></iframe>
    @endif
@endforeach