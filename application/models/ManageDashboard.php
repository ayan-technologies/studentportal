<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ManageDashboard extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function TotalEmployee()
    {
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
    
    public function SendQuickMail($data)
    {
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
        
    public function getClassData()
    {
            $this->db->select('id,class');
            $this->db->from('class_details');
            $this->db->where("is_active",1);
            $query = $this->db->get();            
            if($query)
            {
                $getClass=$query->result_array();                
                return $getClass;           
            }
            else
            {
                return false;
            }      
    }
    
    public function getClassSubject()
    {
            $this->db->select('id,subject_name');
            $this->db->from('class_subjects');
            $this->db->where("is_active",1);
            $query = $this->db->get();   
            // print_r($this->db->last_query());
            if($query)
            {
                $getsubject=$query->result_array();                
                return $getsubject;           
            }
            else
            {
                return false;
            }      
    }

    public function setHomeworkData($data)
    {
        $this->db->select('*');
        $this->db->from('homework');
        $this->db->where("class_id", $data['class_id']);
        $this->db->where("sec_id", $data['sec_id']);
        $this->db->where("subject_id", $data['subject_id']);
        $this->db->where("school_id", $data['school_id']);
        $this->db->where("Date_Format(created_date,'%d-%m-%Y')=DATE_FORMAT(CURDATE(),'%d-%m-%Y')");
        $query2 = $this->db->get();
        // print_r($this->db->last_query());        
        $homework_count =$query2->num_rows();
        // print_r($homework_count);
        
        if($homework_count>0)
        {
            $this->db->where("class_id", $data['class_id']);
            $this->db->where("sec_id", $data['sec_id']);
            $this->db->where("subject_id",$data['subject_id']);
            $this->db->where("Date_Format(created_date,'%d-%m-%Y')=DATE_FORMAT(CURDATE(),'%d-%m-%Y')");
            $this->db->where("school_id", $data['school_id']);
            $query = $this->db->update('homework',$data);
            // print_r($this->db->last_query()); 
            return "updated Successfully";
        }   
        else
        {
            $query = $this->db->insert('homework',$data);
            // print_r($this->db->last_query()); 
            return "Inserted Successfully";
        }

    }

    public function getdaylist()
    {
        $this->db->select('id,day_name');
        $this->db->from('day_list');
        $this->db->where("is_active", 1);        
        $query = $this->db->get();
        // print_r($this->db->last_query());
         if($query)
        {
                $getdaylist=$query->result_array();                
                return $getdaylist;           
        }
        else
        {
                return false;
        }          
    } 

    public function setQuicknotesData($data)
    {
        $query = $this->db->insert('quickmail',$data);   
        // print_r($this->db->last_query());  
        $Quickmail= $this->db->insert_id();
        // print_r($Quickmail);
        
        if($Quickmail!=0)
        {
            return true;
        }
        else
        {
            return false;
        }   
    }
    public function getquickNotesData()
    {        
        $this->db->select('cs. subject_name ,qm.QuickMessage');
        $this->db->from('quickmail qm');
        $this->db->join('class_subjects cs','cs.id=qm.subject', 
            'left');
        $this->db->where("school_id", $_SESSION['userdetails']->{'college_id'});
        $this->db->where("DATE_FORMAT(QuickDate,'%d-%m-%Y') =DATE_FORMAT(CURDATE(),'%d-%m-%Y')");
        $this->db->where("class",$_SESSION['userdetails']->{'class_id'} );
        $this->db->where("sec", $_SESSION['userdetails']->{'sec_id'}); 
        $this->db->where("staff_id", 0);       
        $query = $this->db->get();
        // print_r($this->db->last_query());
        $num=$query->num_rows();
        $quicknotes_data=[];
        if($num>0)
        {
            $quicknotes_data=$query->result_array();
            return  $quicknotes_data; 
        }
        else
        {
            return $quicknotes_data;
        }
    }
}
