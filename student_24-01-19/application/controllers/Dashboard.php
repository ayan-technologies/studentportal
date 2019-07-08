<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
            parent::__construct();

            $this->load->helper('url');
            $this->load->model('ManageDashboard');
        }


	public function index()
	{
            $empcount['count']=$this->ManageDashboard->TotalEmployee();
            
            
            $this->load->view('home',$empcount);
	}
        
        public function QuickMail() {

        
            $data['QuickFromID']=$this->session->userdata['userdetails']->EmployeeEmpID;
            $data['QuickFromEmail']=$this->session->userdata['userdetails']->EmployeeEmail;            
            $data['QuickFromName']=$this->session->userdata['userdetails']->EmployeeUserName;
            $data['QuickEmailTo']=$this->input->post('emailto');   
            $data['QuickCCEmailTo']=$this->input->post('ccemailto');   
            $data['QuickSubject']=$this->input->post('subject');
            $data['QuickMessage']=$this->input->post('message');
            $data['QuickDate']=date('Y-m-d H:i:s');


            $result = $this->ManageDashboard->SendQuickMail($data);    

            return true;
        }
        
}
