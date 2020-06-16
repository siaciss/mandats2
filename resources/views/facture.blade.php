</html><!DOCTYPE html>
<html target="_blank">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge"> 
	<title>Mon Rapport </title>
	<link href="css\bootstrap.min.css" rel="stylesheet"/> 

	<link hrel="stylesheet" href="css\style.css">   

</head>

<body target="_blank">
	<?php $data = Session::get('data'); $a = Session::get('infoAgent'); $carte = Session::get('carte'); ?>

	<div class="content">
		<div class="row" style="margin-left: 10%; margin-top: 5%; margin-right: 0%">
			<div class="col-12">
				<table class="table">
					<tr>
						<td><img src="img\poste.jpg" width="130" height="70" class="d-inline-block " alt=""></td>
						<?php $d=date('d-m-Y'); $t=date('H:i:s'); ?>
						<td class="text-right font-weight-bold"><h5 class="align-rigth">Le {{ $d }} <br> à {{ $t }} </h5></td>
					</tr>
				</table>
				<div class="panel-heading mb-5">
				    <h1 class="text-center font-weight-bold"> TITRE DE PAIEMENT</h1>
				</div>
				<table class="font-weight-bold" style="font-size: 15px;">
					<tr> <td class="font-weight-light""> Le bénéficiaire : </td> <td> {{$data->matOrph}}  </td> </tr>
					<tr> <td class="font-weight-light"> sous le tuteur de : </td> <td> {{$data->prenomTuteur}} {{$data->nomTuteur}} </td> </tr>
					<tr> <td class="font-weight-light"> a reçu un montant de : </td> <td> {{$data->montant}} Franc CFA  </td> </tr>
					<tr> <td class="font-weight-light"> Prénom et nom du caissier : </td> <td> {{$a->prenom}} {{$a->nom}} </td> </tr>
					<tr> <td class="font-weight-light"> Agence : </td> <td>  {{ $a->adresse}} </td> </tr>
					
					<tr> <td>  </td> </tr>
					<tr> <td></td> <td></td> <td class="font-weight-light text-right mt-4"> Piéce d'identité : </td> <td class="mt-4">  {{ $carte}} </td> </tr>					
					<tr> <td></td> <td></td> <td class="text-right font-weight-light"> Signature: </td> </tr>
				</table>
			</div>
		</div>
			<br>
			<hr style="width:100%; border-style : dashed;">

			<div class="col-10" style="margin-left: 10%; margin-top: 5%; margin-right: 0%">
				<table class="table">
					<tr>
						<td><img src="img\poste.jpg" width="130" height="70" class="d-inline-block " alt=""></td>
						<?php $d=date('d-m-Y'); $t=date('H:i:s'); ?>
						<td class="text-right font-weight-bold"><h5 class="align-rigth">Le {{ $d }} <br> à {{ $t }} </h5></td>
					</tr>
				</table>
				<div class="panel-heading mb-5">
				    <h1 class="text-center font-weight-bold"> RECU DE PAIEMENT</h1>
				</div>
				<table class="font-weight-bold" style="font-size: 15px">
					<tr> <td class="font-weight-light"> Le bénéficiaire : </td> <td> {{$data->matOrph}}  </td> </tr>
					<tr> <td class="font-weight-light"> sous le tuteur de : </td> <td> {{$data->prenomTuteur}} {{$data->nomTuteur}} </td> </tr>
					<tr> <td class="font-weight-light"> a reçu un montant de : </td> <td> {{$data->montant}} Franc CFA  </td> </tr>
					<tr> <td class="font-weight-light"> Prénom et nom du caissier : </td> <td> {{$a->prenom}} {{$a->nom}} </td> </tr>
					<tr> <td class="font-weight-light"> Agence : </td> <td>  {{ $a->adresse}} </td> </tr>
					
					<tr> <td>  </td> </tr>	
					<tr> <td></td> <td></td> <td class="font-weight-light text-right mt-4"> Piéce d'identité : </td> <td class="mt-4">  {{ $carte}} </td> </tr>					
					<tr> <td></td> <td></td> <td class="font-weight-light text-right"> Signature: </td> </tr>
				</table>
			</div>
	</div>


	<script src="js/jquery-slim.min.js" ></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

</body>

</html>