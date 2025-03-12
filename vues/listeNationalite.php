
    
    <div class="row pt-3">
        <div class="col-9"><h2>LISTE NATIONALITE</h2></div>
        <div class="col-3"><a href="index.php?uc=nationalite&action=add" class='btn btn-success'><i class="fas fa-plus-circle"></i> CRER UNE NATIONALITE</a> </div>
        
    </div>

    <form id="formRecherche" action="index.php?uc=nationalite&action=list" method="post" class="border border-primary rounded p-3 mt-3 mb-3">
    <div class="row">
            <div class="col">
                <input type="text" class='form-control' id='libelle' onInput="document.getElementById('formRecherche').submit()" placeholder='Saisir le libellé' name='libelle' value="<?php echo $libelle; ?>">
            </div>
            <div class="col">
                <select name="continentSel" class="form-control" onChange="document.getElementById('formRecherche').submit()">
                        <?php 
                        echo "<option value='Tous'>Tous les continents</option>";
                        foreach($lesContinents as $continent){
                            $selection=$continent->getNum() == $continentSel ? 'selected' : '';
                            echo "<option value='".$continent->getNum()."'".$selection.">".$continent->getLibelle()."</option>";
                        }
                        ?>
                </select>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-success btn-block"> RECHERCHER</button>
            </div> 
        </div>
    </form>

  
    <table class="table table-hover table-dark">
    <thead>
        <tr class="d-flex">
        <th scope="col" class="col-md-2">Numéro</th>
        <th scope="col" class="col-md-5">Libellé</th>
        <th scope="col" class="col-md-3">Continent</th>
        <th scope="col" class="col-md-2">Actions</th>

        </tr>
    </thead>
    <tbody>
    <?php
    foreach($lesNationalites as $nationalite){
        echo "<tr class='d-flex'>";
        echo "<td class='col-md-2'>$nationalite->numero</td>";        
        echo "<td class='col-md-3'>$nationalite->libContinent</td>";
        echo "<td class='col-md-5'>$nationalite->libNation</td>";

        echo "<td class='col-md-2'>
            <a href='index.php?uc=nationalite&action=update&num=" . $nationalite->numero . "' class='btn btn-info'><i class='fas fa-pen'></i></a>
            <a href='#modalSuppression' data-toggle='modal' data-message='Voulez vous supprimer cette nationalité ?' data-suppression='index.php?uc=nationalite&action=delete&num=".$nationalite->numero."' class='btn btn-danger'><i class='far fa-trash-alt'></i></a>
        </td>";
        echo "</tr>";
    }

    ?>
        
    </tbody>
    </table>


</div>