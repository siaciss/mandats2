<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;

class ControllerChefAgence extends Controller
{
    public function getChefAgence(){
    	$m=\Session::get('matricule');
    	if ($m) {
    		return view('homeChefAgence');
    	}
		else {
			return \Redirect::to('/')->with('erreurDB','Veillez vous connectez');
		}
    }

    public function getRapportPAgence(){
    	return view('rapportPAgence');
    }

    public function rapportjAgence(){

		$matr=\Session::get('matricule');
    	if ($matr) {

		$datr=date('Y-m-d');

		try{
			$aj=DB::table('users')->join('bureaus','users.numBureau','=','bureaus.numBureau')->select('bureaus.adresse')->where('users.matricule',$matr)->first();

			$dataraj = DB::table('mandats')->join('users','mandats.matAgt','=','users.matricule')->join('bureaus','users.numBureau','=','bureaus.numBureau')->select('mandats.matOrph','mandats.nomTuteur','mandats.prenomTuteur','mandats.beneficiaire','mandats.montant','users.nom','users.prenom','mandats.datePayement')->where('datePayement',$datr)->where('bureaus.adresse',$aj->adresse)->get();
		}
		catch(\Illuminate\Database\QueryException $ex)
		{ 
			return back()->with('erreurDB',$ex->getMessage()); 
		}
		\Session::put('data',$dataraj);
		\Session::put('infoAgent',$aj);
		set_time_limit (6000);
		$pdf = PDF::loadView('rapport3');
		return $pdf->setPaper('a4')->stream('RapportJournalierAgence.pdf');

    	}
		else {
			return \Redirect::to('/')->with('erreurDB','Veillez vous connectez');
		}

	}

	public function postRapportPAgence(Request $request){

		$matr=\Session::get('matricule');
    	if ($matr) {

		$this->validate($request, [
			'date1'=>'required',
			'date2'=>'required',
		]);

		$datr1=request('date1');
		$datr2=request('date2');
		
		try{
			$aj=DB::table('users')->join('bureaus','users.numBureau','=','bureaus.numBureau')->select('bureaus.adresse')->where('users.matricule',$matr)->first();

			$dataraj = DB::table('mandats')->join('users','mandats.matAgt','=','users.matricule')->join('bureaus','users.numBureau','=','bureaus.numBureau')->select('mandats.matOrph','mandats.nomTuteur','mandats.prenomTuteur','mandats.beneficiaire','mandats.montant','users.nom','users.prenom','mandats.datePayement')->whereBetween('datePayement',[$datr1,$datr2])->where('bureaus.adresse',$aj->adresse)->orderBy('datePayement')->get();			
			
		}
		catch(\Illuminate\Database\QueryException $ex)
		{ 
			return back()->with('erreurDB',$ex->getMessage()); 
		}
		\Session::put('data',$dataraj);
		\Session::put('date1',$datr1);
		\Session::put('date2',$datr2);
		\Session::put('infoAgent',$aj);
		set_time_limit (6000);
		$pdf = PDF::loadView('rapport3');
		return $pdf->setPaper('a4')->stream('RapportPeriodiqueAgence.pdf');

    	}
		else {
			return \Redirect::to('/')->with('erreurDB','Veillez vous connectez');
		}
	}
}
