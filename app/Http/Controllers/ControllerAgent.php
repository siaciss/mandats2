<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use PDF;

class ControllerAgent extends Controller
{
	public function getAgent(){
    	$m=\Session::get('matricule');
    	if ($m) {
    		return view('homeAgent');
    	}
		else {
			return \Redirect::to('/')->with('erreurDB','Veillez vous connectez');
		}
	}

	public function getRapport2(){
		return view('rapport2');
	}

	public function getRapport2_1(){
		return view('rapport2_1');
	}

	public function postAgent(Request $request){
		$this->validate($request,[
			'matricule'=>'required|numeric'
		]);
		 \Session::put('data',null);

		#return $data = \Session::get('data');

		$mat = request('matricule');
		$mat=$mat+0;
		/*$d1= date("Y-m-d");
		$d2= date("2020-05-05");
		dd(abs(strtotime($d1)-strtotime($d2)));*/
		if ($mat!=0) {			
			try{
				$data = DB::table('mandats')->select('matOrph','nomTuteur','prenomTuteur','beneficiaire','etat',DB::raw('SUM(montant) as montant'))->groupBy('matOrph','nomTuteur','prenomTuteur','beneficiaire','etat')->havingRaw('matOrph = ?', [$mat])->get();
			}
			catch(\Illuminate\Database\QueryException $ex)
			{ 
				return back()->with('erreurDB',$ex->getMessage()); 
			}

			if (empty($data[0])) {
				return back()->with('erreurDB','Ce mandat n"existe pas');
			}
			#dd($data); ->with('success','Vérifiez les informations du mandat')
			foreach ($data as $key => $value) {
				if ($value->etat == 'EMIS') {
					\Session::put('data',$value);
					\Session::put('success','Vérifiez les informations du mandat');
					$page='numeroPiece';
					return redirect()->intended($page);
					#dd($value);
					#redirect()->intended('piece');

				}
			}
			return back()->with('erreurDB','Le mandat est déja payé');				
		}
		else
			return back()->with('erreurDB','Le matricule fourni n est pas valide');

	}



	public function postAgence(Request $request){
		$this->validate($request,[
			'matricule'=>'required|numeric'
		]);
		 \Session::put('data',null);

		#return $data = \Session::get('data');

		$mat = request('matricule');
		$mat=$mat+0;
		/*$d1= date("Y-m-d");
		$d2= date("2020-05-05");
		dd(abs(strtotime($d1)-strtotime($d2)));*/
		if ($mat!=0) {			
			try{
				$data = DB::table('mandats')->select('mandats.matOrph','nomTuteur','prenomTuteur','beneficiaire','etat',DB::raw('SUM(montant) as montant'))->groupBy('matOrph','nomTuteur','prenomTuteur','beneficiaire','etat')->havingRaw('matOrph = ?', [$mat])->get();
			}
			catch(\Illuminate\Database\QueryException $ex)
			{ 
				return back()->with('erreurDB',$ex->getMessage()); 
			}

			if (empty($data[0])) {
				return back()->with('erreurDB','Ce mandat n"existe pas');
			}
			#dd($data); ->with('success','Vérifiez les informations du mandat')
			foreach ($data as $key => $value) {
				if ($value->etat == 'EMIS') {
					\Session::put('data',$value);
					\Session::put('success','Vérifiez les informations du mandat');
					$page='piece';
					return redirect()->intended($page);
					#dd($value);
					#redirect()->intended('piece');

				}
			}
			return back()->with('erreurDB','Le mandat est déja payé');				
		}
		else
			return back()->with('erreurDB','Le matricule fourni n est pas valide');

	}


	public function rapportja(){

		$matr=\Session::get('matricule');
    	if ($matr) {
		$datr=date('Y-m-d');

		try{
			$dataraj= DB::table('mandats')->select('matOrph','nomTuteur','prenomTuteur','beneficiaire','montant','datePayement')->where('matAgt',$matr)->where('datePayement',$datr)->get();

			$aj=DB::table('users')->select('users.nom','users.prenom')->where('users.matricule',$matr)->first();
			
		}
		catch(\Illuminate\Database\QueryException $ex)
		{ 
			return back()->with('erreurDB',$ex->getMessage()); 
 						 // Note any method of class PDOException can be called on $ex.  
		}
		\Session::put('data',$dataraj);
		\Session::put('infoAgent',$aj);
		set_time_limit (6000);
		$pdf = PDF::loadView('rapport1');
		return $pdf->setPaper('a4')->stream('monRapportJournalier.pdf');
    	}
		else {
			return \Redirect::to('/')->with('erreurDB','Veillez vous connectez');
		}


	}

	public function postRapport2(Request $request){

		$matr=\Session::get('matricule');

    	if ($matr) {
		$this->validate($request, [
			'date1'=>'required',
			'date2'=>'required',
		]);

		$datr1=request('date1');
		$datr2=request('date2');
				
		try{
			$dataraj= DB::table('mandats')->select('matOrph','nomTuteur','prenomTuteur','beneficiaire','montant','datePayement')->where('matAgt',$matr)->whereBetween('datePayement',[$datr1,$datr2])->orderBy('datePayement')->get();

			$aj=DB::table('users')->select('users.nom','users.prenom')->where('users.matricule',$matr)->first();
			
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
		$pdf = PDF::loadView('rapport1');
		return $pdf->setPaper('a4')->stream('monRapportPeriodique.pdf');
    	}
		else {
			return \Redirect::to('/')->with('erreurDB','Veillez vous connectez');
		}


	}

}
