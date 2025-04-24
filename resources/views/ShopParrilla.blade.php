<div class="row row-sm mg-t-50">
  <div class="col-lg-12">
    <div class="card pd-20 pd-sm-40">
      <a href="javascript:change();" class="btn btn-info">Ver Carro</a>
    </div>
  </div>
  @foreach($products as $product)
  <div class="col-lg-4" style="margin-top: 30px">
    <div class="card pd-20 pd-sm-40">
      <h6 class="card-body-title">{{ $product->nombre }}</h6>
      <div class="card bd-0">
        <img class="card-img-top img-fluid" src="{{ $product->image }}" alt="Image">
        <div class="card-body bd bd-t-0">
          <h6 class="mg-b-3"><a href="" class="tx-dark">{{ $product->valor }}</a></h6>
          <span class="tx-12">{{ $product->descripcion }}</span>
          <br><br>
          <a href="javascript:addCar({{$product->id}});" class="btn btn-info">Agregar a mi carro</a>
        </div>
      </div>
    </div><!-- card -->
  </div><!-- col-6 -->
  @endforeach
</div>