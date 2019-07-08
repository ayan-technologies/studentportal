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
        $this->db->select('stdetail.std_id, stdetail.std_name, stdetail.DOB `DOB` ,stdetail.address, stdetail.father_name, stdetail.mother_name,
            stdetail.mobile_no, stdetail.contatc_no, stdetail.contatc_no2, stdetail. sec_id , stdetail.Exam_no, stdetail.Academic_year, 
            stdetail.std_email,dept.DepartmentName');
        $this->db->from('studentdetails as stdetail');
        $this->db->join('department as dept', 'stdetail.department_id=dept.DepartmentID', 'inner');              
        $query = $this->db->get();   

        // print_r($this->db->last_query());    
        if($query)
        {
            
            return $query->result_array();
        }
        else{
            return false;
        }
    }
    function getclassstudentlist()
    {
        // print_r($_SESSION['userdetails']->{'sec_id'});
        // print_r($_SESSION['userdetails']->{'college_id'});

        $this->db->select('Uid, department_id, user_role, college_id, std_name, std_id, sec_id, class_id');
        $this->db->from('studentdetails');
        $this->db->where("class_id", $_SESSION['userdetails']->{'class_id'});
        $this->db->where("sec_id",$_SESSION['userdetails']->{'sec_id'});
        $this->db->where("college_id",$_SESSION['userdetails']->{'college_id'}); 
        $query = $this->db->get();
        // print_r($this->db->last_query());
        if($query)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        }
    }
    function newstudentadd($data)
    {
        $this->db->select('*');
        $this->db->from('studentdetails');
        $this->db->where("std_id", $data['std_id']);
        $this->db->where("college_id", $data['college_id']);
        $query2 = $this->db->get();
        $stdid_count=$query2->row();
        if($stdid_count=='')
        {
            $query = $this->db->insert('studentdetails',$data); 
            $add_student= $this->db->insert_id();
            // print_r($this->db->last_query());
            if($add_student!=0)
            {               
                return true;
            } 
            else
            {
                return false;
            }   
        }
        else
        {
            return 0;
        }
    }
    function getAttendance()
    {
        $this->db->select('sd.std_id, at.id, at.class_id, at.sec_id, at.std_id, at.present_absent,Date_Format(at.created_date,"%d-%m-%Y")"created_date"');
        $this->db->from('studentdetails sd');
        $this->db->join('attendance as at', 'sd.std_id=at.std_id', 'inner');
        $this->db->where("MONTH(at.created_date)= MONTH(CURRENT_DATE())");
        $this->db->where("sd.class_id", $_SESSION['userdetails']->{'class_id'});
        $this->db->where("sd.sec_id",$_SESSION['userdetails']->{'sec_id'});
        $this->db->where("sd.college_id",$_SESSION['userdetails']->{'college_id'});
        $query = $this->db->get();
        // print_r($this->db->last_query());
        if($query)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        }
    }
}
