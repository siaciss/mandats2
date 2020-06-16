</html><!DOCTYPE html>
<html>
<head>
  <meta chqrset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
  <title>Rapport Global</title>
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
<?php $m=0 ?>
<?php $d=date('d-m-Y'); $t=date('H:i:s') ?>

  <div class="row">
<div class="col-1"></div>
  <div class="panel panel-default col-11" align="center">

@if($d1=Session::get('date1') and $d2=Session::get('date2'))
        <table class="table">
          <tr>
            <td><img src="img\poste.jpg" width="130" height="70" class="d-inline-block " alt=""></td>
            <td class="text-right font-weight-bold"><h5 class="align-rigth">Du {{ $d1 }} <br> au {{ $d2 }} </h5></td>
          </tr>
        </table>
        <br>
    <div class="panel-heading">
        <h2 class="panel-title mb-5 font-weight-bold text-center" align="center"> Rapport de payement périodique <br> De tous les agences </h2>
        <?php \Session::put('date1',null);
         \Session::put('date2',null); ?>
    </div>
       @else
        <table class="table">
          <tr>
            <td><img src="img\poste.jpg" width="130" height="70" class="d-inline-block " alt=""></td>
            <?php $d=date('d-m-Y'); ?>
            <td class="text-right font-weight-bold"><h5 class="align-rigth">Le {{ $d }}</h5></td>
          </tr>
        </table>
        <br>
    <div class="panel-heading">
       <h2 class="panel-title mb-5 font-weight-bold" align="center"> Rapport de payement journalier<br> De tous les agences </h2>
    </div>
       @endif

    <div class="panel-body">
      <div class="table-responsive">
        <table class="table table-sm table-bordered table-striped" style="font-size: 10px">
          <thead class="thead-primary text-white" style="background-color: rgba(5, 51, 127);">
          <tr>
            <th>Matricule Orphelin</th>
            <th>Prenom Tuteur</th>
            <th>Nom Tuteur</th>
            <th>Bénéficiaire</th>
            <th>Montant</th>   
            <th>Agent payeur</th>
            <th>Bureau</th>         
            <th>Date de payement</th>            
          </tr>    
          </thead>
          <tbody>       
          @foreach($data as $row)
          <?php $m = $m+$row->montant ?>
          <tr>
            <td>{{ $row->matOrph }}</td>
            <td>{{ $row->prenomTuteur }}</td>
            <td>{{ $row->nomTuteur }}</td>
            <td>{{ $row->beneficiaire }}</td>
            <td>{{ $row->montant }}</td>
            <td>{{ $row->prenom }} {{$row->nom}} </td> 
            <td>{{ $row->adresse }}</td>                       
            <td>{{ $row->datePayement }}</td>           
          </tr>
          @endforeach  
          </tbody>                                         
        </table> 
        <h5 class="text-left font-weight-bold">Nombre de beneficiaires payés: {{ count($data) }}</h5>
           	<h5 class="text-left font-weight-bold">Montant total: {{ $m }}</h5>      
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