<!DOCTYPE html> 
<html>
<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mozambique Limited Helpdesk</title>
    <link rel="stylesheet" href="style.css">
</head>

<body> 

    <div class="bordertop"></div>
        <h2>User Management</h2>
            
        <div class = "logout"> 
           <a href="dbweb.html" class="logout-btn">Log out</a>
        </div>

          <div class="navbar">
            <ul> 
                <li><a href = "ticket.html">Submit A Ticket</a></li>
                <li><a href = "request.php">Ticket Request</a></li>
                <li><a href = "users.php">User Management</a></li>
                <li><a href = "system.php">System</a></li>
            </ul>

    <div class ="container2">
        <div class ="decobox">
            
           <?php
            $conn = mysqli_connect("localhost", "root", "", "helpdesk");

            $sql = "SELECT * FROM employee";
            $result = mysqli_query($conn, $sql);
            ?>

            <?php
            $conn = mysqli_connect("localhost", "root", "", "helpdesk");
            $result = mysqli_query($conn, "SELECT * FROM employee");
            ?>

            <?php
            $conn = mysqli_connect("localhost", "root", "", "helpdesk");

            if($_SERVER["REQUEST_METHOD"] === "POST"){

            $employee_id  = $_POST['employee_id'];
            $name         = $_POST['name'];
            $phone_number = $_POST['phone_number'];
            $job_title    = $_POST['job_title'];
            $department   = $_POST['department'];

            $sql = "UPDATE employee 
            SET name = ?, phone_number = ?, job_title = ?, department = ? 
            WHERE employee_id = ?";

            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "ssssi", $name, $phone_number, $job_title, $department, $employee_id);
    
            if(mysqli_stmt_execute($stmt)){
                 header("Location: users.php");
                } else {
             echo "Error: " . mysqli_error($conn);
            }
            }
            ?>
           

                <div class = "tablecontainer">
                                <table>
                                        <tr>
                                            <th>Caller ID</th>
                                            <th>Name</th>
                                            <th>Phone Number</th> 
                                            <th>Job Title</th>
                                            <th>Department</th>
                                            <th>Actions</th>
                                        </tr>   
                                        
                                    <?php while($row = mysqli_fetch_assoc($result)){ ?>
                                    <tr>
                                        <form action="update_employee.php" method="post">
                                        
                                        <input type="hidden" name="employee_id" value="<?php echo $row['employee_id']; ?>"/>
                                        <td><?php echo $row['employee_id']; ?></td>
                                        <td><input type="text" name="name" value="<?php echo $row['name']; ?>"/></td>
                                        <td><input type="text" name="phone_number" value="<?php echo $row['phone_number']; ?>"/></td>
                                        <td><input type="text" name="job_title" value="<?php echo $row['job_title']; ?>"/></td>
                                        <td><input type="text" name="department" value="<?php echo $row['department']; ?>"/></td>
                                        <td><input type="submit" value="Save"/></td>
                                    </tr>
                                        </form>

                                    <?php } ?>
                                </table>
                    
                 </div>
            </div>
        </div>

