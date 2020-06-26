  
  <?php $__env->startSection('contenu'); ?>

  <div class="row"> 
    <div class="col-3"> </div>  
    <div class="col-6 my-5 mx-5 border" style="border-radius: 10px; background-color: rgba(108,117,125,0.1);">
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
<!--        <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">
            x
          </button>
          <strong><?php echo e($message); ?></strong>
        </div>
        <?php endif; ?> -->

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
            <button type="submit" class="btn btn-sm btn-block btn-secondary" style="border-radius: 21px;">Rechercher</button>
          </div>
        </div>
        </form>

      </div>
    </div>
  </div>

<?php if($data = Session::get('data')): ?>
<?php $m=0; $p=0; $nm=0; $np=0?>
<div class="row">
<div class="col-1"></div>
  <div class="panel panel-default col-10">
    <div class="panel-heading">
      <a class="table-bordered" target="_blank" href="<?php echo e(URL::action('ControllerEtatMandats@getRapportEtat')); ?>">Telecharger</a>
      <h3 class="panel-title" align="center"> tableau des données </h3>
    </div>
    <div class="panel-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <thead class="thead-primary text-white" style="background-color: rgba(5, 51, 127);">         
          <tr>
            <th>Matricule Orphelin</th>
            <th>Prenom Tuteur</th>
            <th>Nom Tuteur</th>
            <th>Nom et Prenom</th>
            <th>Net A Payer</th>
            <th>Etat</th>            
          </tr> 
          </thead>
          <tbody>         
          <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($row->etat == 'EMIS'): ?>
          <?php $m = $m+$row->montant; $nm = $nm+1 ?> 
          <?php elseif($row->etat == 'PAYE'): ?>
           <?php $p = $p+$row->montant; $np = $np+1?> 
          <?php endif; ?>       
          <tr>
            <td><?php echo e($row->matOrph); ?></td>
            <td><?php echo e($row->prenomTuteur); ?></td>
            <td><?php echo e($row->nomTuteur); ?></td>
            <td><?php echo e($row->beneficiaire); ?></td>
            <td><?php echo e($row->montant); ?></td>
            <td><?php echo e($row->etat); ?></td>            
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
          </tbody>                                   
        </table>    
        <h5 class="text-left font-weight-bold">Nombre de mandats payés: <?php echo e($np); ?></h5>
            <h5 class="text-left font-weight-bold">Montant total des mandats payés: <?php echo e($p); ?></h5>      
        <h5 class="text-left font-weight-bold">Nombre de mandats impayés: <?php echo e($nm); ?></h5>
            <h5 class="text-left font-weight-bold">Montant total des mandats payés: <?php echo e($m); ?></h5>      
      </div>     
    </div>   
  </div>
</div>
<?php \Session::put('data',null) ?>
  <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutAdmin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>