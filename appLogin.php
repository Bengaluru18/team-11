<?php
$username=filter_input(INPUT_POST,'email');
$password=filter_input(INPUT_POST,'password');
if(!empty($username)){
    if(!empty($password)){
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
	$result = 2;
$sql="SELECT emp_id,emp_name from workers where email_id = '$username' and password = '$password' and role_id = (SELECT role_id from roles where role='Medical Professionals')";
$result = $conn->query($sql);

if($result){
	$row = $result->mysqli_fetch_array();
	if($row){
		echo $row
	}
	else{
echo "Invalid";
}
}
else{
    echo "Error:".$sql."<br>".$conn->error;
}
$conn->close();
}



    }
    else{
    echo " Password should not be empty";
    die();

    }
}
else{
    echo "Username should not be empty";
    die();
}

?>