<?php
error_reporting(1);
include('topbar.php');


//publish
// Include PhpSpreadsheet library autoloader
require_once 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;



if(empty($_SESSION['login_lecturerID']))
    {
    header("Location: ../home/lecturer.php");
    }
    else{
	}

$lecturerID = $_SESSION["login_lecturerID"];

$sql = "select * from tbllecturer where lecturerID='$lecturerID'";
$result = $conn->query($sql);
$rowaccess = mysqli_fetch_array($result);

//get surrent session
$sqlsession = "SELECT * FROM school_session ORDER BY ID DESC LIMIT 1 ";
$result = mysqli_query($conn,$sqlsession);
$rowsession  = mysqli_fetch_array($result);
$currentsession=$rowsession['current_session'];



if(isset($_POST["btnpublish"]))
{


$semester = mysqli_real_escape_string($conn,$_POST['cmdsemester']);


//check if result already published
$sql = "SELECT * FROM tblresultsummary where school_session='$currentsession' and term='$semester' ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
$_SESSION['error']=' Result already Published ';

}else{



    // Allowed mime types
    $excelMimes = array('text/xls', 'text/xlsx', 'application/excel', 'application/vnd.msexcel', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

    // Validate whether selected file is a Excel file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $excelMimes)){

        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            $reader = new Xlsx();
            $spreadsheet = $reader->load($_FILES['file']['tmp_name']);
            $worksheet = $spreadsheet->getActiveSheet();
            $worksheet_arr = $worksheet->toArray();

            // Remove header row
            unset($worksheet_arr[0]);

            foreach($worksheet_arr as $row){
                $position = $row[0];
                $admissionNo = $row[1];
                $classarm = $row[2];
                $term = $row[3];
                $subject1 = $row[4];
                $test1 = $row[5];
                $exam1 = $row[6];
                $total1 = $row[7];
                $grade1 = $row[8];
                $remark1 = $row[9];
                $subject2 = $row[10];
                $test2 = $row[11];
                $exam2 = $row[12];
                $total2 = $row[13];
                $grade2 = $row[14];
                $remark2 = $row[15];
                $subject3 = $row[16];
                $test3 = $row[17];
                $exam3 = $row[18];
                $total3 = $row[19];
                $grade3 = $row[20];
                $remark3 = $row[21];
                $subject4 = $row[22];
                $test4 = $row[23];
                $exam4 = $row[24];
                $total4 = $row[25];
                $grade4 = $row[26];
                $remark4 = $row[27];
                $subject5 = $row[28];
                $test5 = $row[29];
                $exam5 = $row[30];
                $total5 = $row[31];
                $grade5 = $row[32];
                $remark5 = $row[33];
                $subject6 = $row[34];
                $test6 = $row[35];
                $exam6= $row[36];
                $total6 = $row[37];
                $grade6 = $row[38];
                $remark6 = $row[39];
                $subject7 = $row[40];
                $test7 = $row[41];
                $exam7 = $row[42];
                $total7 = $row[43];
                $grade7 = $row[44];
                $remark7 = $row[45];
                $subject8 = $row[46];
                $test8 = $row[47];
                $exam8 = $row[48];
                $total8 = $row[49];
                $grade8 = $row[50];
                $remark8 = $row[51];
                $subject9 = $row[52];
                $test9 = $row[53];
                $exam9 = $row[54];
                $total9 = $row[55];
                $grade9 = $row[56];
                $remark9 = $row[57];
                $subject10 = $row[58];
                $test10 = $row[59];
                $exam10 = $row[60];
                $total10 = $row[61];
                $grade10 = $row[62];
                $remark10 = $row[63];
                $grandtotal = $row[64];
                $average = $row[65];


$qry = "INSERT INTO `tblresult`(`admissionID`,  `school_session`,`semester`, `subject1`,`test1`, `exam1`,`total1`, `grade1`,`remark1`, `subject2`,`test2`, `exam2`,`total2`, `grade2`,`remark2`, `subject3`,`test3`, `exam3`,`total3`, `grade3`,`remark3`, `subject4`,`test4`, `exam4`,`total4`, `grade4`,`remark4`, `subject5`,`test5`, `exam5`,`total5`, `grade5`,`remark5`, `subject6`,`test6`, `exam6`,`total6`, `grade6`,`remark6`, `subject7`,`test7`, `exam7`,`total7`, `grade7`,`remark7`,`subject8`,`test8`, `exam8`,`total8`, `grade8`,`remark8`, `subject9`,`test9`, `exam9`,`total9`, `grade9`,`remark9`, `subject10`,`test10`, `exam10`,`total10`, `grade10`,`remark10`,`grandtotal`,`average`) VALUES ('$position','$admissionNo','$classarm','$session','$term','$subject1','$test1','$exam1','$total1','$grade1','$remark1','$subject2','$test2','$exam2','$total2','$grade2','$remark2','$subject3','$test3','$exam3','$total3','$grade3','$remark3','$subject4','$test4','$exam4','$total4','$grade4','$remark4','$subject5','$test5','$exam5','$total5','$grade5','$remark5','$subject6','$test6','$exam6','$total6','$grade6','$remark6','$subject7','$test7','$exam7','$total7','$grade7','$remark7','$subject8','$test8','$exam8','$total8','$grade8','$remark8','$subject9','$test9','$exam9','$total9','$grade9','$remark9','$subject10','$test10','$exam10','$total10','$grade10','$remark10','$grandtotal','$average')";
$res = mysqli_query($conn,$qry);
            }
//insert into result summary
$query = "INSERT into `tblresultsummary` (school_session,semester,lecturerID)
VALUES ('$currentsession','$semester','$lecturerID')";
$result = mysqli_query($conn,$query);
if($result){
$_SESSION['success']='Your Result has been Published Successfull';
 }else{

$_SESSION['error']='Problem Publishing Result';
}
}
}
}
 }

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Publish Result| <?php  echo $website_name  ?></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Morris -->
    <link href="css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="../<?php echo $favicon; ?>">

</head>

<body>
   <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img src="../home/<?php echo $rowaccess['photo'];  ?>" alt="image" width="142" height="153" class="img-circle" />
                             </span>


                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"><span class="text-muted text-xs block">Teacher ID: <?php echo $rowaccess['teacherID'];  ?> <b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">

                            <li><a href="logout.php">Logout</a></li>
                        </ul>
  </div>
			   <?php
			   include('sidebar.php');

			   ?>

	       </ul>

        </div>
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>

        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>

<span class="m-r-sm text-muted welcome-message">Welcome to <?php echo $rowaccess['fullname'];?></span>
                </li>
                <li class="dropdown">




                <li>
                    <a href="logout.php">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>

            </ul>

        </nav>


        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2></h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">Home</a>
                        </li>

                        <li class="active">
                            <strong>Publish Result</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
            <div class="col-lg-7">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>

                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-6 b-r"><h3 class="m-t-none m-b">Publish Result</h3>
                            <form  action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
 <label>Term</label>
		<select name="cmdterm" id="select" class="form-control" required="">
    <option value = "">---Select Term---</option>
        <option value = "First">First</option>
        <option value = "Second">Second</option>
        <option value = "Third">Third</option>

      </select>
									</div>
                <div class="form-group">
									<label>Class</label>
									   <select name="cmdclass" id="select" class="form-control" required="">
    <option value = "">---Select Class---</option>
    <?php
    $queryclass = "SELECT * FROM `tblclass` order by class ASC";
    $db = mysqli_query($conn,$queryclass);
    while ( $d=mysqli_fetch_assoc($db)) {
       echo "<option value='".$d['class']."'>".$d['class']."</option>";

    }
    ?>
      </select>
</div>
<div class="form-group">
 <label>Arm</label>
	<select name="cmdarm" id="select" class="form-control" required="">
    <option value = "">---Select Arm---</option>
        <option value = "A">A</option>
        <option value = "B">B</option>
        <option value = "C">C</option>
		<option value = "D">D</option>
    </select>
	</div>

<div class="form-group"><label>Result File(Ms Excel) </label>
<input name="file" type="file" class="form-control"  accept=".xls,.xlsx"/>
</div>
</div>
</div>

<div class="form-group">
    <div class="col-sm-12">
    <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
    <button type="submit" name="btnpublish" class="btn btn-success">Publish</button>

    </div>
  </div>
</form>
</div>
 </div>
</div>
</div>
</div>
<div class="col-lg-5"></div>
</div>
<div class="row"></div>
</div>
<div class="footer">
<div class="pull-right"></div>
<div><?php  include('footer.php'); ?></div>
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

    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
        </script>
		<link rel="stylesheet" href="popup_style.css">
<?php if(!empty($_SESSION['success'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      <strong>Success</strong>
    </h1>
    <p><?php echo $_SESSION['success']; ?></p>
    <p>
      <button class="button button--success" data-for="js_success-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["success"]);
} ?>
<?php if(!empty($_SESSION['error'])) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      <strong>Error</strong>
    </h1>
    <p><?php echo $_SESSION['error']; ?></p>
    <p>
      <button class="button button--error" data-for="js_error-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["error"]);  } ?>
    <script>
      var addButtonTrigger = function addButtonTrigger(el) {
  el.addEventListener('click', function () {
    var popupEl = document.querySelector('.' + el.dataset.for);
    popupEl.classList.toggle('popup--visible');
  });
};

Array.from(document.querySelectorAll('button[data-for]')).
forEach(addButtonTrigger);
    </script>
    <script>
    function display_img(input) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	$('#logo-img').attr('src', e.target.result);
	        }
	        reader.readAsDataURL(input.files[0]);
	    }
	}
   </script>
</body>

</html>
