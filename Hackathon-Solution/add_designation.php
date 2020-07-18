<?php
include('header.php');
include('connect.php');
$dept_id="";
$desig_level="";
$desig_name="";
if(isset($_POST['add']))
{
	 $dept_id=$_POST['department'];
   $desig_level=$_POST['desig_level'];
   $desig_name=$_POST['desig_name'];
	$sql="insert into designation(desig_name,desig_level,dept_id)values('$desig_name','$desig_level','$dept_id')";
	$result=mysqli_query($conn,$sql);

}

?>
<div class="right_col" role="main">
<h2>Select Department </h2>
<?php
$sql1=mysqli_query($conn,"select * from department");
$sql2=mysqli_query($conn,"select * from designation");

?>
<form method="post">
<select name="department" class="form-control" required>
  <option value="">Choose Department..</option>
  <?php
    while ($result_dept=mysqli_fetch_assoc($sql1)) {?>
    <option value="<?php echo @$result_dept['dept_id']; ?>"><?php echo @$result_dept['dept_name']; ?> </option>;
      <?php
   }
  ?>
</select>
<br>
<label> Enter Designation: </label>

<input type="text" id="desig_name" class="form-control" name="desig_name" required />
<br>
<label>Enter Designation  Level: </label>
  <select name="desig_level" class="form-control" required>
              <option value="3">Official</option>
              <option value="4">Department Admin</option>
              <option value="5">Admin</option>

</select>
<br>
<center><input type="submit" name="add" value="Add Designation"/></center>
<br>
</form>
<br>

</div>
<?php include('footer.php');?>
