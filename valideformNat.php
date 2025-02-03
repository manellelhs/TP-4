
<?php include "header.php";
include "connexionPdo.php";
$action=$_GET['action'];
$num=$_POST['num']; //recupere lib form
$libelle=$_POST['libelle']; //recupere lib form
$continent=$_POST['continent']; //recupere cont form

if($action == "Modifier"){
    $req=$monPdo->prepare("update nationalite set libelle = :libelle numContinent= :continent where num = :num");
    $req->bindParam(':num',$num);
    $req->bindParam(':libelle',$libelle);
    $req->bindParam(':continent',$continent);
    
}
else{
    $req=$monPdo->prepare("insert into nationalite(libelle, numContinent) values (:libelle, :continent)");
    $req->bindParam(':libelle',$libelle);
    $req->bindParam(':continent',$continent);
}
$nb=$req->execute();
$message= $action=="Modifier" ? "modifiée" : "ajoutée";

if($nb ==1){
    $_SESSION['message']=["sucess"=>"La nationalite a bien été " . $message];
}

else{
    $_SESSION['message']=["danger"=>"La nationalite n'a bien été " .$message];
}
header('location: listeNationalites.php');
exit();



echo '<div class="container mt-5">';
echo '<div class="row">
    <div class="col mt-3">';

if($nb ==1){
    echo '<div class="alert alert-success" role="alert">
    La nationalite a bien été '. $message .' !
    </div>';
}
else{
    echo '<div class="alert alert-danger" role="alert">
    La nationalite n\'a pas été '. $message .' ! 
    </div>';
}
?>

<a href="listeNationalites.php" class="btn btn-primary">revenir a la liste des nationalites</a>

</div>


<?php include "footer.php";
?>
