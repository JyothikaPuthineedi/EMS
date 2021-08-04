<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\NormalUser;
use App\Models\updateMobile;
class normalUserController extends Controller
{
    function getNormalUser($emp_id){
      // $data = DB::select("select * from employee where user_name = 'imadam' ");
      $data = DB::table('employee')
      ->where('emp_id',$emp_id)
      ->get();
        return view('normalUser',['employee'=>$data]);
     
    }
    #add issue
    function addIssueNormal(Request $req){
      
      $normaluser = new NormalUser;
      $normaluser->emp_id=$req->emp_id;
      $normaluser->issue_type=$req->issue_type;
      $normaluser->issue_desc=$req->issue_desc;
      $normaluser->issue_status="Open";
      $result=$normaluser->save();
      if($result){
        return redirect('normal/'.$req->emp_id)->with('success','Your Issue Submitted');
        //return back()->with('sucesss','submitted ');
      }
      else{
        return back()->with('fail','Something wrong');
      }
      
      //return redirect('normal/'.$req->emp_id);
     
    }

    function UpdateMobileNormalUser($emp_id){
      
          $data = DB::table('employee')
        ->where('emp_id',$emp_id)
        ->get();  
        
        return view('editMobileNormalUser',['emp'=>$emp_id]);

      
    }

    function UpdateNormal(Request $req){
      $req->validate(
        [
            
            'mobile_num' => 'required|numeric|unique:employee|min:10',
            
            'comm_address' => 'required'
        ]
    );

     /* $data = DB::table('employee')
      ->where('emp_id',$req->emp_id)
      ->get(); */
 

      $result = DB::table('employee')
      ->where('emp_id',$req->emp_id)
      ->update(
        ['mobile_num'=>$req->mobile_num,
        'comm_address'=>$req->comm_address,
        'city'=>$req->city
        ]
      );

      if($result){
        return redirect('normal/'.$req->emp_id)->with('success','Your details are updated!');
    }
    else{
        return back()->with('fail','Something wrong');
    }
     // return redirect('normal/'.$req->emp_id);

    }
}
