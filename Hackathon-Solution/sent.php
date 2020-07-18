<html>
<body>
<?php

session_start();
 include('connect.php');
function sms($number,$message,$senderId="PARTHS")
{

    //Your authentication key
$authKey = "114076ATvuS0GY1t5ab36b32";

//Multiple mobiles numbers separated by comma
$mobileNumber = $number;

//Sender ID,While using route4 sender id should be 6 characters long.

//Your message to send, Add URL encoding here.
$message = urlencode($message);

//Define route
$route = "4";
//Prepare you post parameters
$postData = array(
    'authkey' => $authKey,
    'mobiles' => $mobileNumber,
    'message' => $message,
    'sender' => $senderId,
    'route' => $route
);

//API URL
$url="http://api.msg91.com/api/sendhttp.php";

// init the resource
$ch = curl_init();
curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $postData
    //,CURLOPT_FOLLOWLOCATION => true
));


//Ignore SSL certificate verification
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


//get response
$output = curl_exec($ch);

//Print error if any
if(curl_errno($ch))
{
    echo 'error:' . curl_error($ch);
}

curl_close($ch);



}


if(isset($_POST['submit']) )
{

		$inv_users=$_SESSION['selected'];
		$code=$_SESSION['m_code'];

		$query="select * from  directory where user_id in($inv_users)";
		    $result=mysqli_query($conn,$query);

		   $query1="select * from meeting where meeting_code='$code'";
		    $result1=mysqli_query($conn,$query1);
		    $row1=mysqli_fetch_assoc($result1);
		    while($row=mysqli_fetch_assoc($result)){
		    	$x=$row['user_id'];
		    	$a="insert into attendance(meeting_code,user_id,status) values('$code','$x','invited')";
		    	$date=$row1['date'];
		    	$time=$row1['time'];
		    	$title=$row1['title'];
		    	$n=$row['mobile'];
		    	$ins_query=mysqli_query($conn,$a);
		    	sms($n,"You have been invited to attend the meeting on $date at time $time regarding $title");
		    	echo "sent";
		    }
}
else{
	echo "not sent";
}
?>
</body>
</html>
