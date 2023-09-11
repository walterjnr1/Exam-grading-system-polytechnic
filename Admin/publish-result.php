<?php
include('topbar.php');


//publish
// Include PhpSpreadsheet library autoloader
require_once 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

if(empty($_SESSION['login_username']))
    {   
    header("Location: ../index.php"); 
    }
    else{
	}

$username = $_SESSION["login_username"];

$sql = "select * from users where username='$username'"; 
$result = $conn->query($sql);
$rowaccess= mysqli_fetch_array($result);

if(isset($_POST["btnpublish"]))
{

$semester = mysqli_real_escape_string($conn,$_POST['cmdsemester']);
$session = mysqli_real_escape_string($conn,$_POST['cmdsession']);

//check if result already published
$sql = "SELECT * FROM tblresultsummary where school_session='$session' and semester='$semester' ";
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
                $admissionID = $row[0];
                $session_1 = $row[1];
                $semester_1 = $row[2];
                $course1 = $row[3];
                $cat1 = $row[4];
                $exam1 = $row[5];
                $total1 = $row[6];
                $grade1 = $row[7];
                $gradeunit1 = $row[8];
                $gradepoint1 = $row[9];
                $weightedpoint1 = $row[10];
               

                $course2 = $row[11];
                $cat2 = $row[12];
                $exam2 = $row[13];
                $total2 = $row[14];
                $grade2 = $row[15];
                $gradeunit2 = $row[16];
                $gradepoint2 = $row[17];
                $weightedpoint2 = $row[18];

                $course3 = $row[19];
                $cat3 = $row[20];
                $exam3 = $row[21];
                $total3 = $row[22];
                $grade3 = $row[23];
                $gradeunit3 = $row[24];
                $gradepoint3 = $row[25];
                $weightedpoint3 = $row[26];

                $course4 = $row[27];
                $cat4 = $row[28];
                $exam4= $row[29];
                $total4 = $row[30];
                $grade4 = $row[31];
                $gradeunit4 = $row[32];
                $gradepoint4 = $row[33];
                $weightedpoint4 = $row[34];

                $course5 = $row[35];
                $cat5 = $row[36];
                $exam5 = $row[37];
                $total5 = $row[38];
                $grade5 = $row[39];
                $gradeunit5 = $row[40];
                $gradepoint5 = $row[41];
                $weightedpoint5 = $row[42];

                $course6 = $row[43];
                $cat6 = $row[44];
                $exam6 = $row[45];
                $total6 = $row[46];
                $grade6 = $row[47];
                $gradeunit6 = $row[48];
                $gradepoint6 = $row[49];
                $weightedpoint6 = $row[50];

                $course7= $row[51];
                $cat7= $row[52];
                $exam7 = $row[53];
                $total7 = $row[54];
                $grade7 = $row[55];
                $gradeunit7 = $row[56];
                $gradepoint7 = $row[57];
                $weightedpoint7 = $row[58];


                $totalpoint = $row[59];
                $totalhour = $row[60];
                $gpa = $row[61];
                

$qry = "INSERT INTO `tblresult`(`admissionID`,  `school_session`,`semester`, `course1`,`cat1`, `exam1`,`total1`, `grade1`,`gradeunit1`, `gradepoint1`,`weightedpoint1` ,  `course2`,`cat2`, `exam2`,`total2`, `grade2`,`gradeunit2`, `gradepoint2`,`weightedpoint2`,`course3`,`cat3`, `exam3`,`total3`, `grade3`,`gradeunit3`, `gradepoint3`,`weightedpoint3`,`course4`,`cat4`, `exam4`,`total4`, `grade4`,`gradeunit4`, `gradepoint4`,`weightedpoint4`,`course5`,`cat5`, `exam5`,`total5`, `grade5`,`gradeunit5`, `gradepoint5`,`weightedpoint5`,`course6`,`cat6`, `exam6`,`total6`, `grade6`,`gradeunit6`, `gradepoint6`,`weightedpoint6`,`course7`,`cat7`, `exam7`,`total7`, `grade7`,`gradeunit7`, `gradepoint7`,`weightedpoint7`,`totalpoint`,`totalhour`,`gpa`) VALUES ('$admissionID', '$session_1','$semester_1', '$course1','$cat1', '$exam1','$total1', '$grade1','$gradeunit1', '$gradepoint1','$weightedpoint1' , '$course2','$cat2', '$exam2','$total2', '$grade2','$gradeunit2', '$gradepoint2','$weightedpoint2','$course3','$cat3','$exam3','$total3', '$grade3','$gradeunit3', '$gradepoint3','$weightedpoint3','$course4','$cat4', '$exam4','$total4', '$grade4','$gradeunit4', '$gradepoint4','$weightedpoint4','$course5','$cat5', '$exam5','$total5', '$grade5','$gradeunit5', '$gradepoint5','$weightedpoint5','$course6','$cat6', '$exam6','$total6','$grade6','$gradeunit6', '$gradepoint6','$weightedpoint6','$course7','$cat7','$exam7','$total7', '$grade7','$gradeunit7', '$gradepoint7','$weightedpoint7','$totalpoint','$totalhour','$gpa')";
$res = mysqli_query($conn,$qry);
            }
//insert into result summary
$query = "INSERT into `tblresultsummary` (`school_session`,`semester`,`dept`) VALUES ('$session','$semester','Computer Science')";

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
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Publish Result - Admin Dashboard</title>
  <link rel="icon" type="image/png" sizes="16x16" href="../<?php echo $favicon; ?>">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <script type="text/javascript">
		function deldata(){
if(confirm("ARE YOU SURE YOU WISH TO DELETE THIS RESULT FROM THE DATABASE ?"))
{
return  true;
}
else {return false;
}
	 
}

</script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>      </li>
      
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
 
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
    <img src="../<?php echo $logo; ?>" alt=" Logo"  width="155" height="99" class="" style="opacity: .8">
	        <span class="brand-text font-weight-light"></span>    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img src="../home/<?php echo $rowaccess['photo'];    ?>" alt="User Image" width="220" height="192" class="img-circle elevation-2">        </div>
        <div class="info">
        <a href="#" class="d-block"><?php echo $rowaccess['fullname'];  ?></a>
        </div>
      </div>

     

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
		 <?php
			   include('sidebar.php');
			   
			   ?>
		 		 
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Publish Result</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-4">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Publish Result</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action="" method="POST" enctype="multipart/form-data">
                <div class="card-body">
               
                <div class="form-group">
									<label>Session</label>
									   <select name="cmdsession" id="select" class="form-control" required="">
    <option value = "">---Select Session---</option>
    <?php
    $queryclass = "SELECT * FROM `school_session` order by current_session ASC";
    $db = mysqli_query($conn,$queryclass);
    while ( $d=mysqli_fetch_assoc($db)) {
       echo "<option value='".$d['current_session']."'>".$d['current_session']."</option>";
    }
    ?>
      </select>
</div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Semester </label>
                    <select name="cmdsemester" id="select" class="form-control" required="">
                  <option value = "">---Select Semester---</option>
                   <option value = "First">First</option>
                    <option value = "Second">Second</option>
                    
                      </select>                
                      </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Department </label>
                    <input type="text" class="form-control" name="txtdept" id="exampleInputEmail1" size="77" value="Computer Science" disabled>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Result File(Ms Excel) </label>
                    <input name="file" type="file" class="form-control"  accept=".xls,.xlsx"/>
                  </div>
                  
		   </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="btnpublish" class="btn btn-primary">Publish</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

           
          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-8">
            <!-- general form elements disabled -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Result Summary</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <table width="106%" align="center" class="table table-bordered table-striped" id="example1">
                    <thead>
                    <tr> <th width="3%"><div align="center">#</div></th>
                        <th width="13%"><div align="center">Session</div></th>
                        <th width="13%"><div align="center">Semester</div></th>
                        <th width="13%"><div align="center">Department</div></th>
							         <th width="6%"><div align="center">Action</div></th>

                        </tr>
                    </thead>
                      <div align="center"></div>
                    
                    <tbody>
                                       
<?php 
                  $data = $dbh->query("SELECT * FROM tblresultsummary ORDER BY ID DESC")->fetchAll();
                  $cnt=1;
                  foreach ($data as $row) {
                    ?>

                        <tr class="gradeX">
			            		  <td height="47"><div align="center"><?php echo $cnt; ?></div></td>
                        <td><div align="center"><?php echo $row['school_session']; ?></div></td>
                        <td><div align="center"><?php echo $row['semester']; ?></div></td>
                        <td><div align="center">Computer Science</div></td>

                     <td>     
                      <div class="btn-group" >
                    <button type="button" class="btn btn-danger btn-flat">Action</button>
                    <button type="button" class="btn btn-danger btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" role="menu">
							     
                     <a class="dropdown-item" href="delete-result.php?id=<?php echo $row['ID'];?>&session_id=<?php echo $row['school_session'];?>&semester_id=<?php echo $row['semester'];?>" onClick="return deldata();">Delete</a>

                    </div>
                  </div>
                </td>
                    </tr>
					<?php $cnt=$cnt+1;} ?>
                    </tbody>
                    <tfoot>
                    </tfoot>
                  </table>
				  
                </div>
                <!-- /.card-body -->
              </div>
                <table width="392" border="0" align="right">
                  <tr>
                    <td width="386"></td>
                  </tr>
                </table>
                <p>&nbsp;</p>
              </td>
            </tr>
			
          </table>
          <p>
            <!-- /.card -->
                     <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      
    </div>
    <strong><?php include 'footer.php' ?>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
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
</body>
</html>
