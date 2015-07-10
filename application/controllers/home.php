<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Home extends CI_Controller {
        function __construct()
        {
            parent::__construct();
        }

        function index()
        {
            $this->load->view('index.php');
        }

        function departement()
        {
          $this->form_validation->set_rules('lib_dep', 'Nom du departement', 'trim|required|xss_clean');
          $this->form_validation->set_rules('desc_dep', 'Description du departement', 'trim|required|xss_clean');

           if ($this->form_validation->run()) {
              $data = array(
                'lib_dep' => $this->input->post('lib_dep'),
                'desc_dep' => $this->input->post('desc_dep')
              );
              sleep(2);
              $this->home_model->add_dep($data);
              echo json_encode(array(
                'msgSucces' => '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Félicitation !</strong> enregistrement effectué avec succès'
              ));
           }
           else{
            
            $this->load->view('dept_view.php');
           }

           
        }


        function fonction()
        {
          $this->form_validation->set_rules('lib_fonct', 'Fonction', 'trim|required|xss_clean');
          $this->form_validation->set_rules('desc_fonct', 'Description', 'trim|required|xss_clean');

          if ($this->form_validation->run()) {
            $data = array(
              'lib_fonct' => $this->input->post('lib_fonct'), 
              'desc_fonct' => $this->input->post('desc_fonct'),
              'id_dep' => $this->input->post('id_dep')
            );
            sleep(2);
            $this->home_model->add_fonct($data);
             echo json_encode(array('msgSucces' => '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <strong>Félicitation !</strong> enregistrement effectué avec succès'
              ));
          }else{
             $data['rows'] = $this->home_model->get_dep();
             $this->load->view('fonction_view', $data);
          }
          
        }

        function employe()
        {
          $this->form_validation->set_rules('matricule', 'N° matricule', 'trim|required|xss_clean');
          $this->form_validation->set_rules('nom', 'Nom', 'trim|required|xss_clean');
          $this->form_validation->set_rules('prenom', 'Prenom', 'trim|required|xss_clean');
          $this->form_validation->set_rules('contact', 'Contact', 'trim|required|xss_clean');
          $this->form_validation->set_rules('fonction', 'Fonction', 'trim|required|xss_clean');
          $this->form_validation->set_rules('departement', 'Departement', 'trim|required|xss_clean');
          if ($this->form_validation->run()) {
            $data = array(
              'matricule' => $this->input->post('matricule'), 
              'nom' => $this->input->post('nom'),
              'prenom' => $this->input->post('prenom'),
              'contact' => $this->input->post('contact'),
              'fonction' => $this->input->post('fonction'),
              'departement' => $this->input->post('departement')
            );
            sleep(2);
            $this->home_model->add_employe($data);
            echo json_encode(array('msgSucces' => '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <strong>Félicitation !</strong> enregistrement effectué avec succès'
              ));
          }
          else{
            $data['fonct'] = $this->home_model->get_fonct();
            $this->load->view('employe_view', $data);
          }
            
        }

        function get_departement(){
           if ($this->uri->segment(3)) {
              sleep(1);
              $data = $this->home_model->join_fonct_dep($this->uri->segment(3));
              echo json_encode(array('dep' => $data ));
            }
        }

        function liste_dep()
        {
          $this->load->view('liste_dep_view');
        }

        function get_liste_dep(){
          $data = $this->home_model->list_get_dep();
          echo json_encode(array('list_dep' => $data));
        }

        function liste_fonct(){
          $this->load->view('liste_fonct_view');
        }

        function get_liste_fonct()
        {
          $data = $this->home_model->list_get_fonct();
          echo json_encode(array('list_fonct' =>  $data));
        }

        function liste_employe()
        {
          $this->load->view('liste_employe_view');
        }
        
        function get_liste_employe()
        {
         $data = $this->home_model->list_get_employe();
         echo  json_encode(array('list_employe' => $data));
        }

        function supprime_dep(){
          if ($this->uri->segment(3)) {
           sleep(2);
           $this->home_model->delete_dep($this->uri->segment(3));
           echo json_encode(array('msgDelSucess'=> '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Suppression effectuée avec succès'));
          }
          else
          {
            return false;
          }
        }

         function supprime_fonct(){
          if ($this->uri->segment(3)) {
           sleep(2);
           $this->home_model->delete_fonct($this->uri->segment(3));
           echo json_encode(array('msgDelSucess'=> '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Suppression effectuée avec succès'));
          }
          else
          {
            return false;
          }
        }

        function supprime_employe(){
          if ($this->uri->segment(3)) {
           sleep(2);
           $this->home_model->delete_employe($this->uri->segment(3));
           echo json_encode(array('msgDelSucess'=> '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Suppression effectuée avec succès'));
          }
          else
          {
            return false;
          }
        }

        function modif_get_fonct(){
           if ($this->uri->segment(3)) {
              $data = $this->home_model->join_fonct_dep($this->uri->segment(3));
              echo json_encode(array('dep' => $data ));
            }
        }

        function modifFonct(){
          if ($this->uri->segment(3)) {
            $this->form_validation->set_rules('lib_fonct', 'Nom de la fonction', 'trim|required|xss_clean');
            $this->form_validation->set_rules('desc_fonct', 'Description de la fonction', 'trim|required|xss_clean');
            $this->form_validation->set_rules('id_dep', 'Departement', 'trim|required|xss_clean');
            if ($this->form_validation->run()) {

              $data = array(
                'lib_fonct' =>  $this->input->post('lib_fonct'),
                'desc_fonct' =>  $this->input->post('desc_fonct'),
                'id_dep' =>  $this->input->post('id_dep'),
              );

              sleep(2);
              $this->home_model->update_fonct($this->uri->segment(3), $data);
            }

        } 
        else{
          return false;
        }

      
    }

    function modif_get_dep()
    {
       if ($this->uri->segment(3)) {
         $data = $this->home_model->get_one_dep($this->uri->segment(3));
         echo json_encode(array('dep' => $data ));

       }
    }

    function modifDep()
    {
      if ($this->uri->segment(3)) {
       
        $this->form_validation->set_rules('lib_dep', 'Departement', 'trim|required|xss_clean');
        $this->form_validation->set_rules('desc_dep', 'Description', 'trim|required|xss_clean');

        if ($this->form_validation->run()) {
          $data = array(
            'lib_dep' => $this->input->post('lib_dep'), 
            'desc_dep' => $this->input->post('desc_dep'),
          );

          sleep(2);
          $this->home_model->update_dep($this->uri->segment(3), $data);

        }
      }
      else{
        return false;
      }
     
     
    }


    function modif_get_emp()
    {
      if ($this->uri->segment(3)) {
        $data = $this->home_model->get_only_emp($this->uri->segment(3));
        echo json_encode(array('emp' => $data));
      }else{
        return false;
      }
    }

    function get_emp_fonct()
    {
      $data = $this->home_model->get_fonct();
      echo json_encode(array('fonct' => $data));
    }

    function modif_emp()
    {
      if ($this->uri->segment(3)) {
        $this->form_validation->set_rules('matricule', 'Matricule', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nom', 'Nom', 'trim|required|xss_clean');
        $this->form_validation->set_rules('prenom', 'Prenom', 'trim|required|xss_clean');
        $this->form_validation->set_rules('contact', 'Contact', 'trim|required|xss_clean');
        $this->form_validation->set_rules('fonction', 'Fonction', 'trim|required|xss_clean');

        if ($this->form_validation->run()) {
         $data = array(
          'matricule' =>  $this->input->post('matricule'),
          'nom' =>  $this->input->post('nom'),
          'prenom' =>  $this->input->post('prenom'),
          'contact' =>  $this->input->post('contact'),
          'fonction' =>  $this->input->post('fonction'),
          'departement' =>  $this->input->post('departement')
          );
        }
        sleep(2);
        $this->home_model->update_emp($this->uri->segment(3), $data);
      }else{
        return false;
      }
     
    }

}



    /* End of file home.php */
    /* Location: ./application/controllers/home.php */
 ?>