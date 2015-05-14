 <form action="#" class="form-horizontal">
  <fieldset>
    <legend>Ajouter d'un employé</legend>
    <div class="form-group">
      <label for="matricule" class="col-lg-3 control-label">N° matricule</label>
      <div class="col-lg-9"><input class="form-control" required name="matricule" id="matricule" placeholder="Entrez le n° matricule" type="text"> </div>
    </div>
    <div class="form-group">
      <label for="Nom" class="col-lg-3 control-label">Nom</label>
      <div class="col-lg-9"><input class="form-control" required name="Nom" id="Nom" placeholder="Entrez le Nom" type="text"> </div>
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
        </select>
      </div>
    </div>

     <div class="form-group">
      <label for="Departement" class="col-lg-3 control-label">Département</label>
      <div class="col-lg-9">
        <select name="Departement" id="Departement"  class="form-control">
          <option value="" selected="selected">Fonction de l'employé</option>
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