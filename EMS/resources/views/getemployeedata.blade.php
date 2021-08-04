<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="info" method="POST">
        @csrf
        <table border=1>
        <thead>
                <tr>
                    <th>Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Mobile No</th>
                    <th>DOB</th>
                    <th>Gender</th>
                    <th>City</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
            @foreach($employee as $item)
           <tr>
                <td>{{$item['emp_id']}}</td>
                <td>{{$item['emp_firstname']}}</td>
                <td>{{$item['emp_lastname']}}</td>
                <td>{{$item['mobile_num']}}</td>
                <td>{{$item['date_of_birth']}}</td>
                <td>{{$item['gender']}}</td>
                <td>{{$item['city']}}</td>
                <td><a href={{"updateemployee/".$item['emp_id']}}>Edit</a></td>
           </tr>
            @endforeach
            </tbody>
            
        </table>
        <a href="reg">Back to Admin</a>
    </form>
    <footer>
<div class=" text-white text-center p-4 bg-primary" ">
    © 2021 Copyright:
    <a class="text-white fw-bold" href="#">MindTree:Employee Management System</a>
</div>
</footer>
</body>
</html>