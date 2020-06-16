<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/','Controller@Connect'); 

Route::post('/','ControllerConnect@postConnect');

Route::get('/bureau', 'ControllerBureau@getBureau');

Route::post('/bureau', 'ControllerBureau@postBureau');

Route::get('/ajoutUser', 'ControllerAjoutUser@getAjoutUser');

Route::post('/ajoutUser', 'ControllerAjoutUser@postAjoutUser');

Route::get('/homeAdmin','ControllerShareFile@getAdmin'); 

Route::get('/chargerFichier','ControllerShareFile@getCharger'); 

Route::post('/chargerFichier','ControllerShareFile@postAdmin'); 

Route::get('/aide','ControllerShareFile@getAide');

Route::get('/etatMandats','ControllerEtatMandats@getEtat'); 

Route::post('/etatMandats','ControllerEtatMandats@postEtat');

Route::get('/rapportEtat','ControllerEtatMandats@getRapportEtat');

Route::get('/newProfil','ControllerAjoutUser@getNewProfil');

Route::post('/newProfil','ControllerAjoutUser@postNewProfil');

Route::get('/changerMotPasse','ControllerAjoutUser@getNewMDP');

Route::post('/changerMotPasse','ControllerAjoutUser@postNewMDP');

Route::get('/changerMotPasseG','ControllerAjoutUser@getNewMDPG');

Route::post('/changerMotPasseG','ControllerAjoutUser@postNewMDP');

Route::get('/changerMotPasseC','ControllerAjoutUser@getNewMDPC');

Route::post('/changerMotPasseC','ControllerAjoutUser@postNewMDP');

Route::get('/changerMotPasseA','ControllerAjoutUser@getNewMDPA');

Route::post('/changerMotPasseA','ControllerAjoutUser@postNewMDP');


Route::get('/homeAgent','ControllerAgent@getAgent');

Route::get('/payer','ControllerPayer@getPayer');

Route::post('/payer','ControllerAgent@postAgent');

Route::get('/piece','ControllerPayer@getPiece');

Route::post('/piece','ControllerPayer@payer');

Route::get('/numeroPiece','ControllerPayer@getNumeroPiece');

Route::post('/numeroPiece','ControllerPayer@payer');

Route::get('/homeChefAgence','ControllerChefAgence@getChefAgence');

Route::get('/payer2','ControllerPayer@getPayer2');

Route::post('/payer2','ControllerAgent@postAgence');
//Route::post('/payer2','ControllerPayer@getPiece');


Route::get('/annuler','ControllerPayer@getAnnuler');

Route::post('/annuler','ControllerPayer@annuler');

Route::get('/rapport1','ControllerAgent@rapportja');

Route::get('/rapport2','ControllerAgent@getRapport2');

Route::get('/rapport2_1','ControllerAgent@getRapport2_1');

Route::post('/rapport2_1','ControllerAgent@postRapport2');

Route::post('/rapport2','ControllerAgent@postRapport2');

Route::get('/rapport3','ControllerChefAgence@rapportjAgence');

Route::get('/rapportPAgence','ControllerChefAgence@getRapportPAgence');

Route::post('/rapportPAgence','ControllerChefAgence@postRapportPAgence');


Route::get('/homeGestionnaire','Controller@getGestionnaire');

Route::post('/homeGestionnaire','ControllerShareFile@postAdmin');

Route::get('/chargerFichierG','Controller@getChargerG');

Route::post('/chargerFichierG','ControllerShareFile@postAdmin');

Route::get('/rapportGlobal','Controller@rapportJournalierG');

Route::get('/formRapportGlobal','Controller@getFormRapportGlobal');

Route::post('/formRapportGlobal','Controller@postRapportPeriodiqueG');

Route::get('/rapportImpaye','ControllerEtatMandats@getRapportImpaye');

Route::get('/journalAnnulation','ControllerEtatMandats@getJournalAnnulation');

Route::get('/choixBureau','Controller@getChoixBureau');

Route::post('/choixBureau','Controller@postChoixBureau');

Route::get('/choixBureauP','Controller@getChoixBureauP');

Route::post('/choixBureauP','Controller@postChoixBureauP');

Route::get('deconnecter','Controller@deconnecter');

