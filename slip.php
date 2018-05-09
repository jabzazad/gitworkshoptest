<?php
require_once("connect.php");
$connect = mysqli_connect("localhost", "root", "", "market");
$query = "INSERT INTO sell SELECT * from cart where Mid=".$_SESSION['Mid'];
$result = mysqli_query($connect, $query);

$checkquery = "SELECT * FROM cart";
$check=mysqli_query($connect,$checkquery);

if(!$check){ 
     echo mysqli_error().'<br>';
    die('Can not acess database');
}else{
        while($row = mysqli_fetch_array($check)){
            $update="UPDATE sell SET Dates=NOW() WHERE Pid=".$row['Pid']." AND Qproduct=".$row['Qproduct']." AND Mid=".$_SESSION['Mid'];
            $run=mysqli_query($connect,$update);
            }
}
$deletequery = "delete from cart where Mid=".$_SESSION['Mid'];
$resultDelete=mysqli_query($connect,$deletequery);
header("location:Reportmember.php");
?>