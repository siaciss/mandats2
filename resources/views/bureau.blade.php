 @extends('layoutAdmin')

 @section('contenu')
   <div class="row"> 
  <div class="col-sm-3"> </div>
  <div class="container-fluid col-sm-6 my-5 mx-5 item-center border" style="border-radius: 10px;">
    <div class="wrap-log">  

       <!-- message en cas d'erreurs de validation -->
      @if ($errors->any())
            <div class="alert alert-danger">
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
      @if(session()->has('message'))
          <h5 style="color: green; text-align: center;">
            {{session()->get('message')}}
          </h5>
      @endif 

      <form method="POST" class="ml-5 my-3">
        {{csrf_field()}}
        <div class="form-group row">
          <label for="inputNumero" class="col-sm-2 col-form-label">Numero</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="numero" placeholder="Numero du Bureau" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputAdresse" class="col-sm-2 col-form-label">Adresse</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="adresse" placeholder="Adresse du Bureau" required>
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
  
@endsection