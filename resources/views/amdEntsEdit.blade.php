<div class="modal-header pd-y-20 pd-x-25">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body pd-25">

  <div class="col-lg-12">
    <h5 class="tx-gray-800 mg-b-25">Editar Entidad</h5>

    <div class="row row-xs">
      <div class="col">
        <div class="form-group">
          <label class="form-control-label">Nombre:</label>
          <input type="email" id="name" class="form-control" placeholder="{{ $ent->nombre }}">
        </div><!-- form-group -->
      </div>
      <div class="col">
        <div class="form-group">
          <label class="form-control-label">Nit:</label>
          <input type="email" id="nit" class="form-control" placeholder="{{ $ent->nit }}">
        </div><!-- form-group -->
      </div>
    </div>

    <div class="row row-xs">
      <div class="col">
        <div class="form-group">
          <label class="form-control-label">Dominio:</label>
          <input type="text" id="dom" class="form-control" placeholder="{{ $ent->dominio }}">
        </div><!-- form-group -->
      </div><!-- col -->
      <div class="col">
        <div class="form-group">
          <label class="form-control-label">Licencia:</label>
          <input type="number" id="lice" class="form-control" placeholder="{{ $ent->licencia }}">
        </div><!-- form-group -->
      </div><!-- col -->
    </div><!-- row -->

    <div class="form-group">
      <label class="form-control-label">Tipo de Entidad:</label>
      <select class="form-control select2" id="selTipEnts">
        <option value="{{ $ent->TipoEntidad->id }}">{{ $ent->TipoEntidad->nombre }}</option>
        @foreach( $TipEnts as $TipEnt )
          @if( $TipEnt->id != $ent->TipoEntidad->id )
            <option value="{{ $TipEnt->id }}">{{ $TipEnt->nombre }}</option>
          @endif
        @endforeach
      </select>
    </div><!-- form-group -->

</div>
<div class="modal-footer">
  <a href="javascript:saveEditEnt({{ Auth::user()->id }}, {{ $ent->id }})" class="btn btn-info pd-x-20">Guardar Cambios</a>
  <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Cancelar</button>
</div>