
<!DOCTYPE html>
<html>
<head>
<title>Schedules</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font -->
</head>
<body>
    <?php
$host="localhost";
$dbusername="root";
$dbpass="root";
$dbname="sskdb";
// Create connection
$conn = new mysqli($host, $dbusername, $dbpass, $dbname);
// Check connection2
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT schedule_time, schedule_date, doctor_id,reg_no,status_id FROM schedule";
$result = $conn->query($sql);
echo "<table border='1'>
<tr>
<th><b>--Schedule Time--</b></th>
<th><b>--Schedule Date--</b></th>
<th><b>--Doctor ID--</b></th>
<th><b>--Registration-- ID</b></th>
</tr>";
if ($result->num_rows > 0) {
    // output data of each row
	
    while($row = $result->fetch_assoc()) {
      //  echo "Schedule Time: " . $row["schedule_time"]. " - Schedule Date: " . $row["schedule_date"]. "Doctor Id " . $row["doctor_id"]. "Registration Num " . $row["reg_no"]."Registration Num ". $row["status_id"]. "<br>";
    echo "<tr>";
echo "<td>" . $row["schedule_time"]. "</td>";
echo "<td>" . $row["schedule_date"]. "</td>";
echo "<td>" . $row["doctor_id"]. "</td>";
echo "<td>" . $row["reg_no"]. "</td>";
echo "</tr>";
}
echo "</table>";
	}
 

else {
    echo "0 results";
}
$conn->close();
?>
    <!-- main -->
    <div class="main-w3layouts wrapper">
            </div>
        </div>
        <!-- //copyright -->
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
            <li></li>
            <li></li>
            <li></li>



        </ul>
    </div>
    <!-- //main -->
</body>
</html>