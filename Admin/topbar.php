
<?php
session_start();
error_reporting(1);
include('connect2.php');
include('connect.php');

 
$stmt = $dbh->query("SELECT * FROM websiteinfo");
$row_website = $stmt->fetch();
$logo="home/".$row_website['logo'] ;
$favicon="home/".$row_website['logo'] ;

$email=$row_website['email'] ;
$website_name=$row_website['schoolname'] ;
$url=$row_website['website'] ;
$phone1=$row_website['phone1'] ;
$phone2=$row_website['phone2'] ;
$address=$row_website['address'] ;

$sql = "select * from school_session order by ID desc limit 1"; 
$result = $conn->query($sql);
$row_session = mysqli_fetch_array($result);
$session=$row_session['current_session'];

date_default_timezone_set('Africa/Douala');
$current_date = date('Y-m-d H:i:s');
?> 
