<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerBureau extends Controller
{
    //
    public function getBureau(){
    	return view('bureau');
    }

    public function postBureau(Request $request){
    	$this->validate($request, [
            'numero' => 'required|numeric',
            'adresse' => 'required',
        ]);

    	$buro=new \App\bureau;
    	$buro->numBureau=request('numero');
    	$buro->adresse=request('adresse');
        try{
           $buro->save();
       }
       catch(\Illuminate\Database\QueryException $ex)
       { 
           return back()->with('erreurDB',$ex->getMessage()); 
                         // Note any method of class PDOException can be called on $ex.
       }


       return \Redirect::to('/bureau')->with('message','Inscription reussie');
   }
}
