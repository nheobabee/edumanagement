<?php include('../config/config.php');
session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" href="css.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body">
<div style="padding:5px 0 0 5px" class="bt">
<button class="btn btn-secondary"onClick="Show()" id="mytext"><i class="fas fa-bars"></i></button>
</div>
	<div id="myform" class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>
					
				<form  class="login100-form validate-form" method="POST">
					<span class="login100-form-title">
						Member Login
					</span>
					<br>
					<?php
					if (isset($_SESSION['echo fail'])) {
						echo $_SESSION['echo fail'];
						unset($_SESSION['echo fail']);
					}
					?>
					<br>
					<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button name="login" type="submit" class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="./forgot-pas.php">
							Username / Password?
						</a>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="./signup.php">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php
	if (isset($_POST['login'])) {
		$username = $_POST['email'];
		$password = $_POST['pass'];
		$sql = "select * from users where user_email = '$username'  and status = 1";
		$rs = mysqli_query($conn, $sql);
		if (mysqli_num_rows($rs) > 0) {
			$row = mysqli_fetch_assoc($rs);
			$password_hash = $row['user_pass'];
			if (password_verify($password, $password_hash)) {
				//SESIOM lấy user_id
				$_SESSION['user_id'] = $row['user_id'];
				//$_SESSION['loginok'] = $username;
				if($row['user_level']==0)
				{

					//student
					$st = ($row['user_level']==0) ;
					$_SESSION['student']= $st;
					
					header('location:../admin/student/student.php'); 
				}
				 if($row['user_level']==1)
				{
					//teacher
					$tc = ($row['user_level']==1) ;
					$_SESSION['teacher']= $tc;
					header('location:../admin/teacher/teacher.php');
				}
				 if($row['user_level']==2)
				{
					//admin
					$ad = ($row['user_level']==2) ;
					$_SESSION['loginok'] = $ad;
					header('location:../admin/admin/index.php');
				}
				// header('location:../admin/index.php');
				$_SESSION['display-username'] = "<h6 style='margin-top:5px;'> Xin chào, " . $row['user_name'] . "  </h6>";
				$_SESSION['name'] = $row['user_name'];
			}
		 else {
			$_SESSION['echo fail'] = "<p style='color:red'> wrong password or username </p>";
			header('location:./index.php');
		}
	}
	}
	?>


	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<script src="./js/js.js"></script>
</body>

</html>