<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class ManageDashboard extends CI_Model {
    
    public function __construct(){
        parent::__construct();
    }

    
    public function TotalEmployee(){
        
        $this->db->select('*');
        $this->db->from('employeedetails');
        $query = $this->db->get();        
        $totemp=$query->num_rows();
        
        $this->db->select('*');
        $this->db->where("EmployeeDepartment", 1);
        $this->db->from('employeedetails');
        $query = $this->db->get();    
        $adminemp=$query->num_rows();
        
        $this->db->select('*');
        $this->db->where("EmployeeDepartment", 2);
        $this->db->from('employeedetails');
        $query = $this->db->get();    
        $animemp=$query->num_rows();
        
        $this->db->select('*');
        $this->db->where("EmployeeDepartment", 3);
        $this->db->from('employeedetails');
        $query = $this->db->get();    
        $webemp=$query->num_rows();
        
        $this->db->select('*');
        $this->db->where("EmployeeDepartment", 4);
        $this->db->from('employeedetails');
        $query = $this->db->get();    
        $appemp=$query->num_rows();
        
        $emp=array("Total"=>$totemp, "Admin"=>$adminemp, "Animation"=>$animemp, "WebDevelopment"=>$webemp, "AppDevelopment"=>$appemp);
        
        return $emp;
        
    }
    
    
    public function SendQuickMail($data){
       
        
        $query = $this->db->insert('quickmail',$data);   
        $lid= $this->db->insert_id();
               
        $emailto=explode(",",$data['QuickEmailTo']);
        $ccemailto=explode(",",$data['QuickCCEmailTo']);
        
        $frm=$this->session->userdata['userdetails']->EmployeeEmail;
        $name=$this->session->userdata['userdetails']->EmployeeUserName;   
        
        $subject=$data['QuickSubject'];
        
        $msg="<table width='100%' border='0' cellspacing='0' cellpadding='0'>
                <tr><td height='10' style='height:10px;'></td></tr>
                <tr><td>".$data['QuickMessage']."</td></tr>
                <tr><td height='10' style='height:10px;'></td></tr>
                <tr><td>".$this->session->userdata['userdetails']->EmployeeFirstName." ".$this->session->userdata['userdetails']->EmployeeLastName.",</td></tr>
                <tr><td>".$this->session->userdata['userdetails']->DesignationName.",</td></tr>
                <tr><td>TCP International Inc.</td></tr>
            </table>";
        
            $to=$emailto[$i];

            $this->load->library('email');

            $config['protocol'] = 'sendmail';
            $config['mailpath'] = '/usr/sbin/sendmail';
            $config['charset'] = 'iso-8859-1';
            $config['wordwrap'] = TRUE;

            $this->email->initialize($config);

            $this->email->set_mailtype('html');

            $this->email->from($frm, $name);
            $this->email->to($data['QuickEmailTo']);
            $this->email->cc($data['QuickCCEmailTo']);

            $this->email->subject($subject);
            $this->email->message($msg);

            $this->email->send();
        }
       
    
}
