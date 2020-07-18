<?php
session_start();
if(isset($_POST['code']))
{
$array=array();
if($_POST['code']==$_SESSION['code'])
{
	$array=array("result"=>"true");
}
else
{
	$array=array("result"=>"false");
}
echo json_encode($array);

}

?>