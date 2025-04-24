<div class="modal-header pd-y-20 pd-x-25">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body pd-25">

  <div class="col-lg-12">
    <h5 class="tx-gray-800 mg-b-25">Editar Usuario</h5>

    <input id="urlEdUsr" type="hidden" value="{{ url('/admin/users/editar') }}">
    <input id="urlResP" type="hidden" value="{{ url('/admin/users/reset') }}">

    <div class="form-group">
      <label class="form-control-label">Email:</label>
      <input type="email" id="email" class="form-control" placeholder="{{ $user->email }}">
    </div><!-- form-group -->

    <div class="row row-xs">
      <div class="col">
        <div class="form-group">
          <label class="form-control-label">Nombre:</label>
          <input type="text" id="name" class="form-control" placeholder="{{ $user->name }}">
        </div><!-- form-group -->
      </div><!-- col -->
      <div class="col">
        <div class="form-group">
          <label class="form-control-label">Cédula:</label>
          <input type="number" id="cedula" class="form-control" placeholder="{{ $user->cedula }}">
        </div><!-- form-group -->
      </div><!-- col -->
    </div><!-- row -->

    <div class="form-group">
      <label class="form-control-label">Entidad:</label>
      <select class="form-control select2" id="selEnts">
        <option value="{{ $user->entidad->id }}">{{ $user->entidad->nombre }}</option>
        @foreach( $ents as $ent )
          @if( $ent->id != $user->entidad->id )
            <option value="{{ $ent->id }}">{{ $ent->nombre }}</option>
          @endif
        @endforeach
      </select>
    </div><!-- form-group -->

    <div class="form-group">
      <label class="form-control-label">Perfil:</label>
      <select class="form-control select2" id="selPerfs">
        <option value="{{ $user->perfil->id }}">{{ $user->perfil->perfil }}</option>
        @foreach( $perfs as $perf )
          @if( Auth::user()->id_perfil <= $perf->id)
            @if( $perf->id != $user->perfil->id )
              <option value="{{ $perf->id }}">{{ $perf->perfil }}</option>
            @endif
          @endif
        @endforeach
      </select>
    </div><!-- form-group -->
  </div><!-- col-12 -->

</div>
<div class="modal-footer">
  <a href="javascript:saveRestaurUser({{ $user->id }})" class="btn btn-warning pd-x-20">Restaurar Contraseña</a>
  <a href="javascript:saveEditUser({{ $user->id }})" class="btn btn-info pd-x-20">Guardar Cambios</a>
  <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Cancelar</button>
</div>