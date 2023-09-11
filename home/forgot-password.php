<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// If necessary, modify the path in the require statement below to refer to the
// location of your Composer autoload.php file.
require 'Admin/vendor/autoload.php';
include('topbar.php');

if(isset($_POST['btn_forgot']))
{
$otp = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 8)), 0, 8);

$text_email=$_POST['txtemail'];

$sql = "SELECT * FROM tblclient where email ='".$text_email."' " ;
$ans = $conn->query($sql);
$res=mysqli_fetch_array($ans);
   $realemail=$res['email'];
  $firstname=$res['firstname'];  
  

if($text_email != $realemail){ 
$message = ' <div class="alert alert-danger">Problem Retrieving Password  </div> ';

}else{
$sql2 = "UPDATE users SET password ='$otp' WHERE email='$text_email'";
$ans1 = $conn->query($sql2);

 $message = ' <div class="alert alert-success">Password Retrieved Successfully . Check Your Mail </div> ';


 //send New Password  via email 

$sender = $row_website['email'];
$senderName ='Flexihomes';

// Replace recipient@example.com with a "To" address. If your account
// is still in the sandbox, this address must be verified.
$recipient =$text_email;

// Replace smtp_username with your Amazon SES SMTP user name.
$usernameSmtp = 'AKIATFM4MKDDICP36FNM';

// Replace smtp_password with your Amazon SES SMTP password.
$passwordSmtp = 'BPj3Kl2K3RsDfPpmLPkMHgGmhTpmCvuItHTd0IkSGlZb';

$host = 'email-smtp.eu-west-2.amazonaws.com';
$port = 465;

// The subject line of the email
$subject ='Forgot Password';


$bodyHtml = "
				<html>
				<head>
				<title>Forgot Password | $website_name</title>
				</head>
				<!-- Complete Email template -->

<body style='background-color:grey'>

 				 <img height='55' src=\"https://www.app.integax.com/assets/img/banner2.png\" width='333'>


	<table align='center' border='0' cellpadding='0' cellspacing='0'
		width='777' bgcolor='white' style='border:2px solid black'>
		<tbody>
			<tr>
				<td align='center'>
					<table align='center' border='0' cellpadding='0'
						cellspacing='0' class='col-777' width='777'>
						<tbody>
							<tr>
								<td align='center' style='background-color: #243685;
										height: 50px;'>

									<a href='#' style='text-decoration: none;'>
										<p style='color:white;
												font-weight:bold;'>
								Forgot Password | $website_name
										</p>
									</a>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			
			<tr style='display: inline-block;'>
				<td style='height: 150px;
						padding: 20px;
						border: none;
						border-bottom: 2px solid #361B0E;
						background-color: white;'>
					
					<p class='data'
					style='text-align: justify-all;
							align-items: center;
							font-size: 15px;
							padding-bottom: 12px;'>

						<p><strong>Hi $firstname ,</strong></p>
						
						<p>You recently requested to reset your password for your [".$row_website['website_name']."] account.</p>
						
						
                            <p>Your Password Has been recovered Successfully. </p>
							<p><strong> Password : </strong>".$otp." </p>
                                           
										   
							<p>If you did not request a password reset, please ignore this email or contact support if you have questions.</p>			   
										   
										   
										          
						   <p>Regards,</p>                 
						 <p>".$row_website['website_name']." Team</p> 


					</p>
				
				</td>
			</tr>
			<tr style='border: none;
			background-color: #243685;
			height: 40px;
			color:white;
			padding-bottom: 20px;
			text-align: center;'>
				
<td height='40px' align='center'>
	<p style='color:white;
	line-height: 1.5em;'>

	</p>
	<a href='https://www.instagram.com/integax_nigeria/'
	style='border:none;
		text-decoration: none;
		padding: 5px;'>
			
	<img height='30'
	src=
'https://www.app.integax.com/assets/img/instagram.png'
	width='30' />
	</a>
	
	<a href='https://twitter.com/Integaxnigeria'
	style='border:none;
		text-decoration: none;
		padding: 5px;'>
			
	<img height='30'
	src=
'https://extraaedgeresources.blob.core.windows.net/demo/salesdemo/EmailAttachments/icon-twitter_20190610074030.png'
	width='30' />
	</a>
	
	
	<a href='https://www.linkedin.com/company/integax/'
	style='border:none;
	text-decoration: none;
	padding: 5px;'>
	
	<img height='30'
	src=
'https://extraaedgeresources.blob.core.windows.net/demo/salesdemo/EmailAttachments/icon-linkedin_20190610074015.png'
width='30' />
	</a>
	
	<a href='https://web.facebook.com/Integax/'
	style='border:none;
	text-decoration: none;
	padding: 5px;'>
	
	<img height='20'
	src=
'https://extraaedgeresources.blob.core.windows.net/demo/salesdemo/EmailAttachments/facebook-letter-logo_20190610100050.png'
		width='24'
		style='position: relative;
			padding-bottom: 5px;' />
	</a>
</td>
</tr>
<tr>
<td style='font-family:'Open Sans', Arial, sans-serif;
		font-size:11px; line-height:18px;
		color:#999999;'
	valign='top'
	align='center'>
	Copyright &copy; $date | Integax Resource Limited | All Rights Reserved<br>
				
			</td>
			</tr>
			</tbody></table></td>
		</tr>
		<tr>
		<td class='em_hide'
		style='line-height:1px;
				min-width:700px;
				background-color:#ffffff;'>
			<img alt='' src='images/spacer.gif'
			style='max-height:1px;
			min-height:1px;
			display:block;
			width:700px;
			min-width:700px;'
			width='700'
			border='0'
			height='1'>
			</td>
		</tr>
		</tbody>
	</table>
</body>

				</html>
				";

$mail = new PHPMailer(true);

    // Specify the SMTP settings.
    $mail->isSMTP();
    $mail->setFrom($sender, $senderName);
    $mail->Username   = $usernameSmtp;
    $mail->Password   = $passwordSmtp;
    $mail->Host       = $host;
    $mail->Port       = $port;
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = 'ssl';

    // Specify the message recipients.
    $mail->addAddress($recipient);
    // You can also add CC, BCC, and additional To recipients here.
        $mail->addReplyTo($recipient);

    // Specify the content of the message.
    $mail->isHTML(true);
    $mail->Subject    = $subject;
    $mail->Body       = $bodyHtml;
  //  $mail->AltBody    = $bodyText;
	//$mail->AddEmbeddedImage('../assets/img/banner2.png', 'Banner');
	        $mail->send();

//save activity log details
$task= $firstname.' '.'Recovered his Password'.' '. 'On' . ' '.$current_date;
$sql = 'INSERT INTO activity_log(task) VALUES(:task)';
$statement = $dbh->prepare($sql);
$statement->execute([
	':task' => $task
]);

}
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from brandio.io/envato/iofrm/html/login15.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 08 May 2022 19:01:51 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Forgot Password|<?php echo $website_name ;?></title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-theme15.css">
	  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $favicon; ?>">

</head>
<body>
    <div class="form-body">
        <div class="website-logo">
            <a href="index.php">
                <div class="logos"></div>
          </a>
      </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <h3>&nbsp;</h3>
              </div>
            </div>
           <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                      <p align="center" ><a href="index.php"><span class="logos"><img class="logo-size" src="<?php echo $logo; ?>" alt="" height="110" width="360"></span></a></p>
                      <h3><?php echo $website_name ;?> - Forgot Password</h3>
                        <p>&nbsp;</p>
                        <p><h4 ><?php echo $message; ?></h4> </p>
                        
                       		             <form  action="" method="POST"  class="registration-form">
                            <input class="form-control" type="text" name="txtemail" placeholder="E-mail Address" required>
                            <div class="form-button">
                                <button id="submit" name="btn_forgot" type="submit" class="ibtn">Request New Password</button>
                            </div>
							<div class="form-button">
                              <a href="index.php">Back</a></div>
                        </form>
                        
                    </div>
                </div>
          </div>
        </div>
    </div>
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>

<!-- Mirrored from brandio.io/envato/iofrm/html/login15.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 08 May 2022 19:01:53 GMT -->
</html>