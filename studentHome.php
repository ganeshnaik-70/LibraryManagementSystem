<?php
    $db = mysqli_connect('localhost:3307','root','','anusha');
    $que="SELECT * FROM `books`";
    $result = mysqli_query($db, $que);
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Home</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!--My css
    <link rel="stylesheet" type="text/css" href="css/style.css">-->
    <link rel="stylesheet" type="text/css" href="css/studentHome.css">
  </head>
  <body>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark p-3">
        <a class="navbar-brand ml-2" href="#">Library<span class="highlight">System</span></a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="studentHome.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="studentReq.php">Your Requests</a>
                </li>
            </ul>
            <li class="navbar-nav mt-2 mt-lg-0">
                <a class="nav-link btn btn-primary btn-sm text-white" name="logout" href="signin.html">Logout</a>
            </li>
        </div>
    </nav>
    <h1 class="text-center pt-4 text-white">
        Library System
    </h1>
    <h2 class="text-center" style="color:red;">  
        Available Books
    </h2>
        <div class="contain container-fluid">
            <div class="menuContainer">
                <?php
                    while($rowsb = mysqli_fetch_assoc($result))
                    {
                ?>
                <div class="menuItem" >
                    <p class="para">
                        Book Name: <b><?php echo $rowsb['bname']; ?></b><br>
                        Auther Name: <b><?php echo $rowsb['aname']; ?></b><br>
                        Category: <b><?php echo $rowsb['category']; ?></b><br>
                        Published Year: <b><?php echo $rowsb['year']; ?></b><br>
                        Publication: <b><?php echo $rowsb['publication']; ?></b><br>
                        Number of Pages: <b><?php echo $rowsb['numpage']; ?></b><br>
                        Number of Copys Available: <b><?php echo $rowsb['numcopy']; ?></b><br>
					</p>
                    <form class="buttons" method="POST" action="php/requests.php">
                        <input type="text" name="bid" value="<?php echo $rowsb['bid']; ?>" style="display:none;">
                        <button type="submit" name="request" class="btn btn-success submit">Request Book</button>
                    </form>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        function deleteBtn(ele){
            console.log(ele);
            document.getElementById("offer").style["display"]="none";
            alert("Do you want to delete the item")
            ele.style["display"]="none";
        }
    </script>
</body>
</html>
