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
      <label for="departement" class="col-lg-3 control-label">Département <span class="select-dep-load"></span></label>
      <div class="col-lg-9">
        <select name="departement" disabled id="departement" required class="form-control">
          <option value="" selected="selected">Departement de l'employé</option>
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
/**
* FONCTION GET DEPARTEMENT
**/

    $('#fonction').change(function() {
      var val = $(this).val();
        if(val == ""){
          $('#departement option[value=""]').prop('selected', 'true');
          $('#departement').prop('disabled', 'true');
        }
        else
        {
          $.ajax({
            url: "<?php echo base_url(); ?>index.php/home/get_departement/"+val,
            type: 'POST',
            timeout: 10000,
            data: {},
            success: function(data){
              console.log(data);
              var rep = JSON.parse(data);
              opt='';
              opt+='<option value="'+rep.dep.id_dep+'">'+rep.dep.lib_dep+'</option>';
              $('#departement').html(opt);
              $('#departement').removeAttr('disabled');
            },
             beforeSend: function(){
              $('.select-dep-load').show();
            },
            complete: function(){
               $('.select-dep-load').hide();
            },
            error: function(){
              $('.alert').addClass('alert-danger');
              $('.alert-danger').html("Echec de d'envoi");
              setTimout(function(){
                $('.alert-danger').html('');
                $('.alert').hide();
                $('.alert').removeClass('alert-danger');
              }, 5000)
            }

          });

        }
    });
    

/**
* FONCTION SUBMIT
**/

  var formulaire = $('#form-employe');
  $(formulaire).submit(function(event) {
   event.preventDefault();
   var donnees = $(formulaire).serialize();

   $.ajax({
      url: $(formulaire).attr('action'),
      type: 'POST',
      data: donnees,
      success: function(data){
        var rep = JSON.parse(data);
          $('.alert').addClass('alert-success');
          $('.alert-success').show();
          $('.alert-success').html(rep.msgSucces);
          $('#matricule').val('');
          $('#nom').val('');
          $('#prenom').val('');
          $('#contact').val('');
          $('#fonction option[value=""]').prop('selected', 'true');
          $('#departement').prop('disabled', 'true');
          setTimeout(function() {
            $('.alert').html('');
            $('.alert').hide();
            $('.alert').removeClass('alert-success');
          }, 5000);
      },

      beforeSend: function(){
          $('.submit-load').show();
      },

      complete: function(xhr){
           $('.submit-load').hide();
      },

      error: function(error){

      }

   });

  });
</script>

