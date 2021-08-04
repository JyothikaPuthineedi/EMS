<?php

namespace App\Http\Controllers;

use App\Models\NormalUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class managerUserController extends Controller
{
    public function getManagerUser($emp_id)
    {

        $data = DB::table('employee')
            ->where('emp_id', $emp_id)
            ->get();
        $data2 = DB::table('employee')
            ->join('emp_proj', 'employee.emp_id', '=', 'emp_proj.emp_id')
            ->join('project', 'project.proj_id', '=', 'emp_proj.proj_id')
            ->select('employee.*')
            ->where('emp_proj.proj_manager', $emp_id)
            ->get();

        return view('managerUser', ['employee' => $data], ['reported' => $data2]);

    }

    public function addIssue(Request $req)
    {

        $normaluser = new NormalUser;
        $normaluser->emp_id = $req->emp_id;
        $normaluser->issue_type = $req->issue_type;
        $normaluser->issue_desc = $req->issue_desc;
        $normaluser->issue_status = "Open";
        $normaluser->save();

        return redirect('manager/' . $req->emp_id);

    }

    public function UpdateMobileManager($emp_id)
    {

        $data = DB::table('employee')
            ->where('emp_id', $emp_id)
            ->get();

        return view('editMobileManager', ['emp' => $emp_id]);

    }

    public function UpdateManagerMobile(Request $req)
    {
        $result = DB::table('employee')
            ->where('emp_id', $req->emp_id)
            ->update(
                ['mobile_num' => $req->mobile_num,
                    'comm_address' => $req->comm_address,
                    'city' => $req->city,
                ]
            );

        
        if ($result) {
            return redirect('manager/' . $req->emp_id)->with('success', 'Your details are updated!');
        } else {
            return back()->with('fail', 'Something wrong');
        }
    }

    public function deleteRepotee($emp_id, $manager_id)
    {
        DB::table('emp_proj')
            ->where('emp_id', $emp_id)
            ->where('proj_manager', $manager_id)
            ->delete();

        return redirect('manager/' . $manager_id);
    }

    public function getIssue($id)
    {
        $data = DB::table('issue')
            ->get();

        /* $data2 = DB::table('employee')
        ->join('emp_proj','employee.emp_id','=','emp_proj.emp_id')
        ->join('project','project.proj_id','=','emp_proj.proj_id')
        ->select('employee.*')
        ->where('emp_proj.proj_manager',$emp_id)
        ->get(); */

        $data2 = DB::table('issue')
            ->join('employee', 'employee.emp_id', '=', 'issue.emp_id')
            ->join('emp_proj', 'employee.emp_id', '=', 'emp_proj.emp_id')
            ->join('project', 'project.proj_id', '=', 'emp_proj.proj_id')
            ->select('issue.*')
            ->where('emp_proj.proj_manager', $id)
            ->get();

        //return view('issue',['issue'=>$data3]);
        return view('issue', ['issue' => $data2], ['ID' => $id]);
    }

    public function addEmployee($id)
    {
        return view('addEmployeeToProject', ['ID' => $id]);
    }

    public function addedEmployee(Request $req)
    {
        /* DB::table('employee')
        ->where('emp_id',$req->emp_id)
        ->update(
        ['mobile_num'=>$req->mobile_num,
        'comm_address'=>$req->comm_address,
        'city'=>$req->city
        ]
        );*/
        DB::table('emp_proj')
            ->insert(
                [
                    'emp_id' => $req->emp_id,
                    'proj_id' => $req->proj_id,
                    'proj_manager' => $req->id,
                ]
            );
        return redirect('manager/' . $req->id);
    }
}
