<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "EMS";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//$db = mysqli_connect('localhost', 'root', '', 'EMS');

do {
    echo "welcome \n";
    echo "Choose an option - \n";
    echo "1 - Make user as Admin \n";
    echo "2 - Make user as Manager \n";
    echo "3 - Make user as Normal \n";
    echo "4 -Exit \n";
    echo "Enter your choice - ";
    $choice = readline();
    switch ($choice) {
        case '1':

            $id = readline("Enter employee Id : ");
            $result = mysqli_query($conn, "SELECT * FROM employee WHERE emp_id='$id' LIMIT 1");

            $num_rows = mysqli_num_rows($result);

            if ($num_rows > 0) {
                echo "Employee Exists \n";

                mysqli_query($conn, "UPDATE employee SET user_type='Admin' WHERE emp_id=$id");
                echo "Updated Information - Made Admin! \n";
                echo "--------------------------------------------\n";
            } else {
                echo "Employee does not Exists \n";
                echo "--------------------------------------------\n";
            }
            break;

        case '2':

            $id = readline("Enter employee Id : ");
            $result = mysqli_query($conn, "SELECT * FROM employee WHERE emp_id='$id' LIMIT 1");
            $num_rows = mysqli_num_rows($result);
            if ($num_rows > 0) {
                echo "Employee Exists \n";

                mysqli_query($conn, "UPDATE employee SET user_type='Manager' WHERE emp_id=$id");
                echo "Updated Information -  Made Manager! \n";
                echo "--------------------------------------------\n";
            } else {
                echo "Employee does not Exists \n";
                echo "--------------------------------------------\n";
            }

            break;

        case '3':

            $id = readline("Enter employee Id : ");
            $result = mysqli_query($conn, "SELECT * FROM employee WHERE emp_id='$id' LIMIT 1");
            $num_rows = mysqli_num_rows($result);
            if ($num_rows > 0) {
                echo "Employee Exists \n";
                mysqli_query($conn, "UPDATE employee SET user_type='NORMAL USER' WHERE emp_id=$id");
                echo "Updated Information - Made Normal! \n";
                echo "--------------------------------------------\n";
            } else {
                echo "Employee does not Exists \n";
                echo "--------------------------------------------\n";
            }
            break;
        case '4':
            echo "Exit";
            //$flag = true;
            break;
        default:
            echo "Enter valid input";
            break;
    }

} while ($choice != 4);

?>