<?php
include_once('connect.php');
include_once('fpdf/fpdf.php');
session_start();
$meeting_code=$_SESSION['meeting_code'];

$sql = mysqli_query($conn, "SELECT * FROM meeting where meeting_code='$meeting_code'") or die("error in meeting data");
#$user_id_result=mysqli_query($conn,"SELECT user_id from attendance where meeting_code='$meeting_code'");
$meeting_result=mysqli_fetch_assoc($sql);
$result_user=mysqli_query($conn,"select user_id from attendance where meeting_code='$meeting_code'");
$temp=array("Meeting code"=>$meeting_result['meeting_code'],
"Title"=>$meeting_result['title'],
"Description"=>$meeting_result['description'],
"Date"=>$meeting_result['date'],
"Time"=>$meeting_result['time'],
"Status"=>$meeting_result['status']);

$pdf = new FPDF('P','mm',array(300,375));
//header
$pdf->AddPage();
//foter page

$pdf->SetFont('Arial','B',16);



$pdf->Cell(0,10,"Meeting report",0,1,'C');
$pdf->Ln();
$pdf->Cell(0,10,"Details",1,1,'C');
$pdf->Ln();
foreach ($temp as $key => $value) {
$pdf->Cell(50,10,$key,1,0,'C');
$pdf->Cell(100,10,$value,1,1,'C');
}
$pdf->Ln();

$pdf->Cell(0,10,"Keypoints",0,1,'C');
$pdf->Cell(0,80,$meeting_result['keypoint'],1,1);
$pdf->Cell(0,10,"",0,1,'C');
$pdf->Cell(0,10,"",0,1,'C');

$pdf->Cell(0,10,"Conclusion",0,1,'C');
$pdf->Cell(0,80,$meeting_result['conclusion'],1,1);
$pdf->AddPage();

$pdf->Cell(0,10,"Attendance Detail",1,1,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',12);
$pdf->Cell(20,10,"User ID",1,0,'C');
$pdf->Cell(60,10,"Name",1,0,'C');
$pdf->Cell(35,10,"Department",1,0,'C');
$pdf->Cell(35,10,"Designation",1,0,'C');
$pdf->Cell(55,10,"Email",1,0,'C');
$pdf->Cell(40,10,"Mobile",1,0,'C');
$pdf->Cell(35,10,"Attendance",1,1,'C');


  $pdf->SetFont('Arial','I',10);
while($row_user=mysqli_fetch_assoc($result_user)){
  $user_id=$row_user['user_id'];
  $sql1=mysqli_query($conn,"SELECT * FROM directory d JOIN designation desig ON d.desig_id = desig.desig_id JOIN department dept ON dept.dept_id = desig.desig_id where user_id='$user_id'");
  $result1=mysqli_fetch_assoc($sql1);
  $status=mysqli_query($conn,"select status from attendance where user_id='$user_id' and meeting_code='$meeting_code'");
  $res_status=mysqli_fetch_assoc($status);
  if($res_status['status']=="present")
      {
        $pdf->SetFillColor(0, 255, 0);

      }
    else{
      $pdf->SetFillColor(255, 0, 0);

    }

  $pdf->Cell(20,10,$result1['user_id'],1,0,'C',true);
  $pdf->Cell(60,10,$result1['name'],1,0,'C',true);
  $pdf->Cell(35,10,$result1['dept_name'],1,0,'C',true);
  $pdf->Cell(35,10,$result1['desig_name'],1,0,'C',true);
  $pdf->Cell(55,10,$result1['email'],1,0,'C',true);
  $pdf->Cell(40,10,$result1['mobile'],1,0,'C',true);



  $pdf->Cell(35,10,$res_status['status'],1,1,'C',true);

}

/*(foreach($header as $heading) {
$pdf->Cell(40,12,$display_heading[$heading['Field']],1);
}
foreach($result as $row) {
$pdf->Ln();
foreach($row as $column)
$pdf->Cell(40,12,$column,1);
}*/
$pdf->Output();
?>
