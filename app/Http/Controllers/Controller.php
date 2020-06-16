<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use DB;
use PDF;

//use App\Http\Requests\formRequest;

class Controller extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function Connect(){
		return view('connection');
	}

	public function deconnecter()
	{
		\Session::forget('matricule');	
		\Session::forget('bureaux');		
		\Auth::logout();
		return \Redirect::to('/')->with('message','Vous venez de vous déconnecter');
	}

	public function getGestionnaire()
	{
		$m=\Session::get('matricule');
		if ($m) {
			return view('homeGestionnaire');
		}
		else {
			return \Redirect::to('/')->with('erreurDB','Veillez vous connectez');
		}
	}

	public function getChargerG()
	{
		$m=\Session::get('matricule');
		if ($m) {
			return view('chargerFichierG');
		}
		else {
			return \Redirect::to('/')->with('erreurDB','Veillez vous connectez');
		}
	}


	public function getFormRapportGlobal()
	{
		$m=\Session::get('matricule');
		if ($m) {
			return view('formRapportGlobal');
		}
		else {
			return \Redirect::to('/')->with('erreurDB','Veillez vous connectez');
		}
	}

	public function getChoixBureau()
	{
		$m=\Session::get('matricule');
		if ($m) {
			$b = DB::table('bureaus')->select('adresse')->get();
			\Session::put('bureaux',$b);
			return view('choixBureau');
		}
		else {
			return \Redirect::to('/')->with('erreurDB','Veillez vous connectez');
		}
	}

		public function getChoixBureauP()
	{
		$m=\Session::get('matricule');
		if ($m) {
			$b = DB::table('bureaus')->select('adresse')->get();
			\Session::put('bureaux',$b);
			return view('choixBureauP');
		}
		else {
			return \Redirect::to('/')->with('erreurDB','Veillez vous connectez');
		}
	}


	public function rapportJournalierG()
	{		

		$datr=date('Y-m-d');

		try{
			
			$dataraj = DB::table('mandats')->join('users','mandats.matAgt','=','users.matricule')->join('bureaus','users.numBureau','=','bureaus.numBureau')->select('mandats.matOrph','mandats.nomTuteur','mandats.prenomTuteur','mandats.beneficiaire','mandats.montant','users.nom','users.prenom','bureaus.adresse','mandats.datePayement')->where('datePayement',$datr)->orderBy('bureaus.adresse')->get();
			// DB::table('mandats')->select('matOrph','nomTuteur','prenomTuteur','beneficiaire','montant','datePayement')->where('matAgt',$matr)->where('datePayement',$datr)->get();

			//$aj=DB::table('users')->join('bureaus','users.numBureau','=','bureaus.numBureau')->select('users.nom','users.prenom','bureaus.adresse')->where('users.matricule',$matr)->first();
			
		}
		catch(\Illuminate\Database\QueryException $ex)
		{ 
			return back()->with('erreurDB',$ex->getMessage()); 
 						 // Note any method of class PDOException can be called on $ex.  
		}
		\Session::put('data',$dataraj);	
		set_time_limit (6000);	
		$pdf = PDF::loadView('rapportGlobal');
		return $pdf->setPaper('a4')->stream('RapportJournalierAgence.pdf');

	}

	public function postRapportPeriodiqueG(Request $request){

		$this->validate($request, [
			'date1'=>'required',
			'date2'=>'required',
		]);
		
		$datr1=request('date1');
		$datr2=request('date2');

		try{
			
			$dataraj = DB::table('mandats')->join('users','mandats.matAgt','=','users.matricule')->join('bureaus','users.numBureau','=','bureaus.numBureau')->select('mandats.matOrph','mandats.nomTuteur','mandats.prenomTuteur','mandats.beneficiaire','mandats.montant','users.nom','users.prenom','bureaus.adresse','mandats.datePayement')->whereBetween('datePayement',[$datr1,$datr2])->orderBy('bureaus.adresse')->orderBy('datePayement')->get();			
			
		}
		catch(\Illuminate\Database\QueryException $ex)
		{ 
			return back()->with('erreurDB',$ex->getMessage()); 
 						 // Note any method of class PDOException can be called on $ex.  
		}
		\Session::put('data',$dataraj);
		\Session::put('date1',$datr1);
		\Session::put('date2',$datr2);
		set_time_limit (6000);
		$pdf = PDF::loadView('rapportGlobal');
		return $pdf->setPaper('a4')->stream('RapportJournalierAgence.pdf');
	}

	public function postChoixBureau(Request $request){
		$m=\Session::get('matricule');
		if ($m) {

			$this->validate($request, [
			'bureau'=>'required',
		]);
		
		$b=request('bureau');
		$datr=date('Y-m-d');

		try{

			$dataraj = DB::table('mandats')->join('users','mandats.matAgt','=','users.matricule')->join('bureaus','users.numBureau','=','bureaus.numBureau')->select('mandats.matOrph','mandats.nomTuteur','mandats.prenomTuteur','mandats.beneficiaire','mandats.montant','users.nom','users.prenom','mandats.datePayement')->where('datePayement',$datr)->where('bureaus.adresse',$b)->get();
		}
		catch(\Illuminate\Database\QueryException $ex)
		{ 
			return back()->with('erreurDB',$ex->getMessage()); 
		}
		\Session::put('data',$dataraj);
		\Session::put('agence',$b);
		set_time_limit (6000);
		$pdf = PDF::loadView('rapportAgence');
		return $pdf->setPaper('a4')->stream('RapportJournalierAgence.pdf');			
		}
		else {
			return \Redirect::to('/')->with('erreurDB','Veillez vous connectez');
		}
	}

		public function postChoixBureauP(Request $request){
		$m=\Session::get('matricule');
		if ($m) {

			$this->validate($request, [
			'date1'=>'required',
			'date2'=>'required',
			'bureau'=>'required',
		]);
		
		$datr1=request('date1');
		$datr2=request('date2');
		$b=request('bureau');

		try{

			$dataraj = DB::table('mandats')->join('users','mandats.matAgt','=','users.matricule')->join('bureaus','users.numBureau','=','bureaus.numBureau')->select('mandats.matOrph','mandats.nomTuteur','mandats.prenomTuteur','mandats.beneficiaire','mandats.montant','users.nom','users.prenom','mandats.datePayement')->whereBetween('datePayement',[$datr1,$datr2])->where('bureaus.adresse',$b)->get();
		}
		catch(\Illuminate\Database\QueryException $ex)
		{ 
			return back()->with('erreurDB',$ex->getMessage()); 
		}
		\Session::put('data',$dataraj);
		\Session::put('agence',$b);
		\Session::put('date1',$datr1);
		\Session::put('date2',$datr2);
		set_time_limit (6000);
		$pdf = PDF::loadView('rapportAgence');
		return $pdf->setPaper('a4')->stream('RapportJournalierAgence.pdf');			
		}
		else {
			return \Redirect::to('/')->with('erreurDB','Veillez vous connectez');
		}
	}



}
