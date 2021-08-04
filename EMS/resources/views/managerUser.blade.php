@extends('layout')
@section('content')
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
      @foreach ($employee as $manager)
      @endforeach
      <div class="collapse navbar-collapse" id="toggleMobileMenu">
      <ul class="navbar-nav m-auto">

     
        <li class="nav-item">
        <a class="nav-link" href={{"/addEmployee/".$manager->emp_id}} > Add Employee </a>
        </li>
        <li class="nav-item">
       
      
          <a class="nav-link" href={{"/displayIssue/".$manager->emp_id}} >Issues</a>
        </li>
        
        <li class="nav-item">
        <a class="nav-link" href="#aboutissues">Create Issues</a>
          
       
        
        
      </ul>

      
    </div>
      <a href={{"/login"}}><button class="btn btn-secondary my-2 my-sm-0">Logout</button></a>
    
    </div>
</nav>
@if(Session::has('success'))
  <div class="alert alert-success" role="alert">
  <h5 class="text-center">
  {{Session::get('success')}}
  </h5>


 </div>
   @endif
@if(Session::has('fail'))
    <div class="alert alert-danger" role="alert">
    <h5 class="text-center">
    {{Session::get('fail')}}
    </h5>

    </div>
@endif
<br>
<div class="container">
<h4 class=" bg-info text-center" >Your Details </h4>
<div class="table-responsive"> 
<table class="table align-middle table-hover">
    <tr>
      <td scope="col">Id</td>
      <td scope="col">Firstname</td>
      <td scope="col">Lastname</td>
      <td scope="col">Mobile</td>
      <td scope="col">DOB</td>
      <td scope="col">Gender</td>
      <td scope="col">Address</td>
      <td scope="col">City</td>
      <td scope="col">User Type</td>
      <td scope="col">UserName</td>
      
      
    </tr>
    @foreach ($employee as $emp)
    <tr>
      <td>{{$emp->emp_id}}</td>
      <td>{{$emp->emp_firstname}}</td>
      <td>{{$emp->emp_lastname}}</td>
      <td>{{$emp->mobile_num}}</td>
      <td>{{$emp->date_of_birth}}</td>
      <td>{{$emp->gender}}</td>
      <td>{{$emp->comm_address}}</td>
      <td>{{$emp->city}}</td>
      <td>{{$emp->user_type}}</td>
      <td>{{$emp->userName}}</td>
      
      <td>
        <a href={{"editMobile/".$emp->emp_id}} class="btn btn-success">Edit</a>
      </td>
    </tr>
   @endforeach
</table>
</div>

</div>
<div class="container">
<h4 class=" bg-info text-center">Employee's Reported To You Are </h4>
<div class="table-responsive">
<table class="table align-middle table-hover">
    <tr>
      <td scope="col">ID</td>
      <td scope="col">First Name</td>
      <td scope="col">Last Name</td>
      <td scope="col">Mobile</td>
     
      <td scope="col">Gender</td>
      <td scope="col">Address</td>
      <td scope="col">City</td>
     
     
      <td scope="col">Operation</td>
    </tr>

    @foreach ($reported as $rep)
    <tr class="table-active">
      <td>{{$rep->emp_id}}</td>
      <td>{{$rep->emp_firstname}}</td>
      <td>{{$rep->emp_lastname}}</td>
      <td>{{$rep->mobile_num}}</td>
      
      <td>{{$rep->gender}}</td>
      <td>{{$rep->comm_address}}</td>
      <td>{{$rep->city}}</td>
      
      <td>
        <a href={{"deleteRepotee/".$rep->emp_id."/".$emp->emp_id}}>Remove This Employee</a>
      </td>
      </tr>
   @endforeach
</table>
</div>

</div>


<br><br><br>





<div class="container features">
            <div class="row">
                
                
                
                
                
                
                <div class="col-lg-4 col-md-4 col-sm-12" id="aboutissues">
                    <h3 class="feature-title">Raise an Issue!</h3>
                    <form action="/create" method="POST">
                        @csrf
                        <input type="hidden" name="emp_id" value="{{$emp->emp_id}}" >
                        
 
                         <div class="form-group">
                             <lable>Issue Type :</lable>
                             <input type="text" name="issue_type" class="form-control " placeholder="Issue type" required>
                         </div>

                         <div class="form-group">
                            <lable>Issue Description :</lable>
                             <input type="text" name="issue_desc" class="form-control "placeholder="Issue description" required><br>
                         </div>
  
  
                         <button type="submit" class="btn btn-success">Create issue </button><br>
                     </form>
                    
                </div>
            </div>
        </div><br><br>
        <footer>
<div class=" text-white text-center p-4 bg-primary" ">
    © 2021 Copyright:
    <a class="text-white fw-bold" href="#">MindTree:Employee Management System</a>
</div>
</footer>
@stop

