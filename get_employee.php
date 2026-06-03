<?php

$conn = mysqli_connect("localhost", "root", "", "helpdesk");

    $employee_id = $_GET['CallerID'];
    $sql = "SELECT * FROM employee WHERE CallerID = '$employee_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    echo json_encode($row);
?>
