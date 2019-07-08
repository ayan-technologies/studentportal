<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        
        $this->load->helper('url');
        $this->load->model('ManageStudents');
    }
    function StudentList()
    {
       $student_data['studlist'] = $this->ManageStudents->GetStudentData();
       $this->load->view('student',$student_data);
    }
}
