

    <div class="container mt-5">

      <h2 class='pt-3 text-center'><?php echo $mode ?>  UN CONTINENT</h2>
      <form action="index.php?uc=continents&action=valideForm"
       method="post" class="col-md-6 offset-md-3 border border-primary p-3 rounded ">
        <div class="form-group">
          <label for='libelle'>Libellé</label>
          <input type="text" class='form-control' id='libelle' placehoder='Saisir le libelle' name='libelle' 
          value="<?php if($mode == "Modifier") { echo $continent->getlibelle();} ?>">
        </div>
        <input type="hidden" id="num" name="num" 
        value="<?php if($mode == "Modifier") {echo $continent->getNum();} ?>">

        <div class="row">
          <div class="col"> <a href="index.php?uc=continents&action=list" class='btn btn-danger btn-block'>revenir a la liste </a></div>
          <div class="col"><button type='submit' class='btn btn-success btn-block'> <?php echo $mode ?> </button> </div>
        </div>
      </form>

    </div>
