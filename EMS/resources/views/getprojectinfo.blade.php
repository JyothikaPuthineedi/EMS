@extends('layout')
@section('content')
<link rel="stylesheet" href="css/main.css" >
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
      <h3 class="navbar-brand">MindTree</h3>
      <a href={{"/login"}}><button class="btn btn-secondary my-2 my-sm-0">Logout</button></a>

    </div>
</nav>
<br>
<div class="container">
  <h4 class=" bg-info text-center" >Employees details </h4>
  <div class="table-responsive">
  <table class="table align-middle table-hover">
        <thead>
                <tr>
                    <th>Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Mobile No</th>
                    <th>DOB</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>City</th>
                </tr>
            </thead>
            <tbody>
            @foreach($getprojectdetails as $item)
           <tr>
                <td>{{$item->emp_id}}</td>
                <td>{{$item->emp_firstname}}</td>
                <td>{{$item->emp_lastname}}</td>
                <td>{{$item->mobile_num}}</td>
                <td>{{$item->date_of_birth}}</td>
                <td>{{$item->gender}}</td>
                <td>{{$item->comm_address}}</td>
                <td>{{$item->city}}</td>
           </tr>
            @endforeach
            </tbody>
            
        </table>
        <a href={{"/admin/".$admin_id}}><button class="btn btn-secondary">Back</button></a>
</div>
</div><br><br><br><br><br><br><br><br><br><br><br>
<footer>
<div class=" text-white text-center p-4 bg-primary" ">
    © 2021 Copyright:
    <a class="text-white fw-bold" href="#">MindTree:Employee Management System</a>
</div>
</footer>

   @stop
