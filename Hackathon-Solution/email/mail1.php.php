<?php


 include('../connect.php');
require 'PHPMailerAutoload.php';

if(isset($_POST['submit']))
{
		$send=$_POST['send'];
		$code=$_POST['meeting_code'];

		 echo $query="select * from  directory where user_id in($send)";
		    $result=mysqli_query($conn,$query);

		    echo $query1="select * from meeting where meeting_code=$code";
		    $result1=mysqli_query($conn,$query1);
		    $row1=mysqli_fetch_assoc($result1);





				$mail = new PHPMailer;
				$mail->isSMTP();                                      // Set mailer to use SMTP

				$mail->Host = 'smtp.gmail.com';//mail.manavfashion.com';                       // Specify main and backup server
				$mail->SMTPAuth = true;                               // Enable SMTP authentication
				$mail->Username = 'manishvvasaniya@gmail.com'; //customer@manavfashion.com';                   // SMTP username
				$mail->Password = 'M8264947572@Manish';//uM,4kzIS*Mzg';               // SMTP password
				$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
				$mail->Port = 587;                                //Set the SMTP port number - 587 for authenticated TLS
				$mail->SMTPOptions = array(
			    'ssl' => array(
			        'verify_peer' => false,
			        'verify_peer_name' => false,
			        'allow_self_signed' => true
			    )
			);
				$mail->setFrom('manishvvasaniya@gmail.com');     //Set who the message is to be sent from
				$mail->addReplyTo('manishvvasaniya@gmail.com');  //Set an alternative reply-to address
				while($row=mysqli_fetch_assoc($result))
				{
				  $mail->addAddress($row['email']);  // Add a recipient

				}
				// $mail->addCC('');
				//$mail->addBCC('');
				$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
				//$mail->addAttachment('/usr/labnol/file.doc');         // Add attachments
				//$mail->addAttachment('/images/image.jpg', 'new.jpg'); // Optional name
				$mail->isHTML(true);                                  // Set email format to HTML
				$code=rand(1000,9999);
				$mail->Subject = "Shree hari meeting";
				$mail->Body    = $row1['title']."<br>".$row1['date']."<br>".$row1['time']."<br>";

					if(!$mail->send())
					 {
					   die($mail->ErrorInfo);
					 }

					$_SESSION['code']=$code;



		}








?>
