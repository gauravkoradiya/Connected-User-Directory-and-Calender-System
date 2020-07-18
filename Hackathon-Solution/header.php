<?php
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
ob_start();
session_start();
$desig_level="";
if(!isset($_SESSION['id']))
{
  header('location:index.php');
}
if(isset($_SESSION['id']))
{
  $id = $_SESSION['id'];
  $inner=mysqli_query($conn,"SELECT * FROM directory u,designation d where u.desig_id=d.desig_id AND user_id ='$id'");
  $row=mysqli_fetch_assoc($inner);
  $desig_level=$row['desig_level'];

}
else {
  echo "error";
}
?>
<html lang="en">
  <head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>umbrella </title>

    <!-- Bootstrap -->
    <link href="assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="assets/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- Minified JS library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Minified Bootstrap JS -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <!-- Custom Theme Style -->
    <link href="assets/build/css/custom.min.css" rel="stylesheet">
  </head>




  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
              </div>
              <img src="assets/images/user.png" alt="..." class="img-circle profile_img">
              <div class="profile_info">
              <h5>Welcome <?php echo @$row['name'];?></h5>

              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->

            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">

                <ul class="nav side-menu">
                  <li><a href="dashboard.php"><i class="fa fa-home"></i> Dashboard </a>

                  </li>
                    <?php  if($desig_level >= 4)  {?>
                  <li><a><i class="fa fa-edit"></i> User Directory <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="add_user_form.php">Add user </a></li>
                      <li><a href="view_directory.php">Manage Directory</a></li>
                    </ul>
                  </li>
                <?php } ?>

                  <?php  if($desig_level >= 4)  {?>
                  <li><a><i class="fa fa-edit"></i> Meeting Managment <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="schedule_meeting.php">Schedule Meeting</a></li>
                      <li><a href="meeting_update_code.php">Update Schedule</a></li>
                      <li><a href="calendar.php">View Meeting</a></li>

                    </ul>
                    <?php } ?>
                  </li>
                  <?php if($desig_level==5){?>
                  <li><a><i class="fa fa-edit"></i> Department Managment <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="add_department.php">Add Department</a></li>
                        <li><a href="add_designation.php">Add Designation</a></li>
                      <li><a href="view_department.php">View Department </a></li>



                    </ul>
                  </li>
                <?php } ?>
                <li><a href="live_session.php"><i class="fa fa-edit"></i> Live Sessions <span class="fa fa-chevron-down"></span></a>


                <?php if($desig_level==3){?>

                  <li><a href="view_profile.php?id=<?php echo $id; ?>"><i class="fa fa-edit"></i> Profile</a></li>

                <?php }?>

                <li><a href="logout.php"><i class="fa fa-edit"></i>logout</a></li>

                </ul>
              </div>


            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

            </nav>
          </div>
        </div>
        <!-- /top navigation -->
