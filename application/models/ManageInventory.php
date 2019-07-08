<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageInventory extends CI_Model {
    
    public function __construct(){
        parent::__construct();
    }    
    
    //For Inventory
    public function InventoryListByEmpId($empid) {
        
        $this->db->select('*');
        $this->db->from('inventory');
        $this->db->where("InventoryEmployee", $empid);
        $this->db->order_by("InventoryID", "desc");
        $query = $this->db->get();
       
        if($query)
        {
            return $query->result_array();
        }
        else{
            return false;
        }
    }
    
    public function EmpInventoryList() {
        
        $this->db->select('*');
        $this->db->from('inventory');
        $this->db->order_by("InventoryID", "desc");
        $query = $this->db->get();
       
        if($query)
        {
            return $query->result_array();
        }
        else{
            return false;
        }
    }

    public function FilterInventory($data) {
        
        $this->db->select('*');
        $this->db->from('inventory');
        $this->db->where($data['field'], $data['val']);
        if($data['type']=='Out'){
            $this->db->where($data['field2'], $data['val2']);
        }
        $query = $this->db->get();
       
        if($query)
        {
            return $query->result_array();
        }
        else{
            return false;
        }
    }
   
    public function OutInInventory($data) { 
        $sh=0;
        $date=date("Y-m-d H:i:s");
        $this->db->where("InventoryID", $data['InventoryID']);
        $query = $this->db->get('inventory');   
        $shrow=$query->num_rows();
        if($shrow>0){     
            if($data['type']=='out'){
                $this->db->set("InventoryOutInspectedBy",$data['InventoryOutInspectedBy']);
                $this->db->set("InventoryOutSign",$data['InventoryOutSign']);
                $this->db->set("InventoryOutApprovedDate",$data['InventoryOutApprovedDate']);
                $this->db->set("InventoryOutStatus",$data['InventoryStatus']);
            }else{
                $this->db->set("InventoryInInspectedBy",$data['InventoryInInspectedBy']);
                $this->db->set("InventoryInSign",$data['InventoryInSign']);
                $this->db->set("InventoryInApprovedDate",$data['InventoryInApprovedDate']);
                $this->db->set("InventoryInStatus",$data['InventoryStatus']);
                if($data['InventoryStatus']=='Approved'){
                    $this->db->set("InventoryIsReturned",'1');
                }
            }
            $this->db->where("InventoryID", $data['InventoryID']);
            $query = $this->db->update('inventory');
            if($data['type']=='out' && $data['InventoryStatus']=='Rejected'){
                $this->db->set("ItemStatus",'0');
                $this->db->where("ItemID", $data['InventoryItemID']);
                $query = $this->db->update('inventoryitem');
            }elseif($data['type']=='in' && $data['InventoryStatus']=='Approved'){
                $this->db->set("ItemStatus",'0');
                $this->db->where("ItemID", $data['InventoryItemID']);
                $query = $this->db->update('inventoryitem');
            }
            
            
            $this->db->select('*');
            $this->db->from('inventory');
            $this->db->where("InventoryID", $data['InventoryID']);
            $query2 = $this->db->get();
            $levdet=$query2->result_array();
            foreach($levdet as $levde){
                $empid=$levde['InventoryEmployee'];
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
            }            
            $cc='manickaraj@exponentialteam.com';
            
            $frm=$this->session->userdata['userdetails']->EmployeeEmail;
            $name=$this->session->userdata['userdetails']->EmployeeUserName;

           
            $msg="<table width='100%' border='0' cellspacing='0' cellpadding='0'>
                    <tr><td height='10' style='height:10px;'></td></tr>
                    <tr><td> Hello ".$efname." ".$elname.", your ".$data['type']." Inventory request has been confirmed by ".$name." with the following Note.</td></tr>
                    <tr><td style='height:10px;'></td></tr>
                    <tr><td>".$data['note']."</td></tr>
                    <tr><td style='height:20px;'></td></tr>
                    <tr><td>Thank you,</td></tr>
                    <tr><td>".$this->session->userdata['userdetails']->EmployeeFirstName." ".$this->session->userdata['userdetails']->EmployeeLastName.",</td></tr>
                    <tr><td>".$this->session->userdata['userdetails']->DesignationName.",</td></tr>
                    <tr><td>TCP International Inc.</td></tr>
                </table>";

            $subject="Inventory ".$data['type']." Request Reply";

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
            
            $this->email->send();          
            return 'Success';
            
            
        }else{
                return 'Failed';
            }
    }  
    
    public function InsertInventory($data) { 
        
        $this->db->select('ItemID');
        $this->db->from('inventoryitem');        
        $this->db->where("ItemID", $data['InventoryItemID']);
        $this->db->where("ItemStatus",'0');
        $query2 = $this->db->get();
        $nums=$query2->num_rows();
        if($nums==0){
             return 'failed';
             exit;
        }
        
        
        $this->db->select('EmployeeEmail, EmployeeFirstName, EmployeeLastName');
        $this->db->from('employeedetails');        
        $this->db->where("EmployeeUserRole", '1');   
        $this->db->order_by("EmployeeID", "asc");
        $query2 = $this->db->get();
        $empdet=$query2->result_array();
        
        $query = $this->db->insert('inventory',$data);   
        $lid= $this->db->insert_id();

        $log4['employeeid']=$this->session->userdata['userdetails']->EmployeeID;
        $log4['page'] = 'Request Inventory';
        $log4['action'] = 'Request Item';
        $log4['time'] = date('Y-m-d H:m:s');
        $query8 = $this->db->insert('logs',$log4);
        
        $frm=$this->session->userdata['userdetails']->EmployeeEmail;
        $name=$this->session->userdata['userdetails']->EmployeeUserName;
        
        $this->db->set("ItemStatus",'1');
        $this->db->where("ItemID", $data['InventoryItemID']);
        $query = $this->db->update('inventoryitem');
            
            
        foreach($empdet as $emp){
            $to=$emp['EmployeeEmail'];
            
            $cc='manickaraj@exponentialteam.com';
            $msg="<table width='100%' border='0' cellspacing='0' cellpadding='0'>
                    <tr><td height='10' style='height:10px;'></td></tr>
                    <tr><td>Hello ".$emp['EmployeeFirstName']." ".$emp['EmployeeLastName'].", one Inventory has been received from ".$name." is waiting for approval.</td></tr>
                    <tr><td height='20' style='height:20px;'></td></tr>
                    <tr><td>Below is the link where you can approve/decline the request.</td></tr>
                    <tr><td height='6' style='height:6px;'></td></tr>
                    <tr><td><a href='http://coreaptitude.in/tcpmail/InventoryApproval?LID=".$lid."&Type=Out'>http://coreaptitude.in/tcpmail/InventoryApproval?LID=".$lid."&Type=Out</a> Click link to manage</td></tr>
                    <tr><td height='30'></td></tr>
                    <tr><td>You can copy & paste the same url in new tab to open the webpage</td></tr>
                    <tr><td height='6' style='height:6px;'></td></tr>
                    <tr><td>Thank you,</td></tr>
                    <tr><td>".$this->session->userdata['userdetails']->EmployeeFirstName." ".$this->session->userdata['userdetails']->EmployeeLastName.",</td></tr>
                    <tr><td>".$this->session->userdata['userdetails']->DesignationName.",</td></tr>
                    <tr><td>TCP International Inc.</td></tr>
                </table>";
            
            $subject="Inventory Approval Request";
            
           
            
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
            
    }  
    
    public function InventoryReturn($data) { 
        
        $this->db->select('EmployeeEmail, EmployeeFirstName, EmployeeLastName');
        $this->db->from('employeedetails');        
        $this->db->where("EmployeeUserRole", '1');   
        $this->db->order_by("EmployeeID", "asc");
        $query2 = $this->db->get();
        $empdet=$query2->result_array();
        
        

        $this->db->set("InventoryEmployee",$data['InventoryEmployee']);
        $this->db->set("InventoryInDate",$data['InventoryInDate']);
        $this->db->set("InventoryInStatus",'Pending');
        $this->db->where("InventoryID", $data['InventoryID']);
        $query = $this->db->update('inventory');
        
        $frm=$this->session->userdata['userdetails']->EmployeeEmail;
        $name=$this->session->userdata['userdetails']->EmployeeUserName;
        
        
            
            
        foreach($empdet as $emp){
            $to=$emp['EmployeeEmail'];
            
            $cc='manickaraj@exponentialteam.com';
            $msg="<table width='100%' border='0' cellspacing='0' cellpadding='0'>
                    <tr><td height='10' style='height:10px;'></td></tr>
                    <tr><td>Hello ".$emp['EmployeeFirstName']." ".$emp['EmployeeLastName'].", one Inventory has been received from ".$name." is waiting for approval.</td></tr>
                    <tr><td height='20' style='height:20px;'></td></tr>
                    <tr><td>Below is the link where you can approve/decline the request.</td></tr>
                    <tr><td height='6' style='height:6px;'></td></tr>
                    <tr><td><a href='http://coreaptitude.in/tcpmail/InventoryApproval?LID=".$data['InventoryID']."&Type=In'>http://coreaptitude.in/tcpmail/InventoryApproval?LID=".$lid."&Type=In</a> Click link to manage</td></tr>
                    <tr><td height='30'></td></tr>
                    <tr><td>You can copy & paste the same url in new tab to open the webpage</td></tr>
                    <tr><td height='6' style='height:6px;'></td></tr>
                    <tr><td>Thank you,</td></tr>
                    <tr><td>".$this->session->userdata['userdetails']->EmployeeFirstName." ".$this->session->userdata['userdetails']->EmployeeLastName.",</td></tr>
                    <tr><td>".$this->session->userdata['userdetails']->DesignationName.",</td></tr>
                    <tr><td>TCP International Inc.</td></tr>
                </table>";
            
            $subject="Inventory Return Request";
            
           
            
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
            
    }  
    
    public function InventoryByID($data) { 
        
        $this->db->select('*');
        $this->db->from('inventory');
        $this->db->where("InventoryID", $data);
        $query = $this->db->get();   
        
        return $query->row();

    }
    
    
    //For Category
    
    public function Category() {
        
        $this->db->select('*,employee.EmployeeUserName');
        $this->db->from('inventorycategory');
        $this->db->join('employee', 'employee.EmployeeID = inventorycategory.CategoryEmployee', 'left');
        $this->db->order_by("CategoryID", "desc");
        $query = $this->db->get();
       
        if($query)
        {
            return $query->result_array();
        }
        else{
            return false;
        }
    }
    
        
    public function AddCategory($data) {
        
        $query = $this->db->insert('inventorycategory',$data);   
        $lid= $this->db->insert_id();
        $log['employeeid']=$this->session->userdata['userdetails']->EmployeeID;
        $log['page'] = 'Inventory Category';
        $log['action'] = 'Add Category';
        $log['time'] = date('Y-m-d H:m:s');
        $query4 = $this->db->insert('logs',$log);
       
        if($query)
        {
            return $lid;
        }
        else{
            return false;
        }
    }
    
    public function EditCategory($data) {
        
        $this->db->set("CategoryEmployee",$data['CategoryEmployee']);
        $this->db->set("CategoryName",$data['CategoryName']);
        $this->db->set("CategoryDate",$data['CategoryDate']);
        $this->db->where("CategoryID",$data['CategoryID']);
        $query = $this->db->update('inventorycategory');

        $log1['employeeid']=$this->session->userdata['userdetails']->EmployeeID;
        $log1['page'] = 'Inventory Category';
        $log1['action'] = 'Edit Category';
        $log1['time'] = date('Y-m-d H:m:s');
        $query5 = $this->db->insert('logs',$log1);

               
        if($query)
        {
            return $lid;
        }
        else{
            return false;
        }
    }

     public function DeleteCategory($data) {
        
         $this->db->where('CategoryID', $data['CategoryID']);
         $this->db->delete('inventorycategory');

        //$this->db->delete('inventoryitem', $data); 
       

        $log4['employeeid']=$this->session->userdata['userdetails']->EmployeeID;
        $log4['page'] = 'Inventory List';
        $log4['action'] = 'Delete Category List';
        $log4['time'] = date('Y-m-d H:m:s');
        $query8 = $this->db->insert('logs',$log4);

               
        if($query8)
        {
            return $lid;
        }
        else{
            return false;
        }
    }
    
    
    //For Item
    
    public function Item($type) {
        
        $this->db->select('inventoryitem.*, inventorycategory.CategoryName, inventorycategory.CategoryID');
        $this->db->from('inventoryitem');
        $this->db->join('inventorycategory', 'inventorycategory.CategoryID = inventoryitem.ItemCategory', 'left'); 
        if($type=='request'){
            $this->db->where("inventoryitem.ItemStatus",'0');
        }
        $this->db->order_by("ItemID", "desc");
        $query = $this->db->get();
       
        if($query)
        {
            return $query->result_array();
        }
        else{
            return false;
        }
    }
    
    public function AddItem($data) {
        $query = $this->db->insert('inventoryitem',$data);   
        $lid= $this->db->insert_id();

        $log2['employeeid']=$this->session->userdata['userdetails']->EmployeeID;
        $log2['page'] = 'Inventory List';
        $log2['action'] = 'Add Item List';
        $log2['time'] = date('Y-m-d H:m:s');
        $query6 = $this->db->insert('logs',$log2);
       
        if($query)
        {
            return $lid;
        }
        else{
            return false;
        }
    }
    
    public function EditItem($data) {
        
        $this->db->set("ItemEmployee",$data['ItemEmployee']);
        $this->db->set("ItemName",$data['ItemName']);
        $this->db->set("ItemCategory",$data['ItemCategory']);
        $this->db->set("ItemConfiguration",$data['ItemConfiguration']);
        $this->db->set("ItemCondition",$data['ItemCondition']);
        if($data['ItemImage']!=''){
        $this->db->set("ItemImage",$data['ItemImage']);
    }
        $this->db->set("ItemDate",$data['ItemDate']);
        $this->db->set("isActive",$data['isActive']);
        $this->db->where("ItemID",$data['ItemID']);
        $query = $this->db->update('inventoryitem');

        $log3['employeeid']=$this->session->userdata['userdetails']->EmployeeID;
        $log3['page'] = 'Inventory List';
        $log3['action'] = 'Edit Item List';
        $log3['time'] = date('Y-m-d H:m:s');
        $query7 = $this->db->insert('logs',$log3);

               
        if($query)
        {
            return $lid;
        }
        else{
            return false;
        }
    }



    public function DeleteItem($data) {

        $target_dir = "inventoryimage/";
        unlink($target_dir.$data['ItemImage']);

         $this->db->where('ItemID', $data['ItemID']);
         $this->db->delete('inventoryitem');
       

        $log4['employeeid']=$this->session->userdata['userdetails']->EmployeeID;
        $log4['page'] = 'Inventory List';
        $log4['action'] = 'Delete Item List';
        $log4['time'] = date('Y-m-d H:m:s');
        $query8 = $this->db->insert('logs',$log4);

               
        if($query8)
        {
            return $lid;
        }
        else{
            return false;
        }
    }
    
    
}
