<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\normalUserController;
use App\Http\Controllers\issueAdd;
use App\Http\Controllers\managerUserController;
use App\Http\Controllers\adminUserController;
use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Routing  for login and registration 
Route::get('login',[LoginController::class,'login']);
Route::get('registration',[LoginController::class,'registration']);
Route::get('forgotpassword',[LoginController::class,'forgotPassword']);
Route::post('register_user',[LoginController::class,'registerUser']);
Route::post('login_user',[LoginController::class,'loginUser']);
route::post('valid',[LoginController::class,'validation']);
Route::get('screen',[LoginController::class,'screen']);

// Routing for normal user
Route::post('/createIssueNormal', [normalUserController::class,'addIssueNormal']);

Route::get('normal/{emp_id}',[normalUserController::class,'getNormalUser']);


Route::get('normal/editMobileNormalUser/{emp_id}',[normalUserController::class,'UpdateMobileNormalUser']);

Route::post('editMobileNormal',[normalUserController::class,'UpdateNormal']);

// Routing for manager 
Route::get('manager/{emp_id}',[managerUserController::class,'getManagerUser']);

Route::get('manager/editMobile/{emp_id}',[managerUserController::class,'UpdateMobileManager']);

Route::post('editMobileManager',[managerUserController::class,'UpdateManagerMobile']);

Route::post('/create', [managerUserController::class,'addIssue']);
// new to add 

Route::get('manager/deleteRepotee/{emp_id}/{manager_id}',[managerUserController::class,'deleteRepotee']);

Route::get('/displayIssue/{manager_id}',[managerUserController::class,'getIssue']);

Route::get('/addEmployee/{manager_id}',[managerUserController::class,'addEmployee']);

Route::post('/addNewEmployee',[managerUserController::class,'addedEmployee']);



// Routing  for admin 

Route::get('admin',[AdminController::class,'admin']);
Route::get('reg',[AdminController::class,'registerEmployee']);


route::view('emp','updateEmp');
Route::post('edit/{id}',[AdminController::class,'showData']);


route::view('p','project');

Route::view('search','search');

Route::get('getemployeedata',[LoginController::class,'list']);

Route::get('updateemployee/{emp_id}',[AdminController::class,'showData']);
Route::post('updateemployee/',[AdminController::class,'updateEmployee']);

// Admin page all routes

Route::get('admin/{emp_id}',[adminUserController::class,'getAdminUser']);
Route::get('admin/editMobileAdminUser/{emp_id}',[adminUserController::class,'UpdateMobileAdminUser']);
Route::post('editMobileAdmin',[adminUserController::class,'UpdateAdmin']);
Route::post('/createIssueAdmin', [adminUserController::class,'addIssueAdmin']);
Route::get('admin/delete/{id}/{admin_id}',[AdminController::class,'deleteEmpData']);
Route::get('admin/info/{id}/{admin_id}',[AdminController::class,'regEmployeeInfo']);
Route::get('getproject/{admin_id}',[AdminController::class,'getProject']);
Route::get('getproject/getprojectdetails/{id}/{admin_id}',[AdminController::class,'getProjectDetails']);
route::post('/projectInfo',[AdminController::class,'addProject']);
Route::post('searchproject',[AdminController::class,'searchProject']);
Route::get('admin/updateemployee/{emp_id}/{admin_id}',[AdminController::class,'updateemployeedetails']);
Route::post('updateemployee/',[AdminController::class,'updateemployeevalues']);
Route::get('//displayAllIssue/{emp_id}',[adminUserController::class,'getAllIssue']);

Route::get('displayAllIssue/updateIssueStatus/{issue_id}/{admin_id}',[adminUserController::class,'closeIssue']);