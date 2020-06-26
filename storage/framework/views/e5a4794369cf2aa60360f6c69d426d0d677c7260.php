</html><!DOCTYPE html>
<html>
<head>
  <meta chqrset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
  <title>Mandats</title>

  <link href="css\bootstrap.min.css" rel="stylesheet" />   
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">    
  <style type="text/css">
  .container-log {
    width: 100%;  
    min-height: 100vh;
    justify-content: center;
    align-items: center;
    padding: 15px;
    background-repeat: no-repeat;
    background-position: center; 
    background-size: cover; 
    position: relative; 
    z-index: 1; 
  } 

  .container-log::before {
    content: "";
    display: block;
    position: absolute;
    z-index: -1; 
    width: 100%;
    height: 100%;
    top: 0;
    left: 0; 
  background-color: rgba(55,55,255,0.1); 
} 

</style>
</head>

<body class="container-log" style="background-image: url('img/mainAuOrphelin.jpg');">

  <nav class="navbar fixed-top navbar-expand-sm navbar-dark" style="background-color: rgba(5, 51, 127);">
    <div class="container-fluid">
      <a class="navbar-brand py-0" href="#"><img src="img\poste.jpg" width="160" height="50" class="d-inline-block align-top" alt="" style="border-radius: 35px;"></a>      
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">

          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(URL::action('ControllerChefAgence@getChefAgence')); ?>">Accueil</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(URL::action('ControllerPayer@getPayer2')); ?>">Effectuer payement</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(URL::action('ControllerPayer@getAnnuler')); ?>">Annuler payement</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
            Rapports  </a>
            <div class="dropdown-menu">
              <a target="_blank" class="dropdown-item" href="<?php echo e(URL::action('ControllerAgent@rapportja')); ?>">Mon Rapport Journalier</a>
              <a class="dropdown-item" href="<?php echo e(URL::action('ControllerAgent@getRapport2_1')); ?>">Mon Rapport Periodique</a>
              <a target="_blank" class="dropdown-item" href="<?php echo e(URL::action('ControllerChefAgence@rapportjAgence')); ?>">Rapport Journalier Agence</a>
              <a class="dropdown-item" href="<?php echo e(URL::action('ControllerChefAgence@getRapportPAgence')); ?>">Rapport Periodique Agence</a>
            </div>
          </li>
        </ul>
      </div>

      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          Mon Compte  </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="<?php echo e(URL::action('Controller@deconnecter')); ?>">Se Deconnecter</a>
            <a class="dropdown-item" href="<?php echo e(URL::action('ControllerAjoutUser@getNewMDPC')); ?>">Mot de passe</a>                    
          </div>
        </li>
      </ul>            
    </div>
  </nav>

</br>
</br>
</br>

<div class="row">
  
<div class="container-fluid row align-items-center " style="height:100%; margin-top: 15%">
  <h2 class="display-1 col "><marquee> GESTION DES MANDATS POUR ORPHELIN </marquee></h2>
</div>


    <script src="js/jquery-slim.min.js" ></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </body>

  </html>