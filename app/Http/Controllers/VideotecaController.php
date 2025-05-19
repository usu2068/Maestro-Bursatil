<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\modelos\entidades_sub_videoteca;
use \App\modelos\videos_videoteca;
use \App\modelos\videoteca_categoria;
use \App\modelos\videos_vedeoteca;

/**
 * Controlador para gestionar la videoteca, permitiendo la visualización
 * de categorías, listas de videos y la reproducción de videos específicos.
 */
class VideotecaController extends Controller{
    /**
     * Muestra la página principal de la videoteca según la entidad seleccionada.
     *
     * @param Request $data
     * @return \Illuminate\View\View
     */
    public function index(Request $data){

    	$id_ent = $data->id_ent;
    	$entidad = entidades_sub_videoteca::where([ 'id'=>$id_ent ])->first();

    	$categos = videoteca_categoria::all();

		 // Si no se encuentra la entidad, muestra la vista de acceso denegado.
    	if(empty($entidad)) return view('acces_deneged'); 
    	else return view('circle', compact('categos', 'entidad'));
    	

    }

	/**
     * Lista los videos pertenecientes a una categoría específica.
     *
     * @param Request $data
     * @return \Illuminate\View\View
     */

    public function list_vid( Request $data ){

    	$vids_cat = videos_vedeoteca::where([ 'id_categoria' => $data->id_cat ])->get();

    	return view('video_list', compact('vids_cat'));
    }

	/**
     * Muestra un video específico y actualiza su contador de reproducciones.
     *
     * @param Request $data
     * @return \Illuminate\View\View
     */

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

/**
 * NOTA:
 * $categos = videoteca_categoria::all();
 * está utilizando Eloquent ORM de Laravel para obtener todos los registros de la tabla asociada al modelo videoteca_categoria.
 * ::all(): Es un método estático proporcionado por Eloquent que recupera todos los registros de la tabla correspondiente. Devuelve una colección
 */