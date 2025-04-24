<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Html\HtmlServiceProvider;
use Illuminate\Html\FormFacade;
use Illuminate\Html\HtmlFacade;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\modelos\User;
use App\modelos\Simulador;
use App\modelos\ContenidoSimu;
use App\modelos\Preguntas;
use App\modelos\TemasOfSimulador;

use App\modelos\LogAvanSimu;

class SimuladorController extends Controller{

	function index(){
		return view('simulador', [
			'products' => "sumulador"
	    ]);
	}

	function contenido(Request $request){

		$contenido = $request->input("id_simu");
        $program = explode(";;",  $contenido);

        $id_sim = $program[1];

        $simuladores = Simulador::where([ 'id' => $id_sim ])->get();

        $cont = 0;

        foreach ( $simuladores as $simulador ) {
            foreach ($simulador->temsSimu  as $tem) {

            	$TxMs = TemasOfSimulador::where( [ 'id_simulador' => $simulador->id, 'id_tema' => $tem->id ] )->get( );
            	
            	foreach( $TxMs as $TxM){
            		
            		$numPreg = $TxM->NoPreg;
            	}

            	$preguntas = Preguntas::where(['id_tema' => $tem->id])
            					->inRandomOrder()
            					->paginate($numPreg);

            	$preguntas_total[$cont] = compact('preguntas');

            	++ $cont;
            }
        }        

        //dd($preguntas_total);
        
        return view('simulador', compact('simuladores', 'preguntas_total', 'id_sim') );
	}

    function estadisticas( Request $request ) {

        //dd($request);

		$id_user = Auth::id();

    	$id_sim = $request->input('id_sim');

        $ids_preg = json_decode( $request->input('ids_preg') ); 
        $resp_user = json_decode( $request->input('resp_user') );

        $preg_contest = $request->input('preg_contest'); 
        $preg_not_contest = $request->input('preg_not_contest'); 

        $resp_corr = 0;
        $resp_incorr = 0;

        $resp_corr_tem = 0;
        $resp_incorr_tem = 0;

        $pos_tem = 0;
        $idTem = '';

        $corTem = array();
        $incorTem = array();

        $efec_tem = array();
        $efect_tot = 0; 

        $prg_result = array();
        $expli_result = array();
        $corr_incorr = array(); 

        $nametems = array();
        $cont_name = 0;

        $nametems_bas = array();
        $contnb = 0;

        $nametems_esp = array();
        $contne = 0;
        
        for($i=0; $i<count($ids_preg); ++$i){
            
            $preguntas = Preguntas::where([ 'id' => $ids_preg[$i] ])->get();
            
            foreach ( $preguntas as $pregunta ) {
                
                if( $resp_corr == 0 && $resp_incorr == 0 ) $idTem = $pregunta->id_tema;
                
                if( $idTem != $pregunta->id_tema ){
                    
                    $corTem[$pos_tem] = $resp_corr_tem;
                    $incorTem[$pos_tem] = $resp_incorr_tem;

                    $resp_corr_tem = 0;
                    $resp_incorr_tem = 0;

                    $idTem = $pregunta->id_tema;

                    ++ $pos_tem;
                }

                if( $pregunta->correcta == $resp_user[$i] ) {
                    ++ $resp_corr;
                    ++ $resp_corr_tem;
                    $corr_incorr[$i]='Correcta'; 
                }else {
                    ++ $resp_incorr;
                    ++ $resp_incorr_tem;
                    $corr_incorr[$i]='Incorrecta';
                }

                $prg_result[$i]=$pregunta->pregunta;
                $expli_result[$i]=$pregunta->explicacion;

                if($pregunta->tema->BasiEspe == 1){

                    if(!isset($nametems_bas[$contnb])){
                        ++$contnb;
                        $nametems_bas[$contnb]=$pregunta->tema->nombre;    
                    }else{
                        if($nametems_bas[$contnb] != $pregunta->tema->nombre){
                            ++$contnb;
                            $nametems_bas[$contnb]=$pregunta->tema->nombre;
                        }
                    }

                }else if($pregunta->tema->BasiEspe == 2){

                    if(!isset($nametems_esp[$contne])){
                        ++$contne;
                        $nametems_esp[$contne]=$pregunta->tema->nombre;    
                    }else{
                        if($nametems_esp[$contne] != $pregunta->tema->nombre){
                            ++$contne;
                            $nametems_esp[$contne]=$pregunta->tema->nombre;
                        }
                    }

                }else if($pregunta->tema->BasiEspe == 0){
                    if(!isset($nametems[$cont_name])){
                        ++$cont_name;
                        $nametems[$cont_name]=$pregunta->tema->nombre;    
                    }else{
                        if($nametems[$cont_name] != $pregunta->tema->nombre){
                            ++$cont_name;
                            $nametems[$cont_name]=$pregunta->tema->nombre;
                        }
                    }
                }
            }

            $idTem = $pregunta->id_tema;
        }

        $corTem[$pos_tem] = $resp_corr_tem;
        $incorTem[$pos_tem] = $resp_incorr_tem;

        $idTem = $pregunta->id_tema;

        for($k = 0; $k<count($corTem); ++$k){
            $preg_tot_tem = $corTem[$k] + $incorTem[$k];
            $efec_tem[$k] = $corTem[$k] / $preg_tot_tem*100;
        }
        $preg_tot = $resp_corr+$resp_incorr;
        $efec_tot = $resp_corr/$preg_tot*100;

        DB::table('mb04_log_uso_simulador')->insert([
        	"id_simulador" => $id_sim, 
        	"id_user" => $id_user, 
        	"efectividadTotal" => $efec_tot, 
        	"efectividadTema" => implode(";;", $efec_tem), 
        	"preguntasContestadas" => $preg_contest, 
        	"PreguntasCorrectas" => $resp_corr, 
        	"tiempo" => "1", 
        	"fechaPresentacion" => date('Y-m-d'), 
        	"estado" => "1", 
        	"created_at" => date("Y-m-d H:i:s"),
	        "updated_at" => date("Y-m-d H:i:s")
        ]);

        return view('resultados_simulador', compact('efec_tem', 'corTem', 'efec_tot', 'resp_corr', 'resp_incorr', 'preg_contest', 'preg_not_contest', 'ids_preg', 'corr_incorr', 'prg_result', 'expli_result', 'nametems', 'nametems_bas', 'nametems_esp') );

    }
}
