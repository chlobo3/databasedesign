<?php
    
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "helpdesk";
$conn = "";

try{ 
        $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
}

catch(mysqli_sql_exception){
        echo"could not connect! :( ";
    }

    if(isset($_POST["submit"])){

        $Name = $_POST ['employeeName'];
        $CallerID = $_POST ['CallerID'];
        $ProblemType = $_POST['problemType'];
        $Notes = $_POST['notes'];
        $Specialist = $_POST ['Assignee'];

        $sql1 = "INSERT INTO employee (name,CallerID)
                VALUES ('$Name','$CallerID')";

        $sql2 = "INSERT INTO ticket (CallerID, ProblemType, Notes, Specialist)
                VALUES ('$CallerID','$ProblemType','$Notes', '$Specialist')";

    mysqli_query($conn, $sql1);
    mysqli_query($conn, $sql2);  

    }

?>
