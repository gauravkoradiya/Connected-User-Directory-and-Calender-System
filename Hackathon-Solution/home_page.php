<?php
include(connect.php);
session_start();
if(!isset($_SESSION['id']))
{
	header('location:index.php');
}
else {
	header('location:schedule_meeting.php');
}
?>
