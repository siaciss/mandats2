<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Migrations\Migration;
use DB;
use Excel;
use Exception;

class ControllerShareFile extends Controller
{
    //
	public function getAdmin(){
		$data = DB::table('mandats')->orderBy('matOrph')->get();
		return view('homeAdmin',compact('data'));
	}


	public function getCharger(){
		$data = DB::table('mandats')->orderBy('matOrph')->get();
		return view('chargerFichier',compact('data'));
	}

	public function getAide(){
		return view('aide');
	}	

	public function postAdmin(Request $request){
		$this->validate($request, [
			'fichier' => 'required|mimes:xlsx,xls',        
		]);

		$path=$request->file('fichier')->getRealPath();
		$data = Excel::load($path)->get();
		//$data = Excel::load($path)->toArray();
		$d = date('Y-m-d');
		//return $data;

		if (!empty($data) && $data->count()) {
			foreach ($data as $key => $value) 				
			{    
				if ($value->n == null) {
					//return $value;
						unset($data[$key]);
					}
			}
			//return $data; 
			foreach ($data as $key => $value) 				
			{    
						$mandat = new \App\mandat;
						$mandat->matOrph = $value->matricule;
						$mandat->prenomTuteur = $value->prenomtuteur;
						$mandat->nomTuteur = $value->nomtuteur;
						$mandat->beneficiaire = $value->orphelin;
						$mandat->montant = $value->total - 1200;
						$mandat->etat = 'EMIS';	
						$mandat->dateEmission = $d;											

					try{										
						$mandat->save();
					}
					catch(\Illuminate\Database\QueryException $ex)
					{ 
						return back()->with('erreurDB',$ex->getMessage()); 
					}
					//}	

				}
				$c = DB::table('mandats')->select(DB::raw('count(*) as nbMandat, sum(montant) as somm'))->where('dateEmission',$d)->get();	
			}
		    if ($c[0]->nbMandat==0) {
		    	return back()->with('erreurDB','Chargement non effectué, veuillez vérifier le fichier');
		    }
			return back()->with('success',$c[0]->nbMandat . ' mandats chargés avec un montant de '. $c[0]->somm . ' Francs Cfa au total' );   	
		}
	}
