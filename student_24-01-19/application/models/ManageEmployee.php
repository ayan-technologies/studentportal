<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$encrypt_key='CBE006TCP';

class ManageEmployee extends CI_Model {
    
    public function __construct(){
        parent::__construct();
        //$this->load->model('Encrypt');
    }

    public function CreateEmployee($data) { 
        $pass=$data['EmployeePassword'];
        
        $cryppass= base64_encode($pass);
        
        $user=$data['EmployeeCreatedBy'];
        $date=date('Y-m-d H:i:s');
        
        //adding new employee
        $this->db->set("EmployeeUserName",$data['EmployeeUserName']);
        $this->db->set("EmployeePassword",$cryppass);
        $this->db->set("EmployeeStatus",1);
        $this->db->set("EmployeeCreatedBy",$user);
        $this->db->set("EmployeeCreatedDate",$date);
        $this->db->set("EmployeeModifyBy",$user);
        $this->db->set("EmployeeModifyDate",$date);        
        $query = $this->db->insert('employee');
        $this->db->trans_complete();
        $sid=$this->db->insert_id();
        
        
        //adding new employee details
        $this->db->set("EmployeeEmpID",$sid);
        $this->db->set("EmployeeCode",$data['EmployeeCode']);
        $this->db->set("EmployeeUserRole",$data['EmployeeUserRole']);
        $this->db->set("EmployeeFirstName",$data['EmployeeFirstName']);
        $this->db->set("EmployeeLastName",$data['EmployeeLastName']);
        $this->db->set("EmployeeDesignation",$data['EmployeeDesignation']);
        $this->db->set("EmployeeDepartment",$data['EmployeeDepartment']);
        $this->db->set("EmployeeJoinDate",$data['EmployeeJoinDate']);
        $this->db->set("EmployeeJoinDesignation",$data['EmployeeJoinDesignation']);
        $this->db->set("EmployeeMobile",$data['EmployeeMobile']);
        $this->db->set("EmployeeEmail",$data['EmployeeEmail']);
        $this->db->set("EmployeeAltMobile1",$data['EmployeeAltMobile1']);
        $this->db->set("EmployeeAltMobile2",$data['EmployeeAltMobile2']);
        $this->db->set("EmployeeMaritalStatus",$data['EmployeeMaritalStatus']);
        $this->db->set("EmployeePersonalEmail",$data['EmployeePersonalEmail']);
        $this->db->set("EmployeeAddress",$data['EmployeeAddress']); 
        $this->db->set("EmployeeAddress2",$data['EmployeeAddress2']); 
        $this->db->set("EmployeeCity",$data['EmployeeCity']); 
        $this->db->set("EmployeeState",$data['EmployeeState']); 
        $this->db->set("EmployeeCountry",$data['EmployeeCountry']); 
        $this->db->set("EmployeeZipcode",$data['EmployeeZipcode']); 
        $this->db->set("EmployeeBankName",$data['EmployeeBankName']); 
        $this->db->set("EmployeeBankAccName",$data['EmployeeBankAccName']); 
        $this->db->set("EmployeeBankAccNo",$data['EmployeeBankAccNo']); 
        $this->db->set("EmployeeBankBranch",$data['EmployeeBankBranch']); 
        $this->db->set("EmployeeBankIFSC",$data['EmployeeBankIFSC']); 
        $this->db->set("EmployeeImage",$data['EmployeeImage']);
        $this->db->set("EmployeePanCard",$data['EmployeePanCard']);
        $this->db->set("EmployeeIsResigned",0);
        $this->db->set("EmployeeCreatedBy",$user);
        $this->db->set("EmployeeCreatedDate",$date);
        $this->db->set("EmployeeModifyBy",$user);
        $this->db->set("EmployeeModifyDate",$date);
        $this->db->set("EmployeeLeaves",12); 
        $query = $this->db->insert('employeedetails');

        $log3['employeeid']=$this->session->userdata['userdetails']->EmployeeID;
        $log3['page'] = 'Add Employee';
        $log3['action'] = 'New Employee';
        $log3['time'] = date('Y-m-d H:m:s');
        $query4 = $this->db->insert('logs',$log3);
        
        if($query){
            return true;
        }
        else{
            return false;
        }
    }
    
    public function UpdateEmployee($data) { 
                   
        $this->db->where("EmployeeEmpID", $data['EmployeeEmpID']);
        $query = $this->db->update('employeedetails',$data);

        $log['employeeid']=$this->session->userdata['userdetails']->EmployeeID;
        $log['page'] = 'My Profile';
        $log['action'] = 'Edit My Profile';
        $log['time'] = date('Y-m-d H:m:s');
        $query4 = $this->db->insert('logs',$log);
        
        $this->db->select('employee.EmployeeUserName,employeedetails.*,department.DepartmentName,designation.DesignationName');
        $this->db->from('employeedetails');
        $this->db->join('employee', 'employee.EmployeeID = employeedetails.EmployeeEmpID', 'left');            
        $this->db->join('department', 'employeedetails.EmployeeDepartment = department.DepartmentID', 'left');
        $this->db->join('designation', 'employeedetails.EmployeeDesignation = designation.DesignationID', 'left');
        $this->db->where("employeedetails.EmployeeEmpID", $data['EmployeeEmpID']);
        $this->db->order_by("employeedetails.EmployeeID", "desc");
        $query2 = $this->db->get();
        $empdet=$query2->row();

        
        
        return $empdet;
    }    
    
    
    public function ShowEmployeeByID($data)
    {
        
        $this->db->select('employee.EmployeeUserName,employeedetails.*,department.DepartmentName,designation.DesignationName, jdesig.DesignationName as JoinDesignationName');
        $this->db->from('employee');
        $this->db->join('employeedetails', 'employee.EmployeeID = employeedetails.EmployeeEmpID', 'left');           
        $this->db->join('department', 'employeedetails.EmployeeDepartment = department.DepartmentID', 'left');
        $this->db->join('designation', 'employeedetails.EmployeeDesignation = designation.DesignationID', 'left');
        $this->db->join('designation as jdesig', 'employeedetails.EmployeeJoinDesignation = designation.DesignationID', 'left');
        $this->db->where("employee.EmployeeID", $data);
       $query = $this->db->get();

        if($query)
        {
            return $query->row();
        }
        else{
            return false;
        }
    }
    
    public function GetEmployeeList($team)
    {
        
        $this->db->select('employee.EmployeeUserName, employee.EmployeePassword, employeedetails.*');
        $this->db->from('employee');
        if($team!=''){
            $this->db->where("employeedetails.EmployeeDepartment", $team);
        }
        $this->db->where("employeedetails.EmployeeIsResigned", '0');
        $this->db->join('employeedetails', 'employee.EmployeeID = employeedetails.EmployeeEmpID', 'left'); 
        $this->db->order_by('EmployeeDepartment', 'ASC');
        $query = $this->db->get();
        
        return $query->result_array();
        
    }
    
    public function RemoveEmployee($data) { 
        global $sh;
        $this->db->where("EmployeeID", $data);
        $query = $this->db->get('employee',$data);   
        $shrow=$query->num_rows();
        if($shrow>0){            
            $this->db->where("EmployeeID", $data);
            $query = $this->db->delete('employee');
            
            $this->db->where("EmployeeEmpID", $data);
            $query = $this->db->delete('employeedetails');
        }
    }
    
    
    public function GetEmployeeData($role,$dept,$desig,$jdesig)
    {


        $this->db->select('*');
        $this->db->from('userroles');
        $this->db->where("UserRoleID", $role);
        $query = $this->db->get();        
        $rol=$query->row();
        $roles=$rol->UserRoleName;
        
        $this->db->select('*');
        $this->db->from('department');
        $this->db->where("DepartmentID", $dept);
        $query = $this->db->get();    
        $dep=$query->row();
        $deptm=$dep->DepartmentName;
        
        $this->db->select('*');
        $this->db->from('designation');
        $this->db->where("DesignationID", $desig);
        $this->db->where("DesignationDepartment", $dept);
        $query = $this->db->get();    
        $sig=$query->row();
        $sign=$sig->DesignationName;
        
        $this->db->select('*');
        $this->db->from('designation');
        $this->db->where("DesignationID", $jdesig);
        $this->db->where("DesignationDepartment", $dept);
        $query = $this->db->get();    
        $jsig=$query->row();
        $jsign=$jsig->DesignationName;
        
        $emp=array("Role"=>$roles, "Dept"=>$deptm, "Sign"=>$sign, "Jsign"=>$jsign);
        
        $log1['employeeid']=$this->session->userdata['userdetails']->EmployeeID;
        $log1['page'] = 'Employee Details';
        $log1['action'] = 'View Employee Details';
        $log1['time'] = date('Y-m-d H:m:s');
        $query5 = $this->db->insert('logs',$log1);
        
        return $emp;
        
    }
    
    public function GetList($table)
    {
        $query = $this->db->get($table); 

        return $query->result_array();
    }

    public function GetdesigList($dept){
        $this->db->select('*');
        $this->db->from('designation');
        $this->db->where("DesignationDepartment", $dept);
        $this->db->order_by('DesignationName', 'ASC');
        $query = $this->db->get();
        
        return $query->result_array();

    }
    
    public function UpdatePassword($data) { 
                           
        $this->db->where("EmployeeID", $data['EmployeeID']);
        $query = $this->db->update('employee',$data);

        $log2['employeeid']=$this->session->userdata['userdetails']->EmployeeID;
        $log2['page'] = 'Change Password';
        $log2['action'] = 'Password Change';
        $log2['time'] = date('Y-m-d H:m:s');
        $query4 = $this->db->insert('logs',$log2);


        
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
    
    public function GetEmpEmails()
    {
        
        $this->db->select('employee.EmployeeUserName, employeedetails.EmployeeEmail');
        $this->db->from('employee');        
        $this->db->where("employeedetails.EmployeeIsResigned", '0');
        $this->db->join('employeedetails', 'employee.EmployeeID = employeedetails.EmployeeEmpID', 'left'); 
        $query = $this->db->get();
        
        return $query->result_array();
        
    }

    public function EmployeeCheck($data){
  
$this->db->select("*");
$this->db->from("employee");
$this->db->where('EmployeeUserName',$data['EmployeeUserName']);
$query = $this->db->get(); 
return $query->result_array();
    }

public function EmailCheck($data)

    {
  
$this->db->select("*");
$this->db->from("employeedetails");
$this->db->where('EmployeeEmail',$data['EmployeeEmail']);
$query = $this->db->get(); 
return $query->result_array();
 }


public function DeptUser($data)
    {
        
        $this->db->select('*');
        $this->db->from('designation');
        $this->db->where("DesignationDepartment", $data);

        $query = $this->db->get();
        $listrole=$query->result_array();


        
        return $listrole;
        
        
    }

    public function ListDept()
    {
        
        $this->db->select('*');
        $this->db->from('department');
        $query = $this->db->get();
        
        return $query->result_array();
        
        
    }


public function InsertDesignation($data)
    {


       $query = $this->db->insert("designation", $data);
       $query = $this->db->get();
        
        if($query ){
            $log['employeeid']=$this->session->userdata['userdetails']->EmployeeID;
        $log['page'] = 'Designation';
        $log['action'] = 'Add Designation';
        $log['time'] = date('Y-m-d H:m:s');
        $query6 = $this->db->insert('logs',$log);

            return true;
        }
        else{
            return false;
        }
        
    }


      public function Deletedesignation($data)
    {

        $this->db->where('DesignationID', $data);
         $query=$this->db->delete('designation'); 
        if($query){

            return true;
        }
        else{
            return false;
        }
        
    }




    public function DesigList(){

        $this->db->select('*,department.DepartmentName,concat(employeedetails.EmployeeFirstName," ",employeedetails.EmployeeLastName) as EmployeeUserName ');
        $this->db->from('designation');
        $this->db->join('department', 'department.DepartmentID = designation.DesignationDepartment', 'left');

        $this->db->join('employeedetails', 'employeedetails.EmployeeEmpID = designation.DesignationCreatedBy', 'left');
        
        $query = $this->db->get();
        $listdept=$query->result_array();
         return $listdept;
    }

    public function DesigEditList($data){

        $this->db->select('*,department.DepartmentName,employee.EmployeeUserName');
        $this->db->from('designation');
        $this->db->join('department', 'department.DepartmentID = designation.DesignationDepartment', 'left');

        $this->db->join('employee', 'employee.EmployeeID = designation.DesignationCreatedBy', 'left');
        
        $this->db->where("designation.DesignationID", $data);
        $query = $this->db->get();
        $listdept=$query->result_array();
        return $listdept[0]; 
       
        if($listdept){

            return true;
        } else 
        {
            return false;
        }
        
         
    }

     public function Updatedesignation($data)
    {

        $this->db->set("DesignationDepartment",$data['DesignationDepartment']);
        $this->db->set("DesignationName",$data['DesignationName']);   
        
        $this->db->set("DesignationModifiedBy",$data['DesignationModifiedBy']);
        $this->db->set("DesignationModifiedDate",$data['DesignationModifiedDate']);
        $this->db->where("DesignationID", $data['DesignationID']);
        $query = $this->db->update('designation');

        $query = $this->db->get();
        if($query){
            $log['employeeid']=$this->session->userdata['userdetails']->EmployeeID;
        $log['page'] = 'Designation';
        $log['action'] = 'Update Designation';
        $log['time'] = date('Y-m-d H:m:s');
        $query6 = $this->db->insert('logs',$log);

            return true;
        }
        else{
            return false;
        }
        
    }

    
}
