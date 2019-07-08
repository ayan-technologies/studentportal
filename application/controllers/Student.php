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
       $student_data['stdlist'] = $this->ManageStudents->GetStudentData();
       $this->load->view('student',$student_data);
       
    }
    // function selstudentdata()
    // {
    //     $data['class']=$this->input->post('class_');
    //     $data['sec']=$this->input->post('section_');  
    //     $data['school_id']=$this->session->userdata['userdetails']->college_id;
    //     $selectedclassStudent= $this->ManageStudents->getclassstudentlist($data);       

    //     echo json_encode($selectedclassStudent);
    // }
    function addstudent()
    {
        $std_name=$this->input->post('stu_name');
        $fathername=$this->input->post('father_name');
        $mthername=$this->input->post('mother_name');
        $loginname=($fathername==''? $std_name.$mthername : $std_name.$fathername);
        $data['department_id']='6';
        $data['user_role']=5;
        $data['college_id']=$this->session->userdata['userdetails']->college_id;
        $data['Login_Name']=$loginname;
        $data['login_pwd']=base64_encode($loginname);
        $data['std_id']=$this->input->post('std_id');
        $data['std_name']=$this->input->post('stu_name');
        $data['DOB']=$this->input->post('std_dob');  
        $data['address']=$this->input->post('std_address');
        $data['father_name']=$this->input->post('father_name');  
        $data['mother_name']=$this->input->post('mother_name');  
        $data['mobile_no']=$this->input->post('contact_no');
        $data['contatc_no']=$this->input->post('contact_no2');  
        $data['sec_id']=$this->input->post('sec_id');
        $data['std_email']=$this->input->post('email');
        $data['class_id']=$this->input->post('classid');  

        $selectedclassStudent= $this->ManageStudents->newstudentadd($data);
        echo $selectedclassStudent;
    }
}
