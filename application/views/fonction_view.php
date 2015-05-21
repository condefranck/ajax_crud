 <?php 
      $class = array('class' => 'form-horizontal', 'id' => 'form-fonct' );
      echo form_open('home/fonction', $class);
  ?>
  <fieldset>
    <legend>Ajouter une fonction</legend>
     <div class="alert"></div>

    <div class="form-group">
      <label for="fonct" class="col-lg-3 control-label">Nom de la fonction</label>
      <div class="col-lg-9"><input class="form-control" required name="lib_fonct" id="lib_fonct" placeholder="Entrez le nom de la fonction" type="text"> </div>
    </div>
    <div class="form-group">
      <label for="fonct" class="col-lg-3 control-label">Description de la fonction</label>
      <div class="col-lg-9">
        <textarea name="desc_fonct" required id="desc_fonct" rows="5" class="form-control" placeholder="Entrez un descriptif la fonction" rows="10"></textarea>
      </div>
    </div>

    <div class="form-group">
      <label for="id_dep" class="col-lg-3 control-label">Departement</label>
      <div class="col-lg-9">
        <select name="id_dep" id="id_dep" class="form-control" required="required">
          <option value="" selected="selected">Choisir un département</option>
          <?php 
            if ($rows != null):
            foreach ($rows as $rows): ?>
            # code...
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