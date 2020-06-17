@extends('layoutAdmin')
  
  @section('contenu')

  <div class="row"> 
    <div class="col-3"> </div>  
    <div class="col-6 my-5 mx-5 border" style="border-radius: 10px; background-color: rgba(108,117,125,0.1);">
      <div class="wrap-log">

        <h3 align="center" class="text-secondary"> Rechercher Etat Mandat </h3>

        <!-- message en cas d'erreurs de validation -->
        @if(count($errors) > 0)
        <div class="alert alert-danger">
         <!-- Erreur de Validation <br><br>-->
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif 

        <!-- message en cas d'erreurs de manipulation de la base -->
       @if($message = Session::get('erreurDB'))
        <div class="alert alert-danger alert-block">
          <button type="button" class="close" data-dismiss="alert">
            x
          </button>
          <strong>{{ $message }}</strong>
        </div>
        @endif

        <!-- message en cas de manipulation de la base reussie -->
<!--        @if($message = Session::get('success'))
        <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">
            x
          </button>
          <strong>{{ $message }}</strong>
        </div>
        @endif -->

        <form method="POST">
          {{csrf_field()}}
          <div class="row">
          <div class="col-2"> </div>
          <div class="form-group col-8">
            <!-- <input type="range" class="form-control-range mt-5 mb-2" name="range"> -->     
            <input type="text" class="form-control form-control-lg" name="matricule" placeholder="donner un matricule ou metter 'tous'">
          </div>
          </div>

          <div class="form-group row">
          <div class="col-sm-4"></div>
          <div class="col-sm-3">
            <button type="submit" class="btn btn-sm btn-block btn-secondary" style="border-radius: 21px;">Rechercher</button>
          </div>
        </div>
        </form>

      </div>
    </div>
  </div>

@if($data = Session::get('data'))
<?php $m=0; $p=0; $nm=0; $np=0?>
<div class="row">
<div class="col-1"></div>
  <div class="panel panel-default col-10">
    <div class="panel-heading">
      <a class="table-bordered" target="_blank" href="{{ URL::action('ControllerEtatMandats@getRapportEtat') }}">Telecharger</a>
      <h3 class="panel-title" align="center"> tableau des données </h3>
    </div>
    <div class="panel-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <thead class="thead-primary text-white" style="background-color: rgba(5, 51, 127);">         
          <tr>
            <th>Matricule Orphelin</th>
            <th>Prenom Tuteur</th>
            <th>Nom Tuteur</th>
            <th>Nom et Prenom</th>
            <th>Net A Payer</th>
            <th>Etat</th>            
          </tr> 
          </thead>
          <tbody>         
          @foreach($data as $row)
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
<?php \Session::put('data',null) ?>
  @endif
@endsection