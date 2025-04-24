@extends('layout-public')

@section('title', "Home")

@section('content')

@if (Route::has('login'))
    <div class="top-right links">
        @auth
            <a href="{{ url('master') }}">Home</a>
        @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        @endauth
    </div>
@endif

<!-- Rotador inicial -->
<div class="home-page-2 view-port" id="launch">
	<div class="view-port pad-left-mdm pad-right-mdm">
		<div class="home-2-text v-center">
			<div class="row text-left mini-text sml-three">
				<h5 class="font3 theme"><span></span></h5>
			</div>
			<h2 class="font3 caps prime e-pop-up">USTED ELIGE EL NIVEL</h2>
			<h4 class="font3 theme caps e-pop-up">…de su equipo<br>…de su carrera<br>…de su futuro</h4>
		</div>
	</div>
</div>
<!---->

<!-- productos -->

<section class="prime-bg text-center pad-btm-mdm pad-top-mdm section-two" id="qe_master">
    <div class="container">
       <div class="row tmh-section-header">
          <h3 class="font1 letter">¿ Qué es Maestro Bursátil ?</h3>
          <p class="font1 letter">Sus retos nunca paran.<br>
             Sus metas, tampoco.
          </p>
       </div>
    </div>
    <div class="container">
       <div class="about-blocks text-center">
          <div class="about-slider-heads pad-top-mdm pad-btm-mdm">
             <div class="row about-slide-btns">
                <div class="abt-btns">
                   <h3 class="font1 letter w600"><i>01</i><span>|</span>Maestro</h3>
                </div>
                <div class="abt-btns">
                   <h3 class="font1 letter w600"><i>02</i><span>|</span>Guías</h3>
                </div>
                <div class="abt-btns">
                   <h3 class="font1 letter w600"><i>03</i><span>|</span>Simuladores</h3>
                </div>
                <div class="abt-btns">
                   <h3 class="font1 letter w600"><i>04</i><span>|</span>Tutorías</h3>
                </div>
             </div>
          </div>
          <div class="row about-slide-zip">

             <!-- Maestro -->
             <div class="about-content text-left">
                <div class="col-md-3 float-left agency-image"></div>
                <div class="col-md-8 float-right about-text-1">
                   <h2 class="font1 letter w600">Maestro Bursátil</h2>
                   <br>
                   
                   	<h4 class="font1 dull-letter">
						Es una herramienta que existe en el mercado de valores para que todas aquellas personas que requieren presentar pruebas de certificación ante el AMV, puedan prepararse mediante una plataforma digital que le permitirá a los usuarios obtener conocimiento a través de libros, conferencias en video y simulación de exámenes, en cualquier momento, desde cualquier computador o tableta móvil y al ritmo que lo requiera, modulando los contenidos de acuerdo con sus intereses.
					</h4>

                </div>
             </div>

             <!-- Guias -->
             <div class="about-content text-left">
                <div class="col-md-3 float-left founder-image"></div>
                <div class="col-md-8 float-right about-text-1">
                   <h2 class="font1 letter w600">Guías para la Certificación de los Profesionales.</h2>
                   <br>
                   <h4 class="font1 dull-letter">Libros elaborados con base en las normas y la doctrina del mercado de valores que desarrollan todos y cada 	uno de los puntos de los temarios de los programas de certificación profesional que exige el ente Autorregulador.<br>

					Estos libros pueden comprarse a través de la plataforma, se cuenta con libros electrónicos que el usuario puede visualizar a travez de Maestro Bursátil en sus dispositivos móviles (Android y/o Apple). Este material, cuenta con objetivos de aprendizaje, ilustraciones, ejemplos, notas aclaratorias y ejercicios de aplicación para la más completa preparación para los exámenes de idoneidad técnica y profesional.)
                   </h4>
                </div>
             </div>

             <!-- Simuladores -->
             <div class="about-content text-left">
                <div class="col-md-3 float-left simulador-image"></div>
                <div class="col-md-8 float-right about-text-1">
                   <h2 class="font1 letter w600">Exámenes de Simulación.</h2>
                   <br>
                   <h4 class="font1 dull-letter">
                   	Pruebas que simulan las realizadas por el Autorregulador, las cuales le permitirán evaluar sus conocimientos, a través de 1.500 preguntas estructuradas bajo los parámetros y formatos del mismo ente. <br> Al finalizar el examen de simulación, el usuario podrá visualizar su desempeño en cada una de las respuestas con su respectiva explicación, lo que le ayudará a fortalecer su proceso académico y profesional.<br>Además, el simulador presenta los resultados y arroja las estadísticas de efectividad que le permitirán identificar su desempeño. Cuando obtenga los resultados esperados, la herramienta le generará una constancia de efectividad.
                   </h4>
                </div>
             </div>

             <!-- Tutorias -->
             <div class="about-content text-left awards-wrap">
                <div class="col-md-3 float-left tutoria-image"></div>
                <div class="col-md-8 float-right about-text-1">
                   <h2 class="font1 letter w600">Tutoriales de Capacitación o E-Learning.</h2>
                   <br>
                   <h4 class="font1 dull-letter">
                   	La capacitación audiovisual le permitirá recibir la información que contienen los libros electrónicos a través de conferencias y clases magistrales con expertos en cada temática, que incluyen ejercicios y lecturas adicionales. La capacitación es asincrónica por lo que el estudiante podrá acceder a las clases la veces que lo requiera conveniente y llevar a su propio ritmo las mismas.
                   </h4>
                </div>
             </div>


          </div>
       </div>
    </div>
 </section>

 <!---->

  <section class="intermediate-two text-center">
    <div class="prime-overlay"></div>
    <div class="container">
       <div class="float-main">
          <div class="tmh-icon"><span data-feather="message-circle"></span></div>
          <h1 class="font1 letter w600">Juan Felipe Cardona </h1>
          <h2 class="font1 letter">Maestro Bursátil fue de gran ayuda en mi preparación para el examen, su contenido es amplio y certificado, con grandes profesionales dando los cursos, perfecto para estudiar en cualquier lugar.</h2>
       </div>
    </div>
 </section>

 <!---->

 <!-- ●▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬● -->
         <section class="prime-bg text-center pad-top-mdm pad-btm-mdm" id="profesionales">
            <div class="container">
               <div class="row tmh-section-header thin-border pad-btm-mdm">
                  <h3 class="font1 letter">Profesionales</h3>
                  <p class="font1 letter">Alcanza el nivel Maestro de la mano de <br>verdaderos expertos.</p>
               </div>
               <div class="team-block-wrap text-center pad-top-mdm">
                  <div class="text-left team-slider owl-theme">
                     <div class="col-md-4 ">
                        <div class="team-block">
                           <img class="img-responsive" src="images/team/1.jpg" alt="unbranded" data-no-retina>
                           <div class="team-details-box">
                              <p class="font1 caps">Abogado</p>
                              <h3 class="font1 letter w600">Luis Humberto Ustáriz González</h3>
                              <ul>
                                 <li><a class="fa fa-facebook" href="https://www.facebook.com/luis.ustariz.5"></a></li>
                                 <li><a class="fa fa-linkedin" href="https://www.linkedin.com/in/luis-humberto-ustariz/"></a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4 ">
                        <div class="team-block">
                           <img class="img-responsive" src="images/team/3.jpg" alt="unbranded" data-no-retina>
                           <div class="team-details-box">
                              <p class="font1 caps">Abogado</p>
                              <h3 class="font1 letter w600">Jose Federico Ustáriz González</h3>
                              <ul>
                                 <li><a class="fa fa-facebook" href="https://www.facebook.com/josefederico.ustarizgonzalez"></a></li>
                                 <li><a class="fa fa-linkedin" href="https://www.linkedin.com/in/jose-federico-ustariz/"></a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4 ">
                        <div class="team-block">
                           <img class="img-responsive" src="images/team/4.jpg" alt="unbranded" data-no-retina>
                           <div class="team-details-box">
                              <p class="font1 caps">Ingeniero Industrial</p>
                              <h3 class="font1 letter w600">Manuel Antonio García Cuello</h3>
                              <ul>
                                 <li><a class="fa fa-facebook" href="https://www.facebook.com/mane.garciac"></a></li>
                                 <li><a class="fa fa-linkedin" href="https://www.linkedin.com/in/garciacuello/"></a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4 ">
                        <div class="team-block">
                           <img class="img-responsive" src="images/team/5.jpg" alt="unbranded" data-no-retina>
                           <div class="team-details-box">
                              <p class="font1 caps">Administrador de Empresas</p>
                              <h3 class="font1 letter w600">Juan Pablo Amorocho</h3>
                              <!--ul>
                                 <li><a class="fa fa-facebook"></a></li>
                                 <li><a class="fa fa-twitter"></a></li>
                                 <li><a class="fa fa-linkedin"></a></li>
                              </ul-->
                           </div>
                        </div>
                     </div>

                     <div class="col-md-4 ">
                        <div class="team-block">
                           <img class="img-responsive" src="images/team/6.jpg" alt="unbranded" data-no-retina>
                           <div class="team-details-box">
                              <p class="font1 caps">Abogada</p>
                              <h3 class="font1 letter w600">Ana María Giraldo</h3>
                              <!--ul>
                                 <li><a class="fa fa-facebook"></a></li>
                                 <li><a class="fa fa-twitter"></a></li>
                                 <li><a class="fa fa-linkedin"></a></li>
                              </ul-->
                           </div>
                        </div>
                     </div>

                     <div class="col-md-4 ">
                        <div class="team-block">
                           <img class="img-responsive" src="images/team/7.jpg" alt="unbranded" data-no-retina>
                           <div class="team-details-box">
                              <p class="font1 caps">Administrador de Empresas</p>
                              <h3 class="font1 letter w600">Manuel Suaza Muñoz</h3>
                              <!--ul>
                                 <li><a class="fa fa-facebook"></a></li>
                                 <li><a class="fa fa-twitter"></a></li>
                                 <li><a class="fa fa-linkedin"></a></li>
                              </ul-->
                           </div>
                        </div>
                     </div>

                  </div>
               </div>
            </div>
         </section>
         <!-- ●▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬● -->

         <section class="prime-bg text-center pad-top-mdm pad-btm-sml section-six" id="precios" >
           <div class="container">
       <div class="about-blocks text-center">
          <div class="about-slider-heads pad-top-mdm pad-btm-mdm">
             <div class="row about-slide-btns">
                <div class="abt-btns">
                   <h3 class="font1 letter w600"><i>01</i><span>|</span>Guías</h3>
                </div>
                <div class="abt-btns">
                   <h3 class="font1 letter w600"><i>02</i><span>|</span>Simuladores</h3>
                </div>
                <div class="abt-btns">
                   <h3 class="font1 letter w600"><i>03</i><span>|</span>Tutorías</h3>
                </div>
                <!--div class="abt-btns">
                   <h3 class="font1 letter w600"><i>04</i><span>|</span>Programas Especiales</h3>
                </div-->
             </div>
          </div>
          <div class="row about-slide-zip">

             <!-- Maestro -->
             <div class="about-content text-left">
                <div class="col-md-3 float-left agency-image"></div>
                <div class="col-md-8 float-right about-text-1">
                   <h2 class="font1 letter w600">Guías.</h2>
                   <br>
                   
                    <h4 class="font1 dull-letter">
                      Estas son las guías que tenemos disponibles para usted.
                    </h4>

                    <table class="table">
                      <tr>
                        <th>Nombre</th>
                        <th>Precio</th>
                      </tr>
    
                      @foreach($products as $product)
                        @if( strpos($product->contenido, 'X') )
                          <tr>
                            <td>{{ $product->nombre }}</td>
                            <td>{{ $product->valor }}</td>
                          </tr>
                        @endif
                      @endforeach
    
                    </table>

                </div>
             </div>

             <!-- Guias -->
             <div class="about-content text-left">
                <div class="col-md-3 float-left founder-image"></div>
                <div class="col-md-8 float-right about-text-1">
                   <h2 class="font1 letter w600">Simuladores.</h2>
                   <br>
                   <h4 class="font1 dull-letter">Estas son los simuladores que tenemos disponibles para usted.<br></h4>
                   <table class="table">
                      <tr>
                        <th>Nombre</th>
                        <th>Precio</th>
                      </tr>

                      @foreach($products as $product)
                        @if( strpos($product->contenido, 'M') )
                          <tr>
                            <td>{{ $product->nombre }}</td>
                            <td>{{ $product->valor }}</td>
                          </tr>
                        @endif
                      @endforeach
                    </table>

                </div>
             </div>

             <!-- Simuladores -->
             <div class="about-content text-left">
                <div class="col-md-3 float-left simulador-image"></div>
                <div class="col-md-8 float-right about-text-1">
                   <h2 class="font1 letter w600">Tutorías.</h2>
                   <br>
                   <h4 class="font1 dull-letter">Estas son los tutoriales que tenemos disponibles para usted.<br></h4>

                   <table class="table">
                      <tr>
                        <th>Nombre</th>
                        <th>Precio</th>
                      </tr>

                      @foreach($products as $product)
                        @if( strpos($product->contenido, 'C'))

                          <tr>
                            <td>{{ $product->nombre }}</td>
                            <td>{{ $product->valor }}</td>
                          </tr>

                        @endif
                      @endforeach
                    </table>
                </div>
             </div>

             <!-- Tutorias ->
             <div class="about-content text-left awards-wrap">
                <div class="col-md-3 float-left tutoria-image"></div>
                <div class="col-md-8 float-right about-text-1">
                   <h2 class="font1 letter w600">Tutoriales de Capacitación o E-Learning.</h2>
                   <br>
                   <h4 class="font1 dull-letter">
                    La capacitación audiovisual le permitirá recibir la información que contienen los libros electrónicos a través de conferencias y clases magistrales con expertos en cada temática, que incluyen ejercicios y lecturas adicionales. La capacitación es asincrónica por lo que el estudiante podrá acceder a las clases la veces que lo requiera conveniente y llevar a su propio ritmo las mismas.
                   </h4>
                </div>
             </div -->


          </div>
       </div>
    </div>

         </section>

         <section class="prime-bg text-center pad-top-mdm pad-btm-sml section-six" id="soporte" >
            <div class="container">
               <div class="row tmh-section-header thin-border pad-btm-mdm">
                  <h3 class="font1 letter">Soporte</h3>
                  <p class="font1 letter">Envíenos su mensaje, nuestro equipo técnico<br>le respondera.</p>
               </div>
               <div class="row">
                  <article class="col-md-6 col-md-offset-3 tmh-form-wrap">
                     <div class="contact-form-outer letter font1">
                        <div class="form-wrap">
                           <form class="contact-form" name="myform" id="contactForm" action="sendmail.php" enctype="multipart/form-data" method="post">
                              <input class="cnt-input font1" size="100" type="text" name="name" id="name" placeholder="Nombre" data-placeholder="Nombre">
                              <input class="cnt-input font1" type="text"  size="30" id="email" name="email" placeholder="Email" data-placeholder="Email">
                              <input type="hidden" value="unbranded@mailinator.com" name="receiver">
                              <input type="hidden" value="contactform" name="subject">
                              <input type="hidden" value="" name="website_url">                                                
                              <textarea id="msg" rows="3" cols="40" name="message" class="cnt-input font1" placeholder="Mensaje" data-placeholder="Mensaje"></textarea>
                              <button type="submit" name="submit" id="submit" class="tmh-btn">Enviar</button>
                           </form>
                        </div>
                     </div>
                     <!-- Modal Section HTML Markup -->
                     <button class="md-trigger launch_modal hidden-lg hidden-md hidden-sm hidden-xs" data-modal="modal-5">Launch modal</button>
                     <div class="md-modal md-effect-5" id="modal-5">
                        <div class="md-content">
                           <h3 class="font1">Gracias por sus comentarios</h3>
                           <div>
                              <p class="align-center font1">Nuestro equipo tecnico se contactara con usted en los proximos días.</p>
                              <div class="clear add-top-small"></div>
                              <button class="md-close tmh-btn">Cerrar</button>
                           </div>
                        </div>
                     </div>
                     <div class="md-overlay"></div>
                  </article>
               </div>
            </div>
         </section>



@endsection

