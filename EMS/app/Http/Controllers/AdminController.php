<?php

namespace App\Http\Controllers;
//use DB;
use Illuminate\Http\Request;
use App\models\employee;
use App\Models\project;
use App\Models\EmployeeProject;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function registerEmployee()
       {
          
           
           $reg = employee::all();
           if($reg==" "){
            return back()->with('fail','No Registered Employees!!!');
           }
           else{
           
            return view('employeregister',['employee'=>$reg]);
           }
       }
       public function addProject(Request $req)
       {
        $pro = new Project();
        $pro->proj_name = $req->proj_name;
        $pro->proj_desc = $req->proj_desc;
        $pro->proj_startdate = $req->proj_startdate;
        $pro->proj_enddate = $req->proj_enddate;
        $result = $pro->save();
        if($result){
            return back()->with('sucess','Project data added succesfully');
        }
        else{
            return back()->with('fail','Something wrong');
        }
       }

       public function regEmployeeInfo($id,$admin_id)
       {
          // $employee = employee::all();
           $data = employee::where('emp_id',$id)->get();
           return view('userDetails',['employee'=>$data],['ID'=>$admin_id]);
       }

       public function deleteEmpData($id,$admin_id) 
       {
        $employee= employee::where('emp_id',$id);
        $employee->delete();
        return redirect('admin/'.$admin_id);
       // return redirect('manager/'.$req->emp_id);
       }


    public function getproject($admin_id)
       {
           //  $data = DB::table('employee')->select('emp_id','userName')->get();
           $project = project::all();
            return view('searchproject',['empproject'=>$project],['admin_id'=>$admin_id]);
       }
       public function getProjectDetails($id,$admin_id)
       {
        $emp_pro = DB::table('employee')
        ->join('emp_proj','emp_proj.emp_id','=','employee.emp_id')
        ->join('project','project.proj_id','=','emp_proj.proj_id')
        ->where('project.proj_id','=',$id)
        ->get();
        //return view('getprojectinfo',['getprojectdetails'=>$emp_pro]);

           return view('getprojectinfo',['getprojectdetails'=>$emp_pro],['admin_id'=>$admin_id]);
       }
       function updateEmployee(Request $req){
        $emp_id = $req->emp_id;
        $emp_first_name = $req->emp_first_name;
        $emp_last_name = $req->emp_last_name;
        $emp_mobile_no = $req->emp_mobile_no;
        $emp_dob = $req->emp_dob;
        $emp_gender = $req->emp_gender;
        $emp_comm_address = $req->emp_comm_address;
        $emp_city = $req->emp_city;
        $emp_type = $req->emp_type;
        $emp_password = $req->emp_password;
        DB::update('update employee set emp_first_name=?,emp_last_name=?,emp_mobile_no=?,emp_dob=?,emp_gender=?,emp_comm_address=?,emp_city=?,emp_type=?,emp_password=? where emp_id=?',[$emp_first_name,$emp_last_name,$emp_mobile_no,$emp_dob,$emp_gender,$emp_comm_address,$emp_city,$emp_type,$emp_password,$emp_id]);        
        return redirect('employees_details');
    }
    function showData($emp_id){
        $data = Employee::where('emp_id',$emp_id)->first();
        return view('updateemployee',compact('data'));
    }
    public function searchProject(Request $req)
       {
              $user = Employee::where('userName','=',$req->search)->first();
              $id = EmployeeProject::where('emp_id','=',$req->search)->first();
              if($user)
              {
                $data = DB::table('project')
                ->join('emp_proj','project.proj_id',"=",'emp_proj.proj_id')
                ->join('employee','emp_proj.emp_id',"=",'employee.emp_id')
                ->where('employee.userName',$req->search)
                ->get(); 
                $admin_id = $req->admin_id;
               return view('projectretrive',['data'=>$data], ['admin_id'=>$req->admin_id]);
              }
              if($id)
              {
                $data = DB::table('project')
                ->join('emp_proj','project.proj_id',"=",'emp_proj.proj_id')
                ->join('employee','emp_proj.emp_id',"=",'employee.emp_id')
                ->where('emp_proj.emp_id',$req->search)
                ->get(); 
               return view('projectretrive',['data'=>$data], ['admin_id'=>$req->admin_id]);
              }
              else
              {
                return back()->with('fail','Enter Valid Credentials');
              }
             
      }

      public function list()
      {
        $data = employee::all();
        return view('getemployeedata',['employee'=>$data]);
      }

      public function updateemployeedetails($emp_id,$admin_id){
            $data =Employee::where('emp_id',$emp_id)->first();
            return view('updateemployee',compact('data'),['admin_id'=>$admin_id]);
      }

      public function updateemployeevalues(Request $req){
        $emp_id = $req->emp_id;
        $emp_firstname = $req->emp_firstname;
        $emp_lastname = $req->emp_lastname;
        $mobile_num = $req->mobile_num;
        $date_of_birth = $req->date_of_birth;
        $gender = $req->gender;
        $city = $req->city;
        $admin_id=$req->admin_id;
        $data =DB::update('update employee set emp_firstname=?,emp_lastname=?,mobile_num=?,date_of_birth=?,gender=?,city=? where emp_id=?', [$emp_firstname, $emp_lastname, $mobile_num, $date_of_birth, $gender, $city, $emp_id]);
        return redirect('admin/'.$admin_id);
      }
}

