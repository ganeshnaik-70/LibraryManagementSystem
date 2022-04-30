<?php

$con=mysqli_connect('localhost:3307','root','','anusha');
$rid1=$_POST['rid'];

if(isset($_POST['accept']))
{
    $sql="UPDATE `requests` SET `status`='accept' WHERE `rid`='$rid1'";
    $result = mysqli_query($con,$sql);
    if($result){
        header("location:../admin.php");
    }
}
if(isset($_POST['dissmis']))
{
    $sql="UPDATE `requests`SET `status`='dissmis' WHERE `rid`='$rid1'";
    $result = mysqli_query($con,$sql);
    if($result){
        header("location:../admin.php");
    }
}

?>
