<div class="card pd-20 pd-sm-40">
  <h6 class="card-body-title">Administración de entidades.</h6>
  <p class="mg-b-20 mg-sm-b-30">Realice la creación, edición y eliminacion de las entidades vinculadas a su maestro.</p>

  <div class="form-group">
    <input id="urlNewEnt" type="hidden" value="{{ url('/admin/entidad/new') }}">
    <a href="javascript:newEnt({{ Auth::user()->id }})" class="btn btn-info"><i class="fa fa-plus tx-20"></i> Nueva Entidad</a>
  </div>

  <div class="table-wrapper">
    
    <input id="urlEdEnt" type="hidden" value="{{ url('/admin/entidad/editar') }}">  
    <input id="urlElEnt" type="hidden" value="{{ url('/admin/entidad/eliminar') }}">
    <input id="urlSaveEdEnt" type="hidden" value="{{ url('/admin/entidad/editar/save') }}">  

    <table id="datatable1" class="table display responsive ">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Nit</th>
          <th>Dominio</th>          
          <th>Licencia</th>
          <th>Clase</th>
          <th>Fecha de Creación</th>          
          <th>Editar</th>
          <th>Eliminar</th>
        </tr>
      </thead>
      <tbody>
        @foreach($ents as $ent)
          <tr>
            <td>{{ $ent->nombre }}</td>            
            <td>{{ $ent->nit }}</td>
            <td>{{ $ent->dominio }}</td>
            
            @if($ent->licencia != 'NA')
              <td>{{ $ent->licencia }} dias</td>
            @else 
              <td>{{ $ent->licencia }}</td>
            @endif
            
            <td>{{ $ent->TipoEntidad->nombre }}</td>
            <td>{{ $ent->created_at }}</td>            
            <td><a href="javascript:editEnt({{ Auth::user()->id }}, {{ $ent->id }})" class="btn btn-info"><i class="fa fa-edit tx-20"></i></a></td>
            <td><a href="javascript:deleteEnt({{ Auth::user()->id }}, {{ $ent->id }})" class="btn btn-danger"><i class="fa fa-trash tx-20"></i></a></td>
          </tr>
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

  });
</script>