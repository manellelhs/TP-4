
<?php include "header.php";
include "connexionPdo.php";


$libelle="";
$continentSel="Tous";

// liste nat
//construction de la requete
$textReq="select n.num, n.libelle as 'libNat', c.libelle as 'libCont' from nationalite n, continent c where n.numContinent=c.num";
if(!empty($_GET)){
  $libelle=$_GET['libelle'];
  $continentSel=$_GET['continent'];
  if($libelle !="") { $textReq.= " and n.libelle like '%" .$libelle. "%'";}
  if($continentSel !="Tous") {$textReq.=" and c.num = " .$continentSel;}

}
$textReq.=" order by n.libelle";

$req=$monPdo->prepare($textReq);
$req->setFetchMode(PDO::FETCH_OBJ);
$req->execute();
$lesNationalites=$req->fetchAll();


//liste Cont
$reqCont=$monPdo->prepare("select * from continent");
$reqCont->setFetchMode(PDO::FETCH_OBJ);
$reqCont->execute();
$lesContinents=$reqCont->fetchAll();

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



<div class="container mt-5">

<div class="row pt-3">
<div class="col-9"><h2>LISTE DES NATIONALITES</h2></div>
<div class="col-3"><a href="formNat.php?action=Ajouter" class='btn btn-success'><i class="fas fa-plus-circle"></i> Créer une nationalité</a></div>
</div>

<form action="" method="get" class="border border-primary rounded p-3 mt-3 mb-3">
  <div class="row">
    <div class="col">
    <input type="text" class='form-control' id='libelle' placehoder='Saisir le libelle' name='libelle' value=" <?php echo $libelle; ?>">
    </div>

    <div class="col">
    <select name="continent" class="form-control">
            <?php
              echo "<option value='Tous'>TOUS LES CONTINENTS</option>";
              foreach($lesContinents as $continent){
                $selection=$continent->num ==  $continentSel ? 'selected' : '';
                echo "<option value='$continent->num' $selection>$continent->libelle</option>";
              }
            ?>

          </select>
    </div>
    <div class="col">
      <button type="submit" class="btn btn-success btn block"> RECHERCHER </button>
    </div>
  </div>
</form>



<table class="table table-hover table-striped">
  <thead>
      <tr class="d-flex">
      <th scope="col" class="col-md-2">Numéro</th>
      <th scope="col" class="col-md-5">Libellé</th>
      <th scope="col" class="col-md-3">Continent</th>
      <th scope="col"class="col-md-2">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($lesNationalites as $nationalite){
    echo"<tr class='d-flex'>";
    echo"<td class='col-md-2'>$nationalite->num</td>";
    echo"<td class='col-md-5'>$nationalite->libNat</td>";
    echo"<td class='col-md-3'>$nationalite->libCont</td>";
    echo"<td class='col-md-2'>
        <a href='formNat.php?action=Modifier&num=$nationalite->num' class='btn btn-primary'><i class='fas fa-pen'></i></a>
        <a href='#modalsuppression' data-toggle='modal' data-message='Voulez vous supprimer cette nationalité ?' data-suppression='suppNat.php?num=$nationalite->num' class='btn btn-danger'><i class='far fa-trash-alt'></i></a>
    </td>";
    echo "</tr>";
    }
 // suppNat.php?num=$nationalite->num    
    ?>

  </tbody>
</table>
 
</div>


<?php include "footer.php";
?>
