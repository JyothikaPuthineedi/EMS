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
<h4 class=" bg-info text-center">Issues Raised By Employees</h4>
  <table class="table align-middle table-hover">
    <tr class="table-active">
      <td scope="col">Issue Id</td>
      <td scope="col">Type of Issue</td>
      <td scope="col">Description</td>
      <td scope="col">Raised by (Id)</td>
      <td scope="col">Status</td>
      <td scope="col">operation</td>
    </tr>
  
   
    @foreach ($issue as $iss)
    <tr>
      <td>{{$iss->issue_id}}</td>
      <td>{{$iss->issue_type}}</td>
      <td>{{$iss->issue_desc}}</td>
      <td>{{$iss->emp_id}}</td>
      <td>{{$iss->issue_status}}</td>
      <td><a href={{"updateIssueStatus/".$iss->issue_id."/".$ID}}>Close Issue</a></td>
      
     
    </tr>
   @endforeach
   
    
  </table>
  
  <a href={{"/admin/".$ID}}><button class="btn btn-secondary">Back</button></a>
</div>

<br><br><br><br><br><br><br><br><br><br>
<footer>
<div class=" text-white text-center p-4 bg-primary" ">
    © 2021 Copyright:
    <a class="text-white fw-bold" href="#">MindTree:Employee Management System</a>
</div>
</footer>


@stop 
