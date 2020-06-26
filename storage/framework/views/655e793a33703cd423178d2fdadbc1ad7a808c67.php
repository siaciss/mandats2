<?php $__env->startSection('contenu'); ?>
  <div class="row"> 
  <div class="col-sm-3"> </div>
  <div class="container-fluid col-sm-6 my-5 mx-5 item-center border" style="border-radius: 10px; ">
    <div class="wrap-log">   

      <!-- message en cas d'erreurs de validation -->
      <?php if($errors->any()): ?>
            <div class="alert alert-danger">
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
      <?php if(session()->has('message')): ?>
          <h5 style="color: green; text-align: center;">
            <?php echo e(session()->get('message')); ?>

          </h5>
      <?php endif; ?> 

      <form method="POST" class="ml-5 my-3">
        <?php echo e(csrf_field()); ?>

        <div class="form-group row">
          <label for="inputMatricule" class="col-sm-2 col-form-label">Login</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="matricule" placeholder="Login" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputNom" class="col-sm-2 col-form-label">Nom</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="nom" placeholder="Nom" required>
          </div>
        </div>         
        <div class="form-group row">
          <label for="inputPrenom" class="col-sm-2 col-form-label">Prenom</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="prenom" placeholder="Numero du Bureau" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputMdp" class="col-sm-2 col-form-label">Mot de passe</label>
          <div class="col-sm-8">
            <input type="password" class="form-control" name="password" placeholder="Mot de passe" required>
          </div>
        </div> 
        <div class="form-group row">
          <label for="inputStatut" class="col-sm-2 col-form-label">Statut</label>
          <div class="col-sm-8">
            <select name="statut" class="form-control">
              <option selected>admin</option>
              <option>gestionnaire</option>
              <option>chefagence</option>
              <option>caissier</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputBuro" class="col-sm-2 col-form-label">Bureau</label>
          <div class="col-sm-8">
            <?php $b=Session::get('bureaux'); ?>
            <select name="bureau" class="form-control">
              <?php $__currentLoopData = $b; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <option> <?php echo e($row->adresse); ?> </option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <!--<input type="text" class="form-control" name="numBureau" placeholder="Numero du Bureau"> -->
          </div>
        </div>          
        
        <div class="form-group row">
          <div class="col-sm-4"></div>
          <div class="col-sm-3">
            <button type="submit" class="btn btn-sm btn-block btn-secondary" style="border-radius: 21px;">Ajouter</button>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutAdmin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>