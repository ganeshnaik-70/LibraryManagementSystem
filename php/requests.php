<?php

$con=mysqli_connect('localhost:3307','root','','anusha');

$bid=$_POST['bid'];
$rdate = date("Y-m-d h:i:sa");
$bname = "";
$aname = "";
$category = "";
$publication = "";
$year = "";

$bookd="SELECT `bid`, `bname`, `aname`, `category`, `publication`, `year`,`price` FROM `books` WHERE `bid`='$bid';";
$bookres = mysqli_query($con,$bookd);
while($bookrows = mysqli_fetch_assoc($bookres)){
    $bid = $bookrows['bid'];
    $bname = $bookrows['bname'];
    $aname = $bookrows['aname'];
    $category = $bookrows['category'];
    $publication = $bookrows['publication'];
    $year = $bookrows['year'];
    $price = $bookrows['price'];
}


$sql="INSERT INTO `requests`(`bid`,`bname`, `aname`, `category`, `publication`, `year`, `status`,`date`,`price`) VALUES ('$bid','$bname','$aname','$category','$publication','$year','pending','$rdate','$price')";
$result = mysqli_query($con,$sql);

if($result)
{
	header("location:../studentHome.php");
}

?>
