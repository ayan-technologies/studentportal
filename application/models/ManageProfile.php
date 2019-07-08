<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ManageProfile extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        //$this->load->model('Encrypt');
    }    

    public function loginvalidate($user,$pass)
    {
        $cryppass= base64_encode($pass);
        
        $this->db->select('*');
        $this->db->from('employee');
        $this->db->where("EmployeeUserName", $user);
        $this->db->where("EmployeePassword", $cryppass);
        $this->db->where("EmployeeStatus", 1);
        $this->db->order_by("EmployeeID", "desc");
        $query = $this->db->get();
        
        $num=$query->num_rows();
        // print($num);
        if($num>0)
        {
            unset($_SESSION['login']);
            $emp=$query->row();
            
            $this->db->select('employeedetails.EmployeeEmpID,employeedetails.EmployeeUserRole,employeedetails.EmployeeFirstName,employeedetails.EmployeeDesignation,employeedetails.EmployeeDepartment,department.DepartmentName,designation.DesignationName,employee.EmployeeID,employee.college_id,employee.class_id,employee.sec_id');
            $this->db->from('employeedetails');
            $this->db->join('employee', 'employee.EmployeeID = employeedetails.EmployeeEmpID', 'inner');
            $this->db->join('department', 'employeedetails.EmployeeDepartment = department.DepartmentID', 'inner');
            $this->db->join('designation', 'employeedetails.EmployeeDesignation = designation.DesignationID', 'inner');
            $this->db->where("EmployeeEmpID", $emp->EmployeeID);
            $this->db->order_by("employee.EmployeeID", "desc");
            $query2 = $this->db->get();
            $empdet=$query2->row();             
            // print_r($this->db->last_query());
            // exit();          
        }
        else if($num==0)
        {
            $this->db->select('studentdetails.Uid `EmployeeEmpID`, studentdetails.user_role `EmployeeUserRole`, studentdetails.Login_Name `EmployeeFirstName`, ds.DesignationName `DesignationName`, studentdetails.department_id `EmployeeDepartment`,d.DepartmentID entName`DepartmentName`,ds.DesignationDepartment `EmployeeDesignation`,studentdetails.college_id,studentdetails.class_id,studentdetails.sec_id');
            $this->db->from('studentdetails');
            $this->db->join('college_details as cd', 'studentdetails.college_id = cd.cid', 'inner');            
            $this->db->join('department as d', 'studentdetails.department_id = d.DepartmentID', 'inner');
            $this->db->join('designation as ds', 'ds.DesignationDepartment = studentdetails.user_role', 'inner');
            $this->db->where("studentdetails.Login_Name", $user);
            $this->db->where("studentdetails.login_pwd", $cryppass);
            $this->db->order_by("studentdetails.Uid", "desc");
            $query2 = $this->db->get();
            $empdet=$query2->row();
            // print_r($this->db->last_query());
            // exit();
        }
        else
        {
            $empdet='Invalid Login';
        }
        
        return $empdet;          
    }

    public function getUserDetails()
    {       
        $uid=$_SESSION['userdetails']->{'EmployeeEmpID'}; 
        $desc=$_SESSION['userdetails']->{'DesignationName'}; 

            $this->db->select('employeedetails.*,department.DepartmentName ');
            $this->db->from('employeedetails');
            $this->db->join('employee', 'employee.EmployeeID = employeedetails.EmployeeEmpID', 'inner');            
            $this->db->join('department', 'employeedetails.EmployeeDepartment = department.DepartmentID', 'inner');
            $this->db->join('designation', 'employeedetails.EmployeeDesignation = designation.DesignationID', 'inner');
            $this->db->where("EmployeeEmpID", $uid);
            $this->db->where("designation.DesignationName", $desc);
            $this->db->order_by("employee.EmployeeID", "desc");
            $query = $this->db->get();
            $num=$query->num_rows();           
            $userDet=$query->row();
            // print_r($this->db->last_query()); 
            // print_r($num);
             
            if($num==0)
            {
                // print_r($num);
                $this->db->select('studentdetails.Uid `EmployeeID`, studentdetails.department_id, studentdetails.user_role `EmployeeUserRole`, studentdetails.college_id,studentdetails.Login_Name, studentdetails.std_id, studentdetails.std_name `EmployeeFirstName`, studentdetails.DOB, studentdetails.address, studentdetails.father_name, studentdetails.mother_name, studentdetails.mobile_no `EmployeeMobile`, studentdetails.contatc_no `EmployeeAltMobile1`, studentdetails.contatc_no2 `EmployeeAltMobile2`, studentdetails.section, studentdetails.Exam_no, studentdetails.Academic_year, studentdetails.std_email `EmployeePersonalEmail`,d.DepartmentName');
                $this->db->from('studentdetails');
                $this->db->join('college_details as cd', 'studentdetails.college_id = cd.cid', 'inner');
                $this->db->join('department as d', 'studentdetails.department_id = d.DepartmentID', 'inner');
                $this->db->join('designation as ds', 'ds.DesignationDepartment = studentdetails.user_role', 'inner');
                $this->db->where("studentdetails.Uid", $uid);           
                $this->db->order_by("studentdetails.Uid", "desc");
                $std_query = $this->db->get();
                $num2=$std_query->num_rows(); 
                $userDet=$std_query->row();
            } 
            // print_r($this->db->last_query());
            $this->session->set_userdata('getuser_Data', $userDet);
            return $userDet;
    }
    
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
        else
        {
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
        else
        {
            return false;
        }
    }
    
    public function GetEmployeeJoinDesignation($dept,$jdesig)
    {        
        $this->db->select('DesignationName');
        $this->db->from('designation');
        $this->db->where("DesignationID", $jdesig);
        $this->db->where("DesignationDepartment", $dept);
        $query = $this->db->get();    
        $jsig=$query->row();
        
        return $jsig;
    }

    public function settimetable($data)
    {  
        $this->db->select('*');
        $this->db->from('timetable');
        $this->db->where("class_id", $data['class_id']);
        $this->db->where("sec_id", $data['sec_id']);
        $this->db->where("school_id", $data['school_id']);        
        $query2 = $this->db->get();
        // print_r($this->db->last_query());
        $timetable_count =$query2->num_rows();
        if($timetable_count!=0)
        {
            $this->db->where("class_id", $data['class_id']);
            $this->db->where("sec_id", $data['sec_id']);
            $this->db->where("school_id", $data['school_id']); 
            $query = $this->db->delete('timetable');
        }
        return $timetable_count;
    }

    public function settimetabledata($data)
    {
        // print_r($data);
        $this->db->insert('timetable', $data);
        return "Inserted Successfully";
    }

    public function gettimetable($data)
    {
        // print_r($data);
        $this->db->select('class_id, sec_id, school_id, monday_val, tuesday_val, wednesday_val, thursday_val, friday_val, saturday_val');
        $this->db->from('timetable');
        $this->db->where("class_id", $data['class_id']);
        $this->db->where("sec_id", $data['secid']);
        $this->db->where("school_id",$data['school_id']);
        $query = $this->db->get();
        // print_r($this->db->last_query());
        if($query)
        {            
            return $query->result_array();
            // foreach ($timetable_ as $key => $value) 
            // {
            //     $i=1;
            //     $data = array('mon_val' => $value['monday_val'],
            //         'tues_val' => $value['tuesday_val']
            //     );
            //     $i++;
            //     print_r($data);
            // }
        }    
        else
        {
            return false;
        }
    }

    public function gettodayhomework()
    {
        $this->db->select('hw.subject_id, hw.homework, hw.created_date, cs.subject_name');
        $this->db->from('homework hw');
        $this->db->join('class_subjects cs', 'hw.subject_id=cs. id', 'inner');
        $this->db->where("DATE_FORMAT(created_date,'%d-%m-%Y') =DATE_FORMAT(CURDATE(),'%d-%m-%Y')"); 
        $this->db->where("hw.class_id",$_SESSION['userdetails']->{'class_id'});       
        $this->db->where("hw.sec_id",$_SESSION['userdetails']->{'sec_id'});
        $this->db->where("hw.school_id",$_SESSION['userdetails']->{'college_id'});
        $query = $this->db->get();
        $home_work=$query->result_array();
        // print_r($this->db->last_query());
        return $home_work;
    } 
    public function student_gettimetable()
    {        
        $this->db->select('class_id, sec_id, school_id, monday_val, tuesday_val, wednesday_val, thursday_val, friday_val, saturday_val');
        $this->db->from('timetable');
        $this->db->where("class_id", $_SESSION['userdetails']->{'class_id'});
        $this->db->where("sec_id", $_SESSION['userdetails']->{'sec_id'});
        $this->db->where("school_id",$_SESSION['userdetails']->{'college_id'});
        $query = $this->db->get();         
        $num=$query->num_rows();
        
        if($num>0)
        {      
            $timetable_= $query->result_array();    
            // return $query->result_array();   
            $i=1;
            foreach ($timetable_ as $key => $value) 
            {
                if($value['monday_val'] || $value['tuesday_val'] || $value['wednesday_val'] || $value['thursday_val'] || $value['friday_val'] || $valu['saturday_val'])
                {                    
                    $val=$i;
                    $data1[]=array(                      
                       'mon_'.$val=>$value['monday_val'],
                       'tue_'.$val=>$value['tuesday_val'],
                       'wed_'.$val=>$value['wednesday_val'],
                       'thu_'.$val=>$value['thursday_val'],
                       'fri_'.$val=>$value['friday_val'],
                       'sat_'.$val=>$valu['saturday_val']
                    );
                    $i++;
                } 
            }
            return $data1;
        }    
        else
        {
             return  $val=$i;
                    $data1[]=array(                      
                       'mon_'.$val=>$value['No data Found'],
                       'tue_'.$val=>$value['No data Found'],
                       'wed_'.$val=>$value['No data Found'],
                       'thu_'.$val=>$value['No data Found'],
                       'fri_'.$val=>$value['No data Found'],
                       'sat_'.$val=>$valu['No data Found']
                       );
        }
    } 
}
