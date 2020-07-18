<?php
include('header.php');
include('connect.php');
$code="";

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

  	 $sql="INSERT INTO meeting (title,description,date,time,status,keypoint,venue)VALUES('$meeting_title','$meeting_description','$meeting_date','$meeting_start_time','$status','$meeting_keypoints','')";
     $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
     /*$sql1="select * from meeting where title='$meeting_title'";
     $result1=mysqli_query($conn,$sql1);
     $row=mysqli_fetch_assoc($result1);
  	 $code=$row['meeting_code'];
     */
     $_SESSION['m_code']=mysqli_insert_id($conn);//$code;


  }
?>
<script>
$(document).ready(function() {
	$.noConflict();
    $('#details').DataTable();
} );
</script>
<?php

if(isset($_POST['back']))
{
  $carray=explode(",", $_POST['select']);
  $code=$_POST['meeting_code'];
}
?>
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h2>Send Invitation</h2>

              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">




                  <div class="x_content">
                    <div class="table-responsive">
                      <table id="details" class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th>

                                <input type="checkbox" id="check-all" class="select" >



                            </th>
                            <th class="column-title">Name</th>
                            <th class="column-title">Email</th>
                            <th class="column-title">Phone_no</th>
                            <th class="column-title">Department</th>
                            <th class="column-title">Designation</th>
                            <?php if(!isset($_POST['Invite'])){?>

                          <?php } ?>

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
                              <input type="checkbox" class="record" value="<?=$row['user_id']?>" name="table_records" <?php if(isset($_POST['back'])){ if(in_array($row['user_id'], $carray)){echo 'checked';} }   ?>>
                            </td>
                            <td ><?php echo $row['name']; ?></td>
                            <td ><?php echo $row['email']; ?></td>
                            <td ><?php echo $row['mobile']; ?></td>
                            <td ><?php echo $row['dept_name']; ?></td>
                            <td ><?php echo $row['desig_name']; ?></td>


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
             <ul class="pager">
                      <li><a href="#">Previous</a></li>
                      <li><a href="#">1</a></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">Next</a></li>
                    </ul>


                              <form action="confirm_invitation.php" method="post">
                            <input type="hidden" value="" id="checkvalue" name="selected">
                            <input type="hidden" value="<?php echo $code; ?>" name="meeting_code">
                            <input type="submit" name="submit" value="next" class="btn btn-success"
                            style="float:right">
                          </form>
          </div>
        </div>
<?php include('footer.php'); ?>



<script type="text/javascript">




  $(document).ready(function(){


    $(".record").click(function(){



var val=new Array();

      $('.record:checked').each(function(){
       val.push($(this).val());
      });
      var count=0;
      $('.record:not(:checked)').each(function(){
        count++;
      });

      if(count!=0)
      {
        $('#check-all').removeAttr('checked');

      }
      if(count==0)
      {

        $('#check-all').prop('checked',true);

      }

      $("#checkvalue").val(val);

    });


    $('#check-all').click(function(){


       if($('#check-all').is(":checked"))
      {
          $(".record").each(function(){
              $(this).prop('checked',true);
          });
          var val=new Array();
      $('.record:checked').each(function(){

        val.push($(this).val());
       $("#checkvalue").val(val);


      });


      }
      else
      {
          $(".record").each(function(){
              $(this).removeAttr('checked');
              $("#checkvalue").val(val);
          });

      }
    });


  });

</script>
