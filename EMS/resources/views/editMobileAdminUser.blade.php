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
      <div style="height: 200px ;" class="col-md-6 offset-md-3 ">
        <h3 class="feature-title">Update Mobile and Address</h3>
        
        <form action="/editMobileAdmin" method="POST">
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
                <input type="text" name="mobile_num" class="form-control "  placeholder="New Mobile Number" pattern="[5-9][0-9]{9}" required >
            </div>

            <div class="form-group">
                <lable>New communication address :</lable>
                <input type="text" name="comm_address" class="form-control " placeholder="New address">
            </div>

            <div class="form-group">
                <lable>New city :</lable>
                <input type="text" name="city" class="form-control " placeholder="New city">
            </div><br><br>
            <button type="submit" class="btn btn-success">Update </button>
        </form>
        </div>
  </div>
</div><br><br><br><br><br><br><br><br><br><br><br>
<footer>
<div class=" text-white text-center p-4 bg-primary" ">
    © 2021 Copyright:
    <a class="text-white fw-bold" href="#">MindTree:Employee Management System</a>
</div>
</footer>
@stop 