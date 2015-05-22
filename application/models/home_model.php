<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {
    function __construct()
    {
        parent::__construct();

    }

    function add_dep($data)
    {
        $this->db->insert('departement', $data);  
    }

    function get_dep(){
        $q = $this->db->get('departement');
        if ($q->num_rows > 0) {
            foreach($q->result() as $row) {
               $data[] = $row;
            }
        }
        return $data;
    }

    function add_fonct($data){
        $this->db->insert('fonction', $data);
    }

    function get_fonct()
    {
       $q = $this->db->get('fonction');
       if ($q->num_rows > 0) {
          foreach($q->result() as $row) {
            $data[] = $row;
          }
       }
       return $data;
    }

    function add_employe($data)
    {
      $this->db->insert('employe', $data);
    }

     function join_fonct_dep($id){
        $this->db->where('id_dep', $id);
        $q = $this->db->get('departement');
        if ($q->num_rows > 0) {
          $row = $q->row();
          return $row;
        }
    }

}

/* End of file home_model.php */
/* Location: ./application/models/home_model.php */

?>