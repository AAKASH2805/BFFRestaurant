<?php
session_start();
$servername="localhost";
$username="root";
$password="";
$dbname="bff";
 $conn=mysqli_connect($servername,$username,$password,$dbname);
if (!$conn) {
	echo "NOT CONNECTED";
} else {
	 echo '<script>alert("CONNECTED TO DATABASES")</script>';
}

$na=$_POST['uname'];
$ln=$_POST['lname'];
$em=$_POST['emle'];
$pno=$_POST['phono'];
$fo=$_POST['Food'];
$tfo=$_POST['typefood'];
$qun=$_POST['Quan'];
$ad=$_POST['add'];

if (isset($_POST['SUBMIT']))
 {
	$user=$_POST['uname'];
	$ln=$_POST['lname'];
    $em=$_POST['emle'];
    $pno=$_POST['phono'];
    $fo=$_POST['Food'];
    $tfo=$_POST['typefood'];
    $qun=$_POST['Quan'];
    $ad=$_POST['add'];
	if ($user==""||$ln==""||$em=""|| $pno==""|| $fo==""||$tfo==""||$qun==""||$ad=="") {
		echo "<script>alert('FORM SHOULD BE FILLED )</script>";
	}
	
}

 $s="SELECT * from menuorder where Username='$user' ";

 $result=mysqli_query($conn,$s);
 $num=mysqli_num_rows($result);

 if ($num==1) {
 	echo '<script>alert("USERNAME ALREADY TAKEN....PLEASE TAKE ANOTHER USERNAME")</script>';
 	echo "USERNAME ALREADY TAKEN";

 } else {
 	$reg="INSERT INTO `menuorder` ( `Username`, `Surname`, `Email`, `Phono`, `Food`, `TypeFood`, `Quantity`, `Address`) values('$user','$ln','$em','$pno','$fo','$tfo','$qun','$ad')";
 	mysqli_query($conn,$reg);
 	echo '<script>alert("SUCCESSFULLY ORDER")</script>';
 	echo "YOUR ORDER IS SUCCESSFULLY PLACED";
 }
  header('refresh:2;url="AkaWeb.html"');
 ?>