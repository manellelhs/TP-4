<div class="container mt-5">
<h2 class='pt-3 text-center'><?php echo $mode ?> UNE NATIONALITE</h2>
    <form action="index.php?uc=nationalite&action=validerForm" method="post" class="col-md-6 offset-md-3 border border-primary p-3 rounded">
            <div class="form-group">
                <label for='libelle' > Libellé </label>
                <input type="text" class='form-control' id='libelle' placehoder='Saisir le libellé' name='libelle' value="<?php if($mode == "Modifier") {echo $laNationalite->getLibelle();} ?>">
            </div>
            <div class="form-group">
                <label for='continent' > CONTINENT </label>
                <select name="continent" class="form-control">
                    <?php 
                    foreach($lesContinents as $continent){
                        if($mode == "Modifier"){
                        $selection=$continent->getNum()== $laNationalite->getContinent()->getNum() ? 'selected' : '';
                        }
                        echo "<option value='".$continent->getNum() ."'". $selection .">". $continent->getLibelle() ."</option>";
                    }
                    ?>
                </select>
            </div>
            <input type="hidden" id="num" name="num" value="<?php if($mode == "Modifier") {echo $laNationalite->getNum();} ?>">
            <div class="row">
                <div class="col"> <a href="index.php?uc=nationalite&action=list" class='btn btn-warning btn-block'>REVENIR A LA LISTE</a> </div>
                <div class="col"><button type='submit' class='btn btn-success btn-block'> <?php echo $mode ?> </button> </div>
            </div>
    </form>
</div>

<!-- <?php echo $action ?> -->