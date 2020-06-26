</html><!DOCTYPE html>
<html>
<head>
  
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
  <title>Mon Rapport </title>
   <link href="css\bootstrap.min.css" rel="stylesheet"/> 
      
  <link hrel="stylesheet" href="css\style.css">   

</head>

<body style="margin-left: 6%; ">

<?php if($data = Session::get('data')): ?>
<?php $m=0; $a = Session::get('infoAgent') ?>
<?php $d=date('d-m-Y'); $t=date('H:i:s') ?>

  <div class="row">
  
  <div class="panel panel-default col-11" align="center">

<?php if($d1=Session::get('date1') and $d2=Session::get('date2')): ?>
        <table class="table">
          <tr>
            <td><img src="img\poste.jpg" width="130" height="70" class="d-inline-block " alt=""></td>
            <td class="text-right font-weight-bold"><h5 class="align-rigth">Du <?php echo e($d1); ?> <br> au <?php echo e($d2); ?> </h5></td>
          </tr>
        </table>
        <br>
    <div class="panel-heading">
        <h2 class="panel-title mb-5 font-weight-bold text-center" align="center"> Rapport de payement périodique <br> de <?php echo e($a->prenom); ?> <?php echo e($a->nom); ?> </h2>
        <?php \Session::put('date1',null);
         \Session::put('date2',null); ?>
    </div>
       <?php else: ?>
        <table class="table">
          <tr>
            <td><img src="img\poste.jpg" width="130" height="70" class="d-inline-block " alt=""></td>
            <?php $d=date('d-m-Y'); ?>
            <td class="text-right font-weight-bold"><h5 class="align-rigth">Le <?php echo e($d); ?></h5></td>
          </tr>
        </table>
        <br>
    <div class="panel-heading">
       <h2 class="panel-title mb-5 font-weight-bold" align="center"> Rapport de payement journalier<br> de <?php echo e($a->prenom); ?> <?php echo e($a->nom); ?> </h2>
    </div>
       <?php endif; ?>
 
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
            <th>Date de payement</th>            
          </tr> 
          </thead>
          <tbody>         
          <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php $m = $m+$row->montant ?>
          <tr>
            <td><?php echo e($row->matOrph); ?></td>
            <td><?php echo e($row->prenomTuteur); ?></td>
            <td><?php echo e($row->nomTuteur); ?></td>
            <td><?php echo e($row->beneficiaire); ?></td>
            <td><?php echo e($row->montant); ?></td>                        
            <td><?php echo e($row->datePayement); ?></td>           
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
          </tbody>                                           
        </table> 
        <h5 class="text-left font-weight-bold">Nombre de beneficiaires payés: <?php echo e(count($data)); ?></h5>
           	<h5 class="text-left font-weight-bold">Montant total: <?php echo e($m); ?></h5>      
      </div>     
    </div>   
  </div>
</div>
<?php \Session::put('data',null); \Session::put('infoAgent',null); ?>
  <?php endif; ?>

	<script src="js/jquery-slim.min.js" ></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>