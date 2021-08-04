@extends('layout')
@section('content')
<link rel="stylesheet" href="css/main.css" >
                                  <!--Nav bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
      <h3 class="navbar-brand">MindTree</h3>
          <button 
                class="navbar-toggler" 
                type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#toggleMobileMenu" 
                aria-controls="toggleMobileMenu" 
                aria-expanded="false" 
                aria-label="Toggle navigation"
              >
              <span class="navbar-toggler-icon"></span>
              </button>
      @foreach ($employee as $admin)
      @endforeach
      <div class="collapse navbar-collapse" id="toggleMobileMenu">
      <ul class="navbar-nav m-auto">

        <li class="nav-item">
        <a class="nav-link" href={{"/getproject/".$admin->emp_id}} > Check Project </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href={{"/displayAllIssue/".$admin->emp_id}} >Issues</a>
        </li>

        <li class="nav-item">
        <a class="nav-link" href="#addproject">Add Project</a>
        </li>
        
        <li class="nav-item">
        <a class="nav-link" href="#aboutissues">Create Issues</a>
        </li>

        <li class="nav-item">
        <form action="/searchproject" method="POST">
         @csrf
         <input type="text"  name="search" placeholder="ID/Username">
        <input type="hidden" name="admin_id" value="{{$admin->emp_id}}" >
        <button style="margin-left:5px" type="submit" class="btn btn-success btn-sm"> Search Project </button>
        </form>
     </ul>
     <a href={{"/login"}}><button class="btn btn-secondary my-2 my-sm-0">Logout</button></a>

    </div>
  </div>
</nav>
<br>


  @if(Session::has('success'))
  <div class="alert alert-success" role="alert">
  <h5 class="text-center">
  {{Session::get('success')}}
  </h5>
  </div>
   @endif
   @if(Session::has('fail'))
    <div class="alert alert-danger" role="alert">
    <h5 class="text-center"> {{Session::get('fail')}}</h5>
    </div>
  @endif
                    <!------------Admin Details--------------->

<div class="container">
  <h4 class=" bg-info text-center" >Your Details </h4>
  <div class="table-responsive">
     <table class="table align-middle table-hover">
       <thead class="thead-dark">
        <tr>
        <td scope="col">Id</td>
      <td scope="col">Firstname</td>
      <td scope="col">Lastname</td>
      <td scope="col">Mobile</td>
      <td scope="col">Date of Birth</td>
      <td scope="col">Gender</td>
      <td scope="col">Address</td>
      <td scope="col">City</td>
      <td scope="col">User Type</td>
      <td scope="col">UserName</td>
      <td></td>
    </tr>
  </thead>

    @foreach ($employee as $adm)
    <tr>
      <td>{{$adm->emp_id}}</td>
      <td>{{$adm->emp_firstname}}</td>
      <td>{{$adm->emp_lastname}}</td>
      <td>{{$adm->mobile_num}}</td>
      <td>{{$adm->date_of_birth}}</td>
      <td>{{$adm->gender}}</td>
      <td>{{$adm->comm_address}}</td>
      <td>{{$adm->city}}</td>
      <td>{{$adm->user_type}}</td>
      <td>{{$adm->userName}}</td>
      <td>
        <a href={{"editMobileAdminUser/".$adm->emp_id}} class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Edit </a>
      </td>
    </tr>
   @endforeach
  </table>
  </div>
</div>
<br>
                                       <!------------Registered Employees--------------->

<div class="container">
<h4 class=" bg-info text-center" >Registered Employee's</h4>
<div class="table-responsive">
     <table class="table align-middle table-hover" >
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Employee Id</th>
                    <th scope="col">Register Username</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach($employee_reg as $item)
           <tr>
                <td>{{$item['emp_id']}}</td>
                <td><a href={{"info/".$item['emp_id']."/".$adm->emp_id}}>{{$item['userName']}}</a></td>
                <td><a href={{"delete/".$item['emp_id']."/".$adm->emp_id}}>Delete</a></td>
                <td><a href={{"updateemployee/".$item['emp_id']."/".$adm->emp_id}}>Edit</a></td>
           </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<br><br>
                                   <!------------Add Project--------------->

<div class="container features" id="addproject">
    <div class="row">
    <div class="de-flex flex-column justify-content-center">
        <div class="col-lg-4 col-md-4 col-sm-12">
        <h3 class="feature-title">Add Project</h3>
        <form class="form-horizontal" action="/projectInfo" method="POST">
       @csrf
       <div class="form-group">
       <label  >Project Name</label>
       <div >
       <input type="text" class="form-control" name="proj_name" placeholder="Project Name" required><br><br>
       <span style="color:red">@error('proj_name'){{$message}}@enderror</span>
       </div>
       </div>

       <div class="form-group">
       <label >Project Description</label>
       <div >
       <input type="text" class="form-control" name="proj_desc" placeholder="Project Description" required><br><br>
       <span style="color:red">@error('proj_desc'){{$message}}@enderror</span>
       </div>
       </div>

       <div class="form-group">
       <label>Project Start Date</label>
       <div >
       <input type="Date" class="form-control" name="proj_startdate" placeholder="Start date" required><br><br>
       <span style="color:red">@error('proj_startdate'){{$message}}@enderror</span>
       </div>
       </div>

       <div class="form-group">
       <label>Project End Date</label>
       <div >
       <input type="Date" class="form-control" name="proj_enddate" placeholder="End date" required><br><br>
       <span style="color:red">@error('proj_enddate'){{$message}}@enderror</span>
       </div>
       </div>
  </form>
  <button type="submit" class="btn btn-success" name="submit">Submit</button>
</div>
</div>
                                       <!------------Raise an Issue--------------->

<div class="col-lg-4 col-md-4 col-sm-12 mt-5" id="aboutissues">
     <h3 class="feature-title">Raise an Issue</h3>
    <form action="/createIssueAdmin" method="POST" >
          @csrf
          <input type="hidden" name="emp_id" value="{{$adm->emp_id}}" >
          <div class="form-group">
          <lable>Issue Type :</lable>
          <input type="text" class="form-control" name="issue_type" placeholder="Issue type" required><br>
          </div>

          <div class="form-group">
          <lable>Issue Description :</lable>
          <input type="text" class="form-control" name="issue_desc" placeholder="Issue description" required><br>
          </div>
          <button type="submit" class="btn btn-success">Raise Issue</button>
    </form>
        </div>
    </div>
</div>
 <br><br>
  <br><br> <br><br>
                                       <!------------Footer--------------->
<footer>
<div class=" text-white text-center p-4 bg-primary" ">
    © 2021 Copyright:
    <a class="text-white fw-bold" href="#">MindTree:Employee Management System</a>
</div>
</footer>
<script type="text/javascript">
        setTimeout(function () {

            // Closing the alert
            $('.alert').alert('close');
        }, 2000);
    </script>

@stop
