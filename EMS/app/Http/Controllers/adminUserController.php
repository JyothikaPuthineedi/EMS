<?php

namespace App\Http\Controllers;

use App\models\Employee;
use App\Models\NormalUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminUserController extends Controller
{
    public function getAdminUser($emp_id)
    {
        $data = DB::table('employee')
            ->where('emp_id', $emp_id)
            ->get();

        $reg = employee::all();
        if ($reg == " ") {
            return back()->with('fail', 'No Registered Employees!!!');
        } else {

            return view('adminUser', ['employee' => $data], ['employee_reg' => $reg]);
        }

        //return view('adminUser',['employee'=>$data]);
    }

    public function UpdateMobileAdminUser($emp_id)
    {

        $data = DB::table('employee')
            ->where('emp_id', $emp_id)
            ->get();

        return view('editMobileAdminUser', ['emp' => $emp_id]);

    }
    public function UpdateAdmin(Request $req)
    {
        $req->validate(
            [
                'mobile_num' => 'required|numeric|unique:employee|min:10',
                'comm_address' => 'required',
            ]
        );

        $result = DB::table('employee')
            ->where('emp_id', $req->emp_id)
            ->update(
                ['mobile_num' => $req->mobile_num,
                    'comm_address' => $req->comm_address,
                    'city' => $req->city,
                ]
            );

        if ($result) {
            return redirect('admin/' . $req->emp_id)->with('success', 'Your details are updated!');
        } else {
            return back()->with('fail', 'Something wrong');
        }

    }

    public function addIssueAdmin(Request $req)
    {

        $normaluser = new NormalUser;
        $normaluser->emp_id = $req->emp_id;
        $normaluser->issue_type = $req->issue_type;
        $normaluser->issue_desc = $req->issue_desc;
        $normaluser->issue_status = "Open";
        $normaluser->save();

        return redirect('admin/' . $req->emp_id);
    }

    public function getAllIssue($id)
    {
        $data = DB::table('issue')
            ->get();

        return view('allIssue', ['issue' => $data], ['ID' => $id]);
    }
    public function closeIssue($issue_id, $admin_id)
    {
        // $issue= issue::where('issue_id',$issue_id);
        // $issue->delete();

        DB::table('issue')
            ->where('issue_id', $issue_id)
            ->delete();

        return redirect('/displayAllIssue/' . $admin_id);
    }
}
