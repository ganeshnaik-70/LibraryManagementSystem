<?php

$con = mysqli_connect('localhost:3307', 'root', '', 'anusha');
session_start();
$price=0;
$bname="";
$id=0;
if (isset($_POST['pay'])) {
  $id = $_POST['bid'];
  $que="SELECT * FROM `books` WHERE `bid`='$id'";
  $result = mysqli_query($con, $que);
  while($rowsb = mysqli_fetch_assoc($result))
  {
    $price = $rowsb['price'];
    $bname = $rowsb['bname'];
  }
}

if (isset($_POST['submitpay'])) {
  $mod = $_POST['mode'];
  echo $price;
  echo $bname;
  $que = "INSERT INTO `payment`(`item_no`, `amount`, `p_mode`, `bname`) VALUES ('$id','$price','$mode','$bname')";
	$result = mysqli_query($con, $que);
  header('location:paymentDone.html');
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Payment Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  width: 70%;
  margin: auto;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
  margin-top: 20px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}
select {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}
label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}
.amount{
  color: red;
  margin-left: 10px;
}

@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
@media (max-width: 800px) {
  .container{
      width: 90%;
      margin: auto;
  }
}
</style>
</head>
<body>

<div class="row">
  <div class="col-75">
    <div class="container">
      <form method="POST" action="payment.php">
        <input style="display:none;" type="text" id="order_no" name="order_no" value="<?php echo (isset($order_no))?$order_no:'';?>">
        <input style="display:none;" type="text" id="totalamt" name="totalamt" value="<?php echo (isset($totalamt))?$totalamt:'';?>">
        <div class="row">
          <div class="col-50">            
            <h3>Total Amount</h3>
            <h4 class="amount"><?php echo $price;
            echo $bname;?> $</h4>
            <h3>Select the mode of Payment</h3>
            <label for="name"><i class="fa fa-user"></i> Payment Mode</label>
            <select class="input-box" name="mode" id="type">
              <option value="card">Card</option>
            </select>

            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname1" name="cardname" placeholder="Name" require>
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" require>
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="Month" require>
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="yyyy" require>
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="xxx" require>
              </div>
            </div>
          </div>
        </div>
        <input type="submit" name="submitpay" value="Pay" class="btn">
      </form>
    </div>
  </div>
</div>

<script>
  function makeEnable(){
    var selectBox=document.getElementById('type');
    var selectedValue=selectBox.options[selectBox.selectedIndex].value;
    if(selectedValue=="card"){
      document.getElementById('cname1').disabled=false;
      document.getElementById('ccnum').disabled=false;
      document.getElementById('expmonth').disabled=false;
      document.getElementById('expyear').disabled=false;
      document.getElementById('cvv').disabled=false;
    }
    if(selectedValue=="cash"){
      document.getElementById('cname1').disabled=true;
      document.getElementById('ccnum').disabled=true;
      document.getElementById('expmonth').disabled=true;
      document.getElementById('expyear').disabled=true;
      document.getElementById('cvv').disabled=true;
    }
  }

</script>
</body>
</html>
