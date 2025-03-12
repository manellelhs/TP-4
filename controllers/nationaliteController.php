
<?php
$action=$_GET['action'];
switch($action){
    case 'list':
        $libelle="";
        $continentSel="Tous";
        if(!empty($_POST['libelle']) || !empty($_POST['continent1']))
        {
            $libelle=$_POST['libelle'];
            $continentSel=$_POST['continent1'];
        }
        $lesContinents=Continent::findAll();
        $lesNationalites=Nationalite::findAll($libelle,$continentSel);
            include('vues/nationalite/listeNationalite.php');
            break;

        case 'add':
            $mode="Ajouter";
            $lesContinents=Continent::findAll();
            include('vues/nationalite/formNationalite.php');
            break;

        case 'update':
            $mode="Modifier";
            $lesContinents=Continent::findAll();
            $laNationalite=Nationalite::findById($_GET['num']);
            include('vues/nationalite/formNationalites.php');
            break;

        case 'delete':
            $laNationalite=Nationalite::findById($_GET['num']);
            $nb=Nationalite::delete($laNationalite);
            if($nb==1)
            {
                $_SESSION['message']=["success"=>"Le nationalite a  été supprimée"];
            }
            else
            {
                $_SESSION['message']=["danger"=>"Le nationalite n'a pas été supprimée"];
            }
            header('location:index.php?uc=nationalite&action=list');
            break;

        case 'validerForm':
            $nationalite=new Nationalite();
            $continent=Continent::findById($_POST['continent']);
            $nationalite->setLibelle($_POST['libelle'])
                        ->setContinent($continent);
            if(empty($_POST['num']))
            {
                $nb=Nationalite::add($nationalite);
                $message ="AJOUTER"; 
            }
            else
            {//cas d'une modif
                $nationalite->setNum(($_POST["num"]));
                $nb=Nationalite::update($nationalite);
                $message ="MODIFIER";
            }
            if($nb==1)
            {
                $_SESSION['message']=["success"=>"Le nationalite a été $message"];
            }
            else
            {
                $_SESSION['message']=["danger"=>"Le nationalite n'a pas été $message"];
            }
            header('location:index.php?uc=nationalite&action=list');
            break;
}
