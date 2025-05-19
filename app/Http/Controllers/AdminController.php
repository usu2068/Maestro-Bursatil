<?php

/**
 * AdminController.php
 *
 * Este controlador gestiona la administración de usuarios, entidades y productos.
 * Implementa funciones para crear, editar, eliminar y ver usuarios, entidades y productos.
 * Además, proporciona métodos para asignar productos a usuarios específicos.
 */


//include '\..\..\..\Clases\PHPExcel.php';
//include '\..\..\..\Clases\PHPExcel\Reader\Excel2007.php';

namespace App\Http\Controllers;
//require_once 'Classes/PHPExcel.php';
//include_once('/Clases/PHPExcel.php');
//include_once('/Clases/PHPExcel/Reader/Excel2007.php');

use Illuminate\Http\Request;

use Illuminate\Html\HtmlServiceProvider;
use Illuminate\Html\FormFacade;
use Illuminate\Html\HtmlFacade;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use \App\modelos\Entidad;
use \App\modelos\EntidadTipo;

use \App\modelos\Producto;
use \App\modelos\ProductsOfUser;
use \App\modelos\User;
use \App\modelos\Perfil;

use App\modelos\Simulador;
use App\modelos\TemasOfSimulador;
use App\modelos\LogAvanSimu;

use App\modelos\Tutorial;
use App\modelos\TemasOfTutoria;
use App\modelos\LogAvanTuto;

use App\modelos\ContenidoTuto;
use App\modelos\ContenidoSimu;

/*use Clases\PHPExcel\IOFactory;
use Clases\PHPExcel\Spreadsheet;
include '\Clases\PHPExcel.php';
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;*/

class AdminController extends Controller{

	/**
     * Constructor del controlador que aplica el middleware de autenticación.
     */
	public function __construct(){

        $this->middleware('auth');
    }
    
	/**
     * Muestra la vista de inicio del panel administrativo.
     *
     * @return \Illuminate\View\View
     */
    function index(){

    	$logs_ini = array();
    	$i = 0;

    	if(Auth::user()->id_perfil == 1){
    		
    		$logs_ini = LogAvanSimu::all()->sortByDesc('efectividadTotal')->take(3);

    		$users = User::all()->sortByDesc('created_at')->take(10);
    		
    		return view('amdIndex', compact('logs_ini', 'users'));

    	}else if(Auth::user()->id_perfil == 2){
    		
    		$logs_ini_c = LogAvanSimu::all()->sortByDesc('efectividadTotal');
    		$users = User::where(['id_entidad'=>Auth::user()->id_entidad])->get()->sortBy('created_at')->take(10);

    		foreach ($logs_ini_c as $log_ini_c) {
    			if($i<3){
	    			if($log_ini_c->usuarios->id_entidad == Auth::user()->id_entidad){
	    				$logs_ini[$i] = $log_ini_c;
	    				++$i;
	    			}
    			}
    		}

    		return view('amdIndex', compact('logs_ini', 'users'));

    	}else{

    	}
    }

/* - Administracion de Usuarios */

/**
     * Muestra la lista de usuarios disponibles para administración.
     * 
     * - Perfil 1: puede ver todos los usuarios.
     * - Perfil 2: ve solo usuarios de su entidad.
     * - Otros perfiles no tienen autorización y reciben mensaje de error.
     * 
     * @param Request $request
     * @return \Illuminate\View\View Vista con listado de usuarios o mensaje de error.
     */

    function view_user(Request $request){

    	/*$id_adm = $request->input('id_adm');

    	$user = User::where([ 'id' => $id_adm ])->first();*/

    	if(Auth::user()->id_perfil == 1){
			$users = User::all();
		}else if(Auth::user()->id_perfil == 2){
			$users = User::where( ["id_entidad" => Auth::user()->id_entidad] )->get();
		}else{
    		$users = 'Usted no esta autorizado para aceder a este contenido';
    	}

    	return view('amdUser', compact('users'));
    }

	/**
     * Muestra el formulario para crear un nuevo usuario.
     * 
     * - Perfil 1: puede seleccionar cualquier entidad.
     * - Perfil 2: solo puede seleccionar su propia entidad.
     * 
     * @param Request $request
     * @return \Illuminate\View\View Vista con formulario para crear usuario.
     */
    function new_user(Request $request){ 
    	
    	if(Auth::user()->id_perfil == 1){
    		$ents = Entidad::all();
    	}else if(Auth::user()->id_perfil == 2){
    		$ents = Entidad::where(["id"=>Auth::user()->id_entidad])->get();
    	}

		$perfs = Perfil::all();

    	return view('amdUserNew', compact('ents', 'perfs')); 
    }

	/**
     * Guarda un nuevo usuario en la base de datos.
     * 
     * Valida que no exista un usuario con el mismo email.
     * Asigna productos corporativos predeterminados si el perfil es 3.
     * 
     * @param Request $request Datos enviados por el formulario.
     * @return \Illuminate\View\View|string Vista de confirmación o mensaje de error.
     */
    function save_new_user(Request $request){ 

    	$newName = $request->input('newName');
		$newEmail = $request->input('newEmail');
		$newCedula = $request->input('newCedula');
		$newEnt = intval($request->input('newEnt'));
		$newPerf = intval($request->input('newPerf'));
		$newPass = $request->input('newPass');
		$ConfirmNewPass = $request->input('ConfirmNewPass');

		$user = User::where([ "email" => $newEmail ])->first();

		if( empty($user) ){

			User::create([
	        	"id_entidad" => $newEnt, 
	        	"id_perfil" => $newPerf, 
	        	"name" => $newName, 
	        	"email" => $newEmail, 
	        	"cedula" => $newCedula, 
	        	"password" => bcrypt($newPass)
			]);

			/* - Asignación de productos Corporativos */

			if($newPerf == 3){

				$products = Producto::where(["id" => 1])
					->orWhere(["id"=> 2])
					->orWhere(["id"=> 69])
					->orWhere(["id"=> 25])
					->orWhere(["id"=> 27])
					->orWhere(["id"=> 70])
					->orWhere(["id"=> 61])
					->orWhere(["id"=> 56])
					->orWhere(["id"=> 71])
					->orWhere(["id"=> 38])
					->get()
					->sortBy('nombre');
				
				$user = User::where([ "cedula" => $newCedula ])->first();

				foreach ( $products as $produc ) {
					
					/*ProductsOfUser::create([
						"id_users" => $user->id, 
						"id_producto" => $produc->id, 
						"dias_licen" => 365
					])->get();*/
					
					DB::table('mb04_products_of_users')->insert([
						"id_users" => $user->id, 
						"id_producto" => $produc->id,
						"dias_licen" => 365,
					]);
					
					//print_r($productofuser);
				}

			}

	    	return view('amdUserNewSave'); 

		}else{

			return '<div class="alert alert-danger alert-bordered pd-y-20" role="alert" style="margin: 0px;">
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			  <div class="d-flex align-items-center justify-content-start">
			    <i class="icon ion-ios-close alert-icon tx-52 tx-danger mg-r-20"></i>
			    <div>
			      <h5 class="mg-b-2 tx-danger">Ya existe un usuario asignado a este correo.</h5>
			    </div>
			  </div><!-- d-flex -->
			</div>';

		}
		
    }

	/**
     * Muestra el formulario para editar un usuario existente.
     * 
     * Carga datos del usuario, entidades y perfiles disponibles según permisos.
     * 
     * @param Request $request Contiene el id del usuario a editar.
     * @return \Illuminate\View\View Vista con formulario para edición.
     */
    function edit_user(Request $request){

    	$id_usr = $request->input('id_usr');
		$user = User::where([ 'id' => $id_usr ])->first();

		if(Auth::user()->id_perfil == 1){
    		$ents = Entidad::all();
    	}else if(Auth::user()->id_perfil == 2){
    		$ents = Entidad::where(["id"=>Auth::user()->id_entidad])->get();
    	}

		$perfs = Perfil::all();

    	return view('amdUserEdit', compact('user','ents','perfs'));
    }

	/**
     * Guarda los cambios realizados a un usuario existente.
     * 
     * Actualiza nombre, email, cédula, entidad y perfil según los datos recibidos.
     * Devuelve una respuesta con mensaje de éxito y un script para recargar datos.
     * 
     * @param Request $request Datos actualizados del usuario.
     * @return string HTML con mensaje de éxito y script para refrescar vista.
     */
    function edit_user_save(Request $request){

    	$id_usr = $request->input('id_usr');

    	$newName = $request->input('newName');
		$newEmail = $request->input('newEmail');
		$newCedula = $request->input('newCedula');
		$newEnt = $request->input('newEnt');
		$newPerf = $request->input('newPerf');

		$edUser = User::where([ "id" => $id_usr ])->first();

		if($newName != '') $edUser->name = $newName;
		if($newEmail != '') $edUser->email = $newEmail;
		if($newCedula != '') $edUser->cedula = $newCedula;
		$edUser->id_entidad = $newEnt;
		$edUser->id_perfil = $newPerf;		
		$edUser->save();

		$respEdit = '
			<div class="alert alert-success alert-bordered pd-y-20" role="alert" style="margin: 0px;">
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			  <div class="d-flex align-items-center justify-content-start">
			    <i class="icon ion-ios-close alert-icon tx-52 tx-success mg-r-20"></i>
			    <div>
			      <h5 class="mg-b-2 tx-success">Usuario Editado!!</h5>
			    </div>
			  </div><!-- d-flex -->
			</div>';

		$script = "
			<script>
				$(function(){
					'use strict';
					amdUser(".Auth::user()->id.")
				});
			</script>
		";

    	return $script.$respEdit;
    }

	/**
 * Restablece la contraseña de un usuario.
 * 
 * Esta función genera una nueva contraseña basada en la cédula del usuario y el año actual.
 * Luego, actualiza la contraseña del usuario en la base de datos.
 * La nueva contraseña tiene el formato: [cedula][año actual].
 * 
 * @param Request $request Solicitud HTTP que contiene el ID del usuario a actualizar.
 * @return string HTML que muestra un mensaje de éxito con la nueva contraseña generada.
 */

    function reset_pass(Request $request){

		// Obtener el ID del usuario desde la solicitud
    	$id_usr = $request->input('id_usr');  
		
		// Obtener el usuario
    	$user = User::where([ "id" => $id_usr ])->first();
    	$user->password = bcrypt($user->cedula.date('Y'));
		
		// Guardar la nueva contraseña
		$user->save();

		// Mensaje de éxito con la nueva contraseña
		$respEdit = '
			<div class="alert alert-success alert-bordered pd-y-20" role="alert" style="margin: 0px;">
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			  <div class="d-flex align-items-center justify-content-start">
			    <i class="icon ion-ios-close alert-icon tx-52 tx-success mg-r-20"></i>
			    <div>
			      <h5 class="mg-b-2 tx-success">Contraseña Restablecida!!<br><br>Nueva Contraseña: '.$user->cedula.date('Y').'</h5>
			    </div>
			  </div><!-- d-flex -->
			</div>';

		return $respEdit;
    }

	/**
 * Elimina un usuario del sistema.
 * 
 * Esta función intenta eliminar un usuario basado en su ID. 
 * Además, se incluye manejo de excepciones para capturar errores durante el proceso.
 * Los datos asociados al usuario (logs, productos, etc.) están comentados y no se eliminan.
 * 
 * @param Request $request Solicitud HTTP que contiene el ID del usuario a eliminar.
 * @return string HTML con un mensaje de éxito o error.
 */

    function delete_user(Request $request){

		// Obtener el ID del usuario desde la solicitud
    	$id = $request->input('id_usr');

/*PROBALO MAÑANA VIERNES !!!!!*/
    	/*LogAvanSimu::destroy('id_user', $id);
    	LogAvanTuto::destroy('id_user', $id);
    	ProductsOfUser::destroy('id_users', $id);

    	$logSim = LogAvanSimu::where(['id_user'=>$id])->get(); 
    	$logSim->delete(); 

    	$logTut = LogAvanTuto::where(['id_user'=>$id])->get(); 
    	$logTut->delete(); 

    	$prOfUser = ProductsOfUser::where(['id_users'=>$id])->get(); 
    	$prOfUser->delete(); */

    	try{

			// Eliminar el usuario por ID
			User::destroy($id);

			// Mensaje de éxito
			$respEdit = '
			<div class="alert alert-success alert-bordered pd-y-20" role="alert" style="margin: 0px;">
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			  <div class="d-flex align-items-center justify-content-start">
			    <i class="icon ion-ios-close alert-icon tx-52 tx-success mg-r-20"></i>
			    <div>
			      <h5 class="mg-b-2 tx-success">Usuario Eliminado!!</h5>
			    </div>
			  </div><!-- d-flex -->
			</div>';
		
		}catch(PDOException $e){

			// Mensaje de error con el detalle del error capturado
			$respEdit = '
			<div class="alert alert-success alert-bordered pd-y-20" role="alert" style="margin: 0px;">
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			  <div class="d-flex align-items-center justify-content-start">
			    <i class="icon ion-ios-close alert-icon tx-52 tx-success mg-r-20"></i>
			    <div>
			      <h5 class="mg-b-2 tx-success">Existe un error'.$e.'</h5>
			    </div>
			  </div><!-- d-flex -->
			</div>';

		}    	
// Script para recargar la vista de usuarios
		$script = "
			<script>
				$(function(){
					'use strict';
					amdUser(".Auth::user()->id.")
				});
			</script>
		";

    	return $script.$respEdit;

    }

/* Fin Usuarios*/

/*--*/

/* - Administracion de Entidades */

/**
 * Muestra el listado de entidades.
 * 
 * Si el usuario tiene perfil de administrador (id_perfil = 1), se obtienen todas las entidades.
 * En caso contrario, se muestra un mensaje de acceso denegado.
 * 
 * @param Request $request Solicitud HTTP.
 * @return \Illuminate\View\View Vista con las entidades o mensaje de acceso denegado.
 */

    function view_entidad(Request $request){

    	if(Auth::user()->id_perfil == 1){
			$ents = Entidad::all();
		}else{
    		$ents = 'Usted no esta autorizado para aceder aca';
    	}

    	return view('amdEnts', compact('ents'));
    }

	/**
 * Muestra el formulario para crear una nueva entidad.
 * 
 * Obtiene todos los tipos de entidad para mostrarlos en el formulario de creación.
 * 
 * @param Request $request Solicitud HTTP.
 * @return \Illuminate\View\View Vista con el formulario de creación de entidad.
 */
    function new_entidad(Request $request){

		$TipEnts = EntidadTipo::all();

    	return view('amdEntsNew', compact('TipEnts'));
    }

	/**
 * Guarda una nueva entidad en la base de datos.
 * 
 * Crea una nueva entidad con los datos proporcionados en el formulario. 
 * Por defecto, el logo asignado es 'logo.jpg'.
 * 
 * @param Request $request Solicitud HTTP con los datos de la nueva entidad.
 * @return string HTML con el mensaje de éxito.
 */

    function new_entidad_save(Request $request){


    	$newName = $request->input('newName');
		$newNit = $request->input('newNit');
		$newDominio = $request->input('newDominio');
		$newLicencia = $request->input('newLicencia');
		$newTipEnt = $request->input('newTipEnt');

		//dd($newEnt);

		// Crear la nueva entidad
		Entidad::create([
        	"id_tipo_ent" => $newTipEnt, 
        	"nombre" => $newName, 
        	"nit" => $newNit, 
        	"dominio" => $newDominio, 
        	"logo" => 'logo.jpg', 
        	"licencia" => $newLicencia
		]);

		// Mensaje de éxito
		$respEdit = '
			<div class="alert alert-success alert-bordered pd-y-20" role="alert" style="margin: 0px;">
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			  <div class="d-flex align-items-center justify-content-start">
			    <i class="icon ion-ios-close alert-icon tx-52 tx-success mg-r-20"></i>
			    <div>
			      <h5 class="mg-b-2 tx-success">Entidad Creada!!</h5>
			    </div>
			  </div><!-- d-flex -->
			</div>';

		return $respEdit;
    }

	/**
 * Muestra el formulario para editar una entidad.
 * 
 * Obtiene los datos de la entidad seleccionada y todos los tipos de entidad disponibles.
 * 
 * @param Request $request Solicitud HTTP que contiene el ID de la entidad a editar.
 * @return \Illuminate\View\View Vista con el formulario de edición de la entidad.
 */
    function edit_entidad(Request $request){

    	$id_ent = $request->input('id_ent');
		$ent = Entidad::where([ 'id' => $id_ent ])->first();

		$TipEnts = EntidadTipo::all();

    	return view('amdEntsEdit', compact('ent','TipEnts'));
    }

	/**
 * Actualiza los datos de una entidad existente.
 * 
 * Se permite actualizar el nombre, NIT, dominio, licencia y tipo de entidad.
 * 
 * @param Request $request Solicitud HTTP con los datos actualizados.
 * @return string HTML con el mensaje de éxito.
 */
    function edit_entidad_save(Request $request){

    	$id_ent = $request->input('id_ent');

    	$newName = $request->input('newName');
		$newNit = $request->input('newNit');
		$newDominio = $request->input('newDominio');
		$newLicencia = $request->input('newLicencia');
		$newTipEnt = $request->input('newTipEnt');

		$edEnt = Entidad::where([ "id" => $id_ent ])->first();

		// Actualizar los datos de la entidad
		if($newName != '') $edEnt->nombre = $newName;
		if($newNit != '') $edEnt->nit = $newNit;
		if($newDominio != '') $edEnt->dominio = $newDominio;
		if($newLicencia != '') $edEnt->licencia = $newLicencia;
		$edEnt->id_tipo_ent = $newTipEnt;		
		$edEnt->save();

		// Mensaje de éxito
		$respEdit = '
			<div class="alert alert-success alert-bordered pd-y-20" role="alert" style="margin: 0px;">
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			  <div class="d-flex align-items-center justify-content-start">
			    <i class="icon ion-ios-close alert-icon tx-52 tx-success mg-r-20"></i>
			    <div>
			      <h5 class="mg-b-2 tx-success">Entidad Editada!!</h5>
			    </div>
			  </div><!-- d-flex -->
			</div>';

		return $respEdit;
    }

	/**
 * Elimina una entidad de la base de datos.
 * 
 * Esta función elimina la entidad especificada por ID.
 * 
 * @param Request $request Solicitud HTTP que contiene el ID de la entidad a eliminar.
 * @return string HTML con el mensaje de éxito.
 */
    function delete_ent(Request $request){

    	$id_ent = $request->input('id_ent');

		 // Eliminar la entidad
    	Entidad::destroy($id_ent);

		// Mensaje de éxito
    	$respEdit = '
			<div class="alert alert-success alert-bordered pd-y-20" role="alert" style="margin: 0px;">
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			  <div class="d-flex align-items-center justify-content-start">
			    <i class="icon ion-ios-close alert-icon tx-52 tx-success mg-r-20"></i>
			    <div>
			      <h5 class="mg-b-2 tx-success">Entidad Eliminada!!</h5>
			    </div>
			  </div><!-- d-flex -->
			</div>';

    	return $respEdit;
    }

/* Fin Entidades */

/* -- */

/* - Administracion de productos */

/**
 * Muestra la lista de productos activos para usuarios autorizados.
 * 
 * Solo los usuarios con perfil de administrador (id_perfil = 1) o con perfil de operador (id_perfil = 2) 
 * pueden acceder a la lista de productos activos.
 * 
 * @param Request $request Solicitud HTTP.
 * @return \Illuminate\View\View|string Vista con los productos activos o mensaje de acceso denegado.
 */

	function activa_produc(Request $request){
		
		if(Auth::user()->id_perfil == 1 || Auth::user()->id_perfil == 2){
			$products = Producto::where( ['entorno' => 1])->get()->sortBy('descripcion');
			return view('amdProducts', compact('products'));
		}else{
    		$products = 'Usted no esta autorizado para aceder a este contenido';
    		return $products;
    	}
	}

	/**
 * Asigna un producto o un combo de productos a un usuario.
 * 
 * La asignación se realiza utilizando el email o la cédula del usuario.
 * Si el producto es un combo, se asignan múltiples productos de manera automática.
 * 
 * @param Request $request Solicitud HTTP con los datos del usuario y producto.
 * @return string HTML con el mensaje de respuesta.
 */

	function activa_produc_save(Request $request){

		$EmailUser = $request->input('EmailUser');
		$CedulaUser = $request->input('CedulaUser');
		$ProdActiv = $request->input('ProdActiv');
		$styleAlert = '';

		$msjResp = 'Producto asignado.';
		$styleAlert = 'success';

		$user;

		// Buscar usuario por cédula o email
		if($CedulaUser != '') $user = User::where([ "cedula" => $CedulaUser ])->first();
		else if($EmailUser != '') $user = User::where([ "email" => $EmailUser ])->first();		
		else{
			$msjResp = 'Debe digitar el email o la cedula del funcionario para realizar la asignación del producto.';
			$styleAlert = 'danger';
		}

		if( !empty($user) ){

			$product = Producto::where(['id'=>$ProdActiv])->first();
			$contProduc = explode(';;', $product->contenido);

			if($contProduc[0] == 'FULL'){

				// Asignación de combo de productos
				for($i = 1; $i<count($contProduc); ++$i){

					$prodForUser = ProductsOfUser::where([ "id_users" => $user->id, "id_producto" => intval($contProduc[$i]) ])->first();

					if(empty($prodForUser)){

						if( $user->id_perfil == 3) $diasLicen = 365;
						else $diasLicen = 90;

						DB::table('mb04_products_of_users')->insert([
				        	"id_users" => $user->id, 
				        	"id_producto" => intval($contProduc[$i]),
				        	"dias_licen" => $diasLicen,
						]);
					}
				}

				$msjResp = 'Combo Asignado para el funcionario.<br>'.$user->name;
				$styleAlert = 'success';

			}else{

				// Asignación de producto único
				$prodForUser = ProductsOfUser::where([ "id_users" => $user->id, "id_producto" => $ProdActiv])->first();
					
				if(empty($prodForUser)){
					
					if( $user->id_perfil == 3) $diasLicen = 365;
					else $diasLicen = 90;

					DB::table('mb04_products_of_users')->insert([
			        	"id_users" => $user->id, 
			        	"id_producto" => $ProdActiv,
			        	"dias_licen" => $diasLicen,
					]);

					$msjResp = 'Producto Asignado para el funcionario.<br>'.$user->name;
					$styleAlert = 'success';
				
				}else{

					$msjResp = 'Este funcionario ya tiene este producto activo.';
					$styleAlert = 'warning';
				}
			}
		}

		// Mensaje de respuesta
		$respEdit = '
		<div class="alert alert-'.$styleAlert.' alert-bordered pd-y-20" role="alert" style="margin: 0px;">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<div class="d-flex align-items-center justify-content-start">
				<i class="icon ion-ios-close alert-icon tx-52 tx-'.$styleAlert.' mg-r-20"></i>
			</div>
				<h5 class="mg-b-2 tx-'.$styleAlert.'">'.$msjResp.'</h5>			
		</div>';

		return $respEdit;
	}

/* - Administracion de Simuladores */

/**
 * Muestra la vista principal de administración de reportes de simuladores.
 *
 * Recupera todos los simuladores y logs generales de avance, y los pasa a la vista.
 *
 * @return \Illuminate\View\View
 */
    function view_simu(){

		$sims = Simulador::all();
		$logsGene = LogAvanSimu::all();

    	return view('amdRepoSim', compact('sims', 'logsGene'));
    }

	/**
 * Procesa la generación del reporte de simuladores y tutorías en un archivo exportable.
 *
 * Filtra los registros por el rango de fechas recibido y prepara los encabezados y datos
 * para ambas hojas del reporte (simuladores y tutorías). Luego llama al método exportador.
 *
 * @param \Illuminate\Http\Request $request Petición HTTP con los parámetros: selSim, fechIni, fechFin.
 * @return \Illuminate\View\View
 */
    function repoOpc(Request $request){

    	$idSim = $request->input('selSim');
    	$nameArchi = 'RepoSim'.$idSim.date('Ymd').Auth::user()->id_entidad;
    	$fechIni = date($request->input('fechIni'));
    	$fechFin = date($request->input('fechFin'));

   		$filRepo = LogAvanSimu::whereBetween( 'fechaPresentacion', [$fechIni, $fechFin] )->get();

		//dd($filRepo);

		$cabsRepo = array('Nombre Usuario', 'Simulador', 'Efectividad Total', 'Preguntas Contestadas', 'Preguntas Correctas', 'Preguntas Prueba', 'Fecha de Presentación');

		$filRepoTuto = LogAvanTuto::whereBetween( 'updated_at', [$fechIni, $fechFin] )
		->get();

		$cabsRepoTuto = array('Nombre Usuario', 'Nombre Tutoria', 'Nombre Tema', 'Tiempo Total', 'Ultimo Acceso');

		$this->exportReporteGeneral( $cabsRepo, $filRepo, $nameArchi, $cabsRepoTuto, $filRepoTuto, '');

    	return view( 'amdRepoSimOpc', compact( 'filRepo', 'fechIni', 'fechFin', 'idSim', 'nameArchi' ));
    }

	/**
 * Muestra el detalle de un intento del simulador para un usuario específico.
 *
 * Recupera el log del avance del simulador correspondiente al ID recibido.
 *
 * @param \Illuminate\Http\Request $request Petición con parámetros: id_log, id_usr, id_sim.
 * @return \Illuminate\View\View
 */

    function detalle_sim(Request $request){
    	
    	$id_log = $request->input('id_log');
    	$id_user = $request->input('id_usr');
    	$id_simu = $request->input('id_sim');

    	$detLog = LogAvanSimu::where([ 'id' => $id_log ])->get();

    	return view('amdRepoSimDeta', compact('detLog'));
    }

	/**
 * Exporta los resultados de simuladores en formato CSV.
 *
 * El archivo se genera en la carpeta `reports/` con nombre `$nameArchi`.csv,
 * y contiene datos como efectividad, preguntas correctas y fecha de presentación.
 *
 * Solo los usuarios con perfil 1 (administrador) pueden ver todos los registros;
 * el resto solo verá datos pertenecientes a su entidad.
 *
 * @param array $cabsRepo Encabezados de la tabla.
 * @param \Illuminate\Support\Collection $filRepo Datos a exportar (LogAvanSimu).
 * @param string $nameArchi Nombre base del archivo (sin extensión).
 *
 * @return void
 */
    function exportSim( $cabsRepo, $filRepo, $nameArchi ){

	    $headers = array(
	        "Content-type" => "text/csv",
	        "Content-Disposition" => "attachment; filename=file.csv",
	        "Pragma" => "no-cache",
	        "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
	        "Expires" => "0"
	    );

	    $reviews = $filRepo;
	    $columns = $cabsRepo;

        $file = fopen('reports/'.$nameArchi.'.csv', 'w');
        fputcsv($file, $columns, ';',' ');


        foreach ( $filRepo as $filRep ) {
        	if(Auth::user()->id_perfil != 1){
        		if($filRep->usuarios->id_entidad == Auth::user()->id_entidad){
        			$preguntasSimulador = 0;

				    $simuladorCaracteristicas = TemasOfSimulador::where(['id_simulador' => $filRep->id_simulador])->get();

				    foreach ($simuladorCaracteristicas as $caracteristica) {
				    	$preguntasSimulador += $caracteristica->NoPreg;
				    }

					fputcsv($file, 
						array(
							$filRep->usuarios->name, 
							$filRep->simuladores->nombre, 
							round($filRep->efectividadTotal, 2).' %',
							$filRep->preguntasContestadas,
							$filRep->PreguntasCorrectas,
							$preguntasSimulador,
							$filRep->fechaPresentacion), ';',' ');   
        		}
        	}else{

	        	$preguntasSimulador = 0;

			    $simuladorCaracteristicas = TemasOfSimulador::where(['id_simulador' => $filRep->id_simulador])->get();

			    foreach ($simuladorCaracteristicas as $caracteristica) {
			    	$preguntasSimulador += $caracteristica->NoPreg;
			    }

				fputcsv($file, 
					array(
						$filRep->usuarios->name, 
						$filRep->simuladores->nombre, 
						round($filRep->efectividadTotal, 2).' %',
						$filRep->preguntasContestadas,
						$filRep->PreguntasCorrectas,
						$preguntasSimulador,
						$filRep->fechaPresentacion), ';',' ');       
			} 	
        }

        fclose($file);
	}

/* - Administracion de Tutorias */

/**
 * Muestra la vista de administración de reportes de tutorías con los tutoriales y logs disponibles.
 *
 * @return \Illuminate\View\View
 */
    function view_tuto(){

    	$tuts = Tutorial::all();
		$logsGene = LogAvanTuto::all();

    	return view('amdRepoTut', compact('tuts', 'logsGene'));
    }


	/**
 * Procesa la solicitud del reporte de tutorías dentro de un rango de fechas, y genera el archivo exportado.
 *
 * @param \Illuminate\Http\Request $request
 * @return \Illuminate\View\View
 */
    function repoOpcTut(Request $request){

    	$idTut = $request->input('selTut');
    	$nameArchi = 'RepoTut'.$idTut.date('Ymd').Auth::user()->id_entidad;
    	$fechIni = date($request->input('fechIni'));
    	$fechFin = date($request->input('fechFin'));

    	

   		$filRepo = LogAvanTuto::whereBetween( 'updated_at', [$fechIni, $fechFin] )
					->get();

		$cabsRepo = array('Nombre Usuario', 'Nombre Tutoria', 'Nombre Tema', 'Tiempo Total', 'Ultimo Acceso');

		$this->exportTut( $cabsRepo, $filRepo, $nameArchi );

    	return view('amdRepoTutOpc', compact('filRepo', 'fechIni', 'fechFin', 'idTut', 'nameArchi'));
    }

	/**
 * Muestra el detalle del avance en una tutoría específica, incluyendo los temas vistos por el usuario.
 *
 * @param \Illuminate\Http\Request $request
 * @return \Illuminate\View\View
 */
    function detalle_tut(Request $request){
    	
    	$tems_tut = array();
    	$cont = 0;

    	$id_log = $request->input('id_log');
    	$id_user = $request->input('id_usr');
    	$id_tuto = $request->input('id_tut');

    	$detLog = LogAvanTuto::where([ 'id' => $id_log ])->first();

    	$ids_tems = explode(':::', $detLog->temasVistos);

    	foreach ($ids_tems as $id_tem) {
    		$tut = ContenidoTuto::where(['id'=>$id_tem])->first();
    		$tems_tut[$cont] = $tut;
    		++$cont;
    	}

    	return view('amdRepoTutDeta', compact('detLog', 'tems_tut'));
    }

	/**
 * Exporta los datos del reporte de tutorías a un archivo CSV, incluyendo detalles por tema.
 *
 * @param array $cabsRepo Encabezados del reporte.
 * @param \Illuminate\Support\Collection $filRepo Colección de registros de avance en tutorías.
 * @param string $nameArchi Nombre del archivo a generar (sin extensión).
 * @return void
 */
    function exportTut( $cabsRepo, $filRepo, $nameArchi ){

	    $headers = array(
	        "Content-type" => "text/csv",
	        "Content-Disposition" => "attachment; filename=file.csv",
	        "Pragma" => "no-cache",
	        "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
	        "Expires" => "0"
	    );

	    $reviews = $filRepo;
	    $columns = $cabsRepo;	    

        $file = fopen('reports/'.$nameArchi.'.csv', 'w');
        fputcsv($file, $columns, ';',' ');



        foreach ( $filRepo as $filRep ) {
        	if(Auth::user()->id_perfil != 1){

				//35,47,60
        		if($filRep->usuarios->id_entidad == Auth::user()->id_entidad){
	        		$temasVistos = explode(":::", $filRep->temasVistos);

		        	if($filRep->tiempoEstudio != '00:00:00'){
		        		fputcsv($file, array($filRep->usuarios->name, $filRep->tutoriales->nombre, 'General', $filRep->tiempoEstudio, $filRep->created_at), ';',' ');

		               	foreach($temasVistos as $temaVisto){
			        		$tut = ContenidoTuto::where(['id'=>$temaVisto])->first();
			        		fputcsv($file, array($filRep->usuarios->name, $filRep->tutoriales->nombre, $tut->nombre, $tut->duracion, $filRep->created_at), ';',' ');
			        	}
		        	}
	        	}
        	}else{
        		$temasVistos = explode(":::", $filRep->temasVistos);

	        	if($filRep->tiempoEstudio != '00:00:00'){
	        		fputcsv($file, array($filRep->usuarios->name, $filRep->tutoriales->nombre, 'General', $filRep->tiempoEstudio, $filRep->created_at), ';',' ');

	               	foreach($temasVistos as $temaVisto){
		        		$tut = ContenidoTuto::where(['id'=>$temaVisto])->first();
		        		fputcsv($file, array($filRep->usuarios->name, $filRep->tutoriales->nombre, $tut->nombre, $tut->duracion, $filRep->created_at), ';',' ');
		        	}
	        	}
        	}
        	
        	


        }

        fclose($file);
	}

/* - Reporte General */




/*

<?php
/** Incluir la ruta 
set_include_path(get_include_path() . PATH_SEPARATOR . './Classes/');
/** Clases necesarias /
require_once('PHPExcel.php');
require_once('PHPExcel/Reader/Excel2007.php');
// Variables de la página
$_VIEWDATA = array(
'v_precioTotal' => 0,
'v_descuento' => 0,
'v_precioFinal' => 0
);
// Petición de cálculo?
if (isset($_REQUEST['boton_calcular'])) {
// Cargando la hoja de cálculo
$objReader = new PHPExcel_Reader_Excel2007();
$objPHPExcel = $objReader->load("calculo.xlsx");
// Asignar hoja de calculo activa
$objPHPExcel->setActiveSheetIndex(0);
// Asignar data
$objPHPExcel->getActiveSheet()->setCellValue('automatico', $_REQUEST['transmision_Automatica']);
$objPHPExcel->getActiveSheet()->setCellValue('cuero', $_REQUEST['asientos_Cuero']);
$objPHPExcel->getActiveSheet()->setCellValue('suspension', $_REQUEST['suspension']);
// Calculos
$_VIEWDATA['v_precioTotal'] = $objPHPExcel->getActiveSheet()->getCell('total')->getCalculatedValue();
$_VIEWDATA['v_descuento'] = $objPHPExcel->getActiveSheet()->getCell('descuento')->getCalculatedValue();
$_VIEWDATA['v_precioFinal'] = $objPHPExcel->getActiveSheet()->getCell('final')->getCalculatedValue();
}
?>


*/

/**
 * Exporta dos reportes generales en formato CSV: uno para simuladores y otro para tutorías.
 *
 * @param array $cabecerasReporteSimulador Encabezados del reporte de simuladores.
 * @param array $filasReporteSimulador Datos del reporte de simuladores.
 * @param string $nombreArchivoSimulador Nombre del archivo CSV para simuladores (sin extensión).
 * @param array $cabecerasReporteTutorias Encabezados del reporte de tutorías (no utilizado aquí).
 * @param array $filasReporteTutorias Datos del reporte de tutorías (no utilizado aquí).
 * @param string $nombreArchivoTutorias Nombre del archivo CSV para tutorías (no utilizado aquí).
 *
 * @return void
 */
	function exportReporteGeneral(
		$cabecerasReporteSimulador, 
		$filasReporteSimulador, 
		$nombreArchivoSimulador,
		$cabecerasReporteTutorias,
		$filasReporteTutorias,
		$nombreArchivoTutorias
	){
		/**Cabecera documento */
		$headers = array(
	        "Content-type" => "text/csv",
	        "Content-Disposition" => "attachment; filename=file.csv",
	        "Pragma" => "no-cache",
	        "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
	        "Expires" => "0"
	    );

	    $reviews = $cabecerasReporteSimulador;
	    $columns = $cabecerasReporteSimulador;

		/**Se abre el documento para se editado */
        $file = fopen('reports/'.$nombreArchivoSimulador.'.csv', 'w');
        fputcsv($file, $columns, ';',' ');

		/*/////SIMULADORES//////
		$objReader = new PHPExcel_Reader_Excel2007();
		$objPHPExcel = $objReader->load("reports/reporte.xlsx");
		// Asignar hoja de calculo activa
		$objPHPExcel->setActiveSheetIndex(0);
		// Asignar data
		$objPHPExcel->getActiveSheet()->setCellValue('automatico', $filasReporteSimulador);
		*/
		foreach ( $filasReporteSimulador as $filaReporteSimulador ) {
			
			$preguntasSimulador = 0;

        	if(Auth::user()->id_perfil != 1){
				
        		if($filaReporteSimulador->usuarios->id_entidad == Auth::user()->id_entidad){
        			//dd(Auth::user()->id_perfil != 1);
				    $simuladorCaracteristicas = 
						TemasOfSimulador::where([
							'id_simulador' => $filaReporteSimulador->id_simulador
						])->get();
					
				    foreach ($simuladorCaracteristicas as $caracteristica) {
				    	$preguntasSimulador += $caracteristica->NoPreg;
						$nombreTema = ContenidoSimu::where([
							'id' => $caracteristica->id_tema
						])->first()->nombre;
						
				    }

					//dd($preguntasSimulador);
					fputcsv(
						$file, 
						array(
							$filaReporteSimulador->usuarios->name, 
							$filaReporteSimulador->simuladores->nombre, 
							round($filaReporteSimulador->efectividadTotal, 2).' %',
							$filaReporteSimulador->preguntasContestadas,
							$filaReporteSimulador->PreguntasCorrectas,
							$preguntasSimulador,
							$filaReporteSimulador->fechaPresentacion
						), ';',' '
					);
        		}

        	}else{

			    $simuladorCaracteristicas = TemasOfSimulador::where(['id_simulador' => $filaReporteSimulador->id_simulador])->get();

			    foreach ($simuladorCaracteristicas as $caracteristica) {
			    	$preguntasSimulador += $caracteristica->NoPreg;
			    }       

				fputcsv(
					$file, 
					array(
						$filaReporteSimulador->usuarios->name, 
						$filaReporteSimulador->simuladores->nombre, 
						round($filaReporteSimulador->efectividadTotal, 2).' %',
						$filaReporteSimulador->preguntasContestadas,
						$filaReporteSimulador->PreguntasCorrectas,
						$preguntasSimulador,
						$filaReporteSimulador->fechaPresentacion
					), ';',' '
				);
			} 	

        }
		
		fclose($file);
	}


/* - Administracion de Ventas */
	
/**
 * Muestra la vista de administración de ventas.
 * Si el usuario es administrador (perfil 1), carga los usuarios con perfil de productor (perfil 4).
 *
 * @return \Illuminate\View\View Vista con la lista de productores.
 */
	function view_vent(){

		if(Auth::user()->id_perfil == 1){

			$producActiv = User::where(['id_perfil' => 4])
							->get()
							->sortBy('created_at');
		}

    	return view('amdRepoVent', compact('producActiv'));
	} 

} 
