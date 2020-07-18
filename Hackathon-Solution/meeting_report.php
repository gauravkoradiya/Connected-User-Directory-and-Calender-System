<?php
error_reporting(0);
	include('connect.php');

	include('header.php');

	$flag=0;

	$result_user="";

	$row_user="";

	$meeting_res="";

  $invite=0;

	$row_count=0;

	$sql1="";

	$result1="";

	if(isset($_POST['meeting_attendance_code'])){

		$_SESSION['meeting_code']=$_POST['meeting_attendance_code'];

	}

	elseif (isset($_GET['id'])) {

		$_SESSION['meeting_code']=$_GET['id'];



	}

	$row_meeting=array();

	$temp=array();



	if(isset($_POST['meeting_attendance_code']))

	{

		$m_id=$_POST['meeting_attendance_code'];

		$result_user=mysqli_query($conn,"select user_id from attendance where meeting_code='$m_id'");

		$meeting_res=mysqli_query($conn,"select * from meeting where meeting_code='$m_id'");

    $row_count=mysqli_num_rows($meeting_res);

		$row_meeting=mysqli_fetch_assoc($meeting_res);


	}

		if(isset($_GET['id'])){

		$m_id=$_GET['id'];

		$result_user=mysqli_query($conn,"select user_id from attendance where meeting_code='$m_id'");

		$meeting_res=mysqli_query($conn,"select * from meeting where meeting_code='$m_id'");

    $row_count=mysqli_num_rows($meeting_res);

		$row_meeting=mysqli_fetch_assoc($meeting_res);

	}

?>

<div class="right_col" role="main">

    <div class="">

        <div class="clearfix"></div>

        <div class="row">

          	<div class="col-md-12 col-sm-12 col-xs-12">

	            <div class="x_panel">









						<br>



						<?php

							if(isset($_POST['meeting_attendance_code']) || $_GET['id'] && $row_count)

							{

							echo "<h1><center>Meeting Details:</center></h1>";

							echo "<h4><strong>Title : </strong> " .$row_meeting['title']."</h4>";

							echo "<h4><strong>Description : </strong> " . $row_meeting['description'] . "</h4>";

							echo "<h4><strong>Date : </strong> " . $row_meeting['date'] . "</h4>";

							echo "<h4><strong>Time : </strong> " . $row_meeting['time'] ."</h4>";

							echo "<h4><strong>Status : </strong> " . $row_meeting['status'] ."</h4>";



							if($row_meeting['status']=='Completed')
							{

							?>

								<table class="table table-responsive table-striped table-bordered table-hover">

								<?php



								echo "<tr>";



								echo "<th>Name</th>";

									echo "<th>Department</th>";

								echo "<th>Designation</th>";

								echo "<th>Email</th>";

								echo "<th>Mobile No.</th>";

								echo "<th>Attendance</th>";

									echo "<th>State</th>";



								echo "</tr>";

								while($row_user=mysqli_fetch_assoc($result_user)){
									$user_id=$row_user['user_id'];
									$sql1=mysqli_query($conn,"select name,department,de.desig_name as designation,email,mobile from directory d, designation de where user_id='$user_id' and d.desig_id=de.desig_id") or die("error in query");

									$result1=mysqli_fetch_assoc($sql1);

									$status=mysqli_query($conn,"select status from attendance where user_id='$user_id' and meeting_code='$m_id'");

									$res_status=mysqli_fetch_assoc($status);



									if($res_status['status']=="present")

										echo "<tr class=\"success\">";

								 else

											echo "<tr class=\"danger\">";

									foreach ($result1 as $key => $value) {

										echo "<td>";

										if($key=="attendance"){

											if($res_status['status']=='present')

											{

												echo "present";

											}

											else {

												echo "absent";

											}

										}

										else{

											echo "$value";

										}

										echo "</td>";

									}

									echo "</tr>";

								  }

						?>

					</table>

					<?php

						}

						else {?>

							<table class="table table-responsive table-striped table-bordered table-hover">

								<caption><h2>Invited Official</h2></caption>

							<?php

							echo "<tr>";

							echo "<th>Name</th>";

							echo "<th>Department</th>";

							echo "<th>Designation</th>";

							echo "<th>Email</th>";

							echo "<th>Mobile No.</th>";

							echo "</tr>";

							while($row_user=mysqli_fetch_assoc($result_user)){
								$user_id=$row_user['user_id'];
								$sql1=mysqli_query($conn,"select name,department,de.desig_name as designation,email,mobile from directory d, designation de where user_id='$user_id' and d.desig_id=de.desig_id") or die(mysqli_error($conn));

								$result1=mysqli_fetch_assoc($sql1);

								$status=mysqli_query($conn,"select status from attendance where user_id='$user_id' and meeting_code='$m_id'") or die(mysqli_error($conn));

								$res_status=mysqli_fetch_assoc($status);

										  echo "<tr class=\"primary\">";
											//print_r($result1);
								foreach ($result1 as $key => $value) {

									echo "<td>";



										echo "$value";



									echo "</td>";

								}

								echo "</tr>";

								}

					?>

						</table>

						<?php

						}

					}

					else{

						echo "<h2>Meeting with specified meeting id doesn't exists.";

					}

					?>

						              			</div>



                    <a href="meeting_attendance_code.php" class="btn btn-primary" role="button">Go Back!</a>

                    <?php

                    if($row_count)

                      echo "<a href=\"generate_pdf.php\" class=\"btn btn-success\" role=\"button\">Generate PDF!</a>";

                    ?>



               </div>

	      		</div>

        	</div>

    	</div>



<?php

include('footer.php');

?>
