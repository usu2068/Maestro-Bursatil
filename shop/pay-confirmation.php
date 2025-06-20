<?php
//header('Access-Control-Allow-Origin: *');

require_once('conected.php');  // Carga el archivo donde está la función de conexión (el que me mostraste antes)
$link = conectarse();          // Llama a la función y obtiene la conexión a la base de datos

// Variables que recibe por la URL o por POST
$llave = "12904af407b";                     // Una clave fija (probablemente para validación o autenticación)
$usuario_id = $_REQUEST['merchant_id'];     // ID del comerciante
$ref_venta = $_REQUEST['reference_sale'];   // Referencia de la venta
$valor = $_REQUEST['value'];                // Valor de la venta
$moneda = $_REQUEST['currency'];            // Moneda de la venta
$estado = 0;                                // Inicialización del estado (aunque aquí no se usa directamente)
$estado_pol = $_REQUEST['state_pol'];       // Estado de la transacción (viene de la plataforma de pago)

// Cadena de firma (probablemente para verificación, aunque en este código no se utiliza más)
$firma_cadena = $llave . "~" . $usuario_id . "~" . $ref_venta . "~" . $valor . "~" . $moneda . "~" . $estado_pol;

// Lógica según el estado de la transacción:
if ($estado_pol == 4) { // Aprobada

    // Actualiza el estado de la factura a "APROBADA"
    $query = "UPDATE `seicmvco_DB_maestro_4.0`.`mb04_factura` 
              SET `estado_fac` = 'APROBADA' 
              WHERE `mb04_factura`.`ref_pay` = '".$ref_venta."'";
    mysqli_query($link, $query);

    // Obtiene los detalles de la factura asociada
    $query_sele = "SELECT * FROM `mb04_factura` WHERE `ref_pay` = '".$ref_venta."'";
    $result_fact = mysqli_query($link, $query_sele);
    $row_fact = mysqli_fetch_array($result_fact);

    // La columna 'products' tiene un listado de productos separados por "::"
    $contProduc = explode('::', $row_fact['products']);
    $idUser = $row_fact['id_user']; // ID del usuario que compró

    // Por cada producto en la factura, inserta una relación entre el usuario y el producto en la tabla de productos adquiridos
    for ($i = 0; $i < count($contProduc); ++$i) {
        $query_active = "INSERT INTO `mb04_products_of_users`(`id_users`, `id_producto`) 
                         VALUES (".$idUser.", ".$contProduc[$i].")";
        mysqli_query($link, $query_active);
    }

} else if ($estado_pol == 6) { // Rechazada

    // Actualiza el estado de la factura a "RECHAZADA"
    $query = "UPDATE `seicmvco_DB_maestro_4.0`.`mb04_factura` 
              SET `estado_fac` = 'RECHAZADA' 
              WHERE `mb04_factura`.`ref_pay` = '".$ref_venta."'";
    mysqli_query($link, $query);

} else { // Otros estados, por ejemplo en proceso

    // Actualiza el estado de la factura a "PROCESANDO"
    $query = "UPDATE `seicmvco_DB_maestro_4.0`.`mb04_factura` 
              SET `estado_fac` = 'PROCESANDO' 
              WHERE `mb04_factura`.`ref_pay` = '".$ref_venta."'";
    mysqli_query($link, $query);
}
?>
