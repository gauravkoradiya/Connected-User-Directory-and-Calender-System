<?php
include('header.php');
include('connect.php');
$_SESSION['meeting_code']='';
?>
<?php
  if(isset($_POST['submit']))
  {

    $meeting_code=$_POST['meeting_code'];
    $sql=mysqli_query($conn,"SELECT * from meeting where meeting_code='$meeting_code'");
    if(mysqli_num_rows($sql)>0)
    {
      $result = mysqli_fetch_assoc($sql);
      if($result['status']=="Upcoming")
      {
        $_SESSION['meeting_code']=$result['meeting_code'];
        header('location:meeting_update.php');
      }
      else {
        header('location:meeting_update_code.php');
      }
    }
    else {
      echo "error in fetch";
    }
  }


?>
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12">
                <div class="x_panel" style="">
                  <div class="x_title">
                    <h2>Enter Meeting code</h2>
                      <div class="clearfix"></div>
                        </div>
                          <div class="x_content">

                            <div class="container">
                                <div class="row">

                                    <form method="post">

                                    <div class='col-sm-4'>
                                      <div class="form-group">

                                        <input type="text" class="form-control" name="meeting_code">

                                    </div>
                                  </div>


                                                  <br>
                                                <div class="form-group">

                                                  <input type="submit" value="Search" name="submit" class="btn btn-success">

                                              </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

              </div>
            </div>
          </div>
        </div>

<?php include('footer.php')?>
