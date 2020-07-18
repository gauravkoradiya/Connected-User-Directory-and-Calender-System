<?php
include('connect.php');
include('header.php');
if(isset($_POST['upload']))
{
	$name=$_FILES['file']['name'];
	move_uploaded_file($_FILES['file']['tmp_name'],'../files/'.$name);
$file = fopen('../files/'.$name,"r");
$data=array();
if($file)
{
while(!feof($file)){
	$data=fgetcsv($file,',');
  print_r(fgetcsv($file));
	print_r($data);
 $sql="insert into directory (name,email,password,mobile) values('$data[0]','$data[1]','$data[2]','$data[3]')";
	mysqli_query($conn,$sql);
}
echo "add succesfull";
}
else {
	echo "file string not open";
}
fclose($file);
}
?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Add User</h3>
              </div>
				<div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
              </div>
            </div>
            <div class="row">
                  <div class="col-md-6 col-xs-12">
                    <div class="x_panel">
                    <div class="x_content">
                        <br />
                        <form  method="post" enctype="multipart/form-data" class="form-horizontal form-label-left input_mask">
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Department</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                              <select class="form-control">
                                <option value="">Choose option</option>
                                <option value="directorate">Directorate</option>
                                <option value="corporate">Corporate</option>
                                <option value="commissionarate">Commissionarate</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Designation" name="designation">
                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input type="file" class="form-control" id="inputSuccess3" placeholder="Upload File" name="file">
                          </div>
                          <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                              <button type="submit" value="Upload" name="upload" class="btn btn-success">Submit</button>
                            </div>
                          </div>
                          </form>
                      </div>
                    </div></div>
                </div>
          </div>
        </div>
<?php include('footer.php') ?>
