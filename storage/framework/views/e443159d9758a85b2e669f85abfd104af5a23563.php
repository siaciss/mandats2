</br>
</br>
</br>
    <div class="row" style="margin-top: 5%"> 
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

        <h5><marquee align="center" class="text-secondary text-20 mb-3"> Changement de mon mot de passe: 4 caractéres au moins </marquee></h5>
    
    <form method="POST" class="text-secondary">
          <?php echo e(csrf_field()); ?>

          <div class="row">
          <label for="inputAncMdp" class="col-sm-3 ml-5 col-form-label">Ancien</label>
          <div class="form-group col-7">
            <input type="password" class="form-control" name="oldMdp" placeholder="ancien mot de passe" required>
          </div>
          </div>

          <div class="row">
          <label for="inputNewMdp" class="col-sm-3 ml-5 col-form-label">Nouveau</label>
          <div class="form-group col-7">
            <input type="password" class="form-control" name="newMdp" placeholder="nouveau mot de passe" required>
          </div>
          </div>

          <div class="row">
          <label for="inputConfirm" class="col-sm-3 ml-5 col-form-label">Confirmer</label>
          <div class="form-group col-7">
            <!-- <input type="range" class="form-control-range mt-5 mb-2" name="range"> Veuillez donner un mot de passe de 4 caractéres au moins -->     
            <input type="password" class="form-control" name="confirm" placeholder="confirmer le nouveau mot de passe" required>
          </div>
          </div>          

          <div class="form-group row">
          <div class="col-sm-4"></div>
          <div class="col-sm-3">
            <button type="submit" class="btn btn-sm btn-block btn-secondary" style="border-radius: 21px;">Changer</button>
          </div>
        </div>
        </form>

      </div>
    </div>
  </div> 
