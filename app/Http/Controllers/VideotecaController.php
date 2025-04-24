<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\modelos\entidades_sub_videoteca;
use \App\modelos\videos_videoteca;
use \App\modelos\videoteca_categoria;
use \App\modelos\videos_vedeoteca;

class VideotecaController extends Controller{
    //
    public function index(Request $data){

    	$id_ent = $data->id_ent;
    	$entidad = entidades_sub_videoteca::where([ 'id'=>$id_ent ])->first();

    	$categos = videoteca_categoria::all();

    	if(empty($entidad)) return view('acces_deneged'); 
    	else return view('circle', compact('categos', 'entidad'));
    	

    }

    public function list_vid( Request $data ){

    	$vids_cat = videos_vedeoteca::where([ 'id_categoria' => $data->id_cat ])->get();

    	return view('video_list', compact('vids_cat'));
    }

    public function video( Request $data ){

    	$vid = videos_vedeoteca::where([ 'id' => $data->id_vid ])->first();
    	$vid->reproducciones += 1;
    	$vid->save();

    	$categos = videoteca_categoria::all();

    	$vids_cat = videos_vedeoteca::where([ 'id_categoria' => $vid->id_categoria ])->get();

    	$num_vids_cat = $vids_cat->count();

    	//dd($num_vids_cat);

    	return view('video_videoteca', compact('vid', 'num_vids_cat', 'vids_cat', 'categos'));
    }
}
