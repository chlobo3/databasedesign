<?php
$conn = mysqli_connect("localhost", "root", "", "helpdesk");

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $employee_id = $_POST['employee_id'];
    $name = $_POST['name'];
    $phone_number = $_POST['phone_number'];
    $job_title   = $_POST['job_title'];
    $department = $_POST['department'];

    $sql = "UPDATE employee SET name = '$name', `phone_number` = '$phone_number', `job_title` = '$job_title', 
    department = '$department' WHERE employee_id = '$employee_id'";

    if(mysqli_query($conn, $sql)){
        header("Location: users.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>
