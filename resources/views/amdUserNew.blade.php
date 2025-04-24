<div class="modal-header pd-y-20 pd-x-25">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body pd-25">

  <div class="col-lg-12">
    <h5 class="tx-gray-800 mg-b-25">Nuevo Usuario</h5>

    
      <input id="urlNewUsrSV" type="hidden" value="{{ url('/admin/users/new/save') }}">
    </div>

    <div class="form-group">
      <label class="form-control-label">Email:</label>
      <input type="email" id="email" class="form-control" placeholder="ejemplo@entidad.com" required>
    </div><!-- form-group -->

    <div class="row row-xs">
      <div class="col">
        <div class="form-group">
          <label class="form-control-label">Nombre:</label>
          <input type="text" id="name" class="form-control" placeholder="Ejemplo Perez" required>
        </div><!-- form-group -->
      </div><!-- col -->
      <div class="col">
        <div class="form-group">
          <label class="form-control-label">Cédula:</label>
          <input type="number" id="cedula" class="form-control" placeholder="10101110011" required>
        </div><!-- form-group -->
      </div><!-- col -->
    </div><!-- row -->

    <div class="row row-xs">
      <div class="col">
        <div class="form-group">
          <label class="form-control-label">Password:</label>
          <input type="password" id="password" class="form-control" placeholder="Abc12-+*$%" required>
        </div><!-- form-group -->
      </div><!-- col -->
      <div class="col">
        <div class="form-group">
          <label class="form-control-label">Confirme Password:</label>
          <input type="password" id="conpassword" class="form-control" placeholder="Abc12-+*$%" required>
        </div><!-- form-group -->
      </div><!-- col -->
    </div><!-- row -->

    <div class="form-group">
      <label class="form-control-label">Entidad:</label>
      <select class="form-control select2" id="selEnts">
        <option value="0">Entidades Registradas</option>
        @foreach( $ents as $ent )
            <option value="{{ $ent->id }}">{{ $ent->nombre }}</option>
        @endforeach
      </select>
    </div><!-- form-group -->

    <div class="form-group">
      <label class="form-control-label">Perfil:</label>
      <select class="form-control select2" id="selPerfs">
        <option value="0">Perfiles de Usuario</option>
        @foreach( $perfs as $perf )
            @if(Auth::user()->id_perfil <= $perf->id)
              <option value="{{ $perf->id }}">{{ $perf->perfil }}</option>
            @endif
        @endforeach
      </select>
    </div><!-- form-group -->
  </div><!-- col-12 -->

</div>
<div class="modal-footer">
  <a href="javascript:SaveNewUser({{ Auth::user()->id }})" class="btn btn-info pd-x-20">Guardar Cambios</a>
  <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Cancelar</button>
</div>