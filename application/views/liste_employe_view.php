<legend><h4>Liste des Employés</h4></legend>
<div class="row">
  <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
    <div class="alert"></div>
    <div class="table-responsive">
      <table class="table table-striped table-hover table-bordered">
        <thead>
          <tr>
            <th>Matricule</th>
            <th>Nom</th>
            <th>Prénoms</th>
            <th>Contact</th>
            <th>fonction</th>
            <th>Département</th>
            <th>Date d'ajout</th>
            <th>Edition</th>
          </tr>
        </thead>
        <tbody>
         
        </tbody>
      </table>
    </div>
  </div>
</div>

<script>
    function charger () {
        setTimeout(function() {
          $.ajax({
            url : '<?php echo base_url() ?>index.php/home/get_liste_employe',
            type: 'POST',
            success:  function(data) {
              var rep = JSON.parse(data);
              var tab = "";
              for (var i = 0; i < rep.list_employe.length; i++) {
                tab += '<tr>';
                  tab += '<td>'+rep.list_employe[i].matricule+'</td>';
                  tab += '<td>'+rep.list_employe[i].nom+'</td>';
                  tab += '<td>'+rep.list_employe[i].prenom+'</td>';
                  tab += '<td>'+rep.list_employe[i].contact+'</td>';
                  tab += '<td>'+rep.list_employe[i].lib_fonct+'</td>';
                  tab += '<td>'+rep.list_employe[i].lib_dep+'</td>';
                   tab += '<td>'+rep.list_employe[i].date_ajout+'</td>';
                  tab += '<td>';
                  tab += '<button type="button" class="btn btn-xs edit btn-primary" data-toggle="modal" href="#modif_emp" onClick="modifEmp('+rep.list_employe[i].id_employe+')"><span class="glyphicon glyphicon-edit"></span></button>';
                  tab += '<button type="button" class="btn btn-xs supp btn-danger" onClick="suppEmploye('+rep.list_employe[i].id_employe+')"><span class="glyphicon glyphicon-trash"></span></button>';
                  tab += '</td>';
                tab += '</tr>';
              };
              $('tbody').html(tab);
            }

          });
        charger();

        }, 1000);
    }
  charger();

  function suppEmploye(id){
    
    if(window.confirm("Voulez-vous supprimer cet employé ?")){
        $.ajax({
          url: '<?php echo base_url(); ?>index.php/home/supprime_employe/'+id,
          type: 'POST',
          success: function(data){
              var rep = JSON.parse(data);

              $('.alert').addClass('alert-success');
              $('.alert-success').show();
              $('.alert-success').html(rep.msgDelSucess);

              setTimeout(function() {
                $('.alert-success').hide();
                $('.alert-success').html('');
                $('.alert').removeClass('alert-success');
              }, 5000);
          }

        });
        return true;
    }else{
      return false
    }
  }

  function modifEmp (id_emp) {
     id_employe = id_emp;
     var formulaire_emp = $('#form_emp');
     $.ajax({
      url : '<?php echo base_url(); ?>index.php/home/modif_get_emp/'+id_emp,
      type: 'POST',
      data: {},
      success: function(data){
        var rep = JSON.parse(data);
        $('#matricule').val(rep.emp.matricule);
        $('#nom').val(rep.emp.nom);
        $('#prenom').val(rep.emp.prenom);
        $('#contact').val(rep.emp.contact);
        $(formulaire_emp).attr('action', '<?php echo base_url() ?>index.php/home/modif_emp/'+id_emp);

      }
    })

      $.ajax({
        url: '<?php echo base_url(); ?>index.php/home/get_liste_dep',
        type: 'POST',
        data: {},
        success: function(data){
          var rep = JSON.parse(data);
          var opt = '';
          opt += '<option value="">Choisissez une fonction</option>';
          for (var i = 0; i <= rep.list_dep.length; i++) {
            opt += '<option value="'+rep.list_dep[i].id_fonct+'">'+rep.list_dep[i].lib_fonct+'</option>';
          };

          $('#departement').val(opt);
        }

      })
   


  }

 




</script>