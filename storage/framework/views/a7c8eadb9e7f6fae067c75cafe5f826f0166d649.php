</html><!DOCTYPE html>
<html>
<head>
  <meta chqrset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
  <title>Rapport Mandats Impayés</title>
   <link href="css\bootstrap.min.css" rel="stylesheet"/> 
      
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
        <h2 class="panel-title mb-5 font-weight-bold text-center" align="center"> Rapport des mandats impayés </h2>
    </div>

    <div class="panel-body">
      <div class="table-responsive">
        <table class="table table-sm table-bordered" style="font-size: 10px">
          <thead class="thead-primary text-white" style="background-color: rgba(5, 51, 127);">
          <tr>
            <th>Matricule Orphelin</th>
            <th>Prenom Tuteur</th>
            <th>Nom Tuteur</th>
            <th>Bénéficiaire</th>
            <th>Montant</th>   
          </tr>  
          </thead>
          <tbody>        
          <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($i < 100): ?>
          <?php $m = $m+$row->montant ?>
          <tr>
            <td><?php echo e($row->matOrph); ?></td>
            <td><?php echo e($row->prenomTuteur); ?></td>
            <td><?php echo e($row->nomTuteur); ?></td>
            <td><?php echo e($row->beneficiaire); ?></td>
            <td><?php echo e($row->montant); ?></td>
          </tr>
          <?php $i = $i+1 ?>
          <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
        </tbody>
        </table> 
        <h5 class="text-left font-weight-bold">Nombre de mandats impayés: <?php echo e($i); ?></h5>
           	<h5 class="text-left font-weight-bold">Montant total: <?php echo e($m); ?></h5>      
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