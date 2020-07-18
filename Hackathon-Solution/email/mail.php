<?php


include('../db.php');
require 'PHPMailerAutoload.php';

	
if(isset($_POST['email']))
{
		$email=$_POST['email'];
	
		 $query="select * from admin where admin_email='$email'";
		    $result=mysqli_query($sql,$query);
		    $num=mysqli_num_rows($result);

		    if($num==1)
		    {
		       
		    	
				$mail = new PHPMailer;
				$mail->isSMTP();                                      // Set mailer to use SMTP
				// $mail -> SMTPDebug = 2;
				// $mail->Debugoutput = 'html';
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
				$mail->addAddress($email);  // Add a recipient
				// $mail->addCC('');
				//$mail->addBCC('');
				$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
				//$mail->addAttachment('/usr/labnol/file.doc');         // Add attachments
				//$mail->addAttachment('/images/image.jpg', 'new.jpg'); // Optional name
				$mail->isHTML(true);                                  // Set email format to HTML
				$code=rand(1000,9999);
				$mail->Subject = "ShreeHari Verification";
				$mail->Body    = "Your OTP is  ".$code;
				
					if(!$mail->send())
					 {
					 
					   die($mail->ErrorInfo);
					
					 }
					
					$_SESSION['code']=$code;
					
					

		}
		else
		{
		 	echo "false";
		}
		
	}
	





?>