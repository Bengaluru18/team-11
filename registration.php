<?php
$patientname=filter_input(INPUT_POST,'Name');
//$dob=filter_input(INPUT_POST,'DOB
date_default_timezone_set('Asia/Kolkata');

$dob = filter_input(INPUT_POST,'DOB');
$newdate = date('Y-m-d', strtotime($dob));
//$day1 = date('Y-m-d', $dob);
$parentname=filter_input(INPUT_POST,'pname');
$contactnum=filter_input(INPUT_POST,'Contact');
$age=filter_input(INPUT_POST,'Age');
$regno=filter_input(INPUT_POST,'reg_no');
$class=filter_input(INPUT_POST,'class');
if(!empty($patientname)){

if(!empty($age)){
$host="localhost";
$dbusername="root";
$dbpass="root";
$dbname="sskdb";
//Create the connection

$conn=new mysqli($host,$dbusername,$dbpass,$dbname);
if(mysqli_connect_error()){
echo "error";

}
else{

$sql="INSERT INTO patient(name,dob,parent_name,phone_no,reg_no,age,class) values('$patientname','$newdate','$parentname','$contactnum','$regno','$age','$class')";
if($conn->query($sql)){
echo "<script type='text/javascript'>alert('Successful');window.location.href='receptionist.html';</script>";
}
else{
    echo "Error:".$sql."<br>".$conn->error;
}
$conn->close();
}
}
}?>
