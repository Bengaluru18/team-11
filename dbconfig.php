<?php
$host="localhost";
$dbusername="root";
$dbpass="root";
$dbname="sskdb";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>