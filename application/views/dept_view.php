<?php 
      $class = array('class' => 'form-horizontal', 'id' => 'form-dept' );
      echo form_open('home/departement', $class);
  ?>
 <!--  <form action="" id="formAddDep" method="post" class="form-horizontal"> -->
  <fieldset>
    <legend>Ajouter un département</legend>
    <div class="alert"></div>

    <div class="form-group">
      <label for="lib_dep" class="col-lg-3 control-label">Nom du departement</label>
      <div class="col-lg-9">
        <input class="form-control" name="lib_dep" id="lib_dep" required placeholder="Entrez le nom du departement" type="text"> 
      </div>
    </div>
    <div class="form-group">
      <label for="desc_dep" class="col-lg-3 control-label">Description du departement</label>
      <div class="col-lg-9">
        <textarea name="desc_dep" id="desc_dep" rows="5" class="form-control" required placeholder="Entrez un descriptif du departement" rows="10"></textarea>
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-9 col-lg-offset-3 col-submit">
        <button type="submit" id="submit" class="btn btn-primary">Ajouter !</button>
        <div class="submit-load"></div>
      </div>
    </div>
  </fieldset>

<?php echo form_close(); ?>


<script>
    var formulaire = $('#form-dept');
    $(formulaire).submit(function(event) {
        // annulation du comportement du navigateur
        event.preventDefault();
        // regroupement des donnees du formulaire dans une variable
        var donnees = $(formulaire).serialize();
        // validation en ajax
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
            $('#lib_dep').val('');
            $('#desc_dep').val('');
            setTimeout(function(){
              $('.alert-success').html('');
              $('.alert').hide();
              $('.alert').removeClass('alert-success');
            }, 5000);  
          },
          beforeSend: function() {
            $('.submit-load').show();
          },
          complete: function() {
              $('.submit-load').hide();
          },
          error: function(erreur) {
            console.log(erreur);
            $('.submit-load').hide();
            $('.alert').addClass('alert-danger');
            $('.alert-danger').show();
            $('.alert-danger').html("Oups! Erreur d'envoi, Verifiez votre connexion");
          
            setTimeout(function(){
              $('.alert-danger').html('');
              $('.alert').hide();
              $('.alert').removeClass('alert-danger');
            }, 6000);  
          }

        })
    });





</script>
