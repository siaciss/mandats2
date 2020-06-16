<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Auth\ThrottlesLogins;

class ControllerConnect extends Controller
{
	/**
	Le trait ThrottlesLogins  est destiné à mettre en place une protection 
	contre les attaques "brute force".
	*/ 

	use ThrottlesLogins;
    //

    public function postConnect(Request $request){

    	$this->validate($request, [
        'matricule' => 'required',
        'password' => 'required|min:4',
    ]);
    	
 		$mat1=request('matricule');
 		$mdp=request('password');
   
		//$user = array('matricule' =>request('matricule'),'password' =>request('password'));
	//return $user;
		$mat = \DB::table('users')->select()->where('matricule',$mat1)->first();
		if ($mat=='') {
			return \Redirect::to('/')->with('message','matricule incorrecte');
		}
		$stat = $mat->statut;
        
        if($stat=='admin'){
			$page='homeAdmin';
		}
		elseif ($stat=='caissier') {
			\Session::put('data',null);
			$page='homeAgent';
		}
		elseif ($stat=='gestionnaire') {
			$page='homeGestionnaire';
		}
		else{
			\Session::put('data',null);
			$page='homeChefAgence';
		}

		if($mat->password==$mdp){
		 \Session::put('matricule',$mat1);
		 return redirect()->intended($page);
		}
		else return \Redirect::to('/')->with('message','mot de passe incorrecte');
	/*	if (Auth::attempt($user)) {
			return redirect()->intended('dashboard');
		
		}
		else return \Redirect::to('/')->with('message','Informations incorrectes');
*/
	}

	
	

}

