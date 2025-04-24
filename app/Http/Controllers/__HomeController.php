<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use \App\modelos\ProductsOfUser;
use \App\modelos\Producto;
use \App\modelos\User;

use App\modelos\Simulador;
use App\modelos\TemasOfSimulador;
use App\modelos\LogAvanSimu;

use Pixelpeter\Woocommerce;

class HomeController extends Controller{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
 
        $users = User::all();
        $id_user = Auth::id();

        $ult_resultados = LogAvanSimu::where([ 'id_user' => $id_user ])->get();

        $prodsActivUser = ProductsOfUser::where([ "id_users" => $id_user])->get();

        foreach ( $prodsActivUser as $prodActivUser ) {
            
            $fechActiv = Carbon::parse($prodActivUser->fecha_activ);
            $fechActua = Carbon::parse(date('Y-m-d h:i:s'));
            
            $diasDiferencia = $fechActua->diffInDays($fechActiv);
            
            if( $prodActivUser->dias_licen < $diasDiferencia && Auth::user()->id_perfil != 3 ){

                ProductsOfUser::where([ 
                    "id_users" => $id_user, 
                    "id_producto" => $prodActivUser->id_producto,
                    "fecha_activ" => $prodActivUser->fecha_activ
                ])->delete();

            }else $vigencia = $prodActivUser->dias_licen - $diasDiferencia;
        }

        foreach ( $ult_resultados as $resultado ) {
            
            $sim_pres = Simulador::where([ 'id' => $resultado->id_simulador ])->get();
            $tems = TemasOfSimulador::where([ 'id_simulador' => $resultado->id_simulador ])->get();         
        }

        return view('home', compact('users', 'ult_resultados', 'sim_pres'));
    }

    public function newPass( Request $request ){

        $msj_html='';
        $user = User::where([ "email" => $request->input('email') ])->first();

        if(empty($user)){
            $msj_html = '<p>No se registra una cuenta asociada a este correo, verifique e intente nuevamente.</p>';
        }else{
            if(empty($user->password)){
                $user->password = bcrypt($request->input('pass'));
                $user->save();

                $msj_html = '<p>La contraseña se actualizo correctamente.</p>';    
            }else{
                $msj_html = '<p>Usted ya reasigno su contraseña, si requiere restaurarla comuniquese con el administrador de su entidad.</p>'; 
            }
            
        }

        return $msj_html;
    }

    public function polUso(){
        return '<p style="text-align: center;">MODO DE USO</p>
        <p style="text-align: justify; font-size: 12px;">En el Reglamento del Autorregulador del Mercado de Valores de Colombia (AMV) se establece que las personas naturales vinculadas al mercado de valores están obligadas a inscribirse en el Registro Nacional de Profesionales del Mercado de Valores (RNPMV), cuando dicha inscripción sea condición para actuar, por lo tanto dichos profesionales deberán acreditar su capacidad técnica y profesional con la aprobación de los exámenes de idoneidad profesional ante el AMV.</p>
        <p style="text-align: justify; font-size: 12px;">Teniendo en cuenta lo anterior, hemos desarrollado La plataforma – Maestro Bursátil®, el cual es una herramienta de e-learning de preparación para los exámenes de certificación ante el AMV aprobado por la Asociación de Comisionistas de Bolsa de Colombia - Asobolsa y La Bolsa de Valores de Colombia - BVC.</p>
        <p style="text-align: justify; font-size: 12px;">La plataforma cuenta con las siguientes guías, programas y exámenes para su preparación: (i) Operador Básico; (ii) Asesor Comercial General; (iii) Derivados; (iv) Fondos de Inversión Colectiva; (v) Renta Variable; (vi) Renta Fija; (vii) Directivo General; (viii) Directivo Fondos de Inversión Colectiva; (ix) Asesor Comercial Fondos de Inversión Colectiva; (x) Asesor Comercial Pensiones; (xi) Operador Negociación Divisas; y (xii).</p>
        <p style="text-align: justify; font-size: 12px;">La licencia de uso que se otorga sobre el producto tiene una vigencia de 90 días calendario, contados desde el primer ingreso al sistema. De otro lado, el examen podrá ser presentado según los intentos adquiridos. En cada oportunidad que la prueba sea presentada el cuestionario es modificado.</p>
        <p style="text-align: justify; font-size: 12px;">Es importante resaltar que al finalizar cada simulación  de examen la herramienta le permite al usuario visualizar dos cosas, en primer lugar una sección con estadísticas que le permiten evidenciar su progreso en cada uno de los módulos del examen. Por último, la aplicación realiza una retroalimentación a cada pregunta contestada durante la simulación, indicándole al usuario la respuesta seleccionada, la respuesta correcta y la sustentación teórica de la misma, emitiendo un certificado (el cual no tiene carácter vinculante ante el AMV) si se ha superado el simulador con el 70% o más de las preguntas aprobadas.</p>
        <p style="font-size: 12px; text-align: center;">POLÍTICA DE USO</p>
        <p style="text-align: justify; font-size: 12px;">Su email y clave personal son los elementos que informáticamente equivalente a su firma autógrafa y son los que utilizará para autenticarse en el sistema. La clave o contraseña es PERSONAL e INTRASFERIBLE y a partir de la habilitación del usuario, usted se hace responsable de su uso y confidencialidad. Los datos que incorpore o consulte a través del sistema serán tenidos como ingresados/consultados por usted.</p>
        <p style="text-align: justify; font-size: 12px;">La licencia de uso otorgada para el ingreso a la plataforma Maestro Bursátil tiene una vigencia de 90 días calendarios, los cuales iniciaran desde el primer ingreso al sistema. El simulador del Examen Para La Certificación Ante el AMV que haya adquirido solamente podrá ser presentado en las oportunidades que hubieren sido tomadas. El simulador modificara el cuestionario del examen las veces que el mismo sea presentado. </p>
        <p style="text-align: justify; font-size: 12px;">El simulador de examen cuenta con un temporizador que medirá el tiempo en el cual el examen debe ser resuelto, una vez este llegue a cero (0) la ventana del simulador de examen se cerrara. Una vez finalizado el simulador de examen, si usted desea puede repetirlo de forma inmediata.</p>
        <p style="text-align: justify; font-size: 12px;">Usted tendrá acceso a las respuestas y a los resultados consolidados del examen por sección. Las preguntas que componen los exámenes son modificadas cada 30 días, motivo por el cual se actualiza el temario de manera frecuente.</p>
        <p style="text-align: justify; font-size: 12px;">La plataforma Maestro Bursátil imposibilita el uso simultáneo bajo un mismo usuario, en el momento en el cual un mismo usuario ingrese desde lugares distintos éste perderá la posibilidad de ingresar nuevamente a la plataforma, y por tanto los días restantes para la finalización de la licencia de uso, y las demás oportunidades que hubiere podido utilizar el simulador de examen.</p>
        <p style="text-align: center;"> </p>';
    }

    public function polPriva(){
        return '<p style="font-size: 12.1599998474121px; line-height: 15.8079996109009px;" align="center"><strong>TRATAMIENTO DE LA INFORMACIÓN PERSONAL</strong><br /><strong><br /></strong></p>
        <p style="text-align: justify; font-size: 12px;">El Responsable de la información personal contenida en las bases de datos de <strong><span style="text-decoration: underline;">Maestro Bursátil</span></strong> es la (NIT: 900.054.586-0), con domicilio en la ciudad de Bogotá. Consultorías en Riesgo Corporativo Ltda se encuentra ubicada en la Carrera 11 A # 96-51 Oficina 203 (correo electrónico: soporte@maestrobursatil.com y teléfono: 6108161). Como responsable de los datos personales, Consultorías en Riesgo Corporativo Ltda es quien decide sobre las bases de datos y/o el Tratamiento de los datos personales de los Titulares de la información personal.</p>
        <p style="text-align: justify; font-size: 12px;">Los Datos Personales serán tratados por Consultorías en Riesgo Corporativo Ltda, de acuerdo con la Constitución y la normatividad vigente, para fines de capacitación, publicidad, invitaciones, ofertas, lograr una eficiente comunicación con los clientes, para presentar nuestros proyectos, publicaciones, servicios, ofertas, alianzas, concursos, capacitaciones, informar sobre cambios en nuestros proyectos, programas o servicios, facilitar el acceso general la información de éstos, dar cumplimiento a las obligaciones contraídas con nuestros clientes, proveedores y empleados, evaluar la calidad de nuestro servicio y a cualquier otro fin según la autorización dada para el Tratamiento por el Titular de la información así como para la transferencia y transmisión de los datos a las entidades con las que Consultorías en Riesgo Corporativo Ltda tenga un convenio relacionado con <strong><span style="text-decoration: underline;">Maestro Bursátil</span></strong> y a cualquier otra según la autorización dada para el Tratamiento por el Titular de la información.</p>
        <p style="text-align: justify; font-size: 12px;">El Tratamiento consistirá en recolectar, recaudar, almacenar, usar, circular, suprimir, procesar, compilar, intercambiar, dar tratamiento, actualizar y disponer de los datos que han sido suministrados a través de la plataforma <strong><span style="text-decoration: underline;">Maestro Bursátil</span></strong> o directamente a Consultorías en Riesgo Corporativo y que se han incorporado en las bases de datos de <strong><span style="text-decoration: underline;">Maestro Bursátil</span></strong>, así como cualquier otro uso según la normatividad vigente y la autorización dada para el Tratamiento por el Titular de la información.</p>
        <p style="text-align: justify; font-size: 12px;">Los derechos que le asisten a los Titulares de la información personal son los establecidos en el artículo 8 de la ley 1582 de 2012, a saber:</p>
        <p style="line-height: 15.8079996109009px; text-align: justify; font-size: 12px; padding-left: 30px;">a) Conocer, actualizar y rectificar sus datos personales frente a los Responsables del Tratamiento o Encargados del Tratamiento. Este derecho se podrá ejercer, entre otros frente a datos parciales, inexactos, incompletos, fraccionados, que induzcan a error, o aquellos cuyo Tratamiento esté expresamente prohibido o no haya sido autorizado;<br />b) Solicitar prueba de la autorización otorgada al Responsable del Tratamiento salvo cuando expresamente se exceptúe como requisito para el Tratamiento, de conformidad con lo previsto en el artículo 10 de la presente ley;<br />c) Ser informado por el Responsable del Tratamiento o el Encargado del Tratamiento, previa solicitud, respecto del uso que le ha dado a sus datos personales;<br />d) Presentar ante la Superintendencia de Industria y Comercio quejas por infracciones a lo dispuesto en la ley de protección de datos y las demás normas que la modifiquen, adicionen o complementen;<br />e) Revocar la autorización y/o solicitar la supresión del dato cuando en el Tratamiento no se respeten los principios, derechos y garantías constitucionales y legales. La revocatoria y/o supresión procederá cuando la Superintendencia de Industria y Comercio haya determinado que en el Tratamiento el Responsable o Encargado han incurrido en conductas contrarias a esta ley y a la Constitución;<br />f) Acceder en forma gratuita a sus datos personales que hayan sido objeto de Tratamiento.</p>
        <p style="text-align: justify; font-size: 12px;">Las políticas de Consultorías en Riesgo Corporativo Ltda frente al Tratamiento de los datos personales son las siguientes: (i) Consultorías en Riesgo Corporativo Ltda busca la protección de los derechos de los Titulares de los Datos Personales; (ii) Consultorías en Riesgo Corporativo Ltda garantiza la  confidencialidad, integridad y seguridad de los Datos Personales; (iii) Consultorías en Riesgo Corporativo Ltda usa los datos personales para los fines autorizados por los Titulares de los Datos Personales, de acuerdo con lo aquí establecido; (iv) Consultorías en Riesgo Corporativo Ltda garantiza al Titular, en todo tiempo, el pleno y efectivo ejercicio de su derecho de hábeas data; (v) Consultorías en Riesgo Corporativo Ltda informará al Titular sobre el uso de los Datos Personales y la finalidad de la recolección de sus datos y de los derechos que le asisten por virtud de la autorización que haya otorgado a la Consultorías en Riesgo Corporativo Ltda; (vi) Consultorías en Riesgo Corporativo Ltda conservará la autorización dada por el Titular de los Datos y su información bajo la condiciones de seguridad necesarias para impedir su adulteración, pérdida, consulta, uso o acceso no autorizado o fraudulento; (vii) Consultorías en Riesgo Corporativo Ltda garantizará que la información que transfiera o transmita a cualquier tercero autorizado (Encargado), dentro de los parámetros establecidos en la ley, sea veraz, completa, exacta, actualizada, comprobable, y comprensible; (viii) Consultorías en Riesgo Corporativo Ltda actualizará la información a quien transfiera o transmita la información; (ix) Consultorías en Riesgo Corporativo Ltda rectificará la información cuando sea incorrecta y comunicará lo pertinente a cualquier tercero autorizado (Encargado); (x) Consultorías en Riesgo Corporativo Ltda tramitará las consultas y reclamos formulados por los Titulares de los Datos Personales en los términos señalados en su Manual Interno de Políticas y Procedimientos en concordancia con lo establecido en la Ley; (xi) Consultorías en Riesgo Corporativo Ltda realizará oportunamente la actualización, rectificación o supresión de los datos en los términos de la ley; (xii) Consultorías en Riesgo Corporativo Ltda suministrará al Encargado del Tratamiento, según el caso, únicamente datos cuyo Tratamiento esté previamente autorizado de conformidad con lo previsto en la ley; (xiii) Consultorías en Riesgo Corporativo Ltda exigirá al Encargado del Tratamiento en todo momento, el respeto a las condiciones de seguridad y privacidad de la información del Titular; (xiv) Consultorías en Riesgo Corporativo Ltda informará al Encargado del Tratamiento cuando determinada información se encuentre en discusión por parte del Titular, una vez se haya presentado la reclamación y no haya finalizado el trámite respectivo; (xv) Consultorías en Riesgo Corporativo Ltda informará a la autoridad de protección de datos cuando se presenten violaciones a los códigos de seguridad y existan riesgos en la administración de la información de los Titulares; y, (xv) Consultorías en Riesgo Corporativo Ltda cumplirá las instrucciones y requerimientos que imparta la Superintendencia de Industria y Comercio.</p>
        <p style="text-align: justify; font-size: 12px;">Los canales a través de los cuales los Titulares de la información podrán ejercer sus derechos a conocer, actualizar, rectificar, y suprimir el dato y revocar la autorización dada a Consultorías en Riesgo Corporativo Ltda para tratar los datos personales son: a través del correo electrónico soporte@maestrobursatil.com, en las oficinas de la sociedad ubicadas en la carrera 11 A No.96-51 en Bogotá D.C. o en el teléfono 6108161 en la ciudad de Bogotá D.C.. La persona responsable de atender su petición, queja o reclamo será la persona líder del proyecto correspondiente en Consultorías en Riesgo Corporativo Ltda.</p>
        <p style="text-align: justify; font-size: 12px;">El procedimiento para conocer, actualizar, rectificar y suprimir el dato y revocar la autorización que haya dado es el siguiente: usted podrá solicitar a través de los canales de contacto ya citados la actualización, supresión, rectificación de la información y/o efectuar consultas o reclamos relacionados con su información personal. Consultorías en Riesgo Corporativo Ltda validará su identificación y la calidad en la que actúa y analizará, clasificará, y emitirá respuesta a su solicitud en los tiempos establecidos en las normas vigentes y de acuerdo con las reglas establecidas en las normas vigentes (ver artículos 14 y 15 de la ley 1581 de 2012). La respuesta a su consulta o reclamo será informada al Titular de la información por el mismo medio por el cual se recibe la solicitud o por el medio que el titular de la información especifique en su solicitud.</p>
        <p style="text-align: justify; font-size: 12px;">La fecha de entrada en vigencia de esta política de privacidad es el 01 de mayo de 2014 y el período de vigencia de las bases de datos de Consultorías en Riesgo Corporativo Ltda es de 10 años.</p>
        <p style="font-size: 12.1599998474121px; line-height: 15.8079996109009px;" align="center"><strong>AVISO DE PRIVACIDAD</strong><br /><strong><br /></strong></p>
        <p style="font-size: 12px; text-align: justify;">En cumplimiento de lo previsto en la ley 1581 de 2012 “<em>Por la cual se dictan disposiciones generales para la protección de datos personales”</em> y del Decreto 1377 de 2013, reglamentario de dicha ley, Consultorías en Riesgo Corporativo Ltda, titular de la marca Ustáriz &amp; Abogados, presenta a los Titulares de la información contenida en la bases de datos personales de <strong><span style="text-decoration: underline;">Maestro Bursátil</span></strong> el presente Aviso de Privacidad, con el fin de informar a los Titulares de la información acerca de las políticas de Tratamiento de información que le sean aplicables, la forma de acceder a esas políticas y las finalidades del tratamiento que se pretende dar a sus datos personales.</p>
        <p style="font-size: 12px; text-align: justify;">El Responsable de la información personal contenida en las bases de datos de de <strong><span style="text-decoration: underline;">Maestro Bursátil</span></strong> es la (NIT: 900.054.586-0), con domicilio en la ciudad de Bogotá. Consultorías en Riesgo Corporativo Ltda se encuentra ubicada en la Carrera 11 A # 96-51 Oficina 203 (correo electrónico: soporte@maestrobursail.com y teléfono: 6108161). Como responsable de los datos personales, Consultorías en Riesgo Corporativo Ltda es quien decide sobre las bases de datos y/o el Tratamiento de los datos personales de los Titulares de la información personal.</p>
        <p style="font-size: 12px; text-align: justify;">Los Datos Personales serán tratados por Consultorías en Riesgo Corporativo Ltda, de acuerdo con la Constitución y la normatividad vigente, para fines de capacitación, publicidad, invitaciones, ofertas, lograr una eficiente comunicación con los clientes, para presentar nuestros proyectos, publicaciones, servicios, ofertas, alianzas, concursos, capacitaciones, informar sobre cambios en nuestros proyectos, programas o servicios, facilitar el acceso general la información de éstos, dar cumplimiento a las obligaciones contraídas con nuestros clientes, proveedores y empleados, evaluar la calidad de nuestro servicio y a cualquier otro fin según la autorización dada para el Tratamiento por el Titular de la información así como para la transferencia y transmisión de los datos a las entidades con las que Consultorías en Riesgo Corporativo Ltda tenga un convenio relacionado con <strong><span style="text-decoration: underline;">Maestro Bursátil</span></strong> y a cualquier otra según la autorización dada para el Tratamiento por el Titular de la información.</p>
        <p style="font-size: 12px; text-align: justify;">El Tratamiento consistirá en recolectar, recaudar, almacenar, usar, circular, suprimir, procesar, compilar, intercambiar, dar tratamiento, actualizar y disponer de los datos que han sido suministrados a través de la plataforma <strong><span style="text-decoration: underline;">Maestro Bursátil</span></strong> o directamente a Consultorías en Riesgo Corporativo y que se han incorporado en las bases de datos de <strong><span style="text-decoration: underline;">Maestro Bursátil</span></strong>, así como cualquier otro uso según la normatividad vigente y la autorización dada para el Tratamiento por el Titular de la información.</p>
        <p style="font-size: 12px; text-align: justify;">Los derechos que le asisten a los Titulares de la información personal son los establecidos en el artículo 8 de la ley 1582 de 2012, a saber:</p>
        <p style="line-height: 15.8079996109009px; font-size: 12px; text-align: justify; padding-left: 30px;">a) Conocer, actualizar y rectificar sus datos personales frente a los Responsables del Tratamiento o Encargados del Tratamiento. Este derecho se podrá ejercer, entre otros frente a datos parciales, inexactos, incompletos, fraccionados, que induzcan a error, o aquellos cuyo Tratamiento esté expresamente prohibido o no haya sido autorizado;<br />b) Solicitar prueba de la autorización otorgada al Responsable del Tratamiento salvo cuando expresamente se exceptúe como requisito para el Tratamiento, de conformidad con lo previsto en el artículo 10 de la presente ley;<br />c) Ser informado por el Responsable del Tratamiento o el Encargado del Tratamiento, previa solicitud, respecto del uso que le ha dado a sus datos personales;<br />d) Presentar ante la Superintendencia de Industria y Comercio quejas por infracciones a lo dispuesto en la ley de protección de datos y las demás normas que la modifiquen, adicionen o complementen;<br />e) Revocar la autorización y/o solicitar la supresión del dato cuando en el Tratamiento no se respeten los principios, derechos y garantías constitucionales y legales. La revocatoria y/o supresión procederá cuando la Superintendencia de Industria y Comercio haya determinado que en el Tratamiento el Responsable o Encargado han incurrido en conductas contrarias a esta ley y a la Constitución;<br />f) Acceder en forma gratuita a sus datos personales que hayan sido objeto de Tratamiento.</p>
        <p style="font-size: 12px; text-align: justify;">Se informa a los titulares de información que pueden consultar la política de Tratamiento de los Datos Personales a través de la página de internet: www.maestrobursatil.com</p>
        <p style="font-size: 12px; text-align: justify;">Nos reservamos el derecho de efectuar en cualquier momento modificaciones o actualizaciones al presente aviso de privacidad. Estas modificaciones estarán disponibles al público a través de la página de Internet www.maestrobursatil.com o se las haremos llegar a la última dirección física o electrónica que nos haya proporcionado.</p>';
    }

    public function woo(){
        return Woocommerce::get('');
    }
}