
<?php include "header.php";
include "connexionPdo.php";
$num=$_GET['num'];

$req=$monPdo->prepare("delete from nationalite where num = :num");
$req->bindParam(':num',$num);
$nb=$req->execute();

if($nb ==1){
    $_SESSION['message']=["sucess"=>"La nationalite a bien été suprimée"];
}

else{
    $_SESSION['message']=["danger"=>"La nationalite n'a bien été suprimée"];
}
header('location: listeNationalites.php');
exit();

?>