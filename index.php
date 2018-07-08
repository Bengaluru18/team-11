<?
$email = $_POST['email'];
$pswd = $_POST['password'];
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
	$query = "Select count(*) from workers where email_id = '$email' and password = '$pswd'";
	$result = mysqli_query($conn,$query);
	$row = mysqli_fetch_row($result);
	if($row[0]==0){
		echo "<script>alert 'Invalid user';</script>";
	}
	else{
		$query = "Select role_id from workers where email_id = '$email' and password = '$pswd'";
	$result = mysqli_query($conn,$query);
	$row = mysqli_fetch_row($result);
	if($row[0]==1){
		echo "<script>window.location.href='msw.html';</script>";
	}
	else if($row[0]==2){
		echo "<script>window.location.href='admin.html';</script>";
	}
	else{
		echo "<script>window.location.href='receptionist.html';</script>";
	}
}
?>