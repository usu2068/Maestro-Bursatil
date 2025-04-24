<div class="modal-header pd-y-20 pd-x-25">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body pd-25">

  <div class="col-lg-12">
    <h5 class="tx-gray-800 mg-b-25">Nueva Entidad</h5>    
      <input id="urlNewEntSV" type="hidden" value="{{ url('/admin/entidad/new/save') }}">
    </div>

    <div class="row row-xs">

      <div class="col">
        <div class="form-group">
          <label class="form-control-label">Nombre:</label>
          <input type="text" id="name" class="form-control" placeholder="Nueva Entidad S.A.S" required>
        </div><!-- form-group -->
      </div>

      <div class="col">
        <div class="form-group">
          <label class="form-control-label">Nit:</label>
          <input type="number" id="nit" class="form-control" placeholder="000000000" required>
        </div><!-- form-group -->
      </div><!-- col -->

    </div>

    <div class="row row-xs"> 

      <div class="col">
        <div class="form-group">
          <label class="form-control-label">Dominio:</label>
          <input type="text" id="dom" class="form-control" placeholder="nuevaentidad.com" required>
        </div><!-- form-group -->
      </div><!-- col -->
    </div><!-- row -->

    <div class="row row-xs">
      <div class="col">
        <div class="form-group">
          <label class="form-control-label">Licencia:</label>
          <input type="number" id="lice" class="form-control" placeholder="365 dias" required>
        </div><!-- form-group -->
      </div><!-- col -->

    </div><!-- row -->

    <div class="form-group">
      <label class="form-control-label">Perfil:</label>
      <select class="form-control select2" id="selTipEnts">
        <option value="0">Perfil de la entidad</option>
        @foreach( $TipEnts as $TipEnt )
            <option value="{{ $TipEnt->id }}">{{ $TipEnt->nombre }}</option>
        @endforeach
      </select>
    </div><!-- form-group -->

  </div><!-- col-12 -->

</div>
<div class="modal-footer">
  <a href="javascript:SaveNewEnt({{ Auth::user()->id }})" class="btn btn-info pd-x-20">Guardar Cambios</a>
  <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Cancelar</button>
</div>