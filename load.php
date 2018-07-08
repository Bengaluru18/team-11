<?php

//load.php

$host="13.250.26.71";
$dbusername="abc";
$dbpass="123";
$dbname="sskdb";
$data = array();
//$connect=new PDO("mysql:host=$host;dbname=sskdb",$dbusername,$dbpass);
$conn=new mysqli($host,$dbusername,$dbpass,$dbname);
if(mysqli_connect_error()){
echo "error";

}
else{

  //echo "Hello there";
$data=array();
$query = "SELECT * FROM schedule join patient on patient.reg_no = schedule.reg_no ORDER BY schedule_date";

$statement = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($statement))
{
	$stmt = $row["doctor_id"]; 
	$stma=$stmt+$row["name"];
	
  //change the db
 $data[] = array(
  'id'   => $row["doctor_id"],
  'title'   => $row["name"],
  'start'   => $row["schedule_date"],
  'end'   => $row["schedule_date"]
 );
// array_push($events,$e);
}

echo json_encode($data);
}
?>
