<?php

include('topbar.php');

$message = '';
if(isset($_POST["btnsubmit"]))
{
 sleep(5);
 
$status=1;

//Generate password
function randompassword() {
    $alphabet = "abxcdefghiXZ012ABCDSEFGHY3456789";
    $refID = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 7; $i++) {
        $n = rand(0, $alphaLength);
       $refID[] = $alphabet[$n];
    }
    return implode($refID); //turn the array into a string
}
$password = randompassword();

//Generate password
function randomAdmissionNo() {
    $alphabet = "0123456789";
    $refID = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 5; $i++) {
        $n = rand(0, $alphaLength);
       $refID[] = $alphabet[$n];
    }
    return implode($refID); //turn the array into a string
}
$AdmissionNo = 'A'.randomAdmissionNo();

//$last_ip = 'Not Available';
//$last_login = 'Not Available';

	
 $query = "
 INSERT INTO tblstudent (admissionID,fullname,password, sex, phone, address,state,status,date_reg,photo) VALUES (:admissionID, :fullname, :password,:sex, :phone,:address,:state,:status,:date_reg,:photo)";
 
 $user_data = array(
  ':admissionID'  => $_POST["txtadmissionID"],
  ':fullname'   => $_POST["txtfullname"],
    ':password'   => $_POST["txtpassword"],
  ':sex'   => $_POST["cmdsex"],
  ':phone'   => $_POST["txtphone"],
   ':address'  => 'Nil',
      ':state'  => $_POST["cmdstate"],
	  ':status'  => $status,
      ':date_reg'  => $current_date,
  ':photo'  => 'uploadImage/default.jpg'
  );
  
 $statement = $dbh->prepare($query);
 if($statement->execute($user_data)) {


	
 $message = ' <div class="alert alert-success">Student Registration Was successful. </div> ';
  } else {
 
  $message = '
 <div class="alert alert-danger"> There is an error in Registration  </div> ';
 }

}

?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from brandio.io/envato/iofrm/html/login15.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 08 May 2022 19:01:51 GMT -->
<head>
      <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <title>Student Registration Form| <?php echo $website_name ;?></title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-theme2.css">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo $favicon; ?>">
    <link rel="stylesheet" type="text/css" href="css/iofrm-theme15.css">
</head>
<body>
    <div class="form-body">
        <div class="website-logo">
            <a href="index.php">
                <div class="logddo"></div>
            </a>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    
                </div>
            </div>
           <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">                        
                      <p ><a href="index.php"><span class="logos"><img class="logo-size" src="<?php echo $logo; ?>" alt="logo" height="90" width="90"></span></a></p>
                      <h3><?php echo $website_name ;?> -Student Registration Form</h3>
                        <p>&nbsp;</p>
                        <p> <h4 ><?php echo $message; ?></h4> </p>
                        <div class="page-links">
						<a href="index.php" >Student Login</a><a href="register.php" class="active">Student Registration</a><a href="admin.php">Admin </a>
                        </div>
                       		             <form  action="" method="POST"  class="registration-form">
                            <input class="form-control" type="text" name="txtfullname" placeholder="FullName" required>
                            <input class="form-control" type="password" name="txtpassword" placeholder="Password" required>

							 
<select name="cmdsex" class="form-control" id="state" >
          <option value="">Select your Sex</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          
        </select>
		<p>   </p>

		<input class="form-control" type="num" name="txtphone" placeholder="Phone Number" required>

<p>   </p>
		
		<select name="cmdstate" class="form-control" id="state" >
        <option value="Abia">Abia</option>
          <option value="Adamawa">Adamawa</option>
          <option selected value="Akwa Ibom">Akwa Ibom</option>
          <option value="Anambra">Anambra</option>
          <option value="Bauchi">Bauchi</option>
          <option value="Bayelsa">Bayelsa</option>
          <option value="Benue">Benue</option>
          <option value="Borno">Borno</option>
          <option value="Cross River">Cross River</option>
          <option value="Delta">Delta</option>
          <option value="Ebonyi">Ebonyi</option>
          <option value="Edo">Edo</option>
          <option value="Ekiti">Ekiti</option>
          <option value="Enugu">Enugu</option>
          <option value="FCT">FCT</option>
          <option value="Gombe">Gombe</option>
          <option value="Imo">Imo</option>
          <option value="Jigawa">Jigawa</option>
          <option value="Kaduna">Kaduna</option>
          <option value="Kano">Kano</option>
          <option value="Kastina">Kastina</option>
          <option value="Kebbi">Kebbi</option>
          <option value="Kogi">Kogi</option>
          <option value="Kwara">Kwara</option>
          <option value="Lagos">Lagos</option>
          <option value="Nasarawa">Nasarawa</option>
          <option value="Niger">Niger</option>
          <option value="Ogun">Ogun</option>
          <option value="Ondo">Ondo</option>
          <option value="Osun">Osun</option>
          <option value="Oyo">Oyo</option>
          <option value="Plateau">Plateau</option>
          <option value="Rivers">Rivers</option>
          <option value="Sokoto">Sokoto</option>
          <option value="Taraba">Taraba</option>
          <option value="Yobe">Yobe</option>
          <option value="Zamfara">Zamfara</option>
        </select>
		<p>   </p>
        <input class="form-control" type="text" name="txtadmissionID" placeholder="Matric No" required>

       
		<p>   </p>

                            <div class="form-button">
                                <button id="submit" name="btnsubmit" type="submit" class="ibtn">Register</button>
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