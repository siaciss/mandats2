<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;

class ControllerPayer extends Controller
{

	public function getPayer()
	{
		$m=\Session::get('matricule');
		if ($m) {
			return view('payer');
		}
		else {
			return \Redirect::to('/')->with('erreurDB','Veillez vous connectez');
		}
	}

	public function getPayer2()
	{
		$m=\Session::get('matricule');
		if ($m) {
			return view('payer2');
		}
		else {
			return \Redirect::to('/')->with('erreurDB','Veillez vous connectez');
		}
	}

	public function getAnnuler()
	{
		$m=\Session::get('matricule');
		if ($m) {			
			return view('annuler');
		}
		else {
			return \Redirect::to('/')->with('erreurDB','Veillez vous connectez');
		}
	}

	public function getPiece(){
		$m=\Session::get('matricule');
		if ($m) {		
			return view('piece');
		}
		else {
			return \Redirect::to('/')->with('erreurDB','Veillez vous connectez');
		}
	}

	public function getNumeroPiece(){
		$m=\Session::get('matricule');
		if ($m) {		
			return view('numeroPiece');
		}
		else {
			return \Redirect::to('/')->with('erreurDB','Veillez vous connectez');
		}
	}


	public function payer(Request $request){
		$matric=\Session::get('matricule');
		if ($matric) {
			$this->validate($request,[
				'carte'=>'required|digits:13'
			]);

			#$carte = $_GET['carte'];
			#$carte = '123456677';
			$carte=request('carte');
			#$carte = \Session::get('carte');
			#return $carte;
			$data = \Session::get('data');
			\Session::put('carte',$carte);			
			
			try{
				\App\mandat::where('matOrph',$data->matOrph)
				->where('etat','EMIS')
				->update(['matAgt' => $matric,
					'datePayement' => date('Y-m-d'),
					'etat' => 'PAYE']);

				$aj=DB::table('users')->join('bureaus','users.numBureau','=','bureaus.numBureau')->select('users.matricule','users.nom','users.prenom','bureaus.adresse')->where('users.matricule',$matric)->first();

			}
			catch(\Illuminate\Database\QueryException $ex)
			{ 
				return back()->with('erreurDB',$ex->getMessage()); 
			}

				//$data = DB::table('mandats')->select()->where('matOrph',$matri)->first();
			\Session::put('infoAgent',$aj);
			set_time_limit (6000);
			$pdf = PDF::loadView('facture'); 
			return $pdf->setPaper('a4')->stream('Recu.pdf');
		}
		else {
			return \Redirect::to('/')->with('erreurDB','Veillez vous connectez'); 
		}

	}

	public function annuler(Request $request){

		$m=\Session::get('matricule');
		if ($m) {

			$this->validate($request,[
				'matricule'=>'required|numeric'
			]);

			$mat = request('matricule');

			try{
			$data2 = DB::table('mandats')->select()->where('matOrph',$mat)->where('etat','EMIS')->first();
			}
			catch(\Illuminate\Database\QueryException $ex)
			{ 
				return back()->with('erreurDB',$ex->getMessage()); 
			}

			if (!empty($data2)) {
				return back()->with('erreurDB','Le mandat n"est pas encore payé');
			}					


			try{
				$dp = DB::table('mandats')->where('matOrph',$mat)->max('datePayement');
				$data = DB::table('mandats')->select('matOrph','nomTuteur','prenomTuteur','beneficiaire','etat','matAgt','datePayement',DB::raw('SUM(montant) as montant'))->groupBy('matOrph','nomTuteur','prenomTuteur','beneficiaire','etat','matAgt','datePayement')->havingRaw('matOrph = ?', [$mat])->havingRaw('datePayement = ?',[$dp])->get();
			}
			catch(\Illuminate\Database\QueryException $ex)
			{ 
				return back()->with('erreurDB',$ex->getMessage()); 
			}

			if (empty($data[0])) {
				return back()->with('erreurDB','Le matricule fourni n"est pas valide');
			}

			if ($data[0]->etat == 'PAYE') {
				try{

					$annul = new \App\journalAnnulation;
					$annul->matOrph = $data[0]->matOrph;
					$annul->nomTuteur = $data[0]->nomTuteur;
					$annul->prenomTuteur = $data[0]->prenomTuteur;
					$annul->beneficiaire = $data[0]->beneficiaire;
					$annul->montant = $data[0]->montant;
					$annul->matAgtPayeur = $data[0]->matAgt;
					$annul->matAgtAnnulateur = $m;
						#$annul->dateEmission = $data[0]->dateEmission;
					$annul->datePayement = $data[0]->datePayement;
					$annul->dateAnnulation = date('Y-m-d');
					$annul->heureAnnulation = date('H:i:s');
					$annul->save();

					\App\mandat::where('matOrph',$mat)
					->where('datePayement',$data[0]->datePayement)						
					->update(['matAgt' => null,
						'datePayement' => null,
						'etat' => 'EMIS']);

				}
				catch(\Illuminate\Database\QueryException $ex)
				{ 
					return back()->with('erreurDB',$ex->getMessage()); 
				}

				return back()->with('success','Annulation effectuer avec succes');
			}

		}
		else {
			return \Redirect::to('/')->with('erreurDB','Veillez vous connectez');
		}

	}

}

//session()->flash('msg', 'Successfully done the operation.');