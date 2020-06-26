<?php $__env->startSection('contenu'); ?>
</br>
</br>
</br>
<div class="row" style="margin-top: 5%"> 
    <div class="col-3"> </div>     
    <div class="col-6 mx-5 my-5 border" style="border-radius: 10px;">   
      <div class="wrap-log mt-3">

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

    <h5><marquee align="center" class="text-secondary text-20 mb-3"> Selectionnez le bureau concerné et précisez la période </marquee></h5>
      <form method="POST">
        <?php echo e(csrf_field()); ?>

      <div class="form-group row">
        <label for="inputBuro" class="col-sm-2 col-form-label ml-5">Bureau</label>
        <div class="col-sm-8">
          <?php $b=Session::get('bureaux'); ?>
          <select name="bureau" class="form-control">
            <?php $__currentLoopData = $b; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option> <?php echo e($row->adresse); ?> </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>
      </div>          

      <div class="form-group row">
        <label for="inputBuro" class="col-sm-2 col-form-label ml-5">Periode du</label>
        <div class="col-sm-8">
          <input type="date" class="form-control  mr-5 " name="date1">
        </div>
      </div>   

      <div class="form-group row">
        <span class="col-sm-2 col-form-label ml-5"> Au </span>  
        <div class="col-sm-8">
          <input type="date" class="form-control  mr-5 " name="date2">
        </div>
      </div>          

         <!-- <div class="form-inline item-center ">
            <span class="ml-5"> Periode Du </span>     
            <input type="date" class="form-control  mr-5 " name="date1">
            <span> au </span>
            <input type="date" class="form-control ml-3 " name="date2">
          </br></br>
          </div> -->

        <div class="form-group row my-3 mt-5">
          <div class="col-sm-4"></div>
          <div class="col-sm-3 ml-4">
            <button OnClick="window.document.forms[0].target='_blank';" type="submit" class="btn btn-sm btn-block btn-secondary" style="border-radius: 21px;">Editer</button>
          </div>
        </div>
      </form>

    </div>
  </div>
</div> 

<?php echo $__env->make('layoutGestionnaire', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>