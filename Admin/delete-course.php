<?php 
include('topbar.php');
if(empty($_SESSION['login_username']))
{   
  header("Location: add-course.php"); 
}
else{
}

$id=$_GET['id'];
$sql = "DELETE FROM tblcourse WHERE ID=?";
$stmt= $dbh->prepare($sql);
$stmt->execute([$id]);

header("Location: add-course.php"); 
 ?>