<h6 class="card-body-title">Reporte del rango de fechas {{ $fechIni }} a {{ $fechFin }}.</h6>

  <div class="table-wrapper">
    
    <input id="urlDetRepoSim" type="hidden" value="{{ url('/admin/reportes/simulador/detalle') }}">
    
    <a href="reports/{{ $nameArchi }}.csv" target="_blank" class="btn btn-info" style="float: right; margin-bottom: 20px"><i class="fa fa-file-excel-o tx-20"></i></a>
    
    <table id="datatable1" class="table display responsive ">
      <thead>
        <tr>
          <th>Detalles</th>
          <th>Nombre Usuario</th>
          <th>Simulador</th>
          <th>Efectividad Total</th>
          <th>Fecha de Presentación</th>
        </tr>
      </thead>
      <tbody>
        
        @foreach($filRepo as $filRep)
        
          @if($idSim == $filRep->simuladores->id || $idSim == 0)

            @if(Auth::user()->id_perfil == 1)

            <tr>
              <td>
                <a href="javascript:detaRepoSim({{ $filRep->id }}, {{ $filRep->usuarios->id }}, {{ $filRep->simuladores->id }})" class="btn btn-info">
                  <i class="fa fa-address-card tx-20"></i>
                </a>
              </td>
              <td>{{ $filRep->usuarios->name }}</td>
              <td>{{ $filRep->simuladores->nombre }}</td>
              <td>{{ round($filRep->efectividadTotal, 2) }} %</td>
              <td>{{ $filRep->fechaPresentacion }}</td>

            </tr>
            @else
              @if($filRep->usuarios->id_entidad == Auth::user()->id_entidad)
                <tr>
                  <td>
                    <a href="javascript:detaRepoSim({{ $filRep->id }}, {{ $filRep->usuarios->id }}, {{ $filRep->simuladores->id }})" class="btn btn-info">
                      <i class="fa fa-address-card tx-20"></i>
                    </a>
                  </td>
                  <td>{{ $filRep->usuarios->name }}</td>
                  <td>{{ $filRep->simuladores->nombre }}</td>
                  <td>{{ round($filRep->efectividadTotal, 2) }} %</td>
                  <td>{{ $filRep->fechaPresentacion }}</td>
                </tr>
              @endif
            @endif
            
          @endif
        @endforeach    
        
      </tbody>
    </table>
  </div><!-- table-wrapper -->