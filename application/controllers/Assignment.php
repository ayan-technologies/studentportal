<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assignment extends CI_Controller 
{    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('ManageProfile'); 
        $this->load->model('ManageEmployee');       
        $this->load->model('ManageAssignment');
    }
    public function Putassignment()
    {
        $this->load->view('assignment');   
    } 
    public  function submitAssignment()
    {        
        $data['school_id']=$this->session->userdata['userdetails']->college_id;
        $data['class_id']=$this->input->post('class_');
        $data['sec_id']=$this->input->post('section_');   
        $data['sub_id']=$this->input->post('subject_');
        $data['assignment_topic']=$this->input->post('topic');
        $data['date_of_submission']=$this->input->post('submissionDate');
        $data['message']=$this->input->post('message');
        $data['created_by']=$this->session->userdata['userdetails']->EmployeeID;
        $result = $this->ManageAssignment->setAssignmentData($data);        
        // print_r($result);
        // return $result;
        // return true; 
    }
    public function setAttendance()
    {      
       $attendance_val=json_encode($this->input->post('present_val'));
       $attendanceval=json_decode($attendance_val);
       print_r($attendanceval);

       $student_id=json_encode($this->input->post('student_id'));
       $studentid=json_decode($student_id);

       $data['class_id']=$this->input->post('class_'); 
       $data['sec_id']=$this->input->post('section_');
       $data['created_by']=$this->session->userdata['userdetails']->EmployeeID;

       foreach($attendanceval as $key => $value) 
       { 
        $data['present_absent']=$value;
        $data['std_id']=$studentid[$key];
        // print_r($data);
         $result = $this->ManageAssignment->setAttendanceDay($data);
       }      
    }
}
