<legend><h4>Liste des Départements</h4></legend>
<div class="row">
  <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
    <div class="alert"></div>
    <div class="table-responsive">
      <table class="table table-striped table-hover table-bordered">
        <thead>
          <tr>
            <th>Libellé</th>
            <th>Description</th>
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
  function charger(){
  setTimeout( function(){
    // on lance une requête AJAX
    $.ajax({
      url : "<?php echo base_url(''); ?>index.php/home/get_liste_dep",
      type : 'POST',
      success : function(data){
        var rep = JSON.parse(data);
        var tab = '';
        for (var i = 0; i < rep.list_dep.length; i++) {
          tab += "<tr>";
          tab += "<td>"+rep.list_dep[i].lib_dep+"</td>";
          tab += "<td>"+rep.list_dep[i].desc_dep+"</td>";
          tab += "<td>"+rep.list_dep[i].date_ajout+"</td>";
          tab += "<td>";
          tab += "<button type='button' class='btn btn-xs edit btn-primary' data-toggle='modal' href='#modif-dep' onClick='modifDep("+rep.list_dep[i].id_dep+")'><span class='glyphicon glyphicon-edit'></span></button>"
          tab += "<button type='button' class='btn btn-xs supp btn-danger' onClick='suppDep("+rep.list_dep[i].id_dep+")'><span class='glyphicon glyphicon-trash'></span></button>";
          tab +="</td>";
          tab += "</tr>";
        };
        $('tbody').html(tab);
      }
    });
    charger(); // on relance la fonction
    }, 1000); // on exécute le chargement toutes les 5 secondes
  }
charger();

function suppDep(id){
  if(window.confirm("Voulez-vous supprimer ce departement ?")){
     $.ajax({
      url: "<?php echo base_url(''); ?>index.php/home/supprime_dep/"+id,
      type: 'GET',
      success: function (data) {
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
  }
  else{
    return false;
  }
 
}


function modifDep(id) {
  var formulaire_dep = $('#form-dep');
  id_depart = id;
  $.ajax({
    url: '<?php echo base_url(); ?>index.php/home/modif_get_dep/'+id,
    type: 'POST',
    data: {},
    success: function(data){
        var rep = JSON.parse(data);
        $('#lib_dep').val(rep.dep.lib_dep);
        $('#desc_dep').val(rep.dep.desc_dep);
        $(formulaire_dep).attr('action', '<?php echo base_url(); ?>index.php/home/modif_dep/'+id);
    }

  })
}

/**
*  Modification dans la bd
**/

var formulaire_dep = $('#form-dep');
$(formulaire_dep).submit(function(event) {
  event.preventDefault();
  var donnees = $(formulaire_dep).serialize();
  $('#fermer_dep').trigger('click');

  $.ajax({
    url: '<?php echo base_url(); ?>index.php/home/modifDep/'+id_depart,
    type: 'POST',
    success: function(data) {
        $('.alert').addClass('alert-success');
        $('.alert-success').show();
        $('.alert-success').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Modification du departement effectuée avec succès');
        setTimeout(function() {
          $('.alert').html('');
          $('.alert').hide();
          $('.alert').removeClass('alert-success');
        }, 5000);  
    }
  })

});


</script>
