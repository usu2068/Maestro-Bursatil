<h6 class="card-body-title">Reporte del rango de fechas {{ $fechIni }} a {{ $fechFin }}.</h6>

  <div class="table-wrapper">
    
    <input id="urlDetRepoTut" type="hidden" value="{{ url('/admin/reportes/tutorias/detalle') }}">

    <a href="reports/{{ $nameArchi }}.csv" target="_blank" class="btn btn-info" style="float: right; margin-bottom: 20px"><i class="fa fa-file-excel-o tx-20"></i></a>

    <table id="datatable1" class="table display responsive ">
      <thead>
        <tr>
          <th>Nombre Usuario</th>
          <th>Tutorìa</th>
          <th>Tiempo Total</th>
          <th>Ultimo Acceso</th>
          <th>Temas Vistos</th>
        </tr>
      </thead>
      <tbody>
        
        @foreach($filRepo as $filRep)
          @if($idTut == $filRep->tutoriales->id || $idTut == 0)

            @if(Auth::user()->id_perfil == 1)
            <tr>
              <td>{{ $filRep->usuarios->name }}</td>
              <td>{{ $filRep->tutoriales->nombre }}</td>
              <td>{{ $filRep->tiempoEstudio }}</td>
              <td>{{ $filRep->created_at }}</td>
              <td>
                <a href="javascript:detaRepoTut({{ $filRep->id }}, {{ $filRep->usuarios->id }}, {{ $filRep->tutoriales->id }})" class="btn btn-info">
                  <i class="fa fa-address-card tx-20"></i>
                </a>
              </td>
            </tr>
            @else
              @if($filRep->usuarios->id_entidad == Auth::user()->id_entidad)
                <tr>
                  <td>{{ $filRep->usuarios->name }}</td>
                  <td>{{ $filRep->tutoriales->nombre }}</td>
                  <td>{{ $filRep->tiempoEstudio }}</td>
                  <td>{{ $filRep->created_at }}</td>
                  <td>
                    <a href="javascript:detaRepoTut({{ $filRep->id }}, {{ $filRep->usuarios->id }}, {{ $filRep->tutoriales->id }})" class="btn btn-info">
                      <i class="fa fa-address-card tx-20"></i>
                    </a>
                  </td>
                </tr>
              @endif
            @endif

          @endif
        @endforeach    
        
      </tbody>
    </table>
  </div><!-- table-wrapper -->