<?php
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
include('connect.php');
session_start();
if(isset($_SESSION['id']))
{
   header('location:dashboard.php');
}
$msg="";
if(isset($_POST['login']))
{
    $user=mysqli_real_escape_string($conn,$_POST['email']);
    $pass=mysqli_real_escape_string($conn,$_POST['password']);
     $query="select * from directory where email='$user' AND password='$pass'";
    $result=mysqli_query($conn,$query);
    $num=mysqli_num_rows($result);
    if($num==1)
    {
        $row=mysqli_fetch_assoc($result);
        $_SESSION['id']=$row['user_id'];
        header('location:dashboard.php');

    }
    else
    {
        $msg="user does not exists";
    }
}

if(isset($_POST['femail']))
{
		$email=$_POST['femail'];

		 $query="select * from directory where email='$email'";
		    $result=mysqli_query($conn,$query);
		    $num=mysqli_num_rows($result);

		    if($num==1)
		    {
		       $row=mysqli_fetch_assoc($result);
           $code=rand(1000,9999);
           sms($row['mobile'],"Your new password is ".$code);
           echo "sms";
           $a=mysqli_query($conn,"update directory set password='".$code."' where user_id='".$row['user_id']."'");
           if($a)
           {
              $status=alert("New Password Sent Successfully To Your Mobile");
              if($status==True)
              {
                header('location:index.php');
              }
           }
        }
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>umbrella</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/custom.js"></script>

</head>
<body>
<!--login form  -->
<div class="container" >
        <div class="card card-container">
            <p class="text-center text-danger" id="error"><?=$msg?></p>


            <form class="form-signin" method="post" id="show">
                <p class="title" style="">Login</p>
                <span id="reauth-email" class="reauth-email"></span>
                <input type="email" readonly id="inputEmail" class="form-control" placeholder="Email address" name="email" required autofocus>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>

                <input type="submit" class="btn btn-lg btn-primary btn-block btn-signin" value="Login" name="login">



            </form>
            <div  id="forgot" class="forgot-password">
                Get OTP
            </div>
            <div  id="forgot1" class="forgot-password" style="display: none;">
                Login
            </div>



            <div id="slider" style="padding-top:20px;display: none;">

            <form action="index.php" method="post"><!-- id="validateform" onsubmit="return validateForm()"> -->
            <div class="form-inline">
            <input type="email"  class="form-control form-control-md col-md-9" placeholder="Enter the Email address" name="femail" id="email" style="border-radius: 0px;" required autofocus>
            <Button type="submit" class="btn btn-md btn-primary btn-block btn-signin col-md-3" id='send' value="Send" style="border-radius: 0px;">Get OTP</Button></div>
            <p id="checkemail" class="text-danger"></p>
<!--
             <div class="form-inline" id="slider1" style="padding-top:20px;display: none;">
            <input type="text"  class="form-control form-control-md col-md-10" placeholder="Enter the Code here" name="code" id="code" maxlength="4" style="border-radius: 0px;" required autofocus>
            <Button type="button" class="btn btn-md btn-primary btn-block btn-signin col-md-2" id='verify'  style="border-radius: 0px;">Verify</Button></div>
            <p id="notverify"  class="text-danger"></p> -->


            <div id="changepassword" style="display: none;">


            <div class="form-inline" style="padding-top:20px;border-top:1px solid black;margin-top:20px;">
            <input type="password"  class="form-control form-control-md col-md-12" placeholder="Enter Password" name="password" pattern=".{8,}" id="password" style="border-radius: 0px;" required autofocus></div>


            <div class="form-inline" style="padding-top:20px;">
            <input type="password" pattern=".{8,}"  class="form-control form-control-md col-md-12" placeholder="Confirm Password " name="cpassword" id="cpassword"  style="border-radius: 0px;" required autofocus></div>

            <input type="submit" class="btn btn-primary btn-sm" name="change" style="margin-top:20px;float: right;" value="confirm">
            <p id="passworderror" class="text-danger"></p>
            </div>
        </form>

        </div>


        </div>

        </div>
        </div>
    </div>
<!-- end login form -->


</body>
</html>

<script type="text/javascript">

    var count=1;
    $(document).ready(function(){
        $("#forgot").click(function(){
            $("#slider").slideToggle();
            $("#show").slideToggle();

             $("#forgot1").show();
             $("#forgot").hide();
              $("#error").html('');

             });
         $("#forgot1").click(function(){
            $("#slider").slideToggle();
            $("#show").slideToggle();
            $("#forgot").show();
             $("#forgot1").hide();

             });

        $("#send").click(function(){
        var send=document.getElementById('email').value;

        $.ajax({

            url:"index.php",
            type:"post",
            data:{
                femail:send
            },
            success:function(data){

              jQuery("#inputEmail").val(send);
                if(data=="false")
                {
                    //$('#checkemail').html('Invalid Email Id');
                    $('#slider1').hide();

                }
                else
                {

                     $('#slider1').show();
                     $('#checkemail').html('');
                       $('#notverify').html('resend');



                }
                $("#slider").slideToggle();
                $("#show").slideToggle();

                 $("#forgot1").show();
                 $("#forgot").hide();
                  $("#error").html('');


            }
        });

        $('#verify').click(function(){
            var datasend=document.getElementById('code').value;

             $.ajax({

            url:"ajax/verify.php",
            type:"post",
            data:{
                code:datasend,
            },
            dataType:"JSON",
            success:function(data){


                if(data['result']=='true')
                {
                       $('#changepassword').css("display","block");
                       $('#notverify').html('');

                }
                else
                {
                    $('#notverify').html('Invalid Code');
                     $('#changepassword').css("display","none");
                }

            }
        });

        });
});
});

    function validateForm()
    {

            var password=document.getElementById('password').value;
            var cpassword=document.getElementById('cpassword').value;
            var c=false;

            if(password==cpassword)
            {

                c=true;
            }
            else
            {
                document.getElementById("passworderror").innerHTML="Password Does not match";
                c=false;
            }
            return c
    }




jQuery(document).ready(function(){
  $("#slider").slideToggle();
  $("#show").slideToggle();

   $("#forgot1").show();
   $("#forgot").hide();
    $("#error").html('');

});



</script>
