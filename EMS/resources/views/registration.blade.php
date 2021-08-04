<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://bootswatch.com/5/flatly/bootstrap.min.css">
    <title>Document</title>
    <style>
        .btn{
	     width:80px;
	     height: 40px;
        }
       .btn-color {
        border-radius: 50px;
        color: #fff;
        background-image: linear-gradient(to right, #FFD54F, #D500F9);
        padding: 8px;
        cursor: pointer;
        border: none !important;
        margin-top: 0px
       }
        .btn-color:hover {
            color: #fff;
            background-image: linear-gradient(to right, #D500F9, #FFD54F)
        }
    </style>
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
      <h3 class="navbar-brand">MindTree</h3>
      
    
    </div>
</nav>
<br>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-3 " style="margin-top:20px">
                <h3 class="feature-title">Registration</h3>
                <!--registration form-->
                <form action="register_user" method="POST">
                    @if(Session::has('sucess'))
                    <div class="alert-success">{{Session::get('sucess')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert-danger">{{Session::get('fail')}}</div>
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="emp_firstname">FirstName</label>
                        <input type="text" class="form-control" placeholder="First Name" name="emp_firstname" value="{{old('emp_firstname')}}">
                        <span class="text-danger">@error('emp_firstname'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="emp_lastname">LastName</label>
                        <input type="text" class="form-control" placeholder="Last Name" name="emp_lastname" value="{{old('emp_lastname')}}">
                        <span class="text-danger">@error('emp_lastname'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="mobile_num">Mobile Number</label>
                        <input type="number" class="form-control" placeholder="MobileNumber" name="mobile_num" value="{{old('mobile_num')}}">
                        <span class="text-danger">@error('mobile_num'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="date_of_birth">Date Of Birth</label>
                        <input type="date" class="form-control" placeholder="Date Of Birth" name="date_of_birth" value="{{old('date_of_birth')}}">
                        <span class="text-danger">@error('date_of_birth'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label><br>
                        <input type="radio"  name="gender" value="male"> Male </input><br>
                        <input type="radio"  name="gender" value="female"> Female </input><br>
                        <input type="radio"  name="gender" value="others"> Others </input><br>
                    </div>
                    <div class="form-group">
                        <label for="comm_address">Communication Address</label>
                        <input type="text" class="form-control" placeholder="Communication Address" name="comm_address" value="{{old('comm_address')}}">
                        <span class="text-danger">@error('comm_address'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <select name="city" class="form-control">
                            <option value="Hyderabad">Hyderabad</option>
                            <option value="Chennai">Chennai</option>
                            <option value="Bengaluru">Bengaluru</option>
                            <option value="Mumbai">Mumbai</option>
                            <option value="Pune">Pune</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="userName">UserName</label>
                        <input type="text" class="form-control" placeholder="UserName" name="userName" value="{{old('userName')}}">
                        <span class="text-danger">@error('user_name'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="user_password">Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="user_password" value="{{old('user_password')}}">
                        <span class="text-danger">@error('user_password'){{$message}}@enderror</span>
                    </div> <br>
                    <div class="form-group">
                        <button class="btn btn-block btn-color" type="submit">Register</button>
                    </div><br>
                    <a href="login">Already Registred !! Login Here</a>
                </form>
            </div>
        </div>
    </div>
    <br><br><br><br><br><br>
    <footer>
<div class=" text-white text-center p-4 bg-primary" ">
    © 2021 Copyright:
    <a class="text-white fw-bold" href="#">MindTree:Employee Management System</a>
</div>
</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>