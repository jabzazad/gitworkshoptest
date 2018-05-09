<?php
	session_start();
	require_once("connect.php");
	//*** Update Status
	$sql = "UPDATE account SET LoginStatus = '0', LastUpdate = '2018-05-05 00:00:00' WHERE Mid = '".$_SESSION["Mid"]."' ";
	$query = mysqli_query($con,$sql);

	session_destroy();
	header("location:login.php");
?>