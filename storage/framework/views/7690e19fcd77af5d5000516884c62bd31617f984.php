<!DOCTYPE html>
<!DOCTYPE html>
<html lang="fr">
<head>
	
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- ==================
		================== -->
		<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<!-- ==================
		=================== -->
		<title>Mandats</title>
		<link href="css\bootstrap.min.css" rel="stylesheet" />	 
		<link href="css\fontawesome-all.css" rel="stylesheet" />   
		<link href="css\style.css" rel="stylesheet">


	</head>
	<body>

		<div class="limite container-log" style="background-image: url('img/poste.jpg');">
			<!-- style="background-image: url('img/mandat.jpg');" --> 
			<div class="container-log">
				<div class="wrap-log pb-4 pt-2">

					<span class="log-form-title pb-4 mb-5 text-secondary">
						<marquee>Veillez Vous Connectez</marquee>					
					</span>

					<!-- message en cas d'erreurs de validation -->
					<?php if($errors->any()): ?>
					<div class="alert alert-danger">
						<ul>
							<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<button type="button" class="close" data-dismiss="alert">
								x
							</button>

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

					<!-- message en cas de deconnection -->
					<?php if(session()->has('message')): ?>
					<div class="alert alert-block">
						<button type="button" class="close" data-dismiss="alert">
							x
						</button>
						<h5 style="color: rgb(5, 51, 127); text-align: center;">
							<?php echo e(session()->get('message')); ?>

						</h5>
					</div>
					<?php endif; ?> 


					<form method="POST" class="log-form pb-3 pt-2 mt-5 border " style="border-radius: 10px;">
						<?php echo e(csrf_field()); ?>


						<div class="wrap-input">
							<input class="inputf " type="text" name="matricule" placeholder="Login" required>
						</div>
						<div class="wrap-input">						
							<input class="inputf " type="password" name="password" placeholder="Mot de passe" required>
						</div>
						<div class="container-log-form-btn mt-3">
							<button class="control log-form-btn btn-secondary">
								Connecter
							</button> 
						</div>					
					</form>
				</div>
			</div>
		</div>

		<script src="js/jquery-slim.min.js" ></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
	</html>