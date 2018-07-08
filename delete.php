<?php

//delete.php

if(isset($_POST["id"]))
{
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

$statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':id' => $_POST['id']
  )
 );
}

?>
