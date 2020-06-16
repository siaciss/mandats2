<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;

class ControllerEtatMandats extends Controller
{
	public function getEtat(){	
		$data=null;	
		 \Session::put('data',null);
		return view('etatMandats');
	}

	public function getRapportEtat(){
		set_time_limit (6000);
		$pdf = PDF::loadView('rapportEtat'); 
		return $pdf->setPaper('a4')->stream('etatMandat.pdf');
	}

	public function postEtat(Request $request){		
		$this->validate($request,[
			'matricule' => 'required',
		]);

		$mat=request('matricule');
        //return $mat;
		
		if ($mat =='tous')
		{   
			try{
				$data = DB::table('mandats')->orderBy('matOrph')->get();
			}
			catch(\Illuminate\Database\QueryException $ex)
			{ 
				return back()->with('erreurDB',$ex->getMessage()); 
 						 // Note any method of class PDOException can be called on $ex.
			}
			\Session::put('data',$data);
			return view('etatMandats');				
		}
		else
		{	
			$mat=$mat+0;
			if ($mat!=0) {			
				try{
					$data = DB::table('mandats')->select()->where('matOrph',$mat)->get();				
				}
				catch(\Illuminate\Database\QueryException $ex)
				{ 
					return back()->with('erreurDB',$ex->getMessage()); 
 						 // Note any method of class PDOException can be called on $ex.
				}

				\Session::put('data',$data);
				return view('etatMandats');				
			}
			else
				return back()->with('erreurDB','Le matricule fourni n est pas valide');			
		}	
	}

	public function getRapportImpaye(){
					set_time_limit (6000);
		$m=\Session::get('matricule');
		if ($m) {
			try{
				$data = DB::table('mandats')->orderBy('matOrph')->where('etat','EMIS')->get();
			}
			catch(\Illuminate\Database\QueryException $ex)
			{ 
				return back()->with('erreurDB',$ex->getMessage()); 
			}
			\Session::put('data',$data);
			$pdf = PDF::loadView('rapportImpaye');
			return $pdf->setPaper('a4')->stream('Impayes.pdf');

		}
		else {
			return \Redirect::to('/')->with('erreurDB','Veillez vous connectez');
		}

	}

	public function getJournalAnnulation(){
		$m=\Session::get('matricule');
		if ($m) {
			try {
				$data = DB::table('journalannulations')->join('mandats','journalannulations.matOrph','=','mandats.matOrph')->join(DB::raw('users as user1'),'journalannulations.matAgtPayeur','=','user1.matricule')->join(DB::raw('users as user2'),'journalannulations.matAgtAnnulateur','=','user2.matricule')->select('journalannulations.matOrph','journalannulations.nomTuteur','journalannulations.prenomTuteur','journalannulations.beneficiaire','journalannulations.montant',DB::raw('user1.nom as nom1'),DB::raw('user1.prenom as prenom1'),'journalannulations.datePayement',DB::raw('user2.nom as nom2'),DB::raw('user2.prenom as prenom2'),'journalannulations.dateAnnulation','journalannulations.heureAnnulation')->where('mandats.etat','EMIS')->get();

			} catch (\Illuminate\Database\QueryException $ex) {
				return back()->with('erreurDB',$ex->getMessage());
			}
			\Session::put('data',$data);
			set_time_limit (6000);
			$pdf = PDF::loadView('journalAnnulation');
			return $pdf->setPaper('a4')->stream('journalAnnulation.pdf');
		}
		else {
			return \Redirect::to('/')->with('erreurDB','Veillez vous connectez');
		}
	}
}
