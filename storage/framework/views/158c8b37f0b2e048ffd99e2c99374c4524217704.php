</html><!DOCTYPE html>
<html>
<head>
  <meta chqrset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
   <link href="css\bootstrap.min.css" rel="stylesheet" /> 
      
  <link hrel="stylesheet" href="css\style.css">   

</head>

<body>

  <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Glozzom</a>
      
            
              <ul class="navbar-nav">
    <!-- Dropdown -->

                <li class="nav-item">
                      <a class="nav-link" href="./connection">Annuler payement</a>
                </li>

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                      Rapports  </a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Rapport Journalier</a>
                    <a class="dropdown-item" href="#">Rapport Periodique</a>
                    </div>
                </li>
                
                <li class="nav-item">
                      <a class="nav-link" href="./connection">Se Deconnecter</a>
                </li>
              </ul>            
    </div>
  </nav>
  

    <div class="w-50 my-5 mx-5 border" style="border-radius: 10px;">
      <div class="wrap-log">

        
    <form action="/homeAdmin">
    <div class="form-group mx-5 w-50">
                <label for="name">Veillez Renseigner le nom de l'agence</label>
                <input type="text" id="name" class="form-control form-control-sm" placeholder="Nom Agence">
           </div>
    <div class="form-group inputf mx-5"> 
      <button type="submit" class="btn btn-secondary ">Rechercher</button>
    </div>
  </form>

      </div>
    </div>
  

    <script src="js/jquery-slim.min.js" ></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>