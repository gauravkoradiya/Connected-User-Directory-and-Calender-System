<?php
	include('connect.php');
	include('header.php');
?>

<div class="right_col" role="main">
        <div class="clearfix"></div>
        	<div class="row">
          	<div class="col-md-12 col-sm-12 col-xs-12">
	            <div class="x_panel">
								<form method="POST" class="form-group row" action="meeting_report.php">
							  	<div class="col-xs-3">
												<h3>Enter Meeting Id:</h3>
											    <input class="form-control" name="meeting_attendance_code" type="text">
											  </div>
							<div>
							<input type="submit" class="btn btn-primary btn-md" name="submit" value="Get Details">
							</div>

						</form>
						<br>
						<br>


	              			</div>
	              		</div>


	      		</div>

    	</div>
    </div>
</div>
<?php
include('footer.php');
?>
