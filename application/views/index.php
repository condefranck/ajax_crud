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
                <ul class="dropdown-menu">
                    <li><a href="#">Departement</a></li>
                    <li><a href="#">Fontion</a></li>
                    <li><a href="#">Employé</a></li>
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


   <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.11.2.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/material.js"></script>
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/ripples.js"></script>

      <script>
          $(document).ready(function() {
            var base_url = '<?php echo base_url(); ?>';
            var ctrl_home = 'home';

            $('.navbar-nav li a').click(function() {
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

        });
      </script>
    
  </body>
</html>


 