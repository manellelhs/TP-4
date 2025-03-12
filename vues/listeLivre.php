<div class="container" style="margin: 5% auto auto auto">
    
    <div class="row pt-3">
        <div class="col-9">
            <h2>LISTE LIVRE </h2>
        </div>
        <div class="col-3"><a href="index.php?uc=livre&action=add" class='btn btn-success'><i class="fas fa-plus-circle"></i> CRER UN LIVRE</a> </div>
        
    </div>

    <table class="table table-hover table-dark">
        <thead>
            <tr class="d-flex">
            <th scope="col" class="col-md-1">NUMERO</th>
            <th scope="col" class="col-md-2">IDENTIFIANT</th>              
            <th scope="col" class="col-md-2">AUTEUR</th>          
            <th scope="col" class="col-md-1">GENRE</th>
            <th scope="col" class="col-md-3">TITRE</th>
            <th scope="col" class="col-md-1">EDITEUR</th>
            <th scope="col" class="col-md-1">ANNEE</th>
            <th scope="col" class="col-md-1">PRIX</th>

        </tr>
        </thead>
    <tbody>
        <?php
        foreach($lesLivres as $livre){
            echo "<tr class='d-flex'>";
            echo "<td class='col-md-1'>".$livre->getNum()."</td>";
            echo "<td class='col-md-2'>".$livre->getId()."</td>";
            echo "<td class='col-md-2'>".$livre->getAuteur()."</td>";            
            echo "<td class='col-md-1'>".$livre->getGenre()."</td>";            
            echo "<td class='col-md-3'>".$livre->getTitre()."</td>";
            echo "<td class='col-md-1'>".$livre->getEditeur()."</td>";
            echo "<td class='col-md-1'>".$livre->getAnnee()."</td>";
            echo "<td class='col-md-1'>".$livre->getPrix()."</td>";

            echo "<td class='col-md-2'>
                <a href='index.php?uc=livre&action=update&num=".$livre->getNum()."' class='btn btn-primary'><i class='fas fa-pen'></i></a>
                <a href='#modalSuppression' data-toggle='modal' data-message='Voulez vous supprimer ce livre ?' data-suppression='index.php?uc=livre&action=delete&num=".$livre->getNum()."' class='btn btn-danger'><i class='far fa-trash-alt'></i></a>
            </td>";
            echo "</tr>";
        }

        ?>
            
    </tbody>
    </table>

</div>