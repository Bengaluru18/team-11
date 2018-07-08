<?php
$username=filter_input(INPUT_POST,'username');
$password=filter_input(INPUT_POST,'password');
if(!empty($username)){
    if(!empty($password)){
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
echo "Hello there";
$sql="INSERT INTO account(username,password) values('$username','$password')";
if($conn->query($sql)){
echo "New record is inserted successfully";
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