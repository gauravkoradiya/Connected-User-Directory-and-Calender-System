og  <?php
	include('connect.php');
	function randomGenerator($length = 10) {
    $characters = 'abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
	if(isset($_POST['data'])){
		$n=$_POST['data'];

		for($i=0;$i<$n;$i++){
			$title = randomGenerator(5);
			$description=randomGenerator(5);
			$date=2018 . "-" . rand(1,12) . "-" . rand(1,30);
			$time=rand(0,23) . ":" . rand(0,60) . ":" . rand(0,60);
			$status="Upcoming";
			$keypoint=randomGenerator(7);

			$query="insert into meeting (title,description,date,time,status,keypoint) values ('$title','$description','$date','$time','$status','$keypoint')";
			$result=mysqli_query($conn,$query) or die("error in insert");

			}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>random meeting generator</title>
</head>
<body>
<form method="POST" action="meeting_generator.php">
	Number of data: <input type="number" name="data" />
	<input type="submit" name="btn" value="Submit">
</form>
</body>
</html>
