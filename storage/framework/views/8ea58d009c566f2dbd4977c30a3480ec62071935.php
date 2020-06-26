<?php $__env->startSection('contenu'); ?>

    <div class="row" style="margin-top: 10%"> 
    <div class="col-3"> </div>  
    <div class="col-6 my-5 mx-5 border" style="border-radius: 10px;">
      <div class="wrap-log mt-3">

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

        <h5><marquee align="center" class="text-secondary text-20"> Veillez Renseigner le matricule du mandataire </marquee></h5>

        
    <form method="POST">
          <?php echo e(csrf_field()); ?>

          <div class="row">
          <div class="col-2"> </div>
          <div class="form-group col-8">
            <!-- <input type="range" class="form-control-range mt-5 mb-2" name="range"> -->     
            <input type="text" class="form-control form-control-lg" name="matricule" placeholder="donner un matricule" required>
          </div>
          </div>

          <div class="form-group row">
          <div class="col-sm-4"></div>
          <div class="col-sm-3">
            <button type="submit" class="btn btn-sm btn-block btn-secondary" style="border-radius: 21px;">Annuler</button>
          </div>
        </div>
        </form>

      </div>
    </div>
  </div> 
  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutChefAgence', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>