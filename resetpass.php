<?php
require_once 'class.user.php';
$user = new USER();

if(empty($_GET['id']) && empty($_GET['code']))
{
	$user->redirect('index.php');
}

if(isset($_GET['id']) && isset($_GET['code']))
{
	$id = base64_decode($_GET['id']);
	$code = $_GET['code'];
	
	$stmt = $user->runQuery("SELECT * FROM tbl_users WHERE userID=:uid AND tokenCode=:token");
	$stmt->execute(array(":uid"=>$id,":token"=>$code));
	$rows = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($stmt->rowCount() == 1)
	{
		if(isset($_POST['btn-reset-pass']))
		{
			$pass = $_POST['pass'];
			$cpass = $_POST['confirm-pass'];
			
			if($cpass!==$pass)
			{
				$msg = "<div>
				<strong>Sorry!</strong>  Password Doesn't match. 
				</div>";
			}
			else
			{
				$password = md5($cpass);
				$stmt = $user->runQuery("UPDATE tbl_users SET userPass=:upass WHERE userID=:uid");
				$stmt->execute(array(":upass"=>$password,":uid"=>$rows['userID']));
				
				$msg = "<div>
				Password Changed.
				</div>";
				header("refresh:3;index.php");
			}
		}	
	}
	else
	{
		$msg = "<div>
		No Account Found, Try again
		</div>";

	}
	
	
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Password Reset</title>
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
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img style="height: 500px;" class="d-block w-100 " src="image/cover1.jpg" alt="First slide">
				</div>
				<div class="carousel-item">
					<img style="height: 500px;" class="d-block w-100 " src="image/cover2.jpg" alt="Second slide">
				</div>
				<div class="carousel-item">
					<img style="height: 500px;" class="d-block w-100" src="image/cover3.jpg" alt="Third slide">
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
		<div class="row">
			<div class="col-3">
				
			</div>
			<div class="col-6">
				<div>
					<strong>Hello !</strong>  <?php echo $rows['userName'] ?> you are here to reset your forgetton password.
				</div>
				<form  method="post">
					<h3>Password Reset.</h3><hr />
					<?php
					if(isset($msg))
					{
						echo $msg;
					}
					?>
					<div class="form-group">
						<input class="form-control" type="password" placeholder="New Password" name="pass" required />
					</div>
					<div class="form-group">
						<input class="form-control" type="password" placeholder="Confirm New Password" name="confirm-pass" required />
					</div>
					<div class="form-group">
						<button class="form-control btn btn-success" type="submit" name="btn-reset-pass">Reset Your Password</button>
					</div>


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