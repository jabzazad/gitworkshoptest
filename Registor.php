<?php
require_once("connect.php");
$connect = mysqli_connect("localhost", "id163992_jabzazad", "125012", "id163992_market");
$query = "INSERT INTO personalinfo values('".$_POST['contactName']."','".$_POST['contactlname']."','".$_POST['contactEmail']."','".$_POST['username']."'
,'".$_POST['password']."','".$_POST['phone']."');";
$result = mysqli_query($connect, $query);
$account="INSERT INTO account(username,passwords,roles,LoginStatus,LastUpdate)  values('".$_POST['username']."','".$_POST['password']."',0,0,'2010-05-05 00:00:00');";
$go=mysqli_query($connect,$account);
header("location:index.html");
?>