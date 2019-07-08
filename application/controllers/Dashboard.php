<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller 
{
	public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->model('ManageDashboard');
    }

	public function index()
	{
        $empcount['count']=$this->ManageDashboard->TotalEmployee();
        $this->load->view('home',$empcount);
	}
    public function dashboard_new()
    {
        // $empcount['count']=$this->ManageDashboard->TotalEmployee();
        $classData['ClassDetails'] = $this->ManageDashboard->getClassData();
        $classData['ClassSubject']=$this->ManageDashboard->getClassSubject();
        $classData['Daylist']=$this->ManageDashboard->getdaylist();
        // $this->load->view('new_home',$classSubject);
        // $this->load->view('new_home',$empcount);
        $this->load->view('new_home',$classData);
    }

    // public function getClassDetails()
    // {
    //$classSubject['ClassSubject']=$this->ManageDashboard->getClassSubject();
    //$this->load->view('new_home',$classSubject);
    // }
        
    // public function QuickMail() 
    // {    
    //     $data['QuickFromID']=$this->session->userdata['userdetails']->EmployeeEmpID;
    //     $data['QuickFromEmail']=$this->session->userdata['userdetails']->EmployeeEmail;            
    //     $data['QuickFromName']=$this->session->userdata['userdetails']->EmployeeUserName;
    //     $data['QuickEmailTo']=$this->input->post('emailto');   
    //     $data['QuickCCEmailTo']=$this->input->post('ccemailto');   
    //     $data['QuickSubject']=$this->input->post('subject');
    //     $data['QuickMessage']=$this->input->post('message');
    //     $data['QuickDate']=date('Y-m-d H:i:s');


    //     $result = $this->ManageDashboard->SendQuickMail($data);    

    //      return true;
    // }
    
    public function SubHomework()
    {
        $data['class_id']=$this->input->post('class_');   
        $data['sec_id']=$this->input->post('section_');   
        $data['subject_id']=$this->input->post('subject_');
        $data['homework']=$this->input->post('message');
        $data['created_id']=$this->session->userdata['userdetails']->EmployeeID;
        $data['school_id']=$this->session->userdata['userdetails']->college_id;
        $result = $this->ManageDashboard->setHomeworkData($data);
        // return $result;
    }  
    public function QuickNotes()
    {
        $data['class']=$this->input->post('class_');   
        $data['sec']=$this->input->post('section_');   
        $data['subject']=$this->input->post('subject_');
        $data['QuickMessage']=$this->input->post('message');        
        $data['created_by']=$this->session->userdata['userdetails']->EmployeeID;
        $data['school_id']=$this->session->userdata['userdetails']->college_id;
        $result = $this->ManageDashboard->setQuicknotesData($data);
        // return $result;
    }       
}
