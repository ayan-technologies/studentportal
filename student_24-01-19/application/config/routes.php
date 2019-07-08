<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'dashboard';
$route['Index'] = 'Dashboard/index';
$route['EmployeeList'] = 'Employee/EmployeeList';
$route['EmployeeDetails'] = 'Employee/EmployeeDetails';
$route['ApplyLeave'] = 'Leave/ApplyLeave';
$route['LeaveList'] = 'Leave/LeaveList';
$route['LeaveHistory'] = 'Profile/LeaveHistory';
$route['LeaveCalender'] = 'Calender/LeaveCalender';
$route['LeaveApplication'] = 'Leave/GetApplication';
$route['Login'] = 'Profile/Login';
$route['Signout'] = 'Profile/Logout';
$route['MyProfile'] = 'Profile/MyProfile';
$route['EditProfile'] = 'Profile/EditProfile';

$route['EditEmpProfile'] = 'Employee/GetEmployeeByID';
$route['AddEmployee'] = 'Employee/ShowAddEmp';
$route['Designation'] = 'Employee/Designation';
$route['AddDesignation'] = 'Employee/AddDesignation';
$route['EditDesignation'] = 'Employee/EditDesignation';
$route['ChangePassword'] = 'Profile/ChangePassword';
$route['ForgotPassword'] = 'Profile/ForgotPassword';
$route['QuickMail'] = 'Dashboard/QuickMail';
$route['InventoryHistory'] = 'Inventory/InventoryHistory';
$route['RequestInventory'] = 'Inventory/RequestInventory';
$route['ApproveInventory'] = 'Inventory/ApproveInventory';
$route['InventoryApproval'] = 'Inventory/InventoryApproval';
$route['InventoryRequests'] = 'Inventory/InventoryRequests';
$route['InventoryCategory'] = 'Inventory/InventoryCategory';
$route['InventoryList'] = 'Inventory/InventoryItem';
$route['FilterInventory'] = 'Inventory/FilterInventory';
$route['CompensationHistory'] = 'Leave/CompensationHistory';
$route['CompensationLeave'] = 'Leave/CompensationLeave';
$route['EditCompensation'] = 'Leave/EditCompensation';

$route['StudentList'] = 'Student/StudentList';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
