<?php
require_once("connect.php");
$connect = mysqli_connect("localhost", "root", "", "market");
$query = "UPDATE product SET Pname='".$_GET['Upname']."',Pdescript='".$_GET['Updescript']."',Pprice=".$_GET['Upprice']." WHERE Pid=".$_GET['Pid'];
$result = mysqli_query($connect, $query);
header("location:product_admin.php")
?>
