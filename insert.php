<?php

//insert.php
$host="localhost";
$dbusername="root";
$dbpass="root";
$dbname="sskdb";
$connect = new PDO('mysql:host=$host;dbname=$dbname', $dbusername, $dbpass);

if(isset($_POST["title"]))
{
 $query = "
 INSERT INTO schedule
 (schedule_date, schedule_time, doctor_id, reg_no, status_id)
 VALUES (:schedule_date, :schedule_time, :doctor_id, :reg_no, :status_id)
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ":schedule_date" => $_POST['schedule_date'],
   ":schedule_time" => $_POST['schedule_time'],
":doctor_id" => $_POST['doctor_id'],
":reg_no" => $_POST['reg_no'],
"status_id" => $_POST['status_id']
  )
 );
}


?>