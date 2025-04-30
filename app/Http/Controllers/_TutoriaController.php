<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//despues de las versiones 5.8 en adelante de laravel estas clases ya no son necesarias.
use Illuminate\Html\HtmlServiceProvider;
use Illuminate\Html\FormFacade;
use Illuminate\Html\HtmlFacade;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


//modelos usados por el controlador
use App\modelos\User;
use App\modelos\LogAvanTuto;
use App\modelos\Tutorial;
use App\modelos\ContenidoTuto;

use App\modelos\Quiz;
use App\modelos\PreguntasQuiz;
use App\modelos\Log_Quiz;


class TutoriaController extends Controller{

	/**
	 * Carga el contenido de una tutoria dependiendo del tipo
	 * - TUTCN: Tutoial con contenido en niveles
	 * - TUTE: Evaluación tipo quiz
	 * - otro: tipo estandar
	 */
	function index(){

		$users = User::all();
		return view('tutoria', compact('users'));
	}

/* Cargamos el contenido de cada uno de los tutoriales */

	function contenido(Request $request){

		$unic = 0;

        $contenido = $request->input("id_tuto");
        $program = explode(";;",  $contenido);


        $tutorias = Tutorial::where(['id' => $program[1]])->get();

        $id_user = Auth::id();
        $id_tuto = intval($program[1]);

        $papTutos = Tutorial::where([ 'id' => $id_tuto ])->first();

        $tutoria_child_bas_esp = array();
        $postut = 0;

        $logUser_child_bas_esp = array();
        $logTutos_child_bas_esp = array();
        $time_child_bas_esp = array();
        $postuttem = 0;

        $tipTuto = $program[0];

		//TUTCN: Carga jeraquica de contenidos con logs por subtemas
        if($tipTuto === 'TUTCN'){
        	
        	foreach($tutorias as $tutoria){
        		$tutorias_childs = Tutorial::where([ 'id_pap' => $tutoria->id ])->get();

        		foreach ( $tutorias_childs as $tutoria_child ) {

        			//Se consultan las hijas de cada segmento del examen completo
        			$tutorias_childsBE = Tutorial::where([ 'id_pap' => $tutoria_child->id ])->get();
        			$tutoria_child_bas_esp[$postut] = $tutorias_childsBE;

        			foreach( $tutorias_childsBE as $tutoria_childBE){
        				
						//obtiene logs de usuario por cada tutorial hijo
        				$logUser_child_bas_esp[$postuttem] = LogAvanTuto::where([ 'id_user' => $id_user, 'id_tutoria' => $tutoria_childBE->id ])->get()->toArray();
        				$logTutos_child_bas_esp[$postuttem] = Tutorial::where([ 'id' => $tutoria_childBE->id ])->get();

						// Primer tema asociado para marcar como visto
        				foreach($logTutos_child_bas_esp[$postuttem] as $logTuto){

				        	foreach($logTuto->temsTuto as $tem){
				        		if($unic == 0){
				        			$id_tem = $tem->id;
				        			++$unic;
				        		}
				        	}
				        }

						// Si no hay log de uso, se registra uno nuevo
				        if(empty($logUser_child_bas_esp[$postuttem])){

					        DB::table('mb04_log_uso_tutorial')->insert([
					        	'id_user' => $id_user,
					        	'id_tutoria' => $tutoria_childBE->id,
					        	'tiempoEstudio' => '00:00:00',
					        	'temasVistos' => $id_tem,
					        	'created_at' => date("Y-m-d H:i:s"),
					        	'updated_at' => date("Y-m-d H:i:s")
					        ]);
					        $time_child_bas_esp[$postuttem] = explode(":", "00:00:00");

				    	}else{

				    		$logUser_child_bas_esp[$postuttem] = LogAvanTuto::where([ 'id_user' => $id_user, 'id_tutoria' => $tutoria_childBE->id ])->first();
				    		$time_child[$postuttem] = explode(":",  $logUser_child_bas_esp[$postuttem]->tiempoEstudio);
				    	}

        				++$postuttem;
        			}

        			$time_chidl_bas_esp[$postut] = $time_child;
        			$time_child = array();
        			++$postut;

        			$postuttem = 0;
        		}
        	}

        	$tutorias = $tutoria_child_bas_esp;
        	$time = $time_chidl_bas_esp;

        	return view('tutoria_content', compact('tutorias','time', 'tipTuto', 'id_tuto', 'papTutos'));

			// --- TUTE: Tutorial tipo evaluación
        }else if($tipTuto === 'TUTE'){

			$logUser = LogAvanTuto::where([ 'id_user' => $id_user, 'id_tutoria' => $id_tuto ])->get()->toArray();
	        $logTutos = Tutorial::where([ 'id' => $id_tuto ])->get();

	        $ids_quizs = array();
	        $cq = 0;

	        $quizPres = array();
	        $quizsTuto = array();

        	foreach($logTutos as $logTuto){
        		foreach($logTuto->temsTuto as $tem){
        		
	        		$ids_quizs[$cq] = DB::table('mb04_temasOfTutoria')->where([
			        	'id_tutoria' => $logTuto->id,
			        	'id_contenido' => $tem->id
			        ])->first();
	        		
	        		++ $cq;

	        		$id_tem = $tem->id;
        		}
        	}

			// Recolecta datos del quiz y logs del usuario
        	for($y=0; $y<count($ids_quizs); ++$y ){
        		$quizPres[$y] = Log_Quiz::where([ 'id_user' => $id_user, 'id_quiz' => $ids_quizs[$y]->id_quiz])->get();
        		$quizsTuto[$y] = Quiz::where([ 'id'=>$ids_quizs[$y]->id_quiz ])->get();
        	}

        	if(empty($logUser)){

		        DB::table('mb04_log_uso_tutorial')->insert([
		        	'id_user' => $id_user,
		        	'id_tutoria' => $id_tuto,
		        	'tiempoEstudio' => '00:00:00',
		        	'temasVistos' => $id_tem,
		        	'created_at' => date("Y-m-d H:i:s"),
		        	'updated_at' => date("Y-m-d H:i:s")
		        ]);
		        
		        $time = explode(":", "00:00:00");

				// --- Otro tipo de tutorial
	    	}else{

	    		$logUser = LogAvanTuto::where([ 'id_user' => $id_user, 'id_tutoria' => $id_tuto ])->first();
	    		$time = explode(":",  $logUser->tiempoEstudio);
	    	}

	    	return view('tutoria_content', compact('tutorias','time', 'tipTuto', 'id_tuto', 'papTutos', 'quizPres', 'quizsTuto', 'ids_quizs'));

		}else{

			$logUser = LogAvanTuto::where([ 'id_user' => $id_user, 'id_tutoria' => $id_tuto ])->get()->toArray();
	        $logTutos = Tutorial::where([ 'id' => $id_tuto ])->get();

	        foreach($logTutos as $logTuto){
	        	foreach($logTuto->temsTuto as $tem){
	        		if($unic == 0){
	        			$id_tem = $tem->id;
	        			++$unic;
	        		}
	        	}
	        }

	        if(empty($logUser)){

		        DB::table('mb04_log_uso_tutorial')->insert([
		        	'id_user' => $id_user,
		        	'id_tutoria' => $id_tuto,
		        	'tiempoEstudio' => '00:00:00',
		        	'temasVistos' => $id_tem,
		        	'created_at' => date("Y-m-d H:i:s"),
		        	'updated_at' => date("Y-m-d H:i:s")
		        ]);
		        $time = explode(":", "00:00:00");

	    	}else{

	    		$logUser = LogAvanTuto::where([ 'id_user' => $id_user, 'id_tutoria' => $id_tuto ])->first();
	    		$time = explode(":",  $logUser->tiempoEstudio);
	    	}

	    	return view('tutoria_content', compact('tutorias','time', 'tipTuto', 'id_tuto', 'papTutos'));
		}

	}

/* Funciones que cambian la presentación y video respectivamente */

/**
     * Devuelve el video del tema seleccionado
     */
	function cambio_video(Request $request){

		$c_tuto = ContenidoTuto::where(['id' => $request->input("id_tem")])->get();
		return view('video_tem', compact('c_tuto'));
	}

	/**
     * Marca el contenido como visto en los logs del usuario
     */
	function cambio_poster(Request $request){

		$c_tuto = ContenidoTuto::where(['id' => $request->input("id_tem")])->get();
		
		$id_tut = $request->input("id_tut");
		$id_user = Auth::id();

		$ya = 0;

		$logUser = LogAvanTuto::where([ 'id_user' => $id_user, 'id_tutoria' => $id_tut ])->first();

		$temVis = explode(':::', $logUser->temasVistos);

		 // Verifica si ya fue visto
		for($i=0; $i<count($temVis); ++$i){
			
			if($temVis[$i] == $request->input("id_tem"))
				$ya = 1;
		}

		if($ya == 0)
			$logUser->temasVistos = $logUser->temasVistos.':::'.$request->input("id_tem");
		else 
			$logUser->temasVistos = $logUser->temasVistos;

		$logUser->save();

		return view('poster_tem', compact('c_tuto'));

	}

	/**
     * Muestra el material de apoyo asociado al contenido, incluyendo quiz
     */
	function cambio_apoyo(Request $request){

		$c_tuto = ContenidoTuto::where(['id' => $request->input("id_tem")])->get();
		
		$id_tut = $request->input("id_tut");
		$id_user = Auth::id();

		$relConteQuiz = DB::table('mb04_temasOfTutoria')->where([
        	'id_tutoria' => $id_tut,
        	'id_contenido' => $request->input("id_tem")
        ])->first();

        $quizTut = Quiz::where([ 'id'=>$relConteQuiz->id_quiz ])->first();
        $preguntasQ = PreguntasQuiz::where([ 'id_quizs' => $quizTut->id ])->orderByRaw("RAND()")->take(intval($quizTut->num_pregs))->get();

        //dd($preguntasQ);

        return view('material_apoyo_tem', compact('quizTut', 'preguntasQ'));

	}

	/**
     * Guarda las respuestas del quiz del usuario
     */
	function guard_quiz(Request $request){
		
		// Inicializa el contador de respuestas correctas
		$respCorrect = 0;

		// Obtiene el ID del quiz desde la solicitud
		$idQuiz = $request->input('idQuiz');

		// Busca el quiz correspondiente en la base de datos
		$Quiz = Quiz::where([ 'id'=>$idQuiz ])->first();

		// Obtiene la relación entre el contenido del quiz y la tutoría
		$relConteQuiz = DB::table('mb04_temasOfTutoria')->where([
        	'id_quiz' => $Quiz->id
        ])->first();

		// Decodifica los IDs de las preguntas y las respuestas del usuario desde JSON
		$idsPregs = json_decode( $request->input('idsPregs') );
		$respUser = json_decode( $request->input('respUser') );

		// Recorre cada pregunta para verificar si fue respondida correctamente
		for($i = 0; $i<count($idsPregs); ++$i){
			// Obtiene la pregunta específica del quiz
			$pregunta = PreguntasQuiz::where([ 'id'=>$idsPregs[$i], 'id_quizs' => $idQuiz ])->first();

			// Compara la respuesta del usuario con la correcta
			if( intval($pregunta->correcta) == intval($respUser[$i]) ){
				++ $respCorrect;
			}
		}

		// Calcula la nota sobre 5 puntos
		$unidad = (5/intval($Quiz->num_pregs)); // Valor de cada pregunta
		$resultado = $respCorrect * $unidad;



		// Si el resultado es mayor o igual a 3, el usuario aprueba
		if($resultado >= 3){ 
			// Botón para continuar con el curso
			$btn = "javascript:carga_tuto('TUTE;;$relConteQuiz->id_tutoria')";
			// Mensaje de éxito
			$msj = '		
			<div class="alert alert-success pd-y-20" role="alert" style="margin-bottom: 0px;">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>

				<div class="d-sm-flex align-items-center justify-content-start">
					<i class="fa fa-thumbs-o-up alert-icon tx-52 tx-success mg-r-20"></i>
					<div class="mg-t-20 mg-sm-t-0">
						<h5 class="mg-b-2 tx-success">Felicidades!</h5>
						<p class="mg-b-0 tx-gray">
							El quiz fue aprovado, puede continuar con sus estudios.<br><br>
							Puntaje Obtenido: '.$resultado.'<br>
							Preguntas Contestadas Correctamente: '.$respCorrect.' de '.$Quiz->num_pregs.'</p>
						<a class="btn btn-block btn-info close" href="'.$btn.'" style="border-radius: 50px;color: #000;width: 300px;margin-top: 20px;text-transform: uppercase;font-weight: 100;letter-spacing: px;border: 1px solid;border-color: #28a745;" data-dismiss="modal">Continuar con el curso</a>
					</div>
				</div><!-- d-flex -->
			</div>';

		}else{

			// Mensaje de fallo
			$msj = '		
			<div class="alert alert-danger pd-y-20" role="alert" style="margin-bottom: 0px;">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>

				<div class="d-sm-flex align-items-center justify-content-start">
					<i class="icon ion-alert-circled alert-icon tx-52 tx-danger mg-r-20"></i>
					<div class="mg-t-20 mg-sm-t-0">
						<h5 class="mg-b-2 tx-danger">Lo sentimos :( </h5>
						<p class="mg-b-0 tx-gray">
							El quiz fue reprovado, preparate mas y vuelve a intentarlo.<br><br>
							Puntaje Obtenido: '.$resultado.'<br><br>
							Preguntas Contestadas Correctamente: '.$respCorrect.' de '.$Quiz->num_pregs.'</p>
					</div>
				</div><!-- d-flex -->
			</div>';

		} 

		// Registra el intento del usuario en el historial de quizzes
		Log_Quiz::create([
			'id_user' => Auth::user()->id, 
			'id_quiz' => $idQuiz, 
			'consecutivo_presen' => 0, 
			'preguntas_correct' => $respCorrect, 
			'resultado' => $resultado, 
			'fecha_presentacion' => date('Y-m-d')
		]);

		// Devuelve el mensaje al cliente
		echo $msj;
	}

/* Funciones que permiten el registro de cada usuario */
// -----------------------------------
// Función para guardar el tiempo de estudio del usuario
// -----------------------------------


	function saveTimeTuto(Request $request){

		// ID del usuario autenticado
		$id_user = Auth::id();

		// ID de la tutoría
		$id_tut = $request->input('id_tut');

		// Tiempo ingresado por el usuario
		$hor = $request->input('hor');
		$min = $request->input('min');
		$seg = $request->input('seg');
		
		// Formatea el tiempo a "hh:mm:ss"
		$time = array($hor, $min, $seg);

		// Busca el log del avance del usuario en la tutoría
		$logUser = LogAvanTuto::where([ 'id_user' => $id_user, 'id_tutoria' => $id_tut ])->first();
		// Actualiza el tiempo de estudio
		$logUser->tiempoEstudio = implode(":", $time);
		$logUser->save();

	}

}
