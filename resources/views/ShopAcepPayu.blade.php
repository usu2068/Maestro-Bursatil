<div class="modal-body pd-25">

  <div class="col-lg-12">
    <h5 class="tx-gray-800 mg-b-25">Gracias por confiar en nosotros.</h5>

    <p>Sus productos se activaran en su perfil una vez se confirme el pago.</p>

    <form method="post" action="https://checkout.payulatam.com/ppp-web-gateway-payu/">
      <input name="merchantId"    type="hidden"  value="{{ $merchantId }}"   >
      <input name="accountId"     type="hidden"  value="{{ $accountId }}" >
      <input name="description"   type="hidden"  value="{{ $description }}"  >
      <input name="referenceCode" type="hidden"  value="{{ $referenceCode }}" >
      <input name="amount"        type="hidden"  value="{{ $amount }}"   >
      <input name="tax"           type="hidden"  value="{{ $tax }}"  >
      <input name="taxReturnBase" type="hidden"  value="{{ $taxReturnBase }}" >
      <input name="currency"      type="hidden"  value="{{ $currency }}" >
      <input name="signature"     type="hidden"  value="{{ $signature }}"  >
      <input name="test"          type="hidden"  value="{{ $test }}" >
      <input name="buyerEmail"    type="hidden"  value="{{ $buyerEmail }}" >
      <input name="responseUrl"    type="hidden"  value="{{ $responseUrl }}" >
      <input name="confirmationUrl"    type="hidden"  value="{{ $confirmationUrl }}" >
      <input name="Submit" class="btn btn-success pd-x-20" type="submit"  value="Aceptar" >
    </form>

  </div><!-- col-12 -->

</div>
