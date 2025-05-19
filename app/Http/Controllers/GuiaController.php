<?php

//define el espacio de nombres del controlador para su organizacion dentro del proyecto
namespace App\Http\Controllers;

//importacion de clases necesarias de laravel
use Illuminate\Http\Request; //manejo de solicitudes HTTP

//estas importaciones de htmlserviceprovider y las facades form y html son obsoletas en versiones modernas de laravel
//se requieree instalar el paquete laravelcollective/html para que estas funcionen correctamente.
use Illuminate\Html\HtmlServiceProvider;
use Illuminate\Html\FormFacade;
use Illuminate\Html\HtmlFacade;

use Illuminate\Support\Facades\DB; //para realizar consultas directas a la base de datos
use Illuminate\Support\Facades\Auth; //para acceder a la autenticacion de usuarios.

//importacion de modelos personalizados de la aplicacion
use App\modelos\User;
use App\modelos\Guia;

//use App\modelos\LogAvanTuto;
//clase controladora para manejar la logica de las guias.
class GuiaController extends Controller{
	
	/**
	 * muestra la vista de la guia seleccionada.
	 */
	function index(Request $request){

		//obtiene el valor enviado por el formulario (o AJAX) y lo divide en partes usando ';;' como separador
		$guis = explode(';;', $request->input("id_gui"));	
		
		//recupera la guia especifica desde la base de datos usando el segundo elemento del arreglo
		$InfoGuia = Guia::where([ "id"=>$guis[1] ])->first();

		//divide el contenido de la guia almacenado en el campo 'issu' usando ';;' como separador
		$ContGuia = explode(';;', $InfoGuia->issu);

		//dd($ContGuia);
		
		//retorna la vista 'guia' pasando los datos necesarios para su visualización.
		return view( 'guia', compact('ContGuia', 'InfoGuia') );
	}    

}
