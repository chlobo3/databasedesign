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
        <h2>Ticket Request</h2>

        <div class = "searchbar">
            <input type= "text" placeholder="Search..." id="searchbar" name = "search" size="30"/>
            <button type = "submit">⌕</button>
        </div>
            
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
        <div class="decobox">
            <div class = "tablecontainer">
                    

            <?php
            $conn = mysqli_connect("localhost", "root", "", "helpdesk");

            $sql = "SELECT * FROM ticket";
            $result = mysqli_query($conn, $sql);

            ?>
            
                <table>
                        <tr>
                            <th>Ticket No.</th>
                            <th>Employee ID</th>
                            <th>Problem Type</th> 
                            <th>Notes</th>
                            <th>Specialist</th>
                            <th>Date/Time</th>
                            <th>Status</th>
                        </tr>   
                        
                        <?php while($row = mysqli_fetch_assoc($result)){ ?>

                        <tr>
                            <td><?php echo $row['ticket_no']; ?></td>
                            <td><?php echo $row['employee_id']; ?></td>
                            <td><?php echo $row['problem_type']; ?></td>
                            <td><?php echo $row['notes']; ?></td>
                            <td><?php echo $row['specialist_name']; ?></td>
                            <td><?php echo $row['created_at']; ?></td>
                            <td>status</td>
                        </tr>
                        <?php } ?>
    

                </table>



        </div>
    </div>
</div>




</body>


</html>
