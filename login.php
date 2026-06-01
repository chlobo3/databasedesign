<?php 

if (isset($_POST["submit"])) {
    echo "it works";

    $specialist_name = $_POST["specialist_name"];
    $pwd = $_POST["pwd"];
    }

else {
    header("location: index.html");
}

?>
