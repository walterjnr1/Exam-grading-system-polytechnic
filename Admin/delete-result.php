<?php
error_reporting(1);
include('topbar.php');

if(empty($_SESSION['login_username']))
    {   
        header("Location: ../home/admin.php"); 
    }
    else{
	}
      
$id= $_GET['id'];
$session= $_GET['session_id'];        
$semester= $_GET['semester_id'];        

$sql = "DELETE FROM tblresultsummary WHERE ID=?";
$stmt= $dbh->prepare($sql);
$stmt->execute([$id]);

$sql = "DELETE FROM tblresult WHERE school_session=? and semester=?";
$stmt= $dbh->prepare($sql);
$stmt->execute([$session,$semester]);
header("Location: publish-result.php"); 
 ?>