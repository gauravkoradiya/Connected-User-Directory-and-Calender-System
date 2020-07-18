 <?php
        include('header.php');

        $sql="SELECT * FROM meeting  WHERE status='Upcoming' ORDER BY `date` ASC";
        $run=mysqli_query($conn,$sql);
        $result=mysqli_fetch_assoc($run);



        $sql1="SELECT * FROM meeting WHERE status='Completed' ORDER BY `date` DESC";
        $run1= mysqli_query($conn,$sql1);
        $result1=mysqli_fetch_assoc($run1);

        ?>
        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row tile_count">

            <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top" style="font-size:20px!important;"><i class="	glyphicon glyphicon-calendar "></i> Next Meeting Date</span>
              <div class="count green"><?php echo $result['date']; ?></div>

            </div>
            <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top" style="font-size:20px!important;"><i class="fa fa-clock-o"></i> Meeting time</span>
              <div class="count green"><?php   echo $result['time'];?></div>

            </div>
            <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"  style="font-size:20px!important;"><i class="	glyphicon glyphicon-home"></i> Meeting venue</span>
              <div class="count green"><?php echo $result['venue'];?></div>

            </div>



          </div>
          <!-- /top tiles -->


          <br />




          <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Upcoming Event</h2>
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
                  <div class="dashboard-widget-content">

                    <ul class="list-unstyled timeline widget">
                      <?php
                      while($row=mysqli_fetch_assoc($run)){
                      ?>
                      <li>
                        <div class="block">
                          <div class="block_content">
                            <h2 class="title">
                                              <?php echo $row['title'];?>
                                          </h2>
                            <div class="byline">
                              <b>Date:<?php echo $row['date'];?><br>Time: <?php echo $row['time'];?> <br>Venue: <?php echo $row['venue'];?>
                            </div>
                            <p class="excerpt">Description : <?php echo $row['description'];?>
                            </p>
                          </div>
                        </div>
                      </li>
                    <?php } ?>
                    </ul>
                  </div>
                </div>
              </div>
            </div>





            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Recently Completed Event</h2>
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
                  <div class="dashboard-widget-content">

                    <ul class="list-unstyled timeline widget">
                      <?php
                      while($row=mysqli_fetch_assoc($run1)){
                      ?>
                      <li>
                        <div class="block">
                          <div class="block_content">
                            <h2 class="title">
                                              <?php echo $row['title'];?>
                                          </h2>
                            <div class="byline">
                              <b>Date:<?php echo $row['date'];?><br>Time: <?php echo $row['time'];?> <br>Venue: <?php echo $row['venue'];?>
                            </div>
                            <p class="excerpt">Description : <?php echo $row['description'];?>
                            </p>
                          </div>
                        </div>
                      </li>
                    <?php } ?>
                    </ul>
                  </div>
                </div>
              </div>
            </div>


          </div>
        </div>

        <?php include('footer.php') ?>
