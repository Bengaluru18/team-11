<!DOCTYPE html>
<html>
<head>
<title>Spastics Society of Karnataka</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<?php
$doctorid=filter_input(INPUT_POST,'doctorid');
$host="13.250.26.71";
$dbusername="abc";
$dbpass="123";
$dbname="sskdb";
//Create the connection

$conn=new mysqli($host,$dbusername,$dbpass,$dbname);
if(mysqli_connect_error()){
echo "error";

}
else{

$sql="select `sskdb`.`schedule`.`schedule_date` AS `schedule_date`,`sskdb`.`schedule`.`schedule_time` AS `schedule_time`,`sskdb`.`patient`.`name` AS `name` from (`sskdb`.`schedule` join `sskdb`.`patient`) where ((`sskdb`.`schedule`.`doctor_id` = $doctorid) and (`sskdb`.`schedule`.`reg_no` = `sskdb`.`patient`.`reg_no`))";

$result = $conn->query($sql);
$options = "";
if ($result) {
    // output data of each row
	
    while($row = $result->fetch_assoc()) {
      //  echo "Schedule Time: " . $row["schedule_time"]. " - Schedule Date: " . $row["schedule_date"]. "Doctor Id " . $row["doctor_id"]. "Registration Num " . $row["reg_no"]."Registration Num ". $row["status_id"]. "<br>";
    echo "<tr>";
echo "<td>" . $row["schedule_time"]. "</td>";
echo "<td>" . $row["schedule_date"]. "</td>";
echo "<td>" . $row["name"]. "</td>";
echo "</tr>";
}
echo "</table>";
	}

	
	


else{
    echo "Error:".$sql."<br>".$conn->error;
}
$conn->close();
}?>
<body>
    <!-- main -->
    <div class="main-w3layouts wrapper">
        <h1>Spastics Society of Karnataka</h1>
        <h1>Schedules</h1>
        <div class="main-w3layouts wrapper">


        <div class="main-agileinfo">
            <div class="agileits-top">
                <table>
                    <tr><th>Schedule Date</th>
                    <th>Schedule Time</th>
                    <th>Patient Name</th></tr>
                    echo "<tr><td>".$row['schedule_date']."</td>"."<td>".$row['schedule_time']+"</td><td>".$row['name']."</td></tr>"
                </table>
            </div>
        </div>
        <ul class="w3lsg-bubbles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
</body>
</html>