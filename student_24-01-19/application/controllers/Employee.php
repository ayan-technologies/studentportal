<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        
        $this->load->helper('url');
        $this->load->model('ManageEmployee');
        $this->load->model('ManageLeave');
    }

    
    public function AddEmployee() {
        $data1['EmployeeUserName']=$this->input->post('usname');        
        $data1['EmployeePassword']=$this->input->post('uspass');  
        $data1['EmployeeCode']=$this->input->post('code');        
        $data1['EmployeeDesignation']=$this->input->post('desig');   
        $data1['EmployeeDepartment']=$this->input->post('dept');
        $data1['EmployeeJoinDesignation']=$this->input->post('jdesig');
        $data1['EmployeeUserRole']=$this->input->post('role');        
        $data1['EmployeeJoinDate']=date("Y-m-d",strtotime($this->input->post('jdate'))); 
        $data1['EmployeeFirstName']=$this->input->post('fname');        
        $data1['EmployeeLastName']=$this->input->post('lname');   
        $data1['EmployeeMobile']=$this->input->post('mobile');
        $data1['EmployeeEmail']=$this->input->post('email');        
        $data1['EmployeePersonalEmail']=$this->input->post('pemail');
        $data1['EmployeeAddress']=$this->input->post('address'); 
        $data1['EmployeeAddress2']=$this->input->post('address2');
        $data1['EmployeeCity']=$this->input->post('city');
        $data1['EmployeeState']=$this->input->post('state');
        $data1['EmployeeCountry']=$this->input->post('country');
        $data1['EmployeeZipcode']=$this->input->post('zipcode'); 
        $data1['EmployeeBankName']=$this->input->post('bank');
        $data1['EmployeeBankAccName']=$this->input->post('accname');
        $data1['EmployeeBankAccNo']=$this->input->post('accno');
        $data1['EmployeeBankBranch']=$this->input->post('branch');
        $data1['EmployeeBankIFSC']=$this->input->post('ifsc');      
        $data1['EmployeeAltMobile1']=$this->input->post('alt1');
        $data1['EmployeeAltMobile2']=$this->input->post('alt2');
        $data1['EmployeeMaritalStatus']=$this->input->post('marital');
        $data1['EmployeeEmpID']=$this->input->post('eid');  
        $data1['EmployeePanCard']=$this->input->post('pan');   
        $data1['EmployeeCreatedBy']=$this->session->userdata['userdetails']->EmployeeEmpID;
        
        if($_FILES['empimg']['name']!=''){
            $filename=time().$_FILES['empimg']['name'];
            $tmp_name=$_FILES['empimg']['tmp_name'];
            move_uploaded_file($tmp_name,"empimage/".$filename);
            $data1['EmployeeImage']=$filename;
        }else{
            $data1['EmployeeImage']='';
        }
        
        $user_data = $this->ManageEmployee->CreateEmployee($data1);
       
        header("Location:../EmployeeList");
    }
    
    
    public function EditEmployee() {
        
        $stream_clean = $this->security->xss_clean($this->input->raw_input_stream);
        $request = json_decode($stream_clean);
        
        $data1['EmployeeFirstName']=$this->input->post('fname');        
        $data1['EmployeeLastName']=$this->input->post('lname');   
        $data1['EmployeeMobile']=$this->input->post('mobile');
        $data1['EmployeePersonalEmail']=$this->input->post('pemail');
        $data1['EmployeeAddress']=$this->input->post('address');
        $data1['EmployeeAddress2']=$this->input->post('address2');
        $data1['EmployeeCity']=$this->input->post('city');
        $data1['EmployeeState']=$this->input->post('state');
        $data1['EmployeeCountry']=$this->input->post('country');
        $data1['EmployeeZipcode']=$this->input->post('zipcode');
        $data1['EmployeeAltMobile1']=$this->input->post('alt1');
        $data1['EmployeeAltMobile2']=$this->input->post('alt2');
        $data1['EmployeeBankName']=$this->input->post('bank');
        $data1['EmployeeBankAccName']=$this->input->post('accname');
        $data1['EmployeeBankAccNo']=$this->input->post('accno');
        $data1['EmployeeBankBranch']=$this->input->post('branch');
        $data1['EmployeeBankIFSC']=$this->input->post('ifsc');
        $data1['EmployeeMaritalStatus']=$this->input->post('marital');
        $data1['EmployeeEmpID']=$this->input->post('eid');   
        $data1['EmployeeModifyBy']=$this->input->post('eid');
        $data1['EmployeeModifyDate']=date('Y-m-d H:i:s');
        $data1['EmployeePanCard']=$this->input->post('pan');   
        
        if($_FILES['empimg']['name']!=''){
            $filename=time().$_FILES['empimg']['name'];
            $tmp_name=$_FILES['empimg']['tmp_name'];
            move_uploaded_file($tmp_name,"empimage/".$filename);
            $data1['EmployeeImage']=$filename;
        }else{
            $data1['EmployeeImage']=$this->input->post('oldempimg');
        }
        
        
        $result = $this->ManageEmployee->UpdateEmployee($data1);
       
        $this->session->set_userdata('userdetails', $result);
        
        header("Location:../MyProfile");
    }

    public function GetEmployeeByID()
    {

        $url = parse_url($_SERVER['REQUEST_URI']);
        parse_str($url['query'], $params);

        $user_data['empdet'] = $this->ManageEmployee->ShowEmployeeByID($params['EmpID']);
        
        $this->load->view('editempprofile',$user_data);

    }
    
    public function EmployeeList()
    {
        global $data;
        $url = parse_url($_SERVER['REQUEST_URI']);        
        if(@$url['query']){
            parse_str($url['query'], $params);
        }else{
            $params['Department']='';
        }
        
        $user_data['emplist'] = $this->ManageEmployee->GetEmployeeList($params['Department']);
        
        $this->load->view('employee',$user_data);

    }
    
    public function DeleteEmployee()
    {

        $url = parse_url($_SERVER['REQUEST_URI']);
        parse_str($url['query'], $params);

        $user_data = $this->ManageEmployee->RemoveEmployee($params['EmployeeID']);
 
        return true;

    }
    
    
    public function EmployeeDetails()
    {

        $url = parse_url($_SERVER['REQUEST_URI']);
        parse_str($url['query'], $params);
        $lyr=date('Y')-1;
        $yr=date('Y');
        $nyr=date('Y')+1;
        if(date('m')<'04'){
            $sdate=$lyr.'-04-01';
            $edate=$yr.'-03-31';
        }else{
            $sdate=$yr.'-04-01';
            $edate=$nyr.'-03-31';
        }
                
        $user_data['empprofile'] = $this->ManageEmployee->ShowEmployeeByID($params['EmployeeID']);
        $user_data['empleave'] = $this->ManageLeave->EmpLeavelist($params['EmployeeID'],$sdate,$edate);
        $user_data['leavedays']=$this->ManageLeave->EmpLeavedays($params['EmployeeID'],$sdate,$edate);
        
        $user_data['empdata'] = $this->ManageEmployee->GetEmployeeData($user_data['empprofile']->EmployeeUserRole,$user_data['empprofile']->EmployeeDepartment,$user_data['empprofile']->EmployeeDesignation,$user_data['empprofile']->EmployeeJoinDesignation);
        
        $this->load->view('employeedetails',$user_data);

    }
    
    public function ShowAddEmp()
    {
        $this->load->view('addemployee');        
    }
    
    public function GetEmpAdm($table)
    {
    $user_data['dept'] = $this->ManageEmployee->GetList($table);
        
        return $user_data;
        
    }
    
    public function EditEmpProfile() {
    
        $data1['EmployeeCode']=$this->input->post('code');        
        $data1['EmployeeDesignation']=$this->input->post('desig');   
        $data1['EmployeeDepartment']=$this->input->post('dept');
        $data1['EmployeeJoinDesignation']=$this->input->post('jdesig');
        $data1['EmployeeUserRole']=$this->input->post('role');   
        $data1['EmployeeJoinDate']=date("Y-m-d",strtotime($this->input->post('jdate')));
        $data1['EmployeeFirstName']=$this->input->post('fname');        
        $data1['EmployeeLastName']=$this->input->post('lname');   
        $data1['EmployeeMobile']=$this->input->post('mobile');
        $data1['EmployeeEmail']=$this->input->post('email');
        $data1['EmployeePersonalEmail']=$this->input->post('pemail');
        $data1['EmployeeAddress']=$this->input->post('address'); 
        $data1['EmployeeAddress2']=$this->input->post('address2');
        $data1['EmployeeCity']=$this->input->post('city');
        $data1['EmployeeState']=$this->input->post('state');
        $data1['EmployeeCountry']=$this->input->post('country');
        $data1['EmployeeZipcode']=$this->input->post('zipcode');
        $data1['EmployeeBankName']=$this->input->post('bank');
        $data1['EmployeeBankAccName']=$this->input->post('accname');
        $data1['EmployeeBankAccNo']=$this->input->post('accno');
        $data1['EmployeeBankBranch']=$this->input->post('branch');
        $data1['EmployeeBankIFSC']=$this->input->post('ifsc');        
        $data1['EmployeeAltMobile1']=$this->input->post('alt1');
        $data1['EmployeeAltMobile2']=$this->input->post('alt2');
        $data1['EmployeeMaritalStatus']=$this->input->post('marital');
        $data1['EmployeeEmpID']=$this->input->post('eid');   
        $data1['EmployeeModifyBy']=$this->session->userdata['userdetails']->EmployeeEmpID;
        $data1['EmployeeModifyDate']=date('Y-m-d H:i:s');
        $data1['EmployeePanCard']=$this->input->post('pan');
        $data1['EmployeeInNotice']=$this->input->post('resigned'); 
        if($this->input->post('rdate')!=''){
            $data1['EmployeeIsResigned']='1';   
            $data1['EmployeeReleavedOn']=date("Y-m-d",strtotime($this->input->post('rdate')));   
        }
        
        if($_FILES['empimg']['name']!=''){
            $filename=time().$_FILES['empimg']['name'];
            $tmp_name=$_FILES['empimg']['tmp_name'];
            move_uploaded_file($tmp_name,"empimage/".$filename);
            $data1['EmployeeImage']=$filename;
        }else{
            $data1['EmployeeImage']=$this->input->post('oldempimg');
        }
        
        
        $result = $this->ManageEmployee->UpdateEmployee($data1);
        
        header("Location:../EmployeeDetails?EmployeeID=".$data1['EmployeeEmpID']);
    }
    
    public function ChangePassword() {

        
        $data1['EmployeePassword']=base64_encode($this->input->post('Password'));     
        $data1['EmployeeID']=$this->input->post('EID');   
        $data1['EmployeeModifyBy']=$this->input->post('EID');
        $data1['EmployeeModifyDate']=date('Y-m-d H:i:s');
                
        
        $result = $this->ManageEmployee->UpdatePassword($data1);    
        
        $this->session->set_userdata('userdetails', $result);
    }

    public function Checkemployee()
    {

      
         $data1['EmployeeUserName']=$this->input->post('EmployeeUserName');
         $data1['EmployeeEmail']=$this->input->post('EmployeeEmail');

       $result = $this->ManageEmployee->EmployeeCheck($data1);
        
       echo json_encode($result);
        
    }

    public function CheckemployeeEmail()
    {

      
         $data1['EmployeeEmail']=$this->input->post('EmployeeEmail');
    
       $result = $this->ManageEmployee->EmailCheck($data1);
        
       echo json_encode($result);
        
    }


    public function UserDept() {

            $userdeptid=$this->input->post('EmployeeDepartment');

            $user_data = $this->ManageEmployee->DeptUser($userdeptid);
            $emplist = '<select name="desig" id="desig" style="width:20%">
            <option value="">Select Designation</option>';

            foreach($user_data as $list){

            $emplist .= "<option value='".$list['DesignationID']."'>".$list['DesignationName']."</option>";
            }

            $emplist .= '</select>';



            $empjoinlist = '<select name="jdesig" id="jdesig" style="width:20%" >
            <option value="">Select Designation</option>';

            foreach($user_data as $list){

            $empjoinlist .= "<option value='".$list['DesignationID']."'>".$list['DesignationName']."</option>";
            }

            $empjoinlist .= '</select>';                            

            echo json_encode(array($emplist,$empjoinlist));
            }




    public function UserDeptEdit() {

            $userdeptid=$this->input->post('EmployeeDepartment');

            $user_data = $this->ManageEmployee->DeptUser($userdeptid);
            $emplist = '<select name="desig" id="desig" style="width:20%">
            <option value="">Select Designation</option>';

            foreach($user_data as $list){

            $emplist .= "<option value='".$list['DesignationID']."'>".$list['DesignationName']."</option>";
            }

            $emplist .= '</select>';

            

            $empjoinlist = '<select name="jdesig" id="jdesig" style="width:20%" >
            <option value="">Select Designation</option>';

            foreach($user_data as $list){

            $empjoinlist .= "<option value='".$list['DesignationID']."'>".$list['DesignationName']."</option>";
            }

            $empjoinlist .= '</select>';                            

            echo json_encode(array($emplist,$empjoinlist));
            }



     public function Designation() {


       $user_data['desiglist'] = $this->ManageEmployee->DesigList();

        $this->load->view('designation',$user_data);
    }

    public function AddDesignation() {


       $user_data['listdept'] = $this->ManageEmployee->ListDept();

        $this->load->view('adddesignation',$user_data);
    }

    public function AddDesignationData() {

        
        $data['DesignationDepartment']=$this->input->post('DesignationDepartment');
        $data['DesignationName']=$this->input->post('DesignationName');
        
        $data['DesignationCreatedDate']=date('Y-m-d H:m:s');
        $data['DesignationCreatedBy']=$this->session->userdata['userdetails']->EmployeeID;
        $data['DesignationStatus']='1';
        
        $user_data = $this->ManageEmployee->InsertDesignation($data);
        
        echo  $user_data;
     
        
    }

    public function EditDesignation() {


       $user_data['listdept'] = $this->ManageEmployee->ListDept();
       $desigid = $_REQUEST['DesignationID'];
       $user_data['desiglist'] = $this->ManageEmployee->DesigEditList($desigid);
     
        $this->load->view('editdesignation',$user_data);
    }

     public function UpdateDesignation() {

         $data['DesignationDepartment']=$this->input->post('DesignationDepartment');
        $data['DesignationName']=$this->input->post('DesignationName');
        
        $data['DesignationModifiedDate']=date('Y-m-d H:m:s');
        $data['DesignationModifiedBy']=$this->session->userdata['userdetails']->EmployeeID;
        $data['DesignationStatus']='1';
        $data['DesignationID']=$this->input->post('DesignationID');
        
        $user_data = $this->ManageEmployee->Updatedesignation($data);
        
        echo  $user_data;

        
    }

    public function DeleteDesignation() {

        
        $dataid=$this->input->post('DesignationID');
        
        
        $user_data = $this->ManageEmployee->Deletedesignation($dataid);
        
        echo  $user_data;
     

        }



    
}
