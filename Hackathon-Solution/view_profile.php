<?php
include('header.php');
include('connect.php')
?>


<!-- For updating data -->

<?php
//session_start();
    $inError='';
    $success=false;
    if(isset($_POST['full_name'])){
        $full_name=$_POST['full_name'];
        $email=$_POST['email'];
        $mobile=$_POST['mobile'];
        $state=$_POST['state'];
        $address=$_POST['address'];
        $id=$_GET['id'];
        if(strlen($full_name)<3){
            $inError="Invalid Length.";
        }
        elseif(is_null($email)){
            $inError="Invalid Email.";
        }
        // elseif(email_ex($email)){
        //     $inError="Email Already Exists.";
        // }
        else{
            // update_user($username,$email,$fname,$lname);
            // update_data($username);
            $query=mysqli_query($conn,"UPDATE directory SET email='$email',name='$full_name', mobile='$mobile',state='$state',address='$address' where user_id='$id'");

            $success=true;
        }
    }
    else{
        echo "form not submitted";
    }
?>

<?php
	              					if($_GET['id']){
	              						$usr=$_GET['id'];
	              						$sql="select * from directory where user_id=$usr";
	              						$result=mysqli_query($conn,$sql) or die("error in fetch");
	              						$row=mysqli_fetch_assoc($result);
	              					}
	              				?>
<div class="right_col" role="main">
    <div class="">
	    <div class="page-title">
            <div class="title_left">
                <h2>Personal Information</h2>
             </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
          	<div class="col-md-12 col-sm-12 col-xs-12">
	            <div class="x_panel">


	              			<div class="row">
	              			<div class="col-md-4 col-sm-4 col-xs-4">
	              			<img src="files/<?php if(isset($row['profile_pic']))echo $row['profile_pic'];?>" alt="User Profile Pic" class="img-responsive" >
	              			</div>
	              			<div class="col-md-8 col-sm-8 col-xs-8">
	              			<div class="clearfix"></div>

	              			<div>
	              				<form action="view_profile.php?id=<?php echo $_GET['id'];?>" method="POST" id="form1" name="form1">
	              				<table cellspacing="30" style="width:80%; font-size: 200%;" align="center">
	              					<tr>
	              						<td><strong>Name:</strong></td>
	              						<td>
		              						<div class="form-group">

											  <input type="text" name='full_name' class="form-control input-lg" id="disable" disabled value="<?php echo $row['name'] ?>">
											</div>
										</td>
	              					</tr>
	              					<tr>
	              						<td><strong>Email:</strong></td>
	              						<td>
		              						<div class="form-group">

											  <input type="email" name='email' class="form-control input-lg" id="disable" disabled value="<?php echo $row['email'] ?>">
											</div>
										</td>
	              					</tr>
	              					<tr>
	              						<td><strong>Mobile No.:</strong></td>
	              						<td>
		              						<div class="form-group">

											  <input type="number" name='mobile' class="form-control input-lg" id="disable" disabled value="<?php echo $row['mobile'] ?>">
											</div>
										</td>
	              					</tr>
	              					<tr>
	              						<td><strong>Gender:</strong></td>
	              						<td>
	              							<div class="form-group">

											  <input type="text" name='gender' class="form-control input-lg" id="disable" disabled value="<?php echo $row['gender'] ?>">
											</div>
	              						</td>
	              					</tr>
	              					<tr>
	              						<td><strong>State:</strong></td>
	              						<td>
	              							<div class="form-group">

											  <input type="text" name='state' class="form-control input-lg" id="disable" disabled value="<?php echo $row['state'] ?>">
											</div>
	              						</td>
	              					</tr>
	              					<tr>
	              						<td><strong>Address:</strong></td>
	              						<td>
	              							<div class="form-group">

											  <textarea class="form-control" name='address' rows="5" id="disable" disabled ><?php echo $row['address'] ?></textarea>
											</div>
										</td>
	              					</tr>
	              					<tr>
	              						<td><center><a role="button" id="edit-btn" name="edit-btn" onclick="convert_into_save()"  class="btn btn-primary btn-lg">Edit</a></center></td>
	              						<td><center><a role="button" href="view_directory.php"  class="btn btn-warning btn-lg">Go Back</a></center></td>


	              					</tr>
	              				</table>
	              				</form>
	              			</div>
	              		</div>


	      		</div>
        	</div>
    	</div>
    </div>
</div>

<script type="text/javascript">
	function convert_into_save() {
		var x=document.getElementsByTagName("INPUT");
                        for(var i=0;i<x.length;i++){
                            if(x[i].hasAttribute('disabled')){
                                x[i].removeAttribute('disabled');
                               // x[i].setAttribute("required","");
                            }
                        }
                        var address=document.getElementsByTagName("TEXTAREA");
                        if(address[0].hasAttribute('disabled')){
                                address[0].removeAttribute('disabled');
                            }
                        var y=document.getElementById('edit-btn');
                        y.setAttribute('name','save-btn');
                        y.setAttribute('onclick','save()');
                        y.setAttribute('id','savebtn');
                        //y.removeAttribute('type')
                        //y.setAttribute('type','submit');
                        y.innerHTML="Save";

	}
	function save(){
                        var pass=true;
                        var full_name=document.form1.full_name.value;
                        var mobile=document.form1.mobile.value;
                        var state=document.form1.state.value;
                        var email=document.form1.email.value;
                        var address=document.form1.address.value;
                        email=validateEmail(email);
                        if(full_name==null || mobile.length!=10 || state==null || address==null || full_name.length<3 || email==null || email==false){
                            alert("invalid input");
                            pass=false;

                        }
                        if(pass)
                        document.getElementById('form1').submit();
                    }
                   function validateEmail(email) {
                        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                        return re.test(email);
                    }
</script>
<?php include('footer.php');?>
