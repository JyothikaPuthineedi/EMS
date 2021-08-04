@extends('layout')
@section('content')
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
      <h3 class="navbar-brand">MindTree</h3>
      <a href={{"/login"}}><button class="btn btn-secondary my-2 my-sm-0">Logout</button></a>

    </div>
</nav><br>
<div class="container">
  <h4 class=" bg-info text-center">Ongoing Projects</h4>
    <div class="table-responsive">
    <table class="table align-middle table-hover">
    <thead>
                <tr>
                    <th scope="col">Project Id</th>
                    <th scope="col">Project Name</th> 
                </tr>
            </thead>
            <tbody>
            @foreach($empproject as $item)
           <tr>
                <td>{{$item['proj_id']}}</td>
                <td><a href={{"getprojectdetails/".$item['proj_id'].'/'.$admin_id}}>{{$item['proj_name']}}</a></td>
                 
           </tr>
            @endforeach
            </tbody>
    </table>
    <a href={{"/admin/".$admin_id}}><button class="btn btn-secondary">Back</button></a>
</div>
</div>

<br><br><br><br><br><br><br>
<footer>
<div class=" text-white text-center p-4 bg-primary" ">
    © 2021 Copyright:
    <a class="text-white fw-bold" href="#">MindTree:Employee Management System</a>
</div>
</footer>

@stop