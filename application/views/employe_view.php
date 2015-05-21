 <?php 
      $class = array('class' => 'form-horizontal', 'id' => 'form-employe' );
      echo form_open('home/employe', $class);
  ?>
  <fieldset>
    <legend>Ajouter d'un employé</legend>
    <div class="alert"></div>

    <div class="form-group">
      <label for="matricule" class="col-lg-3 control-label">N° matricule</label>
      <div class="col-lg-9"><input class="form-control" required name="matricule" id="matricule" placeholder="Entrez le n° matricule" type="text"> </div>
    </div>
    <div class="form-group">
      <label for="nom" class="col-lg-3 control-label">Nom</label>
      <div class="col-lg-9"><input class="form-control" required name="nom" id="nom" placeholder="Entrez le Nom" type="text"> </div>
    </div>
    <div class="form-group">
      <label for="prenom" class="col-lg-3 control-label">Prénom</label>
      <div class="col-lg-9"><input class="form-control" required name="prenom" id="prenom" placeholder="Entrez le prenom" type="text"> </div>
    </div>

    <div class="form-group">
      <label for="contact" class="col-lg-3 control-label">Contact</label>
      <div class="col-lg-9"><input class="form-control" required name="contact" id="contact" placeholder="Entrez le contact" type="text"> </div>
    </div>
   
    <div class="form-group">
      <label for="fonction" class="col-lg-3 control-label">Fonction</label>
      <div class="col-lg-9">
        <select name="fonction" id="fonction" required class="form-control">
          <option value="" selected="selected">Fonction de l'employé</option>
          <?php 
            if ($fonct != null): 
              foreach ($fonct as $rows):  ?>
              <option value="<?php echo $rows->id_fonct; ?>"><?php echo $rows->lib_fonct; ?></option>
          <?php endforeach; endif; ?>
        </select>
      </div>
    </div>

     <div class="form-group">
      <label for="departement" class="col-lg-3 control-label">Département</label>
      <div class="col-lg-9">
        <select name="departement" id="departement"  class="form-control">
          <option value="" selected="selected">Departement de l'employé</option>
           <?php 
            if ($dep != null):
            foreach ($dep as $rows): ?>
            <option value="<?php echo $rows->id_dep; ?>"><?php echo $rows->lib_dep; ?></option>
          <?php endforeach; endif;  ?>
        </select>
      </div>
    </div>

    <div class="form-group">
      <div class="col-lg-9 col-lg-offset-3">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
</form>