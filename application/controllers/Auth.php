<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
	public function __construct()
	{
        parent::__construct();
        $this->load->model('MyModel');
        $this->load->helper('url');
    }
	public function login()
	{
		// $method = $_SERVER['REQUEST_METHOD'];

		$params = $_REQUEST;
		$username = $params['username'];
		$password = $params['password'];
        $devicetoken=$params['DeviceToken'];

		$response = $this->MyModel->login($username,$password,$devicetoken);
		echo json_encode($response);
	}
	public function setHomework()
	{
		$stream_clean = $this->security->xss_clean($this->input->raw_input_stream);
        $request = (array) json_decode($stream_clean);
        $data['class_id']=$request['classes'];
        $data['sec_id']=$request['section'];
        $data['subject_id']=$request['subject'];
        $data['homework']=$request['message'];
        $data['created_id']=$request['EmployeeID'];
        $data['school_id']=$request['school_id'];

        $result = $this->MyModel->setHomeworkData($data);
        echo json_encode($result);
	}
	public function getClassData()
	{
        $result = $this->MyModel->getClassDetail();
        echo json_encode($result);
	}
	public function getSecData()
	{
        $result = $this->MyModel->getClassSubject();
        echo json_encode($result);
	}
	public function setAssignment()
	{			
        $stream_clean = $this->security->xss_clean($this->input->raw_input_stream);
        $request = (array) json_decode($stream_clean);

		$data['school_id']=$request['school_id'];
		$data['class_id']=$request['class_id'];
		$data['sec_id']=$request['sec_id'];
		$data['sub_id']=$request['sub_id'];
		$data['assignment_topic']=$request['assignment_topic'];
		$data['date_of_submission']=$request['date_of_submission'];
		$data['message']=$request['message'];
		$data['created_by']=$request['created_by'];
		       
        $result = $this->MyModel->setAssignmentData($data);
        $notify=$this->MyModel->sendassignmentnotification($data,$result);
        echo json_encode($result);        
	}
	public function QuickNotes()
	{
		$stream_clean = $this->security->xss_clean($this->input->raw_input_stream);
        $request = (array)json_decode($stream_clean);

		$data['class']=$request['class_id'];
		$data['sec']=$request['sec_id'];
		$data['subject']=$request['subject_id'];
		$data['QuickMessage']=$request['message'];
		$data['created_by']=$request['created_by'];
		$data['school_id']=$request['schoolid'];
		
        $result = $this->MyModel->setQuicknotesData($data);
        echo json_encode($result);
	}
	public function setTimeTable()
    {
    	$stream_clean = $this->security->xss_clean($this->input->raw_input_stream);
        $request = (array)json_decode($stream_clean);
        
        $data['class_id']=$request['class_id'];
        $data['sec_id']=$request['sec_id'];
        $data['school_id']=$request['school_id'];
        $timetable_data = $this->MyModel->gettimetable($data);
        
        if(isset($timetable_data))
        {
            $monday=json_encode($request['monday_data']);
            $monday_val=json_decode($monday);

            $tuesday=json_encode($request['tuesday_data']);
            $tuesday_val=json_decode($tuesday);
        
            $wednesday=json_encode($request['wednesday_data']);
            $wednesday_val=json_decode($wednesday);
        
            $thursday=json_encode($request['thursday_data']);
            $thursday_val=json_decode($thursday);

            $friday=json_encode($request['friday_data']);
            $friday_val=json_decode($friday);

            $saturday=json_encode($request['saturday_data']);
            $saturday_val=json_decode($saturday);
            foreach ($monday_val as $key => $value) 
            {
                $data['class_id']=$request['class_id'];
                $data['sec_id']=$request['sec_id'];
                $data['school_id']=$request['school_id'];
                $data['monday_val']=$monday_val->{$key};
                $data['tuesday_val']=$tuesday_val->{$key};
                $data['wednesday_val']=$wednesday_val->{$key};
                $data['thursday_val']=$thursday_val->{$key};
                $data['friday_val']=$friday_val->{$key};
                $data['saturday_val']=$saturday_val->{$key};
                $timetable_data_ = $this->MyModel->settimetabledata($data);
            }
        }
        echo json_encode($timetable_data_);
    }
    public function getTimeTableData()
    {
        $params = $_REQUEST;       
        $classid = $params['class_id'];
        $secid = $params['sec_id'];
        $school_id=$params['school_id'];
    
        $result = $this->MyModel->gettimetable_($classid,$secid,$school_id);
        echo json_encode($result);
    }
    public function todayshomework()
    {
        $stream_clean = $this->security->xss_clean($this->input->raw_input_stream);
        $request = (array)json_decode($stream_clean);
        $data['class_id']=$request['class_id'];
        $data['sec_id']=$request['sec_id'];
        $data['school_id']=$request['school_id'];
        $result = $this->MyModel->gettodayhomework($data);
        echo json_encode($result);
    }
    public function setAttendance()
    {
       $stream_clean = $this->security->xss_clean($this->input->raw_input_stream);
       $request = (array)json_decode($stream_clean);       
       $arrvalue=$request['StudentDetails'];

       foreach($arrvalue as $key => $value) 
       {
            $data['class_id']=$arrvalue->class_id; 
            $data['sec_id']=$arrvalue->sec_id;           
            $data['setAttendance']=$arrvalue[$key]->setAttendance;
            $data['std_id']=$arrvalue[$key]->student_id;
            $result = $this->MyModel->setAttendanceDay($data);
       }   
       echo json_encode($result);   
    }
    public function getAssignment()
    {
        $stream_clean = $this->security->xss_clean($this->input->raw_input_stream);
        $request = (array)json_decode($stream_clean);
        $data['class_id']=$request['class_id'];
        $data['sec_id']=$request['sec_id'];
        $data['school_id']=$request['school_id'];
        $result = $this->MyModel->getcurrentAssignment($data);
        echo json_encode($result);
    }
    public function getQuickNotes()
    {
        $stream_clean = $this->security->xss_clean($this->input->raw_input_stream);
        $request = (array)json_decode($stream_clean);
        // print_r($request);
        $data['class']=$request['class_id'];
        $data['sec']=$request['sec_id'];
        $data['subject']=$request['subject'];
        $data['school_id']=$request['school_id'];
        $data['staff_id']=$request['staff_id'];
        $result = $this->MyModel->getquickNotesData($data);
        echo json_encode($result);
    }
    public function NotificationTest()
    {
        $params = $_REQUEST;
        $DeviceToken=$params['devicetoken'];

        $result = $this->MyModel->sendNotification($DeviceToken);
        echo json_encode($result);
    }
    public function studentdata()
    {
        $stream_clean = $this->security->xss_clean($this->input->raw_input_stream);
        $request = (array)json_decode($stream_clean);
        // print_r($request);
        $data['class']=$request['class_id'];
        $data['sec']=$request['sec_id'];       
        $data['school_id']=$request['school_id'];       
        $result = $this->MyModel->getstudentData($data);
        echo json_encode($result);
    }
}
