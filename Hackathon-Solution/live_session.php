<?php

require('connect.php');
include('header.php');
$error="";
$d=date('Y-m-d');
$invited=array();
//$sql="select * from meeting m INNER JOIN attendance a ON m.meeting_code=a.meeting_code where date='$d'";
//$query=mysqli_query($conn,$sql) or die(mysqli_error($conn));
$sql1="select * from meeting where date > '$d'";
$query1=mysqli_query($conn,$sql1) or die(mysqli_error($conn));
if(mysqli_num_rows($query1)){
  while($result=mysqli_fetch_assoc($query1)){
   array_push($invited,$result['user_id']);
  }
echo $invited;

?>


        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h2>Live Sessions</h2>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <?php

                       if(mysqli_num_rows($query1) && in_array($_SESSION['id'],$invited)){

                   ?>
                      <table id="" class="table table-striped jambo_table ">
                        <thead>
                          <tr class="headings">

                            <th class="column-title">Meeting Code</th>
                            <th class="column-title">Title</th>
                            <th class="column-title">Date</th>
                            <th class="column-title">Time</th>
                            <th class="column-title">Link</th>




                          </tr>
                        </thead>
                        <tbody>
                                           <?php
                                              while($row=mysqli_fetch_assoc($query1)){
                                                $link=$row['meeting_code'].$row['title'];
                                              ?>
                                              <tr class="even pointer">

                            <td class=" "><?php echo $row['meeting_code']; ?></td>
                            <td class=" "><?php echo $row['title']; ?></td>
                            <td class=" "><?php echo $row['date']; ?></td>
                            <td class=" "><?php echo $row['time']; ?></td>
                            <td class=" "><?php echo "<a href='https://appr.tc/r/shreehari_$link' target='_blank'>Live Session</a>"?></td>

                            </td>
                          </tr>
                         <?php    } ?>


                        </tbody>
                      </table>


                      <?php

                          }

                  else
                    echo "No Live sessions for today";

                 ?>



                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
<?php include('footer.php'); ?>
