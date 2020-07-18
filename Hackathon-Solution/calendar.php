<?php

 include('header.php');
  include('connect.php');
$sql=mysqli_query($conn,"select * from meeting")or die("Error in Select Query");
?>
<script>
$(document).ready(function() {
	$.noConflict();
    $('#details').DataTable();
} );
</script>


        <div class="right_col" role="ain">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h2>List of Meetings</h2>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">


                    <div class="clearfix"></div>
                  </div>



                  <div class="x_content">
                    <div class="table-responsive">
                      <table id="details" class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">

                            <th class="column-title">Meeting Code</th>
                            <th class="column-title">Title</th>
                            <th class="column-title">Date</th>
                            <th class="column-title">Time</th>
                            <th class="column-title">Venue</th>
                            <th class="column-title">Description</th>
                            <th class="column-title">Status</th>

                            <th colspan="3" class="column-title no-link last">Action
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php



                                while($row=mysqli_fetch_assoc($sql))
                                {
                              ?>
                          <tr class="even pointer">

                            <td class=" "><?php echo $row['meeting_code']; ?></td>
                            <td class=" "><?php echo $row['title']; ?></td>
                            <td class=" "><?php echo $row['date']; ?></td>
                            <td class=" "><?php echo $row['time']; ?></td>
                            <td class=" "><?php echo $row['venue']; ?></td>
                            <td class=" "><?php echo $row['description']; ?></td>
                            <td class=" "><?php echo $row['status']; ?></td>
                            <td class=" last">
                            <a href="meeting_report.php?id=<?php echo $row['meeting_code'];?>" class="fa fa-eye">&nbsp;Generate Report&nbsp;&nbsp;</a>
                            </td>
                            <td class=" last">
                            <a href="meeting_update.php?id=<?php echo $row['meeting_code'];?>" class="fa fa-eye">&nbsp;Update&nbsp;&nbsp;</a>
                            </td>
                            <td class=" last">
                            <a href="fb_gui.php?meeting_code=<?php echo $row['meeting_code'];?>" class="fa fa-eye">&nbsp;View Disccussion&nbsp;&nbsp;</a>
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
<?php include('footer.php'); ?>
<?php
if(isset($_GET['delete_id']))
{
        $id=$_GET['delete_id'];
        $result=mysqli_query($conn,"delete from directory where user_id='$id'");
        header("location:view_directory.php");


}

?>
