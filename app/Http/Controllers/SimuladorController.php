<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Html\HtmlServiceProvider; //proveedor de servicios HTML (requiere laravelcollective/html)
use Illuminate\Html\FormFacade;// Facade para generacion de formularios (facade es una clase que proporciona una interfaz estatica a clases subyacentes en el contenedor de servicios., sirven como un proxy estatico para acceder a componentes o servicios del framework de una manera sencilla, sin tener que unstanciarlos manualmente.)
use Illuminate\Html\HtmlFacade;// Facade para helpers HTML

use Illuminate\Support\Facades\DB; //facade para consultas directas a DB
use Illuminate\Support\Facades\Auth; //facade para autenticacion de usuarios

// modelos usados por este controlador
use App\modelos\User;
use App\modelos\Simulador;
use App\modelos\ContenidoSimu;
use App\modelos\Preguntas;
use App\modelos\TemasOfSimulador;

use App\modelos\LogAvanSimu;

/**
 * controlador para gestionar el simulador de exámenes.
 * -Muestra la interfaz de simulador
 * - Carga preguntas aleatorias por tema
 * - Procesa estadisticas de respuestas y guarda logs de efectividad
 */
class SimuladorController extends Controller{

    /**
     * Muestra la vista principal del simulador
     */
	function index(){
        //retorna la vista 'simulador' con un placeholder
		return view('simulador', [
			'products' => "sumulador"
	    ]);
	}

    /**
     * Carga el contenido (preguntas) de un simulador especifico.
     */
	function contenido(Request $request){

		$contenido = $request->input("id_simu");

        //separa tipo ID del simulador 
        $program = explode(";;",  $contenido);

        $id_sim = $program[1];

        //obtiene el modelo del simulador
        $simuladores = Simulador::where([ 'id' => $id_sim ])->get();

        $cont = 0;

        //por cada tema del simulador, obtiene preguntas aleatorias
        foreach ( $simuladores as $simulador ) {
            foreach ($simulador->temsSimu  as $tem) {

                //obtiene numero de preguntas a mostrar para este tema
            	$TxMs = TemasOfSimulador::where( [ 'id_simulador' => $simulador->id, 'id_tema' => $tem->id ] )->get( );
            	
            	foreach( $TxMs as $TxM){
            		
            		$numPreg = $TxM->NoPreg;
            	}

                //obtiene preguntas aleatorias paginadas
            	$preguntas = Preguntas::where(['id_tema' => $tem->id])
            					->inRandomOrder()
            					->paginate($numPreg);

                                //almacena en arreglo por indice
            	$preguntas_total[$cont] = compact('preguntas');

            	++ $cont;
            }
        }        

        //dd($preguntas_total);
        
        //retorna la vista con simulador, preguntas y ID
        return view('simulador', compact('simuladores', 'preguntas_total', 'id_sim') );
	}

    /**
     * Procesa las respuestas del usuario y genera estadisticas.
     * Guarda un log de efectividad por tema y total en BD.
     * 
     */
    function estadisticas( Request $request ) {

        //dd($request);

		$id_user = Auth::id();

    	$id_sim = $request->input('id_sim');

        //decodifica arrays enviados por AJAX
        $ids_preg = json_decode( $request->input('ids_preg') ); 
        $resp_user = json_decode( $request->input('resp_user') );
        $preg_contest = $request->input('preg_contest'); 
        $preg_not_contest = $request->input('preg_not_contest'); 

        //inicializa contadores y arrays para estadisticas
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
        
        //recorre cada pregunta respondida
        for($i=0; $i<count($ids_preg); ++$i){
            
            $preguntas = Preguntas::where([ 'id' => $ids_preg[$i] ])->get();
            
            foreach ( $preguntas as $pregunta ) {
                //detecta cambio de tema para almacenar subtotales
                if( $resp_corr == 0 && $resp_incorr == 0 ) $idTem = $pregunta->id_tema;
                
                if( $idTem != $pregunta->id_tema ){
                    
                    $corTem[$pos_tem] = $resp_corr_tem;
                    $incorTem[$pos_tem] = $resp_incorr_tem;

                    $resp_corr_tem = 0;
                    $resp_incorr_tem = 0;

                    $idTem = $pregunta->id_tema;

                    ++ $pos_tem;
                }

                //verifica respuesta correcta segun el usuario
                if( $pregunta->correcta == $resp_user[$i] ) {
                    ++ $resp_corr;
                    ++ $resp_corr_tem;
                    $corr_incorr[$i]='Correcta'; 
                }else {
                    ++ $resp_incorr;
                    ++ $resp_incorr_tem;
                    $corr_incorr[$i]='Incorrecta';
                }

                //Guarda la pregunta y explicacion para mostrar
                $prg_result[$i]=$pregunta->pregunta;
                $expli_result[$i]=$pregunta->explicacion;

                //clasifica nombres de temas segun basiespe
                //basiespe es un atributo o propiedad, se utiliza para categorizar los temas en tres tipos:
                //0: temas generales o basicos
                //1: temas basicos
                //2: temas especializados o especificos
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

        //agrega ultimo subtotal por tema
        $corTem[$pos_tem] = $resp_corr_tem;
        $incorTem[$pos_tem] = $resp_incorr_tem;

        $idTem = $pregunta->id_tema;

        //calcula efectividad por tema y total
        for($k = 0; $k<count($corTem); ++$k){
            $preg_tot_tem = $corTem[$k] + $incorTem[$k];
            $efec_tem[$k] = $corTem[$k] / $preg_tot_tem*100;
        }
        $preg_tot = $resp_corr+$resp_incorr;
        $efec_tot = $resp_corr/$preg_tot*100;

        //guarda log de uso del simulador en la base de datos
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

        //retorna vista de resultados con todas las estadisticas
        return view('resultados_simulador', compact('efec_tem', 'corTem', 'efec_tot', 'resp_corr', 'resp_incorr', 'preg_contest', 'preg_not_contest', 'ids_preg', 'corr_incorr', 'prg_result', 'expli_result', 'nametems', 'nametems_bas', 'nametems_esp') );

    }
}
