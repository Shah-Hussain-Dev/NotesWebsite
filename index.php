<?php
include "dbcon.php";
if (!(isset($_SESSION["login"]) && $_SESSION["login"] == "OK")) {
  header("Location: login.php");
  exit;
} else {
  $username = $_SESSION['username'];
}
//insert data  🔥 
if (isset($_POST['submit'])) {
  // $book_id = $_POST['book_id'];
  $book_name = $_POST['book_name'];
  $book_category = $_POST['book_Category'];
  $file_name = $_FILES['file']['name'];
  $file_tem = $_FILES['file']['tmp_name'];
  $folder = "pdf/" . $file_name;
  $user = $_SESSION['username'];


  $run = "INSERT INTO book_tb(Bookname,Bookcat,BookUpload,uploaded_by) VALUES ('$book_name','$book_category','$folder','$user')";
  $query = mysqli_query($con, $run);
  if (move_uploaded_file($_FILES["file"]["tmp_name"], $folder)) {
    if ($query) {
      $_SESSION['status'] = "Data Inserted Successfully 👍";
      $_SESSION['status_code'] = "success";
    } else {

      $_SESSION['status'] = "Data not Inserted 👎 ";
      $_SESSION['status_code'] = "error";
    }
  } else {
    echo "<script>alert('file not moved')</script>";
  }
}



if (isset($_GET['ids'])) {
  $ids = $_GET['ids'];
  $query = "SELECT id FROM book_tb where id={$ids}";
  $sql = mysqli_query($con, $query);
  $datas = mysqli_fetch_assoc($sql);
}



$sql = "SELECT * FROM user";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$user = $_SESSION['username'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Online Notes System</title>
  <link rel="icon" href="images/book.svg" type="image/icon type">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <style>
    body {
      background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
        url(images/books.jpg);
    }

    .social-icon .fa {
      font-size: 20px;
      height: 50px;
      width: 50px;
      border-radius: 50%;
      border: 2px solid black;
      line-height: 50px;
      text-align: center;
      color: black;

    }

    .social-icon {
      padding: 10px;
    }

    .social-icon .fa:hover {

      transform: scale(1.1, 1.1);
      color: white;
      background-color: black;
    }

    @keyframes gradient {
      0% {
        background-position: 0% 50%;
      }

      50% {
        background-position: 100% 50%;
      }

      100% {
        background-position: 0% 50%;
      }
    }

    .card-section {
      transition: all 0.3s ease-out;

    }



    .card-section:hover {
      transform: translateY(-20px);
    }
  </style>
</head>

<body>
  <div class="container-fluid book-header">
    <div class="container-fluid book-header-t  py-4 text-dark text-center shadow">
      <div class="row">
        <div class="col-lg-3 col-11 mx-auto">
          <div class="float-left">
            <h4 class="text-white font-weight-bolder">Welcome &nbsp;<span class="badge rounded-pill  bg-dark"><?php echo $user; ?></span></h4>
          </div>
        </div>
        <div class="col-lg-6 col-12">
          <h3 class="font-weight-bolder text-italic text-left"> <span class=""><img src="images/book.svg" height="30"></span> Online Notes System <span class=""><img src="images/book.svg" height="30"> </h3>
        </div>
        <div class="col-lg-1 col-12">
          <h4 class="text-white font-weight-bolder"><span class="badge rounded-pill  bg-warning shadow"><a href="logout.php" title='Log out' class="text-white" style="text-decoration:none">Logout <i class="fa fa-sign-out"></i></a></span></h4>
        </div>
      </div>
    </div>


  </div>
  <div class="container my-3 mt-5 ">
    <form action="" method="post" enctype="multipart/form-data" class="w-50 mx-auto">
      <div class="input-group mb-3  mx-auto">
        <div class="input-group-prepend">
          <span class="input-group-text bg-warning"><img src="images/identification.svg" height="20"></span>
        </div>
        <input type="text" name="book_id" class="form-control" placeholder="Book Id" readonly required>

      </div>
      <div class="input-group mb-3  mx-auto">
        <div class="input-group-prepend">
          <span class="input-group-text bg-warning"><img src="images/open-book.svg" height="20"></span>
        </div>
        <input type="text" name="book_name" class="form-control " placeholder="Book Name" aria-label="Amount (to the nearest dollar)" required>

      </div>
      <div class="input-group mb-3  mx-auto">
        <div class="input-group-prepend">
          <span class="input-group-text bg-warning"><img src="images/category.svg" height="20"></span>
        </div>
        <input type="text" name="book_Category" class="form-control" placeholder="Book Category" required>

      </div>
      <div class="input-group mb-3  mx-auto">
        <input type="file" name="file" class="" placeholder="Book Category" aria-label="Amount (to the nearest dollar)">
      </div>

      <center>
        <?php if (isset($passmsg)) {
          echo $passmsg;
        } ?>
      </center>

  </div>
  <div class="mx-auto text-center mt-4">
    <button href="#" class="btn btn-success px-3 ml-3" data-toggle="tooltip" data-placement="bottom" title="Add Books" name="submit"><img src="images/add.svg" height="30"></button>

    <!-- <button href="#" class="btn btn-warning px-3 ml-3" title="Update book" name="update"><img src="images/pencil.svg" height="30"></button> -->


  </div>
  <div class="container my-4 ">
    <div class="w-100">
      <h1 class="text-center text-white bg-warning  mx-auto">Programming Books</h1>
    </div><br>
    <div class="row">
      <?php

      $display = "SELECT * FROM book_tb ";
      $query = mysqli_query($con, $display);
      while ($row = mysqli_fetch_assoc($query)) {

        // $b_id = $row['id'];
        $b_name = $row['Bookname'];
        $b_cat = $row['Bookcat'];
        $file = $row['BookUpload'];
        $user = $row['uploaded_by'];

        $_SESSION['user'] = $row['uploaded_by'];;

      ?>

        <div class="col-sm-12 col-md-4 col-lg-4 mt-4 mb-5 card-section">
          <div class="card bg-light">
            <div class="card-bg text-center text-light font-weight-bolder" style="height:200px;font-size:25px;line-height:200px;word-wrap: break-word; background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
	background-size: 400% 400%;
	animation: gradient 15s ease infinite;text-shadow:0px 0px 2px black; "><?php echo $b_name; ?></div>
            <div class="card-block my-3 px-3">
              <h5 class="text-bold ">Book Category: <?php echo $b_cat; ?> </h5>
              <h5 class="text-bold">Uploaded By: <?php echo  $row['uploaded_by']; ?> </h5>

              <a href="<?php echo $file ?>" title="download" download class="btn btn-block text-warning font-weight-bolder w-75 mx-auto bg-success">Download<i class=" fa fa-download text-warning ml-3 mr-3" style=" font-size:25px;"></i> </a>
            </div>
          </div>
        </div>

      <?php } ?>

    </div>
  </div>
  </div>


  </div>
  </div>
  <footer class=" text-center text-dark  py-2  book-header-t">

    <div class="d-flex justify-content-between mx-auto social-icon " style="width:300px;">
      <a href="#"><span><i class="fa fa-facebook"></i></span></a>
      <a href="https://www.linkedin.com/in/shahhussain101"><span><i class="fa fa-linkedin"></i></span></a>
      <a href=" https://www.instagram.com/hussain.shah.dev"><span><i class="fa fa-instagram"></i></span></a>
      <a href="https://www.youtube.com/channel/UCxEUIEulwuh9EAQg7Cg-kVg"><span><i class="fa fa-youtube"></i></span></a>
    </div>
    <h4>Developed By <b>Shah Hussain</b></h4>
  </footer>

  <!-- <?php
        if (isset($_POST['delete'])) {
          $query = "DELETE * FROM book_tb";
          $sql = mysqli_query($con, $query);
          if ($sql) {
            header('location:index.php');
          } else {
            echo "Data not deleted";
          }
        }
        ?> -->

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <script>
    function delete() {
      confirm('Are you sure want to delete');
    }
    $(function() {
      $('[data-toggle="tooltip"]').tooltip()
    })
  </script>
</body>

</html>
<?php include "links.php"; ?>