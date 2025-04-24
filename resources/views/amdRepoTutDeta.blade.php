<div class="modal-header pd-y-20 pd-x-25">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<div class="modal-body pd-25">
  <div class="col-lg-12">

  	
    <h5 class="tx-gray-800 mg-b-25">Detalles del avance de estudio para el examen {{ $detLog->tutoriales->nombre }} </h5>

    <div class="row row-xs">
        
        <div class="col">
        	<table class="table">
			  <tbody>
			  	<tr>
			  		<th>Nombre Usuario:</th>
			  		<td>{{ $detLog->usuarios->name }}</td>
			  	</tr>
			  	<tr>
			  		<th>Tiempo de estudio:</th>
			  		<td>{{ $detLog->tiempoEstudio }}</td>
			  	</tr>
			  	<tr>
			  		<th>Ultimo Acceso:</th>
			  		<td>{{ $detLog->created_at }}</td>
			  	</tr>

			  	<tr>
		       		<th>Nombre del tema</th>
		       		<th>Duración del Video</th>
		       	</tr>

			  </tbody>


			   @foreach( $tems_tut as $tem_tut )
			   	<tr>
		       		<td>{{ $tem_tut->nombre }}</td>
		       		<td>{{ $tem_tut->duracion }}</td>
		       	</tr>
		       @endforeach
			</table>
        </div>

    </div>
    
  
  </div><!-- col-12 -->
</div>