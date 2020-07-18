
<?php
include('header.php');
include('connect.php');
if(isset($_POST['next']))
{
  $meeting_date=$_POST['meeting_date'];
  $meeting_start_time=$_POST['meeting_start_time'];
}
?>
<div class="right_col" role="main">
	<h2>Meeting Details:</h2>
          <div class="">
			<div class="clearfix"></div>
                <div class="row">
                  <div class="col-md-6 col-xs-12">
                    <div class="x_content">
                                            <form id="demo-form"  method="POST" action="select_member.php">
                                            <label for="meet_date_and_time">Meeting Date*:</label>

                                                <input type='date' class="form-control" name="meeting_date" />
																								<label for="meet_date_and_time">Meeting Time*:</label>
                                                <input type='time' class="form-control" name="meeting_start_time" />

																								<label for="Meeting Title">Meeting Title*:</label>
                                              <input type="text" id="meet_title" class="form-control" name="meeting_title" required />

                                              <label for="Meeting Description">Meeting Description :</label>
                                                  <textarea id="meet_description" required class="form-control" name="meeting_description" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                                                    data-parsley-validation-threshold="10"></textarea>
                                               <label for="Keypoints">Keypoints :</label>
                                                  <textarea id="meet_keypoints" required class="form-control" name="meeting_keypoints" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                                                    data-parsley-validation-threshold="10"></textarea>

                                </div>
                    <div class="well" style="overflow: auto">
                                          <div class="col-md-5">
                                            <h2>Venue</h2>

                                              <fieldset>
                                                <label for="place">Place * :</label>
                                              <input type="text" id="place" class="form-control" name="place" required />
                                              <label for="city">City:</label>
                                                  <select id="city" class="form-control" name="city" required>
                                                      <option value="">Choose City..</option>
                                                      <option value="Surat">Surat</option>
                                                      <option value="Banglore">Banglore</option>
                                                      <option value="kashmire">kashmire</option>
                                                      <option value="ahmedabad">ahmedabad</option>

                                                  </select>
                                                  <label for="state">State:</label>
                                                  <select id="state" class="form-control" name="state" required>
                                                    <option value="">Choose State..</option>
                                                    <option value="gujarat">Gujarat</option>
                                                    <option value="maharashtra">Maharashtra</option>
                                                    <option value="haryana">Haryana</option>

                                                  </select>
                                                  <div class="form-group">
                                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">

                                                  <input type="submit" value="Invite" name="Invite" class="btn btn-success"></div>
                                              </div>
                                              </fieldset>
                                            </form>
                                          </div>
                                        </div>
                 </div>
                </div>
          </div>
</div>
<?php include('footer.php');?>
