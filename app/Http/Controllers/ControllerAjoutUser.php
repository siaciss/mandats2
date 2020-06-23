<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ControllerAjoutUser extends Controller
{
    //
  public function getAjoutUser(){
    #$m=\Session::get('matricule');
    #if ($m) {
      $b = DB::table('bureaus')->select('adresse')->get();
      \Session::put('bureaux',$b);
      return view('ajoutUser');
    #}
    #else {
      #return \Redirect::to('/')->with('erreurDB','Veillez vous connectez');
    #}
  }

  public function getNewProfil(){
    $m=\Session::get('matricule');
    if ($m) {
      return view('newProfil');
    }
    else {
      return \Redirect::to('/')->with('erreurDB','Veillez vous connectez');
    }
  }

  public function getNewMDP(){
    $m=\Session::get('matricule');
    if ($m) {
      return view('changerMotPasse');
    }
    else {
      return \Redirect::to('/')->with('erreurDB','Veillez vous connectez');
    }
  }

  public function getNewMDPG(){
    $m=\Session::get('matricule');
    if ($m) {
      return view('changerMotPasseG');
    }
    else {
      return \Redirect::to('/')->with('erreurDB','Veillez vous connectez');
    }
  }

  public function getNewMDPC(){
    $m=\Session::get('matricule');
    if ($m) {
      return view('changerMotPasseC');
    }
    else {
      return \Redirect::to('/')->with('erreurDB','Veillez vous connectez');
    }
  }

  public function getNewMDPA(){
    $m=\Session::get('matricule');
    if ($m) {
      return view('changerMotPasseA');
    }
    else {
      return \Redirect::to('/')->with('erreurDB','Veillez vous connectez');
    }
  }

  public function postAjoutUser(Request $request){
   $this->validate($request, [
    'matricule' => 'required',
    'nom' => 'required',
    'prenom' => 'required',
    'password' => 'required|min:4',
    'statut' => 'required',
    'bureau' => 'required',
  ]);

   $b=request('bureau');

   try {
     $numB = DB::table('bureaus')->select('numBureau')->where('adresse',$b)->first();
   } 
   catch (\Illuminate\Database\QueryException $ex) {
     return back()->with('erreurDB',$ex->getMessage());
   }

   $user=new \App\User;
   $user->matricule=request('matricule');
   $user->nom=request('nom');
   $user->prenom=request('prenom');
   $user->password=request('password');
   $user->statut=request('statut');
   $user->numBureau=$numB->numBureau;
   try{
     $user->save();
   }
   catch(\Illuminate\Database\QueryException $ex)
   { 
     return back()->with('erreurDB',$ex->getMessage()); 
                         // Note any method of class PDOException can be called on $ex.
   }


   return \Redirect::to('/ajoutUser')->with('message','Inscription reussie');
 }

 public function postNewProfil(Request $request){
  $m=\Session::get('matricule');
  if ($m) {
    $this->validate($request, [
      'login' => 'required',
      'statut' => 'required',
    ]);

    $log = request('login');
    $stat = request('statut');

    $user = DB::table('users')->select('matricule','statut')->where('matricule',$log)->first();

    if (empty($user)) {
      return back()->with('erreurDB','login incorrect');
    }
    elseif ($user->statut == $stat) {
      return back()->with('erreurDB','statut non changé');
    }
    else{
      try{
        \App\User::where('matricule',$log)
        ->update(['statut' => $stat]);
      }
      catch(\Illuminate\Database\QueryException $ex)
      { 
        return back()->with('erreurDB',$ex->getMessage()); 
      }
      return back()->with('success','Le profil de l"utilisateur a été changé');
    }
  }
  else {
    return \Redirect::to('/')->with('erreurDB','Veillez vous connectez');
  }
}

public function postNewMDP(Request $request){
  $m=\Session::get('matricule');
  if ($m) {
    $this->validate($request, [
      'newMdp' => 'required|min:4',
      'oldMdp' => 'required|min:4',
      'confirm' => 'required|same:newMdp',
    ]);

    $mdp = request('newMdp');
    $old = request('oldMdp');

    $user = DB::table('users')->select('matricule','password')->where('matricule',$m)->first();

    if (empty($user)) {
      return \Redirect::to('/')->with('erreurDB','Veillez vous connectez');
    }
    else{
      #dd($user);

      if ($user->password == $old) {    

        try{
          \App\User::where('matricule',$m)
          ->update(['password' => $mdp]);
        }
        catch(\Illuminate\Database\QueryException $ex)
        { 
          return back()->with('erreurDB',$ex->getMessage()); 
        }
        return back()->with('success','Votre Mot de passe est changé');
      }
      else
      {
        return back()->with('erreurDB','Votre ancien mot de passe est incorrect');
      }
    }
  }
  else {
    return \Redirect::to('/')->with('erreurDB','Veillez vous connectez');
  }
}


}
