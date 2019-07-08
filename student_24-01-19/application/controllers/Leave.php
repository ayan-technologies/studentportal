<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leave extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('ManageLeave');
    }

    public function ApplyLeave() {
        $this->load->view('applyleave');
    }

     public function CompensationHistory()
    {
        $user_data['deptlist'] = $this->ManageLeave->CompList();
        $this->load->view('compensationhistory',$user_data);

    }

     public function Compensationlist()
    {
        $user_data['complist'] = $this->ManageLeave->CompList();
        
        return $user_data;
        
    }

    public function CompensationLeave() {

        

        $user_data['listdept'] = $this->ManageLeave->ListDept();

        $deptid=$this->input->post('EmployeeDepartment');
        
        $this->load->view('compensationleave',$user_data);
    }

    public function EditCompensation() {

        

        $user_data['listdept'] = $this->ManageLeave->ListDept();

        $compid=$_REQUEST['CompensationID'];
        
        $user_data['compdata'] = $this->ManageLeave->CompData($compid);


        $user_data['listemp'] = $this->ManageLeave->ListEmp($user_data['compdata']['DepartmentID']);

        $this->load->view('editcompensation',$user_data);
    }

    public function UpdateCompensation() {

         $data['DepartmentID']=$this->input->post('DepartmentID');
        $data['EmployeeEmpID']=$this->input->post('EmployeeEmpID');
        $data['NoDays']=$this->input->post('NoDays');
        $data['Reason']=$this->input->post('Reason');
        $data['GivenBy']=$this->input->post('GivenBy');
        $data['CompensationModifiedDate']=date('Y-m-d H:m:s');
        $data['CompensationModifiedBy']=$this->session->userdata['userdetails']->EmployeeID;
        $data['CompensationStatus']='Y';
        $data['CompensationID']=$this->input->post('CompensationID');
        
        $user_data = $this->ManageLeave->UpdateCompensation($data);
        
        echo  $user_data;

        
    }


    public function AddCompensation() {

        
        $data['DepartmentID']=$this->input->post('DepartmentID');
        $data['EmployeeEmpID']=$this->input->post('EmployeeEmpID');
        $data['NoDays']=$this->input->post('NoDays');
        $data['Reason']=$this->input->post('Reason');
        $data['GivenBy']=$this->input->post('GivenBy');
        $data['CompensationCreatedDate']=date('Y-m-d H:m:s');
        $data['CompensationCreatedBy']=$this->session->userdata['userdetails']->EmployeeID;
        $data['CompensationStatus']='Y';
        
        $user_data = $this->ManageLeave->InsertCompensation($data);
        
        echo  $user_data;
     
        
    }

    public function DeleteCompensation() {

        
        $dataid=$this->input->post('CompensationID');
        
        
        $user_data = $this->ManageLeave->Deletecompensation($dataid);
        
        echo  $user_data;
     
        
    }

    public function Emplist() {

      $deptid=$this->input->post('EmployeeDepartment');
        
        $user_data = $this->ManageLeave->ListEmp($deptid);
        $emplist = '<select class="form-control select2" name="empid" id="empid"  style="width: 100%;">
                        <option value="">Select</option>';
                     
                    foreach($user_data as $list){                   
                        $emplist .= "<option value='".$list['EmployeeEmpID']."'>".$list['EmployeeFirstName']." ".$list['EmployeeLastName']."</option>";
                    }
                                
        $emplist .= '</select>';

        echo $emplist;
    }






    public function AddLeave() {
        
        $data['LeaveEmployee']=$this->input->post('LeaveEmployee');
        $data['LeaveType']=$this->input->post('LeaveType');
        if($data['LeaveType']=='Leave'){ 
            $leavedate=explode(" - ",$this->input->post('LeaveFromDate'));
            $data['LeaveFromDate']=date("Y-m-d",strtotime($leavedate[0]));   
            $data['LeaveToDate']=date("Y-m-d",strtotime($leavedate[1])); 

            $data['LeaveSession']=$this->input->post('LeaveSession');            
        }else{
            $data['LeavePermissionDate']=date("Y-m-d",strtotime($this->input->post('LeavePermissionDate')));
            $data['LeavePermissionFrom']=date("H:i:s",strtotime($this->input->post('LeavePermissionFrom')));
            $data['LeavePermissionTo']=date("H:i:s",strtotime($this->input->post('LeavePermissionTo')));
        }
        $data['LeaveReason']=$this->input->post('LeaveReason');        
        $data['LeaveAppliedon']=date("Y-m-d H:i:s");
        $data['LeaveIsIntimated']=$this->input->post('LeaveIsIntimated');
        $data['LeaveStatus']=$this->input->post('LeaveStatus');
                
        $user_data = $this->ManageLeave->InsertLeave($data);
        
        echo  $user_data;
        
    }
    
    
    public function LeaveListByEmp() {
                
        $url = parse_url($_SERVER['REQUEST_URI']);
        parse_str($url['query'], $params);
        
        $yr=date('Y');
        $sdate=$yr.'-01-01';
        $edate=$yr.'-12-31';
        
        $user_data = $this->ManageLeave->EmpLeavelist($params['EmployeeID'],$sdate,$edate);
        if($user_data){
            $ServerMsg=array(
                "Msg" => "SUCCESS",
                "ExMsg" => null,
                "DisplayMsg" => null
            );
        }else{
            $ServerMsg=array(
                "Msg" => "FAILED",
                "ExMsg" => null,
                "DisplayMsg" => null
            );
        }
        
    }
    
    public function LeaveList() {
        
        $yr=date('Y-m');
        $sdate=$yr.'-01';
        $edate=$yr.'-31';  
        $role=$this->session->userdata['userdetails']->EmployeeUserRole;
        $user_data['leavelist'] = $this->ManageLeave->LeaveList($sdate,$edate,$role);
        $this->load->view('leaveapproval',$user_data);
    }
    
    
    public function CancelLeave() {
        $request = $this->input->post();
        $user_data = $this->ManageLeave->LeaveCancel($request);
        echo $user_data;
    }

    public function ApproveRejectLeave()
    {

        $data['LeaveStatus']=$this->input->post('LeaveStatus');        
        $data['LeaveStatusReason']=$this->input->post('LeaveStatusReason');   
        $data['LeaveApprovedBy']=$this->input->post('LeaveApprovedBy');
        $data['LeaveID']=$this->input->post('LeaveID');
        $data['LeaveApprovedDate']=date('Y-m-d H:i:s');
        
        $user_data = $this->ManageLeave->LeaveApproval($data);
        

        echo json_encode(array("Status"=>$user_data));
    }
    
    public function CancelLeaveStatus()
    {        
        $data = $this->input->post();

        $user_data = $this->ManageLeave->LeaveCancelApproval($data);
        

        echo json_encode(array("Status"=>$user_data));
    }
    
    
     public function GetApplication() {
        
        $url = parse_url($_SERVER['REQUEST_URI']);
        parse_str($url['query'], $params);
        
        $user_data['leave'] = $this->ManageLeave->ApplicationByID($params['LID']);
        
        $this->load->view('leaveapplication',$user_data);
        
     }

     public function CheckLeave() {
  $data['type']=$this->input->post('type');  
  $data['LeavePermissionDate']=$this->input->post('LeavePermissionDate'); 

  $data['LeavePermissionFrom']=$this->input->post('LeavePermissionFrom');  
  $data['LeavePermissionTo']=$this->input->post('LeavePermissionTo');   
  $leavedate=explode(" - ",$this->input->post('fdate'));
 $data['LeaveFromDate']=date("Y-m-d",strtotime($leavedate[0]));   
 $data['LeaveToDate']=date("Y-m-d",strtotime($leavedate[1]));
 $user_data = $this->ManageLeave->LeaveCheck($data);
 echo $user_data;

     }
 
    
}
