<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageCalender extends CI_Model {
    
    public function __construct(){
        parent::__construct();
    }    
    
    
    public function GetLeaveHistory(){       
        if($this->session->userdata['userdetails']->EmployeeUserRole==1 || $this->session->userdata['userdetails']->EmployeeUserRole==2){
            $this->db->select('leaveapplication.*, employeedetails.EmployeeFirstName, employeedetails.EmployeeLastName');
            $this->db->from('leaveapplication');
            $this->db->join('employeedetails', 'leaveapplication.LeaveEmployee = employeedetails.EmployeeEmpID', 'left'); 
            $this->db->order_by("LeaveID", "desc");
            $query = $this->db->get();
            $fet=$query->result_array();
            foreach($fet as $fe){
                if($fe['LeaveType']=='Leave' && ( $fe['LeaveStatus']=='Approved' || $fe['LeaveStatus']=='Rejected')){
                    $title=$fe['EmployeeFirstName'].' '.$fe['EmployeeLastName'];
                    $bgcolor='#f56954';
                    $start=$fe['LeaveFromDate'];
                    $end=$fe['LeaveToDate'];
                }else{
                    $title=$fe['EmployeeFirstName'].' '.$fe['EmployeeLastName'];
                    $bgcolor='#00c0ef';
                    $start=$fe['LeavePermissionDate'];//." ".$fe['LeavePermissionFrom'];
                    $end=$fe['LeavePermissionDate'];//." ".$fe['LeavePermissionTo'];
                }
                $result[]=array("title"=>$title,"start"=>$start,"end"=>$end,"backgroundColor"=>$bgcolor,"borderColor"=>'#bbb');
            }
        }
        
        if($this->session->userdata['userdetails']->EmployeeUserRole==3 || $this->session->userdata['userdetails']->EmployeeUserRole==4){
            $this->db->select('leaveapplication.*, employeedetails.EmployeeFirstName, employeedetails.EmployeeLastName');
            $this->db->from('leaveapplication');
            $this->db->join('employeedetails', 'leaveapplication.LeaveEmployee = employeedetails.EmployeeEmpID', 'left');             
            $this->db->where("leaveapplication.LeaveEmployee", $this->session->userdata['userdetails']->EmployeeID);
            $this->db->where("leaveapplication.LeaveStatus", 'Approved');
            $this->db->order_by("LeaveID", "desc");
            $query = $this->db->get();
            $fet=$query->result_array();
            foreach($fet as $fe){
                if($fe['LeaveType']=='Leave'){
                    $title=$fe['EmployeeFirstName'].' '.$fe['EmployeeLastName'];
                    $bgcolor='#f56954';
                    $start=$fe['LeaveFromDate'];
                    $end=$fe['LeaveToDate'];
                }else{
                    $title=$fe['EmployeeFirstName'].' '.$fe['EmployeeLastName'];
                    $bgcolor='#00c0ef';
                    $start=$fe['LeavePermissionDate'];//." ".$fe['LeavePermissionFrom'];
                    $end=$fe['LeavePermissionDate'];//." ".$fe['LeavePermissionTo'];
                }
                $result[]=array("title"=>$title,"start"=>$start,"end"=>$end,"backgroundColor"=>$bgcolor,"borderColor"=>'#bbb');
            }
        }
        
        $this->db->select('*');
        $this->db->from('officialleave');
        $this->db->order_by("OfficialID", "desc");
        $query = $this->db->get();
        $fet=$query->result_array();
        foreach($fet as $fe){            
            $result[]=array("title"=>$fe['OfficialLeave'],"start"=>$fe['OfficialLeaveFrom'],"end"=>$fe['OfficialLeaveTill'],"backgroundColor"=>'#f39c12',"borderColor"=>'#bbb');
        }
        
        return $result;
    }
    
    public function HolidayList($sdate,$edate){
        $this->db->select('*');
        $this->db->from('officialleave');
        $condition=("OfficialLeaveFrom between '".$sdate."' and '".$edate."'");
        $this->db->where($condition);
        $this->db->order_by("OfficialLeaveFrom", "asc");
        $query = $this->db->get();
        $shrow=$query->num_rows();
        if($shrow>0){
            $fet=$query->result_array();

            foreach($fet as $fe){            
                $date=date('jS M, Y',strtotime($fe['OfficialLeaveFrom']));
                $result[]=array("offid"=>$fe['OfficialID'],"Title"=>$fe['OfficialLeave'],"Start"=>$date,"Day"=>$fe['OfficialLeaveDay']);
            }
        }
        
        return $result;
    }


     public function HolidayAdd($data){

        $data['OfficialLeaveFrom'] =date('Y-m-d', strtotime($data['OfficialLeaveFrom']));
        $data['OfficialLeaveDay'] =date('l', strtotime($data['OfficialLeaveFrom']));

        $query = $this->db->insert("officialleave", $data);
        
        if($query){

            return true;
        }
        else{
            return false;
        }



     }

     public function Deleteholiday($data)
    {

        $this->db->where('OfficialID', $data);
        $query=$this->db->delete('officialleave'); 
        if($query){

            return true;
        }
        else{
            return false;
        }
        
    }
    
   
}
