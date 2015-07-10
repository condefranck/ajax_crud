<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>CRUD FULL AJAX | CodeIgnter</title>

    <!-- material CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap/css/roboto.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap/css/material-fullpalette.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap/css/ripples.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">

  

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
        

<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo site_url('home') ?>">AJAX</a>
    </div>
    <div class="navbar-collapse collapse navbar-inverse-collapse">
        <ul class="nav navbar-nav">
            <li><a id="ajout_dept" href="#">Departement</a></li>
            <li><a href="#" id="ajout_fonct">Fonction</a></li>
            <li><a href="#" id="ajout_employe">Employé</a></li>
            <li class="dropdown">
                <a href="#" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Voir la liste <b class="caret"></b></a>
                <ul class="dropdown-menu liste">
                    <li><a href="#" id="liste_dep">Departement</a></li>
                    <li><a href="#" id="liste_fonct">Fontion</a></li>
                    <li><a href="#" id="liste_employe">Employé</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-xs-12 col-md-10 col-md-offset-1">
    <div class="contenu">
      <div class="msg-home">
        <h2>Gestionnaire des employés | CRUD en full AJAX et CodeIgniter</h2>
      </div>
      <div class="loader">
        
      </div>
    </div>
    </div>
  </div>
</div>


<!-- modal modif departement -->
<div class="modal fade" id="modif-dep">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Modication de departement</h4>
      </div>
      <div class="modal-body">
          <?php 
              $class = array('class' => 'form-horizontal', 'id' => 'form-dep' );
              echo form_open('', $class); 
          ?>
 
         
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


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="fermer_dep">fermer</button>
        <button type="submit" class="btn btn-primary">Modifier</button>
      </div>  
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- modal modif fonction -->

<div class="modal fade" id="modif-fonct">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Modication de fonction</h4>
      </div>
      <div class="modal-body">
          <?php 
              $class = array('class' => 'form-horizontal', 'id' => 'form-fonct' );
              echo form_open('', $class); 
          ?>
 
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

              </select>
            </div>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="fermer">fermer</button>
        <button type="submit" class="btn btn-primary">Modifier</button>
      </div>  
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal modif employé -->


<div class="modal fade" id="modif_emp">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Modifier un employé</h4>
      </div>
      <div class="modal-body">
        
        <?php echo form_open('', $attr = array('role' => 'form', 'id' => 'form_emp')); ?>
        
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
              
             
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="fonction" class="col-lg-3 control-label">Departement</label>
          <div class="col-lg-9">
            <select name="departement" id="departement" required class="form-control">
              
             
            </select>
          </div>
        </div>
        <p>&nbsp;</p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">fermer</button>
        <button type="submit" class="btn btn-primary">Modifier</button>
      </div>
      </form>
    </div>
  </div>
</div>

   <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.11.2.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/material.js"></script>
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/ripples.js"></script>

      <script>
          $(document).ready(function() {
            var base_url = '<?php echo base_url(); ?>';
            var ctrl_home = 'home';

            $('.navbar-nav > li:not(:eq(3)) a, .liste > li a').click(function() {
                $('.contenu').html('');
                $('.contenu').html('<div class="loader"></div>');
                $('.loader').css('display', 'block');

                if ($('.navbar-nav li').hasClass('active')) {
                    $('.navbar-nav li').removeClass('active');
                };

                $(this).parent('li').addClass('active');
            });


         

            $('#ajout_dept').click(function() {

                //Recupération du contenu
                setTimeout(function(){  
                  $('.contenu').load(base_url + 'index.php/' + ctrl_home + '/departement',
                    function(){ 
                       $('.loader').css('display', 'none');
                    });
                }, 1000);
            });

            $('#ajout_fonct').click(function() {

                //Recupération du contenu
                setTimeout(function(){ 
                  $('.contenu').load(base_url + 'index.php/' + ctrl_home + '/fonction',
                    function(){ 
                       $('.loader').css('display', 'none');
                    });
                }, 1000);
            });

            $('#ajout_employe').click(function() {

                //Recupération du contenu
                setTimeout(function(){ 
                  $('.contenu').load(base_url + 'index.php/' + ctrl_home + '/employe',
                    function(){ 
                       $('.loader').css('display', 'none');
                    });
                }, 1000);
            });

            $('#liste_dep').click(function() {
              setTimeout(function() {
                 $('.contenu').load(base_url + 'index.php/' + ctrl_home + '/liste_dep',
                  function(){
                   $('.loader').css('display', 'none');
                });   
               }, 1000);
            });

            $('#liste_fonct').click(function() {
              setTimeout(function() {
                $('.contenu').load(base_url + 'index.php/' + ctrl_home + '/liste_fonct',function() {
                  $('.loader').css('display', 'none');
                })
              }, 1000);
            });

            $('#liste_employe').click(function() {
              setTimeout(function() {
                $('.contenu').load(base_url + 'index.php/' + ctrl_home + '/liste_employe',function() {
                  $('.loader').css('display', 'none');
                })
               }, 1000);
            });

        });
      </script>
    
  </body>
</html>


 