<?php

	include('connect.php');
	$emailarr=array("manishvvasaniya@gmail.com","pethanibhavin004@gmail.com","gauravkarodiya@gmail.com","keyurchandapra1@gmail.com","rajatbeladiya7@gmail.com","adityadoriwala@gmail.com");
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
			$mobile = abs(mt_rand(7000000000,9999999999)) ;
			$name = randomGenerator(5);
			$designation=randomGenerator(5);
			//$email=randomGenerator(5) . "@" . randomGenerator(4) . "." . randomGenerator(3);
			$email=$emailarr[rand(0,sizeof($emailarr)-1)];
			$state=randomGenerator(6);
			$dept=randomGenerator(7);
			$pass=randomGenerator(5);
			$gender="";
			if($mobile%2==0)
				$gender="Female";
			else
				$gender="Male";

			$address=randomGenerator(13);

			$query="insert into directory (name,designation,email,mobile,state,department,password,gender,address) values ('$name','$designation','$email',$mobile,'$state','$dept','$pass','$gender','$address')";
			$result=mysqli_query($conn,$query) or die("error in insert");

			}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>random data generator</title>
</head>
<body>
<form method="POST" action="user_generator.php">
	Number of data: <input type="number" name="data" />
	<input type="submit" name="btn" value="Submit">
</form>
</body>
</html>
