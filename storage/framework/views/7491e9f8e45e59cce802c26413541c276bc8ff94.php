  <div class="row" style="margin-top: 10%"> 
    <div class="col-3"> </div>     
    <div class="col-6 border" style="border-radius: 10px;">   
      <h3 align="center" class="text-secondary mb-4"> la période du rapport </h3>    
      <div class="wrap-log">

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

          <div class="form-inline item-center" style="margin-left: 15%">
            <!-- <input type="range" class="form-control-range mt-5 mb-2" name="range"> -->
            <span class="mx-3"> Du </span>     
            <input type="date" class="form-control mr-5" name="date1">
            <span> au </span>
            <input type="date" class="form-control ml-3" name="date2">
          </br></br>
          </div>

        <div class="form-group row my-3">
          <div class="col-sm-4"></div>
          <div class="col-sm-3 ml-4">
            <button OnClick="window.document.forms[0].target='_blank';" type="submit" class="btn btn-sm btn-block btn-secondary" style="border-radius: 21px;">Editer</button>
          </div>
        </div>
      </form>

    </div>
  </div>
</div> 
