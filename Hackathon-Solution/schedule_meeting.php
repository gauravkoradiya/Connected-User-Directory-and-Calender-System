<?php
include('header.php');
include('connect.php');
?>
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12">
                    <div class="x_panel" style="">
                        <div class="x_title">
                            <h2>Schedule Meeting</h2>
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

                            <div class="container">
                                <div class="row">

                                    <form method="post" action="add_meeting.php">

                                    <div class='col-sm-4'>
                                        Meeting Date
                                        <div class="form-group">
                                            <div class='input-group date' >
                                                <input type='date' class="form-control" name="meeting_date" />

                                            </div>
                                        </div>
                                    </div>

                                     <div class='col-sm-4'>
                                        Meeting Start Time
                                        <div class="form-group">
                                            <div class='input-group date' >
                                                <input type='time' class="form-control" name="meeting_start_time" />

                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                                  <input type="submit" value="Schedule" name="next" class="btn btn-success" value="Next">
                                                </div>
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

        <?php include('footer.php');?>
