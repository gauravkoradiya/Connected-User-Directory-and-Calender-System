<?php

include('db.php');
if(isset($_POST['change']))
{
	$password=$_POST['password'];
	$email=$_POST['femail'];



	$sql1="update admin set admin_password='$password' where admin_email='$email'";
	mysqli_query($sql,$sql1);
	header('location:logout.php');




}

?>
