<?php

$con=mysqli_connect('localhost:3307','root','','anusha');



if(isset($_POST['de-submit-c']))
{
	$id=$_POST['id'];
	$firstname=$_POST['fname'];

	$sql="DELETE FROM `customer` WHERE id=$id and fname='$firstname'";
	$result = mysqli_query($con,$sql);
	header('location:../admin.php');
}

if(isset($_POST['in-submit-a']))
{
	$bname=$_POST['bname'];
	$aname=$_POST['aname'];
	$category=$_POST['category'];
	$publication=$_POST['publication'];
	$year=$_POST['year'];
	$numpage=$_POST['numpage'];
	$numcopy=$_POST['numcopy'];
	$price=$_POST['price'];

	$sql1="INSERT INTO `books`(`bname`, `aname`, `category`, `publication`, `year`, `numpage`, `numcopy`,`price`) VALUES ('$bname','$aname','$category','$publication','$year','$numpage','$numcopy','$price')";
	$result = mysqli_query($con,$sql1);
	header('location:../admin.php');
}

if(isset($_POST['de-submit-a']))
{
	$bid=$_POST['bid'];

	$sql2="DELETE FROM `books` WHERE bid=$bid ";
	$result = mysqli_query($con,$sql2);
	header('location:../admin.php');
}

?>