<div class="card pd-20 pd-sm-40">
  <h6 class="card-body-title">Reporte de uso de los tutoriales.</h6>
  <p class="mg-b-20 mg-sm-b-30">En este modulo usted puede realizar un reporte de uso del los tutoriales deseados en el intervalo de fechas que indique.</p>
  
  <div class="table-wrapper">
      <input id="urlRepoSimOpc" type="hidden" value="{{ url('/admin/reportes/tutorias/repoOpc') }}">
      <div id="divMsj"></div>

      <div class="row row-xs">
        <div class="col">
          <div class="form-group">
            <label class="form-control-label">Fecha Inicial:</label>
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input id="fechIni" type="text" class="form-control fc-datepicker" placeholder="AAAA-MM-DD">            
          </div><!-- form-group -->
        </div>

        <div class="col">
          <div class="form-group">
            <label class="form-control-label">Fecha Final:</label>
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input id="fechFin" type="text" class="form-control fc-datepicker" placeholder="AAAA-MM-DD">
          </div><!-- form-group -->
        </div><!-- col -->
      </div>

      <div class="form-group">

        <label class="form-control-label">Simulador:</label>
        <select class="form-control select2" id="selTut">
          <option value="0">Ejija el simulacor deseado.</option>
          @foreach( $tuts as $tut )
              <option value="{{ $tut->id }}">{{ $tut->nombre }}</option>
          @endforeach
        </select>

      </div><!-- form-group -->

      <div class="form-group">
        <a href="javascript:RepoTuto()" class="btn btn-info"><i class="fa fa-save tx-20"></i> Generar Reporte</a>
      </div>

  </div>
</div>

<div class="card pd-20 pd-sm-40" id="tabResult">
  <h6 class="card-body-title">Reporte General.</h6>

  <div class="table-wrapper">
    
    <input id="urlDetRepoTut" type="hidden" value="{{ url('/admin/reportes/tutorias/detalle') }}">  

    <table id="datatable1" class="table display responsive ">
      <thead>
        <tr>
          <th>Nombre Usuario</th>
          <th>Tutorìa</th>
          <th>Tiempo Total</th>
          <th>Ultimo Acceso</th>
          <th>Detalles</th>
        </tr>
      </thead>
      <tbody>
        
        @foreach($logsGene as $logGene)
          @if(Auth::user()->id_perfil == 1)

          <tr>
            <td>{{ $logGene->usuarios->name }}</td>
            <td>{{ $logGene->tutoriales->nombre }}</td>
            <td>{{ $logGene->tiempoEstudio }}</td>
            <td>{{ $logGene->created_at }}</td>
            <td>
              <a href="javascript:detaRepoTut({{ $logGene->id }}, {{ $logGene->usuarios->id }}, {{ $logGene->tutoriales->id }})" class="btn btn-info">
                <i class="fa fa-address-card tx-20"></i>
              </a>
            </td>
            
          </tr>

          @else
            @if($logGene->usuarios->id_entidad == Auth::user()->id_entidad)

              <tr>
                <td>{{ $logGene->usuarios->name }}</td>
                <td>{{ $logGene->tutoriales->nombre }}</td>
                <td>{{ $logGene->tiempoEstudio }}</td>
                <td>{{ $logGene->created_at }}</td>
                <td>
                  <a href="javascript:detaRepoTut({{ $logGene->id }}, {{ $logGene->usuarios->id }}, {{ $logGene->tutoriales->id }})" class="btn btn-info">
                    <i class="fa fa-address-card tx-20"></i>
                  </a>
                </td>
              </tr>
              
            @endif
          @endif
        @endforeach    
        
      </tbody>
    </table>
  </div><!-- table-wrapper -->
</div><!-- card -->

<script>
  $(function(){
    'use strict';

    $('#datatable1').DataTable({
      responsive: true,
      language: {
        searchPlaceholder: 'Buscar...',
        sSearch: '',
        lengthMenu: '_MENU_ items/pagina',
      }
    });

    // Select2
    $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

    $('.fc-datepicker').datepicker({
      showOtherMonths: true,
      selectOtherMonths: true
    });

  });


</script>