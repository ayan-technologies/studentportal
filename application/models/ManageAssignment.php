<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ManageAssignment extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        //$this->load->model('Encrypt');
    } 
    public function setAssignmentData($data)
    {        
        $query = $this->db->insert('assignment',$data);   
        // print_r($this->db->last_query());  
        $assignment= $this->db->insert_id();
        // print_r($assignment);
        if($assignment!=0)
        {               
            return true;
        }
        else
        {
            return false;
        }
    }

     public function getcurrentAssignment()
    {
        $this->db->select('cs.subject_name,a. assignment_topic, a.date_of_submission');
        $this->db->from('assignment a');
        $this->db->join('class_subjects cs', 'a.sub_id=cs.id', 'inner');
        $this->db->where("school_id", $_SESSION['userdetails']->{'college_id'});
        $this->db->where("a.date_of_submission >= DATE_FORMAT(CURDATE(),'%d-%m-%Y')");
        $this->db->where("class_id",$_SESSION['userdetails']->{'class_id'} );
        $this->db->where("sec_id", $_SESSION['userdetails']->{'sec_id'});        
        $query = $this->db->get();
        // print_r($this->db->last_query());
        $num=$query->num_rows(); 
        $assignment_data=[];       
        if($num>0)
        {
            $assignment_data=$query->result_array();
            return $assignment_data; 
        }
        else
        {
            return $assignment_data; 
        }
    }

    public function setAttendanceDay($data)
    {
        $this->db->select('*');
        $this->db->from('attendance');
        $this->db->where("std_id", $data['std_id']);
        $this->db->where("Date_Format(created_date,'%d-%m-%Y')=DATE_FORMAT(CURDATE(),'%d-%m-%Y')");
        $query2 = $this->db->get();
        // print_r($this->db->last_query());       
        $atten_count=$query2->row();       
        if($atten_count!='')
        {
            $this->db->where("std_id", $data['std_id']);
            $query = $this->db->update('attendance',$data);
            return "updated Successfully";
        }
        else
        {
            $query = $this->db->insert('attendance',$data);
            return "Inserted Successfully";
        }
    }

}
