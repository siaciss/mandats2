</html><!DOCTYPE html>
<html>
<head>
  <meta chqrset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
  <title>Rapport Mandats Impayés</title>
   <link href="css\bootstrap.min.css" rel="stylesheet"/> 
      
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
<?php $m=0; $p=0; $nm=0; $np=0; $i=0?>
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
        <h2 class="panel-title mb-5 font-weight-bold text-center" align="center"> Etat mandats </h2>
    </div>

    <div class="panel-body">
      <div class="table-responsive">
        <table class="table table-sm table-bordered" style="font-size: 10px">
          <thead class="thead-primary text-white" style="background-color: rgba(5, 51, 127);">
          <tr>
            <th>Matricule Orphelin</th>
            <th>Prenom Tuteur</th>
            <th>Nom Tuteur</th>
            <th>Bénéficiaire</th>
            <th>Montant</th> 
            <th>Etat</th>  
          </tr>  
          </thead>
          <tbody>        
          @foreach($data as $row)
          @if($i < 100)
          @if($row->etat == 'EMIS')
          <?php $m = $m+$row->montant; $nm = $nm+1 ?> 
          @elseif($row->etat == 'PAYE')
           <?php $p = $p+$row->montant; $np = $np+1?> 
          @endif       
          <tr>
            <td>{{ $row->matOrph }}</td>
            <td>{{ $row->prenomTuteur }}</td>
            <td>{{ $row->nomTuteur }}</td>
            <td>{{ $row->beneficiaire }}</td>
            <td>{{ $row->montant }}</td>
            <td>{{ $row->etat }}</td>            
          </tr>
          <?php $i = $i+1 ?>
          @endif
          @endforeach 
          </tbody>                                   
        </table>    
        <h5 class="text-left font-weight-bold">Nombre de mandats payés: {{ $np }}</h5>
            <h5 class="text-left font-weight-bold">Montant total des mandats payés: {{ $p }}</h5>      
        <h5 class="text-left font-weight-bold">Nombre de mandats impayés: {{ $nm }}</h5>
            <h5 class="text-left font-weight-bold">Montant total des mandats payés: {{ $m }}</h5>      
      </div>     
    </div>   
  </div>
</div>
  @endif

	<script src="js/jquery-slim.min.js" ></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>