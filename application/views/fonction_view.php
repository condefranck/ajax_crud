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
            <option value="<?php echo $rows->id_dep; ?>"><?php echo $rows->lib_dep; ?></option>
          <?php endforeach; endif;  ?>
        </select>
      </div>
    </div>

    <div class="form-group">
      <div class="col-lg-9 col-lg-offset-3">
        <button type="submit" class="btn btn-primary">Enregistrer !</button>
        <div class="submit-load"></div>
      </div>
    </div>
  </fieldset>
</form>

<script>
  var formulaire = $('#form-fonct');

  $(formulaire).submit(function(event) {
    event.preventDefault();
    var donnees = $(formulaire).serialize();
    $.ajax({
      type: 'POST',
      url: $(formulaire).attr('action'),
      data: donnees,
      success: function(data) {
       console.log(data);
       var rep = JSON.parse(data);
       $('.alert').addClass('alert-success');
       $('.alert-success').show();
       $('.alert-success').html(rep.msgSucces);
       $('#lib_fonct').val('');
       $('#desc_fonct').val('');
       $('#id_dep option[value=""]').prop('selected', 'true');
       setTimeout(function(){
          $('.alert-success').html('');
          $('.alert').hide();
          $('.alert').removeClass('alert-success');
       }, 5000);
      },
      beforeSend: function() {
        $('.submit-load').show();
      },
      complete: function(xhr) {
       $('.submit-load').hide();
      },
    
      error: function(error) {
        $('.submit-load').hide();
        $('.alert').addClass('alert-danger');
        $('.alert-danger').show();
        $('.alert-danger').html("Oups! Erreur d'envoi, Verifiez votre connexion");
        
        setTimeout(function(){
          $('.alert-danger').html('');
          $('.alert').hide();
          $('.alert').removeClass('alert-danger');
       }, 5000);
      }
    });
    
  });

  
</script>

