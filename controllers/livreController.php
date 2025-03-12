<?php
$action=$_GET['action'];
switch($action){
        case 'list';
            $lesLivres = Livre::findAll();
            include('vues/livre/listeLivre.php');
            break;

        case 'add';
            $mode="Ajouter";
            include('vues/livre/formLivres.php');
            break;

        case 'update';
            $mode="Modifier";
            $livre=Livre::findById($_GET['num']);
            include('vues/livre/formLivres.php');
            break;

        case 'delete';
            $livre=Livre::findById($_GET['num']);
            $nb=Livre::delete($livre);
            if($nb==1){
                $_SESSION['message']=["success"=>"Le livre a été supprimé"];
            }else{
                $_SESSION['message']=["danger"=>"Le livre n'a pas été supprimé"];
            }
            header('location:index.php?uc=livre&action=list');
            break;

        case 'valideForm';
            $livre=new Livre();
            if(empty($_POST['num'])){
                $livre->setTitre($_POST['titre']);
                $nb=Livre::add($livre);
                $message ="AJOUTER"; 
            }else{
                $livre->setNum($_POST['num']);
                $livre->setTitre($_POST['titre']);
                $nb=Livre::update($livre);
                $message ="MODIFIER";
            }
            if($nb==1){
                $_SESSION['message']=["success"=>"Le livre a  été $message"];
            }else{
                $_SESSION['message']=["danger"=>"Le livre n'a pas été $message"];
            }
            header('location:index.php?uc=livre&action=list');
            break;
}