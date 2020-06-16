@extends('layoutAdmin')

@section('contenu')

<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" style="background-color: black">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/imgtransfert.jpg" class="d-block w-100 h-50" alt="">
      <div class="carousel-caption d-none d-md-block">
        <h1 class="display-4 font-weight-bold" style="color: rgb(0,0,0);">Avant de charger votre fichier, veuiller vérifier que c'est un fichier excel (.xlsx ou .xls) et les colonnes matricule, nomtuteur, prenomtuteur, orphelin et total y sont. Elles peuvent bien etre en majuscule</h1>
        
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/etatmandat.jpg" class="d-block w-100 h-50" alt="" style="height: 500px;">
      <div class="carousel-caption d-none d-md-block">
        <h1 class="display-3 text-primary font-weight-bold">Vous pouvez vérifier l'état d'un mandat en donnant son matricule ou l'état de tous les mandats en saisissant "tous"</h1>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/profil.jpg" class="d-block w-100 h-50" alt="">
      <div class="carousel-caption d-none d-md-block">
        <h1 class="display-4 font-weight-bold" style="color: rgb(0,0,0);">Avec l'onglet "Ajouter objet" vous avez la possibilité d'ajouter un bureau ou un utilisateur ou de changer le profil d'un utilisateur en remplissant un formulaire</h1>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<script src="js/jquery-slim.min.js" ></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

@endsection