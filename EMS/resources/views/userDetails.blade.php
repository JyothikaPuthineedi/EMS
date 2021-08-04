@extends('layout')
@section('content')
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
      <h3 class="navbar-brand">MindTree</h3>
      <a href={{"/login"}}><button class="btn btn-secondary my-2 my-sm-0">Logout</button></a>

    </div>
</nav><br>
<div class="container">
  <h4 class=" bg-info text-center" >Employee Details </h4>
    <div class="table-responsive">
    <table class="table align-middle table-hover">
        <thead class="thead-dark">
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
            @foreach($employee as $item)
           <tr>
                <td scope="col">{{$item['emp_id']}}</td>
                <td scope="col">{{$item['emp_firstname']}}</td>
                <td scope="col">{{$item['emp_lastname']}}</td>
                <td scope="col">{{$item['mobile_num']}}</td>
                <td scope="col">{{$item['date_of_birth']}}</td>
                <td scope="col">{{$item['gender']}}</td>
                <td scope="col">{{$item['comm_address']}}</td>
                <td scope="col">{{$item['city']}}</td>
              
           </tr>
            @endforeach
               
            </tbody>
        </table>
        <a href={{"/admin/".$ID}}><button class="btn btn-secondary">Back</button></a>
    </div>
</div>
    <form action="info" method="POST">
    @if(Session::has('fail'))
                    <div class="alert-danger">{{Session::get('fail')}}</div>
                    @endif
        @csrf

        
    </form>
<br><br><br><br><br><br><br><br><br><br><br><br>
<footer>
<div class=" text-white text-center p-4 bg-primary" ">
    © 2021 Copyright:
    <a class="text-white fw-bold" href="#">MindTree:Employee Management System</a>
</div>
</footer>
    


@stop