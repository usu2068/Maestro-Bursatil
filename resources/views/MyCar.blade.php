<?php $valor_tot = 0; ?>
<div class="modal-header pd-y-20 pd-x-25">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body pd-25">

  <div class="col-lg-12">
    <h5 class="tx-gray-800 mg-b-25">Productos Seleccionados</h5>
      
      <table class="table">
        <tbody>
          
          <tr>
            <th>Nombre del Producto</th>
            <th>Descripción</th>
            <th>Valor</th>
            <th>Descartar</th>
          </tr>

          @foreach($products as $product)
            @foreach( $prodUser as $proUser )
              @if( $proUser == $product->id )
                <tr>
                  <td>{{ $product->nombre }}</td>
                  <td>{{ $product->descripcion }}</td>
                  <td>{{ $product->valor }}</td>
                  <td><a href="#" class="btn btn-warning">Descartar</a></td>
                </tr>
                <?php $valor_tot = $valor_tot + $product->valor; ?>
              @endif
            @endforeach
          @endforeach
          
          <input id="urlEnvPay"     type="hidden" value="{{ url('/shop/sale') }}">
          <input id="merchantId"    type="hidden" value="59444">
          <input id="accountId"     type="hidden" value="63487">
          <input id="description"   type="hidden" value="Curso Virtual Maestro Bursatil">
          <input id="amount"        type="hidden" value="{{ $valor_tot }}">
          <input id="tax"           type="hidden" value="0">
          <input id="taxReturnBase" type="hidden" value="0">
          <input id="currency"      type="hidden" value="COP">
          <input id="test"          type="hidden" value="0">
          <input id="buyerEmail"    type="hidden" value="{{ Auth::user()->email }}">
          <input id="buyerFullName" type="hidden" value="{{ Auth::user()->name }}">
          <input id="responseUrl" type="hidden" value="{{ url('/shop/pay-response') }}">
          <input id="confirmationUrl" type="hidden" value="http://maestrobursatil.com/shopp/pay-confirmation.php">
          

          <tr>
            <td colspan="3">Valor Total</td>
            <td> {{ $valor_tot }} </td>
          </tr>

      </tbody>
    </table>
    
  </div><!-- col-12 -->

</div>
<div class="modal-footer">
  <a href="javascript:envPay()" class="btn btn-info pd-x-20">Comprar</a>
</div>