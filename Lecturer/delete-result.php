<?php 
session_start();
error_reporting(0);

include('../user/connect.php');

$session= $_GET['session'];   
$term= $_GET['term'];        
$classarm= $_GET['classarm'];        
$branch = $_SESSION["teacher-branch"];


date_default_timezone_set('Africa/Lagos');
$current_date = date('Y-m-d H:i:s');


//delete tblresult
$sql_result = "delete from tblresult where class_arm='$classarm' and term='$term' and school_session='$session' and branch ='$branch'";
$result = $conn->query($sql_result);

//delete tblresultsummary
$sql_resultsummary = "delete from tblresultsummary where class_arm='$classarm' and term='$term' and school_session='$session' and branch ='$branch'";
$result = $conn->query($sql_resultsummary);

//save activity log details
$task= $_SESSION["teacher-fullname"].' '.'Deleted Result'.' '. 'On' . ' '.$current_date;
$query2 = "INSERT into `activity_log` (task,branch)
VALUES ('$task','$branch')";
$result2 = mysqli_query($conn,$query2);

header("Location: result-record.php"); 
 ?>