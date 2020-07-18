<?php
include('connect.php');
include('header.php');
$query_dept="select * from department";
$sql_dept=mysqli_query($conn,$query_dept);
$query_desig="select * from designation";
$sql_desig=mysqli_query($conn,$query_desig);

if(isset($_POST['submit']))
{
  $name=$_POST['name'];
  $designation=$_POST['designation'];
  $email=$_POST['email'];
  $mobile=$_POST['mobile'];
  $state=$_POST['state'];
  $department=$_POST['department'];
  $gender=$_POST['gender'];
  $address=$_POST['address'];
  $password = random_password(8);
    $sql="insert into directory(name,desig_id,email,mobile,state,department,gender,address,password)values('$name','$designation',$email','$mobile','$state','$department','$gender','$address','$password')";
    $result=mysqli_query($conn,$sql) or die("error in sql");
   header('location:dashboard.php');

 }


function random_password( $length = 8 ) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
    $password = substr( str_shuffle( $chars ), 0, $length );
    return $password;
}
?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
            </div>
                <div class="row">
                  <div class="col-md-6 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Add User</h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                              <li><a href="#">Settings 1</a>
                              </li>
                              <li><a href="#">Settings 2</a>
                              </li>
                            </ul>
                          </li>
                          <li><a class="close-link"><i class="fa fa-close"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <!-- start form for validation -->
                        <form id="demo-form" data-parsley-validate method="post" enctype="multipart/form-data" >
                          <label for="username">User Name * :</label>
                          <input type="text" id="fullname" class="form-control" name="name" required />

                          <label for="email">Email * :</label>
                          <input type="email" id="email" class="form-control" name="email" data-parsley-trigger="change" required />
                          <form id="demo-form" data-parsley-validate>
                          <label for="mobile">Mobile * :</label>
                          <input type="text" id="mobile" class="form-control" name="mobile" required />
                          <label>Gender *:</label>
                          <p>
                            Male:
                            <input type="radio" class="flat" name="gender"  value="Male" checked="" required />
                            Female:
                            <input type="radio" class="flat" name="gender"  value="Female" />
                          </p>
                             <label for="address">Address :</label>
                              <textarea name="address" required class="form-control" name="message" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                                data-parsley-validation-threshold="10"></textarea>
                              <br/>
                            <p>
                              <label for="state">State:</label>
                              <select name="state" class="form-control" required>
                                <option value="">Choose state..</option>
                                <option value="Gujarat">Gujarat</option>
                                <option value="Maharastra">Maharastra</option>
                                <option value="Haryana">Haryana</option>
                              </select>
                              <label for="department">Department:</label>
                              <select name="department" class="form-control" required>
                                <option value="">Choose Department..</option>
                                <?php
                                  while ($result_dept=mysqli_fetch_assoc($sql_dept)) {?>

                                     <option value="<?php echo $result_dept['dept_id']; ?>"><?php echo $result_dept['dept_name'];?> </option>;
                                    <?php
                                 }
                                ?>

                              </select>

                              <label for="designation">Designation:</label>
                              <select name="designation" class="form-control" required>
                                <option value="">Choose Designation..</option>
                                  <?php
                                  while ($result_desig=mysqli_fetch_assoc($sql_desig)) {?>
                                     <option value="<?php echo $result_desig['desig_id'];?>" > <?php echo $result_desig['desig_name'];?> </option>";
                                    <?php
                                 }
                                 ?>
                              </select>
                            </p>

                              <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <input type="submit" name="submit" value="submit" class="btn btn-success">
                                    </div>
                              </div>


                        </form>
                        <!-- end form for validations -->

                      </div>
                    </div>


                  </div>





                </div>







          </div>
        </div>
<?php include('footer.php'); ?>
