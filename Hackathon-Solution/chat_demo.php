<?php
include('connect.php');

$id=$_GET['id'];
$result=mysqli_query($conn,"select d.*,c.* from directory d,chat c where meeting_id='$id' and c.from_id=d.user_id")  or die("can not query");

while($row=mysqli_fetch_assoc($result))
{
  ?>
  <div class="panel" style="border-radius:5px; padding:2px; background-color:lightgray;font-size:15px; margin:5px;">
    <?php echo "<b>".$row['name']."</b>:      ".$row['message']."<br/>";  ?>
  </div>
<?php
}
?>
