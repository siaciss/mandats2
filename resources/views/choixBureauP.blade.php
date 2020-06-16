@extends('layoutGestionnaire')

@section('contenu')
</br>
</br>
</br>
<div class="row" style="margin-top: 5%"> 
    <div class="col-3"> </div>     
    <div class="col-6 mx-5 my-5 border" style="border-radius: 10px;">   
      <div class="wrap-log mt-3">

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
      @if($message = Session::get('success'))
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">
          x
        </button>
        <strong>{{ $message }}</strong>
      </div>
      @endif

    <h5><marquee align="center" class="text-secondary text-20 mb-3"> Selectionnez le bureau concerné et précisez la période </marquee></h5>
      <form method="POST">
        {{csrf_field()}}
      <div class="form-group row">
        <label for="inputBuro" class="col-sm-2 col-form-label ml-5">Bureau</label>
        <div class="col-sm-8">
          <?php $b=Session::get('bureaux'); ?>
          <select name="bureau" class="form-control">
            @foreach($b as $row)
            <option> {{ $row->adresse }} </option>
            @endforeach
          </select>
        </div>
      </div>          
          <div class="form-inline item-center ">
            <span class="ml-5 mr-4"> Periode Du </span>     
            <input type="date" class="form-control ml-5 mr-5 " name="date1">
            <span> au </span>
            <input type="date" class="form-control ml-3 " name="date2">
          </br></br>
          </div>

        <div class="form-group row my-3">
          <div class="col-sm-4"></div>
          <div class="col-sm-3 ml-4">
            <button type="submit" class="btn btn-sm btn-block btn-secondary" style="border-radius: 21px;">Editer</button>
          </div>
        </div>
      </form>

    </div>
  </div>
</div> 
