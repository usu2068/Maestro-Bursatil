 <?php
	//header('Access-Control-Allow-Origin: *');

	require_once('conected.php');
	$link = conectarse();

	$llave="12904af407b";
	$usuario_id=$_REQUEST['merchant_id'];
	$ref_venta=$_REQUEST['reference_sale'];
	$valor=$_REQUEST['value'];
	$moneda=$_REQUEST['currency'];
	$estado=0;
	$estado_pol=$_REQUEST['state_pol'];
	$firma_cadena=$llave."~".$usuario_id."~".$ref_venta."~".$valor."~".$moneda."~".$estado_pol;

	if($estado_pol == 4){
		$query = "UPDATE `seicmvco_DB_maestro_4.0`.`mb04_factura` SET `estado_fac` = 'APROBADA' WHERE `mb04_factura`.`ref_pay` = '".$ref_venta."'";
		mysqli_query($link, $query);

		$query_sele = "SELECT * FROM `mb04_factura` WHERE `ref_pay` = '".$ref_venta."'";
		$result_fact = mysqli_query($link, $query_sele);
		$row_fact = mysqli_fetch_array($result_fact);

		$contProduc = explode('::', $row_fact['products']);
		$idUser = $row_fact['id_user'];

		for ($i=0; $i<count($contProduc); ++$i) {
			$query_active = "INSERT INTO `mb04_products_of_users`(`id_users`, `id_producto`) VALUES (".$idUser.", ".$contProduc[$i].")";
			mysqli_query($link, $query_active);
		}

	}else if($estado_pol == 6){
		$query = "UPDATE `seicmvco_DB_maestro_4.0`.`mb04_factura` SET `estado_fac` = 'RECHAZADA' WHERE `mb04_factura`.`ref_pay` = '".$ref_venta."'";
		mysqli_query($link, $query);

	}else{
		$query = "UPDATE `seicmvco_DB_maestro_4.0`.`mb04_factura` SET `estado_fac` = 'PROCESANDO' WHERE `mb04_factura`.`ref_pay` = '".$ref_venta."'";
		mysqli_query($link, $query);
	}
 ?>