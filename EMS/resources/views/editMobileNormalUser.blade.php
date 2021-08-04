@extends('layout')
@section('content')
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
      <h3 class="navbar-brand">MindTree</h3>
        <a href={{"/login"}}><button class="btn btn-secondary my-2 my-sm-0">Logout</button></a>
    </div>
</nav>
<br>
<div class="container">
  <div class="row">
      <div style="height: 200px ;" class="col-md-4 offset-md-3 ">
        <h3 class="feature-title">Update mobile and address</h3>
        
        <form action="/editMobileNormal" method="POST">
                     @if(Session::has('success'))
                    <div class="alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert-danger">{{Session::get('fail')}}</div>
                    @endif
            @csrf
            <input type="hidden" name="emp_id" value="{{$emp}}" >
            <div class="form-group">
                <lable>New mobile number :</lable>
                <input type="text" name="mobile_num" class="form-control "  placeholder="Enter New Mobile Number" pattern="[5-9][0-9]{9}" required >
                <span class="text-danger">@error('mobile_num'){{$message}}@enderror</span>

            </div>

            <div class="form-group">
                <lable>New communication address :</lable>
                <input type="text" name="comm_address" class="form-control " placeholder="Enter New address" required>
                <span class="text-danger">@error('comm_address'){{$message}}@enderror</span>

            </div>

            <div class="form-group">
                <lable>New city :</lable>
                <input type="text" name="city" class="form-control " placeholder="Enter New city">
            </div><br>
            <button type="submit" class="btn btn-success">Update </button>
        </form>
        </div>
  </div>
</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<footer>
<div class=" text-white text-center p-4 bg-primary" ">
    © 2021 Copyright:
    <a class="text-white fw-bold" href="#">MindTree:Employee Management System</a>
</div>
</footer>
@stop 