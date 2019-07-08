<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calender extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('ManageCalender');
    }

    public function LeaveCalender() 
    {
        $user_data['leavehistory'] = $this->ManageCalender->GetLeaveHistory();
        $this->load->view('leavecalender',$user_data);
    }

    public function AddHoliday() 
    {
       $data['OfficialLeaveFrom']=$this->input->post('OfficialLeaveFrom');
       $data['OfficialLeave']=$this->input->post('OfficialLeave');
       $data['OfficialStatus']='1';
       $data['OfficialDateCreated']=date('Y-m-d H:i:s');
       $data['OfficialCreatedBy']=$this->session->userdata['userdetails']->EmployeeID;
        $user_data['holiday'] = $this->ManageCalender->HolidayAdd($data);
        echo $user_data;
    }

    public function DeleteHoliday() 
    {
        $dataid=$this->input->post('OfficialID');
        $user_data = $this->ManageCalender->Deleteholiday($dataid);
        echo  $user_data;
    }
    
}
