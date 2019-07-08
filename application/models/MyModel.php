<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MyModel extends CI_Model {
    public function login($username,$password,$devicetoken)
    {
        $cryppass= base64_encode($password);
        
        $this->db->select('*')->from('employee')->where("EmployeeUserName", $username)->where("EmployeePassword", $cryppass)->where("EmployeeStatus", 1)->order_by("EmployeeID", "desc");
        $query = $this->db->get();
        // print_r($this->db->last_query());
        // exit();

        $num=$query->num_rows();
        if($num>0)
        {            
            $emp=$query->row();
            
            $this->db->select('employeedetails.EmployeeEmpID,employeedetails.EmployeeUserRole,employeedetails.EmployeeFirstName,employeedetails.EmployeeDesignation,employeedetails.EmployeeDepartment,department.DepartmentName,designation.DesignationName,employee.EmployeeID,employee.device_token `DeviceToken`,employee.college_id,employee.class_id,employee.sec_id');
            $this->db->from('employeedetails');
            $this->db->join('employee', 'employee.EmployeeID = employeedetails.EmployeeEmpID', 'inner');            
            $this->db->join('department', 'employeedetails.EmployeeDepartment = department.DepartmentID', 'inner');
            $this->db->join('designation', 'employeedetails.EmployeeDesignation = designation.DesignationID', 'inner');
            $this->db->where("EmployeeEmpID", $emp->EmployeeID);
            $this->db->order_by("employee.EmployeeID", "desc");
            $query2 = $this->db->get();
            $empdet=$query2->row();             
            // print_r($this->db->last_query());
            // print_r($empdet->EmployeeEmpID);

            if($empdet->DeviceToken=='')
            {
                $device=$devicetoken;
                if($device!='')
                {
                    $this->db->set('employee.device_token',$device);
                    $this->db->where('EmployeeEmpID', $emp->EmployeeID);
                    $this->db->update('employeedetails');
                    $query_empDevice = $this->db->get();    
                }
                print_r($this->db->last_query());
            }
            return array('status'=>1,'message' => 'Successfully login.','Type'=>'Staff','Emp_details' => $empdet );
            // exit();          
        }
        else if($num==0)
        {
            $this->db->select('studentdetails.Uid `EmployeeEmpID`, studentdetails.user_role `EmployeeUserRole`, studentdetails.Login_Name `EmployeeFirstName`, ds.DesignationName `DesignationName`, studentdetails.department_id `EmployeeDepartment`,d.DepartmentID entName`DepartmentName`,ds.DesignationDepartment `EmployeeDesignation`, studentdetails.device_token `DeviceToken`,studentdetails.college_id,studentdetails.class_id,studentdetails.sec_id');
            $this->db->from('studentdetails');
            $this->db->join('college_details as cd', 'studentdetails.college_id = cd.cid', 'inner');            
            $this->db->join('department as d', 'studentdetails.department_id = d.DepartmentID', 'inner');
            $this->db->join('designation as ds', 'ds.DesignationDepartment = studentdetails.user_role', 'inner');
            $this->db->where("studentdetails.Login_Name", $username);
            $this->db->where("studentdetails.login_pwd", $cryppass);
            $this->db->order_by("studentdetails.Uid", "desc");
            $query2 = $this->db->get();
            $empdet=$query2->row();
            // print_r($empdet->EmployeeEmpID);
            // print_r($this->db->last_query());

            if($empdet->DeviceToken==0 or $empdet->DeviceToken=='' or $empdet->DeviceToken==null)
            {
                $device=$devicetoken;
                if($device!='')
                {
                    $this->db->set('studentdetails.device_token',$device);
                    $this->db->where('studentdetails.Uid', $empdet->EmployeeEmpID);
                    $this->db->update('studentdetails'); 
                    $query_dev = $this->db->get();
                }
                // print_r($this->db->last_query());
            }
            if($empdet==null)
            {
                return array('status'=>0,'message' => 'Invalid Login or No Employee Details','Emp_details' => $empdet);
            }
            else
            {
                return array('status'=>1,'message' => 'Successfully login.','Type'=>'Student','Emp_details' => $empdet);    
            }
        }
        else
        {
            $empdet=null;
            
        }
        
        // return $empdet;
    }
    public function setHomeworkData($data)
    { 
        $this->db->select('*');
        $this->db->from('homework');
        $this->db->where("class_id", $data['class_id']);
        $this->db->where("sec_id", $data['sec_id']);
        $this->db->where("subject_id", $data['subject_id']);
        $this->db->where("school_id", $data['school_id']);
        $this->db->where("Date_Format(created_date,'%d-%m-%Y')=DATE_FORMAT(CURDATE(),'%d-%m-%Y')");
        $query2 = $this->db->get();
        $homework_count =$query2->num_rows();  
        if($homework_count>0)
        {
            $this->db->where("class_id", $data['class_id']);
            $this->db->where("sec_id", $data['sec_id']);
            $this->db->where("subject_id",$data['subject_id']);
            $this->db->where("school_id", $data['school_id']);
            $this->db->where("Date_Format(created_date,'%d-%m-%Y')=DATE_FORMAT(CURDATE(),'%d-%m-%Y')");
            $query = $this->db->update('homework',$data);
            $home_work_update= $this->db->insert_id();            
        }
        else
        {
            $query = $this->db->insert('homework',$data);   
            $home_work= $this->db->insert_id();
            // print_r($this->db->last_query());
        }
        if($home_work!=0 || $home_work_update==0)
        {
            return array('status'=>1,'message' => 'Homework Inserted Successfully');
        }
        else
        {
            return array('status'=>0,'message' => 'Homework not Inserted there is some issue');
        }
    }
    public function getClassDetail()
    {
        $this->db->select('id,class `classes`');
        $this->db->from('class_details');
        $this->db->where("is_active",1);
        $query = $this->db->get();            
        if($query)
        {
                $getClass=$query->result_array();
                return array('status'=>1,'message' => 'ClassDetail','ClassData'=>$getClass);
                // return $getClass;           
        }
        else
        {
            return array('status'=>0,'message' =>'No Data Found');
        }
    }
    public function getClassSubject()
    {
            $this->db->select('id,subject_name');
            $this->db->from('class_subjects');
            $this->db->where("is_active",1);
            $query = $this->db->get();   
            // print_r($this->db->last_query());
            if($query)
            {
                $getsubject=$query->result_array(); 
                return array('status'=>1,'message' => 'SubjectDetail','SubjectData'=>$getsubject);               
                // return $getsubject;           
            }
            else
            {
                return array('status'=>0,'message' =>'No Data Found');
            }      
    }
    public function setAssignmentData($data)
    {
        $query = $this->db->insert('assignment',$data);           
        $assignment= $this->db->insert_id();
        // print_r($this->db->last_query());
        if($assignment!=0)
        {
            return array('status'=>1,'message' => 'Assignment Inserted Successfully');
        }
        else
        {
            return array('status'=>0,'message' => 'There is some issue');
        }
    }

    public function sendassignmentnotification($data,$result)
    {
        $status=json_encode($result['status']);
        if($status==1)
        {
            $this->db->select('device_token');
            $this->db->from('studentdetails');
            $this->db->where("college_id",$data['school_id']);
            $this->db->where("sec_id",$data['sec_id']);
            $this->db->where("class_id",$data['class_id']);
            $query = $this->db->get();           
            $get_devicetoken=$query->result_array();
            
            //Legacy Key
            $headers = array(
                'Authorization:key = AIzaSyBpWziQfPjMHv-BZAyw86B3y-giZHzhx9U',
                'Content-Type: application/json'
            ); 
            // Server key
            $headers2 = array(
                'Authorization:key =  AAAAEklJSjg:APA91bGynK_gaCT94LVS8BHAnfgLs7R6SkigDTm0LAtwV2eSHEcIPki0yG5KOKkm5czw8DxOqwna3D4yWdKrMmi0167Buz_9b0qnGZrhMbGTNjAYDIJ1X6psV68Rlhh2lpLdoZYErXCW',
                'Content-Type: application/json'
            ); 
            foreach ($get_devicetoken as $devicetoken)
            {  
                $url = 'https://fcm.googleapis.com/fcm/send'; 
                if($devicetoken!='')
                {
                    $fields = array(
                        'to' => $devicetoken,
                        "notification" => array(
                        'title' => 'Assignment',
                        'body' => 'Todays Assignment',
                        'icon' => '',
                        'sound' => ''
                        ),
                        "data"=>array(
                                "response" =>array(
                                'NotificationType'=>'',
                                "message"=>$data['assignment_topic'], 
                                "SentTime"=>gmdate('Y-m-d H:i:s')
                            )
                        )
                    );
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers2);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
                    $result = curl_exec($ch);
                    curl_close($ch);                    
                }
            }
            return $fields;
        }
        else
        {
            return 'status 0';
        }
    }
    
    public function setQuicknotesData($data)
    {       
        $query = $this->db->insert('quickmail',$data);         
        $Quickmail= $this->db->insert_id();        
        if($Quickmail!=0)
        {            
            return array('status'=>1,'message' => 'Quick Notes Inserted');
        }
        else
        {
            return array('status'=>0,'message' => 'Not Inserted');
        }   
    }
    public function gettimetable($data)
    {  
        $this->db->select('*');
        $this->db->from('timetable');
        $this->db->where("class_id", $data['class_id']);
        $this->db->where("sec_id", $data['sec_id']);
        $this->db->where("school_id", $data['school_id']);        
        $query2 = $this->db->get();        
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
        $this->db->insert('timetable', $data);       
        $timetable=$this->db->insert_id();
        if($timetable>0)
        {
            return array('status'=>1,'message' => 'Time Table Created');
        }
        else
        {
            return array('status'=>0,'message' => 'Not Inserted');
        }
    }
    public function gettimetable_($classid,$secid,$schoolid)
    {        
        $this->db->select('class_id, sec_id, school_id, monday_val, tuesday_val, wednesday_val, thursday_val, friday_val, saturday_val');
        $this->db->from('timetable');
        $this->db->where("class_id", $classid);
        $this->db->where("sec_id", $secid);
        $this->db->where("school_id",$schoolid);
        $query = $this->db->get();
         // print_r($this->db->last_query());
        $num=$query->num_rows();
        // print_r($num);
        
        if($num>0)
        {      
            $timetable_= $query->result_array();    
            // return $query->result_array();   
           $mon=[];
           $tue=[];
           $wed=[];
           $thu=[];
           $fri=[];
           $sat=[];
           $i=1;
           foreach ($timetable_ as $key => $value) 
            {        
                // print_r($value);
                // print_r($value['thursday_val']);
                if($i==1)
                {
                    $val='one';
                }
                else if($i==2)
                {
                    $val='two';
                }
                else if($i==3)
                {
                    $val='three';
                }
                else if($i==4)
                {
                    $val='four';
                }
                else if($i==5)
                {
                    $val='five';
                }
                else if($i==6)
                {
                    $val='six';
                }
                else if($i==7)
                {
                    $val='seven';
                }
                else if($i==8)
                {
                    $val='eight';
                }
                $mon['period_'.$val]=$value['monday_val'];
                $tue['period_'.$val]=$value['tuesday_val'];
                $wed['period_'.$val]=$value['wednesday_val'];
                $thu['period_'.$val]=$value['thursday_val'];
                $fri['period_'.$val]=$value['friday_val'];
                $sat['period_'.$val]=$value['saturday_val'];
                $i++;
                // print_r($i++);
                // print_r($mon);
                // $data[] = array(
                //     'mon_val' => $value['monday_val'],
                //     'tues_val' => $value['tuesday_val'],
                //     'wed_val'=>$value['wednesday_val'],
                //     'thu_val'=>$value['thursday_val'],
                //     'fri_val'=>$value['friday_val'],
                //     'sat_val'=>$valu['saturday_val']
                // );
            }
            $data['monday']=$mon;
            $data['tuesday']=$tue;
            $data['wednesday']=$wed;
            $data['thursday']=$thu;
            $data['friday']=$fri;
            $data['saturday']=$sat;
            return array('status'=>1,'message' => 'Already Existing Data','TimeTableData' => $data);
        }    
        else
        {
            return array('status'=>0,'message' => 'No Data','TimeTableData' => null);
        }
    }
    public function gettodayhomework($data)
    {
        $this->db->select('hw.subject_id, hw.homework, hw.created_date, cs.subject_name');
        $this->db->from('homework hw');
        $this->db->join('class_subjects cs', 'hw.subject_id=cs. id', 'left');
        $this->db->where("DATE_FORMAT(created_date,'%d-%m-%Y') =DATE_FORMAT(CURDATE(),'%d-%m-%Y')"); 
        // CURDATE()
        $this->db->where("hw.class_id",$data['class_id']);       
        $this->db->where("hw.sec_id",$data['sec_id']);
        $this->db->where("hw.school_id",$data['school_id']);
        $query = $this->db->get();
        $num=$query->num_rows();
        // print_r($this->db->last_query());
        if($num>0)
        {
            $home_work=$query->result_array();
            return array('status'=>1,'message' => 'Todays Homework','HomeworkData' => $home_work);       
        }
        else
        {
            return array('status'=>0,'message' => 'No data','HomeworkData' => null);
        }
    }
    public function setAttendanceDay($data)
    {
        $this->db->select('*');
        $this->db->from('attendance');
        $this->db->where("std_id", $data['std_id']);
        $this->db->where("Date_Format(created_date,'%d-%m-%Y')=DATE_FORMAT(CURDATE(),'%d-%m-%Y')");
        $query2 = $this->db->get();
        // print_r($this->db->last_query());       
        $atten_count=$query2->row();       
        if($atten_count!='')
        {
            $this->db->where("std_id", $data['std_id']);
            $query = $this->db->update('attendance',$data);
            return array('status'=>1,'message' => 'Attendance Updated');
        }
        else
        {
            $query = $this->db->insert('attendance',$data);
            return array('status'=>1,'message' => 'Inserted Successfully');            
        }
    }
    public function getcurrentAssignment($data)
    {
        $this->db->select('cs.subject_name,a. assignment_topic, a.date_of_submission');
        $this->db->from('assignment a');
        $this->db->join('class_subjects cs', 'a.sub_id=cs.id', 'inner');
        $this->db->where("school_id", $data['school_id']);
        $this->db->where("a.date_of_submission >= DATE_FORMAT(CURDATE(),'%d-%m-%Y')");
        $this->db->where("class_id", $data['class_id']);
        $this->db->where("sec_id", $data['sec_id']);        
        $query = $this->db->get();
        // print_r($this->db->last_query());
        $num=$query->num_rows();        
        if($num>0)
        {
            $assignment_data=$query->result_array();
            return array('status'=>1,'message' => 'This week Assignment','AssignmentData' => $assignment_data); 
        }
        else
        {
            return array('status'=>0,'message' => 'No data','AssignmentData' => null);
        }
    }
    public function getquickNotesData($data)
    {        
        $this->db->select('cs. subject_name ,qm.QuickMessage');
        $this->db->from('quickmail qm');
        $this->db->join('class_subjects cs','cs.id=qm.subject', 
            'left');
        $this->db->where("school_id", $data['school_id']);
        $this->db->where("DATE_FORMAT(QuickDate,'%d-%m-%Y') =DATE_FORMAT(CURDATE(),'%d-%m-%Y')");
        $this->db->where("class", $data['class']);
        $this->db->where("sec", $data['sec']);       
        $this->db->where("staff_id", $data['staff_id']);
        $query = $this->db->get();
        // print_r($this->db->last_query());
        $num=$query->num_rows();
        if($num>0)
        {
            $quicknotes_data=$query->result_array();
            return array('status'=>1,'message' => 'Quick Notes Data','QuicknotesData' => $quicknotes_data); 
        }
        else
        {
            return array('status'=>0,'message' => 'No data','QuicknotesData' => null);
        }
    }
    public function sendNotification($devicetoken)
    {
        //Legacy Key
        // AIzaSyBpWziQfPjMHv-BZAyw86B3y-giZHzhx9U
            $headers = array(
                'Authorization:key = AIzaSyDiWqPE_yudpBJTn0u9sFj73KgmNvd24AE',
                'Content-Type: application/json'
            ); 
            // Server key
            $headers2 = array(
                'Authorization:key =  AAAAEklJSjg:APA91bGynK_gaCT94LVS8BHAnfgLs7R6SkigDTm0LAtwV2eSHEcIPki0yG5KOKkm5czw8DxOqwna3D4yWdKrMmi0167Buz_9b0qnGZrhMbGTNjAYDIJ1X6psV68Rlhh2lpLdoZYErXCW',
                'Content-Type: application/json'
            ); 

            $headers3=array(
                'Authorization:key =  AAAAll7cjRU:APA91bGbtmJolkU6C4Ytnqg-0CU1htKUnulguO7JJIeZYsZq-WucheKPbOoDg5_Jad7igWob6JxSOoNRYY2JDmNhv-LInuTHEv-CL_O46vvuaE1OqocEoHtwLIgDSOaUSy8KNemv9Y-9',
                'Content-Type: application/json'
            ); 

        $url = 'https://fcm.googleapis.com/fcm/send';
        if($devicetoken!=''){
                   
                $fields = array(
                    'to' => $devicetoken,
                    'data'=>array( 
                        'data' =>array(
                            'title' =>'Test Notification',
                            'message'=>'notification',                            
                            'payload'=>array(
                                'NotificationType'=>'',
                                'message'=>'Test Notification',
                                'SentTime'=>gmdate('Y-m-d H:i:s')
                            ),
                            'timestamp'=>'',
                            'icon' => '',
                            'sound' => ''
                        )
                    )
                );

                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers2);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
                    $result1 = curl_exec($ch);
                    curl_close($ch);                    
                    return $fields;
                }
    }
    public function getstudentData($data)
    {
        $this->db->select('Uid, department_id, user_role, college_id, std_name, std_id, sec_id, class_id');
        $this->db->from('studentdetails');
        $this->db->where("class_id", $data['class']);
        $this->db->where("sec_id", $data['sec']);
        $this->db->where("college_id", $data['school_id']);        
        $query2 = $this->db->get();        
        $num=$query2->num_rows();
        if($num>0)
        {
            $student_data=$query2->result_array();
            return array('status'=>1,'message' => 'Student Details','StudentDetails' => $student_data); 
        }
       else
       {
        return array('status'=>0,'message' => 'No data Found','StudentDetails' => null); 
       }
    }
}
