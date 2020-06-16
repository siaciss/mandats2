</html><!DOCTYPE html>
<html>
<head>
  <meta chqrset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
  <title>Rapport Mandats Annulés</title>
   <link href="css\bootstrap.min.css" rel="stylesheet"/> 
      
  <link hrel="stylesheet" href="css\style.css">   

</head>

<body style="margin-left: 6%">

<!-- message en cas d'erreurs de manipulation de la base -->
      @if($message = Session::get('erreurDB'))
      <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">
          x
        </button>
        <strong>{{ $message }}</strong>
      </div>
      @endif

@if($data = Session::get('data'))
<?php $m=0; $i=0?>
<?php $d=date('d-m-Y'); $t=date('H:i:s') ?>

  <div class="row">
<div class="col-1"></div>
  <div class="panel panel-default col-11" align="center">

        <table class="table">
          <tr>
            <td><img src="img\poste.jpg" width="130" height="70" class="d-inline-block " alt=""></td>
            <td class="text-right font-weight-bold"><h5 class="align-rigth">Du {{ $d }} <br> à {{ $t }} </h5></td>
          </tr>
        </table>
        <br>
    <div class="panel-heading">
        <h2 class="panel-title mb-5 font-weight-bold text-center" align="center"> Rapport des mandats annulés </h2>
    </div>

    <div class="panel-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped" style="font-size: 10px">
          <tr>
            <th>Matricule Orphelin</th>
            <th>Prenom Tuteur</th>
            <th>Nom Tuteur</th>
           <!-- <th>Bénéficiaire</th> -->
            <th>Montant</th>
            <th>Agent Payeur</th>
            <th>Date Payement</th>
            <th>Annulé par</th>
            <th>Date Annulation</th>
            <th>Heure Annulation</th>
          </tr>           
          @foreach($data as $row)
          <tr>
            <td>{{ $row->matOrph }}</td>
            <td>{{ $row->prenomTuteur }}</td>
            <td>{{ $row->nomTuteur }}</td>
           <!-- <td>{{ $row->beneficiaire }}</td> -->
            <td>{{ $row->montant }}</td>
            <td>{{ $row->prenom1 }} {{ $row->nom1 }}</td>
            <td>{{ $row->datePayement }}</td>
            <td>{{ $row->prenom2 }} {{ $row->nom2 }}</td>
            <td>{{ $row->dateAnnulation }}</td>
            <td>{{ $row->heureAnnulation }}</td>
          </tr>
          @endforeach 
        </table> 
        <h5 class="text-left font-weight-bold">Nombre de mandats annulés: {{ count($data) }} {{ $i }}</h5>
      </div>     
    </div>   
  </div>
</div>
<?php \Session::put('data',null) ?>
  @endif

	<script src="js/jquery-slim.min.js" ></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>