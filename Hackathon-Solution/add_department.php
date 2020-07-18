<?php
include('header.php');
include('connect.php');
if(isset($_POST['add']))
{
	$department=$_POST['department'];
	$sql="insert into department(dept_name)values('$department')";
	$result=mysqli_query($conn,$sql);
}

?>
<div class="right_col" role="main">
<h2>Add Department</h2>
	<div class="">
    	<div class="clearfix"></div>
                <div class="row">
                  <div class="col-md-6 col-xs-12">
                    <div class="x_content">
                        <form id="demo-form" data-parsley-validate method="post">
                                <label for="department">Department * :</label>
                                <input type="text" id="department" class="form-control" name="department" required />
                                <br/>

                                <input type="submit" name="add" value="Add Department" class="btn-success">
                        </form>
					</div>
                  </div>

                </div>
        </div>
   </div>
</div>
<?php include('footer.php');?>
