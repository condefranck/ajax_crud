<?php 
      $class = array('class' => 'form-horizontal', 'id' => 'formAddDep' );
      echo form_open('home/departement', $class); 
  ?>

  <fieldset>
    <legend>Ajouter un département</legend>
    <div class="form-group">
      <label for="lib_dep" class="col-lg-3 control-label">Nom du departement</label>
      <div class="col-lg-9"><input class="form-control" required name="lib_dep" id="lib_dep" placeholder="Entrez le nom du departement" type="text"> </div>
    </div>
    <div class="form-group">
      <label for="desc_dep" class="col-lg-3 control-label">Description du departement</label>
      <div class="col-lg-9">
        <textarea name="desc_dep" id="desc_dep" rows="5" class="form-control" placeholder="Entrez un descriptif du departement" rows="10"></textarea>
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-9 col-lg-offset-3">
        <button type="butt" class="btn btn-primary">Ajouter !</button>
      </div>
    </div>
  </fieldset>

<?php echo form_close(); ?>