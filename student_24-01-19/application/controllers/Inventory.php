<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('ManageInventory');
    }

    // For Inventory
    
    public function RequestInventory() {
        $this->load->view('requestinventory');
    }

    public function AddInventory() {
               
        $data['InventoryEmployee']=$this->input->post('InventoryEmployee');
        $data['InventoryItem']=$this->input->post('InventoryItem');
        $data['InventoryConfig']=$this->input->post('InventoryConfig');   
        $data['InventoryItemID']=$this->input->post('InventoryItemID');        
        $data['InventoryCondition']=$this->input->post('InventoryCondition');
        $data['InventoryOutStatus']='Pending';
        $data['InventoryOutDate']=date("Y-m-d",strtotime($this->input->post('InventoryOutDate')));     
        $data['InventoryAppliedon']=date("Y-m-d H:i:s");
                
        $user_data = $this->ManageInventory->InsertInventory($data);
        
        echo  $user_data;
        
    }
    
    public function ReturnInventory() {

        
        $data['InventoryEmployee']=$this->input->post('InventoryEmployee');
        $data['InventoryID']=$this->input->post('InventoryID');
        $data['InventoryInDate']=date("Y-m-d H:i:s");
                
        $user_data = $this->ManageInventory->InventoryReturn($data);
        
        echo  $user_data;
        
    }
    
    public function InventoryHistory() {
                
        $empid=$this->session->userdata['userdetails']->EmployeeEmpID;
                
        $user_data['inventorylist'] = $this->ManageInventory->InventoryListByEmpId($empid);
        
        $this->load->view('inventoryhistory',$user_data);
        
    }
    
    public function InventoryRequests() {
                
                        
        $user_data['inventorylist'] = $this->ManageInventory->EmpInventoryList();
        
        $this->load->view('inventoryrequests',$user_data);
        
    }

    public function FilterInventory() {
           
          if(array_key_exists('inventorytype1', $_REQUEST))
           {
             $data['val'] = $_REQUEST['inventorytype1'];
             $data['field'] = 'InventoryInStatus';
             $data['type'] ='In';
           }  
            else 
           {
             $data['val'] = $_REQUEST['inventorytype2'];
             $data['field'] = 'InventoryOutStatus';
             $data['field2'] = 'InventoryInStatus';
             $data['val2'] ='';
             $data['type'] ='Out';
           }               
        $user_data['filterinventory'] = $this->ManageInventory->FilterInventory($data);

        $this->load->view('filterinventory',$user_data);

        
    }

    public function InventoryOutIn() {
        $data['type']=$this->input->post('InventoryType');  
        $data['note']=$this->input->post('InventoryNote');  
        if($data['type']=='out'){
            $data['InventoryOutInspectedBy']=$this->input->post('InventoryApprovedBy');   
            $data['InventoryItemID']=$this->input->post('InventoryItemID');    
            $data['InventoryOutSign']=$data['note']; 
            $data['InventoryOutApprovedDate']=date('Y-m-d H:i:s');   
            $data['InventoryID']=$this->input->post('InventoryID'); 
            $data['InventoryStatus']=$this->input->post('InventoryStatus');
        }else{
            $data['InventoryInInspectedBy']=$this->input->post('InventoryApprovedBy');       
            $data['InventoryItemID']=$this->input->post('InventoryItemID');       
            $data['InventoryInSign']=$data['note']; 
            $data['InventoryInApprovedDate']=date('Y-m-d H:i:s'); 
            $data['InventoryID']=$this->input->post('InventoryID');
            $data['InventoryStatus']=$this->input->post('InventoryStatus');
        }
        
        $user_data = $this->ManageInventory->OutInInventory($data);
        
    }

    


    
    public function InventoryApproval() {
        
        $url = parse_url($_SERVER['REQUEST_URI']);
        parse_str($url['query'], $params);
        
        $user_data['inventory'] = $this->ManageInventory->InventoryByID($params['LID']);
        
        $this->load->view('inventoryapproval',$user_data);
        
     }
     
    
    // For Inventory Category
     
    
    public function InventoryCategory() {
    $user_data['categorylist'] = $this->ManageInventory->Category();
        
        $this->load->view('inventorycategory',$user_data);
    }
    
    public function CategoryAdd() {
        
        $data['CategoryEmployee']=$this->input->post('CategoryEmployee');
        $data['CategoryName']=$this->input->post('CategoryName');
        $data['CategoryDate']=date("Y-m-d H:i:s");
        
        $user_data = $this->ManageInventory->AddCategory($data);
        
        echo  $user_data;
    }
    
    public function CategoryEdit() {
        
        $data['CategoryEmployee']=$this->input->post('CategoryEmployee');
        $data['CategoryName']=$this->input->post('CategoryName');
        $data['CategoryID']=$this->input->post('CategoryID');
        $data['CategoryDate']=date("Y-m-d H:i:s");
        
        $user_data = $this->ManageInventory->EditCategory($data);
        
        echo  $user_data;
    }

     public function CategoryDelete() {
    
        $data['CategoryID']=$this->input->post('CategoryID');
        
        $user_data = $this->ManageInventory->DeleteCategory($data);
        
        echo  $user_data;
    }


    
    
    // For Inventory Item
    
    public function InventoryItem() {
        $user_data['itemlist'] = $this->ManageInventory->Item('list');
        
        $this->load->view('inventoryitem',$user_data);
    }
    
    public function ItemAdd() {
    
        $data['ItemEmployee']=$this->input->post('ItemEmployee');
        $data['ItemName']=$this->input->post('ItemName');
        $data['ItemCategory']=$this->input->post('ItemCategory');
        $data['ItemConfiguration']=$this->input->post('ItemConfiguration');
        $data['ItemCondition']=$this->input->post('ItemCondition');
        $data['ItemDate']=date("Y-m-d H:i:s");
        $data['isActive']=$this->input->post('isActive');
        $image=$this->input->post('ItemImage');
       
        $img = $image;
        $img1 = str_replace('data:image/jpeg;base64,', '', $img);
        $data1 = base64_decode($img1);
       $target_dir = "inventoryimage/";
       $imgname=uniqid().'.jpeg';
       $file = $target_dir.$imgname;
       $success = file_put_contents($file, $data1);
       $data['ItemImage']=$imgname;
       $user_data = $this->ManageInventory->AddItem($data);
    }
    
    public function ItemEdit() {
    
        $data['ItemEmployee']=$this->input->post('ItemEmployee');
        $data['ItemName']=$this->input->post('ItemName');
        $data['ItemCategory']=$this->input->post('ItemCategory');
        $data['ItemConfiguration']=$this->input->post('ItemConfiguration');
        $data['ItemCondition']=$this->input->post('ItemCondition');
        $data['ItemID']=$this->input->post('ItemID');
        $data['ItemDate']=date("Y-m-d H:i:s");
        $data['isActive']=$this->input->post('isActive');
         $image=$this->input->post('ItemImage');
       if($image!=''){

       
        $img = $image;
        $img1 = str_replace('data:image/jpeg;base64,', '', $img);
        $data1 = base64_decode($img1);
        $target_dir = "inventoryimage/";
        $imgname=uniqid().'.jpeg';
        $file = $target_dir.$imgname;
       $success = file_put_contents($file, $data1);
       $data['ItemImage']=$imgname;
        }
        else{
           $data['ItemImage']='' ;
        }
        
        $user_data = $this->ManageInventory->EditItem($data);
        
        echo  $user_data;
    }


    public function ItemDelete() {
     
        $data['ItemID']=$this->input->post('ItemID');
        $data['ItemImage']=$this->input->post('ItemImage');

        
        $user_data = $this->ManageInventory->DeleteItem($data);
        
        echo  $user_data;
    }
     
}
