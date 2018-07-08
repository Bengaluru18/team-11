<?php
$patientname=filter_input(INPUT_POST,'Name');
$age=filter_input(INPUT_POST,'Age');
//$dob=filter_input(INPUT_POST,'DOB');
$dob = strtotime($_POST["DOB"]);
$dob = date('Y-m-d', $day1);
$parentname=filter_input(INPUT_POST,'pname');
$contactnum=filter_input(INPUT_POST,'Contact');
$age=filter_input(INPUT_POST,'Age');
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

$sql="select `sskdb`.`schedule`.`schedule_date` AS `schedule_date`,`sskdb`.`schedule`.`schedule_time` AS `schedule_time`,`sskdb`.`patient`.`name` AS `name` from (`sskdb`.`schedule` join `sskdb`.`patient`) where ((`sskdb`.`schedule`.`doctor_id` = 10) and (`sskdb`.`schedule`.`reg_no` = `sskdb`.`patient`.`reg_no`))";

if($conn->query($sql)){
echo "New record is inserted successfully";
}
else{
    echo "Error:".$sql."<br>".$conn->error;
}
$conn->close();
}
}
}?>
