<?php
$patientname=filter_input(INPUT_POST,'Name');
$age=filter_input(INPUT_POST,'Age');
//$dob=filter_input(INPUT_POST,'DOB');
$dob = strtotime($_POST["DOB"]);
$dob = date('Y-m-d', $day1);
$parentname=filter_input(INPUT_POST,'pname');
$contactnum=filter_input(INPUT_POST,'Contact');
//$age=filter_input(INPUT_POST,'Age');
$regno=filter_input(INPUT_POST,'reg_no');
if(!empty($patientname)){

if(!empty($age)){
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

$sql="select `sskdb`.`schedule`.`schedule_date` AS `schedule_date`,`sskdb`.`schedule`.`schedule_time` AS `schedule_time`,`sskdb`.`schedule`.`doctor_id` AS `doctor_id`,`sskdb`.`workers`.`emp_name` AS `doctor_name`,`sskdb`.`workers`.`email_id` AS `email_id`,`sskdb`.`workers`.`phone_no` AS `contact_number`,`sskdb`.`department`.`dname` AS `deptname` from ((`sskdb`.`schedule` join `sskdb`.`workers`) join `sskdb`.`department`) where ((`sskdb`.`schedule`.`doctor_id` = `sskdb`.`workers`.`emp_id`) and (`sskdb`.`workers`.`role_id` = 2) and (`sskdb`.`workers`.`dno` = `sskdb`.`department`.`dno`)))";

if($conn->query($sql)){
	$result=$conn->query($sql);
if($result->num_rows>0){
	while($row = $result->fetch_asoc()){
		echo "<tr><td>".$row['schedule_date']."</td><td>".$row['schedule_time']"." ".$row['emp_name']."</td><td>".$row['email_id']."</td><td>".$row['contact_number']"." ".$row['deptname']."</td><td>";
}
else{
    echo "Error:".$sql."<br>".$conn->error;
}
$conn->close();
}
}
}?>
