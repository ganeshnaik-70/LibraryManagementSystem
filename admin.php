<?php
$dba = mysqli_connect('localhost:3307','root','','anusha');
$que="SELECT * FROM `customer`";
$result = mysqli_query($dba, $que);
$que1="SELECT * FROM `books`";
$result1 = mysqli_query($dba, $que1);
$queb="SELECT `rid`,`bname`, `aname`, `category`, `publication`, `year`, `date`, `status` FROM `requests`";
$resultb = mysqli_query($dba, $queb);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>Admin Page</title>
	<style>
		.contain .addp-workspace{
			width: 70vw;
			height: 90vh;
			float: right;
		}
		.contain .addp-workspace .insert-pform{
			display: none; 
			width: 30vw;
			height: 50vh;
			margin: 10% 30%;
			text-align: center;
		}
		.contain .addp-workspace .insert-pform input{
			margin: 20px 0px;
		}
	</style>
</head>
<body>
	<div class="contain">
		<div class="headder">
			<h1>Admin Page</h1>
		</div>
		<div class="menu-list">
			<button id="a1" onclick="myFunction(document.getElementById(this.id))">Students</button>
			<button id="a2" onclick="myFunction(document.getElementById(this.id))">Add Book</button>
			<button id="a3" name="requests" onclick="myFunction(document.getElementById(this.id))">Student Requests</button>
			<button id="a6" href="#" onclick="myFunction(document.getElementById(this.id))">Back</button>
		</div>
		<div class="customer-workspace work" id="id1">
			<div class="btn-tag" id="cust-op">
				<button type="button" id="v1" onclick="showDetails(document.getElementById(this.id))">view Student detailes</button>
				<button type="button" id="b1" onclick="deleteMenu(document.getElementById(this.id))">Delete Students from database</button>
			</div>
			<div id="tb-container" style="display: none; margin-top: 50px;">
				<table align="center" border="1px" style="width: 700px; line-height: 30px;">
					<tr>
						<th colspan="7"><h2>Student Details</h2></th>
					</tr>
					<tr>
						<th>Id</th>
						<th>First name</th>
						<th>Password</th>
						<th>Email</th>
						<th>City</th>
						<th>Phone</th>
					</tr>
					<?php
						while($rows = mysqli_fetch_assoc($result))
						{
					?>
					<tr>
						<td><?php echo $rows['id']; ?></td>
						<td><?php echo $rows['fname']; ?></td>
						<td><?php echo $rows['password']; ?></td>
						<td><?php echo $rows['email']; ?></td>
						<td><?php echo $rows['city']; ?></td>
						<td><?php echo $rows['phone']; ?></td>

					</tr>
					<?php
						}
					?>
				</table>
			</div>
			<div class="delete-form" id="del-form">
				<form method="POST" action="php/admin_op.php">     
					<input type="text" name="id" placeholder="Student ID" required><br>
					<input type="text" name="fname" placeholder="Student name(as it is in the database)" required><br>
					<input type="submit" value="Delete" class="submit" name="de-submit-c">
				</form>
			</div>
		</div>
		<div class="agent-workspace work" id="id2">
			<div class="btn-tag" id="agn-op">
				<button type="button" id="v2" onclick="showDetails(document.getElementById(this.id))">view Book detailes</button>
				<button type="button" id="i1" onclick="insertMenu(document.getElementById(this.id))">Add New Book</button>
				<button type="button" id="b2" onclick="deleteMenu(document.getElementById(this.id))">Delete Book</button>
			</div>
			<div id="agent-container" style="display: none; margin-top: 50px;">
				<table align="center" border="1px" style="width: 700px; line-height: 30px;">
					<tr>
						<th colspan="5"><h2>Book Details</h2></th>
					</tr>
					<tr>
						<th>Book Id</th>
						<th>Book Name</th>
						<th>Auther Name</th>
						<th>Category</th>
						<th>Publication</th>
						<th>Year</th>
						<th>No of Page</th>
						<th>No of Copys</th>
					</tr>
					<?php
						while($rows1 = mysqli_fetch_assoc($result1))
						{
					?>
					<tr>
						<td><?php echo $rows1['bid']; ?></td>
						<td><?php echo $rows1['bname']; ?></td>
						<td><?php echo $rows1['aname']; ?></td>
						<td><?php echo $rows1['category']; ?></td>
						<td><?php echo $rows1['publication']; ?></td>
						<td><?php echo $rows1['year']; ?></td>
						<td><?php echo $rows1['numpage']; ?></td>
						<td><?php echo $rows1['numcopy']; ?></td>
					</tr>
					<?php
						}
					?>
				</table>
			</div>
			<div class="insert-form" id="ins-form">
				<form method="POST" action="php/admin_op.php">
					<input type="text" name="bname" placeholder="Enter Book Name" required><br>
					<input type="text" name="aname" placeholder="Enter auther name" required><br>
					<input type="text" name="category" placeholder="Enter Category" value="" required><br>
					<input type="text" name="publication" placeholder="Enter Publication" required><br>
					<input type="text" name="year" placeholder="Enter Published Year" required><br>
					<input type="text" name="numpage" placeholder="Enter Number of pages" required><br>
					<input type="text" name="numcopy" placeholder="Enter number of copys" required><br>
					<input type="text" name="price" placeholder="Enter price of the book" required><br>
					<input type="submit" value="Insert" class="submit" name="in-submit-a">
				</form>
			</div>
			<div class="delete-form" id="del-form2">
				<form method="POST" action="php/admin_op.php">     
					<input type="text" name="bid" placeholder="Enter Book ID" required><br>
					<input type="submit" value="Delete" class="submit" name="de-submit-a">
				</form>
			</div>
		</div>
		<div class="places-workspace work" id="id3">
			<div class="req-container" id="req-c">
				<div class="request" id="req">
					<?php
						while($rowsb = mysqli_fetch_assoc($resultb))
						{
							$count_row=0;
							if($rowsb['status']=="pending")
							{
								$count_row=$count_row+1;
					?>
					<div class="query" id="querys">
						<h4>Student</h4>
						<h6 style="color:rgb(138, 136, 136); font-size:12px;"><?php echo $rowsb['date']; ?></h6>
						<p>
							Book Name: <?php echo $rowsb['bname']; ?><br>
							Auther Name: <?php echo $rowsb['aname']; ?><br>
							Category: <?php echo $rowsb['category']; ?><br>
							Published Year: <?php echo $rowsb['year']; ?><br>
							Publication: <?php echo $rowsb['publication']; ?><br>
							Status: <?php echo $rowsb['status']; ?><br>
						</p>
						<div>
							<form action="php/status.php" method="POST">
								<input type="text" name="rid" value="<?php echo $rowsb['rid']; ?>" style="display:none;">
								<button type="submit" name="accept" class="btn btn-success submit">Accept</button>
								<button type="submit" name="dissmis" class="btn btn-success submit">Dismiss</button>
							</form>
						</div>
					</div>
					<?php
								}
						}
						if($count_row==0){
							?>
							<h1 style="text-align:center;padding-top:100px;">No request from students</h1>
							<?php
						}
					?>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function makeNone(){

				document.getElementById("agn-op").style.display = "none";
				document.getElementById("ins-form").style.display = "none";
				document.getElementById("del-form2").style.display = "none";
				document.getElementById("agent-container").style.display = "none";

				document.getElementById("cust-op").style.display = "none";
				document.getElementById("del-form").style.display = "none";
				document.getElementById("tb-container").style.display = "none";
		}

		function myFunction(clicked){
			makeNone()
			document.getElementById('id1').style.display = "none";
			document.getElementById('id2').style.display = "none";
			document.getElementById('id3').style.display = "none";
			if (document.getElementById('a1') === clicked){
				document.getElementById('id1').style.display = "block";
				document.getElementById("cust-op").style.display = "block";
				document.getElementById("del-form").style.display = "none";
			}
			if (document.getElementById('a2') === clicked){
				document.getElementById('id2').style.display = "block";
				document.getElementById("agn-op").style.display = "block";
				document.getElementById("ins-form").style.display = "none";
				document.getElementById("del-form2").style.display = "none";
			}
			if (document.getElementById('a3') === clicked){
				document.getElementById('id3').style.display = "block";
				document.getElementById('req-c').style.display = "block";
				document.getElementById('req').style.display = "block";
			}
		}
		function deleteMenu(clicked) {
			if (document.getElementById('b1') === clicked){
				document.getElementById("cust-op").style.display = "none";
				document.getElementById("tb-container").style.display = "none";
				document.getElementById("del-form").style.display = "block";
			}
			if (document.getElementById('b2') === clicked){
				document.getElementById("agn-op").style.display = "none";
				document.getElementById("agent-container").style.display = "none";
				document.getElementById("del-form2").style.display = "block";
			}
			if (document.getElementById('b3') === clicked){
				document.getElementById("plc-op").style.display = "none";
				document.getElementById("place-container").style.display = "none";
				document.getElementById("del-form3").style.display = "block";
			}
			if (document.getElementById('b4') === clicked){
				document.getElementById("htl-op").style.display = "none";
				document.getElementById("hotel-container").style.display = "none";
				document.getElementById("del-form4").style.display = "block";
			}
		}
		function insertMenu(clicked){
			if (document.getElementById('i1') === clicked){
				document.getElementById("agn-op").style.display = "none";
				document.getElementById("agent-container").style.display = "none";
				document.getElementById("ins-form").style.display = "block";
			}
			if (document.getElementById('i2') === clicked){
				document.getElementById("plc-op").style.display = "none";
				document.getElementById("place-container").style.display = "none";
				document.getElementById("ins-form2").style.display = "block";
			}
			if (document.getElementById('i3') === clicked){
				document.getElementById("htl-op").style.display = "none";
				document.getElementById("hotel-container").style.display = "none";
				document.getElementById("ins-form3").style.display = "block";
			}
		}
		function showDetails(clicked){
			if (document.getElementById('v1') === clicked){
				document.getElementById("cust-op").style.display = "none";
				document.getElementById("del-form").style.display = "none";
				document.getElementById("tb-container").style.display = "block";
			}
			if (document.getElementById('v2') === clicked){
				document.getElementById("agn-op").style.display = "none";
				document.getElementById("ins-form").style.display = "none";
				document.getElementById("del-form2").style.display = "none";
				document.getElementById("agent-container").style.display = "block";
			}
			if (document.getElementById('v3') === clicked){
				document.getElementById("plc-op").style.display = "none";
				document.getElementById("ins-form2").style.display = "none";
				document.getElementById("del-form3").style.display = "none";
				document.getElementById("place-container").style.display = "block";
			}
			if (document.getElementById('v4') === clicked){
				document.getElementById("htl-op").style.display = "none";
				document.getElementById("ins-form3").style.display = "none";
				document.getElementById("del-form4").style.display = "none";
				document.getElementById("hotel-container").style.display = "block";
			}
		}
	</script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>