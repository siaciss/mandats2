<script type="text/javascript">
  window.open();
</script>

</br>
</br>
</br>
<div class="row" style="margin-top: 5%" id="mondialogue"> 
  <div class="col-3"> </div>  
  <div class="col-6 my-5 mx-5 border" style="border-radius: 10px;">
    <div class="wrap-log mt-3">

      <?php if(count($errors) > 0): ?>
      <div class="alert alert-danger">
       <!-- Erreur de Validation <br><br>-->
       <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li>
          <button type="button" class="close" data-dismiss="alert">
            x
          </button>
          <?php echo e($error); ?>

        </li>
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

    <h5><marquee align="center" class="text-secondary text-20"> Donnez le numéro de la piéce d'identité </marquee></h5>

    <form method="POST" class="text-secondary">
      <?php echo e(csrf_field()); ?>

      <div class="row">
        <label for="inputNumero" class="col-sm-2 col-form-label"></label>
        <div class="form-group col-7">
          <!-- <input type="range" class="form-control-range mt-5 mb-2" name="range"> -->     
          <input type="text" class="form-control" name="carte" placeholder="numéro de la piéce">
        </div>
      </div>

      <div class="form-group row">
        <div class="col-sm-5"></div>
        <div class="col-sm-3">
            <button OnClick="window.document.forms[0].target='_blank';" type="submit" class="btn btn-sm btn-block btn-secondary" style="border-radius: 21px;"> 
             Payer</button> 
        </div>
      </div>
    </form>

  </div>
</div>
</div> 

<?php if($data = Session::get('data') and Session::get('success')): ?>
<div class="row">
  <div class="col-1"></div>
  <div class="panel panel-default col-10" align="center">
    <div class="panel-heading">
      <h3 class="panel-title" align="center">  </h3>
    </div>
    <div class="panel-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <tr>
            <th>Matricule</th>
            <th>Prenom et Nom Tuteur</th>
            <th>Bénéficiaire</th>
            <th>Montant</th>
          </tr>    
          <tr>
            <td><?php echo e($data->matOrph); ?></td>
            <td><?php echo e($data->prenomTuteur); ?> <?php echo e($data->nomTuteur); ?></td>
            <td><?php echo e($data->beneficiaire); ?></td>
            <td><?php echo e($data->montant); ?></td>
            <!--<td><a class=" text-primary font-weight-bold" href="#recu" data-toggle="lightbox">PAYER</a></td>-->
            <!--<td id="updateDetails"><a target="_blank" class=" text-primary font-weight-bold" href="<?php echo e(URL::action('ControllerPayer@payer')); ?>">PAYER</a></td> -->
          </tr>
        </table>       
      </div>     
    </div>   
  </div>
</div>
<?php \Session::put('success',null); ?>
<?php endif; ?>
