@foreach($c_tuto as $c_tut)
	@if($c_tut -> video == '0')	
		<img style="margin: 145px; align-self: center;" src="images/logo.png" />	
	@else
    <iframe src="https://player.vimeo.com/video/{{ $c_tut -> video }}" width="100%" height="360" frameborder="0" allowfullscreen></iframe>
    @endif
@endforeach