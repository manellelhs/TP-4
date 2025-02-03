<div class="container mt-5">

<div class="row pt-3">
    <div class="col-9"><h2>LISTE DES CONTINENT</h2></div>
    <div class="col-3"><a href="formNat.php?action=Ajouter" class='btn btn-success'><i class="fas fa-plus-circle"></i> Créer une Continent</a></div>
</div>
<table class="table table-hover table-striped">
  <thead>
      <tr class="d-flex">
      <th scope="col" class="col-md-2">Numéro</th>
      <th scope="col" class="col-md-8">Libellé</th>
      <th scope="col"class="col-md-2">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($lesContinents as $continent){
    echo"<tr class='d-flex'>";
    echo"<td class='col-md-2'>$continent->getNum()</td>";
    echo"<td class='col-md-5'>$continent->getLibelle()</td>";
    echo"<td class='col-md-2'>
        <a href='formNat.php?action=Modifier&num=$continent->getNum()' class='btn btn-primary'><i class='fas fa-pen'></i></a>
        <a href='#modalsuppression' data-toggle='modal' data-message='Voulez vous supprimer cette nationalité ?' data-suppression='suppNat.php?num=$continent->getNum()' class='btn btn-danger'><i class='far fa-trash-alt'></i></a>
    </td>";
    echo "</tr>";
    }
 // suppNat.php?num=$nationalite->num    
    ?>

  </tbody>
</table>
 
</div>