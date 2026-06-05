<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "helpdesk");

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $pwd = $_POST['pwd'];

    $sql = "SELECT * FROM specialist WHERE username = ? AND pwd = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $username, $pwd);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $_SESSION['username'] = $username;
        header("Location: index.html"); 
        exit();
    } else {
        echo "Incorrect username or password.";
    }
}
?>
