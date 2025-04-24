<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

	$products = DB::table('mb04_productos')->orderBy('nombre', 'asc')->get();
    return view('welcome', compact('products'));
});

Route::post('/nuevo-pass', function(Request $request){

    $msj_html='';        
    $user = DB::table('mb04_users')->where([ "email" => $request->input('email') ])->first();

    if(empty($user)){
        $msj_html = '<p>No se registra una cuenta asociada a este correo, verifique e intente nuevamente.</p>';
    }else{
    	if(empty( $user->password )){

    		if($user->id_perfil == 3){
    			$products = DB::table('mb04_productos')->get();

    			foreach($products as $product ){
    				DB::table('mb04_products_of_users')->insert(
						['id_users' => $user->id, 'id_producto' => $product->id]
					);
    			}
    		}
	
			$user = DB::table('mb04_users')
						->where([ "email" => $request->input('email') ])
						->update([ "password" => bcrypt($request->input('pass')) ]);

	        $msj_html = '<p>La contraseña se actualizo correctamente.</p>';
    	}else{
    		$msj_html = '<p>Usted ya restauro la contraseña, de no recordarla comuniquese con el administrador de su compañia.</p>';
    	}
    }

    return $msj_html;
});


Route::get('/wordpress', function(){
    //require('..\prototipo\wp-load.php');
    //Auth::loginUsingId(_USER_ID_);
    
    $user = DB::table('mb04_users')
                    ->where(['email'=>$_GET['username']])
                    ->first();

    if(empty($user)){
       
       $user =  DB::table('mb04_users')->insert([
            'id_entidad' => 4, 
            'id_perfil' => 5,
            'name' => $_GET['name'],
            'email' => $_GET['username'],
            'password' => 'wp',
            'created_at' => date('Y-m-d 00:00:00'),
            'updated_at' => date('Y-m-d 00:00:00')
        ]);
       
        Auth::loginUsingId($user->id);
        
    }else{
        Auth::loginUsingId($user->id);
    }

    $ordenWoo = json_decode($_GET['orden']);
    $prductsWoo = json_decode($_GET['productos']);

    for($i=0; $i<count( $ordenWoo ); ++$i){

        $ordenLarav = DB::table('mb04_products_of_users')
                    ->where([ 'woo_id_orden'=>$ordenWoo[$i] ])
                    ->first();



        if(empty($ordenLarav)){

            for($j = 0; $j<count($prductsWoo); ++$j){

                
                $productLarav = DB::table('mb04_productos')
                    ->where([ 'woo_id_prod'=>$prductsWoo[$j]->product_id ])
                    ->get();


                /*if($prductsWoo[$j]->product_id == 892){
                    dd(isset($productLarav[0]));
                    if( !isset($productLarav[0]) ){
                        dd($productLarav);
                        echo '<br>';
                        echo '<br>';
                    }else{
                        dd($prductsWoo[$j]->product_id);
                    }
                }else{
                    dd(isset($productLarav[0]));
                }*/

                if( !isset($productLarav[0]) ){

                    $productLarav = DB::table('mb04_productos')
                        ->where([ 'woo_id_conb'=>$prductsWoo[$j]->product_id ])
                        ->get();


                }
                


                if( !empty($productLarav) ){
                    
                    foreach($productLarav as $newordenLarav){

                        $ordennew = DB::table('mb04_products_of_users')->insert([ 
                            'id_users'=>$user->id,
                            'id_producto'=>$newordenLarav->id,
                            'fecha_activ'=>$prductsWoo[$j]->date_created,
                            'dias_licen'=> 90,
                            'woo_id_orden'=>$ordenWoo[$i]
                        ]);
                    }
                
                }else{
                    print_r('producto no creado en laravel');
                }
            }
        }
    }

});

Route::get('/woo', 'HomeController@woo');

Route::get('/politica-de-uso', 'HomeController@polUso');
Route::get('/politica-de-privacidad', 'HomeController@polPriva');

Auth::routes();

Route::get('/master', 'HomeController@index')->name('master');

Route::get('/tutorial', 'TutoriaController@index');

Route::post('/tutorial', 'TutoriaController@contenido');
Route::post('/tutorial/video', 'TutoriaController@cambio_video');
Route::post('/tutorial/poster', 'TutoriaController@cambio_poster');
Route::post('/tutorial/timer', 'TutoriaController@saveTimeTuto');

Route::get('/simulador', 'SimuladorController@index');

Route::post('/simulador', 'SimuladorController@contenido');
Route::post('/simulador/estadisticas', 'SimuladorController@estadisticas');

Route::post('/guia', 'GuiaController@index'); 

Route::post('/reportes/simper', 'ReportesController@simPersonal');
Route::post('/reportes/tutper', 'ReportesController@tutPersonal');

/* Rutas de administracion Maestro */
Route::get('/admin', 'AdminController@index');

/* - Rutas Administracion Usuarios*/
Route::post('/admin/users', 'AdminController@view_user');
Route::post('/admin/users/new', 'AdminController@new_user');
Route::post('/admin/users/new/save', 'AdminController@save_new_user');
Route::post('/admin/users/editar', 'AdminController@edit_user');
Route::post('/admin/users/editar/save', 'AdminController@edit_user_save');
Route::post('/admin/users/eliminar', 'AdminController@delete_user');
Route::post('/admin/users/reset', 'AdminController@reset_pass');
/**/
/* - Rutas Administracion Entidades*/
Route::post('/admin/entidad', 'AdminController@view_entidad');
Route::post('/admin/entidad/new', 'AdminController@new_entidad');
Route::post('/admin/entidad/new/save', 'AdminController@new_entidad_save');
Route::post('/admin/entidad/editar', 'AdminController@edit_entidad');
Route::post('/admin/entidad/editar/save', 'AdminController@edit_entidad_save');
Route::post('/admin/entidad/eliminar', 'AdminController@delete_ent');
/**/
/* - Rutas de Activación de productos */
Route::post('/admin/activepr', 'AdminController@activa_produc');
Route::post('/admin/activepr/save', 'AdminController@activa_produc_save');
/**/
/* - Rutas para realizar reportes */
Route::post('/admin/reportes/simulador', 'AdminController@view_simu');
Route::post('/admin/reportes/simulador/detalle', 'AdminController@detalle_sim');
Route::post('/admin/reportes/simulador/repoOpc', 'AdminController@repoOpc');

Route::post('/admin/reportes/tutorias', 'AdminController@view_tuto');
Route::post('/admin/reportes/tutorias/detalle', 'AdminController@detalle_tut');
Route::post('/admin/reportes/tutorias/repoOpc', 'AdminController@repoOpcTut');

Route::post('/admin/reportes/ventas', 'AdminController@view_vent');
/**/
/* - Rutas para el carro de compras */
Route::post('/shop', 'ShopController@index');
Route::post('/shop/car', 'ShopController@car');
Route::post('/shop/sale', 'ShopController@sale');

Route::get('/shop/pay-response', 'ShopController@payResponse');
//Route::post('/shop/pay-confirmation', 'ShopController@payConfirmation');
/**/


Route::get('/clear', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache Limpiada</h1>';
});