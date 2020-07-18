<?php
 include('header.php');
  include('connect.php');

  if(isset($_POST['Invite']))
  {
  	$meeting_date=$_POST['meeting_date'];
  	$meeting_start_time=$_POST['meeting_start_time'];
  	$meeting_title=$_POST['meeting_title'];
  	$meeting_description=$_POST['meeting_description'];
  	$meeting_keypoints=$_POST['meeting_keypoints'];
  	$place=$_POST['place'];
  	$state=$_POST['state'];
  	$city=$_POST['city'];
     $date=date("Y-m-d");
   $expire_time = strtotime($date);
  $today_time = strtotime($meeting_date);
  	if($today_time < $expire_time)
  	{
  		$status="Completed";
  	}
  	else {
  		$status="Upcoming";
  	}
  	 $sql="insert into meeting(title,description,date,time,status,keypoint)values('$meeting_title','$meeting_description','$meeting_date','$meeting_start_time','$status','$meeting_keypoints')";
  	$result=mysqli_query($conn,$sql) or die("error in insert");
  }
?>
<script>
$(document).ready(function() {
	$.noConflict();
    $('#details').DataTable();
} );
</script>

        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h1>User Directory</h1>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">

                          </div>


                  <div class="x_content">
                    <div class="table-responsive">
                      <table id="details"class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th>
                              <input type="checkbox" id="check-all" class="flat">
                            </th>
                            <th class="column-title">Name</th>
                            <th class="column-title">Email</th>
                            <th class="column-title">Phone_no</th>
                            <th class="column-title">Department</th>
                            <th class="column-title">Designation</th>
                            <th class="column-title no-link last">Action
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php

                              $sql=mysqli_query($conn,"SELECT * FROM directory d JOIN designation desig ON d.desig_id = desig.desig_id JOIN department dept ON dept.dept_id = desig.desig_id")or die("Error in Select Query1");

                                while($row=mysqli_fetch_assoc($sql))
                                {
                              ?>
                          <tr class="even pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" "><?php echo $row['name']; ?></td>
                            <td class=" "><?php echo $row['email']; ?></td>
                            <td class=" "><?php echo $row['mobile']; ?></td>
                            <td class=" "><?php echo $row['dept_name']; ?></td>
                            <td class=" "><?php echo $row['desig_name']; ?></td>
                            <td class=" last">
                            <a href="view_profile.php?id=<?php echo $row['user_id'];?>" class="fa fa-eye">&nbsp;View &nbsp;&nbsp;</a>
                            <a href="view_profile.php?id=<?php echo $row['user_id'];?>" class="fa fa-edit">&nbsp;Update&nbsp;&nbsp;</a>
                            <a href="view_directory.php?id=<?php echo $row['user_id']?>" onclick="return confirm('Are you sure?')" class="fa fa-trash">&nbsp;Delete</a>
                            </td>
                            </td>
                          </tr>
                          <?php
                            }

                          ?>
                        </tbody>
                      </table>
                    </div>


                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
        if(isset($_GET['id']))
        {
                $id=$_GET['id'];
                $result=mysqli_query($conn,"DELETE FROM directory WHERE user_id='$id'") or die("error in delete");
                header("location:view_directory.php");
        }?>
<?php include('footer.php'); ?>
