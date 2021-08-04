@extends('layout')
@section('content')
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
      <h3 class="navbar-brand">MindTree</h3>
      <a href={{"/login"}}><button class="btn btn-secondary my-2 my-sm-0">Logout</button></a>

    </div>
</nav><br>

<div class="container">
        <div class="row">
            <div style="height: 200px ;" class="col-md-6 offset-md-3 ">
            <h3 class="feature-title">Update Employee Details</h3>
                <hr>
                <form action="/updateemployee" method="POST">
                    @if(Session::has('sucess'))
                    <div class="alert-success">{{Session::get('sucess')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert-danger">{{Session::get('fail')}}</div>
                    @endif
                    @csrf
                    <div class="form-group">
                        <input type="hidden" class="form-control" placeholder="" name="emp_id" value="{{$data->emp_id}}">
                        <span class="text-danger">@error('proj_id'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="emp_firstname">First Name</label>
                        <input type="text" class="form-control" placeholder="First name" name="emp_firstname" value="{{$data->emp_firstname}}">
                        <span class="text-danger">@error('emp_firstname'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="emp_lastname">Last Name</label>
                        <input type="text" class="form-control" placeholder="last name" name="emp_lastname" value="{{$data->emp_lastname}}">
                        <span class="text-danger">@error('emp_lastname'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="mobile_num">Mobile Number</label>
                        <input type="number" class="form-control" placeholder="Mobile Number" name="mobile_num" value="{{$data->mobile_num}}">
                        <span class="text-danger">@error('mobile_num'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <input type="text" class="form-control" placeholder="Gender" name="gender" value="{{$data->gender}}">
                        <span class="text-danger">@error('gender'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="date_of_birth">Date of Birth</label>
                        <input type="date" class="form-control" placeholder="Start Date" name="date_of_birth" value="{{$data->date_of_birth}}">
                        <span class="text-danger">@error('date_of_birth'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" placeholder="city" name="city" value="{{$data->city}}">
                        <span class="text-danger">@error('city'){{$message}}@enderror</span>
                    </div>
                    <br>
                    <input type="hidden" name="admin_id" value="{{$admin_id}}">
                    <div class="form-group">
                    <a href={{"/admin/".$admin_id}}><button class="btn btn-secondary">Back</button></a>
                        <button class="btn btn-success type="submit">Submit</button>
                    </div><br>
                </form>
            </div>
        </div>
    </div>
<br><br><br><br><br><br><br><br><br><br><br><br>

<footer>
<div class=" text-white text-center p-4 bg-primary" ">
    © 2021 Copyright:
    <a class="text-white fw-bold" href="#">MindTree:Employee Management System</a>
</div>
</footer>

@stop 