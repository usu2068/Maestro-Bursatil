<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Html\HtmlServiceProvider; //proveedor de servicios para html
use Illuminate\Html\FormFacade; //facade para manejar formularios
use Illuminate\Html\HtmlFacade;// facade para manejo de html 

use Illuminate\Support\Facades\DB; //facade para interarctuar con la base de datos
use Illuminate\Support\Facades\Auth; //facade para autenticacion de usuarios

use App\modelos\User; //modelo de usuario
use App\modelos\LogAvanTuto; //modelo para el registro de avance de tutoriales
use App\modelos\Tutorial;//modelo de tutorial
use App\modelos\ContenidoTuto; //modelo para contenido de tutorial

use App\modelos\Quiz; //modelo para cuestionarios (quizzes)
use App\modelos\PreguntasQuiz; //modelo para preguntas de cuestionarios
use App\modelos\Log_Quiz; //modelo para registro de cuestionarios


/**
 * controlador para la gestion de tutoriales.
 * Maneja la carga, visualizacion y seguimiento del progreso en tutoriales.
 */
class TutoriaController extends Controller{

	function index(){

		//obtener todos los usuarios registros 
		$users = User::all();
		//retornar la vista 'tutoria' con la variable 'users'
		return view('tutoria', compact('users'));
	}

/* Cargamos el contenido de cada uno de los tutoriales */

	function contenido(Request $request){

		//inicializacion de variables
		$unic = 0; //bandera para obtener el primer tema del tutorial

		//obtener el parametro 'id_tuto' del request
        $contenido = $request->input("id_tuto");
		//dividir el contenido en tipo y ID usando ';;' como separador
        $program = explode(";;",  $contenido);


		//buscar tutoriales con el ID especificado
        $tutorias = Tutorial::where(['id' => $program[1]])->get();

		//obtener ID del usuario actual
        $id_user = Auth::id();
        $id_tuto = intval($program[1]);

		//obtener el tutorial padre
        $papTutos = Tutorial::where([ 'id' => $id_tuto ])->first();

		//inicializar arrays para almacenar datos de tutoriales hijos y logs
        $tutoria_child_bas_esp = array();
        $postut = 0;

        $logUser_child_bas_esp = array();
        $logTutos_child_bas_esp = array();
        $time_child_bas_esp = array();
        $postuttem = 0;

        $tipTuto = $program[0]; //tipo de tutorial: 'TUTCN' o 'TUTE'

		//si el tipo de tutorial es 'TUTCN' (tutorial completo)
        if($tipTuto === 'TUTCN'){
        	//obtiene los hijos del tutorial actual
        	foreach($tutorias as $tutoria){
        		$tutorias_childs = Tutorial::where([ 'id_pap' => $tutoria->id ])->get();

        		foreach ( $tutorias_childs as $tutoria_child ) {

        			//Se consultan las hijas de cada segmento del examen completo
        			$tutorias_childsBE = Tutorial::where([ 'id_pap' => $tutoria_child->id ])->get();
        			$tutoria_child_bas_esp[$postut] = $tutorias_childsBE;

					//iterar sobre cada tutorial hijo
        			foreach( $tutorias_childsBE as $tutoria_childBE){
        				
						//obtener el log de avance del usuario para el tutorial hijo
        				$logUser_child_bas_esp[$postuttem] = LogAvanTuto::where([ 'id_user' => $id_user, 'id_tutoria' => $tutoria_childBE->id ])->get()->toArray();
						//obtener el tutorial hijo
        				$logTutos_child_bas_esp[$postuttem] = Tutorial::where([ 'id' => $tutoria_childBE->id ])->get();

						//obtener los temas del tutorial hijo
        				foreach($logTutos_child_bas_esp[$postuttem] as $logTuto){

				        	foreach($logTuto->temsTuto as $tem){
				        		//asignar el primer tema encontrado al usuario
								if($unic == 0){
				        			$id_tem = $tem->id;
				        			++$unic;
				        		}
				        	}
				        }

						//si el log del usuario esta vacio, crear un nuevo registro
				        if(empty($logUser_child_bas_esp[$postuttem])){

					        DB::table('mb04_log_uso_tutorial')->insert([
					        	'id_user' => $id_user,
					        	'id_tutoria' => $tutoria_childBE->id,
					        	'tiempoEstudio' => '00:00:00',
					        	'temasVistos' => $id_tem,
					        	'created_at' => date("Y-m-d H:i:s"),
					        	'updated_at' => date("Y-m-d H:i:s")
					        ]);
							//establecer el tiempo inicial como '00:00:00'
					        $time_child_bas_esp[$postuttem] = explode(":", "00:00:00");

				    	}else{

							//si existe el log, obtener el tiempo registrado
				    		$logUser_child_bas_esp[$postuttem] = LogAvanTuto::where([ 'id_user' => $id_user, 'id_tutoria' => $tutoria_childBE->id ])->first();
				    		$time_child[$postuttem] = explode(":",  $logUser_child_bas_esp[$postuttem]->tiempoEstudio);
				    	}

        				++$postuttem;
        			}

					//actualizar tiempo
        			$time_chidl_bas_esp[$postut] = $time_child;
        			$time_child = array();
        			++$postut;

        			$postuttem = 0;
        		}
        	}

			//actualizar variables para la vista
        	$tutorias = $tutoria_child_bas_esp;
        	$time = $time_chidl_bas_esp;

			//retorna la vista 'tutoria_content' con los datos obtenidos
        	return view('tutoria_content', compact('tutorias','time', 'tipTuto', 'id_tuto', 'papTutos'));

        }else if($tipTuto === 'TUTE'){

			//obtiene los registros del log de avance del usuario en la tutoria especifica
			$logUser = LogAvanTuto::where([ 'id_user' => $id_user, 'id_tutoria' => $id_tuto ])->get()->toArray();
	        $logTutos = Tutorial::where([ 'id' => $id_tuto ])->get();

			//inicializa los arrays para almacenar los IDs de los quizzes y los quizzes correspondientes
	        $ids_quizs = array();
	        $cq = 0;

	        $quizPres = array(); //array para almacenar los logs de presentacion de quizzes
	        $quizsTuto = array(); //array para almacenar los quizzes asociados

			//recorre los temas de la tutoria para obtener los quizzes asociados
        	foreach($logTutos as $logTuto){
        		foreach($logTuto->temsTuto as $tem){
        		
					//obtiene el ID del quiz asociado al tema actual y lo almacena en el array
	        		$ids_quizs[$cq] = DB::table('mb04_temasOfTutoria')->where([
			        	'id_tutoria' => $logTuto->id,
			        	'id_contenido' => $tem->id
			        ])->first();
	        		
	        		++ $cq;

	        		$id_tem = $tem->id; //actualiza el ultimo ID de tema encontrado
        		}
        	}

			//recorreo los quizzes obtenidos para almacenar los logs y quizzes en la tutoria, se crea uno nuevo
        	for($y=0; $y<count($ids_quizs); ++$y ){
        		$quizPres[$y] = Log_Quiz::where([ 'id_user' => $id_user, 'id_quiz' => $ids_quizs[$y]->id_quiz])->get();
        		$quizsTuto[$y] = Quiz::where([ 'id'=>$ids_quizs[$y]->id_quiz ])->get();
        	}

			//si el usuario no tiene un log de avance en esta tutoria, se crea uno nuevo
        	if(empty($logUser)){

		        DB::table('mb04_log_uso_tutorial')->insert([
		        	'id_user' => $id_user,
		        	'id_tutoria' => $id_tuto,
		        	'tiempoEstudio' => '00:00:00', //se iniciañliza el tiempo de estudio en cero
		        	'temasVistos' => $id_tem, //se almacena el ultimo tema visitado
		        	'created_at' => date("Y-m-d H:i:s"),
		        	'updated_at' => date("Y-m-d H:i:s")
		        ]);
		        
		        $time = explode(":", "00:00:00"); //inicializa el tiempo de estudio en cero

	    	}else{

				// si el tipo de tutoria no es 'TUTE', se sigue este flujo alternativo
	    		$logUser = LogAvanTuto::where([ 'id_user' => $id_user, 'id_tutoria' => $id_tuto ])->first();
	    		$time = explode(":",  $logUser->tiempoEstudio);
	    	}

	    	return view('tutoria_content', compact('tutorias','time', 'tipTuto', 'id_tuto', 'papTutos', 'quizPres', 'quizsTuto', 'ids_quizs'));

		}else{

			$logUser = LogAvanTuto::where([ 'id_user' => $id_user, 'id_tutoria' => $id_tuto ])->get()->toArray();
	        $logTutos = Tutorial::where([ 'id' => $id_tuto ])->get();

			//recorre los temas y obtiene el primer ID de tema encontrado
	        foreach($logTutos as $logTuto){
	        	foreach($logTuto->temsTuto as $tem){
	        		if($unic == 0){
	        			$id_tem = $tem->id;
	        			++$unic;
	        		}
	        	}
	        }

			//si no existe un log de avance, se crea uno nuevo
	        if(empty($logUser)){


		        DB::table('mb04_log_uso_tutorial')->insert([
		        	'id_user' => $id_user,
		        	'id_tutoria' => $id_tuto,
		        	'tiempoEstudio' => '00:00:00',
		        	'temasVistos' => $id_tem,
		        	'created_at' => date("Y-m-d H:i:s"),
		        	'updated_at' => date("Y-m-d H:i:s")
		        ]);
		        $time = explode(":", "00:00:00"); //inicializa el tiempo de estudio en cero

	    	}else{

	    		$logUser = LogAvanTuto::where([ 'id_user' => $id_user, 'id_tutoria' => $id_tuto ])->first();
	    		$time = explode(":",  $logUser->tiempoEstudio);
	    	}

	    	return view('tutoria_content', compact('tutorias','time', 'tipTuto', 'id_tuto', 'papTutos'));
		}

	}

/* Funciones que cambian la presentación y video respectivamente */

	function cambio_video(Request $request){

		$c_tuto = ContenidoTuto::where(['id' => $request->input("id_tem")])->get();
		return view('video_tem', compact('c_tuto'));
	}

	/**
	 * Actualiza el póster de un contenido dentro de una tutoría.
     * Verifica si el tema ha sido visto previamente por el usuario y, si no lo ha sido,
     * lo marca como visto. Luego, retorna la vista correspondiente del póster del tema.
     *
	 * @param Request \$request - Objeto que contiene los datos enviados desde el cliente.
     * @return \Illuminate\View\View - Vista del póster del tema correspondiente.
	 */

	function cambio_poster(Request $request){

		// Obtiene el contenido tutorial solicitado basándose en el ID del tema recibido.
		$c_tuto = ContenidoTuto::where(['id' => $request->input("id_tem")])->get();
		
		// Obtiene el ID de la tutoría y el ID del usuario autenticado.
		$id_tut = $request->input("id_tut");
		$id_user = Auth::id();

		// Variable que indica si el tema ya ha sido visto por el usuario.
		$ya = 0;

		// Busca el registro del usuario en la tabla de logs de avance del tutorial.
		$logUser = LogAvanTuto::where([ 'id_user' => $id_user, 'id_tutoria' => $id_tut ])->first();

		// Separa los temas vistos por el usuario utilizando ':::' como delimitador.
		$temVis = explode(':::', $logUser->temasVistos);

		// Itera sobre los temas vistos para verificar si el tema actual ya fue visto.
		for($i=0; $i<count($temVis); ++$i){
			
			if($temVis[$i] == $request->input("id_tem"))
				$ya = 1;
		}

		// Si el tema no ha sido visto, lo marca como visto concatenando su ID al campo 'temasVistos'.
		if($ya == 0)
			$logUser->temasVistos = $logUser->temasVistos.':::'.$request->input("id_tem");
		else 
			$logUser->temasVistos = $logUser->temasVistos;

			// Guarda los cambios en la base de datos.
		$logUser->save();

		// Retorna la vista del póster del tema.
		return view('poster_tem', compact('c_tuto'));

	}

	/**
     * Muestra el material de apoyo relacionado a un tema específico de una tutoría.
     * Obtiene el quiz correspondiente al tema y selecciona preguntas aleatorias basadas en la cantidad definida.
     *
     * @param Request \$request - Objeto que contiene los datos enviados desde el cliente.
     * @return \Illuminate\View\View - Vista del material de apoyo del tema.
     */
	function cambio_apoyo(Request $request){

		// Obtiene el contenido tutorial solicitado basándose en el ID del tema recibido.
		$c_tuto = ContenidoTuto::where(['id' => $request->input("id_tem")])->get();
		
		// Obtiene el ID de la tutoría y el ID del usuario autenticado.
		$id_tut = $request->input("id_tut");
		$id_user = Auth::id();

		// Busca la relación entre el tema y el quiz correspondiente.
		$relConteQuiz = DB::table('mb04_temasOfTutoria')->where([
        	'id_tutoria' => $id_tut,
        	'id_contenido' => $request->input("id_tem")
        ])->first();

		// Obtiene el quiz asociado al tema.
        $quizTut = Quiz::where([ 'id'=>$relConteQuiz->id_quiz ])->first();
        
		// Selecciona preguntas aleatorias basadas en la cantidad definida en el quiz.
		$preguntasQ = PreguntasQuiz::where([ 'id_quizs' => $quizTut->id ])->orderByRaw("RAND()")->take(intval($quizTut->num_pregs))->get();

        //dd($preguntasQ);

		// Retorna la vista del material de apoyo con el quiz y sus preguntas.
        return view('material_apoyo_tem', compact('quizTut', 'preguntasQ'));

	}

	/**
     * Guarda el resultado de un quiz realizado por el usuario.
     * Calcula el puntaje obtenido y genera un mensaje basado en el resultado.
     *
     * @param Request \$request - Objeto que contiene los datos enviados desde el cliente.
     * @return void - Retorna un mensaje HTML con el resultado del quiz.
     */
	function guard_quiz(Request $request){
		
		// Inicializa la variable que cuenta las respuestas correctas.
		$respCorrect = 0;

		// Obtiene el ID del quiz y la información del mismo.
		$idQuiz = $request->input('idQuiz');
		$Quiz = Quiz::where([ 'id'=>$idQuiz ])->first();

		// Obtiene la relación entre el tema y el quiz correspondiente.
		$relConteQuiz = DB::table('mb04_temasOfTutoria')->where([
        	'id_quiz' => $Quiz->id
        ])->first();

		// Obtiene los IDs de las preguntas y las respuestas del usuario en formato JSON.
		$idsPregs = json_decode( $request->input('idsPregs') );
		$respUser = json_decode( $request->input('respUser') );

		// Itera sobre las preguntas y verifica las respuestas correctas.
		for($i = 0; $i<intval($Quiz->num_pregs); ++$i){
			$pregunta = PreguntasQuiz::where([ 'id'=>$idsPregs[$i], 'id_quizs' => $idQuiz ])->first();

			if( intval($pregunta->correcta) == intval($respUser[$i]) ){
				++ $respCorrect;
			}
		}

		// Calcula el puntaje basado en las respuestas correctas.
		$unidad = (5/intval($Quiz->num_pregs));
		$resultado = $respCorrect * $unidad;

		// Genera el mensaje según el resultado del quiz.
		if($resultado >= 3){ 
			$btn = "javascript:carga_tuto('TUTE;;$relConteQuiz->id_tutoria')";
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

		// Registra el resultado del quiz en la base de datos.
		Log_Quiz::create([
			'id_user' => Auth::user()->id, 
			'id_quiz' => $idQuiz, 
			'consecutivo_presen' => 0, 
			'preguntas_correct' => $respCorrect, 
			'resultado' => $resultado, 
			'fecha_presentacion' => date('Y-m-d')
		]);

		// Retorna el mensaje generado.
		echo $msj;
	}

/* Funciones que permiten el registro de cada usuario */

/*
 * Función: saveTimeTuto
 * Descripción: Esta función permite registrar el tiempo de estudio de un usuario en una tutoría específica.
 * Recibe una solicitud HTTP mediante el objeto Request, que contiene el ID de la tutoría, las horas, minutos y segundos de estudio.
 * Luego, actualiza el registro del usuario en la tabla 'mb04_log_uso_tutorial' con el tiempo acumulado de estudio en formato HH:MM:SS.
 *
 * Parámetros:
 *   - Request \$request: Objeto que contiene los datos enviados mediante el método POST, incluyendo:
 *       - 'id_tut': ID de la tutoría a actualizar.
 *       - 'hor': Horas de estudio en formato entero.
 *       - 'min': Minutos de estudio en formato entero.
 *       - 'seg': Segundos de estudio en formato entero.
 *
 * Retorno:
 *   - No retorna una vista ni un JSON. Solo actualiza el registro en la base de datos.
 */

	function saveTimeTuto(Request $request){

		// Obtiene el ID del usuario autenticado.
		$id_user = Auth::id();

		// Obtiene el ID de la tutoría desde la solicitud HTTP.
		$id_tut = $request->input('id_tut');

		// Obtiene las horas, minutos y segundos enviados en la solicitud HTTP.
		$hor = $request->input('hor');
		$min = $request->input('min');
		$seg = $request->input('seg');
		
		// Crea un array con los valores de tiempo en formato [hor, min, seg].
		$time = array($hor, $min, $seg);

		// Busca el registro del usuario en la tabla de logs de tutorías.
		$logUser = LogAvanTuto::where([ 'id_user' => $id_user, 'id_tutoria' => $id_tut ])->first();
		
		// Convierte el array de tiempo en un string con formato HH:MM:SS y lo asigna al campo 'tiempoEstudio'.
		$logUser->tiempoEstudio = implode(":", $time);

		// Guarda el registro actualizado en la base de datos.
		$logUser->save();

	}

}
