<?php $__env->startSection('contenu'); ?> 



<?php $__env->stopSection(); ?>
<?php echo $__env->make('homeChargeFichier', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layoutAdmin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>