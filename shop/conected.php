 <?php
//header('Access-Control-Allow-Origin: *');
	function conectarse(){

		$link=mysqli_connect("localhost","seicmvco_master4","4DM1NU574R1Z");
		  
		if(mysqli_connect_errno()){
			print_r("Error conectando con la base de datos: %s\n", mysqli_connect_error());
		    exit();
		}
		if (!mysqli_select_db($link, "seicmvco_DB_maestro_4.0")){
			echo "Error seleccionando la base de datos.";
			exit();
		}  
		return $link;
	}
	
 ?>