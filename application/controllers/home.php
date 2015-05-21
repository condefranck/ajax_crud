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
          $this->form_validation->set_rules('fonct', 'Fonction', 'trim|required|xss_clean');
          $this->form_validation->set_rules('desc_fonct', 'Description', 'trim|required|xss_clean');

          if ($this->form_validation->run()) {
            $data = array(
              'lib_fonct' => $this->input->post('lib_fonct'), 
              'desc_fonct' => $this->input->post('desc_fonct')
            );
          }else{
             $this->load->view('fonction_view');
          }
          
        }

        function employe()
        {
            $data = $this->home_model->get_dep();
            $this->load->view('employe_view', $data);
        }

    }

    /* End of file home.php */
    /* Location: ./application/controllers/home.php */
 ?>