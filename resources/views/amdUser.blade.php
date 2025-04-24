<div class="card pd-20 pd-sm-40">
  <h6 class="card-body-title">Administración de usuarios.</h6>
  <p class="mg-b-20 mg-sm-b-30">Realice la creación, edición y eliminacion de los usuarios vinculados a su entidad.</p>

  <div class="form-group">
    <input id="urlNewUsr" type="hidden" value="{{ url('/admin/users/new') }}">
    <a href="javascript:newUser({{ Auth::user()->id }})" class="btn btn-info"><i class="fa fa-user-plus tx-20"></i> Nuevo Usuario</a>
  </div>

  <div class="table-wrapper">
    
    <input id="urlEdUsr" type="hidden" value="{{ url('/admin/users/editar') }}">  
    <input id="urlElUsr" type="hidden" value="{{ url('/admin/users/eliminar') }}">
    <input id="urlSaveEdUsr" type="hidden" value="{{ url('/admin/users/editar/save') }}">  

    <table id="datatable1" class="table display responsive ">
      <thead>
        <tr>
          <th>Editar</th>
          <th>Eliminar</th>
          <th>Nombre</th>
          <th>Cédula</th>
          <th>E-mail</th>
          <th>Fecha de Creación</th>
          <th>Entidad</th>
          <th>Perfil</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
          <tr>
            <td><a href="javascript:editUser({{ $user->id }})" class="btn btn-info"><i class="fa fa-edit tx-20"></i></a></td>
            <td><a href="javascript:deleteUser({{ $user->id }})" class="btn btn-danger"><i class="fa fa-user-times tx-20"></i></a></td>            
            <td>{{ $user->name }}</td>
            <td>{{ $user->cedula }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at }}</td>
            <td>{{ $user->entidad->nombre }}</td>
            <td>{{ $user->perfil->perfil }}</td>           
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