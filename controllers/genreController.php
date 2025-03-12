<?php
$action=$_GET['action'];
switch($action){
        case 'list':
            $lesGenres = Genre::findAll();
            include('vues/genre/listeGenre.php');
            break;

        case 'add':
            $mode="Ajouter";
            include('vues/genre/formGenres.php');
            break;

        case 'update':
            $mode="Modifier";
            $genre=Genre::findById($_GET['num']);
            include('vues/genre/formGenres.php');
            break;

        case 'delete':
            $genre=Genre::findById($_GET['num']);
            $nb=Genre::delete($genre);
            if($nb==1){
                $_SESSION['message']=["success"=>"Le genre a été supprimé"];
            }else{
                $_SESSION['message']=["danger"=>"Le genre a pas été supprimé"];
            }
            header('location:index.php?uc=genre&action=list');
            break;

        case 'valideForm';
            $genre=new Genre();
            if(empty($_POST['num'])){
                $genre->setLibelle($_POST['libelle']);
                $nb=Genre::add($genre);
                $message ="ajouté"; 
            }else{
                $genre->setNum($_POST['num']);
                $genre->setLibelle($_POST['libelle']);
                $nb=Genre::update($genre);
                $message ="modifié";
            }
            if($nb==1){
                $_SESSION['message']=["success"=>"Le genre a été $message"];
            }else{
                $_SESSION['message']=["danger"=>"Le genre n'a pas été $message"];
            }
            header('location:index.php?uc=genres&action=list');
            break;
}