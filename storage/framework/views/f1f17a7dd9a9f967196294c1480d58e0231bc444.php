</html><!DOCTYPE html>
<html lang="fr">
<head>
  <meta chqrset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
  <title>Mandats</title>
  <link href="css\bootstrap.min.css" rel="stylesheet" /> 

  <link hrel="stylesheet" href="css\style.css">   

</head>

<body>

  <nav class="navbar navbar-expand-sm navbar-dark bg-secondary">
    <div class="container-fluid">
      <a class="navbar-brand py-0" href="#"><img src="img\poste.jpg" width="110" height="50" class="d-inline-block align-top" alt=""></a>      

      <ul class="navbar-nav">
        <!-- Dropdown -->
        <li class="nav-item">
                      <a class="nav-link" href="<?php echo e(URL::action('ControllerShareFile@getAdmin')); ?>">Accueil</a>
                </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo e(URL::action('ControllerEtatMandats@getEtat')); ?>">Etat Mandat</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          Ajouter Objets  </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="<?php echo e(URL::action('ControllerAjoutUser@getAjoutUser')); ?>">Ajouter Utilisation</a>
            <a class="dropdown-item" href="<?php echo e(URL::action('ControllerBureau@getBureau')); ?>">Ajouter Bureau</a>                    
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./connection">Se Deconnecter</a>
        </li>
      </ul>            
    </div>
  </nav>
  
  <div class="row"> 
    <div class="col-3"> </div>  
    <div class="col-6 my-5 mx-5 border" style="border-radius: 10px;">
      <div class="wrap-log">

        <h3 align="center" class="text-secondary"> Rechercher Etat Mandat </h3>

        <!-- message en cas d'erreurs de validation -->
        <?php if(count($errors) > 0): ?>
        <div class="alert alert-danger">
         <!-- Erreur de Validation <br><br>-->
          <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
        </div>
        <?php endif; ?> 

        <!-- message en cas d'erreurs de manipulation de la base -->
       <?php if($message = Session::get('erreurDB')): ?>
        <div class="alert alert-danger alert-block">
          <button type="button" class="close" data-dismiss="alert">
            x
          </button>
          <strong><?php echo e($message); ?></strong>
        </div>
        <?php endif; ?>

        <!-- message en cas de manipulation de la base reussie -->
        <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">
            x
          </button>
          <strong><?php echo e($message); ?></strong>
        </div>
        <?php endif; ?> 

        <form method="POST">
          <?php echo e(csrf_field()); ?>

          <div class="row">
          <div class="col-2"> </div>
          <div class="form-group col-8">
            <!-- <input type="range" class="form-control-range mt-5 mb-2" name="range"> -->     
            <input type="text" class="form-control form-control-lg" name="matricule" placeholder="donner un matricule ou metter 'tous'">
          </div>
          </div>

          <div class="form-group row">
          <div class="col-sm-4"></div>
          <div class="col-sm-3">
            <button type="submit" class="btn btn-sm btn-block btn-secondary">Rechercher</button>
          </div>
        </div>
        </form>

      </div>
    </div>
  </div> 


<div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title" align="center"> tableau des données </h3>
    </div>
    <div class="panel-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <tr>
            <th>Matricule Orphelin</th>
            <th>Prenom Tuteur</th>
            <th>Nom Tuteur</th>
            <th>Nom et Prenom</th>
            <th>Net A Payer</th>
            <th>Etat</th>            
          </tr>          
          <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($row->matOrph); ?></td>
            <td><?php echo e($row->prenomTuteur); ?></td>
            <td><?php echo e($row->nomTuteur); ?></td>
            <td><?php echo e($row->beneficiaire); ?></td>
            <td><?php echo e($row->montant); ?></td>
            <td><?php echo e($row->etat); ?></td>            
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>         
             
                            
        </table>       
      </div>     
    </div>   
  </div>

  <script src="js/jquery-slim.min.js" ></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

</body>

</html>
