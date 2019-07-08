<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageLeave extends CI_Model {
    
    public function __construct(){
        parent::__construct();
    }  


    public function ListDept()
    {
        
        $this->db->select('*');
        $this->db->from('department');
        $query = $this->db->get();
        
        return $query->result_array();
        
        
    }

    public function ListEmp($data)
    {
        
        $this->db->select('*');
        $this->db->from('employeedetails');
        $this->db->where("EmployeeDepartment", $data);

        $query = $this->db->get();
        $listemp=$query->result_array();


        
        return $listemp;
        
        
    }


    public function GetList($table)
    {
        $query = $this->db->get($table); 

        return $query->result_array();
    }



     public function CompList()
    {

        $this->db->select('*,department.DepartmentName,concat(employeedetails.EmployeeFirstName," ",employeedetails.EmployeeLastName) as EmployeeUserName  ,emp.EmployeeUserName as empname');
        $this->db->from('compensationleave');
        $this->db->join('department', 'department.DepartmentID = compensationleave.DepartmentID', 'left');

        $this->db->join('employeedetails', 'employeedetails.EmployeeEmpID = compensationleave.CompensationCreatedBy', 'left');
        $this->db->join('employee as emp', 'emp.EmployeeID = compensationleave.EmployeeEmpID', 'left');
        $query = $this->db->get();
        $listdept=$query->result_array();
         return $listdept;
    }


    public function CompData($data)
    {

        $this->db->select('*,department.DepartmentName,employee.EmployeeUserName');
        $this->db->from('compensationleave');
        $this->db->join('department', 'department.DepartmentID = compensationleave.DepartmentID', 'left');            
        $this->db->join('employee', 'employee.EmployeeID = compensationleave.CompensationCreatedBy', 'left');
        $this->db->where("compensationleave.CompensationID", $data);
        $query = $this->db->get();
        $listdept=$query->result_array();
         return $listdept[0];
    }

    public function InsertCompensation($data)
    {


        $query = $this->db->insert("compensationleave", $data);
        $log['employeeid']=$this->session->userdata['userdetails']->EmployeeID;
        $log['page'] = 'Compensation Leave';
        $log['action'] = 'Applied Cancel Request';
        $log['time'] = date('Y-m-d H:m:s');
        $query6 = $this->db->insert('logs',$log);

        $query = $this->db->get();
        if($$query){

            return true;
        }
        else{
            return false;
        }
        
    }

    public function UpdateCompensation($data)
    {

        $this->db->set("DepartmentID",$data['DepartmentID']);
        $this->db->set("EmployeeEmpID",$data['EmployeeEmpID']);   
        $this->db->set("NoDays",$data['NoDays']);      
        $this->db->set("Reason",$data['Reason']);
        $this->db->set("GivenBy",$data['GivenBy']);
        $this->db->set("CompensationModifiedBy",$data['CompensationModifiedBy']);
        $this->db->set("CompensationModifiedDate",$data['CompensationModifiedDate']);
        $this->db->where("CompensationID", $data['CompensationID']);
        $query = $this->db->update('compensationleave');

        $query = $this->db->get();
        if($query){
            $log['employeeid']=$this->session->userdata['userdetails']->EmployeeID;
        $log['page'] = 'Compensation Leave';
        $log['action'] = 'Edit Compensation Leave';
        $log['time'] = date('Y-m-d H:m:s');
        $query6 = $this->db->insert('logs',$log);

            return true;
        }
        else{
            return false;
        }
        
    }

    public function Deletecompensation($data)
    {

        $this->db->where('CompensationID', $data);
         $query=$this->db->delete('compensationleave'); 
        if($query){

            return true;
        }
        else{
            return false;
        }
        
    }


    
    public function EmpLeavelist($data,$lyr,$yr)
    {
        $emp="";
        if($data>0){
           $emp=" LeaveEmployee='".$data."' and  ";
        }   
        $this->db->select('*');
        $this->db->from('leaveapplication');
        $condition=(" ".$emp." ((LeaveFromDate between '".$lyr."' and '".$yr."') || (LeaveToDate between '".$lyr."' and '".$yr."') || (LeavePermissionDate between '".$lyr."' and '".$yr."'))");
       $this->db->where($condition);
       $this->db->order_by("LeaveID", "desc");
        $query = $this->db->get();
       
        if($query)
        {
            return $query->result_array();
        }
        else{
            return false;
        }
    }

    public function EmpLeavedays($data,$lyr,$yr)
    {
        $emp="";
        if($data>0){
           $emp=" LeaveEmployee='".$data."' and  ";
        }   
        $this->db->select('sum(LeaveDays)as tleaves');
        $this->db->from('leaveapplication');
        $condition=(" ".$emp." (LeaveStatus='Approved' or  LeaveStatus='Rejected' or LeaveStatus='Cancel Rejected') and ((LeaveFromDate between '".$lyr."' and '".$yr."') || (LeaveToDate between '".$lyr."' and '".$yr."') || (LeavePermissionDate between '".$lyr."' and '".$yr."'))");
       $this->db->where($condition);
        $this->db->order_by("LeaveID", "desc");
        $query = $this->db->get();
        $total = $query->result_array();
        $tot = $total[0]['tleaves'];
        $emp2="";
        if($data>0){
           $emp2=" EmployeeEmpID='".$data."' and  ";
        } 
        $this->db->select('sum(NoDays) as cleaves');
        $this->db->from('compensationleave');
        $condition2=(" ".$emp2." Date(CompensationCreatedDate) between '".$lyr."' and '".$yr."'");
       $this->db->where($condition2);
        $this->db->order_by("CompensationID", "desc");
        $query2 = $this->db->get();
        $total2 = $query2->result_array();
        $comp = $total2[0]['cleaves'];

        $tcomp = 12 + $comp - $tot;

        if($query)
        {
            return $tcomp;
        }
        else{
            return false;
        }
    }


    
    public function LeaveList($lyr,$yr,$role)
    {
        if($role==5){
            $this->db->select('*');
            $this->db->from('leaveapplication');
            $this->db->join('employeedetails', 'employeedetails.EmployeeID = leaveapplication.LeaveEmployee and employeedetails.EmployeeDepartment = 4', 'inner');
            $condition=(" ((LeaveFromDate between '".$lyr."' and '".$yr."') || (LeaveToDate between '".$lyr."' and '".$yr."') || (LeavePermissionDate between '".$lyr."' and '".$yr."'))");
            $this->db->where($condition);
            $this->db->order_by("LeaveID", "desc");
            $query = $this->db->get();
        }else{
            $this->db->select('*');
            $this->db->from('leaveapplication');
            $condition=(" ((LeaveFromDate between '".$lyr."' and '".$yr."') || (LeaveToDate between '".$lyr."' and '".$yr."') || (LeavePermissionDate between '".$lyr."' and '".$yr."'))");
            $this->db->where($condition);
            $this->db->order_by("LeaveID", "desc");
            $query = $this->db->get();
        }
        if($query)
        {
            return $query->result_array();
        }
        else{
            return false;
        }
        
    }
    
    public function ListLeave()
    {
        
        $this->db->select('*');
        $this->db->from('leaveapplication');
        $this->db->order_by("LeaveID", "desc");
        $query = $this->db->get();
        if($query)
        {
            return $query->result_array();
        }
        else{
            return false;
        }
        
    }
    
    public function MontlyLeaveList()
    {
        $from=date("Y-m")."-01";
        $till=date("Y-m")."-31";
        $condition="";
        $this->db->select('*');
        $this->db->from('leaveapplication');
        $this->db->where("((LeaveFromDate BETWEEN '".$from."' AND '".$till."') || (LeaveToDate BETWEEN '".$from."' AND '".$till."') || (LeavePermissionDate BETWEEN '".$from."' AND '".$till."'))");
        $this->db->order_by("LeaveID", "desc");
        $query = $this->db->get();
        if($query)
        {
            return $query->result_array();
        }
        else{
            return false;
        }
        
    }
        
    public function LeaveCancel($data) { 
        $date=date("Y-m-d H:i:s");
        $this->db->set("LeaveIsCancelled",'1');
        $this->db->set("LeaveCancelDate",$date);   
        $this->db->set("LeaveStatus",'Cancel Request');      
        $this->db->set("LeaveCancelReason",$data['LeaveCancelReason']);
        $this->db->where("LeaveID", $data['LeaveID']);
        $query = $this->db->update('leaveapplication');   
        
        $this->db->select('EmployeeEmail, EmployeeFirstName, EmployeeLastName');
        $this->db->from('employeedetails');        
        $this->db->where("EmployeeDesignation", '1');  
        $this->db->order_by("EmployeeID", "asc");
        $query2 = $this->db->get();
        $empdet=$query2->result_array();
        
        $query = $this->db->insert('leaveapplication',$data);   
        $lid= $this->db->insert_id();

        $log2['employeeid']=$this->session->userdata['userdetails']->EmployeeID;
        $log2['page'] = 'Leave History';
        $log2['action'] = 'Applied Cancel Request';
        $log2['time'] = date('Y-m-d H:m:s');
        $query6 = $this->db->insert('logs',$log2);
        
        $frm=$this->session->userdata['userdetails']->EmployeeEmail;
        $name=$this->session->userdata['userdetails']->EmployeeUserName;
        
        if($this->session->userdata['userdetails']->EmployeeDepartment=='4'){  // || $this->session->userdata['userdetails']->EmployeeEmpID=='5'
            $this->db->select('EmployeeEmail, EmployeeFirstName, EmployeeLastName, EmployeeEmpID, EmployeeID');
            $this->db->from('employeedetails');        
            $this->db->where("EmployeeEmpID", 27);    
            $this->db->order_by("EmployeeEmpID", "asc");
            $query21 = $this->db->get();
            $empdet=$query21->result_array();
        }
            
            
        foreach($empdet as $emp){
            $to=$emp['EmployeeEmail'];
            $cc='chris@exponentialteam.com, manickaraj@exponentialteam.com';
            $msg="<table width='100%' border='0' cellspacing='0' cellpadding='0'>
                    <tr><td height='10' style='height:10px;'></td></tr>
                    <tr><td>Hello ".$emp['EmployeeFirstName']." ".$emp['EmployeeLastName'].", one ".$data['LeaveType']." Cancel Request has been received from ".$name." is waiting for approval.</td></tr>
                    <tr><td height='20' style='height:20px;'></td></tr>
                    <tr><td>Below is the link where you can approve/decline the request.</td></tr>
                    <tr><td height='6' style='height:6px;'></td></tr>
                    <tr><td><a href='http://coreaptitude.in/tcpmail/LeaveApplication?LID=".$lid."'>http://coreaptitude.in/tcpmail/LeaveApplication?LID=".$lid."</a> Click link to manage</td></tr>
                    <tr><td height='30'></td></tr>
                    <tr><td>You can copy & paste the same url in new tab to open the webpage</td></tr>
                    <tr><td height='6' style='height:6px;'></td></tr>
                    <tr><td>Thank you,</td></tr>
                    <tr><td>".$this->session->userdata['userdetails']->EmployeeFirstName." ".$this->session->userdata['userdetails']->EmployeeLastName.",</td></tr>
                    <tr><td>".$this->session->userdata['userdetails']->DesignationName.",</td></tr>
                    <tr><td>TCP International Inc.</td></tr>
                </table>";
            
            if($data['LeaveType']=='Leave'){
                $subject="Leave Cancellation Request";
            }else{
                $subject="Permission Cancellation Request";
            }
                      
            $this->load->library('email');
            
            $config['protocol'] = 'sendmail';
            $config['mailpath'] = '/usr/sbin/sendmail';
            $config['charset'] = 'iso-8859-1';
            $config['wordwrap'] = TRUE;

            $this->email->initialize($config);
            
            $this->email->set_mailtype('html');

            $this->email->from($frm, $name);
            $this->email->to($to);
            $this->email->cc($cc);
            //$this->email->bcc($bcc);

            $this->email->subject($subject);
            $this->email->message($msg);

            if($this->email->send()){           
                return 'Success';
            }else{
                return 'failed';
            }
        }
        
    }
    
    public function LeaveApproval($data) { 
        $sh=0;
        $date=date("Y-m-d H:i:s");
        $this->db->where("LeaveID", $data['LeaveID']);
        $query = $this->db->get('leaveapplication');   
        $shrow=$query->num_rows();
        if($shrow>0){       	 	
            $this->db->set("LeaveStatus",$data['LeaveStatus']);
            $this->db->set("LeaveStatusReason",$data['LeaveStatusReason']);
            $this->db->set("LeaveApprovedBy",$data['LeaveApprovedBy']);
            $this->db->set("LeaveApprovedDate",$data['LeaveApprovedDate']);
            $this->db->where("LeaveID", $data['LeaveID']);
            $query = $this->db->update('leaveapplication');
            
            $this->db->select('*');
            $this->db->from('leaveapplication');
            $this->db->where("LeaveID", $data['LeaveID']);
            $query2 = $this->db->get();
            $levdet=$query2->result_array();
            foreach($levdet as $levde){
                $empid=$levde['LeaveEmployee'];
                $ltype=$levde['LeaveType'];
                $ldays=$levde['LeaveDays'];
            }
            
            $this->db->select('EmployeeEmail, EmployeeFirstName, EmployeeLastName,EmployeeJoinDate,EmployeeLeaves');
            $this->db->from('employeedetails');
            $this->db->where("EmployeeEmpID", $empid);
            $this->db->order_by("EmployeeID", "asc");
            $query3 = $this->db->get();

            $empd=$query3->result_array();
            
            foreach($empd as $emp){
                $efname=$emp['EmployeeFirstName'];
                $elname=$emp['EmployeeLastName'];
                $to=$emp['EmployeeEmail'];
                $pcdate=date('Y-m-d',strtotime($emp['EmployeeJoinDate']."+3 month"));
                $cdate=date('Y-m-d');

                $log1['employeeid']=$this->session->userdata['userdetails']->EmployeeID;
                $log1['page'] = 'Dashboard';
                $log1['action'] = 'Applied '.' '.$ltype.' '.$data['LeaveStatus'];
                $log1['time'] = date('Y-m-d H:m:s');
                $query5 = $this->db->insert('logs',$log1); 
                
                if($ltype=='Leave' && $pcdate<=$cdate){
                    $cl=($emp['EmployeeLeaves']*1)-($ldays*1);
                    
                    $this->db->set("EmployeeLeaves",$cl);
                    $this->db->where("EmployeeEmpID", $empid);
                    $query = $this->db->update('employeedetails');  
                }
                
                if($ltype=='Permission' && $pcdate<=$cdate){
                    $from=date("Y-m")."-01";
                    $till=date("Y-m")."-31";
                    $this->db->select('*');
                    $this->db->from('leaveapplication');
                    $this->db->where(" (LeavePermissionDate BETWEEN '".$from."' AND '".$till."')");  
                    $this->db->order_by("LeaveID", "desc");
                    $query = $this->db->get();                    
                    $numday=$query->num_rows();
                    
                    if($numday%3==0){
                        $cl=($emp['EmployeeLeaves']*1)-0.5;
                        
                        $this->db->set("EmployeeLeaves",$cl);
                        $this->db->where("EmployeeEmpID", $empid);
                        $query = $this->db->update('employeedetails'); 
                        
                    }
                     
                }
                
            }            
            $cc='manickaraj@exponentialteam.com';
            
            $frm=$this->session->userdata['userdetails']->EmployeeEmail;
            $name=$this->session->userdata['userdetails']->EmployeeUserName;

           
            $msg="<table width='100%' border='0' cellspacing='0' cellpadding='0'>
                    <tr><td height='10' style='height:10px;'></td></tr>
                    <tr><td> Hello ".$efname." ".$elname.", your ".$ltype." application has been ".$data['LeaveStatus']." by ".$name." with the following Note.</td></tr>
                    <tr><td style='height:10px;'></td></tr>
                    <tr><td>".$data['LeaveStatusReason']."</td></tr>
                    <tr><td style='height:20px;'></td></tr>
                    <tr><td>Thank you,</td></tr>
                    <tr><td>".$this->session->userdata['userdetails']->EmployeeFirstName." ".$this->session->userdata['userdetails']->EmployeeLastName.",</td></tr>
                    <tr><td>".$this->session->userdata['userdetails']->DesignationName.",</td></tr>
                    <tr><td>TCP International Inc.</td></tr>
                </table>";

            if($ltype=='Leave'){
                $subject="Leave Application Reply";
            }else{
                $subject="Permission Request Reply";
            }

            $this->load->library('email');
            
            $config['protocol'] = 'sendmail';
            $config['mailpath'] = '/usr/sbin/sendmail';
            $config['charset'] = 'iso-8859-1';
            $config['wordwrap'] = TRUE;

            $this->email->initialize($config);
            
            $this->email->set_mailtype('html');

            $this->email->from($frm, $name);
            $this->email->to($to);            
            $this->email->cc($cc);

            $this->email->subject($subject);
            $this->email->message($msg);
            
            if($this->email->send()){           
                return 'Success';
            }else{
                return 'Failed';
            }
            
        }
    }  
    
    public function LeaveCancelApproval($data) { 
        $sh=0;
        $date=date("Y-m-d H:i:s");
        $this->db->where("LeaveID", $data['LeaveID']);
        $query = $this->db->get('leaveapplication');   
        $shrow=$query->num_rows();
        if($shrow>0){       	 	
            $this->db->set("LeaveStatus","Cancel ".$data['LeaveStatus']);
            $this->db->set("LeaveCancelStatusReason",$data['LeaveCancelStatusReason']);
            $this->db->set("LeaveCancelApprovedBy",$data['LeaveCancelApprovedBy']);
            $this->db->set("LeaveCancelApprovedDate",$date);
            $this->db->where("LeaveID", $data['LeaveID']);
            $query = $this->db->update('leaveapplication');
            
            $this->db->select('*');
            $this->db->from('leaveapplication');
            $this->db->where("LeaveID", $data['LeaveID']);
            $query2 = $this->db->get();
            $levdet=$query2->result_array();
            foreach($levdet as $levde){
                $empid=$levde['LeaveEmployee'];
                $ltype=$levde['LeaveType'];
                $ldays=$levde['LeaveDays'];
            }
            
            $this->db->select('EmployeeEmail, EmployeeFirstName, EmployeeLastName,EmployeeJoinDate,EmployeeLeaves');
            $this->db->from('employeedetails');
            $this->db->where("EmployeeEmpID", $empid);
            $this->db->order_by("EmployeeID", "asc");
            $query3 = $this->db->get();

            $empd=$query3->result_array();
            
            foreach($empd as $emp){
                $efname=$emp['EmployeeFirstName'];
                $elname=$emp['EmployeeLastName'];
                $to=$emp['EmployeeEmail'];
                $pcdate=date('Y-m-d',strtotime($emp['EmployeeJoinDate']."+3 month"));
                $cdate=date('Y-m-d'); 
                
                if($ltype=='Leave' && $pcdate<=$cdate){
                    $cl=($emp['EmployeeLeaves']*1)+$ldays;
                    
                    $this->db->set("EmployeeLeaves",$cl);
                    $this->db->where("EmployeeEmpID", $empid);
                    $query = $this->db->update('employeedetails');  
                }
                
                if($ltype=='Permission' && $pcdate<=$cdate){
                    
                    $from=date("Y-m")."-01";
                    $till=date("Y-m")."-31";
                    $this->db->select('*');
                    $this->db->from('leaveapplication');
                    $this->db->where(" (LeavePermissionDate BETWEEN '".$from."' AND '".$till."')");
                    $this->db->order_by("LeaveID", "desc");
                    $query = $this->db->get();                    
                    $numday=$query->num_rows();
                    
                    if($numday%3==0){
                        $cl=($emp['EmployeeLeaves']*1)+0.5;
                        
                        $this->db->set("EmployeeLeaves",$cl);
                        $this->db->where("EmployeeEmpID", $empid);
                        $query = $this->db->update('employeedetails');                         
                    }
                     
                }
                
            }            
            $cc='manickaraj@exponentialteam.com';
            
            $frm=$this->session->userdata['userdetails']->EmployeeEmail;
            $name=$this->session->userdata['userdetails']->EmployeeUserName;

           
            $msg="<table width='100%' border='0' cellspacing='0' cellpadding='0'>
                    <tr><td height='10' style='height:10px;'></td></tr>
                    <tr><td> Hello ".$efname." ".$elname.", your ".$ltype." Cancellation Request has been ".$data['LeaveStatus']." by ".$name." with the following Note.</td></tr>
                    <tr><td style='height:10px;'></td></tr>
                    <tr><td>".$data['LeaveStatusReason']."</td></tr>
                    <tr><td style='height:20px;'></td></tr>
                    <tr><td>Thank you,</td></tr>
                    <tr><td>".$this->session->userdata['userdetails']->EmployeeFirstName." ".$this->session->userdata['userdetails']->EmployeeLastName.",</td></tr>
                    <tr><td>".$this->session->userdata['userdetails']->DesignationName.",</td></tr>
                    <tr><td>TCP International Inc.</td></tr>
                </table>";

            if($ltype=='Leave'){
                $subject="Leave Cancellation Request Reply";
            }else{
                $subject="Permission Cancellation Request Reply";
            }

            $this->load->library('email');
            
            $config['protocol'] = 'sendmail';
            $config['mailpath'] = '/usr/sbin/sendmail';
            $config['charset'] = 'iso-8859-1';
            $config['wordwrap'] = TRUE;

            $this->email->initialize($config);
            
            $this->email->set_mailtype('html');

            $this->email->from($frm, $name);
            $this->email->to($to);            
            $this->email->cc($cc);

            $this->email->subject($subject);
            $this->email->message($msg);
            
            if($this->email->send()){           
                return 'Success';
            }else{
                return 'Failed';
            }
            
        }
    }  
    
    public function InsertLeave($data) { 
        if($this->session->userdata['userdetails']->EmployeeEmail==''){
            return 'failed';
        }


        
        $diff = abs(strtotime($data['LeaveToDate']) - strtotime($data['LeaveFromDate']));
        $days  = floor($diff / (60*60*24));
        $data['LeaveDays']= $days+1;
        if($data['LeaveType']=='Leave'){            
            if($data['LeaveDays']>1 || $data['LeaveSession']=='Full Day'){
                
                $totaldays=$data['LeaveDays'];
                
                if($totaldays>1){                  
                    $leavedays = 0;
                    $sdate=$data['LeaveFromDate'];
                    for ($i = 1; $i <= $totaldays; $i++) {
                        $get_name = date('D', strtotime($sdate)); 
                        $cmonth = date('F Y', strtotime($sdate));
                        $secondsat = date('Y-m-d', strtotime('Second Saturday Of '.$cmonth));
                        $fourthsat = date('Y-m-d', strtotime('Fourth Saturday Of '.$cmonth));  

                        //($get_name =='Sat' && $secondsat!=$sdate && $fourthsat!=$sdate)                       
                        if($get_name == 'Sun' || $get_name =='Sat'){
                            $leavedays++;
                        }

                        $sdate=date('Y-m-d', strtotime($sdate."+1 day"));
                    }

                        $from = $data['LeaveFromDate'];
                         $to = $data['LeaveToDate'];
        

                    $this->db->select('*');
                    $this->db->from('officialleave');
                    $condition=(" OfficialLeaveFrom between '".$from."' and '".$to."' ");
                    $this->db->where($condition);
                    $query3 = $this->db->get();
                    $querycount = $query3->num_rows();
                       
                                  
                    $data['LeaveDays']=$totaldays-$leavedays-$querycount;
                    $leavedate=" from ".$data['LeaveFromDate']." to ".$data['LeaveToDate'];
                }else{
                    $leavedate=" on ".$data['LeaveFromDate'];
                }
                $data['LeaveSession']='Full Day';
            }else{
                $data['LeaveDays']='0.5';
                $data['LeaveSession']=$data['LeaveSession']; 
            }
        }else{
            $data['LeaveDays']=0;
            $leavedate=" on ".$data['LeavePermissionDate']." between ".$data['LeavePermissionFrom']." to ".$data['LeavePermissionTo'];
            $data['LeaveSession']='';
        }
                
         
        if($this->session->userdata['userdetails']->EmployeeEmpID=='1'){
            $uemp='11';
            $cc='manickaraj@exponentialteam.com';
        }else{
            $uemp='1';
            $cc='chris@exponentialteam.com, manickaraj@exponentialteam.com';
        }
        
        $this->db->select('EmployeeEmail, EmployeeFirstName, EmployeeLastName, EmployeeEmpID, EmployeeID');
        $this->db->from('employeedetails');        
        $this->db->where("EmployeeEmpID", $uemp);    
        $this->db->order_by("EmployeeEmpID", "asc");
        $query2 = $this->db->get();
        $empdet=$query2->result_array();

        
        $query = $this->db->insert('leaveapplication',$data);   
        $lid= $this->db->insert_id();


        $log['employeeid']=$this->session->userdata['userdetails']->EmployeeID;
        $log['page'] = 'Apply Leave';
        $log['action'] = 'Applied'.' '.$data['LeaveType'];
        $log['time'] = date('Y-m-d H:m:s');
        $query4 = $this->db->insert('logs',$log);
        
        $frm=$this->session->userdata['userdetails']->EmployeeEmail;
        $name=$this->session->userdata['userdetails']->EmployeeUserName;
        
        foreach($empdet as $emp){
            $to=$emp['EmployeeEmail'];
        }
        
        
        
        if($this->session->userdata['userdetails']->EmployeeDepartment=='4'){  // || $this->session->userdata['userdetails']->EmployeeEmpID=='5'
            $this->db->select('EmployeeEmail, EmployeeFirstName, EmployeeLastName, EmployeeEmpID, EmployeeID');
            $this->db->from('employeedetails');        
            $this->db->where("EmployeeEmpID", 27);    
            $this->db->order_by("EmployeeEmpID", "asc");
            $query21 = $this->db->get();
            $empdet21=$query21->result_array();
            
            foreach($empdet21 as $emp){
                //$to=$emp21['EmployeeEmail'];
            }
            
            $to=$emp['EmployeeEmail'].','.$to;
        }
        
      
        $msg="<table width='100%' border='0' cellspacing='0' cellpadding='0'>
                <tr><td height='10' style='height:10px;'></td></tr>
                <tr><td>Dear ".$emp['EmployeeFirstName']." ".$emp['EmployeeLastName'].", one ".$data['LeaveType']." application has been received from ".$name." is waiting for approval.</td></tr>
                <tr><td height='20' style='height:20px;'></td></tr>
                <tr><td>Below is the link where you can approve/decline the request.</td></tr>
                <tr><td height='6' style='height:6px;'></td></tr>
                <tr><td><a href='http://coreaptitude.in/tcpmail/LeaveApplication?LID=".$lid."'>http://coreaptitude.in/tcpmail/LeaveApplication?LID=".$lid."</a> Click link to manage</td></tr>
                <tr><td height='30'></td></tr>
                <tr><td>You can copy & paste the same url in new tab to open the webpage</td></tr>
                <tr><td height='6' style='height:6px;'></td></tr>
                <tr><td>Thank you,</td></tr>
                <tr><td>".$this->session->userdata['userdetails']->EmployeeFirstName." ".$this->session->userdata['userdetails']->EmployeeLastName.",</td></tr>
                <tr><td>".$this->session->userdata['userdetails']->DesignationName.",</td></tr>
                <tr><td>TCP International Inc.</td></tr>
            </table>";

        if($data['LeaveType']=='Leave'){
            $subject="Leave Application Request";
        }else{
            $subject="Permission Request";
        }
        
        $this->load->library('email');

        $config['protocol'] = 'sendmail';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;

        $this->email->initialize($config);

        $this->email->set_mailtype('html');

        $this->email->from($frm, $name);
        $this->email->to($to);
        $this->email->cc($cc);
        //$this->email->bcc($bcc);

        $this->email->subject($subject);
        $this->email->message($msg);
        if($this->email->send()){                 
            return $lid;
        }else{
            return 'failed';
        }
        
            
    }  
    
    
    public function ApplicationByID($data) { 
        $this->db->select('*');
        $this->db->from('leaveapplication');
        $this->db->where("LeaveID", $data);
        $query = $this->db->get();   
        
        return $query->row();

        
    }

 public function LeaveCheck($data){
    $emp['employeeid']=$this->session->userdata['userdetails']->EmployeeID;
        

if($data['type']=='Leave'){
 $fdate = date('Y-m-d', strtotime($data['LeaveFromDate']));
    $tdate = date('Y-m-d', strtotime($data['LeaveToDate']));


    $where = ( "('".$fdate."' BETWEEN LeaveFromDate and LeaveToDate || '".$tdate."' BETWEEN LeaveFromDate and LeaveToDate) AND LeaveEmployee = '".$emp['employeeid']."' AND (LeaveStatus ='Approved' || LeaveStatus ='Pending') ");
   
      $this->db->select('*');
      $this->db->from('leaveapplication');
      $this->db->where($where); 
     
       $query = $this->db->get();
      return $query->num_rows();
    
    } elseif($data['type']=='Permission'){

$fdate = date('H:i:s', strtotime($data['LeavePermissionFrom']));
    $tdate = date('H:i:s', strtotime($data['LeavePermissionTo']));

    $where = ( "('".$fdate."' BETWEEN LeavePermissionFrom and   LeavePermissionTo || '".$tdate."' BETWEEN LeavePermissionFrom and   LeavePermissionTo) AND LeaveEmployee = '".$emp['employeeid']."' AND (LeaveStatus ='Approved' || LeaveStatus ='Pending') ");
   
      $this->db->select('*');
      $this->db->from('leaveapplication');
      $this->db->where('LeavePermissionDate', date('Y-m-d', strtotime($data['LeavePermissionDate'])));
      $this->db->where($where);
       $query = $this->db->get();
      return $query->num_rows();
    }
    }
     
    
}
