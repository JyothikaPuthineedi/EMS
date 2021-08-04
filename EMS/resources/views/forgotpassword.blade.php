<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://bootswatch.com/5/flatly/bootstrap.min.css">
    <title>Forgot Password</title>
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
</nav> <br>
<div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-3 " style="margin-top:20px">
                <h3>Forgot Password</h3>
                <hr>
                <!--forgot password form-->
                <form action="valid" method="POST">
                @if(Session::has('success'))
                <div class="alert alert-success"><strong>{{Session::get('success')}}</strong></div>
                @endif
                @if(Session::has('fail'))
                <div class="alert alert-danger"><strong>{{Session::get('fail')}}</strong></div>
                @endif
                @csrf
                    <div class="form-group">
                        <label for="userName">User Name</label>
                        <input type="text" class="form-control" placeholder="User Name" name="userName" value="{{old('userName')}}">
                        <span  class="text-danger">@error('userName'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="user_password">Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="user_password" value="{{old('user_password')}}">
                        <span class="text-danger">@error('user_password'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="user_password">Re-enter Password</label>
                        <input type="password" class="form-control" placeholder="Re-enter Password" name="new_password" value="{{old('new_password')}}">
                        <span  class="text-danger">@error('new_password'){{$message}}@enderror</span>
                    </div>
                     <br>
                    <div class="form-group">
                        <button class="btn btn-block btn-color" type="submit">Submit</button>
                    </div> <br>
                    <a href="login">Login Here</a>
                </form>
            </div>
        </div>
    </div><br><br><br><br><br><br><br>
    <footer>
<div class=" text-white text-center p-4 bg-primary" ">
    © 2021 Copyright:
    <a class="text-white fw-bold" href="#">MindTree:Employee Management System</a>
</div>
</footer>
</body>
</html>