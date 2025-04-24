/*
	- Funcion en donde se realizan los envios POST 
	- TUTORIALES
*/ 
 
	function carga_tuto(id_tuto){

		var valores = 'id_tuto='+id_tuto;

		jQuery.ajaxSetup({
			headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')}
		});

		jQuery("#btn-comenzar").text('Comenzar');

		jQuery.ajax({
			url:jQuery('#urlTuto').val(),
			type: "post",
			dataType :  "html",
			data: valores,
			success: function ( data ){
				jQuery("#content").html(data);
				clockTut();
			}, 
			beforeSend: function () {


				var alert = '<div class="flex-center position-ref full-height" style="text-align: center; margin-top: 25%; margin-bottom: 25%;">';
	            alert = alert + '<div class="content">';
	            alert = alert + '<div class="title m-b-md">';
	            alert = alert + '<img class="brand-img" width="250px" src="images/loading.gif" alt="brand"/>';
	            alert = alert + '</div>';
	            alert = alert + '<div class="links">';
	            alert = alert + 'Espera un momento! Estamos trabajando en tu solicitud.<br><br>';
	            
	            alert = alert + '</div>';
	            alert = alert + '</div>';
	        	alert = alert + '</div>';

				$("#content").html(alert);
			}
		});
	}

	function next_tem(id_tem){

		var valores = 'id_tem='+id_tem+'&id_tut='+jQuery("#idTut").val();

		jQuery.ajaxSetup({
			headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')}
		});

		jQuery.ajax({
			url:jQuery('#urlV').val(),
			type: "post",
			dataType :  "html",
			data: valores,
			success: function ( data ){
				jQuery("#video").html(data);
			}
		});

		jQuery.ajax({
			url:jQuery('#urlP').val(),
			type: "post",
			dataType :  "html",
			data: valores,
			success: function ( data ){
				jQuery("#presentacion").html(data);
			}
		});
	}

	function next_tem_esp(id_tem){

		var valores = 'id_tem='+id_tem+'&id_tut='+jQuery("#idTut").val();

		jQuery.ajaxSetup({
			headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')}
		});

		jQuery.ajax({
			url:jQuery('#urlV').val(),
			type: "post",
			dataType :  "html",
			data: valores,
			success: function ( data ){
				jQuery("#video").html(data);
			}
		});

		jQuery.ajax({
			url:jQuery('#urlP').val(),
			type: "post",
			dataType :  "html",
			data: valores,
			success: function ( data ){
				jQuery("#presentacion").html(data);
			}
		});
	}


	function clockTut(){

		var tiempo = {
			hora: parseInt( $("#hour").text() ),
			minuto: parseInt( $("#minute").text() ),
			segundo: parseInt( $("#second").text() )
		};

		var cont = 0;
	    var tiempo_corriendo = null;

	    if ( $("#btn-comenzar").text() == 'Comenzar' ){

	        $("#btn-comenzar").text('Detener');
	        tiempo_corriendo = setInterval(function(){
	        	
	        	if(cont == 61){

	        		cont = 0;

	    			var hor = jQuery("#hour").text();
				    var min = jQuery("#minute").text();
				    var seg = jQuery("#second").text();
				    var id_tut = jQuery("#idTut").val();

				    var valores = 'id_tut='+id_tut+'&hor='+hor+'&min='+min+'&seg='+seg;

				    jQuery.ajax({
						url:jQuery('#urlTimeTut').val(),
						type: "post",
						dataType :  "html",
						data: valores,
						success: function ( data ){
							jQuery("#guardaAv").html(data);
						}
					});
	        	}
	            // Segundos
	            tiempo.segundo++;
	            if(tiempo.segundo >= 60)
	            {
	                tiempo.segundo = 0;
	                tiempo.minuto++;
	            }      

	            // Minutos
	            if(tiempo.minuto >= 60)
	            {
	                tiempo.minuto = 0;
	                tiempo.hora++;
	            }

	            $("#hour").text(tiempo.hora < 10 ? '0' + tiempo.hora : tiempo.hora);
	            $("#minute").text(tiempo.minuto < 10 ? '0' + tiempo.minuto : tiempo.minuto);
	            $("#second").text(tiempo.segundo < 10 ? '0' + tiempo.segundo : tiempo.segundo);

	            ++ cont;

	        }, 1000);
	    }
	    else {

	        $("#btn-comenzar").text('Comenzar');
	        clearInterval(tiempo_corriendo);
	    }
	}


/*
	- Funcion en donde se realizan los envios POST 
	- SIMULADORES
*/

	function carga_simu(id_simu){

		var valores = 'id_simu='+id_simu;

		jQuery.ajaxSetup({
			headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')}
		});

		jQuery.ajax({
			url:jQuery('#urlSimu').val(),
			type: "post",
			dataType :  "html",
			data: valores,
			success: function ( data ){
				jQuery("#content").html(data);
			},
			beforeSend: function () {


				var alert = '<div class="flex-center position-ref full-height" style="text-align: center; margin-top: 25%; margin-button: 25%;">';
	            alert = alert + '<div class="content">';
	            alert = alert + '<div class="title m-b-md">';
	            alert = alert + '<img class="brand-img" width="250px" src="images/loading.gif" alt="brand"/>';
	            alert = alert + '</div>';
	            alert = alert + '<div class="links">';
	            alert = alert + 'Espera un momento! Estamos trabajando en tu solicitud.<br><br>';
	            
	            alert = alert + '</div>';
	            alert = alert + '</div>';
	        	alert = alert + '</div>';

				$("#content").html(alert);
			}
		});
	}

	function carga_html(){

		alerta_error = '<div class="alert alert-warning" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button> Probando Probando...</div>';

		jQuery.ajax({
			type: 'POST',
			dataType :  'html',
			success: jQuery('#content').html(alerta_error)
		});
	}

	function finish() {

		var preg_contest = 0;
		var preg_not_contest = 0;
		var resp_user = new Array();

		
		var idsPreg = jQuery('#ids_preg').val().split(";;");

		var id_sim = jQuery('#id_sim').val();

		for(var i = 0; i<idsPreg.length; ++i){
			
			if ( jQuery('#opcA'+idsPreg[i]).prop('checked') ) {
				resp_user[i] = 1;
				++ preg_contest;
			}else if ( jQuery('#opcB'+idsPreg[i]).prop('checked')) {
				resp_user[i] = 2;
				++ preg_contest;
			}else if ( jQuery('#opcC'+idsPreg[i]).prop('checked') ) {
				resp_user[i] = 3;
				++ preg_contest;
			}else if ( jQuery('#opcD'+idsPreg[i]).prop('checked') ) {
				resp_user[i] = 4;
				++ preg_contest;
			}else{
				resp_user[i] = 0;
				++ preg_not_contest;
			}
		}

		var valores = 	'id_sim='+id_sim+
						'&ids_preg='+JSON.stringify(idsPreg)+
						'&resp_user='+JSON.stringify(resp_user)+
						'&preg_contest='+preg_contest+
						'&preg_not_contest='+preg_not_contest;

		//alert(valores);
		
		jQuery.ajaxSetup({
			headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')}
		});

		jQuery.ajax({
			url:jQuery('#urlEstad').val(),
			type: "post",
			dataType :  "html",
			data: valores,
			success: function ( data ){
				jQuery("#c_preg").html(data);
			}, 
			beforeSend: function () {


				var alert = '<div class="flex-center position-ref full-height" style="text-align: center; margin-top: 25%; margin-button: 25%;">';
	            alert = alert + '<div class="content">';
	            alert = alert + '<div class="title m-b-md">';
	            alert = alert + '<img class="brand-img" width="250px" src="images/loading.gif" alt="brand"/>';
	            alert = alert + '</div>';
	            alert = alert + '<div class="links">';
	            alert = alert + 'Espera un momento! Estamos trabajando en tu solicitud.<br><br>';
	            
	            alert = alert + '</div>';
	            alert = alert + '</div>';
	        	alert = alert + '</div>';

				$("#c_preg").html(alert);
			}
		});
	}


	/* Reportes Personales */

	function repoTuto(){

		var valores = 'id_tem=repoTuto';

		jQuery.ajaxSetup({
			headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')}
		});

		jQuery.ajax({
			url:jQuery('#urlRepoTut').val(),
			type: "post",
			dataType :  "html",
			data: valores,
			success: function ( data ){
				jQuery("#content").html(data);
			}
		});
	}

	function repoSimu(){

		var valores = 'id_tem=repoSimu';

		jQuery.ajaxSetup({
			headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')}
		});

		jQuery.ajax({
			url:jQuery('#urlRepoSim').val(),
			type: "post",
			dataType :  "html",
			data: valores,
			success: function ( data ){
				jQuery("#content").html(data);
			}
		});
	}

/* 
	- FUNCIONES ADMINISTRADOR 
*/

// Administracion de Usuarios

	function amdUser(id_adm){

		var valores = 'id_adm='+id_adm;

		jQuery.ajaxSetup({
			headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')}
		});

		jQuery.ajax({
			url:jQuery('#urlUsr').val(),
			type: "post",
			dataType :  "html",
			data: valores,
			success: function ( data ){
				jQuery("#contentAMD").html(data);
			}
		});
	}

	function newUser(id_adm){

		var valores = 'id_adm='+id_adm;

		jQuery.ajaxSetup({
			headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')}
		});
		
		jQuery('#modalAdmin').modal('show');

		jQuery.ajax({
			url:jQuery('#urlNewUsr').val(),
			type: "post",
			dataType :  "html",
			data: valores,
			success: function ( data ){
				jQuery("#bodyEdit").html(data);
			}
		});
	}

	function SaveNewUser(id_adm){

		var newName = jQuery('#name').val();
		var newEmail = jQuery('#email').val();
		var newPass = jQuery('#password').val();
		var ConfirmNewPass = jQuery('#conpassword').val();

		var newCedula = jQuery('#cedula').val();
		var newEnt = jQuery('#selEnts').val();
		var newPerf = jQuery('#selPerfs').val();

		var valores = 'newName='+newName+'&newEmail='+newEmail+'&newPass='+newPass+'&ConfirmNewPass='+ConfirmNewPass+'&newCedula='+newCedula+'&newEnt='+newEnt+'&newPerf='+newPerf;

		jQuery.ajaxSetup({
			headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')}
		});

		jQuery.ajax({
			url:jQuery('#urlNewUsrSV').val(),
			type: "post",
			dataType :  "html",
			data: valores,
			success: function ( data ){
				jQuery("#bodyEdit").html(data);
				amdUser(id_adm);
			}
		});
	}

	function editUser(id_usr){

		var valores = 'id_usr='+id_usr;

		jQuery.ajaxSetup({
			headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')}
		});
		
		jQuery('#modalAdmin').modal('show');

		jQuery.ajax({
			url:jQuery('#urlEdUsr').val(),
			type: "post",
			dataType :  "html",
			data: valores,
			success: function ( data ){
				jQuery("#bodyEdit").html(data);
			}
		});
	}

	function saveEditUser(id_usr){

		var newName = jQuery('#name').val();
		var newEmail = jQuery('#email').val();
		var newCedula = jQuery('#cedula').val();
		var newEnt = jQuery('#selEnts').val();
		var newPerf = jQuery('#selPerfs').val();

		var valores = 'id_usr='+id_usr+'&newName='+newName+'&newEmail='+newEmail+'&newCedula='+newCedula+'&newEnt='+newEnt+'&newPerf='+newPerf;

		jQuery.ajaxSetup({
			headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')}
		});

		jQuery.ajax({
			url:jQuery('#urlSaveEdUsr').val(),
			type: "post",
			dataType :  "html",
			data: valores,
			success: function ( data ){
				jQuery("#bodyEdit").html(data);
			}
		});
	}

	function saveRestaurUser(id_usr){

		var valores = 'id_usr='+id_usr;

		jQuery.ajaxSetup({
			headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')}
		});

		jQuery.ajax({
			url:jQuery('#urlResP').val(),
			type: "post",
			dataType :  "html",
			data: valores,
			success: function ( data ){
				jQuery("#bodyEdit").html(data);
			}
		});
	}

	function deleteUser(id_usr){

		var valores = 'id_usr='+id_usr;

		jQuery.ajaxSetup({
			headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')}
		});

		jQuery('#modalAdmin').modal('show');

		jQuery.ajax({
			url:jQuery('#urlElUsr').val(),
			type: "post",
			dataType :  "html",
			data: valores,
			success: function ( data ){
				jQuery("#bodyEdit").html(data);
			}
		});
	}

// Administracion de Entidades

	function amdEnt(id_adm){

		var valores = 'id_adm='+id_adm;

		jQuery.ajaxSetup({
			headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')}
		});

		jQuery.ajax({
			url:jQuery('#urlEnt').val(),
			type: "post",
			dataType :  "html",
			data: valores,
			success: function ( data ){
				jQuery("#contentAMD").html(data);
			}
		});
	}

	function newEnt(id_adm){

		var valores = 'id_adm='+id_adm;

		jQuery.ajaxSetup({
			headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')}
		});
		
		jQuery('#modalAdmin').modal('show');

		jQuery.ajax({
			url:jQuery('#urlNewEnt').val(),
			type: "post",
			dataType :  "html",
			data: valores,
			success: function ( data ){
				jQuery("#bodyEdit").html(data);
			}
		});
	}

	function SaveNewEnt(id_adm){

		var newName = jQuery('#name').val();
		var newNit = jQuery('#nit').val();
		var newDominio = jQuery('#dom').val();
		var newLicencia = jQuery('#lice').val();
		var newTipEnt = jQuery('#selTipEnts').val();
		
		var valores = 'id_adm='+id_adm+'&newName='+newName+'&newNit='+newNit+'&newDominio='+newDominio+'&newLicencia='+newLicencia+'&newTipEnt='+newTipEnt;

		jQuery.ajaxSetup({
			headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')}
		});

		jQuery.ajax({
			url:jQuery('#urlNewEntSV').val(),
			type: "post",
			dataType :  "html",
			data: valores,
			success: function ( data ){
				jQuery("#bodyEdit").html(data);
				amdEnt(id_adm);
			}
		});
	}

	function editEnt(id_adm, id_ent){

		var valores = 'id_adm='+id_adm+'&id_ent='+id_ent;

		jQuery.ajaxSetup({
			headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')}
		});

		jQuery('#modalAdmin').modal('show');

		jQuery.ajax({
			url:jQuery('#urlEdEnt').val(),
			type: "post",
			dataType :  "html",
			data: valores,
			success: function ( data ){
				jQuery("#bodyEdit").html(data);
			}
		});
	}

	function saveEditEnt(id_adm, id_ent){

		var newName = jQuery('#name').val();
		var newNit = jQuery('#nit').val();
		var newDominio = jQuery('#dom').val();
		var newLicencia = jQuery('#lice').val();
		var newTipEnt = jQuery('#selTipEnts').val();
		
		var valores = 'id_adm='+id_adm+'&id_ent='+id_ent+'&newName='+newName+'&newNit='+newNit+'&newDominio='+newDominio+'&newLicencia='+newLicencia+'&newTipEnt='+newTipEnt;

		jQuery.ajaxSetup({
			headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')}
		});

		jQuery.ajax({
			url:jQuery('#urlSaveEdEnt').val(),
			type: "post",
			dataType :  "html",
			data: valores,
			success: function ( data ){
				jQuery("#bodyEdit").html(data);
				amdEnt(id_adm);
			}
		});
	}

	function deleteEnt(id_adm, id_ent){

		var valores = 'id_ent='+id_ent;

		jQuery.ajaxSetup({
			headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')}
		});

		jQuery('#modalAdmin').modal('show');

		jQuery.ajax({
			url:jQuery('#urlElEnt').val(),
			type: "post",
			dataType :  "html",
			data: valores,
			success: function ( data ){
				jQuery("#bodyEdit").html(data);
				amdEnt(id_adm);
			}
		});
	}

// Activación productos

	function activProductos(){

		var valores = 'Por enviar algo';

		jQuery.ajaxSetup({
			headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')}
		});

		jQuery.ajax({
			url:jQuery('#urlProduc').val(),
			type: "post",
			dataType :  "html",
			data: valores,
			success: function ( data ){
				jQuery("#contentAMD").html(data);
			}
		});
	}

	function activProductosSave(){

		var EmailUser = jQuery('#correo').val();
		var CedulaUser = jQuery('#cedula').val();
		var ProdActiv = jQuery('#selProd').val();
		
		var valores = 'EmailUser='+EmailUser+'&CedulaUser='+CedulaUser+'&ProdActiv='+ProdActiv;

		jQuery.ajaxSetup({
			headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')}
		});

		jQuery('#modalAdmin').modal('show');

		jQuery.ajax({
			url:jQuery('#urlSaveAsigProduct').val(),
			type: "post",
			dataType :  "html",
			data: valores,
			success: function ( data ){
				jQuery("#bodyEdit").html(data);
			}
		});
	}
// Reportes de los modulos

	function repoSims(){

		jQuery.ajaxSetup({
			headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')}
		});

		var valores = 'env=0';

		jQuery.ajax({
			url:jQuery('#urlRepoSim').val(),
			type: "post",
			dataType :  "html",
			data: valores,
			success: function ( data ){
				jQuery("#contentAMD").html(data);
			}
		});
	}

	function RepoSimOpc(){
		
		var fechNull = 0;
		var msjError = '<div class="alert alert-danger alert-bordered pd-y-20" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><div class="d-flex align-items-center justify-content-start"><i class="icon ion-ios-close alert-icon tx-52 tx-danger mg-r-20"></i><div><h5 class="mg-b-2 tx-danger">Upss algo ha ocurrido!</h5><p class="mg-b-0 tx-gray">Es necesario establecer un rango de fechas adecuado.</p></div></div></div>';

		jQuery.ajaxSetup({
			headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')}
		});

		if( jQuery('#fechIni').val().length == 0) fechNull ++;
		if( jQuery('#fechFin').val().length == 0) fechNull ++;

		if(fechNull == 0){

			var valores = 	'fechIni='+jQuery('#fechIni').val()+
							'&fechFin='+jQuery('#fechFin').val()+
							'&selSim='+jQuery('#selSim').val();

			jQuery.ajax({
				url: jQuery('#urlRepoSimOpc').val(),
				type: "post",
				dataType :  "html",
				data: valores,
				success: function ( data ){
					jQuery("#tabResult").html(data);
				}
			});

		}else jQuery('#divMsj').html(msjError);
	}

	function detaRepoSim(id_log, id_usr, id_sim){

		jQuery.ajaxSetup({
			headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')}
		});

		var valores = 'id_log='+id_log+'&id_usr='+id_usr+'&id_sim='+id_sim;

		jQuery('#modalAdminLg').modal('show');

		jQuery.ajax({
			url:jQuery('#urlDetRepoSim').val(),
			type: "post",
			dataType :  "html",
			data: valores,
			success: function ( data ){
				jQuery("#bodyEditLg").html(data);
			}
		});
	}

	function repoTuts(){

		jQuery.ajaxSetup({
			headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')}
		});

		var valores = 'env=0';

		jQuery.ajax({
			url:jQuery('#urlRepoTuto').val(),
			type: "post",
			dataType :  "html",
			data: valores,
			success: function ( data ){
				jQuery("#contentAMD").html(data);
			}
		});

	}

	function RepoTuto(){

		var fechNull = 0;
		var msjError = '<div class="alert alert-danger alert-bordered pd-y-20" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><div class="d-flex align-items-center justify-content-start"><i class="icon ion-ios-close alert-icon tx-52 tx-danger mg-r-20"></i><div><h5 class="mg-b-2 tx-danger">Upss algo ha ocurrido!</h5><p class="mg-b-0 tx-gray">Es necesario establecer un rango de fechas adecuado.</p></div></div></div>';

		jQuery.ajaxSetup({
			headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')}
		});

		if( jQuery('#fechIni').val().length == 0) fechNull ++;
		if( jQuery('#fechFin').val().length == 0) fechNull ++;

		if(fechNull == 0){

			var valores = 	'fechIni='+jQuery('#fechIni').val()+
							'&fechFin='+jQuery('#fechFin').val()+
							'&selTut='+jQuery('#selTut').val();

			jQuery.ajax({
				url: jQuery('#urlRepoSimOpc').val(),
				type: "post",
				dataType :  "html",
				data: valores,
				success: function ( data ){
					jQuery("#tabResult").html(data);
				}
			});

		}else  	
	}

	function detaRepoTut(id_log, id_usr, id_tut){

		jQuery.ajaxSetup({
			headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')}
		});

		var valores = 'id_log='+id_log+'&id_usr='+id_usr+'&id_tut='+id_tut;

		jQuery('#modalAdminLg').modal('show');

		jQuery.ajax({
			url:jQuery('#urlDetRepoTut').val(),
			type: "post",
			dataType :  "html",
			data: valores,
			success: function ( data ){
				jQuery("#bodyEditLg").html(data);
			}
		});
	}

// Reporte ventas

	function repoVents(){

		jQuery.ajaxSetup({
			headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')}
		});

		var valores = 'repo=ventas';

		//jQuery('#modalAdminLg').modal('show');

		jQuery.ajax({
			url:jQuery('#urlRepoVents').val(),
			type: "post",
			dataType :  "html",
			data: valores,
			success: function ( data ){
				jQuery("#contentAMD").html(data);
			}
		});
	}
// Carga Carro
	function carShop(){
		jQuery.ajaxSetup({
			headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')}
		});

		var valores = 'env=0';

		jQuery.ajax({
			url:jQuery('#urlShop').val(),
			type: "post",
			dataType :  "html",
			data: valores,
			success: function ( data ){
				jQuery("#content").html(data);
			}
		});
	}

	function addCar(idProdAdd){
		
		if(jQuery('#CarShop').val() != 0)
			var pr_add = jQuery('#CarShop').val()+'::'+idProdAdd;
		else 
			var pr_add = idProdAdd;

		jQuery('#CarShop').val(pr_add);
	}

	function change(){

		var valores = 'idsProds='+jQuery('#CarShop').val();
		
		jQuery.ajaxSetup({
			headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')}
		});

		jQuery('#modalMasterLg').modal('show');

		jQuery.ajax({
			url:jQuery('#urlShopCar').val(),
			type: "post",
			dataType :  "html",
			data: valores,
			success: function ( data ){
				jQuery("#bodyModLg").html(data);
			}
		});
	}

	function envPay(){

		var valores = 
			'idsProds='+jQuery('#CarShop').val()+
			'&merchantId='+jQuery("#merchantId").val()+
			'&accountId='+jQuery("#accountId").val()+
			'&description='+jQuery("#description").val()+
			'&amount='+jQuery("#amount").val()+
			'&tax='+jQuery("#tax").val()+
			'&taxReturnBase='+jQuery("#taxReturnBase").val()+
			'&currency='+jQuery("#currency").val()+
			'&test='+jQuery("#test").val()+
			'&buyerEmail='+jQuery("#buyerEmail").val()+
			'&buyerFullName='+jQuery("#buyerFullName").val()+
			'&responseUrl='+jQuery("#responseUrl").val()+
			'&confirmationUrl='+jQuery("#confirmationUrl").val();


		jQuery.ajax({
			url:jQuery('#urlEnvPay').val(),
			type: "post",
			dataType :  "html",
			data: valores,
			success: function ( data ){
				jQuery("#bodyModLg").html(data);
			}
		});
	}

/*
	- Funcion en donde se realizan los envios POST 
	- GUIAS
*/ 
 
	function carga_guia(id_gui){

		var valores = 'id_gui='+id_gui;

		jQuery.ajaxSetup({
			headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')}
		});

		jQuery("#btn-comenzar").text('Comenzar');

		jQuery.ajax({
			url:jQuery('#urlGuia').val(),
			type: "post",
			dataType :  "html",
			data: valores,
			success: function ( data ){
				jQuery("#content").html(data);
				//clockTut();
			}
		});
	}

/* Actualizar Pass */

	function saveNewPass(){


		var valores = 'email='+jQuery('#emailNew').val()+'&pass='+jQuery('#passwordNew').val();
		
		jQuery.ajaxSetup({
			headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')}
		});

		jQuery.ajax({
			url:jQuery('#urlNewPas').val(),
			type: "post",
			dataType :  "html",
			data: valores,
			success: function ( data ){
				jQuery("#bodyModLg").html(data);
			}
		});
	}
	

