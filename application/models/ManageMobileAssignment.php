<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageMobileAssignment extends CI_Model {

    public function setAssignmentData($data)
    {
        // print_r($data);
        $query = $this->db->insert('assignment',$data);           
        $assignment= $this->db->insert_id();
        // print_r($this->db->last_query());
        if($assignment!=0)
        {               
            return array('status'=>1,'message' => 'Assignment Inserted Successfully');
        }
        else
        {
            return array('status'=>0,'message' => 'There is some issue');
        }
    }
    
    public function setQuicknotesData($data)
    {       
        $query = $this->db->insert('quickmail',$data);         
        $Quickmail= $this->db->insert_id();
        // print_r($this->db->last_query());
        
        if($Quickmail!=0)
        {
            return array('status'=>1,'message' => 'Quick Notes Inserted');
        }
        else
        {
            return array('status'=>0,'message' => 'Not Inserted');
        }   
    }
}
