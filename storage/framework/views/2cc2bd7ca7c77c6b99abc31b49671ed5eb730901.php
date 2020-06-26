</html><!DOCTYPE html>
<html>
<head>
  <meta chqrset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
  <title>Rapport Mandats Annulés</title>
   <link href="css\bootstrap.min.css" rel="stylesheet"/> 
      
  <link hrel="stylesheet" href="css\style.css">   

</head>

<body style="margin-left: 6%">

<!-- message en cas d'erreurs de manipulation de la base -->
      <?php if($message = Session::get('erreurDB')): ?>
      <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">
          x
        </button>
        <strong><?php echo e($message); ?></strong>
      </div>
      <?php endif; ?>

<?php if($data = Session::get('data')): ?>
<?php $m=0; $i=0?>
<?php $d=date('d-m-Y'); $t=date('H:i:s') ?>

  <div class="row">
<div class="col-1"></div>
  <div class="panel panel-default col-11" align="center">

        <table class="table">
          <tr>
            <td><img src="img\poste.jpg" width="130" height="70" class="d-inline-block " alt=""></td>
            <td class="text-right font-weight-bold"><h5 class="align-rigth">Du <?php echo e($d); ?> <br> à <?php echo e($t); ?> </h5></td>
          </tr>
        </table>
        <br>
    <div class="panel-heading">
        <h2 class="panel-title mb-5 font-weight-bold text-center" align="center"> Rapport des mandats annulés </h2>
    </div>

    <div class="panel-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped" style="font-size: 10px">
          <tr>
            <th>Matricule Orphelin</th>
            <th>Prenom Tuteur</th>
            <th>Nom Tuteur</th>
           <!-- <th>Bénéficiaire</th> -->
            <th>Montant</th>
            <th>Agent Payeur</th>
            <th>Date Payement</th>
            <th>Annulé par</th>
            <th>Date Annulation</th>
            <th>Heure Annulation</th>
          </tr>           
          <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($row->matOrph); ?></td>
            <td><?php echo e($row->prenomTuteur); ?></td>
            <td><?php echo e($row->nomTuteur); ?></td>
           <!-- <td><?php echo e($row->beneficiaire); ?></td> -->
            <td><?php echo e($row->montant); ?></td>
            <td><?php echo e($row->prenom1); ?> <?php echo e($row->nom1); ?></td>
            <td><?php echo e($row->datePayement); ?></td>
            <td><?php echo e($row->prenom2); ?> <?php echo e($row->nom2); ?></td>
            <td><?php echo e($row->dateAnnulation); ?></td>
            <td><?php echo e($row->heureAnnulation); ?></td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
        </table> 
        <h5 class="text-left font-weight-bold">Nombre de mandats annulés: <?php echo e(count($data)); ?> <?php echo e($i); ?></h5>
      </div>     
    </div>   
  </div>
</div>
<?php \Session::put('data',null) ?>
  <?php endif; ?>

	<script src="js/jquery-slim.min.js" ></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>