<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends CI_Controller 
{    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('ManageProfile'); 
        $this->load->model('ManageEmployee');       
        $this->load->model('ManageLeave');
    }
    
    public function Login() 
    {
        $var=@$this->session->userdata['userdetails']->EmployeeID;
        if($var!='')
        {
            header("Location:Index");
        }
        $this->load->view('login');
    }
    
    public function Logout() 
    {        
        session_destroy();
        header("Location:Login");
    }
    
    public function CheckLogin() 
    {
        $user=$this->input->post('username');
        $refer=$this->input->post('refer');
        $pass=$this->input->post('password');
        $result = $this->ManageProfile->loginvalidate($user,$pass); 
        // print_r($result);
        // exit();

        if($result=='Invalid Login' || $result=='')
        {
            $_SESSION['login']='Invalid Login Details';
            header("Location:../Login");
        }
        else
        {           
            $this->session->set_userdata('userdetails', $result);
            header("Location:../Index");          
            // if($result->{'DesignationName'}=='Super Admin')
            // {
            //     header("Location:../Index"); 
            // }
            // else if($result->{'DesignationName'}=='Student')
            // {      
            //     header("Location:../Index"); 
            // }
            // exit();
            // if($_SESSION['URI']!=''){
            //    header("Location:".$_SESSION['URI']);
            // }else{           
            // header("Location:../Index");
            // }
        }
    }   

    public function ForgotPassword() 
    {
        $forgot = $this->input->post('forgot'); 
        $result = [];    
        if(isset($forgot) && $forgot=='Send')
        {        
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
    
    public function LeaveHistory() 
    {
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

    public function SetTimeTable()
    {
        
        $data['class_id']=$this->input->post('clss_id');
        $data['sec_id']=$this->input->post('class_sec');
        $data['school_id']=$this->session->userdata['userdetails']->college_id;
        $timetable_data = $this->ManageProfile->settimetable($data);       
        if(isset($timetable_data))
        {
            $secid=$this->input->post('class_sec');
            $monday=json_encode($this->input->post('monday_data'));
            $monday_val=json_decode($monday);

            $tuesday=json_encode($this->input->post('tuesday_data'));
            $tuesday_val=json_decode($tuesday);
            
            $wednesday=json_encode($this->input->post('wednesday_data'));
            $wednesday_val=json_decode($wednesday);
            
            $thursday=json_encode($this->input->post('thursday_data'));
            $thursday_val=json_decode($thursday);

            $friday=json_encode($this->input->post('friday_data'));
            $friday_val=json_decode($friday);

            $saturday=json_encode($this->input->post('saturday_data'));
            $saturday_val=json_decode($saturday);
            foreach($monday_val as $key => $value) 
            {           
              for($i=1;$i<=11;$i++)
              {
                $data['class_id']=$this->input->post('clss_id');
                $data['sec_id']=$secid;
                $data['school_id']=$this->session->userdata['userdetails']->college_id;
                $data['monday_val']=$value->{$i};
                $data['tuesday_val']=$tuesday_val[$key]->{$i};
                $data['wednesday_val']=$wednesday_val[$key]->{$i};
                $data['thursday_val']=$thursday_val->{$i};
                $data['friday_val']=$friday_val->{$i};
                $data['saturday_val']=$saturday_val[$key]->{$i};
                $data['created_by']=$this->session->userdata['userdetails']->EmployeeID;
                $data['unique_id']=$data['class_id'].$data['sec_id'].$data['school_id'];
                $timetable_data_ = $this->ManageProfile->settimetabledata($data);
                }               
            }
        }
    }
    public function getTimeTableData()
    {
        $data['class_id']=$this->input->post('clss_id');
        $data['secid']=$this->input->post('class_sec');
        $data['school_id']=$this->session->userdata['userdetails']->college_id;        
        $timetable_data['timetable'] = $this->ManageProfile->gettimetable($data);
        return $timetable_data;
    }

    public function MyProfile() 
    {
        $this->load->view('profile');
    }
    
    public function EditProfile() 
    {
        $this->load->view('editprofile');
    }
    
    public function ChangePassword() 
    {
        $this->load->view('changepassword');
    }
    
    public function GetSchoolData()
    {
        $this->load->view('schoolprofile');   
    }
    
    public function Gettimetable()
    {
        $this->load->view('timetable');   
    }
    
    public function GetExamtimetable()
    {
        $this->load->view('examtimetable');   
    }
    public function GetReportCard()
    {
        $this->load->view('reportcard');   
    }
    
    public function GetTranspotationDetails()
    {
        $this->load->view('transportation');   
    }   
    
    public function GetPaymentUpdation()
    {
        $this->load->view('payment');   
    }
   
    public function Getattendance()
    {
        $this->load->view('attendance');   
    }
    
    public function profilemenu()
    {
        $this->load->view('new_profile');   
    }
    
    public function quicknotes()
    {
        $this->load->view('quicknotes');   
    }
}
