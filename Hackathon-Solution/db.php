<?php

	ob_start();
	session_start();
	$sql=mysqli_connect('localhost','root','','id4943207_shreehari123');
	if(!$sql)
	{
		echo "connection error";
	}
?>