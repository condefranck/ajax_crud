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
      
    }

    /* End of file home.php */
    /* Location: ./application/controllers/home.php */
 ?>