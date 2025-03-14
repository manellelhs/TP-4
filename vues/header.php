
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Jumbotron Template · Bootstrap v4.6</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/jumbotron/">

    

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://bootswatch.com/4/cerulean/bootstrap.css">
    
    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/4.6/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.6/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.6/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.6/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.6/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.6/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="/docs/4.6/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>


    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">
  </head>
  <body>
    
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="#">Ma bibliothèque</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-book"></i> Gestion des genres</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="index.php?uc=genre&action=list">liste des genres</a>
          <a class="dropdown-item" href="index.php?uc=genre&action=add">ajouter un genre</a>
        </div>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-person"></i> Gestion des auteurs</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="index.php?uc=auteur&action=list">liste des auteurs</a>
          <a class="dropdown-item" href="index.php?uc=auteur&action=add">ajouter un auteur</a>
          <a class="dropdown-item" href="#">rechercher un auteur</a>
        </div>
        </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"><i class="fa-regular fa-flag"></i> Gestion des nationnalités</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="index.php?uc=nationalite&action=list">liste des nationalités</a>
          <a class="dropdown-item" href="index.php?uc=nationalite&action=add">ajouter une nationalité</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-globe"></i> Gestion des Continents</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="index.php?uc=continents&action=list">liste des Continents</a>
          <a class="dropdown-item" href="index.php?uc=continents&action=add">ajouter un Continent</a>
        </div>
        </li>
    </ul>
  </div>
</nav>

<?php
if(!empty($_SESSION['message'])){
    $mesmessages=$_SESSION['message'];
    foreach($mesmessages as $key=>$message){
      echo ' <div class="container pt-5">
                <div class="alert alert-'.$key.' alert-dismissible fade show" role="alert">'.$message.'
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
              </div>';
    }
$_SESSION['message']=[];
}
?>