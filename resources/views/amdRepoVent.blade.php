<div class="card pd-20 pd-sm-40">
  <h6 class="card-body-title">Reporte de Productos activados.</h6>
  <p class="mg-b-20 mg-sm-b-30">Puede observar un reporte general de las activaciones realizadas por universidades o entidades corporativas.</p>

  <div class="table-wrapper">
    
    <input id="urlEdUsr" type="hidden" value="{{ url('/admin/users/editar') }}">  
    <input id="urlElUsr" type="hidden" value="{{ url('/admin/users/eliminar') }}">
    <input id="urlSaveEdUsr" type="hidden" value="{{ url('/admin/users/editar/save') }}">  

    <table class="table display responsive ">
      <thead>
        <tr>
          <th>Fecha de Activación</th>
          <th>Entidad</th>
          <th>Nombre Usuario</th>
          <th>Productos Activos</th>
          <th>E-mail</th>
          <th>Perfil</th>
        </tr>
      </thead>
      <tbody>

        @foreach($producActiv as $user)
            <?php $lleno = '0'; ?>

            @foreach($user->productsUser as $product)
              @if(!empty($product))
                <?php $lleno = '1'; ?>
              @endif
            @endforeach
            
            @if( $lleno == 1 )

              <tr>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->entidad->nombre }}</td>
                <td>{{ $user->name }}</td>
                <td>
                  @foreach($user->productsUser as $product)                    
                      <p>{{ $product->nombre }}</p>                    
                  @endforeach
                </td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->perfil->perfil }}</td>           
              </tr>
            
            @endif          
        @endforeach

      </tbody>
    </table>

  </div><!-- table-wrapper -->
</div><!-- card -->