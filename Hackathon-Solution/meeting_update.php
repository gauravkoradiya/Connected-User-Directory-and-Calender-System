<?php
    include('header.php');
      include('connect.php');
?>
<?php
if(isset($_GET['id']))
{
$meeting_code=$_GET['id'];
}
else{
  $meeting_code=$_SESSION['meeting_code'];

}
?>
      <script>
    function update() {
        var txt;
    var r = confirm("Are You sure to update meeting data??");
    if (r == true) {
      <?php

          $title=$_POST['meeting_title'];
          $description=$_POST['meeting_description'];
          $date=$_POST['meeting_date'];
          $time=$_POST['meeting_start_time'];
          $venue=$_POST['venue'];
          $sql="update meeting set `title`= '$title',`description`='$description',`date`= '$date',`time`= '$time',`venue`= '$venue' where meeting_code = '$meeting_code'";
          mysqli_query($conn,$sql)
      ?>

        txt = "Meeting update succesfull";
    } else {
        txt = "Meeting not upddate succesfull";
    }
    document.getElementById("status_tag").innerHTML = txt;

  }
</script>

<?php
//$meeting_code=$_SESSION['meeting_code'];
if(isset($_GET['id']))
{
$meeting_code=$_GET['id'];
}
else{
  $meeting_code=$_SESSION['meeting_code'];

}
$sql=mysqli_query($conn,"select * from meeting where meeting_code='$meeting_code'");
$result=mysqli_fetch_assoc($sql);

?>

        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <h1>Update Meeting</h1>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                  <h5>meeting code : <?php echo isset($_GET['id'])?$_GET['id']:$_SESSION['meeting_code']; ?></h5>


                                            <!-- start form for validation -->
                                            <form id="demo-form" data-parsley-validate method="post" method="post">
                                            <label for="Meeting Title">Meeting Title*:</label>
                                              <input type="text" id="meet_title" class="form-control" name="meeting_title" value="<?php echo $result['title'] ?>" required />
                                              <label for="Meeting Description">Meeting Description :</label>
                                                  <input id="meet_description" required class="form-control" name="meeting_description" value="<?php echo $result['description']; ?>">

                                              <label for="meeting_time">Meeting Date* :</label>
                                                <input type='date' class="form-control" name="meeting_date"  value="<?php echo $result['date'];?>" required/>
                                              <label for="meeting_time">Meeting Time* :</label>
                                                <input type='time' class="form-control" name="meeting_start_time"  value="<?php echo $result['time'];?>"  required/>
                                                    <label for="place">Place * :</label>
                                              <input type="text" id="place" class="form-control" name="venue" value="<?php echo $result['venue'];?>" required />
                                              <div class="form-group">
                                                          <br>
                                                          <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                                            <input type="submit" name="submit" class="btn btn-success" value="Update" onclick="update()">
                                                          </div>
                                                        </div>



                                             </form>
                                                 <h5 id="status_tag" name="status_tag"/>
                                          </div>



                 </div>
           </div>
         </div>


          </div>

       </div>
<?php include('footer.php');?>
