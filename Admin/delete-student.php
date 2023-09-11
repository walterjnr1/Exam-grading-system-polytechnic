<?php
error_reporting(1);
include('topbar.php');

if(empty($_SESSION['login_username']))
    {   
    header("Location: ../index.php"); 
    }
    else{
	}
      
$username = $_SESSION["login_username"];

$id= $_GET['id'];        
$sql = "DELETE FROM tblstudent WHERE ID=?";
$stmt= $dbh->prepare($sql);
$stmt->execute([$id]);

header("Location: student-record.php"); 
 ?>