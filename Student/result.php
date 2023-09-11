<?php
error_reporting(1);
include('topbar.php');

if(empty($_SESSION['login_admissionID']))
    {   
    header("Location: ../index.php"); 
    }
    else{
	}
	
$admissionID = $_SESSION["login_admissionID"];
$session = $_SESSION["session"];
$semester = $_SESSION["semester"];

//select student details
$sql = "select * from tblstudent where admissionID='$admissionID'"; 
$result = $conn->query($sql);
$rowaccess = mysqli_fetch_array($result);

//select result details
$sql = "select * from tblresult where admissionID='$admissionID' and semester='$semester' and school_session='$session'"; 
$result = $conn->query($sql);
$row_result = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Result| <?php echo $website_name;   ?></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <!-- Toastr style -->
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="../<?php echo $favicon; ?>">
    <style>
table, th, td {
  border:2px solid black;
}
.style3 {
	font-size: 36px;
	color: #000000;
}
    .style4 {color: #000000}
.style6 {font-size: 24px}
    </style>
</head>

<body>

            <div class="wrapper wrapper-content  animated fadeInRight article">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <div class="ibox">
                        <div class="ibox-content">
                          <div class="text-center article-title">
                            <h2 align="left" class="style3">
                            <img src="../images/logo.jpeg" alt="foundation logo" width="99" height="96"><span class="style6">            <?php echo $website_name;   ?>,<?php echo $address;   ?> </span> </h2>
                            <h2><img src="../home/<?php echo $rowaccess['photo'];  ?>" width="98" height="99"></h2>
                          </div>
                          <h1><p align="center" class="style3" >STUDENT RESULT </p>  
                          </h1>
                          <p class="style4"> <strong>FULLAME:</strong>  <?php echo $rowaccess['fullname']; ?> </p>
                          <p class="style4"> <strong>MATRIC NO:</strong>  <?php echo $admissionID; ?> </p>

                            <p class="style4"> <strong>SESSION: </strong> <?php echo $_SESSION['session']; ?></p>
                            <p class="style4"><strong>SEMESTER:</strong>  <?php echo $_SESSION['semester']; ?></p>
                            <p class="style4"><strong>DEPARTMENT :</strong> COMPUTER SCIENCE</p>
                            <table style="width:100%">
  <tr>
    <td><div align="center" class="style4"><strong>Course</strong></div></td>
    <td><div align="center" class="style4"><strong>Score</strong></div></td>
    <td><div align="center" class="style4"><strong>Grade</strong></div></td>
    <td><div align="center" class="style4"><strong>Credit Hour</strong></div></td>
  </tr>
  <tr>
    <td height="39"><div align="center"><?php echo $row_result['course1'] ;?></div></td>
    <td><div align="center"><?php echo $row_result['total1'] ;?></div></td>
    <td><div align="center"><?php echo $row_result['grade1'] ;?></div></td>
    <td><div align="center"><?php echo $row_result['gradeunit1'] ;?></div></td>
  </tr>
  <tr>
  <td height="39"><div align="center"><?php echo $row_result['course2'] ;?></div></td>
    <td><div align="center"><?php echo $row_result['total2'] ;?></div></td>
    <td><div align="center"><?php echo $row_result['grade2'] ;?></div></td>
    <td><div align="center"><?php echo $row_result['gradeunit2'] ;?></div></td>
  </tr>
  <tr>
  <td height="39"><div align="center"><?php echo $row_result['course3'] ;?></div></td>
    <td><div align="center"><?php echo $row_result['total3'] ;?></div></td>
    <td><div align="center"><?php echo $row_result['grade3'] ;?></div></td>
    <td><div align="center"><?php echo $row_result['gradeunit3'] ;?></div></td>
  </tr>
  <tr>
  <td height="39"><div align="center"><?php echo $row_result['course4'] ;?></div></td>
    <td><div align="center"><?php echo $row_result['total4'] ;?></div></td>
    <td><div align="center"><?php echo $row_result['grade4'] ;?></div></td>
    <td><div align="center"><?php echo $row_result['gradeunit4'] ;?></div></td>
  </tr>
  <tr>
  <td height="39"><div align="center"><?php echo $row_result['course5'] ;?></div></td>
    <td><div align="center"><?php echo $row_result['total5'] ;?></div></td>
    <td><div align="center"><?php echo $row_result['grade5'] ;?></div></td>
    <td><div align="center"><?php echo $row_result['gradeunit5'] ;?></div></td>
  </tr>
  <tr>
  <td height="39"><div align="center"><?php echo $row_result['course6'] ;?></div></td>
    <td><div align="center"><?php echo $row_result['total6'] ;?></div></td>
    <td><div align="center"><?php echo $row_result['grade6'] ;?></div></td>
    <td><div align="center"><?php echo $row_result['gradeunit6'] ;?></div></td>
  </tr>
  <tr>
  <td height="39"><div align="center"><?php echo $row_result['course7'] ;?></div></td>
    <td><div align="center"><?php echo $row_result['total7'] ;?></div></td>
    <td><div align="center"><?php echo $row_result['grade7'] ;?></div></td>
    <td><div align="center"><?php echo $row_result['gradeunit7'] ;?></div></td>
  </tr>
  

  <tr>
  <td height="9"></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
  <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>


                            <p class="style4"><strong>TOTAL POINT:</strong> <?php echo $row_result['totalpoint']; ?>  | <strong>TOTAL HOUR:</strong> <?php echo $row_result['totalhour']; ?> | <strong>GPA :</strong> <?php echo $row_result['gpa']; ?> </p>
                            <div class="row">
                              <div align="center"><a href="#" id="print-button" onClick="window.print();return false;">Print this page</a> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
       

        </div>
        </div>



    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

</body>

</html>
