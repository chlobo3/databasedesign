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

    if($_SERVER["REQUEST_METHOD"] === "POST"){

        $name =  mysqli_real_escape_string ($conn, $_POST['employeeName']);
        $employee_id = mysqli_real_escape_string ($conn, $_POST['employee_id']);
        $problem_type =  mysqli_real_escape_string ($conn, $_POST['problemType']);
        $notes = mysqli_real_escape_string ($conn,$_POST['notes']);
        $specialist_name = mysqli_real_escape_string ($conn, $_POST['Specialist']);
        $created_at = date('Y-m-d H:i:s');


        $departments = [
            "IT",
            "HR",
            "Finance",
            "Sales",
            "Marketing"
        ];

        $job_titles =[
            "Technician",
            "Analyst",
            "Coordinator",
            "Manager",
            "Administrator"
        ];

        $department = $departments[array_rand($departments)];
        $job_title = $job_titles[array_rand($job_titles)];
        $phone_number = "07" . rand(100000000, 999999999);


        $operating_systems = [
                "Windows 10",
                "Windows 11",
                "MacOS"
        ];

        $equipment_types = [
                "Desktop Computer",
                "Laptop",
                "Tablet"
        ];

        $serial_number = "SN-".date('y'). "-" .rand(100000, 999999);
        $operating_system = $operating_systems[array_rand($operating_systems)];
        $software_id = "".rand(1,100);
        $equipment_type = $equipment_types[array_rand($equipment_types)];

        $sql1 = "INSERT INTO employee (name, employee_id, department, job_title, phone_number) VALUES ('$name', '$employee_id', '$department', '$job_title', '$phone_number')";
        $sql2 = "INSERT INTO ticket (problem_type, employee_id , notes, specialist_name, created_at) VALUES ('$problem_type', '$employee_id', '$notes','$specialist_name','$created_at')";
        $sql3 = "INSERT INTO equipment (employee_id, serial_number, operating_system, software_id, equipment_type) VALUES ('$employee_id', '$serial_number' , '$operating_system', '$software_id', '$equipment_type')";

mysqli_query($conn, $sql1);
mysqli_query($conn, $sql2);
mysqli_query($conn, $sql3);
    
echo "success";

}

?>
