<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageProfile extends CI_Model {
    
    public function __construct(){
        parent::__construct();
        //$this->load->model('Encrypt');
    }    

    public function loginvalidate($user,$pass){
                
        $cryppass= base64_encode($pass);
        
        $this->db->select('*');
        $this->db->from('employee');
        $this->db->where("EmployeeUserName", $user);
        $this->db->where("EmployeePassword", $cryppass);
        $this->db->where("EmployeeStatus", 1);
        $this->db->order_by("EmployeeID", "desc");
        $query = $this->db->get();
        
        $num=$query->num_rows();
        
        if($num>0)
        {
            unset($_SESSION['login']);
            $emp=$query->row();
            
            $this->db->select('employee.EmployeeUserName,employee.EmployeePassword,employeedetails.*,department.DepartmentName,designation.DesignationName');
            $this->db->from('employeedetails');
            $this->db->join('employee', 'employee.EmployeeID = employeedetails.EmployeeEmpID', 'left');            
            $this->db->join('department', 'employeedetails.EmployeeDepartment = department.DepartmentID', 'left');
            $this->db->join('designation', 'employeedetails.EmployeeDesignation = designation.DesignationID', 'left');
            $this->db->where("EmployeeEmpID", $emp->EmployeeID);
            $this->db->order_by("EmployeeID", "desc");
            $query2 = $this->db->get();
            $empdet=$query2->row();
            
            return $empdet;
        }
        else{
            return 'Invalid Login';
        }
    }

    // public function forgotpassword($email){
                
           
    //     $this->db->select('*');
    //     $this->db->from('employeedetails');
    //     $this->db->where("EmployeeEmail", $email);
    //     $query = $this->db->get();       
    //     $num=$query->num_rows();

        
    //     if($num>0)
    //     {            
    //         unset($_SESSION['login']);
    //         $emp=$query->row();

    //         $this->db->select('employee.EmployeeUserName,employee.EmployeePassword');
    //         $this->db->from('employeedetails');
    //         $this->db->join('employee', 'employee.EmployeeID = employeedetails.EmployeeEmpID', 'left');            
    //         $this->db->where("EmployeeEmpID", $emp->EmployeeID);
    //         $query2 = $this->db->get();
    //         $empdet=$query2->row(); 
    //         $username = $empdet->EmployeeUserName;
    //         $password = base64_decode($empdet->EmployeePassword);          

    //         $msg="<table width='100%' border='0' cellspacing='0' cellpadding='0'>
    //                 <tr><td height='10' style='height:10px;'></td></tr>
    //                 <tr><td> Hello <b>".$emp->EmployeeFirstName." ".$emp->EmployeeLastName."</b>, your TCP Employee Portal Login Credentials are given below!</td></tr>
    //                 <tr><td style='height:10px;'></td></tr>
    //                 <tr><td>Username : ".$username."</td></tr>
    //                 <tr><td style='height:10px;'></td></tr>
    //                 <tr><td>Password : ".$password."</td></tr>
    //                 <tr><td style='height:20px;'></td></tr>
    //                 <tr><td>Thank you,</td></tr>
    //                 <tr><td>TCP Webportal Team,</td></tr>
    //                 <tr><td>TCP International Inc.</td></tr>
    //             </table>";

            
    //         $subject="Your TCP Employee Portal Login Credentials";
            

    //         $this->load->library('email');
            
    //         $config['protocol'] = 'sendmail';
    //         $config['mailpath'] = '/usr/sbin/sendmail';
    //         $config['charset'] = 'iso-8859-1';
    //         $config['wordwrap'] = TRUE;

    //         $this->email->initialize($config);
            
    //         $this->email->set_mailtype('html');

    //         $this->email->from($emp->EmployeeEmail, "TCP Employee Portal");
    //         $this->email->to($emp->EmployeeEmail); 

    //         $this->email->subject($subject);
    //         $this->email->message($msg);
            
    //         if($this->email->send()){           
    //             return 'Success';
    //         }else{
    //             return 'Failed';
    //         }
     
    //     }
    //     else{
    //         return 'Invalid Email';
    //     }
    // }
    
    public function GetEmployeeName($empid)
    {
              
                
        $this->db->select('concat(EmployeeFirstName," ",EmployeeLastName) as EmpName , EmployeeCode');
        $this->db->from('employeedetails');
        $this->db->where("EmployeeEmpID", $empid);
        $this->db->order_by("EmployeeID", "desc");
        $query = $this->db->get();
        
        if($query)
        {
            return $query->row();
        }
        else{
            return false;
        }
    }
    
    public function GetEmployeeField($empid,$field)
    {
        $this->db->select($field);
        $this->db->from('employeedetails');
        $this->db->where("EmployeeEmpID", $empid);
        $this->db->order_by("EmployeeID", "desc");
        $query = $this->db->get();
        
        if($query)
        {
            return $query->row();
        }
        else{
            return false;
        }
    
    }
    
    public function GetEmployeeJoinDesignation($dept,$jdesig)
    {        
        $this->db->select('DesignationName');
        $this->db->from('designation');
        $this->db->where("DesignationID", $jdesig);
        // $this->db->where("DesignationDepartment", $dept);
        $query = $this->db->get();    
        $jsig=$query->row();
        
        return $jsig;
    }
}
