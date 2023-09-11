<?php
error_reporting(1);
include('topbar.php');

if(isset($_POST['btnlogin']))
{
if($_POST['txtteacherID'] != "" || $_POST['txtpassword'] != ""){

$teacherID = $_POST['txtteacherID'];
$password = $_POST['txtpassword'];
$status = 1;

$sql = "SELECT * FROM `tblteacher` WHERE `teacherID`=? AND `password`=? AND `status`=?";
			$query = $dbh->prepare($sql);
			$query->execute(array($teacherID,$password,$status));
			$row = $query->rowCount();
			$fetch = $query->fetch();
			if($row > 0) {
			
		$_SESSION['login_teacherID'] = $fetch['teacherID'];
		$_SESSION['login_ID'] = $fetch['ID'];

header("Location: ../Teacher/index.php");

} else{
//error='Invalid Email/Password';
$message = ' <div class="alert alert-danger">Invalid Teacher ID/Password</div> ';

}
}else{
///$error='Must Fill-in All Fields ';
$message = ' <div class="alert alert-danger"> Must Fill-in All Fields  </div> ';
}
}


?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from brandio.io/envato/iofrm/html/login15.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 08 May 2022 19:01:51 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Teacher login Form|<?php echo $website_name ;?></title>
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
                    <div class="form-items"><h4 ><?php echo $message; ?></h4>
                      <p align="center" ><a href="index.php"><span class="logos"><img class="logo-size" src="<?php echo $logo; ?>" alt="" height="110" width="290"></span></a></p>
                      <h3><?php echo $website_name ;?> - Teacher Login Form</h3>
                        <p>&nbsp;</p>
                        <p> </p>
                        <div class="page-links">
                            <a href="index.php" >Student Login</a><a href="register.php">Student Registration</a><a href="teacher.php" class="active">Teacher </a><a href="admin.php" >Admin </a>
                        </div>
                       		             <form  action="" method="POST"  class="registration-form">
                            <input class="form-control" type="text" name="txtteacherID" placeholder="Teacher ID" required>
                            <input class="form-control" type="password" name="txtpassword" placeholder="Password" required>
                            <div class="form-button">
                                <button id="submit" name="btnlogin" type="submit" class="ibtn">Login</button> <a href="#">Forgot password?</a>
                            </div>
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