<div class="card pd-20 pd-sm-40">
  <h6 class="card-body-title">Asignación de Productos.</h6>
  <p class="mg-b-20 mg-sm-b-30">Realice la activación de productos a los usuarios vinculados con su entidad.</p>
  
  <div class="table-wrapper">

    <input id="urlSaveAsigProduct" type="hidden" value="{{ url('/admin/activepr/save') }}">    

      <div class="row row-xs">

        <div class="col">
          <div class="form-group">
            <label class="form-control-label">Email:</label>
            <input type="text" id="correo" class="form-control" placeholder="usuario@mientidad.com" required>
          </div><!-- form-group -->
        </div>

        <div class="col">
          <div class="form-group">
            <label class="form-control-label">Cédula:</label>
            <input type="number" id="cedula" class="form-control" placeholder="1234567890" required>
          </div><!-- form-group -->
        </div><!-- col -->

      </div>

      <div class="form-group">

        <label class="form-control-label">Productos:</label>
        <select class="form-control select2" id="selProd">
          <option value="0">Ejija el producto deseado.</option>
          @foreach( $products as $product )
              <option value="{{ $product->id }}">{{ $product->nombre }}</option>
          @endforeach
        </select>

      </div><!-- form-group -->

      <div class="form-group">
        <a href="javascript:activProductosSave()" class="btn btn-info"><i class="fa fa-save tx-20"></i> Asignar Producto</a>
      </div>

  </div>
</div>