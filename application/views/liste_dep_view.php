<legend><h4>Liste des Départements</h4></legend>
<div class="row">
  <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
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
          tab += "<button type='button' class='btn btn-xs edit btn-primary'><span class='glyphicon glyphicon-edit'></span></button>"
          tab += "<button type='button' class='btn btn-xs supp btn-danger'><span class='glyphicon glyphicon-trash'></span></button>";
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
</script>
