<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;

use Session;

class LoginController extends Controller
{
   
    public function login()
    {
        return view("login");
    }
    public function registration()
    {
        return view("registration");
    }
    public function forgotPassword()
    {
        return view("forgotpassword") ;
    }
    #registration
    public  function registerUser(Request $req)
    {
        $req->validate(
            [
                'emp_firstname' => 'required',
                'emp_lastname' => 'required',
                'mobile_num' => 'required|numeric|unique:employee|min:10',
                'date_of_birth' => 'required',
                'comm_address' => 'required',
                'userName' => 'required|unique:employee|min:6',
                'user_password' =>'required|min:5'
            ]
        );
        
        $emp = new Employee();
        $emp->emp_firstname = $req->emp_firstname;
        $emp->emp_lastname = $req->emp_lastname;
        $emp->mobile_num = $req->mobile_num;
        $emp->date_of_birth = $req->date_of_birth;
        $emp->gender = $req->gender;
        $emp->comm_address = $req->comm_address;
        $emp->city = $req->city;
        $emp->userName = $req->userName;
        $emp->user_password = $req->user_password;
        $result = $emp->save();
        if($result){
            return back()->with('sucess','You have registred succesfully');
        }
        else{
            return back()->with('fail','Something wrong');
        }
     }

       public function loginUser(Request $req)
       {
        $req->validate(
            [
                'userName' => 'required ',
                'user_password' =>'required|min:5'
            ]
        );
          $login = Employee::where('userName','=',$req->userName)->first();
         
        if($login){
             if($req->user_password == $login->user_password)
             {
                $req->session()->put('loginId',$login->id);

                if($login->user_type == 'NORMAL USER')
                {
                    return redirect('normal/'.$login->emp_id);
                }
                else if($login->user_type == 'Manager')
                {
                    return redirect('manager/'.$login->emp_id);
                }
                else if($login->user_type == "Admin")
                {
                    return redirect('admin/'.$login->emp_id);
                }


             }
             else
             {
                return back()->with('fail','Password not matches. '); 
             }
        }
        else{
            return back()->with('fail','This username is not registered. ');
        }
       }

       #forgot password 
       function validation(Request $req)
    {
       $userName = $req->userName ;
       $userpassword = $req->user_password;
       $req->validate([
           'userName'=>'required',
           'user_password'=>'required | min:5 | max:10',
           'new_password' => 'required |min:5 | max:10'
         
       ]);
       // return $req->input();
       $user=Employee::where('userName','=',$req->userName)->first();
       $id=$login->emp_id;
       if($user)
       {
           if($req->user_password==$req->new_password)
           {
              $result= DB::table('employee')
              ->where('userName',$userName)
              ->update([
                'user_password'=>$userpassword
              ]);
              return back()->with('success','Password Updated Successfully !!!');
           }
           else{
               return back()->with('fail','Password is not matched!');
           }
       }
       else{
           return back()->with('fail','user doesnt exist!');
       }
    }
       public function screen()
       {
           return "welcome!! ";
       }
}


