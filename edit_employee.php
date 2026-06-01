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
                <li><a href = "system.html">System</a></li>
            </ul>

    <div class ="container2">
        <div class ="decobox">
            
           <?php
            $conn = mysqli_connect("localhost", "root", "", "helpdesk");

            $sql = "SELECT * FROM employee";
            $result = mysqli_query($conn, $sql);
            ?>

                <div class = "tablecontainer">
                            <form action = "update_employee.php" method ="post"> 
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
                                        <td><input type="text" name="CallerID" value="<?php echo $row['employee_id']; ?>"/></td>
                                        <td><input type="text" name="employeeName" value="<?php echo $row['name']; ?>"/></td>
                                        <td><input type="text" name="phoneNumber" value="<?php echo $row['phone_number']; ?>"></td>
                                        <td><input type="text" name="jobTitle" value="<?php echo $row['job_title']; ?>"/></td>
                                        <td><input type="text" name="department" value="<?php echo $row['department']; ?>"/></td>
                                        <td><input type="submit" value="Save"/></td>
                                    </tr>
                                        <?php } ?>
                                </table>
                            </form>
                 </div>
            </div>
        </div>
