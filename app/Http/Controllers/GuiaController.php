<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Html\HtmlServiceProvider;
use Illuminate\Html\FormFacade;
use Illuminate\Html\HtmlFacade;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\modelos\User;
use App\modelos\Guia;

//use App\modelos\LogAvanTuto;

class GuiaController extends Controller{
	
	function index(Request $request){

		$guis = explode(';;', $request->input("id_gui"));		
		$InfoGuia = Guia::where([ "id"=>$guis[1] ])->first();
		$ContGuia = explode(';;', $InfoGuia->issu);

		//dd($ContGuia);
		
		return view( 'guia', compact('ContGuia', 'InfoGuia') );
	}    

}
