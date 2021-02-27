<?php
session_start();

require_once 'class.user.php';

$user_login = new USER();


if(isset($_POST['btn-login']))
{
	$email = trim($_POST['txtemail']);
	$upass = trim($_POST['txtupass']);
	
	if($user_login->login($email,$upass))
	{
		$user_login->redirect('index.php');
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
</head>
<body>
	<div class="container">
		<div class="row">
			<div style="background: #08062e;" class="col-md-12 col-sm-12 col-lg-12  p-2 mt-1">
				<div class="row">
					<div class=" col-lg-4 col-md-4">
						<p class="text-white"><i class="fas fa-map-marker"></i> 603/b Shamim Saroni, Mirpur, Dhaka</p>
					</div>
					<div class=" col-lg-4 col-md-4">
						<p class="text-white"><i class="fas fa-envelope-open"></i> hotel@gmail.com</p>
					</div>
					<div class=" col-lg-4 col-md-4">
						<a class="btn btn-primary float-right" href="login.php">Login</a>
					</div>
				</div>
			</div>
		</div>
		<?php
				include_once 'menu_bar.php';

				?>
		<div class="row">
			<div class="col-3">

			</div>
			<div class="col-6 shadow p-3 mb-5 bg-white rounded mt-4">
				<?php 
				if(isset($_GET['inactive']))
				{
					?>
					<div>
						<strong>Sorry!</strong> This Account is not Activated Go to your Inbox and Activate it. 
					</div>
					<?php
				}
				?>
				<form method="post">
					<?php
					if(isset($_GET['error']))
					{
						?>
						<div>
							<strong>Wrong Details!</strong> 
						</div>
						<?php
					}
					?>
					<h2 class="text-center bg-warning p-2 text-white">Sign In.</h2><hr />
					<div class="form-group">
						<input class="form-control" type="email" placeholder="Email address" name="txtemail" required />
					</div>
					<div class="form-group">
						<input class="form-control" type="password"placeholder="Password" name="txtupass" required />
					</div>
					<div class="form-group">
						<button class="form-control btn btn-success" type="submit" name="btn-login">Sign in</button>
					</div>


					<a href="signup.php">Create an Account</a><hr />
					<a href="fpass.php">Forgate Your Password ?  </a>
				</form>

			</div>
			<div class="col-3">

			</div>
		</div>
		<?php 
		include ('footer.php');
		?>
	</div> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>