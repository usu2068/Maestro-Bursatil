<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//modelos utilizados para los reportes
use App\modelos\Simulador;
use App\modelos\TemasOfSimulador;
use App\modelos\LogAvanSimu;

use App\modelos\Tutorial;
use App\modelos\ContenidoTuto;
use App\modelos\TemasOfTutoria;
use App\modelos\LogAvanTuto;

/**
 * Controlador para generar reportes personalizados de simuladores y tutorias por usuario.
 */
class ReportesController extends Controller{


    /**
     * Muestra el reporte de simuladores completados por el usuario autenticado
     * 
     * - Obtiene los registros de avance del simulador ('logavansimu') para el usuario actual
     * - Por cada simulador accedido, recupera su nombre y los temas relacionados.
     * - Prepara los datos y los envia a la vista 'reportesimper'
     */
    public function simPersonal(){

    	$id_user = Auth::id();
        $ult_resultados = LogAvanSimu::where([ 'id_user' => $id_user ])->get();

        $simuladores = array();
        $cont = 0;

        $temas = array();
        $contTems = 0;

        foreach ( $ult_resultados as $resultado ) {
            $sim_pres = Simulador::where([ 'id' => $resultado->id_simulador ])->get();
            foreach( $sim_pres as $sim_pre ){
	            $simuladores[$cont] = $sim_pre->nombre;

	            foreach ($sim_pre->temsSimu as $tems) {
	            	$temas[$cont][$contTems] = $tems->nombre;
	            	++ $contTems; 
	            }

	            ++ $cont;
	            $contTems = 0;
        	}

        }

        return view('reporteSimPer', compact('ult_resultados', 'simuladores', 'temas'));
    }

    /**
     * Muestra el reporte de avance en tutorías del usuario autenticado.
     *
     * - Obtiene los registros de avance en tutorías (`LogAvanTuto`) del usuario.
     * - Calcula el porcentaje de avance con base en los temas vistos vs. temas totales.
     * - Obtiene el contenido de todas las tutorías.
     * - Retorna la vista `reporteTutPer` con los datos recolectados.
     */
    public function tutPersonal(){

        $id_user = Auth::id();
        $ult_resultados = LogAvanTuto::where([ 'id_user' => $id_user ])->get();
        
        foreach($ult_resultados as $ult_resultado){
            $prodUser = explode('::', $ult_resultado->temasVistos);
            $numVist = count($prodUser);
            $numTem = TemasOfTutoria::where(['id_tutoria'=>$ult_resultado->id_tutoria])->count();

            $porc = ($numVist/$numTem)*100;
        }
                        
        $tems = ContenidoTuto::all();

        return view('reporteTutPer', compact('ult_resultados','tems', 'porc'));
    }
}
