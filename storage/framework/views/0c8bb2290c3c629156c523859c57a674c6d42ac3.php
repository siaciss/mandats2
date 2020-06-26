  <br>
  <br>
  <br>
  <div class="row" style="margin-top: 5%"> 
    <div class="col-3"> </div>  
    <div class="col-6 my-5 mx-5 border bg-secondary" style="border-radius: 10px;">
      <div class="wrap-log mt-3">

        <h3 align="center" class="text-dark"> <marquee> Choisissez le fichier à charger </marquee> </h3>

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

        <form method="POST" enctype="multipart/form-data">
          <?php echo e(csrf_field()); ?>

          <div class="form-group inputf mx-4">
            <!-- <input type="range" class="form-control-range mt-5 mb-2" name="range"> -->     
            <input type="file" class="form-control-file form-control-lg" name="fichier">
          </div>

          <div class="form-group row">
          <div class="col-sm-4"></div>
          <div class="col-sm-3">
          <div class="form-group">
            <button type="submit" class="btn btn-block btn-sm " style="border-radius: 21px; color: #0f056b">Charger</button>
          </div>
          </div>
        </div>

        </form>

      </div>
    </div>
  </div>
