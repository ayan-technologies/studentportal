<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$encrypt_key='CBE006TCP';

class ManageStudents extends CI_Model {
    
    public function __construct(){
        parent::__construct();
        //$this->load->model('Encrypt');
    }

    function GetStudentData()
    {
        $this->db->select('*');
        $this->db->from('studentdetails');       
        $query = $this->db->get();       
        if($query)
        {
            return $query->row();
        }
        else{
            return false;
        }
    }
}
