
<?php
include('connect.php');
$from_id=$_GET['from_id'];
$message=$_GET['message'];
$meeting_id=$_GET['meeting_id'];
mysqli_query($conn,"insert into chat (from_id,message,meeting_id) values ('$from_id','$message','$meeting_id')");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
</head>
<body>
<form action="">
    <input type="text" name="meeting_id">
    <input type="text" name="from_id">
    <input type="text" name="message">
<input type="submit">
</form>    
</body>
</html>
