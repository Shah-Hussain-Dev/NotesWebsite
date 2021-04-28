<?php
include 'dbcon.php';
include "links.php";

//Registration form
// if (isset($_POST["submit"])) {
// 	$username = mysqli_real_escape_string($con, $_POST["name"]);
// 	$email = mysqli_real_escape_string($con, $_POST["email"]);
// 	$password = mysqli_real_escape_string($con, $_POST["password"]);
// 	$password = md5($password);

// 	$query = "INSERT INTO user (name,email, pass) VALUES('$username', '$email','$password')";
// 	if (mysqli_query($con, $query)) {
// 		$_SESSION['status'] = "Account Registered Successfully 👍";
// 		$_SESSION['status_code'] = "success";
// 		// echo '<script>alert("Account Created Successfully")</script>';
// 	} else {
// 		echo '<script>alert("Registration Not Done")</script>';
// 		$_SESSION['status'] = "Not Registered   ";
// 		$_SESSION['status_code'] = "error";
// 	}
// }
?>






<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Form</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<style>
		body {
			background-color: #7f53ac;
			background-image: linear-gradient(315deg, #7f53ac 0%, #647dee 74%);
		}

		/* //login form  */
		.area {
			background: #4e54c8;
			background: -webkit-linear-gradient(to left, #8f94fb, #4e54c8);
			width: 100%;
			z-index: -99;
		}

		.circles {
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			overflow: hidden;
		}

		.circles li {
			position: absolute;
			display: block;
			list-style: none;
			width: 20px;
			height: 20px;
			background: rgba(255, 255, 255, 0.2);
			animation: animate 25s linear infinite;
			bottom: -150px;
		}

		.circles li:nth-child(1) {
			left: 25%;
			width: 80px;
			height: 80px;
			animation-delay: 0s;
		}

		.circles li:nth-child(2) {
			left: 10%;
			width: 20px;
			height: 20px;
			animation-delay: 2s;
			animation-duration: 12s;
		}

		.circles li:nth-child(3) {
			left: 70%;
			width: 20px;
			height: 20px;
			animation-delay: 4s;
		}

		.circles li:nth-child(4) {
			left: 40%;
			width: 60px;
			height: 60px;
			animation-delay: 0s;
			animation-duration: 18s;
		}

		.circles li:nth-child(5) {
			left: 65%;
			width: 20px;
			height: 20px;
			animation-delay: 0s;
		}

		.circles li:nth-child(6) {
			left: 75%;
			width: 110px;
			height: 110px;
			animation-delay: 3s;
		}

		.circles li:nth-child(7) {
			left: 35%;
			width: 150px;
			height: 150px;
			animation-delay: 7s;
		}

		.circles li:nth-child(8) {
			left: 50%;
			width: 25px;
			height: 25px;
			animation-delay: 15s;
			animation-duration: 45s;
		}

		.circles li:nth-child(9) {
			left: 20%;
			width: 15px;
			height: 15px;
			animation-delay: 2s;
			animation-duration: 35s;
		}

		.circles li:nth-child(10) {
			left: 85%;
			width: 150px;
			height: 150px;
			animation-delay: 0s;
			animation-duration: 11s;
		}

		@keyframes animate {
			0% {
				transform: translateY(0) rotate(0deg);
				opacity: 1;
				border-radius: 0;
			}

			100% {
				transform: translateY(-1000px) rotate(720deg);
				opacity: 0;
				border-radius: 50%;
			}
		}

		/* //login form  */
	</style>
</head>

<body>
	<div class="section" style="z-index:99;">
		<div class="container">
			<div class="row full-height justify-content-center">
				<div class="col-12 text-center align-self-center py-5">
					<!-- <div class="section pb-5 pt-5 pt-sm-2 text-center"> -->
					<h1 class="mb-0 pb-3"><span>Admin In </span></h1>
					<!-- <input class="checkbox" type="checkbox" id="reg-log" name="reg-log" /> -->
					<label for="reg-log"></label>
					<div class="card-3d-wrap mx-auto">
						<div class="card-3d-wrapper">
							<div class="card-front">
								<div class="center-wrap">
									<div class="section text-center">
										<h4 class="mb-4 pb-3">Log In</h4>
										<form method="post">
											<div class="form-group">
												<input type="email" name="email" class="form-style" placeholder="Your Email" id="logemail" autocomplete="none" required>
												<i class="input-icon uil uil-at"></i>
											</div>
											<div class="form-group mt-2">
												<input type="password" name="password" class="form-style" placeholder="Password" id="logemail" autocomplete="none" required>
												<i class="input-icon uil uil-lock-alt"></i>
											</div>
											<button type="submit" class="btn mt-4" name="login">submit</button>
											<!-- <p class="mb-0 mt-4 text-center">
												<a href="#0" class="link">Forgot your password?</a> -->
											</p>
										</form>
									</div>
								</div>
							</div>

							<!-- Sign Up Form 📖 -->
							<!-- <div class="card-back">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-4 pb-3">Sign Up</h4>
											<form method="post">
												<div class="form-group">
													<input type="text" name="name" class="form-style" placeholder="Your Full Name" id="logname" autocomplete="none" required>
													<i class="input-icon uil uil-user"></i>
												</div>
												<div class="form-group mt-2">
													<input type="email" name="email" class="form-style" placeholder="Your Email" id="logemail" autocomplete="none" required>
													<i class="input-icon uil uil-at"></i>
												</div>
												<div class="form-group mt-2">
													<input type="password" name="password" class="form-style" placeholder="Your Password" id="logpass" autocomplete="none" required>
													<i class="input-icon uil uil-lock-alt"></i>
												</div>
												<button href="#" class="btn mt-4" name="submit">submit</button>
											</form>
										</div>
									</div>
								</div> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	</div>
	<div class="area">
		<ul class="circles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>

</body>

</html>

<?php


if (isset($_POST['login'])) {
	// username and password sent from form 

	$myusername = mysqli_real_escape_string($con, $_POST['email']);
	$mypassword = mysqli_real_escape_string($con, $_POST['password']);
	$mypassword = md5($mypassword);

	$sql = "SELECT * FROM user WHERE email = 'adminShah@gmail.com' and pass = '$mypassword'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

	$count = mysqli_num_rows($result);

	// If result matched $myusername and $mypassword, table row must be 1 row

	if ($count == 1) {
		$_SESSION['status'] = "Log In Successfull 👍";
		$_SESSION['status_code'] = "success";
		$_SESSION["login"] = "OK";
		$_SESSION['username'] = $row['name'];
		// header('Location:index.php');
		echo "<script>window.location.href='admin.php'</script>";
	} else {
		// echo "<script>alert('login failed')</script>";
		$_SESSION['status'] = "Log In failed, You are not ADMIN   ";
		$_SESSION['status_code'] = "error";
	}
}



?>

<?php
if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
?>

	<script>
		swal({
			title: "<?php echo $_SESSION['status']; ?>",
			// text: "You clicked the button!",
			icon: "<?php echo $_SESSION['status_code']; ?>",
			button: "Done!",
		});
	</script>
<?php
	unset($_SESSION['status']);
}

?>