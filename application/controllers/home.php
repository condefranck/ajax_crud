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
              $this->home_model->add_dep($data);
           }
           else{
            $this->load->view('dept_view.php');
           }

           
        }

        function fonction()
        {
           $this->load->view('fonction_view');
        }

        function employe()
        {
            $this->load->view('employe_view');
        }

    }

    /* End of file home.php */
    /* Location: ./application/controllers/home.php */
 ?>