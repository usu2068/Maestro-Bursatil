<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Clases para generacion de formularios y HTML (requiere laravelcollective/html si se usan)
use Illuminate\Html\HtmlServiceProvider;
use Illuminate\Html\FormFacade;
use Illuminate\Html\HtmlFacade;

use Illuminate\Support\Facades\DB; //facade para consultas directas a la base de datos
use Illuminate\Support\Facades\Auth; //facade para autenticacion de usuarios

//modelos utilizados por el controlador
use \App\modelos\Producto;
use \App\modelos\ProductsOfUser;
use \App\modelos\User;
use \App\modelos\Perfil;

use \App\modelos\Facturas;

/**
 * controlador de tienda (shop) que maneja:
 * - Listado de productos
 * - Carrito de compras
 * - Generación de facturas y proceso de pago
 */
class ShopController extends Controller{

	/**
     * Muestra el catálogo de productos ordenados por nombre.
     *
     * @return \Illuminate\View\View Vista con la parrilla de productos
     */

	function index(){

		// Obtiene todos los productos y los ordena alfabéticamente
		$products = Producto::all()->sortBy('nombre');

		// Retorna la vista 'ShopParrilla' pasando la colección de productos
		return view('ShopParrilla', compact('products'));
	}

	/**
     * Muestra el carrito de compras del usuario.
     *
     * @param Request $request Contiene los IDs de productos en el carrito
     * @return \Illuminate\View\View Vista del carrito con productos disponibles y seleccionados
     */
	function car( Request $request ){
		// Lista completa de productos para mostrar en el carrito
		$products = Producto::all()->sortBy('nombre');

		// IDs de productos seleccionados por el usuario, enviados como cadena '::'-separada
		$prodUser = explode('::', $request->idsProds);
		
		//retorna la vista 'MyCar' con todos los productos seleccionados.
		return view('MyCar',compact('products', 'prodUser'));
	}

	/**
	 * Procesa la ventana:  crea una factura, calcula referencia y firma para PayU,
	 * y despliega la vista de pago.
	 */
	function sale(Request $request){

		//extrae parametros de la solicitud 
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

		//crea una nueva factura en estado 'SOLI' (solicitado)
		Facturas::create([
			"id_user"=>Auth::user()->id,
			"products"=>$idsProds,
			"total"=>$amount,
			"time_licencia"=>90,
			"estado_fac"=>'SOLI'
		]);
  		
		//obtiene la ultima factura creada para generar la referencia de pago
		$facts = Facturas::all();
		$newFact = $facts->last();
		$referenceCode = 'MBPRV'.$newFact->id;

		//actualiza la factura con el código de referencia
		$edFact = Facturas::where([ "id" =>  $newFact->id])->first();
		$edFact->ref_pay = $referenceCode;
		$edFact->save();

		//calcula la firma (signature) requerida por PayU
		$signature = md5('12904af407b~'.$merchantId.'~'.$referenceCode.'~'.$amount.'~COP');

		//Retorna la vista que contiene el formulario oculto para PayU
		return view('ShopAcepPayu', compact('urlPayu', 'merchantId', 'accountId', 'description', 'amount', 'tax', 'taxReturnBase', 'currency', 'signature', 'test', 'buyerEmail', 'buyerFullName', 'responseUrl', 'confirmationUrl', 'referenceCode'));
	}

	/**
	 * Punto de retorno tras el pago (pendiente de implementacion)
	 */
	function payResponse(){

	}

	/**
	 * Endpoint de configuracion de pago (IPN/webhook) invocado por PayU.
	 * Actualiza el estado de la factura segun la notificacion recibida.
	 */
	function payConfirmation(Request $request){

		/*$llave = "12904af407b";
		$merchant_id = $request->merchant_id;
		$ref_venta = $request->reference_pol;
		$valor = $request->value;
		$moneda = $request->billing_country;
		$estado = 0;
		$estado_pol = $request->ip;
		$firma_cadena = $llave."~".$usuario_id."~".$ref_venta."~".$valor."~".$moneda."~".$estado_pol;*/

		//busca factura por referencia y cambia el estado.
		$factu = Facturas::where(['ref_pay' => 'MBPRV50'])->first();
		$factu->estado_fac = 'cambia';		
		$factu->save();
	}
}
