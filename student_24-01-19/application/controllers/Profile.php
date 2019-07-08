<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('ManageProfile'); 
        $this->load->model('ManageEmployee');       
        $this->load->model('ManageLeave');
    }
    
    public function Login() {     
        
        $var=@$this->session->userdata['userdetails']->EmployeeID;
        if($var!=''){
            header("Location:Index");
        }
        $this->load->view('login');
    }

   
    
    public function Logout() {        
        session_destroy();
        header("Location:Login");
    }
    
    public function CheckLogin() {
        
        $user=$this->input->post('username');
        $refer=$this->input->post('refer');
        $pass=$this->input->post('password');
        
        $result = $this->ManageProfile->loginvalidate($user,$pass);
        
        
        if($result=='Invalid Login'){
            $_SESSION['login']='Invalid Login Details';
            header("Location:../Login");
        }else{
            $this->session->set_userdata('userdetails', $result);
            if($_SESSION['URI']!=''){
               header("Location:".$_SESSION['URI']);
            }else{
            header("Location:../Index");
                
            }
        }
    }

     public function ForgotPassword() {
        $forgot = $this->input->post('forgot'); 
        $result = [];    
        if(isset($forgot) && $forgot=='Send'){
        
            
            $email=$this->input->post('email');
            
            $result1 = $this->ManageProfile->forgotpassword( $email);
            
            
            if($result1=='Invalid Email'){
                $result['msg'] = '<span style="color:red;">Invalid Email Provided</span>';
            }else{

                if($result1=='Success'){
                    $result['msg'] = '<span style="color:green;">Your Login Credentials has been sent to your registered email address</span>';
                }else{

                    $result['msg'] = '<span style="color:orange;">Unable to sent email please contact administrator</span>';
       
                }
   
            }
        }
        $this->load->view('forgotpassword',$result);
        
    }
    

    public function LeaveHistory() {
        
        $EmployeeID=$this->session->userdata['userdetails']->EmployeeID;
        
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
        
        $user_data['empleave'] = $this->ManageLeave->EmpLeavelist($EmployeeID,$sdate,$edate);
        
        $this->load->view('leavehistory',$user_data);
    }
    
    public function MyProfile() {
        $this->load->view('profile');
    }

    
    
    public function EditProfile() {
        $this->load->view('editprofile');
    }
    
    public function ChangePassword() {
        $this->load->view('changepassword');
    }
    
    
}
