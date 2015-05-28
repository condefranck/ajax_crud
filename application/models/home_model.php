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
       $this->db->order_by('lib_dep', 'asc');
        $q = $this->db->get('departement');
        if ($q->num_rows() > 0) {
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
      $this->db->order_by('lib_fonct', 'asc');
       $q = $this->db->get('fonction');
       if ($q->num_rows() > 0) {
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
      $this->db->select()->from('fonction');
      $this->db->where('id_fonct', $id);
      $this->db->join('departement', 'departement.id_dep = fonction.id_dep', 'left');
      $q = $this->db->get();
      if($q->num_rows() > 0){
        $data = $q->row();
        return $data;
      }

      
    }

    function list_get_dep($num=10000000,$start=0){
       $this->db->select()->from('departement')->limit($num,$start);
       $q = $this->db->get();
       return $q->result_array();  
    }

    function list_get_fonct(){
      $this->db->select()->from('fonction');
      $this->db->join('departement', 'departement.id_dep = fonction.id_dep', 'left');
      $this->db->order_by('id_fonct', 'desc');
      $q = $this->db->get();
      if ($q->num_rows() > 0) {
       foreach ($q->result() as $rows) {
         $data[] = $rows;
       }
      }
      return $data;
    }

    function list_get_employe()
    {
      $this->db->select();
      $this->db->from('employe');
      $this->db->order_by('id_employe', 'desc');
      $this->db->join('fonction', 'fonction.id_fonct = employe.fonction', 'left');
      $this->db->join('departement', 'departement.id_dep = employe.departement', 'left');
      $q = $this->db->get();
      if ($q->num_rows() > 0) {
       foreach ($q->result() as $rows) {
          $data[] = $rows;
       }
      }
      return $data;

    }

    function delete_dep($id){
      $this->db->where('id_dep', $id);
      $this->db->delete('departement');
    }

    function delete_fonct($id){
      $this->db->where('id_fonct', $id);
      $this->db->delete('fonction');
    }

    function delete_employe($id){
      $this->db->where('id_employe', $id);
      $this->db->delete('employe');
    }


}

/* End of file home_model.php */
/* Location: ./application/models/home_model.php */

?>