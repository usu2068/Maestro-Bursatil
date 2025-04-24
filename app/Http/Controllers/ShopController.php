<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Html\HtmlServiceProvider;
use Illuminate\Html\FormFacade;
use Illuminate\Html\HtmlFacade;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use \App\modelos\Producto;
use \App\modelos\ProductsOfUser;
use \App\modelos\User;
use \App\modelos\Perfil;

use \App\modelos\Facturas;

class ShopController extends Controller{

	function index(){

		$products = Producto::all()->sortBy('nombre');

		return view('ShopParrilla', compact('products'));
	}

	function car( Request $request ){
		$products = Producto::all()->sortBy('nombre');
		$prodUser = explode('::', $request->idsProds);
		
		return view('MyCar',compact('products', 'prodUser'));
	}

	function sale(Request $request){

		$idsProds = $request->idsProds;
		$merchantId = $request->merchantId;
		$accountId = $request->accountId;
		$description = $request->description;
		$amount = $request->amount;
		$tax = $request->tax;
		$taxReturnBase = $request->taxReturnBase;
		$currency = $request->currency;
		$test = $request->test;
		$buyerEmail = $request->buyerEmail;
		$buyerFullName = $request->buyerFullName;
		$responseUrl = $request->responseUrl;
		$confirmationUrl = $request->confirmationUrl; 

		//dd($amount);

		Facturas::create([
			"id_user"=>Auth::user()->id,
			"products"=>$idsProds,
			"total"=>$amount,
			"time_licencia"=>90,
			"estado_fac"=>'SOLI'
		]);
  		
		$facts = Facturas::all();
		$newFact = $facts->last();
		$referenceCode = 'MBPRV'.$newFact->id;

		$edFact = Facturas::where([ "id" =>  $newFact->id])->first();
		$edFact->ref_pay = $referenceCode;
		$edFact->save();

		$signature = md5('12904af407b~'.$merchantId.'~'.$referenceCode.'~'.$amount.'~COP');

		return view('ShopAcepPayu', compact('urlPayu', 'merchantId', 'accountId', 'description', 'amount', 'tax', 'taxReturnBase', 'currency', 'signature', 'test', 'buyerEmail', 'buyerFullName', 'responseUrl', 'confirmationUrl', 'referenceCode'));
	}

	function payResponse(){

	}

	function payConfirmation(Request $request){

		/*$llave = "12904af407b";
		$merchant_id = $request->merchant_id;
		$ref_venta = $request->reference_pol;
		$valor = $request->value;
		$moneda = $request->billing_country;
		$estado = 0;
		$estado_pol = $request->ip;
		$firma_cadena = $llave."~".$usuario_id."~".$ref_venta."~".$valor."~".$moneda."~".$estado_pol;*/

		$factu = Facturas::where(['ref_pay' => 'MBPRV50'])->first();
		$factu->estado_fac = 'cambia';		
		$factu->save();
	}
}
