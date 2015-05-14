 <form action="#" class="form-horizontal">
  <fieldset>
    <legend>Ajouter une fonction</legend>
    <div class="form-group">
      <label for="fonct" class="col-lg-3 control-label">Nom de la fonction</label>
      <div class="col-lg-9"><input class="form-control" required name="fonct" id="fonct" placeholder="Entrez le nom de la fonction" type="text"> </div>
    </div>
    <div class="form-group">
      <label for="fonct" class="col-lg-3 control-label">Description la fonction</label>
      <div class="col-lg-9">
        <textarea name="desc_fonct" id="desc_fonct" rows="5" class="form-control" placeholder="Entrez un descriptif la fonction" rows="10"></textarea>
      </div>
    </div>

    <div class="form-group">
      <label for="id_dep" class="col-lg-3 control-label">Departement</label>
      <div class="col-lg-9">
        <select name="id_dep" id="id_dep" class="form-control" required="required">
          <option value="" selected="selected">Choisir un département</option>
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