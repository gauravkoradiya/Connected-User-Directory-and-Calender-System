<?php
include('header.php');
include('connect.php')
?>
        <div class="right_col" role="main">
        <h2>View Department</h2>
          <div class="">
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>o</th>
                          <th>Department Name</th>
                        </tr>
                      </thead>
                      <?php
                        $sql=mysqli_query($conn,"select * from department");
                        $count=1;
                        while($row=mysqli_fetch_assoc($sql))
                        {
                      ?>
                      <tbody>
                        <tr>
                          <th scope="row"><?php echo $count ?></th>
                          <td><?php echo $row['dept_name']?></td>
                        </tr>
                        <?php
                        $count=$count+1;
                        }
                         ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
<?php include('footer.php');?>
