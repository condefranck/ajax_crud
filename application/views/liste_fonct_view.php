<legend><h4>Liste des fonctions</h4></legend>
<div class="row">
  <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
    <div class="alert"></div>
    <div class="table-responsive">
      <table class="table table-striped table-hover table-bordered">
        <thead>
          <tr>
            <th>Libellé</th>
            <th>Description</th>
            <th>Departement</th>
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
    function charger() {
     setTimeout(function() {
      jQuery.ajax({
        url: '<?php echo base_url() ?>index.php/home/get_liste_fonct',
        type: 'POST',
        success: function(data) {
          var rep = JSON.parse(data);
          var tab = "";
          for (var i = 0; i < rep.list_fonct.length; i++) {
            tab += '<tr>';
            tab += '<td>'+rep.list_fonct[i].lib_fonct+'</td>';
            tab += '<td>'+rep.list_fonct[i].desc_fonct+'</td>';
            tab += '<td>'+rep.list_fonct[i].lib_dep+'</td>';
            tab += '<td>'+rep.list_fonct[i].date_ajout+'</td>';
            tab += '<td>';
            tab += '<button type="button" class="btn btn-xs edit btn-primary" data-toggle="modal" href="#modif-fonct" onClick="modification('+rep.list_fonct[i].id_fonct+')" ><span class="glyphicon glyphicon-edit"></span></button>';
            tab += '<button type="button" class="btn btn-xs supp btn-danger" onClick="suppFonct('+rep.list_fonct[i].id_fonct+')"><span class="glyphicon glyphicon-trash"></span></button>';
            tab +='</td>';
            tab += '</tr>';
          };
          $('tbody').html(tab);
        }
       
      });
      charger();
     }, 1000);
    }

    charger();

     function suppFonct(id){
    if(window.confirm("Voulez-vous supprimer cette fonction ?")){
        $.ajax({
          url: '<?php echo base_url(); ?>index.php/home/supprime_fonct/'+id,
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

  function modification(id) {
    id_dep = id;
    var formulaire = $('#form-fonct');
    $.ajax({
      url: '<?php echo base_url(); ?>index.php/home/modif_get_fonct/'+id,
      type: 'GET',
      success: function(data){
        var rep = JSON.parse(data);
        $('#lib_fonct').val(rep.dep.lib_fonct);
        $('#desc_fonct').val(rep.dep.desc_fonct);
        $(formulaire).attr('action', '<?php echo base_url(); ?>index.php/home/modifFonct/'+id);
      }
    })

     $.ajax({
      url: '<?php echo base_url(); ?>index.php/home/get_liste_dep',
      type: 'GET',
      success: function (data) {
        var rep = JSON.parse(data);
        var opt = '';
            opt += '<option value="" selected>Choisir un département</option>'
        for(var i = 0; i < rep.list_dep.length; i++){
          opt += '<option value="'+rep.list_dep[i].id_dep+'">'+rep.list_dep[i].lib_dep+'</option>';
        }
        $('#id_dep').html(opt);

      }
    })
  }

  var formulaire = $('#form-fonct');
    $(formulaire).submit(function(event) {
       event.preventDefault();
      var donnees = $(formulaire).serialize();
      $('#fermer').trigger('click');
      $.ajax({
          
          url: '<?php echo base_url(); ?>index.php/home/modifFonct/'+id_dep,
          type: 'POST',
          data: donnees,
          success: function(data) {

            $('.alert').addClass('alert-success');
            $('.alert-success').show();
            $('.alert-success').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Modification effectuée avec succès');
            setTimeout(function() {
              $('.alert').html('');
              $('.alert').hide();
              $('.alert').removeClass('alert-success');
            }, 5000);  
          },


      })

    });





</script>


